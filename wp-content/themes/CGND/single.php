<?php get_header(); ?>
<?php while (have_posts()): the_post(); ?>
	<div class="page-heading pb-3">
		<div class="container">
			<h1 class="page-title py-4 m-0"><?php the_title() ?></h1>
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <span class="mr-1">Bởi</span>
	                <?php echo get_avatar( get_the_author_meta( 'ID' ), 25,'', '', ['class' => 'rounded-circle mr-1']); ?>
                    <span class="post-author mr-1"><?php the_author(); ?></span>
                    <span>vào <?php the_date('d/m/Y'); ?> lúc <?php echo get_the_date('H:i'); ?></span>
                </div>
                <div class="fb-like" data-href="<?= get_permalink(); ?>" data-width="200" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
            </div>
		</div>
	</div>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => get_the_title()]); ?>
	<?php endif; ?>
	
	<div id="featured" class="container py-5">
        <div class="d-flex">
            <div class="single-content">
		        <?php the_content(); ?>
            </div>
            <div class="single-sidebar">
	            <?php if (is_active_sidebar('sidebar_content_widget')): ?><?php dynamic_sidebar('sidebar_content_widget'); ?><?php endif; ?>
            </div>
        </div>
	</div>
<?php endwhile;?>

<?php get_footer(); ?>
