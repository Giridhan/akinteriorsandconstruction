<?php
/**
 * Process Section Template Part
 *
 * @package ak-interiors-civil
 */

$process_steps = array(
    array(
        'n'     => '01',
        'title' => 'Consultation',
        'text'  => 'Understand your requirements, lifestyle and budget.',
        'image' => ak_asset( 'images/intro.jpg' ),
    ),
    array(
        'n'     => '02',
        'title' => 'Concept & Design',
        'text'  => 'Develop the design direction, layouts and visual concepts.',
        'image' => ak_asset( 'images/featured.jpg' ),
    ),
    array(
        'n'     => '03',
        'title' => 'Planning',
        'text'  => 'Finalize materials, estimates, timelines and execution plans.',
        'image' => ak_asset( 'images/materials.jpg' ),
    ),
    array(
        'n'     => '04',
        'title' => 'Construction',
        'text'  => 'Professional civil and structural execution.',
        'image' => ak_asset( 'images/project-construction.jpg' ),
    ),
    array(
        'n'     => '05',
        'title' => 'Interiors',
        'text'  => 'Furniture, finishes, lighting, kitchen, wardrobes and complete interiors.',
        'image' => ak_asset( 'images/project-kitchen.jpg' ),
    ),
    array(
        'n'     => '06',
        'title' => 'Final Handover',
        'text'  => 'Quality inspection and final handover of your completed space.',
        'image' => ak_asset( 'images/hero.jpg' ),
    ),
);
?>
<section id="process" class="bg-charcoal py-24 text-ivory sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="ak-reveal">
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Our process
            </span>
            <h2 class="mt-6 font-display text-[clamp(2.2rem,5.5vw,4.4rem)] leading-none">
                FROM IDEA TO REALITY
            </h2>
        </div>

        <div class="mt-16 grid gap-12 lg:grid-cols-[0.95fr_1.05fr] lg:gap-20">
            <!-- Left Column: Steps List -->
            <div class="relative">
                <span
                    aria-hidden="true"
                    class="absolute left-0 top-0 h-full w-px bg-white/15"
                ></span>
                <ul id="process-steps-list">
                    <?php foreach ( $process_steps as $i => $s ) : ?>
                        <li class="relative">
                            <button
                                type="button"
                                data-step-index="<?php echo esc_attr( $i ); ?>"
                                data-step-image="<?php echo esc_url( $s['image'] ); ?>"
                                data-step-num="<?php echo esc_attr( $s['n'] ); ?>"
                                data-step-title="<?php echo esc_attr( $s['title'] ); ?>"
                                class="process-step-btn group block w-full py-7 pl-8 text-left transition-colors"
                            >
                                <span
                                    aria-hidden="true"
                                    class="step-indicator-dot absolute left-0 h-2 w-2 -translate-x-1/2 rounded-full transition-colors <?php echo 0 === $i ? 'bg-bronze' : 'bg-white/25'; ?>"
                                    style="margin-top: 0.6rem;"
                                ></span>
                                <span class="label-eyebrow text-bronze"><?php echo esc_html( $s['n'] ); ?></span>
                                <h3 class="step-title mt-3 font-display text-2xl transition-colors sm:text-3xl <?php echo 0 === $i ? 'text-ivory' : 'text-ivory/45'; ?>">
                                    <?php echo esc_html( strtoupper( $s['title'] ) ); ?>
                                </h3>
                                <p class="mt-2 max-w-md text-sm leading-relaxed text-ivory/50">
                                    <?php echo esc_html( $s['text'] ); ?>
                                </p>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Right Column: Interactive Image Preview -->
            <div class="relative lg:sticky lg:top-28 lg:h-[560px] ak-reveal">
                <img
                    id="process-active-img"
                    src="<?php echo esc_url( $process_steps[0]['image'] ); ?>"
                    alt="Project consultation and architectural planning stage by AK Interiors &amp; Civil in Chennai"
                    width="800"
                    height="600"
                    loading="lazy"
                    class="h-[320px] w-full object-cover sm:h-[560px] shadow-2xl transition-opacity duration-500"
                >
                <span
                    id="process-watermark-num"
                    class="absolute -bottom-6 -left-3 font-display text-7xl text-ivory/15 sm:text-8xl select-none"
                >
                    01
                </span>
            </div>
        </div>
    </div>
</section>
