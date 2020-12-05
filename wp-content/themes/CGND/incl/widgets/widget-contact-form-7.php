<?php
if (!defined('ABSPATH')){
    return;
}

/**
 * Class WidgetContactForm7
 */
class WidgetContactForm7 extends WP_Widget{
    
    /**
     * WidgetContactForm7 constructor.
     */
    public function __construct(){
        parent::__construct(
            'wpc7w_contact_form',
            esc_html__('[CGND] Widget for Contact form 7', 'CGND'),
            ['description' => esc_html__('View contact form 7 form in widget', 'CGND'),]
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
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['form']  = strip_tags($new_instance['form']);
        
        return $instance;
    }
    
    /**
     * @param array $instance
     *
     * @return string|void
     */
    public function form($instance){
        $instance['title'] = $instance['title'] ?? '';
        $instance['form']  = $instance['form'] ?? '';
        
        // Get contact forms
        $cf7_forms = ['- Select form -' => 'none'];
        
        if (!function_exists('is_plugin_active')){
            include_once(ABSPATH . 'wp-admin/includes/plugin.php'); // Require plugin.php to use is_plugin_active() below
        }
        
        if (is_plugin_active('contact-form-7/wp-contact-form-7.php')){
            global $wpdb;
            $db_cf7froms = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'wpcf7_contact_form'");
    
            if ($db_cf7froms){
                foreach ($db_cf7froms as $cform){
                    $cf7_forms[$cform->post_title] = $cform->ID;
                }
            }
        }
        ?>
        <p>
            <label for="<?= $this->get_field_id('title'); ?>"><?php esc_html_e('Title',
                    'CGND'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" type="text" value="<?= $instance['title']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('form'); ?>"><?php esc_html_e('Select contact form',
                    'CGND'); ?></label>
            <select class="widefat" id="<?= $this->get_field_id('form'); ?>" name="<?= $this->get_field_name('form'); ?>">
                <?php foreach ($cf7_forms as $key => $form){ ?>
                    <option value="<?= $form; ?>" <?php selected($form,
                        $instance['form']); ?>><?= $key; ?></option>
                <?php } ?>
            </select>
        </p>
        <?php
    }
    
    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance){
        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters('widget_title', $instance['title'] ?? '', $instance, $this->id_base);
        $form  = $instance['form'] ?? '';
    
        echo $args['before_widget'];
        if ($title){
            echo $args['before_title'] . $title . $args['after_title'];
        }
    
        if (!empty($form) && $form != 'none'){
            echo '<div class="contact-form7-widget">' . do_shortcode('[contact-form-7 id="' . $form . '"]') . '</div>';
        }
        echo $args['after_widget'];
    }
}

add_action('widgets_init', function (){
    register_widget('WidgetContactForm7');
});
