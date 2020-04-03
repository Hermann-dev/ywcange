<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
	global $pixi_options;
	if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
			<link rel="shortcut icon" href="<?php $favicon=$pixi_options["favicon"]; echo esc_url($favicon['url']); ?>" type="image/x-icon">
	<?php } 
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
	<?php
    $page_loader = (isset($pixi_options["page_loader"])&&$pixi_options["page_loader"])?$pixi_options["page_loader"]: false;
	if($page_loader) echo '
	<div class="loader-wrap">
         <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
         </div>
         <p>'. esc_html__( 'loading...', 'pixi' ) .'</p>
      </div>'; 
	pixi_header();?>