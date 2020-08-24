<?php
    global $wpdb;
    include('classes/social_widget.php');
    include('classes/acf-blocks.php');
    
    // Menus
	register_nav_menus( array(
        'main_menu' => 'Main menu',
        'footer_menu' => 'Footer menu'
	) );

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }

    // Fonts
    function wpb_enqueue_styles() {
        wp_enqueue_style( 'theme', get_template_directory_uri() . '/style.css', false, '0.4', 'all');
        wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@100;200;300;400;600&family=Open+Sans:wght@300&display=swap', false, '0.3', 'all');
    }

    add_action( 'wp_enqueue_scripts', 'wpb_enqueue_styles' );

    // Vendor scripts
    function wave_theme_name_scripts() {
        wp_enqueue_script( 'app', get_template_directory_uri() . '/scripts/app.js', array ( 'jquery' ), 1.1, true);
    }
    add_action( 'wp_enqueue_scripts', 'wave_theme_name_scripts' );

	// Post support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
    add_post_type_support( 'page', 'excerpt' );

	// Theme customisers
	function wave_theme_customizer( $wp_customize ) {
		// logo
        $wp_customize->add_section( 'wave_logo_section' , array(
			'title'       => __( 'Logo', 'wave' ),
			'priority'    => 30,
			'description' => 'Upload a logo to replace the default site name and description in the header',
		));

		$wp_customize->add_setting( 'wave_logo' );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wave_logo', array(
		    'label'    => __( 'Logo', 'wave' ),
		    'section'  => 'wave_logo_section',
		    'settings' => 'wave_logo',
        )));

        // Emergency Banner
        $wp_customize->add_section( 'wave_emergency_secion' , array(
			'title'       => __( 'Emergency banner', 'wave' ),
			'priority'    => 30,
			'description' => 'Turn the emergency banner on or off here',
        ));
        
        $wp_customize->add_setting('emergency_banner_on', array(
            'default'    => '0'
        ));
        
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'show_footer_facebook',
                array(
                    'label'     => __('Show Emergency Banner?', 'waveplumbing'),
                    'section'   => 'wave_emergency_secion',
                    'settings'  => 'emergency_banner_on',
                    'type'      => 'checkbox',
                )
            )
        );

        // contact
        $wp_customize->add_section( 'wave_contact_section' , array(
			'title'       => __( 'Contact', 'wave' ),
			'priority'    => 30,
			'description' => 'Add the company contact details in here',
		));

		$wp_customize->add_setting( 'wave_address' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wave_address', array(
		    'label'    => __( 'Address', 'wave' ),
		    'section'  => 'wave_contact_section',
		    'settings' => 'wave_address',
            'type'     => 'textarea'
		)));

		$wp_customize->add_setting( 'wave_phone' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wave_phone', array(
		    'label'    => __( 'Phone', 'wave' ),
		    'section'  => 'wave_contact_section',
		    'settings' => 'wave_phone',
            'type'	   => 'text'
        )));
		$wp_customize->add_setting( 'wave_mobile' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wave_mobile', array(
		    'label'    => __( 'Mobile', 'wave' ),
		    'section'  => 'wave_contact_section',
		    'settings' => 'wave_mobile',
            'type'     => 'text'
        )));
        
		$wp_customize->add_setting( 'wave_emergency_phone' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wave_emergency_phone', array(
		    'label'    => __( 'Emergency phone number', 'wave' ),
		    'section'  => 'wave_contact_section',
		    'settings' => 'wave_emergency_phone',
            'type'     => 'text'
		)));

		$wp_customize->add_setting( 'wave_email' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wave_email', array(
		    'label'    => __( 'Email', 'wave' ),
		    'section'  => 'wave_contact_section',
		    'settings' => 'wave_email',
            'type'     => 'text'
        )));
        
		$wp_customize->add_setting( 'wave_facebook' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wave_facebook', array(
		    'label'    => __( 'Facebook', 'wave' ),
		    'section'  => 'wave_contact_section',
		    'settings' => 'wave_facebook',
            'type'     => 'text'
		)));
	}

	add_action( 'customize_register', 'wave_theme_customizer' );

    // Sidebars

    /**
    * Register widgetized area and update sidebar with default widgets
    */
    function wave_widgets_init() {
        register_sidebar( array(
            'name' => __( 'Footer area one', 'wave' ),
            'id' => 'footer-area-one-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer image area', 'wave' ),
            'id' => 'sub-footer-area-one-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer info area', 'wave' ),
            'id' => 'sub-footer-area-two-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
    }
    add_action( 'widgets_init', 'wave_widgets_init' );

    // Disable all comments
    // Removes from admin menu
    add_action( 'admin_menu', 'my_remove_admin_menus' );
    function my_remove_admin_menus() {
        remove_menu_page( 'edit-comments.php' );
    }
    // Removes from post and pages
    add_action('init', 'remove_comment_support', 100);

    function remove_comment_support() {
        remove_post_type_support( 'post', 'comments' );
        remove_post_type_support( 'page', 'comments' );
    }
    // Removes from admin bar
    function mytheme_admin_bar_render() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
    add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

    // Register and load the widget
    function wpb_load_widget() {
        register_widget( 'wpb_social_widget' );
    }
    add_action( 'widgets_init', 'wpb_load_widget' );

    add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
	
	function add_current_nav_class($classes, $item) {
		
		// Getting the current post details
		global $post;
		
		// Getting the post type of the current post
		$current_post_type = get_post_type_object(get_post_type($post->ID));
		$current_post_type_slug = $current_post_type->rewrite['slug'];
			
		// Getting the URL of the menu item
		$menu_slug = strtolower(trim($item->url));
		
		// If the menu item URL contains the current post types slug add the current-menu-item class
		if (strpos($menu_slug,$current_post_type_slug) !== false) {
		
		   $classes[] = 'current-menu-item';
		
		}
		
		// Return the corrected set of classes to be added to the menu item
		return $classes;
	
    }

    /*****************************************************************************
    wpmu_posted_on - add dates on single posts
    *****************************************************************************/
    function wave_get_random_color() {            
        $colors = ['teal', 'green', 'orange', 'red'];
        $idx = array_rand($colors);
        return $colors[$idx];
    }
        
    // Limit available blocks in editor

    // Available blocks are:
    // core/shortcode
    // core/image
    // core/gallery
    // core/heading
    // core/quote
    // core/embed
    // core/list
    // core/separator
    // core/more
    // core/button
    // core/pullquote
    // core/table
    // core/preformatted
    // core/code
    // core/html
    // core/freeform
    // core/latest-posts
    // core/categories
    // core/cover-image
    // core/text-columns
    // core/verse
    // core/video
    // core/audio
    // core/block
    // core/paragraph
    
    // core-embed/twitter
    // core-embed/youtube
    // core-embed/facebook
    // core-embed/instagram
    // core-embed/wordpress
    // core-embed/soundcloud
    // core-embed/spotify
    // core-embed/flickr
    // core-embed/vimeo
    // core-embed/animoto
    // core-embed/cloudup
    // core-embed/collegehumor
    // core-embed/dailymotion
    // core-embed/funnyordie
    // core-embed/hulu
    // core-embed/imgur
    // core-embed/issuu
    // core-embed/kickstarter
    // core-embed/meetup-com
    // core-embed/mixcloud
    // core-embed/photobucket
    // core-embed/polldaddy
    // core-embed/reddit
    // core-embed/reverbnation
    // core-embed/screencast
    // core-embed/scribd
    // core-embed/slideshare
    // core-embed/smugmug
    // core-embed/speaker
    // core-embed/ted
    // core-embed/tumblr
    // core-embed/videopress
    // core-embed/wordpress-tv

    function wave_allowed_blocks() {
        return array(
          'core/shortcode',
          'core/heading',
          'core/paragraph',
          'core/image',
          'core/text-columns',
          'core/columns',
          'core/list',
          'core/table',
          'core-embed/vimeo',
          'core-embed/youtube',
          'pgcsimplygalleryblock/grid',
          'acf/contact',
          'acf/service'
        );
    }
    add_filter( 'allowed_block_types', 'wave_allowed_blocks' );
?>