<?php
	vc_map ( array (
		"name" => 'Product Carousel',
		"base" => "product_carousel",
        "class" => "tb-products-grid",
		"icon" => "tb-icon-for-vc fa fa-cart-plus",
		"category" => esc_html__( 'Extra Elements', 'pixi' ), 
		"params" => array (
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Template", 'pixi'),
				"param_name" => "tpl",
				"value" => array(
					"Template 1" => "tpl1",
					"Template 2" => "tpl2",
				),
				"description" => esc_html__('Select template of posts display in this element.', 'pixi')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Columns Large devices", 'pixi'),
				"param_name" => "col_lg",
				"value" => "",
				"description" => esc_html__("Please, enter number Columns Large devices Desktops (>=1200px) in this element. Default: 4", 'pixi')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Columns Medium devices", 'pixi'),
				"param_name" => "col_md",
				"value" => "",
				"description" => esc_html__("Please, enter number Columns Medium devices Desktops (>=992px) in this element. Default: 3", 'pixi')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Columns Small devices", 'pixi'),
				"param_name" => "col_sm",
				"value" => "",
				"description" => esc_html__("Please, enter number Columns Small devices Tablets (>=768px) in this element. Default: 2", 'pixi')
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
				"description" => esc_html__("Please, enter number space between items in this element. Default: 30", 'pixi')
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
			array (
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__( "Show", 'pixi' ),
					"param_name" => "show",
					"value" => array (
							"All Products"      => "all_products",
							"Featured Products" => "featured",
							"On-sale Products"  => "onsale",
					),
					"group" => esc_html__("Build Query", 'pixi'),
					"description" => esc_html__( "Select show product type in this elment", 'pixi' )
			),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Product Count", 'pixi'),
                "param_name" => "number",
                "value" => "",
				"group" => esc_html__("Build Query", 'pixi'),
				"description" => esc_html__('Please, enter number of post per page. Show all: -1.', 'pixi')
            ),
            array (
				"type" => "dropdown",
				"heading" => esc_html__( 'Order by', 'pixi' ),
				"param_name" => "orderby",
				"value" => array (
						"None"    => "none",
						"Date"    => "date",
						"Price"   => "price",
						"Random"  => "rand",
						"Selling" => "selling",
						"Rated"   => "rated",
				),
				"group" => esc_html__("Build Query", 'pixi'),
				"description" => esc_html__( 'Order by ("none", "date", "price", "rand", "selling", "rated") in this element.', 'pixi' )
			),
            array(
                "type" => "dropdown",
                "heading" => esc_html__('Order', 'pixi'),
                "param_name" => "order",
                "value" => Array(
                    "None" => "none",
                    "ASC"  => "ASC",
                    "DESC" => "DESC"
                ),
				"group" => esc_html__("Build Query", 'pixi'),
                "description" => esc_html__('Order ("None", "Asc", "Desc") in this element.', 'pixi')
            ),
		)
	));