<?php
$elements = array(
	'video_button',
	'countdown',
	'counter_up',
	'button',
	'icon_box',
	'title_box',
	'image_carousel',
	'ad_banner',
	'map',
	'blog',
	'blog_carousel',
	'portfolio_carousel',
	'portfolio_grid',
	'team',
	'team_carousel',
	'testimonial_carousel',
    'timeline',
	'package_box',
	'image_layers',
	'social_accounts',
	'list',
	'image_box',
	'textillate',
);
foreach ($elements as $element) {
	include PIXI_ABS_PATH_FR .'/shortcodes/'. $element .'/'. $element.'.php';
}

if(class_exists('Woocommerce')){
	$wooshops = array(
		'product_grid',
		'product_carousel',
	);
	foreach ($wooshops as $wooshop) {
		include PIXI_ABS_PATH_FR .'/shortcodes/'. $wooshop .'/'. $wooshop.'.php';
	}
}