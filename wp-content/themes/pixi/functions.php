<?php
/*-----------------------------------------------*
Define THEME
/*-----------------------------------------------*/
if (!defined('PIXI_URI_PATH')) define('PIXI_URI_PATH', get_template_directory_uri());
if (!defined('PIXI_ABS_PATH')) define('PIXI_ABS_PATH', get_template_directory());
if (!defined('PIXI_URI_PATH_FR')) define('PIXI_URI_PATH_FR', PIXI_URI_PATH.'/framework');
if (!defined('PIXI_ABS_PATH_FR')) define('PIXI_ABS_PATH_FR', PIXI_ABS_PATH.'/framework');
if (!defined('PIXI_URI_PATH_ADMIN')) define('PIXI_URI_PATH_ADMIN', PIXI_URI_PATH_FR.'/admin');
if (!defined('PIXI_ABS_PATH_ADMIN')) define('PIXI_ABS_PATH_ADMIN', PIXI_ABS_PATH_FR.'/admin');
/*-----------------------------------------------*
Register Default Fonts
/*-----------------------------------------------*/
function pixi_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'pixi' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Roboto|Nunito+Sans|Rubik|Josefin+Sans:400,500,600,700|Poppins:400,500,600,700|Open+Sans:400,500,600,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*-----------------------------------------------*
Enqueue Style , Script
/*-----------------------------------------------*/
function pixi_enqueue_scripts() {
	global $pixi_options;
	wp_enqueue_style( 'fonts', pixi_fonts_url(), array(), '1.0.0');
	wp_enqueue_style( 'bootstrap', PIXI_URI_PATH. '/assets/css/bootstrap.min.css' , array(), '3.3.6');
    wp_enqueue_style( 'pixi-icon', PIXI_URI_PATH. '/assets/css/font-icon.css' , array(), '');
	wp_enqueue_style( 'pixi-style-plugin', PIXI_URI_PATH. '/assets/css/plugins.min.css' , array(), '');
	wp_enqueue_style( 'pixi-core-wp', PIXI_URI_PATH. '/assets/css/core.css', array(), '');
	wp_enqueue_style( 'pixi-style', PIXI_URI_PATH.'/assets/css/style.css', false );
	wp_enqueue_style( 'pixi-wp-custom-style', PIXI_URI_PATH . '/assets/css/wp-custom-style.css', false);
    /* script */
	wp_enqueue_script( 'bootstrap', PIXI_URI_PATH.'/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'modernizr', PIXI_URI_PATH.'/assets/js/modernizr.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'shortcodes-js', PIXI_URI_PATH. '/assets/js/shortcodes.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'pixi-js', PIXI_URI_PATH. '/assets/js/custom.js', array( 'jquery' ), '', true );
	/*  Queue Comments reply js */
	if ( is_singular() && comments_open() && get_option('thread_comments') ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pixi_enqueue_scripts' );

/* Add Stylesheet And Script Backend */
function custom_admin_scripts(){
	wp_enqueue_script( 'action', PIXI_URI_PATH_ADMIN.'/assets/js/action.js', array('jquery'), '', true  );
	wp_enqueue_style( 'style_admin', PIXI_URI_PATH_ADMIN.'/assets/css/style_admin.css', false );
}
add_action( 'admin_enqueue_scripts', 'custom_admin_scripts');
/*------------------------------------------*
Framework , Theme Options
/*-----------------------------------------------*/
if( function_exists( 'pixi_redux_setup' ) ) {
	pixi_redux_setup( PIXI_ABS_PATH_ADMIN.'/options.php' );
}
require_once (PIXI_ABS_PATH_ADMIN.'/index.php');
require_once PIXI_ABS_PATH_FR . '/includes.php';

/* Init Functions */
function pixi_init() {
	global $pixi_options;
	require_once PIXI_ABS_PATH_FR.'/presets.php';
}
add_action( 'init', 'pixi_init' );
/* This theme styles the visual editor to resemble the theme style */
function pixi_after_setup_theme() {
	add_action( 'wp_enqueue_scripts', 'pixi_enqueue_scripts', 99 );
	add_editor_style( 'framework/admin/assets/css/pixi-editor.css' );
	if ( is_rtl() ) {
		add_editor_style( 'framework/admin/assets/css/pixi-editor-rtl.css' );
	}
}
add_action( 'after_setup_theme', 'pixi_after_setup_theme' );
/*-----------------------------------------------*
Template Functions
/*-----------------------------------------------*/
require_once PIXI_ABS_PATH_FR . '/template-functions.php';
require_once PIXI_ABS_PATH_FR . '/templates/post-functions.php';
/*-----------------------------------------------*
Register Sidebar
/*-----------------------------------------------*/
if (!function_exists('pixi_RegisterSidebars')) {
	function pixi_RegisterSidebars(){
		register_sidebar(array(
			'name' => esc_html__('Main Sidebar', 'pixi'),
			'id' => 'pixi-main-sidebar',
		    'description'   => esc_html__( 'This is default sidebar.', 'pixi' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Sidepanel Header', 'pixi'),
			'id' => 'pixi-sidepanel-header',
		    'description'   => esc_html__( 'This is sidepanel header.', 'pixi' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Blog Left Sidebar', 'pixi'),
			'id' => 'pixi-left-sidebar',
			'description'   => esc_html__( 'This is blog left sidebar.', 'pixi' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Blog Right Sidebar', 'pixi'),
			'id' => 'pixi-right-sidebar',
			'description'   => esc_html__( 'This is blog right sidebar.', 'pixi' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebars(6, array(
			'name' => esc_html__('Footer Widget %d', 'pixi'),
			'id' => 'pixi-footer-widget',
			'description'   => esc_html__( 'This is footer widget sidebar.', 'pixi' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
	if (class_exists ( 'Woocommerce' )) {
			register_sidebar(array(
				'name' => esc_html__('Shop Sidebar', 'pixi'),
				'id' => 'pixi-shop-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="wg-title">',
				'after_title' => '</h4>',
			));
		}
	}
}
add_action( 'widgets_init', 'pixi_RegisterSidebars' );
/*-----------------------------------------------*
WooCommerce
/*-----------------------------------------------*/
if (class_exists('Woocommerce')) {
   require_once PIXI_ABS_PATH.'/woocommerce/wc-template-function.php';
   require_once PIXI_ABS_PATH.'/woocommerce/wc-template-hooks.php';
}?>