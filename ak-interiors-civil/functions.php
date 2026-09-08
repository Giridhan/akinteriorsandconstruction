<?php
/**
 * AK Interiors & Civil Theme Functions
 *
 * @package ak-interiors-civil
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function ak_interiors_setup() {
    // Add default title tag support
    add_theme_support( 'title-tag' );

    // Add post-thumbnails support
    add_theme_support( 'post-thumbnails' );

    // Add HTML5 markup support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'ak-interiors-civil' ),
    ) );
}
add_action( 'after_setup_theme', 'ak_interiors_setup' );

/**
 * Business Information Helpers
 */
function ak_get_business_info() {
    $phone = get_theme_mod( 'ak_phone', '+91 91769 22419' );
    $phone_digits = preg_replace( '/[^0-9]/', '', $phone );
    $email = get_theme_mod( 'ak_email', 'akinterior251@gmail.com' );
    $owner = get_theme_mod( 'ak_owner', 'T. Murugan' );
    $name  = get_theme_mod( 'ak_business_name', 'AK Interiors & Civil' );
    $addr  = get_theme_mod( 'ak_address', 'Gandhi Street, Chennai, Tamil Nadu' );
    $tagline = get_theme_mod( 'ak_tagline', 'DESIGN. BUILD. TRANSFORM.' );

    $whatsapp_msg = rawurlencode( 'Hello AK Interiors & Civil, I would like to enquire about an interior/civil construction project.' );
    $whatsapp_url = 'https://wa.me/' . $phone_digits . '?text=' . $whatsapp_msg;

    return array(
        'name'          => $name,
        'owner'         => $owner,
        'tagline'       => $tagline,
        'phone'         => $phone,
        'phone_href'    => 'tel:+' . $phone_digits,
        'email'         => $email,
        'email_href'    => 'mailto:' . $email,
        'address'       => $addr,
        'whatsapp_url'  => $whatsapp_url,
        'form_endpoint' => get_theme_mod( 'ak_form_endpoint', 'https://formsubmit.co/akinterior251@gmail.com' ),
    );
}

/**
 * Return Asset URL Helper
 */
function ak_asset( $relative_path ) {
    return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $relative_path, '/' ) );
}

/**
 * Enqueue Scripts and Styles
 */
function ak_interiors_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'ak-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap',
        array(),
        null
    );

    // Main Theme Compiled CSS
    wp_enqueue_style(
        'ak-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array('ak-google-fonts'),
        '1.1.0'
    );

    // Root Theme Style.css
    wp_enqueue_style(
        'ak-theme-style',
        get_stylesheet_uri(),
        array('ak-main-style'),
        '1.1.0'
    );

    // Lead Tracking Script
    wp_enqueue_script(
        'ak-lead-tracking',
        get_template_directory_uri() . '/assets/js/lead-tracking.js',
        array(),
        '1.1.0',
        true
    );

    // Main Theme JavaScript
    wp_enqueue_script(
        'ak-main-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array('ak-lead-tracking'),
        '1.1.0',
        true
    );

    $biz = ak_get_business_info();
    wp_localize_script( 'ak-main-script', 'akThemeData', array(
        'themeUrl'      => get_template_directory_uri(),
        'homeUrl'       => home_url( '/' ),
        'phone'         => $biz['phone'],
        'phoneHref'     => $biz['phone_href'],
        'whatsappHref'  => $biz['whatsapp_url'],
        'email'         => $biz['email'],
        'formEndpoint'  => $biz['form_endpoint'],
        'successUrl'    => home_url( '/enquiry-success/' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'ak_interiors_scripts' );

/**
 * Preconnect for Google Fonts
 */
function ak_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'ak-google-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'ak_resource_hints', 10, 2 );

/**
 * WordPress Customizer Settings
 */
function ak_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'ak_business_section', array(
        'title'       => __( 'Business Information', 'ak-interiors-civil' ),
        'priority'    => 30,
        'description' => __( 'Customize business name, owner, phone, email, and location details.', 'ak-interiors-civil' ),
    ) );

    // Business Name
    $wp_customize->add_setting( 'ak_business_name', array(
        'default'           => 'AK Interiors & Civil',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'ak_business_name', array(
        'label'    => __( 'Business Name', 'ak-interiors-civil' ),
        'section'  => 'ak_business_section',
        'type'     => 'text',
    ) );

    // Owner Name
    $wp_customize->add_setting( 'ak_owner', array(
        'default'           => 'T. Murugan',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'ak_owner', array(
        'label'    => __( 'Owner Name', 'ak-interiors-civil' ),
        'section'  => 'ak_business_section',
        'type'     => 'text',
    ) );

    // Tagline
    $wp_customize->add_setting( 'ak_tagline', array(
        'default'           => 'DESIGN. BUILD. TRANSFORM.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'ak_tagline', array(
        'label'    => __( 'Tagline', 'ak-interiors-civil' ),
        'section'  => 'ak_business_section',
        'type'     => 'text',
    ) );

    // Phone Number
    $wp_customize->add_setting( 'ak_phone', array(
        'default'           => '+91 91769 22419',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'ak_phone', array(
        'label'    => __( 'Phone Number', 'ak-interiors-civil' ),
        'section'  => 'ak_business_section',
        'type'     => 'text',
    ) );

    // Email Address
    $wp_customize->add_setting( 'ak_email', array(
        'default'           => 'akinterior251@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'ak_email', array(
        'label'    => __( 'Email Address', 'ak-interiors-civil' ),
        'section'  => 'ak_business_section',
        'type'     => 'email',
    ) );

    // Address
    $wp_customize->add_setting( 'ak_address', array(
        'default'           => 'Gandhi Street, Chennai, Tamil Nadu',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'ak_address', array(
        'label'    => __( 'Physical Address', 'ak-interiors-civil' ),
        'section'  => 'ak_business_section',
        'type'     => 'text',
    ) );

    // FormSubmit Endpoint
    $wp_customize->add_setting( 'ak_form_endpoint', array(
        'default'           => 'https://formsubmit.co/akinterior251@gmail.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'ak_form_endpoint', array(
        'label'    => __( 'Enquiry Form Endpoint (FormSubmit)', 'ak-interiors-civil' ),
        'section'  => 'ak_business_section',
        'type'     => 'url',
    ) );
}
add_action( 'customize_register', 'ak_customize_register' );

/**
 * Setup Pages and Navigation on Theme Activation
 */
function ak_interiors_theme_activated() {
    $pages = array(
        'home' => array(
            'title'   => 'Home',
            'content' => '',
        ),
        'about' => array(
            'title'   => 'About',
            'content' => '',
        ),
        'services' => array(
            'title'   => 'Services',
            'content' => '',
        ),
        'projects' => array(
            'title'   => 'Projects',
            'content' => '',
        ),
        'process' => array(
            'title'   => 'Process',
            'content' => '',
        ),
        'contact' => array(
            'title'   => 'Contact',
            'content' => '',
        ),
        'enquiry-success' => array(
            'title'   => 'Enquiry Received',
            'content' => '',
        ),
    );

    $page_ids = array();
    foreach ( $pages as $slug => $data ) {
        $existing = get_page_by_path( $slug );
        if ( ! $existing ) {
            $id = wp_insert_post( array(
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => $data['content'],
            ) );
            if ( $id && ! is_wp_error( $id ) ) {
                $page_ids[ $slug ] = $id;
            }
        } else {
            $page_ids[ $slug ] = $existing->ID;
        }
    }

    // Assign front page to 'home'
    if ( isset( $page_ids['home'] ) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $page_ids['home'] );
    }

    // Create Primary Menu if no menu exists
    $menu_name = 'Primary Navigation';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );
        if ( $menu_id && ! is_wp_error( $menu_id ) ) {
            $menu_items = array(
                array( 'title' => 'Home',     'url' => home_url( '/' ) ),
                array( 'title' => 'About',    'url' => home_url( '/about/' ) ),
                array( 'title' => 'Services', 'url' => home_url( '/services/' ) ),
                array( 'title' => 'Projects', 'url' => home_url( '/projects/' ) ),
                array( 'title' => 'Process',  'url' => home_url( '/process/' ) ),
                array( 'title' => 'Contact',  'url' => home_url( '/contact/' ) ),
            );

            foreach ( $menu_items as $item ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'   => $item['title'],
                    'menu-item-url'     => $item['url'],
                    'menu-item-status'  => 'publish',
                    'menu-item-type'    => 'custom',
                ) );
            }

            $locations = get_theme_mod( 'nav_menu_locations' );
            if ( ! is_array( $locations ) ) {
                $locations = array();
            }
            $locations['primary'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }
}
add_action( 'after_switch_theme', 'ak_interiors_theme_activated' );

/**
 * Production SEO Optimization Engine
 */
require_once get_template_directory() . '/inc/seo.php';
