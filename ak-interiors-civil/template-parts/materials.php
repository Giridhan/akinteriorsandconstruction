<?php
/**
 * Materials Palette Section Template Part
 *
 * @package ak-interiors-civil
 */

$materials = array(
    array( 'name' => 'Wood',     'text' => 'Teak, oak and veneer joinery' ),
    array( 'name' => 'Stone',    'text' => 'Kota, granite and cladding' ),
    array( 'name' => 'Marble',   'text' => 'Italian and Indian slabs' ),
    array( 'name' => 'Metal',    'text' => 'Brushed bronze and black steel' ),
    array( 'name' => 'Fabric',   'text' => 'Linen, cotton and upholstery' ),
    array( 'name' => 'Lighting', 'text' => 'Layered profile and accent light' ),
);
?>
<section id="materials" class="bg-ivory py-24 sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="ak-reveal">
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Material palette
            </span>
            <h2 class="mt-6 max-w-2xl font-display text-[clamp(2rem,4.4vw,3.4rem)] leading-[1.05]">
                THE THINGS A SPACE IS ACTUALLY MADE OF.
            </h2>
        </div>

        <div class="mt-14 grid gap-10 lg:grid-cols-[1fr_0.9fr] lg:items-center">
            <!-- Material List -->
            <ul class="border-t border-border" id="materials-list">
                <?php foreach ( $materials as $i => $m ) : ?>
                    <li>
                        <button
                            type="button"
                            data-material-name="<?php echo esc_attr( $m['name'] ); ?>"
                            class="material-item-btn group flex w-full items-baseline justify-between border-b border-border py-6 text-left transition-colors"
                        >
                            <span class="material-name font-display text-3xl transition-colors sm:text-4xl <?php echo 0 === $i ? 'text-bronze' : 'text-charcoal'; ?>">
                                <?php echo esc_html( $m['name'] ); ?>
                            </span>
                            <span class="text-xs uppercase tracking-[0.18em] text-taupe">
                                <?php echo esc_html( $m['text'] ); ?>
                            </span>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Material Image Display -->
            <div class="relative overflow-hidden ak-reveal">
                <img
                    id="material-preview-img"
                    src="<?php echo ak_asset( 'images/materials.jpg' ); ?>"
                    alt="Architectural material palette of wood, marble, stone and metal by AK Interiors &amp; Civil in Chennai"
                    width="1400"
                    height="1000"
                    loading="lazy"
                    class="h-[300px] w-full object-cover sm:h-[460px] transition-transform duration-700 hover:scale-105"
                >
                <span
                    id="material-active-badge"
                    class="label-eyebrow absolute bottom-5 left-5 bg-charcoal/80 px-3 py-1.5 text-ivory backdrop-blur-sm"
                >
                    Wood
                </span>
            </div>
        </div>
    </div>
</section>
