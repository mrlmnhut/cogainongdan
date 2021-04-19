<?php
if (!defined('ABSPATH')){
    return;
}

/**
 * Class WidgetGetMenu
 */
class WidgetGetMenu extends WP_Widget{

    /**
     * WidgetGetMenu constructor.
     */
    public function __construct(){
        parent::__construct(
            'widget_get_menu',
            esc_html__('[CGND] Widget Get Menu', 'CGND'),
            ['description' => esc_html__('Widget Get Menu', 'CGND'),]
        );
    }

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance){
        echo $args['before_widget']; ?>
        
        <?php
        echo $args['after_widget'];
    }
}

add_action('widgets_init', function (){
    register_widget('WidgetGetMenu');
});
