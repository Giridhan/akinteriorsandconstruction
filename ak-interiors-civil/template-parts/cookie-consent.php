<?php
/**
 * Cookie Consent Banner and Settings Modal Template Part
 *
 * @package ak-interiors-civil
 */
?>
<!-- Cookie Consent Banner -->
<aside
    id="cookie-banner"
    class="fixed inset-x-0 bottom-0 z-[1200] border-t border-bronze/40 bg-charcoal text-ivory shadow-2xl transition-transform duration-500 translate-y-full"
    aria-label="Cookie consent"
>
    <div class="mx-auto flex max-w-[1400px] flex-col gap-6 px-5 py-6 sm:px-8 lg:flex-row lg:items-center lg:justify-between">
        <p class="max-w-2xl text-sm leading-relaxed text-ivory/70">
            We use cookies to improve your experience, understand website usage and help us improve our services.
        </p>
        <div class="flex flex-wrap gap-3">
            <button
                type="button"
                id="cookie-accept-all-btn"
                class="bg-bronze px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-charcoal font-medium transition-colors hover:bg-ivory"
            >
                Accept All
            </button>
            <button
                type="button"
                id="cookie-essential-btn"
                class="border border-ivory/30 px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-ivory transition-colors hover:border-bronze hover:text-bronze"
            >
                Essential Only
            </button>
            <button
                type="button"
                id="cookie-settings-btn"
                class="px-2 py-3 text-[10px] uppercase tracking-[0.2em] text-bronze hover:underline"
            >
                Cookie Settings
            </button>
        </div>
    </div>
</aside>

<!-- Cookie Preferences Modal -->
<div
    id="cookie-modal-backdrop"
    class="fixed inset-0 z-[1300] hidden items-end justify-center bg-charcoal/70 p-4 sm:items-center opacity-0 transition-opacity duration-300"
    role="presentation"
>
    <div
        id="cookie-modal-content"
        class="w-full max-w-xl border border-bronze/30 bg-softwhite p-6 text-charcoal shadow-2xl sm:p-9 transition-transform duration-300 translate-y-6"
        role="dialog"
        aria-modal="true"
        aria-labelledby="cookie-settings-title"
    >
        <div class="flex items-start justify-between gap-5">
            <div>
                <p class="label-eyebrow text-bronze">Privacy</p>
                <h2 id="cookie-settings-title" class="mt-3 font-display text-4xl">Cookie Preferences</h2>
            </div>
            <button
                type="button"
                id="cookie-modal-close-btn"
                class="flex h-10 w-10 items-center justify-center border border-charcoal/15 hover:border-charcoal transition-colors"
                aria-label="Close cookie settings"
            >
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <div class="mt-8 divide-y divide-border border-y border-border">
            <!-- Essential -->
            <label class="flex items-center justify-between gap-6 py-5 cursor-not-allowed">
                <span>
                    <span class="block text-sm font-medium uppercase tracking-[0.12em]">Essential</span>
                    <span class="mt-1 block text-sm text-muted-foreground">Required for website functionality. Cannot be disabled.</span>
                </span>
                <input
                    type="checkbox"
                    id="pref-essential"
                    checked
                    disabled
                    class="h-5 w-5 shrink-0 accent-bronze"
                >
            </label>

            <!-- Analytics -->
            <label class="flex items-center justify-between gap-6 py-5 cursor-pointer">
                <span>
                    <span class="block text-sm font-medium uppercase tracking-[0.12em]">Analytics</span>
                    <span class="mt-1 block text-sm text-muted-foreground">Used to understand visitor behaviour.</span>
                </span>
                <input
                    type="checkbox"
                    id="pref-analytics"
                    class="h-5 w-5 shrink-0 accent-bronze"
                >
            </label>

            <!-- Lead Attribution -->
            <label class="flex items-center justify-between gap-6 py-5 cursor-pointer">
                <span>
                    <span class="block text-sm font-medium uppercase tracking-[0.12em]">Lead Attribution</span>
                    <span class="mt-1 block text-sm text-muted-foreground">Associates enquiry submissions and contact clicks with a visit or campaign.</span>
                </span>
                <input
                    type="checkbox"
                    id="pref-attribution"
                    class="h-5 w-5 shrink-0 accent-bronze"
                >
            </label>
        </div>

        <div class="mt-7 flex flex-wrap gap-3">
            <button
                type="button"
                id="pref-save-btn"
                class="bg-charcoal px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-softwhite font-medium hover:bg-bronze hover:text-charcoal transition-colors"
            >
                Save Preferences
            </button>
            <button
                type="button"
                id="pref-accept-all-btn"
                class="bg-bronze px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-charcoal font-medium hover:bg-ivory transition-colors"
            >
                Accept All
            </button>
            <button
                type="button"
                id="pref-reject-btn"
                class="border border-charcoal/20 px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-charcoal hover:border-bronze transition-colors"
            >
                Reject Optional
            </button>
        </div>
    </div>
</div>
