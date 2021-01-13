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
        'name'          => 'Subcription Form Widget',
        'id'            => 'subcription_form_widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s subcription-form-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ]);
    
    register_sidebar([
        'name'          => 'Footer Social Widget',
        'id'            => 'footer_social_widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s footer-social-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ]);
}

add_action('widgets_init', 'widgets');
