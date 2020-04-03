<?php
vc_map ( array (
	"name" => 'Portfolio grid',
	"base" => "portfolio_grid",
    "icon" => "tb-icon-for-vc fa fa-file-image-o",
	"category" => esc_html__( 'Extra Elements', 'pixi' ), 
	"params" => array (
	    array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Template", 'pixi'),
				"param_name" => "tpl",
	            "admin_label" => true,
				"value" => array(
					"Portfolio style 1" => "grid",
					"Portfolio style 2" => "grid2",
					"Portfolio style 3" => "grid3",
                	"Portfolio style 4" => "grid4",
				),
				"description" => esc_html__('Select template of posts display in this element.', 'pixi')
	  	),
		array(
			"type"      => "textfield",
			"class"     => "",
			"heading"   => esc_html__("Keyword for All Projects Filter", 'pixi'),
			"param_name"=> "all_filter",
			"value"     => "All",
			"description" => esc_html__("Replace the default \"All\" keyword for the initial filter with another one.", 'pixi')
        ),
	    array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Filter OR Hide", 'pixi'),
			"param_name" => "show_filter",
			"value" => array(
				"True"   => "true",
				"False"  => "false",
			),
		),
	    array(
			"type" => "dropdown",
			"heading" => esc_html__("Filter alignment", 'pixi'),
			"param_name" => "align_filter",
			"value" => array(
				"Center" => "center",
				"Left"   => "left",
			    "Right"  => "right"
			),
	       'dependency'  => array(
	           "element" =>"show_filter",
	           "value"   => "true",
		    ),
		),
	    array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Image size", 'pixi'),
			"param_name" => "image_size",
			"value" => array(
					"Full"        => "full",
					"Medium"      => "pixi-medium",
					"Thumbnail"   => "thumbnail",
                	"Larg height" => "pixi-lg-height",
			),
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
	        "group" => esc_html__("Build Query", 'pixi'),
			'description' => esc_html__('Select the type of navigation or disable it.', 'pixi'),
			'param_name' => 'typenavigation',
			'value' => array(
				"None" => 'none',
				"Prev/Next buttons" => 'buttons',
				"Numeric" => 'numeric',
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Column", 'pixi'),
			"param_name" => "column",
			"value" => array(
				"3 column" => "col-3",
				"4 column" => "col-4",
				"5 column" => "col-5",
			),
			"group" => esc_html__("Build Query", 'pixi'),
			"description" => esc_html__('The number of column to display on portfolio page.', 'pixi')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("margin", 'pixi'),
			"param_name" => "margin",
			"value" => "",
			"group" => esc_html__("Build Query", 'pixi'),
			"description" => esc_html__("Please, enter value in this element. Default: 5", 'pixi')
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
	)
));