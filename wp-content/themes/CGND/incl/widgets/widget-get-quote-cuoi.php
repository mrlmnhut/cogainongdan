<?php
if (!defined('ABSPATH')){
    return;
}

/**
 * Class WidgetGetQuoteCuoi
 */
class WidgetGetQuoteCuoi extends WP_Widget{
    
    /**
     * WidgetGetQuoteCuoi constructor.
     */
    public function __construct(){
        parent::__construct(
            'widget_get_quote_cuoi',
            esc_html__('[CGND] Widget Get Quote Cuội', 'CGND'),
            ['description' => esc_html__('Widget Get Quote Cuội', 'CGND'),]
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
            'post_type'      => 'quote-cuoi',
            'order'          => 'DESC',
            'posts_per_page' => 3,
        ];
        $query = new WP_Query($args); ?>
        <div id="carouselExampleIndicators" class="carousel slide quote-cuoi" data-ride="carousel">
            <div class="carousel-inner">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="carousel-item">
                        <div class="thumbnail" style="background-image: url('<?= get_the_post_thumbnail_url() ?>')"></div>
                        <div class="caption text-center">
                            <div class="quote"><?= get_field('quote', get_the_ID()) ?></div>
                            <div class="author text-uppercase font-weight-bold">- <?= get_field('author',
                                    get_the_ID()) ?> -
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
        
        </div>
        <script type="text/javascript">
            jQuery(function ($) {
                $(".quote-cuoi .carousel-item").first().addClass("active");
            });
        </script>
        <?php echo $args['after_widget'];
    }
}

add_action('widgets_init', function (){
    register_widget('WidgetGetQuoteCuoi');
});
