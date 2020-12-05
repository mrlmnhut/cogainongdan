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
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/main.css">
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=692109711505292&autoLogAppEvents=1" nonce="gg3Zm9LG"></script>

<?php if (is_active_sidebar('header_widget')): ?>
    <?php dynamic_sidebar('header_widget'); ?>
<?php endif; ?>

<section id="main">
    <?php if (!is_home() && !is_front_page()): ?>
        <div class="breadcrumbs">
            <div class="container">
                <?php if (function_exists('bcn_display')){
                    bcn_display();
                } ?>
            </div>
        </div>
	<?php endif; ?>
