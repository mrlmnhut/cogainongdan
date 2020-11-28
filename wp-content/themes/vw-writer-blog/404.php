<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Writer Blog
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
        <div class="page-content">
        	<h1><?php echo esc_html(get_theme_mod('vw_writer_blog_404_page_title',__('404 Not Found','vw-writer-blog')));?></h1>	
			<p class="text-404"><?php echo esc_html(get_theme_mod('vw_writer_blog_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','vw-writer-blog')));?></p>
			<div class="error-btn">
        		<a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_theme_mod('vw_writer_blog_404_page_button_text',__('Return to the home page','vw-writer-blog')));?><span class="screen-reader-text"><?php esc_html_e( 'Return to the home page','vw-writer-blog' );?></span></a>
			</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>