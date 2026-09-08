<?php
/**
 * Call to Action Section Template Part
 *
 * @package ak-interiors-civil
 */

$biz = ak_get_business_info();
?>
<section id="cta-banner" class="relative overflow-hidden bg-charcoal py-28 text-ivory sm:py-36">
    <img
        src="<?php echo ak_asset( 'images/showcase.jpg' ); ?>"
        alt=""
        aria-hidden="true"
        loading="lazy"
        class="absolute inset-0 h-full w-full object-cover opacity-25"
    >
    <div class="absolute inset-0 bg-charcoal/70"></div>

    <div class="relative mx-auto max-w-[1400px] px-5 text-center sm:px-8">
        <div class="ak-reveal">
            <h2 class="mx-auto max-w-4xl font-display text-[clamp(2.2rem,6vw,5rem)] leading-[1.02]">
                READY TO BUILD<br>
                YOUR DREAM SPACE?
            </h2>
            <p class="mx-auto mt-8 max-w-xl text-base leading-relaxed text-ivory/65">
                Tell us about your project and let's turn your ideas into a space you'll love.
            </p>
            <div class="mt-12 flex flex-wrap justify-center gap-4">
                <a
                    href="#enquiry"
                    class="bg-bronze px-9 py-4 text-[11px] uppercase tracking-[0.22em] text-charcoal transition-colors hover:bg-ivory"
                >
                    Get a Free Consultation
                </a>
                <a
                    href="<?php echo esc_url( $biz['whatsapp_url'] ); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="border border-ivory/40 px-9 py-4 text-[11px] uppercase tracking-[0.22em] transition-colors hover:border-bronze hover:text-bronze"
                >
                    WhatsApp Us
                </a>
            </div>
        </div>
    </div>
</section>
