<?php
vc_map ( array (
		"name" => 'Blog',
		"base" => "blog",
		"category" => esc_html__( 'Extra Elements', 'pixi' ),
	    "icon" => "tb-icon-for-vc fa fa-qrcode",
		"params" => array (
		            array(
							"type" => "dropdown",
							"class" => "",
							"heading" => esc_html__("Template", 'pixi'),
							"param_name" => "tpl",
	                        "admin_label" => true,
							"value" => array(
								"Image Middle"     => "grid",
								"Image Overlay"    => "grid2",
								"Image Background" => "grid3",
	                            "Grid Left"        => "grid4",
							),
							"description" => esc_html__('Select template of posts display in this element.', 'pixi')
					),
					array(
							"type" => "dropdown",
							"class" => "",
							"heading" => esc_html__("Columns", 'pixi'),
							"param_name" => "columns",
							"value" => array(
								"2 Columns" => "2",
								"1 Columns" => "1",
								"3 Columns" => "3"
							),
							"description" => esc_html__('Select columns display in this element.', 'pixi'),
					),
	                array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Animation CSS', 'pixi' ),
						'value' => array(
							esc_html__( 'none', 'pixi' )          => 'none',
							esc_html__( 'bounceIn', 'pixi' )      => 'wow bounceIn',
							esc_html__( 'bounceInDown', 'pixi' )  => 'wow bounceInDown',
							esc_html__( 'bounceInLeft', 'pixi' )  => 'wow bounceInLeft',
							esc_html__( 'bounceInRight', 'pixi' ) => 'wow bounceInRight',
							esc_html__( 'bounceInUp', 'pixi' )    => 'wow bounceInUp',
							esc_html__( 'fadeIn', 'pixi' )        => 'wow fadeIn',
							esc_html__( 'fadeInDown', 'pixi' )    => 'wow fadeInDown',
							esc_html__( 'fadeInDownBig', 'pixi' ) => 'wow fadeInDownBig',
							esc_html__( 'fadeInLeft', 'pixi' )    => 'wow fadeInLeft',
							esc_html__( 'fadeInLeftBig', 'pixi' ) => 'wow fadeInLeftBig',
							esc_html__( 'fadeInRight', 'pixi' )   => 'wow fadeInRight',
							esc_html__( 'fadeInRightBig', 'pixi' )=> 'wow fadeInRightBig',
							esc_html__( 'fadeInUp', 'pixi' )      => 'wow fadeInUp',
							esc_html__( 'fadeInUpBig', 'pixi' )   => 'wow fadeInUpBig',
							esc_html__( 'flipInX', 'pixi' )       => 'wow flipInX',
							esc_html__( 'flipInY', 'pixi' )       => 'wow flipInY',
							esc_html__( 'slideInUp', 'pixi' )     => 'wow slideInUp',
							esc_html__( 'slideInDown', 'pixi' )   => 'wow slideInDown',
							esc_html__( 'slideInLeft', 'pixi' )   => 'wow slideInLeft',
							esc_html__( 'slideInRight', 'pixi' )  => 'wow slideInRight',
							esc_html__( 'zoomIn', 'pixi' )        => 'wow zoomIn',
							esc_html__( 'zoomInDown', 'pixi' )    => 'wow zoomInDown',
							esc_html__( 'zoomInLeft', 'pixi' )    => 'wow zoomInLeft',
							esc_html__( 'zoomInRight', 'pixi' )   => 'wow zoomInRight',
							esc_html__( 'zoomInUp', 'pixi' )      => 'wow zoomInUp',
						),
						'param_name' => 'animation_css',
						'description' => esc_html__( 'Select animation type.', 'pixi' ),
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
						"type" => "mo_taxonomy",
						"taxonomy" => "category",
						"heading" => esc_html__( "Categories", 'pixi' ),
						"param_name" => "category",
						"group" => esc_html__("Build Query", 'pixi'),
						"description" => esc_html__( "Note: By default, all your team will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'pixi' )
				   ),
					array (
							"type" => "textfield",
							"heading" => esc_html__( 'Count', 'pixi' ),
							"param_name" => "posts_per_page",
							'value' => '',
							"group" => esc_html__("Build Query", 'pixi'),
							"description" => esc_html__( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'pixi' )
					),
	                array(
				  		'type' => 'dropdown',
						'heading' => esc_html__('Type navigation', 'pixi'),
						'description' => esc_html__('Select the type of navigation or disable it.', 'pixi'),
						'param_name' => 'pagination',
	                    "group" => esc_html__("Build Query", 'pixi'),
						'value' => array(
							"None" => 'none',
							"Prev/Next buttons" => 'buttons',
							"Numeric" => 'numeric',
						),
					),
					array (
							"type" => "dropdown",
							"heading" => esc_html__( 'Order by', 'pixi' ),
							"param_name" => "orderby",
							"value" => array (
									"None" => "none",
									"Title" => "title",
									"Date" => "date",
									"ID" => "ID"
							),
							"group" => esc_html__("Build Query", 'pixi'),
							"description" => esc_html__( 'Order by ("none", "title", "date", "ID").', 'pixi' )
					),
					array (
							"type" => "dropdown",
							"heading" => esc_html__( 'Order', 'pixi' ),
							"param_name" => "order",
							"value" => Array (
									"None" => "none",
									"ASC" => "ASC",
									"DESC" => "DESC"
							),
							"group" => esc_html__("Build Query", 'pixi'),
							"description" => esc_html__( 'Order ("None", "Asc", "Desc").', 'pixi' )
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Excerpt Length", 'pixi'),
						"param_name" => "excerpt_lenght",
						"value" => "",
						"group" => esc_html__("Template", 'pixi'),
						"description" => esc_html__("Please, Enter number excerpt lenght of post in this element. Default: 22", 'pixi')
					),
		)
));