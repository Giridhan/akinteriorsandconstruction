<?php
/**
 * Services Section Template Part
 *
 * @package ak-interiors-civil
 */

$services = array(
    array(
        'n'     => '01',
        'title' => 'Interior Design & Concept Planning',
        'text'  => 'Complete design concepts, 2D/3D visualizations, and layout planning tailored to your lifestyle, family needs, and spatial architecture.',
        'image' => ak_asset( 'images/hero.jpg' ),
    ),
    array(
        'n'     => '02',
        'title' => 'Residential Home & Villa Interiors',
        'text'  => 'Bespoke residential interiors for luxury villas, apartments, and independent homes, covering elegant living rooms, master bedrooms, and dining spaces.',
        'image' => ak_asset( 'images/project-bedroom.jpg' ),
    ),
    array(
        'n'     => '03',
        'title' => 'Modular Kitchens & Storage',
        'text'  => 'Precision-crafted modular kitchens with durable marine ply cabinetry, quartz countertops, soft-close hardware, and intelligent storage accessories.',
        'image' => ak_asset( 'images/project-kitchen.jpg' ),
    ),
    array(
        'n'     => '04',
        'title' => 'Commercial & Office Interiors',
        'text'  => 'Functional workplace interiors for corporate offices, commercial studios, and retail spaces with acoustic partitioning, executive cabins, and ergonomic planning.',
        'image' => ak_asset( 'images/project-office.jpg' ),
    ),
    array(
        'n'     => '05',
        'title' => 'Civil Construction & Building Works',
        'text'  => 'Dependable ground-up house construction and structural civil engineering for residential buildings and villas, built to strict safety and quality standards.',
        'image' => ak_asset( 'images/project-construction.jpg' ),
    ),
    array(
        'n'     => '06',
        'title' => 'Renovation & Remodeling',
        'text'  => 'Transform existing apartments, older independent houses, and workplaces with complete structural retrofitting, plumbing, wiring, and modern interior upgrades.',
        'image' => ak_asset( 'images/after.jpg' ),
    ),
    array(
        'n'     => '07',
        'title' => 'Turnkey Project Execution',
        'text'  => 'Single-source responsibility from architectural drawing and civil foundation to customized carpentry, finishing, and on-time handover.',
        'image' => ak_asset( 'images/featured.jpg' ),
    ),
    array(
        'n'     => '08',
        'title' => 'Custom Woodwork & Living Spaces',
        'text'  => 'Personalized TV units, wall paneling, false ceilings, pooja units, and bespoke joinery crafted by our skilled carpenters in Chennai.',
        'image' => ak_asset( 'images/project-villa.jpg' ),
    ),
);
?>
<section id="services" class="relative overflow-hidden bg-charcoal py-24 text-ivory sm:py-32">
    <!-- Architectural grid background overlay -->
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 opacity-[0.07]">
        <div class="h-full w-full arch-grid"></div>
    </div>

    <!-- Interactive background image preview container -->
    <div id="service-hover-preview" class="pointer-events-none absolute inset-0 hidden lg:block opacity-0 transition-opacity duration-500">
        <img id="service-preview-img" src="" alt="Service preview - AK Interiors &amp; Civil" class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-charcoal/50"></div>
    </div>

    <div class="relative mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div class="ak-reveal">
                <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                    <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                    Our Services
                </span>
                <h2 class="mt-6 font-display text-[clamp(2.2rem,5.5vw,4.4rem)] leading-none">
                    WHAT WE DO
                </h2>
            </div>
            <div class="ak-reveal" style="transition-delay: 100ms;">
                <p class="max-w-sm text-sm leading-relaxed text-ivory/60">
                    Comprehensive interior design and civil construction solutions across Chennai, Pondicherry and Tamil Nadu.
                </p>
            </div>
        </div>

        <ul class="mt-16 border-t border-white/10">
            <?php foreach ( $services as $s ) : ?>
                <li
                    class="service-item group relative border-b border-white/10 cursor-pointer"
                    data-preview-image="<?php echo esc_url( $s['image'] ); ?>"
                >
                    <div class="relative z-10 grid grid-cols-[auto_1fr_auto] items-center gap-5 py-7 transition-[padding] duration-500 group-hover:pl-4 sm:gap-10 sm:py-9">
                        <span class="label-eyebrow text-bronze transition-transform duration-500 group-hover:-translate-y-1">
                            <?php echo esc_html( $s['n'] ); ?>
                        </span>
                        <div>
                            <h3 class="font-display text-2xl transition-transform duration-500 group-hover:translate-x-2 sm:text-4xl">
                                <?php echo esc_html( $s['title'] ); ?>
                            </h3>
                            <p class="mt-3 max-w-xl text-sm leading-relaxed text-ivory/55 md:max-w-lg">
                                <?php echo esc_html( $s['text'] ); ?>
                            </p>
                        </div>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="h-6 w-6 text-ivory/40 transition-all duration-500 group-hover:-translate-y-1 group-hover:translate-x-1 group-hover:text-bronze"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
                    </div>

                    <span
                        aria-hidden="true"
                        class="absolute bottom-0 left-0 h-px w-full origin-left scale-x-0 bg-bronze transition-transform duration-700 group-hover:scale-x-100"
                    ></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
