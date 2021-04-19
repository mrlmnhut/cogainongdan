<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?><?php
	$page_heading_page = '';
	if (has_post_thumbnail()){
		$page_heading_page = get_the_post_thumbnail_url(get_the_ID(), 'full');
	}
	?>
    <div class="page-heading" style="background-image: url('<?php echo $page_heading_page; ?>')">
        <div class="container">
            <h1 class="line-top page-title mt-4"><?php the_title() ?></h1>
        </div>
    </div>

    <div id="featured" class="container">
		<?php the_content(); ?>
    </div>

<?php
endwhile;
get_footer();
?>
