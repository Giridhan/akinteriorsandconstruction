<?php
/**
 * Hero Section Template Part
 *
 * @package ak-interiors-civil
 */

$biz = ak_get_business_info();
?>
<section id="hero" class="relative min-h-[100svh] overflow-hidden bg-charcoal">
    <!-- Hero Background Image with Parallax & Dark Gradient Overlay -->
    <img
        src="<?php echo ak_asset( 'images/hero.jpg' ); ?>"
        alt="Interior design and civil construction project in Chennai by AK Interiors &amp; Civil"
        width="1920"
        height="1088"
        fetchpriority="high"
        id="hero-bg-img"
        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out will-change-transform"
    >
    <div class="absolute inset-0 bg-gradient-to-b from-charcoal/85 via-charcoal/45 to-charcoal/90"></div>

    <!-- Architectural Grid Accent Lines -->
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
        <span class="hero-vert-line absolute inset-y-0 w-px origin-top bg-ivory/10 left-[18%]"></span>
        <span class="hero-vert-line absolute inset-y-0 w-px origin-top bg-ivory/10 left-[50%]"></span>
        <span class="hero-vert-line absolute inset-y-0 w-px origin-top bg-ivory/10 left-[82%]"></span>
        <span class="hero-horiz-line absolute left-0 top-[62%] h-px w-full origin-left bg-ivory/10"></span>
    </div>

    <!-- Main Content Container with guaranteed spacing below header -->
    <div class="relative z-10 mx-auto grid min-h-[100svh] w-full max-w-[1400px] grid-rows-[1fr_auto] px-5 pb-8 pt-28 sm:px-8 sm:pb-10 sm:pt-32 lg:pb-12 lg:pt-36">
        <div class="flex min-w-0 flex-col justify-center py-8 sm:py-10 lg:py-12">
            <p class="label-eyebrow text-ivory/60 animate-fade-in-up">
                Chennai &bull; Pondicherry &bull; Tamil Nadu
            </p>

            <h1 class="mt-5 max-w-[900px] font-display leading-[0.9] text-ivory">
                <span class="block font-sans text-xs uppercase tracking-[0.25em] text-bronze sm:text-sm font-semibold mb-4 animate-fade-in-up">
                    Interior Design &amp; Civil Construction in Chennai
                </span>
                <span class="block text-[clamp(3rem,12vw,5rem)] sm:text-[clamp(4rem,8vw,6.5rem)] lg:text-[clamp(4.5rem,7vw,7.5rem)]">
                    <span class="block whitespace-nowrap">
                        <span class="hero-word mr-[0.25em] inline-block">WE</span>
                        <span class="hero-word mr-[0.25em] inline-block last:mr-0">CREATE</span>
                    </span>
                    <span class="block whitespace-nowrap">
                        <span class="hero-word mr-[0.25em] inline-block">SPACES</span>
                        <span class="hero-word mr-[0.25em] inline-block last:mr-0">THAT</span>
                    </span>
                    <span class="block whitespace-nowrap">
                        <span class="hero-word mr-[0.25em] inline-block last:mr-0">INSPIRE.</span>
                    </span>
                </span>
            </h1>

            <p class="mt-6 max-w-xl text-sm leading-relaxed text-ivory/70 sm:mt-7 sm:text-base animate-fade-in-up" style="animation-delay: 0.3s;">
                From architectural foundations to refined residential interiors, modular kitchens and commercial fit-outs, AK Interiors &amp; Civil delivers complete turnkey solutions from design through execution.
            </p>

            <div class="mt-7 flex flex-col items-stretch gap-3 min-[430px]:flex-row min-[430px]:items-center sm:mt-8 sm:gap-4 animate-fade-in-up" style="animation-delay: 0.45s;">
                <a
                    href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"
                    class="bg-bronze px-6 py-4 text-center text-[11px] uppercase tracking-[0.22em] text-charcoal transition-colors hover:bg-ivory sm:px-8"
                >
                    Explore Our Work
                </a>
                <a
                    href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                    class="border border-ivory/40 px-6 py-4 text-center text-[11px] uppercase tracking-[0.22em] text-ivory transition-colors hover:border-bronze hover:text-bronze sm:px-8"
                >
                    Start Your Project
                </a>
            </div>
        </div>

        <div class="flex items-end justify-between gap-6 pt-4">
            <span class="label-eyebrow flex items-center gap-3 text-ivory/50">
                Scroll to explore
                <span class="inline-block animate-bounce">&darr;</span>
            </span>

            <ul aria-hidden="true" class="hidden gap-10 md:flex">
                <li class="label-eyebrow text-ivory/45">01 &mdash; DESIGN</li>
                <li class="label-eyebrow text-ivory/45">02 &mdash; BUILD</li>
                <li class="label-eyebrow text-ivory/45">03 &mdash; TRANSFORM</li>
            </ul>
        </div>
    </div>
</section>
