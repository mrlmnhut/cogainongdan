<?php
require_once 'incl/widgets.php';

function register_menu(){
    register_nav_menu('header-menu', __('Header Menu'));
    register_nav_menu('footer-menu', __('Footer Menu'));
}

add_action('init', 'register_menu');

add_theme_support('post-thumbnails');

function mz_theme_setup(){
    add_image_size('news', 400, 250, TRUE); // thumb
}

add_action('after_setup_theme', 'mz_theme_setup');

/**
 * @return string
 */
function new_excerpt_more(){
    return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');

/**
 * @param $wp_customize
 */
function cgnd_customize_register($wp_customize){
    //All our sections, settings, and controls will be added here
    $wp_customize->add_section('cgnd_section', [
        'title'    => __('CGND Settings', 'CGND'),
        'priority' => 30,
    ]);
    
    $wp_customize->add_setting('cgnd_logo', [
        'transport' => 'refresh',
    ]);
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
        'cgnd_logo', [
            'label'    => __('Logo', 'CGND'),
            'section'  => 'cgnd_section',
            'settings' => 'cgnd_logo',
        ]));
    
    $wp_customize->add_setting('cgnd_footer_logo', [
        'transport' => 'refresh',
    ]);
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
        'cgnd_footer_logo', [
            'label'    => __('Footer Logo', 'CGND'),
            'section'  => 'cgnd_section',
            'settings' => 'cgnd_footer_logo',
        ]));
}

add_action('customize_register', 'cgnd_customize_register');


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/incl/bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');

function custom_post_init(){
    $args = [
        'public'   => TRUE,
        'label'    => 'Quote Cuội',
        'supports' => ['title', 'author', 'thumbnail', 'excerpt']
    ];
    register_post_type('quote-cuoi', $args);
    
    $args = [
        'public'   => TRUE,
        'label'    => 'Sự Kiện',
        'supports' => ['title', 'author', 'thumbnail', 'excerpt']
    ];
    register_post_type('event', $args);
}

add_action('init', 'custom_post_init');
