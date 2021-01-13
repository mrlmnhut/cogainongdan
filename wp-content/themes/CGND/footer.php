</section>
<footer id="main">
    <div class="container">
        <div class="d-flex justify-content-around align-items-center">
            <div class="text-center">
                <?php if (is_active_sidebar('footer_menu_widget')): ?><?php dynamic_sidebar('footer_menu_widget'); ?><?php endif; ?>
            </div>
            <div>
            
            </div>
        </div>
        <div class="copyright text-center">
            <div class="text-uppercase">Sống hạnh phúc và chia sẻ điều mình yêu thích là mục đích tôi viết nên trang web này.</div>
            <span class="text-uppercase">Copyright &copy <?php echo date('Y'); ?>.</span>
        </div>
    </div>
</footer>

<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/theme.js"></script><?php
wp_footer();
?></body></html>
