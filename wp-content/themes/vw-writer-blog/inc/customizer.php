<?php
/**
 * VW Writer Blog Theme Customizer
 *
 * @package VW Writer Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_writer_blog_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_writer_blog_custom_controls' );

function vw_writer_blog_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//add home page setting pannel
	$VWWriterBlogParentPanel = new VW_Writer_Blog_WP_Customize_Panel( $wp_customize, 'vw_writer_blog_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_writer_blog_left_right', array(
    	'title'      => __( 'General Settings', 'vw-writer-blog' ),
		'panel' => 'vw_writer_blog_panel_id'
	) );

	$wp_customize->add_setting('vw_writer_blog_width_option',array(
        'default' => __('Full Width','vw-writer-blog'),
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-writer-blog'),
        'description' => __('Here you can change the width layout of Website.','vw-writer-blog'),
        'section' => 'vw_writer_blog_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_writer_blog_theme_options',array(
        'default' => __('Right Sidebar','vw-writer-blog'),
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_writer_blog_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-writer-blog'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-writer-blog'),
        'section' => 'vw_writer_blog_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-writer-blog'),
            'Right Sidebar' => __('Right Sidebar','vw-writer-blog'),
            'One Column' => __('One Column','vw-writer-blog'),
            'Three Columns' => __('Three Columns','vw-writer-blog'),
            'Four Columns' => __('Four Columns','vw-writer-blog'),
            'Grid Layout' => __('Grid Layout','vw-writer-blog')
        ),
	));

	$wp_customize->add_setting('vw_writer_blog_page_layout',array(
        'default' => __('One Column','vw-writer-blog'),
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control('vw_writer_blog_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-writer-blog'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-writer-blog'),
        'section' => 'vw_writer_blog_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-writer-blog'),
            'Right Sidebar' => __('Right Sidebar','vw-writer-blog'),
            'One Column' => __('One Column','vw-writer-blog')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_writer_blog_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-writer-blog' ),
		'section' => 'vw_writer_blog_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_writer_blog_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-writer-blog' ),
		'section' => 'vw_writer_blog_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_writer_blog_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-writer-blog' ),
        'section' => 'vw_writer_blog_left_right'
    )));

	$wp_customize->add_setting('vw_writer_blog_loader_icon',array(
        'default' => __('Two Way','vw-writer-blog'),
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control('vw_writer_blog_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-writer-blog'),
        'section' => 'vw_writer_blog_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-writer-blog'),
            'Dots' => __('Dots','vw-writer-blog'),
            'Rotate' => __('Rotate','vw-writer-blog')
        ),
	) );

	$wp_customize->add_section( 'vw_writer_blog_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-writer-blog' ),
		'priority'   => 30,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	//Sticky Header
	$wp_customize->add_setting( 'vw_writer_blog_sticky_header',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-writer-blog' ),
        'section' => 'vw_writer_blog_topbar'
    )));

    $wp_customize->add_setting('vw_writer_blog_mail_adress_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_mail_adress_icon',array(
		'label'	=> __('Add Email Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_topbar',
		'setting'	=> 'vw_writer_blog_mail_adress_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_writer_blog_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_mail_text',array(
		'label'	=> __('Add Text','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_mail',array(
		'label'	=> __('Add Mail Address','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_call_text',array(
		'label'	=> __('Add Text','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_call',array(
		'label'	=> __('Add Phone Number','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_phone_number_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_phone_number_icon',array(
		'label'	=> __('Add Phone Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_topbar',
		'setting'	=> 'vw_writer_blog_phone_number_icon',
		'type'		=> 'icon'
	)));
    
	//Slider
	$wp_customize->add_section( 'vw_writer_blog_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-writer-blog' ),
		'priority'   => null,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	$wp_customize->add_setting( 'vw_writer_blog_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-writer-blog' ),
          'section' => 'vw_writer_blog_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_writer_blog_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_writer_blog_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_writer_blog_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-writer-blog' ),
			'description' => __('Slider image size (1500 x 600)','vw-writer-blog'),
			'section'  => 'vw_writer_blog_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_writer_blog_slider_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_slidersettings',
		'setting'	=> 'vw_writer_blog_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_writer_blog_slider_content_option',array(
        'default' => __('Left','vw-writer-blog'),
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-writer-blog'),
        'section' => 'vw_writer_blog_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_writer_blog_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_writer_blog_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_writer_blog_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_writer_blog_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_writer_blog_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-writer-blog' ),
	'section'     => 'vw_writer_blog_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_writer_blog_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-writer-blog'),
      '0.1' =>  esc_attr('0.1','vw-writer-blog'),
      '0.2' =>  esc_attr('0.2','vw-writer-blog'),
      '0.3' =>  esc_attr('0.3','vw-writer-blog'),
      '0.4' =>  esc_attr('0.4','vw-writer-blog'),
      '0.5' =>  esc_attr('0.5','vw-writer-blog'),
      '0.6' =>  esc_attr('0.6','vw-writer-blog'),
      '0.7' =>  esc_attr('0.7','vw-writer-blog'),
      '0.8' =>  esc_attr('0.8','vw-writer-blog'),
      '0.9' =>  esc_attr('0.9','vw-writer-blog')
	),
	));

	//Featured Articals
	$wp_customize->add_section( 'vw_writer_blog_articles_section' , array(
    	'title'      => __( 'Featured Articles', 'vw-writer-blog' ),
		'priority'   => null,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	$wp_customize->add_setting('vw_writer_blog_section_title_icon',array(
		'default'	=> 'fas fa-edit',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_section_title_icon',array(
		'label'	=> __('Add Article Title Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_articles_section',
		'setting'	=> 'vw_writer_blog_section_title_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_writer_blog_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_section_title',array(
		'label'	=> __('Section Title','vw-writer-blog'),
		'section'=> 'vw_writer_blog_articles_section',
		'setting'=> 'vw_writer_blog_section_title',
		'type'=> 'text'
	));	

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_writer_blog_featured_articles',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_writer_blog_sanitize_choices',
	));
	$wp_customize->add_control('vw_writer_blog_featured_articles',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Articles','vw-writer-blog'),
		'description' => __('Image size (270 x 345)','vw-writer-blog'),
		'section' => 'vw_writer_blog_articles_section',
	));

	//Article excerpt
	$wp_customize->add_setting( 'vw_writer_blog_article_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_writer_blog_article_excerpt_number', array(
		'label'       => esc_html__( 'Article Excerpt length','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_articles_section',
		'type'        => 'range',
		'settings'    => 'vw_writer_blog_article_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_writer_blog_articles_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_articles_button_icon',array(
		'label'	=> __('Add Article Button Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_articles_section',
		'setting'	=> 'vw_writer_blog_articles_button_icon',
		'type'		=> 'icon'
	)));

	//Blog Post
	$wp_customize->add_panel( $VWWriterBlogParentPanel );

	$BlogPostParentPanel = new VW_Writer_Blog_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-writer-blog' ),
		'panel' => 'vw_writer_blog_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_writer_blog_post_settings', array(
		'title' => __( 'Post Settings', 'vw-writer-blog' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_writer_blog_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-writer-blog' ),
        'section' => 'vw_writer_blog_post_settings'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_toggle_author',array(
		'label' => esc_html__( 'Author','vw-writer-blog' ),
		'section' => 'vw_writer_blog_post_settings'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-writer-blog' ),
		'section' => 'vw_writer_blog_post_settings'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-writer-blog' ),
		'section' => 'vw_writer_blog_post_settings'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_writer_blog_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_writer_blog_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_writer_blog_blog_layout_option',array(
        'default' => __('Default','vw-writer-blog'),
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-writer-blog'),
        'section' => 'vw_writer_blog_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/images/blog-layout3.png',
    ))));

    // Button Settings
	$wp_customize->add_section( 'vw_writer_blog_button_settings', array(
		'title' => __( 'Button Settings', 'vw-writer-blog' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_writer_blog_blog_button_border',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_blog_button_border',
       array(
          'label' => esc_html__( 'Show / Hide Button Border','vw-writer-blog' ),
          'section' => 'vw_writer_blog_button_settings'
    )));

	$wp_customize->add_setting('vw_writer_blog_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_writer_blog_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_writer_blog_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_button_text',array(
		'label'	=> __('Add Button Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_blog_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_button_settings',
		'setting'	=> 'vw_writer_blog_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_writer_blog_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-writer-blog' ),
		'panel' => 'blog_post_parent_panel',
	));

    $wp_customize->add_setting( 'vw_writer_blog_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_related_post',array(
		'label' => esc_html__( 'Related Post','vw-writer-blog' ),
		'section' => 'vw_writer_blog_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_writer_blog_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_writer_blog_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_related_posts_settings',
		'type'=> 'number'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_writer_blog_404_page',array(
		'title'	=> __('404 Page Settings','vw-writer-blog'),
		'panel' => 'vw_writer_blog_panel_id',
	));	

	$wp_customize->add_setting('vw_writer_blog_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_writer_blog_404_page_title',array(
		'label'	=> __('Add Title','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_writer_blog_404_page_content',array(
		'label'	=> __('Add Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_404_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_writer_blog_responsive_media',array(
		'title'	=> __('Responsive Media','vw-writer-blog'),
		'panel' => 'vw_writer_blog_panel_id',
	));

    $wp_customize->add_setting( 'vw_writer_blog_stickyheader_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_stickyheader_hide_show',array(
          'label' => esc_html__( 'Sticky Header','vw-writer-blog' ),
          'section' => 'vw_writer_blog_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_resp_slider_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_resp_slider_hide_show',array(
          'label' => esc_html__( 'Show / Hide Slider','vw-writer-blog' ),
          'section' => 'vw_writer_blog_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_writer_blog_metabox_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_metabox_hide_show',array(
          'label' => esc_html__( 'Show / Hide Metabox','vw-writer-blog' ),
          'section' => 'vw_writer_blog_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_sidebar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_sidebar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Sidebar','vw-writer-blog' ),
          'section' => 'vw_writer_blog_responsive_media'
    )));

    $wp_customize->add_setting('vw_writer_blog_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_responsive_media',
		'setting'	=> 'vw_writer_blog_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_writer_blog_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_responsive_media',
		'setting'	=> 'vw_writer_blog_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_writer_blog_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-writer-blog' ),
		'priority' => null,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	$wp_customize->add_setting('vw_writer_blog_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Writer_Blog_Content_Creation( $wp_customize, 'vw_writer_blog_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-writer-blog' ),
		),
		'section' => 'vw_writer_blog_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-writer-blog' ),
	) ) );
	
	//Footer Text
	$wp_customize->add_section('vw_writer_blog_footer',array(
		'title'	=> __('Footer','vw-writer-blog'),
		'description'=> __('This section will appear in the footer','vw-writer-blog'),
		'panel' => 'vw_writer_blog_panel_id',
	));	
	
	$wp_customize->add_setting('vw_writer_blog_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_footer_text',array(
		'label'	=> __('Copyright Text','vw-writer-blog'),
		'section'=> 'vw_writer_blog_footer',
		'setting'=> 'vw_writer_blog_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_writer_blog_copyright_alingment',array(
        'default' => __('center','vw-writer-blog'),
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-writer-blog'),
        'section' => 'vw_writer_blog_footer',
        'settings' => 'vw_writer_blog_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/images/copyright1.png',
            'center' => get_template_directory_uri().'/images/copyright2.png',
            'right' => get_template_directory_uri().'/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_writer_blog_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-writer-blog' ),
      	'section' => 'vw_writer_blog_footer'
    )));

    $wp_customize->add_setting('vw_writer_blog_scroll_to_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_footer',
		'setting'	=> 'vw_writer_blog_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_writer_blog_scroll_top_alignment',array(
        'default' => __('Right','vw-writer-blog'),
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-writer-blog'),
        'section' => 'vw_writer_blog_footer',
        'settings' => 'vw_writer_blog_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Writer_Blog_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Writer_Blog_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_writer_blog_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {

  class VW_Writer_Blog_WP_Customize_Panel extends WP_Customize_Panel {

    public $panel;
    public $type = 'vw_writer_blog_panel';
    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;
      return $array;
    }
  }
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  class VW_Writer_Blog_WP_Customize_Section extends WP_Customize_Section {
  	
    public $section;
    public $type = 'vw_writer_blog_section';
    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;

      if ( $this->panel ) {
        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
      } else {
        $array['customizeAction'] = 'Customizing';
      }
      return $array;
    }
  }
}

// Enqueue our scripts and styles
function vw_writer_blog_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_writer_blog_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Writer_Blog_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Writer_Blog_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Writer_Blog_Customize_Section_Pro($manager,'example_1',array(
				'priority'   => 1,
				'title'    => esc_html__( 'Writer Pro Theme', 'vw-writer-blog' ),
				'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-writer-blog' ),
				'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-themes-for-writers/'),
			)));

		$manager->add_section(new VW_Writer_Blog_Customize_Section_Pro($manager,'example_2',array(
				'priority'   => 1,
				'title'    => esc_html__( 'DOCUMENTATION', 'vw-writer-blog' ),
				'pro_text' => esc_html__( 'DOCS', 'vw-writer-blog' ),
				'pro_url'  => admin_url('themes.php?page=vw_writer_blog_guide'),
			)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-writer-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-writer-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Writer_Blog_Customize::get_instance();