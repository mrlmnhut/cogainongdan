<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_writer_blog_first_color = get_theme_mod('vw_writer_blog_first_color');

	$custom_css = '';

	if($vw_writer_blog_first_color != false){
		$custom_css .='.slider-date, .scrollup i, input[type="submit"], .footer .tagcloud a:hover, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .footer-2, .box:after, .sidebar input[type="submit"], .sidebar .tagcloud a:hover, nav.woocommerce-MyAccount-navigation ul li, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .pagination span, .pagination a, #comments input[type="submit"].submit, #comments a.comment-reply-link, .toggle-nav i, .error-btn a, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button{';
			$custom_css .='background-color: '.esc_html($vw_writer_blog_first_color).';';
		$custom_css .='}';
	}
	if($vw_writer_blog_first_color != false){
		$custom_css .='a, .call i, .email i, p.infotext, .footer h3, .woocommerce-message::before, .post-main-box:hover a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .more-btn a:hover,.footer li a:hover, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .post-main-box h2 a:hover, h2.section-title a:hover{';
			$custom_css .='color: '.esc_html($vw_writer_blog_first_color).';';
		$custom_css .='}';
	}
	if($vw_writer_blog_first_color != false){
		$custom_css .='.slider-date:before{';
			$custom_css .='border-left-color: '.esc_html($vw_writer_blog_first_color).';';
		$custom_css .='}';
	}
	if($vw_writer_blog_first_color != false){
		$custom_css .='.woocommerce-message, .post-info hr, .main-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($vw_writer_blog_first_color).';';
		$custom_css .='}';
	}
	if($vw_writer_blog_first_color != false){
		$custom_css .='.main-navigation ul ul, .header-fixed{';
			$custom_css .='border-bottom-color: '.esc_html($vw_writer_blog_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_writer_blog_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-homepage .header .nav{';
			$custom_css .='margin: 27px 11.6em 0 0;';
		$custom_css .='}';
		$custom_css .='.nav ul li a{';
			$custom_css .='padding: 8px 12px;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-homepage .header .nav{';
			$custom_css .='margin: 27px 2em 0 0;';
		$custom_css .='}';
		$custom_css .='.nav ul li a{';
			$custom_css .='padding: 12px 15px;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_writer_blog_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_writer_blog_slider_content_option','Left');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .more-btn{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .more-btn{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .more-btn{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_writer_blog_blog_layout_option','Default');
    if($theme_lay == 'Default'){
		$custom_css .='.post-main-box{';
			$custom_css .='';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services .service-text p{';
			$custom_css .='text-align:center;';
		$custom_css .='}';
		$custom_css .='.post-info, .content-bttn{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
		$custom_css .='.post-info hr{';
			$custom_css .='margin:15px auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Left'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$custom_css .='text-align:Left;';
		$custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$stickyheader = get_theme_mod( 'vw_writer_blog_stickyheader_hide_show',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.header-fixed{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.header-fixed{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$stickyheader = get_theme_mod( 'vw_writer_blog_resp_slider_hide_show',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$metabox = get_theme_mod( 'vw_writer_blog_metabox_hide_show',true);
    if($metabox == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.post-info{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($metabox == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.post-info{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$sidebar = get_theme_mod( 'vw_writer_blog_sidebar_hide_show',true);
    if($sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	/*---------------- Button Settings ------------------*/

	$vw_writer_blog_button_padding_top_bottom = get_theme_mod('vw_writer_blog_button_padding_top_bottom');
	$vw_writer_blog_button_padding_left_right = get_theme_mod('vw_writer_blog_button_padding_left_right');
	if($vw_writer_blog_button_padding_top_bottom != false || $vw_writer_blog_button_padding_left_right != false){
		$custom_css .='.post-main-box .content-bttn{';
			$custom_css .='padding-top: '.esc_html($vw_writer_blog_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_writer_blog_button_padding_top_bottom).';padding-left: '.esc_html($vw_writer_blog_button_padding_left_right).';padding-right: '.esc_html($vw_writer_blog_button_padding_left_right).';';
		$custom_css .='}';
	}

	$vw_writer_blog_button_border_radius = get_theme_mod('vw_writer_blog_button_border_radius');
	if($vw_writer_blog_button_border_radius != false){
		$custom_css .='.post-main-box .content-bttn{';
			$custom_css .='border-radius: '.esc_html($vw_writer_blog_button_border_radius).'px;';
		$custom_css .='}';
	}

	$btn_border = get_theme_mod( 'vw_writer_blog_blog_button_border', false);
	if($btn_border == true){
		$custom_css .='.post-main-box .content-bttn{';
			$custom_css .='border: 1px solid #323232; display: inline-block;';
		$custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_writer_blog_copyright_alingment = get_theme_mod('vw_writer_blog_copyright_alingment');
	if($vw_writer_blog_copyright_alingment != false){
		$custom_css .='.copyright p{';
			$custom_css .='text-align: '.esc_html($vw_writer_blog_copyright_alingment).';';
		$custom_css .='}';
	}

	$vw_writer_blog_copyright_padding_top_bottom = get_theme_mod('vw_writer_blog_copyright_padding_top_bottom');
	if($vw_writer_blog_copyright_padding_top_bottom != false){
		$custom_css .='.footer-2{';
			$custom_css .='padding-top: '.esc_html($vw_writer_blog_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_writer_blog_copyright_padding_top_bottom).';';
		$custom_css .='}';
	}
