<?php
/**
 * Header Template
 *
 * @package ak-interiors-civil
 */

$biz = ak_get_business_info();
$is_front = is_front_page() || is_home();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) : ?>
        <link rel="icon" href="<?php echo ak_asset( 'images/favicon.svg' ); ?>" type="image/svg+xml">
        <link rel="alternate icon" href="<?php echo ak_asset( 'images/favicon.ico' ); ?>" type="image/x-icon">
        <link rel="apple-touch-icon" href="<?php echo ak_asset( 'images/apple-touch-icon.png' ); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-softwhite text-charcoal antialiased' ); ?>>
<?php wp_body_open(); ?>
<a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[9999] focus:bg-bronze focus:text-charcoal focus:px-4 focus:py-2 focus:text-xs focus:uppercase focus:tracking-widest">Skip to main content</a>

<!-- Scroll Progress Bar -->
<div id="ak-scroll-progress" aria-hidden="true" class="fixed inset-x-0 top-0 z-[60] h-[2px] origin-left bg-bronze pointer-events-none" style="transform: scaleX(0);"></div>

<!-- Custom Cursor (Desktop) -->
<div id="ak-custom-cursor" aria-hidden="true" class="pointer-events-none fixed z-[70] hidden -translate-x-1/2 -translate-y-1/2 md:block">
    <span class="cursor-dot block rounded-full border border-bronze mix-blend-difference" style="width: 14px; height: 14px; opacity: 0.55; transition: width 0.28s cubic-bezier(0.22, 1, 0.36, 1), height 0.28s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.28s;"></span>
</div>

<!-- Site Header -->
<header
    id="site-header"
    data-over-hero="<?php echo $is_front ? 'true' : 'false'; ?>"
    class="fixed inset-x-0 top-0 z-[1000] transition-[background-color,backdrop-filter,border-color] duration-500 <?php echo $is_front ? 'border-b border-transparent bg-transparent' : 'border-b border-white/10 bg-charcoal/85 backdrop-blur-xl'; ?>"
>
    <div class="mx-auto flex h-20 max-w-[1400px] items-center justify-between px-5 sm:px-8">
        <a
            href="<?php echo esc_url( home_url( '/' ) ); ?>"
            class="font-display text-lg tracking-[0.18em] text-ivory sm:text-xl"
            aria-label="<?php echo esc_attr( $biz['name'] ); ?> — home"
        >
            AK <span class="text-bronze">INTERIORS</span> &amp; CIVIL
        </a>

        <!-- Desktop Navigation -->
        <nav aria-label="Main" class="hidden items-center gap-9 xl:flex">
            <?php
            $current_url = trailingslashit( home_url( add_query_arg( array(), $wp->request ?? '' ) ) );
            $nav_links = array(
                array( 'label' => 'Home',     'url' => home_url( '/' ) ),
                array( 'label' => 'About',    'url' => home_url( '/about/' ) ),
                array( 'label' => 'Services', 'url' => home_url( '/services/' ) ),
                array( 'label' => 'Projects', 'url' => home_url( '/projects/' ) ),
                array( 'label' => 'Process',  'url' => home_url( '/process/' ) ),
                array( 'label' => 'Contact',  'url' => home_url( '/contact/' ) ),
            );

            foreach ( $nav_links as $link ) :
                $is_active = ( trailingslashit( $link['url'] ) === $current_url );
            ?>
                <a
                    href="<?php echo esc_url( $link['url'] ); ?>"
                    data-active="<?php echo $is_active ? 'true' : 'false'; ?>"
                    class="link-underline text-[12px] uppercase tracking-[0.22em] text-ivory/80 transition-colors hover:text-ivory <?php echo $is_active ? 'text-ivory' : ''; ?>"
                >
                    <?php echo esc_html( $link['label'] ); ?>
                </a>
            <?php endforeach; ?>

            <a
                href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                class="border border-bronze px-6 py-3 text-[11px] uppercase tracking-[0.22em] text-bronze transition-colors hover:bg-bronze hover:text-charcoal"
            >
                Start Your Project
            </a>
        </nav>

        <!-- Mobile Hamburger Button -->
        <button
            type="button"
            id="mobile-menu-toggle"
            aria-expanded="false"
            aria-label="Open menu"
            class="flex h-10 w-10 shrink-0 flex-col items-center justify-center gap-[7px] xl:hidden focus:outline-none"
        >
            <span class="hamburger-bar-top block h-px w-7 bg-ivory transition-transform duration-300 origin-center"></span>
            <span class="hamburger-bar-mid block h-px w-7 bg-ivory transition-opacity duration-300"></span>
            <span class="hamburger-bar-bot block h-px w-7 bg-ivory transition-transform duration-300 origin-center"></span>
        </button>
    </div>

    <!-- Mobile Drawer -->
    <div
        id="mobile-drawer"
        class="fixed inset-y-0 right-0 z-[1001] flex w-[86%] max-w-sm flex-col justify-between bg-charcoal px-7 pb-10 pt-28 shadow-2xl xl:hidden transition-transform duration-500 translate-x-full"
        style="transition-timing-function: cubic-bezier(0.22, 1, 0.36, 1);"
    >
        <nav aria-label="Mobile" class="flex flex-col gap-6">
            <?php foreach ( $nav_links as $link ) : ?>
                <div>
                    <a
                        href="<?php echo esc_url( $link['url'] ); ?>"
                        class="mobile-nav-link font-display text-3xl text-ivory transition-colors hover:text-bronze"
                    >
                        <?php echo esc_html( $link['label'] ); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </nav>

        <div class="space-y-4 text-ivory/70">
            <a
                href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                class="block border border-bronze px-6 py-4 text-center text-[11px] uppercase tracking-[0.22em] text-bronze transition-colors hover:bg-bronze hover:text-charcoal"
            >
                Start Your Project
            </a>
            <a href="<?php echo esc_attr( $biz['phone_href'] ); ?>" class="block text-sm text-ivory/80 hover:text-bronze">
                <?php echo esc_html( $biz['phone'] ); ?>
            </a>
            <a href="<?php echo esc_attr( $biz['email_href'] ); ?>" class="block break-all text-sm text-ivory/80 hover:text-bronze">
                <?php echo esc_html( $biz['email'] ); ?>
            </a>
        </div>
    </div>
</header>
<div id="mobile-overlay" class="fixed inset-0 z-[1000] bg-black/60 opacity-0 pointer-events-none transition-opacity duration-300 xl:hidden"></div>

<main id="main-content">
