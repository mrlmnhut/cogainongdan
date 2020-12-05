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
        <header id="main">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand logo" href="<?php echo home_url('/'); ?>">
                            <img class="mr-2 mr-md-2 mr-lg-2" alt="<?php bloginfo('name') ?>" src="<?php echo get_theme_mod('cgnd_logo') ?>">
                        </a>
                    </div>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <i aria-hidden="true" class="fe fe-menu"></i>
                    </button>
                    <?php
                    wp_nav_menu([
                        'theme_location'  => 'header-menu',
                        'menu'            => 'header-menu',
                        'container'       => 'div',
                        'container_class' => 'navbar-collapse collapse',
                        'container_id'    => 'navbarCollapse',
                        'menu_class'      => 'navbar-nav ml-auto',
                        'menu_id'         => '',
                        'echo'            => TRUE,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ]);
                    get_search_form();
                    ?>
                </div>
            </nav>
        </header>
        <?php
        echo $args['after_widget'];
    }
}

add_action('widgets_init', function (){
    register_widget('WidgetGetMenu');
});
