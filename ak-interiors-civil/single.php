<?php
/**
 * Single Post Template
 *
 * @package ak-interiors-civil
 */

get_header();
?>

<section class="bg-charcoal pb-20 pt-40 text-ivory sm:pb-28 sm:pt-48">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <p class="label-eyebrow text-bronze"><?php echo esc_html( get_the_date() ); ?></p>
        <h1 class="mt-7 max-w-4xl font-display text-[clamp(2.4rem,6.5vw,5rem)] leading-[1.01]">
            <?php the_title(); ?>
        </h1>
    </div>
</section>

<section class="bg-softwhite py-20">
    <div class="mx-auto max-w-[900px] px-5 sm:px-8">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="mb-12 overflow-hidden">
                <?php the_post_thumbnail( 'full', array( 'class' => 'w-full object-cover' ) ); ?>
            </div>
        <?php endif; ?>

        <article class="prose prose-lg text-charcoal leading-relaxed">
            <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            ?>
        </article>
    </div>
</section>

<?php
get_footer();
