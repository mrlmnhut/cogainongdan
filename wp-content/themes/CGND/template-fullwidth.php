<?php
/*
 * Template Name: Template Full Width
 */
?>
<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<div id="featured">
		<?php the_content(); ?>
	</div>

<?php
endwhile;
get_footer();
?>
