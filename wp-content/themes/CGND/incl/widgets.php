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
        'name'          => 'Footer Top Widget',
        'id'            => 'footer_top_widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s footer-top-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ]);
    
    register_sidebar([
        'name'          => 'Footer Bottom Widget',
        'id'            => 'footer_bottom_widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s footer-bottom-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ]);
}

add_action('widgets_init', 'widgets');
