<?php
if (!defined('ABSPATH')){
	return;
}

/**
 * Class WidgetGetPost
 */
class WidgetGetPost extends WP_Widget{
	
	/**
	 * WidgetGetPost constructor.
	 */
	public function __construct(){
		parent::__construct(
			'widget_get_posts',
			esc_html__('[CGND] Widget Get Posts', 'CGND'),
			['description' => esc_html__('Widget Get Posts', 'CGND'),]
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
		
		return $instance;
	}
	
	/**
	 * @param array $instance
	 *
	 * @return string|void
	 */
	public function form($instance){
		$instance['title'] = $instance['title'] ?? '';
		
		?>
        <p>
            <label for="<?= $this->get_field_id('title'); ?>"><?php esc_html_e('Title',
					'CGND'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" type="text" value="<?= $instance['title']; ?>"/>
        </p>
		<?php
	}
	
	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget($args, $instance){
		wp_reset_postdata();
		wp_reset_query();
		$without_ids[] = get_the_ID();
		$get_posts  = [
			'post_type'      => 'post',
			'order'          => 'DESC',
			'posts_per_page' => 5,
			'post__not_in'   => $without_ids,
		];
		$the_posts = get_posts($get_posts);
		echo $args['before_widget'];
		$title = apply_filters('widget_title', $instance['title'] ?? '', $instance, $this->id_base);
		if ($title) : ?>
            <div class="heading-widget fire-icon-color d-flex align-items-end mb-3 pb-2">
                <span><?= $title ?></span>
            </div>
        <?php endif; ?>
		<div class="mb-3">
			<?php if ( has_post_thumbnail($the_posts[0]->ID) ) : ?>
				<?= get_the_post_thumbnail( $the_posts[0]->ID,'post-thumbnail', ['class' => 'img-fluid mb-2', 'title' => get_the_title($the_posts[0]->ID)]); ?>
			<?php else: ?>
				<img class="img-fluid mb-2" src="<?= esc_url(get_template_directory_uri()); ?>/assets/images/post-thumbnail-default.png" alt="<?= get_the_title($the_posts[0]->ID) ?>"/>
			<?php endif; ?>
            <div class="post-title mb-1"><?= get_the_title($the_posts[0]->ID) ?></div>
            <div class="d-flex align-items-center">
                <span class="mr-1">Bởi</span>
				<?= get_avatar( $the_posts[0]->post_author, 25,'', '', ['class' => 'rounded-circle mr-1']); ?>
                <span class="post-author mr-1"><?= get_the_author_meta( 'display_name', $the_posts[0]->post_author ) ?></span>
                <span>, <?= get_the_date('d/m/Y', $the_posts[0]->ID); ?></span>
            </div>
		</div>
        <div class="d-flex flex-wrap">
            <?php for ($item = 1; $item < count($the_posts); $item++): ?>
            <a class="post-two-col mb-4" href="<?= get_permalink($the_posts[$item]->ID) ?>">
		        <?php if ( has_post_thumbnail($the_posts[$item]->ID) ) : ?>
			        <?= get_the_post_thumbnail( $the_posts[$item]->ID,'post-thumbnail', ['class' => 'img-fluid mb-2', 'title' => get_the_title($the_posts[$item]->ID)]); ?>
		        <?php else: ?>
                    <img class="img-fluid mb-2" src="<?= esc_url(get_template_directory_uri()); ?>/assets/images/post-thumbnail-default.png" alt="<?= get_the_title($the_posts[$item]->ID) ?>"/>
		        <?php endif; ?>
                <div class="post-title mb-1"><?= get_the_title($the_posts[$item]->ID) ?></div>
                <div class="d-flex align-items-center">
                    <span class="mr-1">Bởi</span>
			        <?= get_avatar( $the_posts[$item]->post_author, 25,'', '', ['class' => 'rounded-circle mr-1']); ?>
                    <span class="post-author mr-1"><?= get_the_author_meta( 'display_name', $the_posts[$item]->post_author ) ?></span>
                    <span>, <?= get_the_date('d/m/Y', $the_posts[$item]->ID); ?></span>
                </div>
            </a>
            <?php endfor; ?>
        </div>
		<?php echo $args['after_widget'];
	}
}

add_action('widgets_init', function (){
	register_widget('WidgetGetPost');
});
