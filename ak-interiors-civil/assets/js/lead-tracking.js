/**
 * AK Interiors & Civil - Cookie Consent and Lead Attribution Engine
 * WordPress compatible, privacy-aware client tracking
 */

(function () {
    'use strict';

    var trackingConfig = {
        visitorCookieDays: 365,
        attributionCookieDays: 365,
        maxPageViews: 30,
        formEndpoint: (window.akThemeData && window.akThemeData.formEndpoint) || 'https://formsubmit.co/akinterior251@gmail.com',
    };

    var CONSENT_KEY = 'ak_cookie_preferences';
    var TRACKING_KEY = 'ak_lead_attribution';
    var SESSION_KEY = 'ak_session_id';
    var VISITOR_COOKIE = 'ak_visitor_id';
    var FIRST_SOURCE_COOKIE = 'ak_first_source';
    var FIRST_MEDIUM_COOKIE = 'ak_first_medium';
    var FIRST_CAMPAIGN_COOKIE = 'ak_first_campaign';

    function createId(prefix) {
        var bytes = new Uint8Array(8);
        if (window.crypto && window.crypto.getRandomValues) {
            window.crypto.getRandomValues(bytes);
        } else {
            for (var i = 0; i < 8; i++) bytes[i] = Math.floor(Math.random() * 256);
        }
        var hex = Array.prototype.map.call(bytes, function (byte) {
            return byte.toString(16).padStart(2, '0');
        }).join('');
        return prefix + '-' + hex;
    }

    function setCookie(name, value, days) {
        var maxAge = days * 24 * 60 * 60;
        document.cookie = name + '=' + encodeURIComponent(value) + '; Max-Age=' + maxAge + '; Path=/; SameSite=Lax; Secure';
    }

    function getCookie(name) {
        var prefix = name + '=';
        var cookies = document.cookie ? document.cookie.split('; ') : [];
        for (var i = 0; i < cookies.length; i++) {
            if (cookies[i].indexOf(prefix) === 0) {
                return decodeURIComponent(cookies[i].substring(prefix.length));
            }
        }
        return '';
    }

    function deleteCookie(name) {
        document.cookie = name + '=; Max-Age=0; Path=/; SameSite=Lax; Secure';
    }

    function readRecord() {
        try {
            var raw = localStorage.getItem(TRACKING_KEY);
            return raw ? JSON.parse(raw) : null;
        } catch (e) {
            return null;
        }
    }

    function saveRecord(record) {
        try {
            localStorage.setItem(TRACKING_KEY, JSON.stringify(record));
        } catch (e) {}
    }

    function sourceFromReferrer(referrer) {
        if (!referrer) return 'Direct';
        try {
            var parser = document.createElement('a');
            parser.href = referrer;
            var hostname = parser.hostname.replace(/^www\./, '');
            return hostname || 'Direct';
        } catch (e) {
            return 'Referral';
        }
    }

    function currentTouch() {
        var params = new URLSearchParams(window.location.search);
        var referrer = document.referrer;
        var hasCampaign = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'].some(function (k) {
            return params.has(k);
        });
        var source = (params.get('utm_source') || '').trim() || sourceFromReferrer(referrer);
        return {
            source: source,
            medium: (params.get('utm_medium') || '').trim() || (hasCampaign ? '(not set)' : referrer ? 'referral' : '(none)'),
            campaign: (params.get('utm_campaign') || '').trim() || '(not set)',
            content: (params.get('utm_content') || '').trim() || '(not set)',
            term: (params.get('utm_term') || '').trim() || '(not set)',
        };
    }

    function getCookieConsent() {
        try {
            var raw = localStorage.getItem(CONSENT_KEY);
            if (!raw) return null;
            var parsed = JSON.parse(raw);
            return {
                essential: true,
                analytics: parsed.analytics === true,
                leadAttribution: parsed.leadAttribution === true,
            };
        } catch (e) {
            return null;
        }
    }

    function saveCookiePreferences(preferences) {
        var next = {
            essential: true,
            analytics: Boolean(preferences.analytics),
            leadAttribution: Boolean(preferences.leadAttribution),
        };
        try {
            localStorage.setItem(CONSENT_KEY, JSON.stringify(next));
        } catch (e) {}

        if (next.analytics || next.leadAttribution) {
            initializeVisitor();
        } else {
            clearOptionalTracking();
        }
        window.dispatchEvent(new CustomEvent('ak-consent-change', { detail: next }));
    }

    function clearOptionalTracking() {
        try {
            localStorage.removeItem(TRACKING_KEY);
            sessionStorage.removeItem(SESSION_KEY);
        } catch (e) {}
        [VISITOR_COOKIE, FIRST_SOURCE_COOKIE, FIRST_MEDIUM_COOKIE, FIRST_CAMPAIGN_COOKIE].forEach(deleteCookie);
    }

    function initializeVisitor() {
        var consent = getCookieConsent();
        if (!consent || (!consent.analytics && !consent.leadAttribution)) return null;

        var visitorId = getCookie(VISITOR_COOKIE);
        if (!visitorId) {
            visitorId = createId('AKVISITOR');
            setCookie(VISITOR_COOKIE, visitorId, trackingConfig.visitorCookieDays);
        }

        var now = new Date().toISOString();
        var touch = currentTouch();
        var existing = readRecord();
        var record = existing || {
            first: touch,
            latest: touch,
            landingPage: window.location.href,
            referrer: document.referrer || 'Direct',
            firstVisitTime: now,
            latestVisitTime: now,
            pages: [],
            conversions: [],
        };

        var params = new URLSearchParams(window.location.search);
        if (params.has('utm_source') || params.has('utm_medium') || params.has('utm_campaign')) {
            record.latest = touch;
        }
        record.latestVisitTime = now;
        saveRecord(record);

        setCookie(FIRST_SOURCE_COOKIE, record.first.source, trackingConfig.attributionCookieDays);
        setCookie(FIRST_MEDIUM_COOKIE, record.first.medium, trackingConfig.attributionCookieDays);
        setCookie(FIRST_CAMPAIGN_COOKIE, record.first.campaign, trackingConfig.attributionCookieDays);

        initializeSession();
        return visitorId;
    }

    function initializeSession() {
        try {
            var sessionId = sessionStorage.getItem(SESSION_KEY) || '';
            if (!sessionId) {
                sessionId = createId('AKSESSION');
                sessionStorage.setItem(SESSION_KEY, sessionId);
            }
            return sessionId;
        } catch (e) {
            return '';
        }
    }

    function trackPageView() {
        var consent = getCookieConsent();
        if (!consent || (!consent.analytics && !consent.leadAttribution)) return;
        initializeVisitor();
        var record = readRecord();
        if (!record) return;

        var timestamp = new Date().toISOString();
        var page = { url: window.location.href, title: document.title, timestamp: timestamp };
        var last = record.pages && record.pages.length ? record.pages[record.pages.length - 1] : null;
        if (!last || last.url !== page.url) {
            if (!record.pages) record.pages = [];
            record.pages.push(page);
        }
        record.pages = record.pages.slice(-trackingConfig.maxPageViews);
        record.latestVisitTime = timestamp;
        saveRecord(record);
    }

    function deviceDetails() {
        var ua = navigator.userAgent;
        var deviceCategory = /iPad|Tablet/i.test(ua) ? 'Tablet' : /Mobi|Android|iPhone/i.test(ua) ? 'Mobile' : 'Desktop';
        var browser = /Edg\//.test(ua) ? 'Edge' : /Firefox\//.test(ua) ? 'Firefox' : /Chrome\//.test(ua) ? 'Chrome' : /Safari\//.test(ua) ? 'Safari' : 'Other';
        var operatingSystem = /Windows/i.test(ua) ? 'Windows' : /Android/i.test(ua) ? 'Android' : /iPhone|iPad|iPod/i.test(ua) ? 'iOS' : /Mac OS/i.test(ua) ? 'macOS' : /Linux/i.test(ua) ? 'Linux' : 'Other';
        return { deviceCategory: deviceCategory, browser: browser, operatingSystem: operatingSystem };
    }

    function getLeadAttribution() {
        var empty = {
            consent: 'Not granted', visitorId: 'Not collected', sessionId: 'Not collected',
            firstSource: 'Not collected', firstMedium: 'Not collected', firstCampaign: 'Not collected', firstContent: 'Not collected', firstTerm: 'Not collected',
            latestSource: 'Not collected', latestMedium: 'Not collected', latestCampaign: 'Not collected', latestContent: 'Not collected', latestTerm: 'Not collected',
            landingPage: 'Not collected', referrer: 'Not collected', pagesViewed: 'Not collected', firstVisitTime: 'Not collected', latestVisitTime: 'Not collected',
            deviceCategory: 'Not collected', browser: 'Not collected', operatingSystem: 'Not collected',
        };

        var consent = getCookieConsent();
        if (!consent || !consent.leadAttribution) return empty;
        initializeVisitor();
        var record = readRecord();
        if (!record) return empty;
        var device = deviceDetails();

        var pagesFormatted = (record.pages || []).map(function (p, index) {
            return (index + 1) + '. ' + p.title + ' — ' + p.url + ' — ' + p.timestamp;
        }).join(' | ') || 'No page history recorded';

        return {
            consent: 'Granted',
            visitorId: getCookie(VISITOR_COOKIE) || 'Unavailable',
            sessionId: initializeSession(),
            firstSource: record.first.source,
            firstMedium: record.first.medium,
            firstCampaign: record.first.campaign,
            firstContent: record.first.content,
            firstTerm: record.first.term,
            latestSource: record.latest.source,
            latestMedium: record.latest.medium,
            latestCampaign: record.latest.campaign,
            latestContent: record.latest.content,
            latestTerm: record.latest.term,
            landingPage: record.landingPage,
            referrer: record.referrer,
            pagesViewed: pagesFormatted,
            firstVisitTime: record.firstVisitTime,
            latestVisitTime: record.latestVisitTime,
            deviceCategory: device.deviceCategory,
            browser: device.browser,
            operatingSystem: device.operatingSystem,
        };
    }

    function trackConversion(type) {
        var consent = getCookieConsent();
        if (!consent || !consent.leadAttribution) return;
        var record = readRecord();
        if (!record) return;

        var timestamp = new Date().toISOString();
        if (!record.conversions) record.conversions = [];
        record.conversions.push({ type: type, timestamp: timestamp, page: window.location.href });
        record.latestVisitTime = timestamp;
        saveRecord(record);

        sendConversionNotification(type, timestamp);
    }

    function sendConversionNotification(type, timestamp) {
        var attribution = getLeadAttribution();
        var iframeName = 'ak-conversion-' + Date.now();
        var iframe = document.createElement('iframe');
        iframe.name = iframeName;
        iframe.style.display = 'none';

        var form = document.createElement('form');
        form.action = trackingConfig.formEndpoint;
        form.method = 'POST';
        form.target = iframeName;
        form.style.display = 'none';

        var bizPhone = (window.akThemeData && window.akThemeData.phone) || '+91 91769 22419';
        var fields = {
            _subject: 'NEW WEBSITE LEAD - AK INTERIORS & CIVIL - ' + (type === 'whatsapp_click' ? 'WHATSAPP CLICK' : 'PHONE CLICK'),
            _template: 'table',
            _captcha: 'false',
            _hcaptcha: 'false',
            'Lead Type': (type === 'whatsapp_click' ? 'WHATSAPP CLICK' : 'PHONE CLICK'),
            'Customer Details': 'Not provided for contact-button clicks',
            'Visitor ID': attribution.visitorId,
            'Session ID': attribution.sessionId,
            'First Source': attribution.firstSource,
            'First Medium': attribution.firstMedium,
            'First Campaign': attribution.firstCampaign,
            'Latest Source': attribution.latestSource,
            'Latest Medium': attribution.latestMedium,
            'Latest Campaign': attribution.latestCampaign,
            'Landing Page': attribution.landingPage,
            'Referrer': attribution.referrer,
            'Pages Viewed': attribution.pagesViewed,
            'First Visit': attribution.firstVisitTime,
            'Latest Visit': attribution.latestVisitTime,
            'Conversion Timestamp': timestamp,
            'Website': 'AK Interiors & Civil',
            'Owner': 'T. Murugan',
            'Business Phone': bizPhone,
        };

        for (var key in fields) {
            if (fields.hasOwnProperty(key)) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = fields[key];
                form.appendChild(input);
            }
        }

        document.body.appendChild(iframe);
        document.body.appendChild(form);
        form.submit();

        setTimeout(function () {
            if (form.parentNode) form.parentNode.removeChild(form);
            if (iframe.parentNode) iframe.parentNode.removeChild(iframe);
        }, 15000);
    }

    // Expose API globally on window.AKTracking
    window.AKTracking = {
        getCookieConsent: getCookieConsent,
        saveCookiePreferences: saveCookiePreferences,
        initializeVisitor: initializeVisitor,
        trackPageView: trackPageView,
        trackConversion: trackConversion,
        getLeadAttribution: getLeadAttribution,
    };

    // DOM Ready Setup for Tracking & Consent UI
    document.addEventListener('DOMContentLoaded', function () {
        var banner = document.getElementById('cookie-banner');
        var modal = document.getElementById('cookie-modal-backdrop');
        var modalContent = document.getElementById('cookie-modal-content');
        var acceptAllBtn = document.getElementById('cookie-accept-all-btn');
        var essentialBtn = document.getElementById('cookie-essential-btn');
        var settingsBtn = document.getElementById('cookie-settings-btn');
        var modalCloseBtn = document.getElementById('cookie-modal-close-btn');
        var prefSaveBtn = document.getElementById('pref-save-btn');
        var prefAcceptAllBtn = document.getElementById('pref-accept-all-btn');
        var prefRejectBtn = document.getElementById('pref-reject-btn');
        var prefAnalytics = document.getElementById('pref-analytics');
        var prefAttribution = document.getElementById('pref-attribution');
        var openPrefFooterBtn = document.getElementById('open-cookie-preferences-btn');

        var consent = getCookieConsent();

        if (!consent) {
            if (banner) {
                banner.classList.remove('translate-y-full');
                document.body.classList.add('ak-cookie-banner-active');
            }
        } else {
            if (prefAnalytics) prefAnalytics.checked = consent.analytics;
            if (prefAttribution) prefAttribution.checked = consent.leadAttribution;
            initializeVisitor();
            trackPageView();
        }

        function showModal() {
            var cur = getCookieConsent() || { analytics: false, leadAttribution: false };
            if (prefAnalytics) prefAnalytics.checked = cur.analytics;
            if (prefAttribution) prefAttribution.checked = cur.leadAttribution;

            if (banner) {
                banner.classList.add('translate-y-full');
                document.body.classList.remove('ak-cookie-banner-active');
            }
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(function () {
                    modal.classList.remove('opacity-0');
                    if (modalContent) modalContent.classList.remove('translate-y-6');
                }, 10);
            }
        }

        function hideModal() {
            if (modal) {
                modal.classList.add('opacity-0');
                if (modalContent) modalContent.classList.add('translate-y-6');
                setTimeout(function () {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 300);
            }
            if (!getCookieConsent() && banner) {
                banner.classList.remove('translate-y-full');
                document.body.classList.add('ak-cookie-banner-active');
            }
        }

        if (acceptAllBtn) {
            acceptAllBtn.addEventListener('click', function () {
                saveCookiePreferences({ analytics: true, leadAttribution: true });
                if (banner) {
                    banner.classList.add('translate-y-full');
                    document.body.classList.remove('ak-cookie-banner-active');
                }
            });
        }

        if (essentialBtn) {
            essentialBtn.addEventListener('click', function () {
                saveCookiePreferences({ analytics: false, leadAttribution: false });
                if (banner) {
                    banner.classList.add('translate-y-full');
                    document.body.classList.remove('ak-cookie-banner-active');
                }
            });
        }

        if (settingsBtn) {
            settingsBtn.addEventListener('click', function () {
                showModal();
            });
        }

        if (openPrefFooterBtn) {
            openPrefFooterBtn.addEventListener('click', function () {
                showModal();
            });
        }

        if (modalCloseBtn) {
            modalCloseBtn.addEventListener('click', hideModal);
        }

        if (modal) {
            modal.addEventListener('click', function (e) {
                if (e.target === modal) hideModal();
            });
        }

        if (prefSaveBtn) {
            prefSaveBtn.addEventListener('click', function () {
                saveCookiePreferences({
                    analytics: prefAnalytics ? prefAnalytics.checked : false,
                    leadAttribution: prefAttribution ? prefAttribution.checked : false,
                });
                hideModal();
            });
        }

        if (prefAcceptAllBtn) {
            prefAcceptAllBtn.addEventListener('click', function () {
                saveCookiePreferences({ analytics: true, leadAttribution: true });
                hideModal();
            });
        }

        if (prefRejectBtn) {
            prefRejectBtn.addEventListener('click', function () {
                saveCookiePreferences({ analytics: false, leadAttribution: false });
                hideModal();
            });
        }

        // Conversion click tracking (Phone and WhatsApp links)
        document.addEventListener('click', function (event) {
            var target = event.target;
            if (!target) return;
            var link = target.closest ? target.closest('a[href]') : null;
            if (!link) return;

            var href = link.getAttribute('href') || '';
            if (href.indexOf('tel:') === 0 || link.getAttribute('data-conversion') === 'phone_click') {
                trackConversion('phone_click');
            } else if (href.indexOf('wa.me/') !== -1 || link.getAttribute('data-conversion') === 'whatsapp_click') {
                trackConversion('whatsapp_click');
            }
        });

        // Enquiry Form submission attribution hook
        var form = document.getElementById('main-enquiry-form');
        if (form) {
            form.addEventListener('submit', function (e) {
                if (!navigator.onLine) {
                    e.preventDefault();
                    var alertBox = document.getElementById('form-error-alert');
                    if (alertBox) alertBox.classList.remove('hidden');
                    return;
                }

                var emailInput = document.getElementById('enquiry-email');
                var replyToInput = document.getElementById('form-replyto');
                if (emailInput && replyToInput) {
                    replyToInput.value = emailInput.value;
                }

                var attr = getLeadAttribution();
                var mapping = {
                    'Tracking Consent': attr.consent,
                    'Visitor ID': attr.visitorId,
                    'Session ID': attr.sessionId,
                    'First Source': attr.firstSource,
                    'First Medium': attr.firstMedium,
                    'First Campaign': attr.firstCampaign,
                    'First Content': attr.firstContent,
                    'First Term': attr.firstTerm,
                    'Latest Source': attr.latestSource,
                    'Latest Medium': attr.latestMedium,
                    'Latest Campaign': attr.latestCampaign,
                    'Latest Content': attr.latestContent,
                    'Latest Term': attr.latestTerm,
                    'Landing Page': attr.landingPage,
                    'Referrer': attr.referrer,
                    'Pages Viewed': attr.pagesViewed,
                    'First Visit': attr.firstVisitTime,
                    'Latest Visit': attr.latestVisitTime,
                    'Enquiry Submitted': new Date().toISOString(),
                    'Device Category': attr.deviceCategory,
                    'Browser': attr.browser,
                    'Operating System': attr.operatingSystem,
                };

                for (var key in mapping) {
                    var el = form.elements.namedItem(key);
                    if (el) el.value = mapping[key];
                }

                // Loading state
                var submitBtn = document.getElementById('enquiry-submit-btn');
                var btnText = document.getElementById('submit-btn-text');
                var spinner = document.getElementById('submit-btn-spinner');
                if (submitBtn) submitBtn.disabled = true;
                if (btnText) btnText.textContent = 'Sending...';
                if (spinner) spinner.classList.remove('hidden');
            });
        }
    });
})();
