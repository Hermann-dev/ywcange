<?php
vc_map(array(
	"name" => esc_html__("Images Carousel", 'pixi'),
	"base" => "image_carousel",
	"category" => esc_html__('Extra Elements', 'pixi'),
    "icon" => "tb-icon-for-vc fa fa-sliders",
	"params" => array(
		array(
			"type" => "attach_images",
			"class" => "",
			"heading" => esc_html__("Images", 'pixi'),
			"param_name" => "images",
			"value" => "",
			"description" => esc_html__("Select box images in this element.", 'pixi')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Image size", 'pixi'),
			"param_name" => "image_size",
			"value" => "",
			"description" => esc_html__("Enter image size (Example: thumbnail, medium, large, full or other sizes defined by theme. Default: full", 'pixi')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("On click action", 'pixi'),
			"param_name" => "click_action",
			"value" => array(
				"None" => "none",
				"Custom Links" => "custom_links",
				"Light Box" => "light_box",
			),
			"description" => esc_html__('Select action for click action.', 'pixi')
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Custom links", 'pixi'),
			"param_name" => "custom_links",
			"value" => "",
			"dependency" => array(
				"element"=>"click_action",
				"value"=> array('custom_links')
			),
			"description" => esc_html__("Enter links for each slide. Ex: link1,link2...", 'pixi')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Large devices", 'pixi'),
			"param_name" => "col_lg",
			"value" => "",
			"description" => esc_html__("Please, enter number Columns Large devices Desktops (>=1200px) in this element. Default: 6", 'pixi')
		),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Columns Medium devices", 'pixi'),
				"param_name" => "col_md",
				"value" => "",
				"description" => esc_html__("Please, enter number Columns Medium devices Desktops (>=992px) in this element. Default: 4", 'pixi')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Columns Small devices", 'pixi'),
				"param_name" => "col_sm",
				"value" => "",
				"description" => esc_html__("Please, enter number Columns Small devices Tablets (>=768px) in this element. Default: 3", 'pixi')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Columns Extra small devices", 'pixi'),
				"param_name" => "col_xs",
				"value" => "",
				"description" => esc_html__("Please, enter number Columns Extra small devices Phones (<768px) in this element. Default: 1", 'pixi')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Item Space", 'pixi'),
				"param_name" => "item_space",
				"value" => "",
				"description" => esc_html__("Please, enter number space between items in this element. Default: 15", 'pixi')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Loop", 'pixi'),
				"param_name" => "loop",
				"value" => array(
					"Disable" => "false",
					"Enable" => "true",
				),
				"description" => esc_html__('Inifnity loop. Duplicate last and first items to get loop illusion.', 'pixi')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("autoplay", 'pixi'),
				"param_name" => "autoplay",
				"value" => array(
					"Disable" => "false",
					"Enable" => "true",
				),
				"description" => esc_html__('Autoplay.', 'pixi')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("SmartSpeed", 'pixi'),
				"param_name" => "smartspeed",
				"value" => "",
				"description" => esc_html__("Please, enter number smartSpeed(Speed Calculate. More info to come..) in this element. Default: 500", 'pixi')
			),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Nav", 'pixi'),
			"param_name" => "nav",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
			"description" => esc_html__('Show next/prev buttons.', 'pixi')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Nav Position", 'pixi'),
			"param_name" => "nav_position",
			"value" => array(
				"Middle" => "nav-middle",
	            "right" => "nav-right",
				"left" => "nav-left",
			),
			"dependency" => array(
				"element"=>"nav",
				"value"=> "true"
			),
			"description" => esc_html__('Select position next/prev buttons.', 'pixi')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots", 'pixi'),
			"param_name" => "dots",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
			"description" => esc_html__('Show dots navigation.', 'pixi')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots Direction Position", 'pixi'),
			"param_name" => "dots_dir_position",
			"value" => array(
				"center" => "dots-center",
				"Right" => "dots-right",
				"Left" => "dots-left",
			),
			"dependency" => array(
				"element"=>"dots",
				"value"=> "true"
			),
			"description" => esc_html__('Select direction position dots navigation.', 'pixi')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots and Nav Color", 'pixi'),
			"param_name" => "dots_nav_color",
			"value" => array(
				"primary"   => "primary",
				"secondary" => "secondary",
				"dark"      => "dark",
				"light"     => "light",
			),
			"description" => esc_html__('Select color dots and nav.', 'pixi')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'pixi'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pixi' )
		),
	)
));