<?php
/**
 * Main Index Fallback Template
 *
 * @package ak-interiors-civil
 */

get_header();
?>

<section class="bg-charcoal pb-20 pt-40 text-ivory sm:pb-28 sm:pt-48">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <h1 class="font-display text-[clamp(2.4rem,6.5vw,5rem)] leading-[1.01]">
            <?php single_post_title(); ?>
        </h1>
    </div>
</section>

<section class="bg-softwhite py-20">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <?php if ( have_posts() ) : ?>
            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                <?php
                while ( have_posts() ) : the_post();
                ?>
                    <article class="border border-border bg-white p-6">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="block mb-4 overflow-hidden">
                                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-48 object-cover hover:scale-105 transition-transform duration-500' ) ); ?>
                            </a>
                        <?php endif; ?>
                        <p class="label-eyebrow text-bronze"><?php echo esc_html( get_the_date() ); ?></p>
                        <h2 class="mt-2 font-display text-2xl">
                            <a href="<?php the_permalink(); ?>" class="hover:text-bronze transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="mt-3 text-sm text-muted-foreground line-clamp-3">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="mt-4 inline-block text-xs uppercase tracking-[0.18em] text-bronze font-medium hover:underline">
                            Read More &rarr;
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="mt-12">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p class="text-center text-muted-foreground">No posts found.</p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
