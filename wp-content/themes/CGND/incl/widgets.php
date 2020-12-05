<?php
if (!defined('ABSPATH')){
    return;
}

foreach (glob(__DIR__ . "/widgets/*.php") as $filename){
    include $filename;
}

/**
 * Add a widget sidebar.
 */
function widgets(){
    register_sidebar([
        'name'          => 'Header Widget',
        'id'            => 'header_widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s header-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ]);
    
    register_sidebar([
        'name'          => 'Footer Left Widget',
        'id'            => 'footer_left_widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s footer-left-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ]);
    
    register_sidebar([
        'name'          => 'Registration Post Form Widget',
        'id'            => 'registration_post_form_widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s registration-post-form-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ]);
    
    register_sidebar([
        'name'          => 'Footer Menu Widget',
        'id'            => 'footer_menu_widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s footer-menu-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ]);
    
    register_sidebar([
        'name'          => 'Fanpage Widget',
        'id'            => 'fanpage_widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s fanpage-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ]);
}

add_action('widgets_init', 'widgets');
