<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (! function_exists('pranto_test_setup')) {
    /**
     * Set up theme support.
     *
     * @return void
     */
    function pranto_test_setup()
    {

        if (apply_filters('pranto_test_register_menus', true)) {
            register_nav_menus(['menu-1' => esc_html__('Header', 'hello-elementor')]);
            register_nav_menus(['menu-2' => esc_html__('Footer', 'hello-elementor')]);
        }

        if (apply_filters('pranto_test_post_type_support', true)) {
            add_post_type_support('page', 'excerpt');
        }

        if (apply_filters('pranto_test_add_theme_support', true)) {
            add_theme_support('post-thumbnails');
            add_theme_support('automatic-feed-links');
            add_theme_support('title-tag');
            add_theme_support(
                'html5',
                [
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'script',
                    'style',
                    'navigation-widgets',
                ]
            );
            add_theme_support(
                'custom-logo',
                [
                    'height'      => 100,
                    'width'       => 350,
                    'flex-height' => true,
                    'flex-width'  => true,
                ]
            );
            add_theme_support('align-wide');
            add_theme_support('responsive-embeds');

            /*
			 * Editor Styles
			 */
            add_theme_support('editor-styles');
            add_editor_style('assets/css/editor-styles.css');
        }
    }
}
add_action('after_setup_theme', 'pranto_test_setup');


function pranto_test_enqueue_scripts_styles()
{

    // wp enqueue styles  
    wp_enqueue_style('pranto_test_main_style', get_stylesheet_uri());
    wp_enqueue_style('pranto_test_aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1', "all");
    wp_enqueue_style('pranto_test_slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', "all");
    wp_enqueue_style('pranto_test_lenis', 'https://unpkg.com/lenis@1.3.17/dist/lenis.css', array(), '1.3.17', "all");
    wp_enqueue_style('pranto_test_stylesheets', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', "all");


    // wp enqueue scripts  

    wp_enqueue_script('jquery');
    wp_enqueue_script('colapse-alpine-js', 'https://cdnjs.cloudflare.com/ajax/libs/alpinejs-collapse/3.15.0/cdn.min.js', array(), '3.15.0', 'true');
    wp_enqueue_script('anime-js', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js', array(), '3.2.2', 'true');
    wp_enqueue_script('alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.15.4/dist/cdn.min.js', array('colapse-alpine-js'), '2.3.0', 'true');
    wp_enqueue_script('lenis-js', 'https://unpkg.com/lenis@1.3.17/dist/lenis.min.js', array(), '1.3.17', 'true');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', 'true');
    wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', 'true');
    wp_enqueue_script('scroll-trigger-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array(), '3.2.2', 'true');
    wp_enqueue_script('split-text-js', 'https://cdn.jsdelivr.net/npm/split-type@0.3.4/umd/index.min.js', array(), '3.2.2', 'true');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery', 'gsap-js' ), '3.2.2', 'true');
}

add_action("wp_enqueue_scripts", "pranto_test_enqueue_scripts_styles");
