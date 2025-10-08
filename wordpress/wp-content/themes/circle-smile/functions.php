<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'circle_smile_enqueue_style' ) ) {
    function circle_smile_enqueue_style( string $handle, string $relative_path, array $deps = [] ) {
        $relative_path = ltrim( $relative_path, '/' );
        $file_path     = get_template_directory() . '/assets/css/' . $relative_path;

        if ( file_exists( $file_path ) ) {
            wp_enqueue_style(
                $handle,
                get_template_directory_uri() . '/assets/css/' . $relative_path,
                $deps,
                filemtime( $file_path )
            );
        }
    }
}

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
});

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_script( 'circle-smile-tailwind', 'https://cdn.tailwindcss.com', [], null, false );

    circle_smile_enqueue_style( 'circle-smile-home', 'home.css' );

    circle_smile_enqueue_style( 'circle-smile-subpage', 'subpage-base.css', [ 'circle-smile-home' ] );

    if ( is_page( 'faq' ) ) {
        circle_smile_enqueue_style( 'circle-smile-faq', 'faq.css', [ 'circle-smile-subpage' ] );
    }

    if ( is_page( 'profiles' ) ) {
        circle_smile_enqueue_style( 'circle-smile-profiles', 'profiles.css', [ 'circle-smile-subpage' ] );
    }

    $script_path = get_template_directory() . '/assets/js/main.js';
    if ( file_exists( $script_path ) ) {
        wp_enqueue_script(
            'circle-smile-main',
            get_template_directory_uri() . '/assets/js/main.js',
            [],
            filemtime( $script_path ),
            true
        );
    }
});
