<?php
/**
 * Projects Section Template Part
 *
 * @package ak-interiors-civil
 */

$filters = array( 'All', 'Residential', 'Commercial', 'Interiors', 'Construction' );

$projects = array(
    array(
        'name'     => 'Anna Nagar Residence',
        'location' => 'Anna Nagar, Chennai',
        'type'     => 'Residential',
        'groups'   => 'Residential Interiors',
        'text'     => 'A three-bedroom home rebuilt around light, storage and quiet material contrast.',
        'image'    => ak_asset( 'images/project-bedroom.jpg' ),
        'span'     => 'tall',
    ),
    array(
        'name'     => 'Besant Nagar Kitchen',
        'location' => 'Besant Nagar, Chennai',
        'type'     => 'Modular Kitchen',
        'groups'   => 'Residential Interiors',
        'text'     => 'Matte charcoal cabinetry, quartz island and warm oak for a family of five.',
        'image'    => ak_asset( 'images/project-kitchen.jpg' ),
        'span'     => 'short',
    ),
    array(
        'name'     => 'ECR Courtyard Villa',
        'location' => 'East Coast Road, Chennai',
        'type'     => 'Villa',
        'groups'   => 'Residential Construction',
        'text'     => 'Ground-up construction with a shaded courtyard core and stone facade.',
        'image'    => ak_asset( 'images/project-villa.jpg' ),
        'span'     => 'tall',
    ),
    array(
        'name'     => 'Guindy Studio Office',
        'location' => 'Guindy, Chennai',
        'type'     => 'Office',
        'groups'   => 'Commercial Interiors',
        'text'     => 'A compact workplace with acoustic timber partitions and daylight-first planning.',
        'image'    => ak_asset( 'images/project-office.jpg' ),
        'span'     => 'short',
    ),
    array(
        'name'     => 'Perungudi Apartment Block',
        'location' => 'Perungudi, Chennai',
        'type'     => 'Construction',
        'groups'   => 'Construction Commercial',
        'text'     => 'Structural execution of a four-floor residential block, delivered on schedule.',
        'image'    => ak_asset( 'images/project-construction.jpg' ),
        'span'     => 'tall',
    ),
    array(
        'name'     => 'Adyar Renovation',
        'location' => 'Adyar, Chennai',
        'type'     => 'Renovation',
        'groups'   => 'Residential Interiors',
        'text'     => 'A tired 1990s flat reworked into a calm, contemporary living space.',
        'image'    => ak_asset( 'images/after.jpg' ),
        'span'     => 'short',
    ),
);
?>
<section id="projects" class="bg-ivory py-24 sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="ak-reveal">
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Portfolio
            </span>
            <h2 class="mt-6 font-display text-[clamp(2.2rem,5.5vw,4.4rem)] leading-none">
                SELECTED PROJECTS
            </h2>
        </div>

        <!-- Filter Buttons -->
        <div class="mt-10 flex flex-wrap gap-x-7 gap-y-3" id="project-filters">
            <?php foreach ( $filters as $f ) : ?>
                <button
                    type="button"
                    data-filter="<?php echo esc_attr( $f ); ?>"
                    class="project-filter-btn label-eyebrow relative pb-2 transition-colors <?php echo 'All' === $f ? 'text-charcoal active' : 'text-taupe hover:text-charcoal'; ?>"
                >
                    <?php echo esc_html( $f ); ?>
                    <span class="filter-indicator absolute inset-x-0 bottom-0 h-px bg-bronze <?php echo 'All' === $f ? 'block' : 'hidden'; ?>"></span>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Projects Grid -->
        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3" id="projects-grid">
            <?php foreach ( $projects as $p ) : ?>
                <article
                    data-groups="<?php echo esc_attr( $p['groups'] ); ?>"
                    data-cursor="expand"
                    class="project-card group relative overflow-hidden bg-charcoal transition-all duration-500 <?php echo 'tall' === $p['span'] ? 'sm:row-span-2' : ''; ?>"
                >
                    <img
                        src="<?php echo esc_url( $p['image'] ); ?>"
                        alt="<?php echo esc_attr( $p['name'] . ' — ' . $p['type'] . ' interior design and construction project in ' . $p['location'] ); ?>"
                        width="800"
                        height="600"
                        loading="lazy"
                        class="w-full object-cover transition-transform duration-[1200ms] ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:scale-105 <?php echo 'tall' === $p['span'] ? 'h-[420px] sm:h-[680px]' : 'h-[320px]'; ?>"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal via-charcoal/20 to-transparent opacity-70 transition-opacity duration-500 group-hover:opacity-95"></div>
                    <div class="absolute inset-x-0 bottom-0 p-6 text-ivory">
                        <p class="label-eyebrow text-bronze"><?php echo esc_html( $p['type'] ); ?></p>
                        <h3 class="mt-3 font-display text-2xl transition-transform duration-500 group-hover:-translate-y-1">
                            <?php echo esc_html( $p['name'] ); ?>
                        </h3>
                        <p class="mt-1 text-xs uppercase tracking-[0.18em] text-ivory/60"><?php echo esc_html( $p['location'] ); ?></p>
                        <p class="mt-4 max-h-0 overflow-hidden text-sm leading-relaxed text-ivory/70 opacity-0 transition-all duration-500 group-hover:max-h-32 group-hover:opacity-100">
                            <?php echo esc_html( $p['text'] ); ?>
                        </p>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mt-5 inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.22em] text-ivory/0 transition-colors duration-500 group-hover:text-bronze">
                            View project
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
