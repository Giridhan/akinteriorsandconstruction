<?php
/**
 * Stats Section Template Part
 *
 * @package ak-interiors-civil
 */

$stats = array(
    array( 'value' => 100, 'suffix' => '%', 'label' => 'Turnkey Execution' ),
    array( 'value' => 2,   'suffix' => '',  'label' => 'Core Hubs (Chennai & Pondicherry)' ),
    array( 'value' => 38,  'suffix' => '',  'label' => 'Districts Covered in Tamil Nadu' ),
    array( 'value' => 1,   'suffix' => '',  'label' => 'Single Team Accountability' ),
);
?>
<section id="stats" class="border-y border-white/10 bg-charcoal py-20 text-ivory sm:py-24">
    <div class="mx-auto grid max-w-[1400px] grid-cols-2 gap-y-12 px-5 sm:px-8 lg:grid-cols-4">
        <?php foreach ( $stats as $s ) : ?>
            <div class="ak-reveal border-l border-white/10 pl-6">
                <span
                    class="stat-counter font-display text-[clamp(3rem,7vw,6rem)] leading-none inline-block"
                    data-target="<?php echo esc_attr( $s['value'] ); ?>"
                    data-suffix="<?php echo esc_attr( $s['suffix'] ); ?>"
                >
                    <?php echo esc_html( $s['value'] . $s['suffix'] ); ?>
                </span>
                <p class="label-eyebrow mt-5 text-ivory/50"><?php echo esc_html( $s['label'] ); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
