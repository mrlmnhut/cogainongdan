</section>
<footer id="main">
    <div class="container">
        <div class="footer-top">
            <?php if (is_active_sidebar('footer_top_widget')): ?><?php dynamic_sidebar('footer_top_widget'); ?><?php endif; ?>
        </div>
        <div class="footer-bottom">
            <?php if (is_active_sidebar('footer_bottom_widget')): ?><?php dynamic_sidebar('footer_bottom_widget'); ?><?php endif; ?>
        </div>
    </div>
</footer>

<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/slick/slick.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/theme.js"></script><?php
wp_footer();
?></body></html>
