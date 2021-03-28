jQuery(function ($) {
    $(document).ready(function () {
        if (window.matchMedia("(min-width: 992px)").matches) {
            $('#menu-header-menu > li.menu-item-has-children > a').click(function () {
                window.location.href = $(this).attr('href');
            });
        }
        if (window.matchMedia("(max-width: 991px)").matches) {
            $('#menu-header-menu > li.menu-item-has-children > a').on('touchstart', function (e) {
                e.preventDefault();
                if ($(this).next('ul.dropdown-menu').is(':visible')) {
                    window.location.href = $(this).attr('href');
                }
                else {
                    $(this).next('ul.dropdown-menu').show();
                }
            });
            $('body').on('click', function () {
                var $menu = $('#menu-header-menu ul.dropdown-menu');
                if ($menu.is(':visible')) {
                    $menu.hide();
                }
            });
        }
        $('.slick-gallery').slick({
            centerMode: true,
            centerPadding: '25%',
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 3000,
        });
        $('.slick-event-hot').slick({
            dots: false,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
})
