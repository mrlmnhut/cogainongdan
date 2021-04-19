
<?php get_header(); ?>

<?php
wp_reset_postdata();
wp_reset_query();
$category = get_queried_object();
$args = ['category' => $category->term_id];
$the_posts = get_posts( $args );
?>
<div class="page-heading pb-3">
	<div class="container">
		<h1 class="page-title py-4 m-0"><?= $category->name ?></h1>
	</div>
</div>

<div id="featured" class="container">
	<a class="first-content" href="<?= get_permalink($the_posts[0]->ID) ?>">
		<?php if ( has_post_thumbnail($the_posts[0]->ID) ) : ?>
			<?= get_the_post_thumbnail($the_posts[0]->ID,'post-thumbnail', ['class' => 'img-fluid w-100', 'title' => get_the_title($the_posts[0]->ID)]); ?>
		<?php else: ?>
			<img class="img-fluid first-img mb-2" src="<?= esc_url(get_template_directory_uri()); ?>/assets/images/post-thumbnail-default.png" alt=""/>
		<?php endif; ?>
		<div class="position-absolute">
			<div class="post-title"><?= get_the_title($the_posts[0]->ID); ?></div>
			<div class=" d-flex align-items-center">
				<span class="mr-1">Bởi</span>
				<?= get_avatar( $the_posts[0]->post_author, 25,'', '', ['class' => 'rounded-circle mr-1']); ?>
				<span class="mr-1"><?= get_the_author_meta( 'display_name', $the_posts[0]->post_author ) ?></span>
				<span>, <?= get_the_date('d/m/Y', $the_posts[0]->ID); ?></span>
			</div>
		</div>
	</a>
	<div class="d-flex flex-wrap">
		<?php for ($item = 1; $item < count($the_posts); $item++): ?>
			<?php if ( has_post_thumbnail($the_posts[$item]->ID) ) {
				$thumbnail_url = get_the_post_thumbnail_url($the_posts[$item]->ID);
			} else {
				$thumbnail_url = esc_url(get_template_directory_uri());
			} ?>
			<a class="post-three-col mb-4" href="<?= get_permalink($the_posts[0]->ID) ?>">
				<div class="thumbnail-image" style="background-image: url('<?= $thumbnail_url ?>')"></div>
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
</div>

<?php get_footer(); ?>
