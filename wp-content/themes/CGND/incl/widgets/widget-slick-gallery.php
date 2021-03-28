<?php
if (!defined('ABSPATH')){
    return;
}

/**
 * Class WidgetSlickGallery
 */
class WidgetSlickGallery extends WP_Widget{
    
    /**
     * WidgetSlickGallery constructor.
     */
    public function __construct(){
        parent::__construct(
            'widget_slick_gallery',
            esc_html__('[CGND] Widget Slick Gallery', 'CGND'),
            ['description' => esc_html__('Widget Slick Gallery', 'CGND'),]
        );
    }
    
    /**
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */
    public function update($new_instance, $old_instance){
        $instance          = [];
        $instance['image1']  = strip_tags($new_instance['image1']);
        $instance['image2']  = strip_tags($new_instance['image2']);
        $instance['image3']  = strip_tags($new_instance['image3']);
        $instance['image4']  = strip_tags($new_instance['image4']);
        $instance['image5']  = strip_tags($new_instance['image5']);
        $instance['image6']  = strip_tags($new_instance['image6']);
    
        return $instance;
    }
    
    /**
     * @param array $instance
     *
     * @return string|void
     */
    public function form($instance){
        $instance['image1']  = $instance['image1'] ?? '';
        $instance['image2']  = $instance['image2'] ?? '';
        $instance['image3']  = $instance['image3'] ?? '';
        $instance['image4']  = $instance['image4'] ?? '';
        $instance['image5']  = $instance['image5'] ?? '';
        $instance['image6']  = $instance['image6'] ?? '';
        
        ?>
        <p>
            <label for="<?= $this->get_field_id('image1'); ?>"><?php esc_html_e('Image 1',
                    'CGND'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('image1'); ?>" name="<?= $this->get_field_name('image1'); ?>" type="text" value="<?= $instance['image1']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('image2'); ?>"><?php esc_html_e('Image 2',
                    'CGND'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('image2'); ?>" name="<?= $this->get_field_name('image2'); ?>" type="text" value="<?= $instance['image2']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('image3'); ?>"><?php esc_html_e('Image 3',
                    'CGND'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('image3'); ?>" name="<?= $this->get_field_name('image3'); ?>" type="text" value="<?= $instance['image3']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('image4'); ?>"><?php esc_html_e('Image 4',
                    'CGND'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('image4'); ?>" name="<?= $this->get_field_name('image4'); ?>" type="text" value="<?= $instance['image4']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('image5'); ?>"><?php esc_html_e('Image 5',
                    'CGND'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('image5'); ?>" name="<?= $this->get_field_name('image5'); ?>" type="text" value="<?= $instance['image5']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('image6'); ?>"><?php esc_html_e('Image 6',
                    'CGND'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('image6'); ?>" name="<?= $this->get_field_name('image6'); ?>" type="text" value="<?= $instance['image6']; ?>"/>
        </p>
        <?php
    }
    
    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance){
        $image1 = $instance['image1'] ?? '';
        $image2 = $instance['image2'] ?? '';
        $image3 = $instance['image3'] ?? '';
        $image4 = $instance['image4'] ?? '';
        $image5 = $instance['image5'] ?? '';
        $image6 = $instance['image6'] ?? '';
    
        echo $args['before_widget']; ?>
        <div class="slick-gallery slick-reboot">
            <img src="<?= $image1 ?>" alt="">
            <img src="<?= $image2 ?>" alt="">
            <img src="<?= $image3 ?>" alt="">
            <img src="<?= $image4 ?>" alt="">
            <img src="<?= $image5 ?>" alt="">
            <img src="<?= $image6 ?>" alt="">
        </div>
        <?php echo $args['after_widget'];
    }
}

add_action('widgets_init', function (){
    register_widget('WidgetSlickGallery');
});
