<?php
vc_map(array(
	"name" => esc_html__("Ad Banner", 'pixi'),
	"base" => "ad_banner",
	"category" => esc_html__('Extra Elements', 'pixi'),
	"icon" => "tb-icon-for-vc fa fa-newspaper-o",
	"params" => array(
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Image", 'pixi'),
			"param_name" => "image",
			"value" => "",
			"description" => esc_html__("Select box image in this element.", 'pixi')
		),
	   array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'pixi'),
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("Please, enter title in this element.", 'pixi')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Description", 'pixi'),
			"param_name" => "ad_content",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'pixi')
		),
	    array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Button Label", 'pixi'),
			"param_name" => "button_label",
			"value" => "",
			"description" => esc_html__("Please, enter button Label in this element.", 'pixi')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link", 'pixi'),
			"param_name" => "link",
			"value" => "",
			"description" => esc_html__("Please, enter link in this element.", 'pixi')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'pixi'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pixi' )
		),
	)
));