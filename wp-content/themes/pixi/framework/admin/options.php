<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
	
	

    // This is your option name where all the Redux data is stored.
    $opt_name = "pixi_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists(  get_template_directory() . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( get_template_directory(). '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
   
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'pixi' ),
        'page_title'           => esc_html__( 'Theme Options', 'pixi' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
    Redux::setArgs( $opt_name, $args );
    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'pixi' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'pixi' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'pixi' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'pixi' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'pixi' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    /*
        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */
	 
	// -> START General
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'General', 'pixi' ),
		'icon'   => 'el-icon-cogs',
		'desc'   => esc_html__( '', 'pixi' ),
		'fields' => array(
			array(
                'id'       => 'body_layout',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Layout', 'pixi' ),
                'subtitle' => esc_html__( 'Body layout with wide or boxed.', 'pixi' ),
                'options'  => array(
                    'wide' => 'Wide',
                    'boxed'=> 'Boxed',
					'lines'=> 'lines'
                ),
                'default'  => 'wide'
            ),
			array(
				'id'       => 'page_loader',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Loader', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable page loader.', 'pixi' ),
				'default'  => true,
			),
		    array(
                'id'       => 'lazy_load',
                'type'     => 'switch',
                'title'    => esc_html__( 'Lazy Load', 'pixi' ),
                'subtitle' => esc_html__( 'Enable/Disable lazy load images.', 'pixi' ),
                'default'  => false,
            ),
		)
	) );
	
	// -> START Color
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Color', 'pixi' ),
        'id'     => 'color',
        'desc'   => esc_html__( '', 'pixi' ),
        'icon'   => 'el el-brush',
		'fields' => array(
			array(
				'id'       => 'th_select_stylesheet',
				'type'     => 'select',
				'title'    => esc_html__( 'Theme Stylesheet', 'pixi' ),
				'subtitle' => esc_html__( 'Select your themes alternative color scheme.', 'pixi' ),
				'options'  => array(
		              'blue.css'   => 'Blue',
		              'purple.css' => 'Purple (default)',
					  'green.css'  => 'Green', 
		              'orange.css' => 'Orange', 
					  'rose.css'   => 'Rose'
				  ),
				'default'  => 'purple.css',
			),
			array(
				'id'       => 'th_primary_color',
				'type'     => 'color',
				'title'    => esc_html__('primary color', 'pixi'),
				'subtitle' => esc_html__('Controls primary color items. (default: #4208bc).', 'pixi'),
				'default'  => '',
				'validate' => 'color',
			),
		array(
				'id'       => 'th_secondary_color',
				'type'     => 'color',
				'title'    => esc_html__('secondary color', 'pixi'),
				'subtitle' => esc_html__('Control secondary color items. (default: #7141f9).', 'pixi'),
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'body_background',
				'type'     => 'background',
				'title'    => esc_html__('Body Background', 'pixi'),
				'subtitle' => esc_html__('Body background with image, color, etc.', 'pixi'),
				'output'      => array('body , .main-content , .internal-content'),
		        'default'  => array(
					'background-color' => '#fff',
				),
			),
		 )
    ) );
	
	// -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'pixi' ),
        'id'     => 'typography',
		'desc'   => esc_html__( '', 'pixi' ),
		'icon'   => 'el el-font',
        'fields' => array(
            array(
				'id'          => 'body_font',
				'type'        => 'typography', 
				'title'       => esc_html__('Body Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#7e7e7e', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '25px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'h1_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H1 Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h1'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222', 
					'font-weight' => '400',  
					'font-family' => 'Poppins',  
					'google'      => true,
					'font-size'   => '52px',
					'line-height' => '57px'
				),
			),
			array(
				'id'          => 'h2_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H2 Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h2'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222', 
					'font-weight' => '400',  
					'font-family' => 'Poppins',  
					'google'      => true,
					'font-size'   => '42px', 
					'line-height' => '46px'
				),
			),
			array(
				'id'          => 'h3_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H3 Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h3'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222', 
					'font-weight' => '400',  
					'font-family' => 'Poppins',
					'google'      => true,
					'font-size'   => '38px', 
					'line-height' => '43px'
				),
			),
			array(
				'id'          => 'h4_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H4 Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h4'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222', 
					'font-weight' => '400',  
					'font-family' => 'Poppins', 
					'google'      => true,
					'font-size'   => '32px', 
					'line-height' => '38px',
				),
			),
			array(
				'id'          => 'h5_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H5 Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h5'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222', 
					'font-weight' => '400',  
					'font-family' => 'Poppins', 
					'google'      => true,
					'font-size'   => '24px', 
					'line-height' => '32px',
				),
			),
			array(
				'id'          => 'h6_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H6 Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h6'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222', 
					'font-weight' => '400',  
					'font-family' => 'Poppins',  
					'google'      => true,
					'font-size'   => '20px', 
					'line-height' => '28px',
				),
			),
        )
    ) );
	
	// -> START Logo
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Logo', 'pixi' ),
        'id'     => 'logo',
		'desc'   => esc_html__( '', 'pixi' ),
        'icon'   => 'el el-icon-viadeo',
		'fields' => array(
			array(
				'id'       => 'tb_logo',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__('Logo', 'pixi'),
				'subtitle' => esc_html__('Select an image file for your logo.', 'pixi'),
				'default'  => array('url'	=> PIXI_URI_PATH.'/assets/images/logo.svg'),
			),
		   array(
				'id'       => 'tb_logo_white',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__('Logo white', 'pixi'),
				'subtitle' => esc_html__('Select an image file for your white logo.', 'pixi'),
				'default'  => array('url'	=> PIXI_URI_PATH.'/assets/images/logo-white.svg'),
			),
			array(
				'subtitle' => esc_html__('in pixels.', 'pixi'),
				'id' => 'logo_height',
				'title' => 'Logo Height',
				'type' => 'dimensions',
			    'units' => array('px'),
				'width' => false,
				'output' => array('.mo-header-v1 .logo img , .mo-header-v2 .mo-logo img , .navigation img.logo , .mo-header-v4 .mo-logo img , .mo-header-v5 .mo-logo img , .mo-header-v6 .mo-logo img , .mo-header-onepage .mo-logo img, .mo-left-navigation .mo-header-menu .mo-logo img, .navigation img.Logo_white, .navigation .logo.logo_page'),
				'default' => array(
	            	'units' => 'px',
				   'height' => '47px'
				)
			),
			array(
				'id'       => 'favicon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Custom favicon', 'pixi' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Upload a 16px x 16px png/ico image that will represent your website\'s favicon', 'pixi' ),
				'default'  => array( 'url' => PIXI_URI_PATH.'/assets/images/favicon.ico' ),
			),
			
		)
    ) );
	
	// -> START Header
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header', 'pixi' ),
        'id'     => 'header',
        'desc'   => esc_html__( '', 'pixi' ),
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'tb_header_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Header Layout', 'pixi'),
				'subtitle' => esc_html__('Select header layout in your site.', 'pixi'),
				'options'  => array(
					'sidepanel'	=> array(
						'alt'   => 'Header V1',
						'img'   => PIXI_URI_PATH.'/assets/images/headers/header-v1.png'
					),
					'header-v2'	=> array(
						'alt'   => 'Header V2',
						'img'   => PIXI_URI_PATH.'/assets/images/headers/header-v2.png'
					),
					'header-v3'	=> array(
						'alt'   => 'Header V3',
						'img'   => PIXI_URI_PATH.'/assets/images/headers/header-v3.png'
					),
					'header-v4'	=> array(
						'alt'   => 'Header V4',
						'img'   => PIXI_URI_PATH.'/assets/images/headers/header-v4.png'
					),
					'header-v5'	=> array(
						'alt'   => 'Header V5',
						'img'   => PIXI_URI_PATH.'/assets/images/headers/header-v5.png'
					),
					'header-v6'	=> array(
						'alt'   => 'Header V6',
						'img'   => PIXI_URI_PATH.'/assets/images/headers/header-v6.png'
					),
				),
				'default' => 'header-v2'
			),
		)
    ) );
	
		// -> START Main Menu
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu', 'pixi' ),
        'id'     => 'main_menu',
        'desc'   => esc_html__( '', 'pixi' ),
        'icon'   => 'el el-icon-list',
    ) );
	
	// -> START Main Menu Header V1
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V1', 'pixi' ),
        'id'     => 'main_menu_v1',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'          => 'menu_first_level',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v1 h6.follow-us, .nav-sidepanel > ul > li > a, .nav-sidepanel > ul ul li a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'line-height' => '27px',
		            'font-size'   => '21px',
		            'font-weight' => '700',  
					'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'bg_main_menu_v1',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: #fff).', 'pixi'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-sidepanel-v1 , .mo-header-v1 .menu-toggle'),
			),
			array(
				'id'       => 'switch_social_v1',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable or disable social icons on nav bar', 'pixi' ),
				'desc'     => esc_html__( 'It\'s work only if is enabled canvas menu style', 'pixi' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
		     array(
				'id'       => 'text_v1',
				'type'     => 'text',
				'title'    => esc_html__('text', 'pixi'),
				'subtitle' => esc_html__('Please, Enter text menu.', 'pixi'),
			),
		)
    ) );
	
	// -> START Main Menu Header V2
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V2', 'pixi' ),
        'id'     => 'main_menu_v2',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'stick_main_menu_v2',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'pixi' ),
				'default'  => true,
			),
			array(
				'id'          => 'menu_first_level_v2',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v2 .mo-menu-list > ul > li > a , .mo-header-v2 .mo-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222',
					'font-family' => 'Nunito Sans',  
					'google'      => true,
		            'line-height' => '20px',
		            'font-size'   => '13px',
		            'font-weight' => '700',  
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level_v2',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a, .mo-header-v2 .mo-cart-content .total , .mo-header-v2 .mo-cart-content .cart_list.product_list_widget .mini_cart_item > a , .mo-header-v2 .mo-cart-header > a , .mo-header-v2 .mo-search-header > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#7f7f7f', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0',
				),
			),
			array(
				'id'       => 'bg_main_menu_v2',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default:#fff).', 'pixi'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-header-v2 .mo-header-menu'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v2',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default:#f4f5fa).', 'pixi'),
				'default'  => array(
					'background-color' => '#f4f5fa',
				),
				'output'   => array('.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul,
									.mo-header-v2 .mo-cart-content , .mo-header-v2 .header_search
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v2',
				'type'     => 'background',
				'title'    => esc_html__('Stick Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default:#fff).', 'pixi'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-stick-active .mo-header-v2.mo-header-stick .mo-header-menu'),
				'required' => array('stick_main_menu_v2','=', true),
			),
			array(
				'id'=>'menu_other_v2',
				'type' => 'button_set',
				'title' => esc_html__('Menu Right Icons', 'pixi'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'pixi'),    
					'social'    => esc_html__('Social', 'pixi'),
					'search'    => esc_html__('Search', 'pixi'),
					'cart'      => esc_html__('Cart', 'pixi'),
					'sidepanel' => esc_html__('Sidepanel', 'pixi')
				),
				'default' => array('sidepanel'),                            
			 ),
		)
    ) );
	
	// -> START Main Menu Header V3
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V3', 'pixi' ),
        'id'     => 'main_menu_v3',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v3',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fixed Menu', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable fixed menu.', 'pixi' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v3',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v3 .mo-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#fff',
					'font-family' => 'Nunito Sans', 
					'google'      => true,
			        'line-height' => '65px',
	            	'font-size'   => '13px',
		            'font-weight' => '700',  
					'letter-spacing' => '0'
	           ),
			),
			array(
				'id'          => 'menu_sub_level_v3',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#92959c', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0'),
			),
			array(
				'id'       => 'bg_main_menu_v3',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: transparent).', 'pixi'),
				'default'  => array(
					'background-color' => 'transparent',
				),
				'output'   => array('.mo-header-v3 .mo-header-menu'),
			),
		    array(
				'id'       => 'bg_main_menu_stick_v3',
				'type'     => 'background',
				'title'    => esc_html__('Background fixed menu', 'pixi'),
				'subtitle' => esc_html__('Controls background fixed menu color (default: transparent).', 'pixi'),
				'default'  => array(
					'background-color' => '#4208bc',
				),
				'required' => array('fixed_main_menu_v3','=', true),
				'output'   => array('.mo-stick-active .mo-header-v3.mo-header-stick .mo-header-menu'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v3',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: #fff ).', 'pixi'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li >ul'),
			),
		)
    ) );
	// -> START Main Menu Header V4
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V4', 'pixi' ),
        'id'     => 'main_menu_v4',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'stick_main_menu_v4',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'pixi' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v4',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v4 .mo-menu-list > ul > li > a , .mo-header-v4 .mo-search-header > a , .mo-header-v4 .mo-cart-header > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#7b7b7b',
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'line-height' => '95px',
		            'font-size'   => '13px',
		            'font-weight' => '700',  
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level_v4',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a ,
										.mo-header-v4  .sub-menu > li > a , .mo-header-v4 .mo-cart-content .total , .mo-header-v4 .mo-cart-content .cart_list.product_list_widget .mini_cart_item > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#7b7b7b', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'bg_main_menu_v4',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: #fff).', 'pixi'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-header-v4 .mo-header-top , .mo-header-v4 .mo-header-menu , .mo-header-v4 #lang > ul li > ul'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v4',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: #fff).', 'pixi'),
				'default'  => array(
					'background-color' => '#f4f5fa',
				),
				'output'   => array('.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul, .mo-header-v4 .mo-cart-content , .mo-header-v4 .header_search'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v4',
				'type'     => 'background',
				'title'    => esc_html__('Stick Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: #fff).', 'pixi'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-stick-active .mo-header-v4.mo-header-stick .mo-header-menu'),
				'required' => array('stick_main_menu_v4','=', true),
			),
            array(
				'id'=>'menu_other_v4',
				'type' => 'button_set',
				'title' => esc_html__('Menu Right Icons', 'pixi'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'pixi'),    
					'social'    => esc_html__('Social', 'pixi'),
					'search'    => esc_html__('Search', 'pixi'),
					'cart'      => esc_html__('Cart', 'pixi'),
					'sidepanel' => esc_html__('Sidepanel', 'pixi'),
					'button'    => esc_html__('Button', 'pixi'),
				),
				'default' => array('social'),                            
			 ),
		     array(
				'id'       => 'menu_other_but_v4',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button', 'pixi'),
				'subtitle' => esc_html__('Please, Enter menu right button name.', 'pixi'),
				'required' => array('menu_other_v4','=', 'button')
			),
		    array(
				'id'       => 'menu_other_but_link_v4',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button Link', 'pixi'),
				'subtitle' => esc_html__('Please, Enter menu right button link.', 'pixi'),
				'required' => array('menu_other_v4','=', 'button')
			),
		   
		    array(
				'id'=>'menu_other_v4_tr',
				'type' => 'button_set',
				'title' => esc_html__('Top Menu Right Icons', 'pixi'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'pixi'),    
					'social'    => esc_html__('Social', 'pixi'),
					'search'    => esc_html__('Search', 'pixi'),
					'sidepanel' => esc_html__('Sidepanel', 'pixi'),
				),
				'default' => array('lang','search','sidepanel'),                            
		    ),
		   array(
				'id' => 'menu_other_v4_tl',
				'type' => 'text',
				'title' => esc_html__('Text left Top Menu', 'pixi' ),
			),
		)
    ) );
		
	// -> START Main Menu Header V5
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V5', 'pixi' ),
        'id'     => 'main_menu_v5',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'stick_main_menu_v5',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'pixi' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v5',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v5 .mo-menu-list > ul > li > a , .mo-header-v5 .mo-header-top.t_motivo .icon_text, .mo-header-v5 .mo-header-top.t_motivo a , .mo-header-v5 .mo-search-header > a , .mo-header-v5 .mo-cart-header > a, .mo-header-v5 .social-header-v5 li a , .mo-header-v5 .lang_link > ul > li'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#fff',
					'font-family' => 'Nunito Sans', 
					'google'      => true,
		 			'line-height' => '80px',
		            'font-size'   => '13px',
		            'font-weight' => '700',  
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level_v5',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a, 
										.mo-header-v5 .mo-cart-content .total , .mo-header-v5 .mo-cart-content .cart_list.product_list_widget .mini_cart_item > a
										'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'bg_main_menu_v5',
				'type'     => 'background',
				'title'    => esc_html__('Menu Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: transparent).', 'pixi'),
				'default'  => array(
					'background-color' => 'transparent',
				), 
				'output'   => array('.mo-header-v5 .mo-header-menu'),
			),
			array(
				'id'       => 'bg_stick_menu_v5',
				'type'     => 'background',
				'title'    => esc_html__('Stick Menu Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: #fff.', 'pixi'),
				'default'  => array(
					'background-color' => '#fff',
				), 
				'output'   => array('.mo-stick-active .mo-header-v5.mo-header-stick .mo-header-menu:before'),
				'required' => array('stick_main_menu_v5','=', true),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v5',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: #868686).', 'pixi'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
								    .mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul,
									.mo-header-v5 .mo-cart-content , .mo-header-v5 .header_search
									'),
			),
		    array(
				'id'=>'menu_other_v5',
				'type' => 'button_set',
				'title' => esc_html__('Menu Right Icons', 'pixi'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'pixi'),    
					'social'    => esc_html__('Social', 'pixi'),
					'search'    => esc_html__('Search', 'pixi'),
					'cart'      => esc_html__('Cart', 'pixi'),
					'sidepanel' => esc_html__('Sidepanel', 'pixi'),
					'button'    => esc_html__('Button', 'pixi'),
				),
				'default' => array('social'),                            
			 ),
		     array(
				'id'       => 'menu_other_but_v5',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button', 'pixi'),
				'subtitle' => esc_html__('Please, Enter menu right button name.', 'pixi'),
				'required' => array('menu_other_v5','=', 'button')
			),
		    array(
				'id'       => 'menu_other_but_link_v5',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button Link', 'pixi'),
				'subtitle' => esc_html__('Please, Enter menu right button link.', 'pixi'),
				'required' => array('menu_other_v5','=', 'button')
			),
		 )
    ) );
	
	// -> START Main Menu Header V6
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V6', 'pixi' ),
        'id'     => 'main_menu_v6',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'stick_main_menu_v6',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'pixi' ),
				'default'  => true,
			),
			array(
				'id'          => 'menu_first_level_v6',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v6 .mo-menu-list > ul > li > a, .mo-header-v6 .mo-header-top.t_motivo .contact_info, .mo-header-v6 .mo-header-top.t_motivo .contact_info a, .mo-header-v6 .social-header-v6 li a , .mo-header-v6 .mo-search-header > a , .mo-header-v6 .mo-cart-header > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '700',  
					'font-family' => 'Poppins', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '20px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level_v6',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a,
										.mo-header-v6 .mo-cart-content .total , .mo-header-v6 .mo-cart-content .cart_list.product_list_widget .mini_cart_item > a 
										'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'bg_main_menu_v6',
				'type'     => 'background',
				'title'    => esc_html__('Background Main Menu', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default:#fff ).', 'pixi'),
				'default'  => array(
					'background-color' => 'transparent',
				), 
				'output'   => array('.mo-header-v6 .mo-header-menu , .mo-header-v6 .mo-header-top.t_motivo , .mo-header-v6 #lang > ul li > ul'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v6',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: #ffffff).', 'pixi'),
				'default'  => array(
					'background-color' => '#f4f5fa',
				),
				'output'   => array('.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									 .mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									 .mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									 .mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul,
									 .mo-header-v6 .header_search , .mo-header-v6 .mo-cart-content
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v6',
				'type'     => 'background',
				'title'    => esc_html__('Stick Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default:rgba(0,0,0,0.7) ).', 'pixi'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-stick-active .mo-header-v6.mo-header-stick .mo-header-menu , .mo-stick-active .mo-header-v6.mo-header-stick .mo-header-top.t_motivo , .mo-stick-active .mo-header-v6.mo-header-stick #lang > ul li > ul'),
				'required' => array('stick_main_menu_v6','=', true),
			),
			array(
				'id'=>'menu_other_v6',
				'type' => 'button_set',
				'title' => esc_html__('Menu Right Icons', 'pixi'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'pixi'),    
					'social'    => esc_html__('Social', 'pixi'),
					'search'    => esc_html__('Search', 'pixi'),
					'cart'      => esc_html__('Cart', 'pixi'),
					'sidepanel' => esc_html__('Sidepanel', 'pixi'),
					'button'    => esc_html__('Button', 'pixi'),
				),
		        'default' => array( 'cart', 'search', 'sidepanel'),              
			 ),
		     array(
				'id'       => 'menu_other_but_v6',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button', 'pixi'),
				'subtitle' => esc_html__('Please, Enter menu right button name.', 'pixi'),
				'required' => array('menu_other_v6','=', 'button'),
				'default'  => 'Get in touch',
			),
		    array(
				'id'       => 'menu_other_but_link_v6',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button Link', 'pixi'),
				'subtitle' => esc_html__('Please, Enter menu right button link.', 'pixi'),
				'required' => array('menu_other_v6','=', 'button'),
				'default'  => '#',
			),
		)
    ) );
	// -> START Main Menu Header Left Navigation
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Left Nav', 'pixi' ),
        'id'     => 'main_menu_left_nav',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'          => 'menu_first_level_left_nav',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-left-navigation .mo-header-menu .mo-menu-list > ul > li > a, .mo-left-navigation-border .mo-header-menu .mo-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => 'rgba(255,255,255,0.8)',
					'font-weight' => '700',  
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '34px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level1_left_nav',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level 1 Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.mo-left-navigation .mo-header-menu .mo-menu-list > ul > li.menu-item-has-children > ul > li > a, .mo-left-navigation-border .mo-header-menu .mo-menu-list > ul > li.menu-item-has-children > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => 'rgba(255,255,255,0.6)', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '30px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level2_left_nav',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level 2 Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.mo-left-navigation .mo-header-menu .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li > a, .mo-left-navigation-border .mo-header-menu .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => 'rgba(255,255,255,0.6)', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '15px', 
					'line-height' => '34px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'bg_main_menu_left_nav',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'pixi'),
				'subtitle' => esc_html__('Controls background color (default: #fff).', 'pixi'),
				'default'  => array(
					'background-color' => '#1d222b',
				),
				'output'   => array('.mo-left-navigation'),
			),
			array(
				'id'       => 'switch_social_lnav',
				'type'     => 'switch',
				'title'    => esc_html__( 'social icons', 'pixi' ),
				'desc'     => esc_html__( 'Enable or disable social icons', 'pixi' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
		   array(
				'id' => 'copyright_txt_lnav',
				'type' => 'text',
				'title' => esc_html__('Text Copyright', 'pixi' ),
			),
		)
    ) );

	// -> START Main Menu Header Left Navigation
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Meun Lang Icon', 'pixi' ),
        'id'     => 'menu_lang_icon',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			 array(
				'id'    => 'link_en',
				'type'  => 'text',
				'title' => esc_html__('English Link', 'pixi' ),
				'desc'  => esc_html__('Your English Link', 'pixi' ),
			),
			array(
				'id'    => 'link_fr',
				'type'  => 'text',
				'title' => esc_html__('French Link', 'pixi' ),
				'desc'  => esc_html__('Your French Link', 'pixi' ),
			),
			array(
				'id'    => 'link_ge',
				'type'  => 'text',
				'title' => esc_html__('German Link', 'pixi' ),
				'desc'  => esc_html__('Your German Link', 'pixi' ),
			),
		    array(
				'id'    => 'link_de',
				'type'  => 'text',
				'title' => esc_html__('Deutsch Link', 'pixi' ),
				'desc'  => esc_html__('Your Deutsch Link', 'pixi' ),
			),
		    array(
				'id'    => 'link_ro',
				'type'  => 'text',
				'title' => esc_html__('Romanian Link', 'pixi' ),
				'desc'  => esc_html__('Your Romanian Link', 'pixi' ),
			), 
		    array(
				'id'    => 'link_sp',
				'type'  => 'text',
				'title' => esc_html__('Spanish Link', 'pixi' ),
				'desc'  => esc_html__('Your Spanish Link', 'pixi' ),
			), 
		    array(
				'id'    => 'link_ar',
				'type'  => 'text',
				'title' => esc_html__('Arabic Link', 'pixi' ),
				'desc'  => esc_html__('Your Arabic Link', 'pixi' ),
			),
		)
    ) );

	// -> START Footer
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer', 'pixi' ),
        'id'     => 'footer',
        'desc'   => esc_html__( '', 'pixi' ),
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'tb_footer_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Footer Layout', 'pixi'),
				'subtitle' => esc_html__('Select footer layout in your site.', 'pixi'),
				'options'  => array(
	            	'footer-v0'	=> array(
						'alt'   => 'Footer V1',
						'img'   => PIXI_URI_PATH.'/assets/images/footers/footer-v0.jpg'
					),
					'footer-v1'	=> array(
						'alt'   => 'Footer V1',
						'img'   => PIXI_URI_PATH.'/assets/images/footers/footer-v1.jpg'
					),
					'footer-v2'	=> array(
						'alt'   => 'Footer V2',
						'img'   => PIXI_URI_PATH.'/assets/images/footers/footer-v2.jpg'
					),
					'footer-v3'	=> array(
						'alt'   => 'Footer V3',
						'img'   => PIXI_URI_PATH.'/assets/images/footers/footer-v3.jpg'
					),
		            'footer-v4'	=> array(
						'alt'   => 'Footer V4',
						'img'   => PIXI_URI_PATH.'/assets/images/footers/footer-v4.jpg'
					),
		            'footer-v5'	=> array(
						'alt'   => 'Footer V5',
						'img'   => PIXI_URI_PATH.'/assets/images/footers/footer-v5.jpg'
					),
				),
				'default' => 'footer-v1'
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V1', 'pixi' ),
        'id'     => 'footer_v1',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_margin',
				'title' => esc_html__('Footer Margin', 'pixi'),
				'subtitle' => esc_html__('Please, Enter margin.', 'pixi'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v1'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_padding',
				'title' => esc_html__('Footer Padding', 'pixi'),
				'subtitle' => esc_html__('Please, Enter padding.', 'pixi'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v1'),
				'default' => array(
					'padding-top'     => '80px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '0px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'pixi'),
				'subtitle' => esc_html__('background with image, color, etc.', 'pixi'),
				'output'    => array('.footer_v1 , .footer_v1 select  , .footer_v1 select option'), 
				'default'  => array(
					'background-color' => '#222222',
				)
			),
			array(
				'id'          => 'tb_footer_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v1 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '600',  
					'font-family' => 'Poppins',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '30px',
					'letter-spacing' => '.8px'
				),
			),
			array(
				'id'          => 'tb_footer_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v1 , .footer_v1 p , .footer_v1 a , .footer_v1 span , .footer_v1 select , .footer_v1 select option , .footer_v1 td, .footer_v1 th '),
				'units'       =>'px',
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#cecece',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '23px',
	         	    'letter-spacing' => '0'
				),
			),
		    array(
				'id'       => 'tb_footer_fixed',
				'type'     => 'switch',
				'title'    => esc_html__( 'footer fixed', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable footer fixed.', 'pixi' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_footer_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'pixi' ),
				'default'  => true,
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V2', 'pixi' ),
        'id'     => 'footer_v2',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v2_margin',
				'title' => esc_html__('Footer Margin', 'pixi'),
				'subtitle' => esc_html__('Please, Enter margin.', 'pixi'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v2'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v2_padding',
				'title' => esc_html__('Footer Columns Padding', 'pixi'),
				'subtitle' => esc_html__('Please, Enter padding.', 'pixi'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v2 .footer-widget-1 , .footer_v2 .footer-widget-2 , .footer_v2 .footer-widget-3 , .footer_v2 .footer-widget-4'),
				'default' => array(
					'padding-top'     => '90px', 
					'padding-right'   => '', 
					'padding-bottom'  => '90px', 
					'padding-left'    => '',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v2_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'pixi'),
				'subtitle' => esc_html__('background with image, color, etc.', 'pixi'),
				'output'    => array('.footer_v2 , .footer_v2 select  , .footer_v2 select option'), 
				'default'  => array(
					'background-color' => '#ffffff',
				)
			),
			array(
				'id'          => 'tb_footer_v2_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v2 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222',
					'font-weight' => '600',  
					'font-family' => 'Poppins',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '30px',
					'letter-spacing' => '.8px'
				),
			),
			array(
				'id'          => 'tb_footer_v2_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v2 , .footer_v2 p , .footer_v2 a , .footer_v2 h5 , .footer_v2 h6 , .footer_v2 span , .footer_v2 select , .footer_v2 select option , .footer_v2 td, .footer_v2 th '),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#92959c',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '23px',
	         	    'letter-spacing' => '0'
				),
			),
           array(
				'id'       => 'tb_footer_v2_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'pixi' ),
				'default'  => true,
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V3', 'pixi' ),
        'id'     => 'footer_v3',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v3_margin',
				'title' => esc_html__('Footer Margin', 'pixi'),
				'subtitle' => esc_html__('Please, Enter margin.', 'pixi'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v3'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v3_padding',
				'title' => esc_html__('Footer Columns Padding', 'pixi'),
				'subtitle' => esc_html__('Please, Enter padding.', 'pixi'),
				'type' => 'spacing',
				'units' => array('px'),
				'output'         => array('.footer_v3'),
				'default' => array(
					'padding-top'     => '100px', 
					'padding-right'   => '0', 
					'padding-bottom'  => '100px', 
					'padding-left'    => '0',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v3_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'pixi'),
				'subtitle' => esc_html__('background with image, color, etc.', 'pixi'),
				'output'   => array('.footer_v3 , .footer_v3 select  , .footer_v3 select option'), 
				'default'  => array(
					'background-color' => '#f4f5fa',
				)
			),
			array(
				'id'          => 'tb_footer_v3_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v3 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#222222',
					'font-weight' => '600',  
					'font-family' => 'Poppins',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '30px',
					'letter-spacing' => '.8px'
				),
			),
			array(
				'id'          => 'tb_footer_v3_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v3 , .footer_v3 p , .footer_v3 a , .footer_v3 h5 , .footer_v3 h6 , .footer_v3 span , .footer_v3 select , .footer_v3 select option , .footer_v3 td, .footer_v3 th , .footer_v3 a:before'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#5f5f5f',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '23px',
	         	    'letter-spacing' => '0'
				),
			),
           array(
				'id'       => 'tb_footer_v3_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'pixi' ),
				'default'  => true,
			),
		)
    ) );


    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V4', 'pixi' ),
        'id'     => 'footer_v4',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v4_margin',
				'title' => esc_html__('Footer Margin', 'pixi'),
				'subtitle' => esc_html__('Please, Enter margin.', 'pixi'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v4'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v4_padding',
				'title' => esc_html__('Footer Padding', 'pixi'),
				'subtitle' => esc_html__('Please, Enter padding.', 'pixi'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v4'),
				'default' => array(
					'padding-top'     => '90px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '120px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v4_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'pixi'),
				'subtitle' => esc_html__('background with image, color, etc.', 'pixi'),
				'output'    => array('.footer_v4, .footer_v4 select  , .footer_v4 select option'), 
				'default'  => array(
					'background-color' => '#222222',
				)
			),
			array(
				'id'          => 'tb_footer_v4_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v4 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '600',  
					'font-family' => 'Poppins',  
					'google'      => true,
					'font-size'   => '20px', 
					'line-height' => '30px',
					'letter-spacing' => '.8px'
				),
			),
			array(
				'id'          => 'tb_footer_v4_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v4 , .footer_v4 p , .footer_v4 a , .footer_v4 span , .footer_v4 select , .footer_v4 select option , .footer_v4 td, .footer_v4 th '),
				'units'       =>'px',
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#979797',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '23px',
	         	    'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'tb_footer_v4_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'pixi' ),
				'default'  => true,
			),
		)
    ) );




    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V5', 'pixi' ),
        'id'     => 'footer_v5',
        'desc'   => esc_html__( '', 'pixi' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v5_margin',
				'title' => esc_html__('Footer Margin', 'pixi'),
				'subtitle' => esc_html__('Please, Enter margin.', 'pixi'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v5'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v5_padding',
				'title' => esc_html__('Footer Padding', 'pixi'),
				'subtitle' => esc_html__('Please, Enter padding.', 'pixi'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_container_v5'),
				'default' => array(
					'padding-top'     => '90px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '50px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v5_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'pixi'),
				'subtitle' => esc_html__('background with image, color, etc.', 'pixi'),
				'output'    => array('.footer_v5, .footer_v5 select  , .footer_v5 select option'), 
				'default'  => array(
					'background-color' => '#7141f9',
				)
			),
			array(
				'id'          => 'tb_footer_v5_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v5 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '600',  
					'font-family' => 'Poppins',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '30px',
					'letter-spacing' => '.8px'
				),
			),
			array(
				'id'          => 'tb_footer_v5_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v5 , .footer_v5 p , .footer_v5 a , .footer_v5 span , .footer_v5 select , .footer_v5 select option , .footer_v5 td, .footer_v5 th , .footer_v5 .mo-news-list .mo-meta span , .footer_v5 ul.contact-list li'),
				'units'       =>'px',
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => 'rgba(255, 255, 255, 0.8)',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '23px',
	         	    'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'tb_footer_v5_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'pixi' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'pixi' ),
				'default'  => true,
			),
		)
    ) );
	/*-----------------------------------------------*
    START Title Bar
    /*-----------------------------------------------*/
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Title Bar', 'pixi' ),
        'id'     => 'title_bar',
        'desc'   => esc_html__( '', 'pixi' ),
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'tb_page_title_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('pagetitle Layout', 'pixi'),
				'subtitle' => esc_html__('Select pagetitle layout in your site.', 'pixi'),
				'options'  => array(
					'pagetitle-v1'	=> array(
						'alt'   => 'Page title V1',
						'img'   => PIXI_URI_PATH.'/assets/images/pagetitle/pagetitle-v1.png'
					),
					'pagetitle-v2'	=> array(
						'alt'   => 'Page title V2',
						'img'   => PIXI_URI_PATH.'/assets/images/pagetitle/pagetitle-v2.png'
					),
					'pagetitle-v3'	=> array(
						'alt'   => 'Page title V3',
						'img'   => PIXI_URI_PATH.'/assets/images/pagetitle/pagetitle-v3.png'
					),
					'pagetitle-v4'	=> array(
						'alt'   => 'Page title V4',
						'img'   => PIXI_URI_PATH.'/assets/images/pagetitle/pagetitle-v4.png'
					),
		           'pagetitle-v5'	=> array(
						'alt'   => 'Page title V5',
						'img'   => PIXI_URI_PATH.'/assets/images/pagetitle/pagetitle-v5.png'
					),
				),
				'default' => 'pagetitle-v2'
            ),
			array(
				'id'       => 'tb_title_bar_bg',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'pixi'),
				'subtitle' => esc_html__('background with image, color, etc.', 'pixi'),
				'output'         => array('.page-header .mo-title-bar-wrap'),
				'default'  => array(
					'background-color' => '#252b33',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-attachment' => 'fixed',
					'background-size' => 'cover',
					'background-image' => PIXI_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
			array( 
				'id'       => 'tb_show_page_title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show page title', 'pixi' ),
				'subtitle' => esc_html__( 'Show or not show page title.', 'pixi' ),
				'default'  => true,
			),
			array( 
				'id'       => 'tb_show_page_breadcrumb',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show page breadcrumb', 'pixi' ),
				'subtitle' => esc_html__( 'Show or not show page breadcrumb.', 'pixi' ),
				'default'  => true,
			),
			array(
				'id'          => 'title_bar_heading',
				'type'        => 'typography', 
				'title'       => esc_html__('Title Bar Heading', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.page-header .mo-title-bar h2'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'        => '#fff', 
					'font-weight'  => '600', 
					'font-family'  => 'Poppins',  
					'google'       => true,
					'font-size'    => '50px', 
					'line-height'  => '76px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'title_bar_path',
				'type'        => 'typography', 
				'title'       => esc_html__('Title Bar Path', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.page-header .mo-title-bar .mo-path, .page-header .mo-title-bar .mo-path a ,  .woocommerce .mo-page-title-shop, .woocommerce .mo-page-title-shop a , .pagetitle-v4 .mo-path-inner'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => '#fff', 
					'font-weight' => '700', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '14px',
					'letter-spacing' => '0'
				),
			),
		   	array(
				'id'       => 'title_bar_subtext',
				'type'     => 'text',
				'title'    => esc_html__('Sub Text', 'pixi'),
				'subtitle' => esc_html__('Please, Enter sub text of title bar.', 'pixi'),
				'default'  => ''
			),
			array(
				'id'          => 'title_bar_subtext_format',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Text Format', 'pixi'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.page-header .mo-title-bar h4'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pixi'),
				'default'     => array(
					'color'       => 'rgba(255,255,255,0.5)', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '20px',
					'letter-spacing' => '0.64px'
				),
			),
			array(
				'id'       => 'page_breadcrumb_delimiter',
				'type'     => 'text',
				'title'    => esc_html__('Delimiter', 'pixi'),
				'subtitle' => esc_html__('Please, Enter Delimiter of page breadcrumb in title bar.', 'pixi'),
				'default'  => '/'
			),
		)
		
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Post', 'pixi' ),
        'id'     => 'post_titlebar',
        'desc'   => esc_html__( '', 'pixi' ),
		'subsection' => true,
		'fields' => array(
		    array( 
				'id'       => 'tb_archive_title_bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Archive Title Bar', 'pixi' ),
				'subtitle' => esc_html__( 'show or not post title on your archive blog.', 'pixi' ),
				'default'  => false,
			),
			array(
				'id'       => 'tb_archive_title_bar_bg',
				'type'     => 'background',
				'title'    => esc_html__('Archive Titlebar Background', 'pixi'),
				'subtitle' => esc_html__('background with image, color, etc.', 'pixi'),
				'output'   => array('.archive .mo-title-bar-wrap'), 
				'required' => array( 'tb_archive_title_bar', '=', '1' ),
				'default'  => array(
					'background-color' => '#252b33',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-attachment' => 'fixed',
					'background-image' => PIXI_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
		 )
    ) );
	// -> START Blog Post
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog', 'pixi' ),
        'id'     => 'blog',
		'desc'   => esc_html__( '', 'pixi' ),
		'icon'   => 'el el-icon-file-edit',
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Archive Post', 'pixi' ),
        'id'     => 'archive_post',
		'subsection' => true,
        'desc'   => esc_html__( '', 'pixi' ),
		'fields' => array(
			array( 
				'id'       => 'tb_blog_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select Layout', 'pixi'),
				'subtitle' => esc_html__('Select layout of blog.', 'pixi'),
				'options'  => array(
					'2cl'	=> array(
								'alt'   => '2cl',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/2cl.png'
							),
					'2cr'	=> array(
								'alt'   => '2cr',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/2cr.png'
							),
		            '1col'	=> array(
								'alt'   => '1col',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/1col.png'
							)
				),
				'default' => '2cr'
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Single Post', 'pixi' ),
        'id'     => 'single_post',
        'desc'   => esc_html__( '', 'pixi' ),
		'subsection' => true,
		'fields' => array(
			array( 
				'id'       => 'tb_post_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select Layout', 'pixi'),
				'subtitle' => esc_html__('Select layout of single blog.', 'pixi'),
				'options'  => array(
					'2cl'	=> array(
								'alt'   => '2cl',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/2cl.png'
							),
					'2cr'	=> array(
								'alt'   => '2cr',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/2cr.png'
							),
		           '1col'	=> array(
								'alt'   => '1col',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/1col.png'
							)
				),
				'default' => '1col'
			),
		    array( 
				'id'       => 'tb_post_header_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select header Layout', 'pixi'),
				'subtitle' => esc_html__('Select header layout of single blog.', 'pixi'),
				'options'  => array(
					'basic'	=> array(
								'alt'   => 'basic',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/1col.png'
							),
		           'img_overlay'	=> array(
								'alt'   => 'img_overlay',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/1ct.png'
							)
				),
				'default' => 'basic'
			),
		    array(
				'id'=>'post-meta-single',
				'type' => 'button_set',
				'title' => esc_html__('Post Meta in post detail page', 'pixi'),
				'multi' => true,
				'options'=> array(
					'author'  => esc_html__('Author', 'pixi'),    
					'comment' => esc_html__('Comment', 'pixi'),
					'date'    => esc_html__('Date', 'pixi'),
					'like'    => esc_html__('Like', 'pixi'),
					'cat'     => esc_html__('Categories', 'pixi'),
					'tag'     => esc_html__('Tags', 'pixi'),
					'view'    => esc_html__('View', 'pixi'),
				),
				'default' => array('author','comment','date','cat','tag','view'),                            
			 ),
		    array(
				'id'=>'post_share',
				'type' => 'button_set',
				'title' => esc_html__('Post Share Links position', 'pixi'),
				'multi' => true,
				'options'=> array(
					'sticky'    => esc_html__('Sticky', 'pixi'),    
					'basic'     => esc_html__('Basic', 'pixi'),
				), 
		       'default' => array('sticky'), 
			),
			array( 
				'id'       => 'tb_post_show_nav',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Navigation', 'pixi' ),
				'subtitle' => esc_html__( 'Show or not post navigation on your single blog.', 'pixi' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_post_show_author',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author', 'pixi' ),
				'subtitle' => esc_html__( 'Show or not post author on your single blog.', 'pixi' ),
				'default'  => true,
			),
		    array(
				'id'       => 'tb_related_post',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Post', 'pixi' ),
				'subtitle' => esc_html__( 'Show or not related post on your single blog.', 'pixi' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_post_show_comment',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Comment', 'pixi' ),
				'subtitle' => esc_html__( 'Show or not post comment on your single blog.', 'pixi' ),
				'default'  => true,
			),
		)
    ) );

    // -> START Portfolio
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Portfolio', 'pixi' ),
        'id'     => 'portfolio',
        'desc'   => esc_html__( '', 'pixi' ),
        'icon'   => 'el el-picture',
		'fields' => array(
		  array( 
				'id'       => 'tb_portfolio_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select Layout', 'pixi'),
				'subtitle' => esc_html__('Select layout of portfolio.', 'pixi'),
				'options'  => array(
					'2cl'	=> array(
								'alt'   => '2cl',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/2cl.png'
							),
					'2cr'	=> array(
								'alt'   => '2cr',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/2cr.png'
							),
		            '1col'	=> array(
								'alt'   => '1col',
								'img'   => PIXI_URI_PATH_ADMIN.'/assets/images/1col.png'
							)
				),
				'default' => '2cl'
			),
		    array(
				'id'=>'tb_portfolio_meta_single',
				'type' => 'button_set',
				'title' => esc_html__('Post Meta in portfolio page', 'pixi'),
				'multi' => true,
				'options'=> array(
					'author'  => esc_html__('Author', 'pixi'),    
					'date'    => esc_html__('Date', 'pixi'),
					'like'    => esc_html__('Like', 'pixi'),
					'cat'     => esc_html__('Categories', 'pixi'),
					'view'    => esc_html__('View', 'pixi'),
		            'share'    => esc_html__('Share', 'pixi'),
				),
				'default' => array('date','cat','view','share'),                            
			 ),
		     array(
				'id'       => 'tb_portfolio_show_nav',
				'type'     => 'switch',
		        'title'    => esc_html__( 'Show Navigation', 'pixi' ),
				'subtitle' => esc_html__( 'Show or not post navigation on your single portfolio.', 'pixi' ),
				'default'  => false,
			),
		     array(
				'id'       => 'tb_related_portfolio',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Post', 'pixi' ),
				'subtitle' => esc_html__( 'Show or not related post on your portfolio page.', 'pixi' ),
				'default'  => true,
			)
		)
    ) );

	// -> START Page
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Page', 'pixi' ),
        'id'     => 'page',
        'desc'   => esc_html__( '', 'pixi' ),
        'icon'   => 'el el-pencil',
		'fields' => array(
		   array(
				'id'             => 'page_padding',
				'type'           => 'spacing',
				'output'         => array('.internal-content'),
				'mode'           => 'padding',
				'units'          => array('em', 'px'),
				'title'    => esc_html__('Padding', 'pixi'),
				'subtitle' => esc_html__('Please, Enter padding of pages.', 'pixi'),
				'default'            => array(
					'padding-top'     => '60px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '60px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
	     	array(
				'id'       => 'page_bg',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'pixi'),
				'subtitle' => esc_html__('background with image, color, etc.', 'pixi'),
				'output'   => array('.internal-content'),
				'default'  => array(
					'background-color' => '#fff',
				)
			),
			array(
				'id'       => 'page_comment',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Page Comment', 'pixi' ),
				'subtitle' => esc_html__( 'Show or not page comment on your page.', 'pixi' ),
				'default'  => true,
			)
		)
    ) );

   // -> START Blog Post
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social', 'pixi' ),
        'id'     => 'social',
		'desc'   => esc_html__( '', 'pixi' ),
		'icon'   => 'el el-share',
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'social icons', 'pixi' ),
        'id'     => 'social_icons',
		'subsection' => true,
        'desc'   => esc_html__( '', 'pixi' ),
		'fields' => array(
			array(
				'id' => 'facebook_url',
				'type' => 'text',
				'title' => esc_html__('Facebook URL', 'pixi' ),
				'desc' => esc_html__('Your Facebook URL', 'pixi' ),
			),
			array(
				'id' => 'twitter_url',
				'type' => 'text',
				'title' => esc_html__('Twitter URL', 'pixi' ),
				'desc' => esc_html__('Your Twitter URL', 'pixi' ),
			),
			array(
				'id' => 'linkedin_url',
				'type' => 'text',
				'title' => esc_html__('Linkedin URL', 'pixi' ),
				'desc' => esc_html__('Your Linkedin URL', 'pixi' ),
			),
			array(
				'id' => 'youtube_url',
				'type' => 'text',
				'title' => esc_html__('Youtube URL', 'pixi' ),
				'desc' => esc_html__('Your Youtube URL', 'pixi' ),
			),
			array(
				'id' => 'instagram_url',
				'type' => 'text',
				'title' => esc_html__('Instagram URL', 'pixi' ),
				'desc' => esc_html__('Your Instagram URL', 'pixi' ),
			),
			array(
				'id' => 'pinterest_url',
				'type' => 'text',
				'title' => esc_html__('Pinterest URL', 'pixi' ),
				'desc' => esc_html__('Your Pinterest URL', 'pixi' ),
			),
		   array(
				'id' => 'dribbble_url',
				'type' => 'text',
				'title' => esc_html__('Dribbble URL', 'pixi' ),
				'desc' => esc_html__('Your Dribbble URL', 'pixi' ),
			),
		   array(
				'id' => 'deviantart_url',
				'type' => 'text',
				'title' => esc_html__('Deviantart URL', 'pixi' ),
				'desc' => esc_html__('Your Deviantart URL', 'pixi' ),
			),
		   array(
				'id' => 'flickr_url',
				'type' => 'text',
				'title' => esc_html__('Flickr URL', 'pixi' ),
				'desc' => esc_html__('Your Flickr URL', 'pixi' ),
			),
		   array(
				'id' => 'rss_url',
				'type' => 'text',
				'title' => esc_html__('RSS URL', 'pixi' ),
				'desc' => esc_html__('Your RSS URL', 'pixi' ),
			),
		 array(
				'id' => 'tumblr_url',
				'type' => 'text',
				'title' => esc_html__('Tumblr URL', 'pixi' ),
				'desc' => esc_html__('Your Tumblr URL', 'pixi' ),
			),
		   array(
				'id' => 'vimeo_url',
				'type' => 'text',
				'title' => esc_html__('Vimeo URL', 'pixi' ),
				'desc' => esc_html__('Your Vimeo URL', 'pixi' ),
			),
			 array(
				'id' => 'skype_url',
				'type' => 'text',
				'title' => esc_html__('Skype URL', 'pixi' ),
				'desc' => esc_html__('Your Skype URL', 'pixi' ),
			),
		   array(
				'id' => 'Soundcloud_url',
				'type' => 'text',
				'title' => esc_html__('Soundcloud URL', 'pixi' ),
				'desc' => esc_html__('Your Soundcloud URL', 'pixi' ),
			),
		 array(
				'id' => 'behance_url',
				'type' => 'text',
				'title' => esc_html__('Behance URL', 'pixi' ),
				'desc' => esc_html__('Your Behance URL', 'pixi' ),
			),
		)
    ) );
    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'pixi' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'pixi' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }