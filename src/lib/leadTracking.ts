export const trackingConfig = {
  visitorCookieDays: 365,
  attributionCookieDays: 365,
  maxPageViews: 30,
  formEndpoint: "https://formsubmit.co/akinterior251@gmail.com",
} as const;

export type CookiePreferences = {
  essential: true;
  analytics: boolean;
  leadAttribution: boolean;
};

type Touch = {
  source: string;
  medium: string;
  campaign: string;
  content: string;
  term: string;
};

type PageView = {
  url: string;
  title: string;
  timestamp: string;
};

type TrackingRecord = {
  first: Touch;
  latest: Touch;
  landingPage: string;
  referrer: string;
  firstVisitTime: string;
  latestVisitTime: string;
  pages: PageView[];
  conversions: Array<{ type: ConversionType; timestamp: string; page: string }>;
};

export type ConversionType = "whatsapp_click" | "phone_click";

export type LeadAttribution = {
  consent: "Granted" | "Not granted";
  visitorId: string;
  sessionId: string;
  firstSource: string;
  firstMedium: string;
  firstCampaign: string;
  firstContent: string;
  firstTerm: string;
  latestSource: string;
  latestMedium: string;
  latestCampaign: string;
  latestContent: string;
  latestTerm: string;
  landingPage: string;
  referrer: string;
  pagesViewed: string;
  firstVisitTime: string;
  latestVisitTime: string;
  deviceCategory: string;
  browser: string;
  operatingSystem: string;
};

const CONSENT_KEY = "ak_cookie_preferences";
const TRACKING_KEY = "ak_lead_attribution";
const SESSION_KEY = "ak_session_id";
const VISITOR_COOKIE = "ak_visitor_id";
const FIRST_SOURCE_COOKIE = "ak_first_source";
const FIRST_MEDIUM_COOKIE = "ak_first_medium";
const FIRST_CAMPAIGN_COOKIE = "ak_first_campaign";

function isBrowser() {
  return typeof window !== "undefined" && typeof document !== "undefined";
}

function createId(prefix: string) {
  const bytes = new Uint8Array(8);
  crypto.getRandomValues(bytes);
  return `${prefix}-${Array.from(bytes, (byte) => byte.toString(16).padStart(2, "0")).join("")}`;
}

function setCookie(name: string, value: string, days: number) {
  const maxAge = days * 24 * 60 * 60;
  document.cookie = `${name}=${encodeURIComponent(value)}; Max-Age=${maxAge}; Path=/; SameSite=Lax; Secure`;
}

function getCookie(name: string) {
  const prefix = `${name}=`;
  const entry = document.cookie.split("; ").find((item) => item.startsWith(prefix));
  return entry ? decodeURIComponent(entry.slice(prefix.length)) : "";
}

function deleteCookie(name: string) {
  document.cookie = `${name}=; Max-Age=0; Path=/; SameSite=Lax; Secure`;
}

function readRecord(): TrackingRecord | null {
  try {
    const raw = localStorage.getItem(TRACKING_KEY);
    return raw ? (JSON.parse(raw) as TrackingRecord) : null;
  } catch {
    return null;
  }
}

function saveRecord(record: TrackingRecord) {
  localStorage.setItem(TRACKING_KEY, JSON.stringify(record));
}

function sourceFromReferrer(referrer: string) {
  if (!referrer) return "Direct";
  try {
    const hostname = new URL(referrer).hostname.replace(/^www\./, "");
    return hostname || "Direct";
  } catch {
    return "Referral";
  }
}

function currentTouch(): Touch {
  const params = new URLSearchParams(window.location.search);
  const referrer = document.referrer;
  const hasCampaign = ["utm_source", "utm_medium", "utm_campaign", "utm_content", "utm_term"].some((key) => params.has(key));
  const source = params.get("utm_source")?.trim() || sourceFromReferrer(referrer);
  return {
    source,
    medium: params.get("utm_medium")?.trim() || (hasCampaign ? "(not set)" : referrer ? "referral" : "(none)"),
    campaign: params.get("utm_campaign")?.trim() || "(not set)",
    content: params.get("utm_content")?.trim() || "(not set)",
    term: params.get("utm_term")?.trim() || "(not set)",
  };
}

export function getCookieConsent(): CookiePreferences | null {
  if (!isBrowser()) return null;
  try {
    const raw = localStorage.getItem(CONSENT_KEY);
    if (!raw) return null;
    const parsed = JSON.parse(raw) as Partial<CookiePreferences>;
    return {
      essential: true,
      analytics: parsed.analytics === true,
      leadAttribution: parsed.leadAttribution === true,
    };
  } catch {
    return null;
  }
}

export function saveCookiePreferences(preferences: Omit<CookiePreferences, "essential">) {
  if (!isBrowser()) return;
  const next: CookiePreferences = { essential: true, ...preferences };
  localStorage.setItem(CONSENT_KEY, JSON.stringify(next));
  if (next.analytics || next.leadAttribution) initializeVisitor();
  else clearOptionalTracking();
  window.dispatchEvent(new CustomEvent("ak-consent-change", { detail: next }));
}

export function clearOptionalTracking() {
  if (!isBrowser()) return;
  localStorage.removeItem(TRACKING_KEY);
  sessionStorage.removeItem(SESSION_KEY);
  [VISITOR_COOKIE, FIRST_SOURCE_COOKIE, FIRST_MEDIUM_COOKIE, FIRST_CAMPAIGN_COOKIE].forEach(deleteCookie);
}

export function initializeVisitor() {
  if (!isBrowser()) return null;
  const consent = getCookieConsent();
  if (!consent || (!consent.analytics && !consent.leadAttribution)) return null;

  let visitorId = getCookie(VISITOR_COOKIE);
  if (!visitorId) {
    visitorId = createId("AKVISITOR");
    setCookie(VISITOR_COOKIE, visitorId, trackingConfig.visitorCookieDays);
  }

  const now = new Date().toISOString();
  const touch = currentTouch();
  const existing = readRecord();
  const record: TrackingRecord = existing ?? {
    first: touch,
    latest: touch,
    landingPage: window.location.href,
    referrer: document.referrer || "Direct",
    firstVisitTime: now,
    latestVisitTime: now,
    pages: [],
    conversions: [],
  };

  const params = new URLSearchParams(window.location.search);
  if (params.has("utm_source") || params.has("utm_medium") || params.has("utm_campaign")) record.latest = touch;
  record.latestVisitTime = now;
  saveRecord(record);
  setCookie(FIRST_SOURCE_COOKIE, record.first.source, trackingConfig.attributionCookieDays);
  setCookie(FIRST_MEDIUM_COOKIE, record.first.medium, trackingConfig.attributionCookieDays);
  setCookie(FIRST_CAMPAIGN_COOKIE, record.first.campaign, trackingConfig.attributionCookieDays);
  initializeSession();
  return visitorId;
}

export function initializeSession() {
  if (!isBrowser()) return "";
  let sessionId = sessionStorage.getItem(SESSION_KEY) ?? "";
  if (!sessionId) {
    sessionId = createId("AKSESSION");
    sessionStorage.setItem(SESSION_KEY, sessionId);
  }
  return sessionId;
}

export function trackPageView() {
  if (!isBrowser()) return;
  const consent = getCookieConsent();
  if (!consent || (!consent.analytics && !consent.leadAttribution)) return;
  initializeVisitor();
  const record = readRecord();
  if (!record) return;
  const timestamp = new Date().toISOString();
  const page: PageView = { url: window.location.href, title: document.title, timestamp };
  const last = record.pages.at(-1);
  if (!last || last.url !== page.url) record.pages.push(page);
  record.pages = record.pages.slice(-trackingConfig.maxPageViews);
  record.latestVisitTime = timestamp;
  saveRecord(record);
}

function deviceDetails() {
  const ua = navigator.userAgent;
  const deviceCategory = /iPad|Tablet/i.test(ua) ? "Tablet" : /Mobi|Android|iPhone/i.test(ua) ? "Mobile" : "Desktop";
  const browser = /Edg\//.test(ua) ? "Edge" : /Firefox\//.test(ua) ? "Firefox" : /Chrome\//.test(ua) ? "Chrome" : /Safari\//.test(ua) ? "Safari" : "Other";
  const operatingSystem = /Windows/i.test(ua) ? "Windows" : /Android/i.test(ua) ? "Android" : /iPhone|iPad|iPod/i.test(ua) ? "iOS" : /Mac OS/i.test(ua) ? "macOS" : /Linux/i.test(ua) ? "Linux" : "Other";
  return { deviceCategory, browser, operatingSystem };
}

export function getLeadAttribution(): LeadAttribution {
  const empty: LeadAttribution = {
    consent: "Not granted", visitorId: "Not collected", sessionId: "Not collected",
    firstSource: "Not collected", firstMedium: "Not collected", firstCampaign: "Not collected", firstContent: "Not collected", firstTerm: "Not collected",
    latestSource: "Not collected", latestMedium: "Not collected", latestCampaign: "Not collected", latestContent: "Not collected", latestTerm: "Not collected",
    landingPage: "Not collected", referrer: "Not collected", pagesViewed: "Not collected", firstVisitTime: "Not collected", latestVisitTime: "Not collected",
    deviceCategory: "Not collected", browser: "Not collected", operatingSystem: "Not collected",
  };
  if (!isBrowser() || !getCookieConsent()?.leadAttribution) return empty;
  initializeVisitor();
  const record = readRecord();
  if (!record) return empty;
  const device = deviceDetails();
  return {
    consent: "Granted",
    visitorId: getCookie(VISITOR_COOKIE) || "Unavailable",
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
    pagesViewed: record.pages.map((page, index) => `${index + 1}. ${page.title} — ${page.url} — ${page.timestamp}`).join(" | ") || "No page history recorded",
    firstVisitTime: record.firstVisitTime,
    latestVisitTime: record.latestVisitTime,
    ...device,
  };
}

export function trackConversion(type: ConversionType) {
  if (!isBrowser() || !getCookieConsent()?.leadAttribution) return;
  const record = readRecord();
  if (!record) return;
  const timestamp = new Date().toISOString();
  record.conversions.push({ type, timestamp, page: window.location.href });
  record.latestVisitTime = timestamp;
  saveRecord(record);
  sendConversionNotification(type, timestamp);
}

function sendConversionNotification(type: ConversionType, timestamp: string) {
  const attribution = getLeadAttribution();
  const iframeName = `ak-conversion-${Date.now()}`;
  const iframe = document.createElement("iframe");
  iframe.name = iframeName;
  iframe.hidden = true;
  const form = document.createElement("form");
  form.action = trackingConfig.formEndpoint;
  form.method = "POST";
  form.target = iframeName;
  form.hidden = true;
  const fields: Record<string, string> = {
    _subject: `NEW WEBSITE LEAD - AK INTERIORS & CIVIL - ${type === "whatsapp_click" ? "WHATSAPP CLICK" : "PHONE CLICK"}`,
    _template: "table", _captcha: "false", _hcaptcha: "false",
    "Lead Type": type === "whatsapp_click" ? "WHATSAPP CLICK" : "PHONE CLICK",
    "Customer Details": "Not provided for contact-button clicks",
    "Visitor ID": attribution.visitorId, "Session ID": attribution.sessionId,
    "First Source": attribution.firstSource, "First Medium": attribution.firstMedium, "First Campaign": attribution.firstCampaign,
    "Latest Source": attribution.latestSource, "Latest Medium": attribution.latestMedium, "Latest Campaign": attribution.latestCampaign,
    "Landing Page": attribution.landingPage, Referrer: attribution.referrer, "Pages Viewed": attribution.pagesViewed,
    "First Visit": attribution.firstVisitTime, "Latest Visit": attribution.latestVisitTime, "Conversion Timestamp": timestamp,
    Website: "AK Interiors & Civil", Owner: "T. Murugan", "Business Phone": "+91 91769 22419",
  };
  Object.entries(fields).forEach(([name, value]) => {
    const input = document.createElement("input");
    input.type = "hidden";
    input.name = name;
    input.value = value;
    form.appendChild(input);
  });
  document.body.append(iframe, form);
  form.submit();
  window.setTimeout(() => { form.remove(); iframe.remove(); }, 15000);
}

export function openCookiePreferences() {
  if (isBrowser()) window.dispatchEvent(new Event("ak-open-cookie-preferences"));
}