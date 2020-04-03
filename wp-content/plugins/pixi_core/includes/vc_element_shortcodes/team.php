<?php
vc_map ( array (
	"name" => 'Team',
	"base" => "team",
    "icon" => "tb-icon-for-vc fa fa-id-badge",
	"category" => esc_html__( 'Extra Elements', 'pixi' ), 
	'admin_enqueue_js' => array(PIXI_JS.'customvc.js'),
	"params" => array (
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'pixi'),
			"param_name" => "tpl",
			"value" => array(
				"Template 1" => "tpl1",
				"Template 2" => "tpl2",
				"Template 3" => "tpl3",
			),
			"description" => esc_html__('Select template of posts display in this element.', 'pixi')
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image1',
			    'value'      => get_template_directory_uri().'/framework/vc_params/pixi_team/pixi_team_style_1.png',
				'dependency' => Array('element' => "tpl", 'value' => array('tpl1'))
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image2',
			    'value'      => get_template_directory_uri().'/framework/vc_params/pixi_team/pixi_team_style_2.png',
				'dependency' => Array('element' => "tpl", 'value' => array('tpl2'))
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image3',
			    'value'      => get_template_directory_uri().'/framework/vc_params/pixi_team/pixi_team_style_3.png',
				'dependency' => Array('element' => "tpl", 'value' => array('tpl3'))
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Columns", 'pixi'),
			"param_name" => "columns",
			"value" => array(
				"4 Columns" => "4",
				"3 Columns" => "3",
				"2 Columns" => "2",
				"1 Column" => "1",
			),
			"description" => esc_html__('Select columns display in this element.', 'pixi')
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
			"taxonomy" => "team-type",
			"heading" => esc_html__( "Categories", 'pixi' ),
			"param_name" => "category",
			"group" => esc_html__("Build Query", 'pixi'),
			"description" => esc_html__( "Note: By default, all your team will be displayed. If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'pixi' )
	   ),
		array (
			"type" => "textfield",
			"heading" => esc_html__( 'Count', 'pixi' ),
			"param_name" => "posts_per_page",
			'value' => '',
			"group" => esc_html__("Build Query", 'pixi'),
			"description" => esc_html__( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'pixi' )
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
	   array (
			"type" => "dropdown",
			"heading" => esc_html__( 'Single Page Team', 'pixi' ),
			"param_name" => "single_option",
			"value" => Array (
					"single page" => "",
					"no single page" => "disable-team-page",
			),
			"group" => esc_html__("Build Query", 'pixi'),
			"description" => esc_html__( 'display or not display link to single page team', 'pixi' )
		),
	)
));