<?php
/**
 * Intro Section Template Part
 *
 * @package ak-interiors-civil
 */

$biz = ak_get_business_info();
?>
<section id="intro" class="relative bg-softwhite py-24 sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="grid items-start gap-12 lg:grid-cols-[0.95fr_1.05fr] lg:gap-20">
            <!-- Left Column: Image with 01 watermark -->
            <div class="relative lg:pt-16 ak-reveal">
                <span
                    aria-hidden="true"
                    class="pointer-events-none absolute -left-3 -top-10 font-display text-[9rem] leading-none text-charcoal/[0.06] sm:text-[13rem] select-none"
                >
                    01
                </span>
                <img
                    src="<?php echo ak_asset( 'images/intro.jpg' ); ?>"
                    alt="Entrance foyer interior design in Chennai with custom joinery by AK Interiors &amp; Civil"
                    width="1024"
                    height="1280"
                    loading="lazy"
                    class="relative w-full object-cover shadow-lg"
                >
            </div>

            <!-- Right Column: Text & Specs -->
            <div class="lg:pt-24">
                <div class="ak-reveal">
                    <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                        <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                        Who we are
                    </span>
                </div>

                <div class="ak-reveal" style="transition-delay: 100ms;">
                    <h2 class="mt-8 font-display text-[clamp(2rem,4.6vw,3.6rem)] leading-[1.05]">
                        DESIGNING WITH PURPOSE.<br>
                        BUILDING WITH PRECISION.
                    </h2>
                </div>

                <div class="my-10 ak-reveal" style="transition-delay: 150ms;">
                    <div class="h-px w-full bg-border origin-left"></div>
                </div>

                <div class="ak-reveal" style="transition-delay: 200ms;">
                    <p class="max-w-xl text-base leading-relaxed text-muted-foreground">
                        <?php echo esc_html( $biz['name'] ); ?> is an interior design and civil construction company serving clients across Chennai, Pondicherry, and all of Tamil Nadu. Led by <?php echo esc_html( $biz['owner'] ); ?>, we provide complete, integrated solutions from architectural planning and structural civil construction through to tailored home interiors and turnkey handover.
                    </p>
                    <p class="mt-4 max-w-xl text-sm leading-relaxed text-muted-foreground">
                        Whether designing a contemporary apartment, building a custom villa, installing a modular kitchen, or fitting out a functional commercial office, having a single experienced team ensures accountable supervision, transparent budgets, and enduring quality.
                    </p>
                </div>

                <div class="ak-reveal" style="transition-delay: 250ms;">
                    <dl class="mt-12 grid max-w-lg grid-cols-2 gap-y-8">
                        <div>
                            <dt class="label-eyebrow text-bronze">Studio</dt>
                            <dd class="mt-3 text-sm text-charcoal">Chennai, Tamil Nadu</dd>
                        </div>
                        <div>
                            <dt class="label-eyebrow text-bronze">Led by</dt>
                            <dd class="mt-3 text-sm text-charcoal"><?php echo esc_html( $biz['owner'] ); ?></dd>
                        </div>
                        <div>
                            <dt class="label-eyebrow text-bronze">Coverage</dt>
                            <dd class="mt-3 text-sm text-charcoal">Chennai, Pondicherry &amp; Tamil Nadu</dd>
                        </div>
                        <div>
                            <dt class="label-eyebrow text-bronze">Delivery</dt>
                            <dd class="mt-3 text-sm text-charcoal">Turnkey execution</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>
