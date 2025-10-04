<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
});

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_script( 'circle-smile-tailwind', 'https://cdn.tailwindcss.com', [], null, false );

    $home_css_path = get_template_directory() . '/assets/css/home.css';
    if ( file_exists( $home_css_path ) ) {
        wp_enqueue_style(
            'circle-smile-home',
            get_template_directory_uri() . '/assets/css/home.css',
            [],
            filemtime( $home_css_path )
        );
    }

    $subpage_css_path = get_template_directory() . '/assets/css/subpage-base.css';
    if ( file_exists( $subpage_css_path ) ) {
        wp_enqueue_style(
            'circle-smile-subpage',
            get_template_directory_uri() . '/assets/css/subpage-base.css',
            [ 'circle-smile-home' ],
            filemtime( $subpage_css_path )
        );
    }

    if ( is_page( 'faq' ) ) {
        $faq_css_path = get_template_directory() . '/assets/css/faq.css';
        if ( file_exists( $faq_css_path ) ) {
            wp_enqueue_style(
                'circle-smile-faq',
                get_template_directory_uri() . '/assets/css/faq.css',
                [ 'circle-smile-subpage' ],
                filemtime( $faq_css_path )
            );
        }
    }

    if ( is_page( 'profiles' ) ) {
        $profiles_css_path = get_template_directory() . '/assets/css/profiles.css';
        if ( file_exists( $profiles_css_path ) ) {
            wp_enqueue_style(
                'circle-smile-profiles',
                get_template_directory_uri() . '/assets/css/profiles.css',
                [ 'circle-smile-subpage' ],
                filemtime( $profiles_css_path )
            );
        }
    }
});
