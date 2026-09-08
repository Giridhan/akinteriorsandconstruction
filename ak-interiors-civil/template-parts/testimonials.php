<?php
/**
 * Testimonials Section Template Part
 *
 * @package ak-interiors-civil
 */

$testimonials = array(
    array(
        'quote' => 'They handled our construction and interiors together, so we never had to chase two different teams. The house was ready close to the date they promised.',
        'name'  => 'Ramesh &amp; Kavitha',
        'place' => 'Villa, East Coast Road',
    ),
    array(
        'quote' => 'The kitchen is the best part of our flat now. Every measurement was checked twice and the finishing is genuinely clean.',
        'name'  => 'S. Priya',
        'place' => 'Apartment, Besant Nagar',
    ),
    array(
        'quote' => 'Murugan sir explained the estimate line by line before we started. There were no hidden costs at the end of the project.',
        'name'  => 'K. Anand',
        'place' => 'Office, Guindy',
    ),
);
?>
<section id="testimonials" class="bg-ivory py-24 sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="ak-reveal">
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Testimonials
            </span>
            <h2 class="mt-6 font-display text-[clamp(2rem,4.8vw,3.6rem)] leading-none">
                WHAT OUR CLIENTS SAY
            </h2>
        </div>

        <div class="relative mt-14 border-t border-border pt-14">
            <span aria-hidden="true" class="absolute -top-6 left-0 font-display text-[8rem] leading-none text-bronze/25 select-none">
                &ldquo;
            </span>

            <div id="testimonials-container" class="relative min-h-[160px]">
                <?php foreach ( $testimonials as $idx => $t ) : ?>
                    <blockquote
                        data-testimonial-index="<?php echo esc_attr( $idx ); ?>"
                        class="testimonial-slide max-w-4xl transition-all duration-500 <?php echo 0 === $idx ? 'block opacity-100' : 'hidden opacity-0'; ?>"
                    >
                        <p class="font-display text-[clamp(1.4rem,3.2vw,2.6rem)] leading-[1.3]">
                            <?php echo esc_html( $t['quote'] ); ?>
                        </p>
                        <footer class="mt-8 text-xs uppercase tracking-[0.2em] text-taupe">
                            <?php echo wp_kses_post( $t['name'] ); ?> &mdash; <?php echo esc_html( $t['place'] ); ?>
                        </footer>
                    </blockquote>
                <?php endforeach; ?>
            </div>

            <!-- Controls -->
            <div class="mt-12 flex items-center gap-4">
                <button
                    type="button"
                    id="testimonial-prev-btn"
                    aria-label="Previous testimonial"
                    class="flex h-12 w-12 items-center justify-center border border-border transition-colors hover:border-bronze hover:text-bronze"
                >
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                </button>
                <button
                    type="button"
                    id="testimonial-next-btn"
                    aria-label="Next testimonial"
                    class="flex h-12 w-12 items-center justify-center border border-border transition-colors hover:border-bronze hover:text-bronze"
                >
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </button>
                <span id="testimonial-counter" class="label-eyebrow ml-3 text-taupe">
                    01 / <?php echo sprintf( '%02d', count( $testimonials ) ); ?>
                </span>
            </div>
        </div>
    </div>
</section>
