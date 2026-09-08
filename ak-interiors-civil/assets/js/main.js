/**
 * AK Interiors & Civil - Theme Interactions & UI Controller
 */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        // ==========================================
        // 1. Header Scroll Background Transition
        // ==========================================
        var header = document.getElementById('site-header');
        var isOverHero = header ? header.getAttribute('data-over-hero') === 'true' : false;

        function updateHeaderScroll() {
            if (!header) return;
            var scrolled = window.scrollY > 40;
            if (isOverHero) {
                if (scrolled) {
                    header.classList.remove('border-transparent', 'bg-transparent');
                    header.classList.add('border-white/10', 'bg-charcoal/85', 'backdrop-blur-xl');
                } else {
                    header.classList.add('border-transparent', 'bg-transparent');
                    header.classList.remove('border-white/10', 'bg-charcoal/85', 'backdrop-blur-xl');
                }
            }
        }
        window.addEventListener('scroll', updateHeaderScroll, { passive: true });
        updateHeaderScroll();

        // ==========================================
        // 2. Mobile Navigation Drawer
        // ==========================================
        var menuBtn = document.getElementById('mobile-menu-toggle');
        var drawer = document.getElementById('mobile-drawer');
        var overlay = document.getElementById('mobile-overlay');
        var barTop = document.querySelector('.hamburger-bar-top');
        var barMid = document.querySelector('.hamburger-bar-mid');
        var barBot = document.querySelector('.hamburger-bar-bot');
        var isOpen = false;

        function toggleMenu(open) {
            isOpen = typeof open === 'boolean' ? open : !isOpen;
            if (!menuBtn || !drawer) return;

            menuBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            if (isOpen) {
                drawer.classList.remove('translate-x-full');
                drawer.classList.add('translate-x-0');
                if (overlay) {
                    overlay.classList.remove('opacity-0', 'pointer-events-none');
                    overlay.classList.add('opacity-100');
                }
                if (barTop) barTop.style.transform = 'translateY(8px) rotate(45deg)';
                if (barMid) barMid.style.opacity = '0';
                if (barBot) barBot.style.transform = 'translateY(-8px) rotate(-45deg)';
                document.body.style.overflow = 'hidden';
            } else {
                drawer.classList.add('translate-x-full');
                drawer.classList.remove('translate-x-0');
                if (overlay) {
                    overlay.classList.add('opacity-0', 'pointer-events-none');
                    overlay.classList.remove('opacity-100');
                }
                if (barTop) barTop.style.transform = 'none';
                if (barMid) barMid.style.opacity = '1';
                if (barBot) barBot.style.transform = 'none';
                document.body.style.overflow = '';
            }
        }

        if (menuBtn) {
            menuBtn.addEventListener('click', function () {
                toggleMenu();
            });
        }
        if (overlay) {
            overlay.addEventListener('click', function () {
                toggleMenu(false);
            });
        }

        var mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
        mobileNavLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                toggleMenu(false);
            });
        });

        // ==========================================
        // 3. Scroll Progress Bar
        // ==========================================
        var progressBar = document.getElementById('ak-scroll-progress');
        function updateScrollProgress() {
            if (!progressBar) return;
            var docHeight = document.documentElement.scrollHeight - window.innerHeight;
            var scrolled = docHeight > 0 ? window.scrollY / docHeight : 0;
            progressBar.style.transform = 'scaleX(' + Math.min(1, Math.max(0, scrolled)) + ')';
        }
        window.addEventListener('scroll', updateScrollProgress, { passive: true });
        updateScrollProgress();

        // ==========================================
        // 4. Custom Cursor (Desktop)
        // ==========================================
        var cursor = document.getElementById('ak-custom-cursor');
        var cursorDot = cursor ? cursor.querySelector('.cursor-dot') : null;
        var hasPointer = window.matchMedia('(pointer: fine)').matches && !window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (cursor && cursorDot && hasPointer) {
            cursor.classList.remove('hidden');
            window.addEventListener('mousemove', function (e) {
                cursor.style.left = e.clientX + 'px';
                cursor.style.top = e.clientY + 'px';

                var target = e.target;
                var isInteractive = target && target.closest('a, button, [data-cursor="expand"], input, select, textarea');
                if (isInteractive) {
                    cursorDot.style.width = '56px';
                    cursorDot.style.height = '56px';
                    cursorDot.style.opacity = '0.9';
                } else {
                    cursorDot.style.width = '14px';
                    cursorDot.style.height = '14px';
                    cursorDot.style.opacity = '0.55';
                }
            }, { passive: true });
        }

        // ==========================================
        // 5. Scroll Reveal Animations
        // ==========================================
        var revealElements = document.querySelectorAll('.ak-reveal');
        if ('IntersectionObserver' in window) {
            var revealObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { rootMargin: '0px 0px -80px 0px' });

            revealElements.forEach(function (el) {
                revealObserver.observe(el);
            });
        } else {
            revealElements.forEach(function (el) {
                el.classList.add('is-revealed');
            });
        }

        // ==========================================
        // 6. Services Hover Image Preview
        // ==========================================
        var serviceItems = document.querySelectorAll('.service-item');
        var servicePreview = document.getElementById('service-hover-preview');
        var servicePreviewImg = document.getElementById('service-preview-img');

        serviceItems.forEach(function (item) {
            item.addEventListener('mouseenter', function () {
                var imgSrc = item.getAttribute('data-preview-image');
                if (servicePreview && servicePreviewImg && imgSrc) {
                    servicePreviewImg.src = imgSrc;
                    servicePreview.classList.remove('opacity-0');
                    servicePreview.classList.add('opacity-100');
                }
            });
            item.addEventListener('mouseleave', function () {
                if (servicePreview) {
                    servicePreview.classList.remove('opacity-100');
                    servicePreview.classList.add('opacity-0');
                }
            });
        });

        // ==========================================
        // 7. Projects Filter Tabs
        // ==========================================
        var filterBtns = document.querySelectorAll('.project-filter-btn');
        var projectCards = document.querySelectorAll('.project-card');

        filterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var filter = btn.getAttribute('data-filter') || 'All';

                filterBtns.forEach(function (b) {
                    var ind = b.querySelector('.filter-indicator');
                    if (b === btn) {
                        b.classList.remove('text-taupe');
                        b.classList.add('text-charcoal');
                        if (ind) ind.classList.remove('hidden');
                    } else {
                        b.classList.remove('text-charcoal');
                        b.classList.add('text-taupe');
                        if (ind) ind.classList.add('hidden');
                    }
                });

                projectCards.forEach(function (card) {
                    var groups = card.getAttribute('data-groups') || '';
                    if (filter === 'All' || groups.indexOf(filter) !== -1) {
                        card.style.display = '';
                        setTimeout(function () {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 10);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        setTimeout(function () {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // ==========================================
        // 8. Before / After Image Slider
        // ==========================================
        var slider = document.getElementById('before-after-slider');
        var beforeContainer = document.getElementById('before-image-container');
        var sliderDivider = document.getElementById('slider-divider');
        var rangeInput = document.getElementById('before-after-range');

        function setSliderPos(percent) {
            var val = Math.min(100, Math.max(0, percent));
            if (beforeContainer) {
                beforeContainer.style.clipPath = 'inset(0 ' + (100 - val) + '% 0 0)';
            }
            if (sliderDivider) {
                sliderDivider.style.left = val + '%';
            }
            if (rangeInput && Number(rangeInput.value) !== Math.round(val)) {
                rangeInput.value = Math.round(val);
            }
        }

        if (slider) {
            var isDragging = false;

            function updateFromEvent(e) {
                var rect = slider.getBoundingClientRect();
                var clientX = e.clientX || (e.touches && e.touches[0] ? e.touches[0].clientX : 0);
                var pct = ((clientX - rect.left) / rect.width) * 100;
                setSliderPos(pct);
            }

            slider.addEventListener('pointerdown', function (e) {
                if (e.target === rangeInput) return;
                isDragging = true;
                slider.setPointerCapture ? slider.setPointerCapture(e.pointerId) : null;
                updateFromEvent(e);
            });

            slider.addEventListener('pointermove', function (e) {
                if (isDragging) updateFromEvent(e);
            });

            var stopDrag = function () { isDragging = false; };
            slider.addEventListener('pointerup', stopDrag);
            slider.addEventListener('pointercancel', stopDrag);

            if (rangeInput) {
                rangeInput.addEventListener('input', function (e) {
                    setSliderPos(Number(e.target.value));
                });
            }
        }

        // ==========================================
        // 9. Materials Palette Selector
        // ==========================================
        var materialBtns = document.querySelectorAll('.material-item-btn');
        var materialActiveBadge = document.getElementById('material-active-badge');

        materialBtns.forEach(function (btn) {
            var activate = function () {
                var name = btn.getAttribute('data-material-name') || '';
                materialBtns.forEach(function (b) {
                    var title = b.querySelector('.material-name');
                    if (b === btn) {
                        if (title) {
                            title.classList.remove('text-charcoal');
                            title.classList.add('text-bronze');
                        }
                    } else {
                        if (title) {
                            title.classList.remove('text-bronze');
                            title.classList.add('text-charcoal');
                        }
                    }
                });
                if (materialActiveBadge) materialActiveBadge.textContent = name;
            };

            btn.addEventListener('mouseenter', activate);
            btn.addEventListener('focus', activate);
            btn.addEventListener('click', activate);
        });

        // ==========================================
        // 10. Process Steps Selector
        // ==========================================
        var processStepBtns = document.querySelectorAll('.process-step-btn');
        var processImg = document.getElementById('process-active-img');
        var processWatermark = document.getElementById('process-watermark-num');

        processStepBtns.forEach(function (btn) {
            var selectStep = function () {
                var imgSrc = btn.getAttribute('data-step-image');
                var num = btn.getAttribute('data-step-num');

                processStepBtns.forEach(function (b) {
                    var dot = b.querySelector('.step-indicator-dot');
                    var title = b.querySelector('.step-title');
                    if (b === btn) {
                        if (dot) {
                            dot.classList.remove('bg-white/25');
                            dot.classList.add('bg-bronze');
                        }
                        if (title) {
                            title.classList.remove('text-ivory/45');
                            title.classList.add('text-ivory');
                        }
                    } else {
                        if (dot) {
                            dot.classList.remove('bg-bronze');
                            dot.classList.add('bg-white/25');
                        }
                        if (title) {
                            title.classList.remove('text-ivory');
                            title.classList.add('text-ivory/45');
                        }
                    }
                });

                if (processImg && imgSrc) {
                    processImg.style.opacity = '0.5';
                    setTimeout(function () {
                        processImg.src = imgSrc;
                        processImg.style.opacity = '1';
                    }, 150);
                }
                if (processWatermark && num) {
                    processWatermark.textContent = num;
                }
            };

            btn.addEventListener('mouseenter', selectStep);
            btn.addEventListener('focus', selectStep);
            btn.addEventListener('click', selectStep);
        });

        // ==========================================
        // 11. Testimonials Carousel
        // ==========================================
        var testimonialSlides = document.querySelectorAll('.testimonial-slide');
        var prevBtn = document.getElementById('testimonial-prev-btn');
        var nextBtn = document.getElementById('testimonial-next-btn');
        var counter = document.getElementById('testimonial-counter');
        var activeTestimonial = 0;

        function showTestimonial(index) {
            var total = testimonialSlides.length;
            if (total === 0) return;
            activeTestimonial = (index + total) % total;

            testimonialSlides.forEach(function (slide, idx) {
                if (idx === activeTestimonial) {
                    slide.classList.remove('hidden', 'opacity-0');
                    slide.classList.add('block', 'opacity-100');
                } else {
                    slide.classList.remove('block', 'opacity-100');
                    slide.classList.add('hidden', 'opacity-0');
                }
            });

            if (counter) {
                var currentPad = String(activeTestimonial + 1).padStart(2, '0');
                var totalPad = String(total).padStart(2, '0');
                counter.textContent = currentPad + ' / ' + totalPad;
            }
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                showTestimonial(activeTestimonial - 1);
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                showTestimonial(activeTestimonial + 1);
            });
        }

        // ==========================================
        // 12. Stats Counter Animation
        // ==========================================
        var counters = document.querySelectorAll('.stat-counter');
        if ('IntersectionObserver' in window && counters.length > 0) {
            var counterObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        var el = entry.target;
                        var target = parseInt(el.getAttribute('data-target') || '0', 10);
                        var suffix = el.getAttribute('data-suffix') || '';
                        var duration = 1600;
                        var startTime = performance.now();

                        function tick(now) {
                            var elapsed = now - startTime;
                            var progress = Math.min(1, elapsed / duration);
                            var eased = 1 - Math.pow(1 - progress, 3);
                            var currentVal = Math.round(target * eased);
                            el.textContent = currentVal + suffix;
                            if (progress < 1) {
                                requestAnimationFrame(tick);
                            } else {
                                el.textContent = target + suffix;
                            }
                        }
                        requestAnimationFrame(tick);
                        counterObserver.unobserve(el);
                    }
                });
            }, { rootMargin: '0px 0px -60px 0px' });

            counters.forEach(function (c) {
                counterObserver.observe(c);
            });
        }
    });
})();
