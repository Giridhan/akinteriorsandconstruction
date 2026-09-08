<?php
/**
 * Showcase Parallax Section Template Part
 *
 * @package ak-interiors-civil
 */
?>
<section id="showcase" class="relative h-[70vh] min-h-[420px] overflow-hidden">
    <img
        src="<?php echo ak_asset( 'images/showcase.jpg' ); ?>"
        alt="Architectural space and craftsmanship by AK Interiors &amp; Civil"
        width="1920"
        height="1000"
        loading="lazy"
        id="showcase-bg-img"
        class="absolute inset-0 h-[125%] w-full object-cover will-change-transform"
    >
    <div class="absolute inset-0 bg-charcoal/65"></div>

    <div class="relative mx-auto flex h-full max-w-[1400px] items-center px-5 sm:px-8">
        <h2 class="ak-reveal max-w-4xl font-display text-[clamp(1.8rem,4.6vw,4rem)] leading-[1.08] text-ivory">
            GOOD DESIGN ISN'T JUST ABOUT HOW A SPACE LOOKS.
            <span class="text-bronze">IT'S ABOUT HOW IT FEELS.</span>
        </h2>
    </div>
</section>
