<?php
/**
 * The template part for header
 *
 * @package VW Writer Blog 
 * @subpackage vw_writer_blog
 * @since VW Writer Blog 1.0
 */
?>
<div id="header" class="menubar">
  <div class="header-menu <?php if( get_theme_mod( 'vw_writer_blog_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  	<div class="container">
      <div class="toggle-nav mobile-menu">
        <button onclick="menu_openNav()"><i class="<?php echo esc_html(get_theme_mod('vw_writer_blog_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-writer-blog'); ?></span></button>
      </div>
  		<div id="mySidenav" class="nav sidenav">
        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-writer-blog' ); ?>">
          <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="<?php echo esc_html(get_theme_mod('vw_writer_blog_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-writer-blog'); ?></span></a>
          <?php 
            wp_nav_menu( array( 
              'theme_location' => 'primary',
              'container_class' => 'main-menu clearfix' ,
              'menu_class' => 'clearfix',
              'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
              'fallback_cb' => 'wp_page_menu',
            ) ); 
          ?>
        </nav>
      </div>
  	</div>
  </div>
</div>