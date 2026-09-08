<?php
/**
 * Why Choose Us Section Template Part
 *
 * @package ak-interiors-civil
 */

$why_us = array(
    array(
        'n'     => '01',
        'title' => 'End-to-End Execution',
        'text'  => 'Design, civil work and interiors handled by one accountable team.',
    ),
    array(
        'n'     => '02',
        'title' => 'Quality Craftsmanship',
        'text'  => 'Trusted carpenters, masons and finishers who have worked with us for years.',
    ),
    array(
        'n'     => '03',
        'title' => 'Transparent Communication',
        'text'  => 'Clear estimates, honest timelines and no surprise costs mid-project.',
    ),
    array(
        'n'     => '04',
        'title' => 'Customized Design',
        'text'  => 'Every layout is drawn for your family, your plot and your budget.',
    ),
    array(
        'n'     => '05',
        'title' => 'Attention to Detail',
        'text'  => 'Joinery, alignment and finishing checked before anything is signed off.',
    ),
    array(
        'n'     => '06',
        'title' => 'On-Time Project Focus',
        'text'  => 'Sequenced site planning that keeps handover dates realistic and met.',
    ),
);
?>
<section id="why-us" class="bg-softwhite py-24 sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="ak-reveal">
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Why us
            </span>
            <h2 class="mt-6 max-w-3xl font-display text-[clamp(2rem,5vw,4rem)] leading-[1.03]">
                WHY AK INTERIORS &amp; CIVIL?
            </h2>
        </div>

        <div class="relative mt-16 pl-8 sm:pl-16">
            <!-- Continuous vertical timeline line -->
            <span
                aria-hidden="true"
                class="absolute left-0 top-0 h-full w-px bg-bronze/50 sm:left-4"
            ></span>

            <ul class="space-y-12">
                <?php foreach ( $why_us as $i => $w ) : ?>
                    <li class="ak-reveal relative" style="transition-delay: <?php echo esc_attr( $i * 60 ); ?>ms;">
                        <!-- Horizontal connector tick -->
                        <span
                            aria-hidden="true"
                            class="absolute -left-8 top-3 h-px w-6 bg-bronze/60 sm:-left-12 sm:w-8"
                        ></span>
                        <div class="grid gap-3 md:grid-cols-[auto_1fr] md:gap-12">
                            <span class="font-display text-4xl text-charcoal/20 md:text-5xl">
                                <?php echo esc_html( $w['n'] ); ?>
                            </span>
                            <div class="max-w-2xl">
                                <h3 class="font-display text-2xl sm:text-3xl">
                                    <?php echo esc_html( $w['title'] ); ?>
                                </h3>
                                <p class="mt-3 text-sm leading-relaxed text-muted-foreground">
                                    <?php echo esc_html( $w['text'] ); ?>
                                </p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
