</section>
<footer id="main">
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-lg-nowrap flex-lg-row">
            <div class="footer-left">
                <img class="img-fluid footer-logo" alt="<?php bloginfo('title') ?>" src="<?php echo get_theme_mod('cgnd_footer_logo') ?>">
                <?php if (is_active_sidebar('footer_left_widget')): ?>
                    <?php dynamic_sidebar('footer_left_widget'); ?>
                <?php endif; ?>
            </div>
            <div class="footer-form">
                <?php if (is_active_sidebar('registration_post_form_widget')): ?>
                    <?php dynamic_sidebar('registration_post_form_widget'); ?>
                <?php endif; ?>
            </div>
            <div class="footer-menu">
                <?php if (is_active_sidebar('footer_menu_widget')): ?>
                    <?php dynamic_sidebar('footer_menu_widget'); ?>
                <?php endif; ?>
            </div>
            <div class="footer-fanpage">
                <?php if (is_active_sidebar('fanpage_widget')): ?>
                    <?php dynamic_sidebar('fanpage_widget'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/theme.js"></script>
<?php
wp_footer();
?></body></html>
