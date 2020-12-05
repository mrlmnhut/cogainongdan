<?php
if (!defined('ABSPATH')){
    return;
}

/**
 * Class WidgetGetEventHot
 */
class WidgetGetEventHot extends WP_Widget{
    
    /**
     * WidgetGetEventHot constructor.
     */
    public function __construct(){
        parent::__construct(
            'widget_get_event_hot',
            esc_html__('[CGND] Widget Get Event Hot', 'CGND'),
            ['description' => esc_html__('Widget Get Event Hot', 'CGND'),]
        );
    }
    
    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance){
        echo $args['before_widget']; ?><?php
        wp_reset_postdata();
        wp_reset_query();
        $args  = [
            'post_type'      => 'event',
            'order'          => 'DESC',
            'posts_per_page' => 1,
        ];
        $query = new WP_Query($args); ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="event-hot d-flex">
                <div class="content d-flex flex-column">
                    <div class="title"><?php the_title() ?></div>
                    <div class="mt-auto">
                        <div class="time mb-2">Thời gian: <span><?= get_field('time', get_the_ID()) ?></span></div>
                        <div class="location">Địa điểm: <span><?= get_field('location', get_the_ID()) ?></span></div>
                    </div>
                </div>
                <div class="thumbnail">
                    <?php if (has_post_thumbnail()){
                        the_post_thumbnail('full',
                            ['class' => 'img-fluid', 'title' => get_the_title(), 'alt' => get_the_title()]);
                    } ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php echo $args['after_widget'];
    }
}

add_action('widgets_init', function (){
    register_widget('WidgetGetEventHot');
});
