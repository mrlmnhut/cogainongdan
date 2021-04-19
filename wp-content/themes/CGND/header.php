<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/slick/slick.css"/>
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/slick/slick-theme.css"/>
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/main.css">
</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=692109711505292&autoLogAppEvents=1" nonce="dVS0Dxme"></script>

<header id="main">
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="<?php echo home_url('/'); ?>">
                    <img class="mr-2 mr-md-2 mr-lg-2" alt="<?php bloginfo('name') ?>" src="<?php echo get_theme_mod('cgnd_logo') ?>">
                </a>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i aria-hidden="true" class="fe fe-menu"></i>
            </button>
			<?php
			wp_nav_menu([
				'theme_location'  => 'header-menu',
				'menu'            => 'header-menu',
				'container'       => 'div',
				'container_class' => 'navbar-collapse collapse',
				'container_id'    => 'navbarCollapse',
				'menu_class'      => 'navbar-nav ml-auto',
				'menu_id'         => '',
				'echo'            => TRUE,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => new WP_Bootstrap_Navwalker(),
			]);
			get_search_form();
			?>
        </div>
    </nav>
</header>

<?php if (is_active_sidebar('header_widget')): ?>
    <?php dynamic_sidebar('header_widget'); ?>
<?php endif; ?>

<section id="main">
    <?php if (!is_home() && !is_front_page()): ?>
        <section class="section-header pt-5">
		    <?php if (function_exists('bcn_display')): ?>
                <div class="container">
                    <div class="breadcrumbs" typeof="BreadcrumbList">
					    <?php bcn_display(); ?>
                    </div>
                </div>
		    <?php endif; ?>
        </section>
	<?php endif; ?>
