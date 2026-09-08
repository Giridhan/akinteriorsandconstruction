<?php
/**
 * Featured Project Section Template Part
 *
 * @package ak-interiors-civil
 */
?>
<section id="featured" class="bg-softwhite py-24 sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="grid gap-12 lg:grid-cols-[1.15fr_0.85fr] lg:gap-16 items-center">
            <div class="relative overflow-hidden ak-reveal">
                <img
                    src="<?php echo ak_asset( 'images/featured.jpg' ); ?>"
                    alt="Double-height living and dining space of a modern Chennai residence"
                    width="1600"
                    height="1200"
                    loading="lazy"
                    class="h-[420px] w-full scale-105 object-cover sm:h-[620px] transition-transform duration-700 hover:scale-110"
                >
            </div>

            <div class="flex flex-col justify-center">
                <div class="ak-reveal">
                    <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                        <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                        Featured project
                    </span>
                </div>
                <div class="ak-reveal" style="transition-delay: 80ms;">
                    <p class="mt-8 font-display text-6xl text-charcoal/15">01 / 06</p>
                    <h2 class="mt-4 font-display text-[clamp(2rem,4vw,3.4rem)] leading-[1.05]">
                        Modern Chennai Residence
                    </h2>
                </div>
                <div class="ak-reveal" style="transition-delay: 140ms;">
                    <p class="mt-7 max-w-md text-base leading-relaxed text-muted-foreground">
                        A four-bedroom home taken from bare structure to finished interiors. We opened the
                        ground floor into a single daylight-led volume, rebuilt the staircase in stone, and
                        detailed every wardrobe, kitchen and lighting circuit in-house.
                    </p>
                </div>
                <div class="ak-reveal" style="transition-delay: 200ms;">
                    <ul class="mt-10 space-y-4 border-t border-border pt-8">
                        <?php
                        $disciplines = array( 'Design', 'Construction', 'Interiors', 'Turnkey Execution' );
                        foreach ( $disciplines as $i => $t ) :
                        ?>
                            <li class="flex items-baseline gap-5">
                                <span class="label-eyebrow text-bronze"><?php echo sprintf( '%02d', $i + 1 ); ?></span>
                                <span class="text-sm uppercase tracking-[0.18em]"><?php echo esc_html( $t ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
