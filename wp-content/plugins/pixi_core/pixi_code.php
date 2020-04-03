<?php
/*
 * Plugin Name: Pixi Core
 * Plugin URI: http://motivoweb
 * Description: This is a plugin required for wordpress theme from motivoweb 
 * Version: 1.0.3
 * Author: motivoweb
 * Author URI: http://motivoweb
 * License: GPLv1 or later
 * Text Domain: motivoweb
 */
define( 'PIXI_DIR', plugin_dir_path(__FILE__) );
define( 'PIXI_URI', plugin_dir_url(__FILE__) );
define( 'PIXI_INCLUDES', PIXI_DIR . "includes/" );
define( 'PIXI_ADMIN', PIXI_DIR . "admin/" );
define( 'PIXI_ADMIN_URI', PIXI_URI . "admin/" );
define( 'PIXI_CSS', PIXI_URI . "assets/css/" );
define( 'PIXI_JS', PIXI_URI . "assets/js/" );
define( 'PIXI_IMAGES', PIXI_URI . "assets/images/" );
define( 'PIXI_TEMPLATES', PIXI_DIR . "templates" );

/* include functions.php */
require PIXI_INCLUDES . 'functions.php';

/* include Redux Options */
require PIXI_ADMIN . 'admin-init.php';

/*-----------------------------------------------*
Widgets
/*-----------------------------------------------*/
require_once PIXI_DIR.'widgets/abstract-widget.php';
require_once PIXI_DIR.'widgets/widgets.php';

/*-----------------------------------------------*
pixi_core
/*-----------------------------------------------*/
/* use class pixi_core */
new pixi_core;
/* class pixi_core */
class pixi_core
{
	function __construct()
	{
		add_action( 'init', array( $this, 'pixi_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_pixi_core_style' ) );
	}
	function pixi_init()
	{
		
	}
	function load_pixi_core_style() {
        wp_register_style( 'pixi-core-admin-css', PIXI_CSS . 'pixi-core.admin.css', false, '1.0.0' );
        wp_enqueue_style( 'pixi-core-admin-css' );
		wp_register_style( 'pixi-font-etline', PIXI_CSS . 'et-line.css', array(), '1.2.0' );
        wp_enqueue_style( 'pixi-font-etline' );
	    wp_register_style( 'pixi-font-stroke', PIXI_CSS . 'Pe-icon-7-stroke.css', array(), '1.2.0' );
        wp_enqueue_style( 'pixi-font-stroke' );
		wp_register_style( 'pixi-font-ionicons', PIXI_CSS . 'ionicons.css', array(), '1.0.0' );
        wp_enqueue_style( 'pixi-font-ionicons' );
        wp_register_script( 'pixi-core-admin-js', PIXI_JS . 'jquery.pixi-core.admin.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'pixi-core-admin-js' );
		wp_localize_script( 'pixi-core-admin-js', 'pixi_object', array( 'ajax_url' => admin_url('admin-ajax.php') ) );
	}
	
}
/*-----------------------------------------------*
shortcodes
/*-----------------------------------------------*/
/* Vc extra params */
if (function_exists("vc_add_param")){
	require_once PIXI_INCLUDES.'vc_extra_params.php';
}
/* Vc extra Fields */
if (class_exists('Vc_Manager')) {
    function vc_add_extra_field( $name, $form_field_callback, $script_url = null ) {
            return WpbakeryShortcodeParams::addField( $name, $form_field_callback, $script_url );
    }
}
/* Vc extra shorcodes */
if (function_exists("vc_map")){
	foreach (glob(PIXI_INCLUDES."vc_element_shortcodes/*.php") as $filepath)
	{
		include $filepath;
	}
}
/* Vc extra field */
if (function_exists("vc_add_extra_field")){
	require_once PIXI_INCLUDES.'vc_extra_fields.php';
}
/*-----------------------------------------------*
 functions shortcodes 
/*-----------------------------------------------*/
require_once PIXI_INCLUDES . "functions_shortcodes.php";

new pixi_shortcodeCore();
class pixi_shortcodeCore{
	public function __construct(){
		add_action('plugins_loaded', array( $this, 'pixiActionInit'));
		add_action('vc_before_init', array($this, 'pixiShortcodeRegister'));
		add_action('vc_after_init', array($this, 'pixiShortcodeAddParams'), 11);
		add_filter('widget_text', 'do_shortcode');
	}
	function pixiActionInit(){
	    global $wp_filesystem;
        if ( !class_exists('WP_Filesystem') ) {
        	require_once(ABSPATH . 'wp-admin/includes/file.php');
        	WP_Filesystem();
        }
	}
	function pixiShortcodeRegister() {
	    require_once PIXI_INCLUDES . 'pixi_shortcodes.php';
	}
	function pixiShortcodeAddParams(){
		$extra_params_folder = get_template_directory() . '/framework/vc_params';
		$files = pixiFileScanDirectory($extra_params_folder,'/pixi_.*\.php/');
		if(!empty($files)){
			foreach($files as $file){
				if(WPBMap::exists($file->name)){
					if(isset($params)){
						unset($params);
					}
					include $file->uri;
					if(isset($params) && is_array($params)){
						foreach($params as $param){
							if(is_array($param)){
								$param['group'] = __('Template', 'pixi');
								$param['edit_field_class'] = isset($param['edit_field_class'])? $param['edit_field_class'].' pixi_custom_param vc_col-sm-12 vc_column':'pixi_custom_param vc_col-sm-12 vc_column';
								$param['class'] = 'pixi-extra-param';
								if(isset($param['template']) && !empty($param['template'])){
									if(!is_array($param['template'])){
										$param['template'] = array($param['template']);
									}
									$param['dependency'] = array("element"=>"pixi_template", "value" => $param['template']);
									
								}
								vc_add_param($file->name, $param);
							}
						}
					}
				}
			}
		}
	}
}?>