<?php
/**
 * Page Template
 *
 * Semantic page template with visible breadcrumbs, tailored H1 headings,
 * and structured sections for about, services, projects, process, and contact.
 *
 * @package ak-interiors-civil
 */

get_header();

global $post;
$slug = $post ? $post->post_name : '';
?>

<?php if ( 'about' === $slug ) : ?>

    <section class="bg-charcoal pb-20 pt-40 text-ivory sm:pb-28 sm:pt-48">
        <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
            <nav aria-label="Breadcrumb" class="mb-6">
                <ol class="flex items-center gap-2 text-xs uppercase tracking-[0.2em] text-ivory/50">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-bronze">Home</a></li>
                    <li aria-hidden="true">&rsaquo;</li>
                    <li class="text-bronze" aria-current="page">About</li>
                </ol>
            </nav>
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Who We Are &bull; Chennai &bull; Tamil Nadu
            </span>
            <h1 class="mt-7 max-w-4xl font-display text-[clamp(2.4rem,6.5vw,4.8rem)] leading-[1.01]">
                ABOUT AK INTERIORS &amp; CIVIL
            </h1>
            <p class="mt-8 max-w-2xl text-base leading-relaxed text-ivory/70">
                Led by T. Murugan in Chennai, AK Interiors &amp; Civil combines bespoke interior design with dependable structural civil construction, delivering turnkey projects across Chennai, Pondicherry, and Tamil Nadu.
            </p>
        </div>
    </section>
    <?php get_template_part( 'template-parts/intro' ); ?>
    <?php get_template_part( 'template-parts/why-us' ); ?>
    <?php get_template_part( 'template-parts/service-areas' ); ?>
    <?php get_template_part( 'template-parts/materials' ); ?>
    <?php get_template_part( 'template-parts/stats' ); ?>
    <?php get_template_part( 'template-parts/testimonials' ); ?>
    <?php get_template_part( 'template-parts/cta' ); ?>

<?php elseif ( 'services' === $slug ) : ?>

    <section class="bg-charcoal pb-20 pt-40 text-ivory sm:pb-28 sm:pt-48">
        <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
            <nav aria-label="Breadcrumb" class="mb-6">
                <ol class="flex items-center gap-2 text-xs uppercase tracking-[0.2em] text-ivory/50">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-bronze">Home</a></li>
                    <li aria-hidden="true">&rsaquo;</li>
                    <li class="text-bronze" aria-current="page">Services</li>
                </ol>
            </nav>
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Design &bull; Build &bull; Renovate
            </span>
            <h1 class="mt-7 max-w-4xl font-display text-[clamp(2.4rem,6.5vw,4.8rem)] leading-[1.01]">
                INTERIOR DESIGN &amp; CIVIL CONSTRUCTION SERVICES
            </h1>
            <p class="mt-8 max-w-2xl text-base leading-relaxed text-ivory/70">
                Residential interior design, villa interiors, modular kitchens, commercial offices, building construction, and turnkey project management across Chennai and Tamil Nadu.
            </p>
        </div>
    </section>
    <?php get_template_part( 'template-parts/services' ); ?>
    <?php get_template_part( 'template-parts/featured' ); ?>
    <?php get_template_part( 'template-parts/service-areas' ); ?>
    <?php get_template_part( 'template-parts/materials' ); ?>
    <?php get_template_part( 'template-parts/faq' ); ?>
    <?php get_template_part( 'template-parts/enquiry-form' ); ?>
    <?php get_template_part( 'template-parts/cta' ); ?>

<?php elseif ( 'projects' === $slug ) : ?>

    <section class="bg-charcoal pb-20 pt-40 text-ivory sm:pb-28 sm:pt-48">
        <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
            <nav aria-label="Breadcrumb" class="mb-6">
                <ol class="flex items-center gap-2 text-xs uppercase tracking-[0.2em] text-ivory/50">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-bronze">Home</a></li>
                    <li aria-hidden="true">&rsaquo;</li>
                    <li class="text-bronze" aria-current="page">Projects</li>
                </ol>
            </nav>
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Portfolio &bull; Chennai &amp; Beyond
            </span>
            <h1 class="mt-7 max-w-4xl font-display text-[clamp(2.4rem,6.5vw,4.8rem)] leading-[1.01]">
                INTERIOR DESIGN &amp; CONSTRUCTION PROJECTS
            </h1>
            <p class="mt-8 max-w-2xl text-base leading-relaxed text-ivory/70">
                Selected residential homes, luxury villas, modular kitchens, workplace fit-outs, and civil structures completed across Chennai, ECR, and Tamil Nadu.
            </p>
        </div>
    </section>
    <?php get_template_part( 'template-parts/projects' ); ?>
    <?php get_template_part( 'template-parts/featured' ); ?>
    <?php get_template_part( 'template-parts/before-after' ); ?>
    <?php get_template_part( 'template-parts/showcase' ); ?>
    <?php get_template_part( 'template-parts/cta' ); ?>

<?php elseif ( 'process' === $slug ) : ?>

    <section class="bg-charcoal pb-20 pt-40 text-ivory sm:pb-28 sm:pt-48">
        <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
            <nav aria-label="Breadcrumb" class="mb-6">
                <ol class="flex items-center gap-2 text-xs uppercase tracking-[0.2em] text-ivory/50">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-bronze">Home</a></li>
                    <li aria-hidden="true">&rsaquo;</li>
                    <li class="text-bronze" aria-current="page">Process</li>
                </ol>
            </nav>
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Turnkey Workflow
            </span>
            <h1 class="mt-7 max-w-4xl font-display text-[clamp(2.4rem,6.5vw,4.8rem)] leading-[1.01]">
                DESIGN &amp; CONSTRUCTION PROCESS
            </h1>
            <p class="mt-8 max-w-2xl text-base leading-relaxed text-ivory/70">
                A structured 6-stage approach keeping budgets transparent, materials verified, and site milestones tracked from first consultation to final handover.
            </p>
        </div>
    </section>
    <?php get_template_part( 'template-parts/process' ); ?>
    <?php get_template_part( 'template-parts/why-us' ); ?>
    <?php get_template_part( 'template-parts/stats' ); ?>
    <?php get_template_part( 'template-parts/faq' ); ?>
    <?php get_template_part( 'template-parts/enquiry-form' ); ?>

<?php elseif ( 'contact' === $slug ) : ?>

    <section class="bg-charcoal pb-20 pt-40 text-ivory sm:pb-28 sm:pt-48">
        <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
            <nav aria-label="Breadcrumb" class="mb-6">
                <ol class="flex items-center gap-2 text-xs uppercase tracking-[0.2em] text-ivory/50">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-bronze">Home</a></li>
                    <li aria-hidden="true">&rsaquo;</li>
                    <li class="text-bronze" aria-current="page">Contact</li>
                </ol>
            </nav>
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Start Your Project
            </span>
            <h1 class="mt-7 max-w-4xl font-display text-[clamp(2.4rem,6.5vw,4.8rem)] leading-[1.01]">
                CONTACT AK INTERIORS &amp; CIVIL
            </h1>
            <p class="mt-8 max-w-2xl text-base leading-relaxed text-ivory/70">
                Consult with founder T. Murugan about your interior design, modular kitchen, civil construction, or renovation project in Chennai, Pondicherry, or anywhere in Tamil Nadu.
            </p>
        </div>
    </section>
    <?php get_template_part( 'template-parts/enquiry-form' ); ?>
    <?php get_template_part( 'template-parts/contact' ); ?>
    <?php get_template_part( 'template-parts/service-areas' ); ?>

<?php elseif ( 'enquiry-success' === $slug ) : ?>

    <section class="flex min-h-[78svh] items-center bg-charcoal px-5 pb-20 pt-40 text-ivory sm:px-8 sm:pt-48">
        <div class="mx-auto w-full max-w-[1400px]">
            <div class="max-w-2xl border-l border-bronze pl-6 sm:pl-10">
                <span class="flex h-12 w-12 items-center justify-center border border-bronze text-bronze" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                </span>
                <h1 class="mt-8 font-display text-[clamp(3rem,7vw,6rem)] leading-none">Thank You!</h1>
                <p class="mt-7 text-lg leading-relaxed text-ivory/70">
                    Your project enquiry has been received successfully.<br>
                    Our team will contact you shortly.
                </p>
                <a
                    href="<?php echo esc_url( home_url( '/' ) ); ?>"
                    class="mt-10 inline-flex bg-bronze px-8 py-4 text-[11px] uppercase tracking-[0.22em] text-charcoal transition-colors hover:bg-ivory"
                >
                    Back to Website
                </a>
            </div>
        </div>
    </section>

<?php else : ?>

    <section class="bg-charcoal pb-20 pt-40 text-ivory sm:pb-28 sm:pt-48">
        <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
            <h1 class="font-display text-[clamp(2.4rem,6.5vw,5rem)] leading-[1.01]">
                <?php the_title(); ?>
            </h1>
        </div>
    </section>
    <section class="bg-softwhite py-20">
        <div class="mx-auto max-w-[1400px] px-5 sm:px-8 prose prose-lg">
            <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </section>

<?php endif; ?>

<?php
get_footer();
