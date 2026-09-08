<?php
/**
 * SEO & Structured Data Management
 *
 * Centralized SEO configuration and output for AK Interiors & Civil.
 * Adheres strictly to Google Search guidelines: people-first content,
 * accurate structured data, canonical consistency, and clean social metadata.
 *
 * @package ak-interiors-civil
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Return centralized SEO configuration
 */
function ak_seo_config() {
    $biz = ak_get_business_info();

    return array(
        'site_name'    => 'AK Interiors & Civil',
        'site_url'     => home_url( '/' ),
        'business_name'=> $biz['name'] ?? 'AK Interiors & Civil',
        'category'     => 'Interior Design & Civil Construction',
        'owner'        => $biz['owner'] ?? 'T. Murugan',
        'phone'        => $biz['phone'] ?? '+91 91769 22419',
        'email'        => $biz['email'] ?? 'akinterior251@gmail.com',
        'street'       => 'Gandhi Street',
        'locality'     => 'Chennai',
        'region'       => 'Tamil Nadu',
        'country'      => 'IN',
        'full_address' => $biz['address'] ?? 'Gandhi Street, Chennai, Tamil Nadu',
        'service_areas'=> array(
            'Tamil Nadu',
            'Chennai',
            'Pondicherry',
            'Puducherry',
        ),
        'default_og_image' => ak_asset( 'images/hero.jpg' ),
        'default_desc'     => 'AK Interiors & Civil provides interior design, home interiors, commercial interiors, renovation, civil construction and turnkey project solutions across Chennai, Pondicherry and Tamil Nadu.',
    );
}

/**
 * Get current page slug
 */
function ak_get_current_slug() {
    if ( is_front_page() || is_home() ) {
        return 'home';
    }
    if ( is_404() ) {
        return '404';
    }
    global $post;
    if ( $post && isset( $post->post_name ) ) {
        return $post->post_name;
    }
    $path = trim( parse_url( add_query_arg( array() ), PHP_URL_PATH ), '/' );
    return $path ? sanitize_title( $path ) : 'page';
}

/**
 * Filter document title (pre_get_document_title)
 *
 * Guarantees unique, brand-first, human-readable titles across all important pages.
 */
function ak_seo_document_title( $title ) {
    $slug = ak_get_current_slug();

    $titles = array(
        'home'            => 'AK Interiors & Civil | Interior Design & Civil Construction in Chennai',
        'about'           => 'About AK Interiors & Civil | Chennai Interior & Construction Company',
        'services'        => 'Interior Design & Civil Construction Services in Chennai | AK Interiors & Civil',
        'projects'        => 'Interior Design & Construction Projects in Chennai | AK Interiors & Civil',
        'process'         => 'Design & Construction Process | AK Interiors & Civil',
        'contact'         => 'Contact AK Interiors & Civil | Interior Designers & Civil Contractors Chennai',
        'enquiry-success' => 'Enquiry Received | AK Interiors & Civil',
        '404'             => 'Page Not Found | AK Interiors & Civil',
    );

    if ( isset( $titles[ $slug ] ) ) {
        return $titles[ $slug ];
    }

    if ( is_singular() ) {
        return single_post_title( '', false ) . ' | AK Interiors & Civil';
    }

    return 'AK Interiors & Civil | Interior Design & Civil Construction in Chennai';
}
add_filter( 'pre_get_document_title', 'ak_seo_document_title', 20 );

/**
 * Get unique meta description per page
 */
function ak_get_page_description() {
    $slug = ak_get_current_slug();

    $descriptions = array(
        'home' => 'AK Interiors & Civil provides interior design, home interiors, commercial interiors, renovation, civil construction and turnkey project solutions across Chennai, Pondicherry and Tamil Nadu.',
        'about' => 'Learn about AK Interiors & Civil, led by T. Murugan in Chennai. We combine bespoke interior design and dependable civil construction for residential and commercial projects.',
        'services' => 'Explore residential interior design, villa interiors, modular kitchens, civil construction, commercial office interiors, renovation, and turnkey solutions in Chennai and Pondicherry.',
        'projects' => 'View selected residential interiors, contemporary modular kitchens, luxury villas, commercial workplaces, and civil construction projects across Chennai and Tamil Nadu.',
        'process' => 'Discover our transparent 6-stage design and build process from initial consultation, 3D visualization, and material planning to civil construction and turnkey handover.',
        'contact' => 'Contact AK Interiors & Civil in Chennai. Call +91 91769 22419 or message on WhatsApp for residential and commercial interior design and civil construction consultations.',
        'enquiry-success' => 'Thank you for contacting AK Interiors & Civil. Your project enquiry has been received and our team will get in touch with you shortly.',
        '404' => 'The page you requested could not be found. Explore interior design and civil construction services from AK Interiors & Civil in Chennai.',
    );

    return $descriptions[ $slug ] ?? $descriptions['home'];
}

/**
 * Get clean canonical URL for current request
 */
function ak_get_canonical_url() {
    if ( is_front_page() || is_home() ) {
        return home_url( '/' );
    }

    $slug = ak_get_current_slug();
    if ( '404' === $slug ) {
        return home_url( '/' );
    }

    if ( is_page() ) {
        return trailingslashit( get_permalink() );
    }

    return home_url( '/' . $slug . '/' );
}

/**
 * Output SEO metadata, Open Graph, Twitter cards, and Schema.org in wp_head
 */
function ak_seo_head() {
    $config    = ak_seo_config();
    $title     = wp_get_document_title();
    $desc      = ak_get_page_description();
    $canonical = ak_get_canonical_url();
    $og_image  = $config['default_og_image'];
    $slug      = ak_get_current_slug();

    // Prevent duplicate output from third-party plugins if already handled
    echo "<!-- AK Interiors & Civil — Production SEO -->\n";
    echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";
    echo '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">' . "\n";

    // Open Graph Metadata
    echo '<meta property="og:site_name" content="' . esc_attr( $config['site_name'] ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $canonical ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:locale" content="en_US">' . "\n";
    echo '<meta property="og:image" content="' . esc_url( $og_image ) . '">' . "\n";
    echo '<meta property="og:image:width" content="1920">' . "\n";
    echo '<meta property="og:image:height" content="1088">' . "\n";
    echo '<meta property="og:image:alt" content="' . esc_attr( $config['site_name'] . ' — Interior Design & Civil Construction in Chennai' ) . '">' . "\n";

    // Twitter / X Card
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr( $desc ) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url( $og_image ) . '">' . "\n";

    // Build JSON-LD Graph
    $graph = array();

    // 1. LocalBusiness / GeneralContractor Entity
    $business_schema = array(
        '@type'       => array( 'LocalBusiness', 'GeneralContractor' ),
        '@id'         => home_url( '/#business' ),
        'name'        => $config['business_name'],
        'legalName'   => $config['business_name'],
        'url'         => home_url( '/' ),
        'logo'        => ak_asset( 'images/favicon.svg' ),
        'image'       => ak_asset( 'images/hero.jpg' ),
        'telephone'   => $config['phone'],
        'email'       => $config['email'],
        'founder'     => array(
            '@type' => 'Person',
            'name'  => $config['owner'],
        ),
        'address'     => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => $config['street'],
            'addressLocality' => $config['locality'],
            'addressRegion'   => $config['region'],
            'addressCountry'  => $config['country'],
        ),
        'areaServed'  => array(
            array( '@type' => 'AdministrativeArea', 'name' => 'Tamil Nadu' ),
            array( '@type' => 'City', 'name' => 'Chennai' ),
            array( '@type' => 'City', 'name' => 'Pondicherry' ),
            array( '@type' => 'City', 'name' => 'Puducherry' ),
        ),
        'description' => 'AK Interiors & Civil is an interior design and civil construction company serving clients across Tamil Nadu, with a strong focus on Chennai and Pondicherry. The company provides residential and commercial interior design, home interiors, modular kitchens, renovation, civil construction, building construction and turnkey project services, helping customers take projects from design through execution.',
        'hasOfferCatalog' => array(
            '@type' => 'OfferCatalog',
            'name'  => 'Interior Design and Civil Construction Services',
            'itemListElement' => array(
                array(
                    '@type'       => 'Offer',
                    'itemOffered' => array(
                        '@type'       => 'Service',
                        'name'        => 'Residential Interior Design',
                        'description' => 'Comprehensive interior design and decoration for villas, apartments, and independent homes in Chennai and Tamil Nadu.',
                    ),
                ),
                array(
                    '@type'       => 'Offer',
                    'itemOffered' => array(
                        '@type'       => 'Service',
                        'name'        => 'Civil Construction',
                        'description' => 'Ground-up residential and commercial building construction, structural execution, and civil contracting.',
                    ),
                ),
                array(
                    '@type'       => 'Offer',
                    'itemOffered' => array(
                        '@type'       => 'Service',
                        'name'        => 'Modular Kitchens',
                        'description' => 'Custom modern modular kitchen design, fabrication, and installation with high-durability hardware.',
                    ),
                ),
                array(
                    '@type'       => 'Offer',
                    'itemOffered' => array(
                        '@type'       => 'Service',
                        'name'        => 'Commercial & Office Interiors',
                        'description' => 'Ergonomic workplace design, acoustic partitions, conference rooms, and commercial turnkey interiors.',
                    ),
                ),
                array(
                    '@type'       => 'Offer',
                    'itemOffered' => array(
                        '@type'       => 'Service',
                        'name'        => 'Home Renovation & Remodeling',
                        'description' => 'Complete home and apartment renovation, structural upgrades, and modern interior transformations.',
                    ),
                ),
                array(
                    '@type'       => 'Offer',
                    'itemOffered' => array(
                        '@type'       => 'Service',
                        'name'        => 'Turnkey Project Execution',
                        'description' => 'Integrated design-to-build turnkey delivery ensuring cost transparency, timeline control, and single-point accountability.',
                    ),
                ),
            ),
        ),
    );
    $graph[] = $business_schema;

    // 2. WebSite Entity
    $website_schema = array(
        '@type'       => 'WebSite',
        '@id'         => home_url( '/#website' ),
        'url'         => home_url( '/' ),
        'name'        => $config['business_name'],
        'description' => 'Interior Design & Civil Construction in Chennai, Pondicherry & Tamil Nadu',
        'publisher'   => array( '@id' => home_url( '/#business' ) ),
        'inLanguage'  => 'en-US',
    );
    $graph[] = $website_schema;

    // 3. WebPage Entity
    $webpage_schema = array(
        '@type'       => 'WebPage',
        '@id'         => $canonical . '#webpage',
        'url'         => $canonical,
        'name'        => $title,
        'description' => $desc,
        'isPartOf'    => array( '@id' => home_url( '/#website' ) ),
        'about'       => array( '@id' => home_url( '/#business' ) ),
        'inLanguage'  => 'en-US',
    );
    $graph[] = $webpage_schema;

    // 4. BreadcrumbList (for inner pages)
    if ( ! ( is_front_page() || is_home() ) && 'home' !== $slug ) {
        $page_labels = array(
            'about'           => 'About',
            'services'        => 'Services',
            'projects'        => 'Projects',
            'process'         => 'Process',
            'contact'         => 'Contact',
            'enquiry-success' => 'Enquiry Received',
        );
        $current_label = $page_labels[ $slug ] ?? get_the_title();

        $breadcrumbs_schema = array(
            '@type'           => 'BreadcrumbList',
            '@id'             => $canonical . '#breadcrumb',
            'itemListElement' => array(
                array(
                    '@type'    => 'ListItem',
                    'position' => 1,
                    'name'     => 'Home',
                    'item'     => home_url( '/' ),
                ),
                array(
                    '@type'    => 'ListItem',
                    'position' => 2,
                    'name'     => $current_label,
                    'item'     => $canonical,
                ),
            ),
        );
        $graph[] = $breadcrumbs_schema;
    }

    $schema_payload = array(
        '@context' => 'https://schema.org',
        '@graph'   => $graph,
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema_payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ) . "\n";
    echo "</script>\n";
    echo "<!-- /AK Interiors & Civil SEO -->\n";
}
add_action( 'wp_head', 'ak_seo_head', 1 );

/**
 * Remove default WordPress actions that conflict with custom SEO metadata
 */
function ak_seo_clean_wp_head() {
    remove_action( 'wp_head', 'rel_canonical' );
    remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'ak_seo_clean_wp_head' );


/**
 * Filter robots.txt to guarantee valid sitemap directive and clean bot access
 */
function ak_seo_robots_txt( $output, $public ) {
    $sitemap_url = home_url( '/wp-sitemap.xml' );

    $robots = "User-agent: *\n";
    $robots .= "Disallow: /wp-admin/\n";
    $robots .= "Allow: /wp-admin/admin-ajax.php\n";
    $robots .= "\n";
    $robots .= "Sitemap: {$sitemap_url}\n";

    return $robots;
}
add_filter( 'robots_txt', 'ak_seo_robots_txt', 20, 2 );

/**
 * Redirect /sitemap.xml to /wp-sitemap.xml if accessed directly
 */
function ak_seo_sitemap_redirect() {
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';
    if ( preg_match( '#^/sitemap\.xml/?$#i', $request_uri ) ) {
        wp_safe_redirect( home_url( '/wp-sitemap.xml' ), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'ak_seo_sitemap_redirect', 1 );
