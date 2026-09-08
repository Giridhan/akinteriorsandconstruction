<?php
/**
 * 404 Error Template
 *
 * @package ak-interiors-civil
 */

get_header();
?>

<div class="flex min-h-[70vh] items-center justify-center bg-charcoal px-4 pt-36 pb-24 text-ivory">
    <div class="max-w-md mx-auto text-center">
        <span class="label-eyebrow text-bronze">404 Error</span>
        <h1 class="mt-4 font-display text-8xl sm:text-9xl font-light text-ivory">404</h1>
        <h2 class="mt-4 text-2xl font-display text-ivory">Page Not Found</h2>
        <p class="mt-3 text-sm text-ivory/60 leading-relaxed">
            The page you are looking for doesn't exist or has been moved.
        </p>
        <div class="mt-8">
            <a
                href="<?php echo esc_url( home_url( '/' ) ); ?>"
                class="inline-flex items-center justify-center bg-bronze px-8 py-4 text-[11px] uppercase tracking-[0.22em] text-charcoal transition-colors hover:bg-ivory"
            >
                Back to Home
            </a>
        </div>
    </div>
</div>

<?php
get_footer();
