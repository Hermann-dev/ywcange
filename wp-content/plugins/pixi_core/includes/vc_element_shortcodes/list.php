<?php
vc_map(array(
	"name" => esc_html__("List", 'pixi'),
	"base" => "list",
	"category" => esc_html__('Extra Elements', 'pixi'),
    "icon" => "tb-icon-for-vc fa fa-list",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("List Style", 'pixi'),
			"param_name" => "list_style",
			"value" => array(
				"Style 1" => "list-style1",
				"Style 2" => "list-style2",
				"Style 3" => "list-style3",
				"Style 4" => "list-style4",
				"Style 5" => "list-style5",
				"Style 6" => "list-style6",

			),
			"description" => esc_html__('Select style title section in this elment.', 'pixi')
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image1',
			    'value'      => get_template_directory_uri().'/framework/vc_params/pixi_list/pixi_list_style_1.png',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style1'))
		),
	    array(
	  			'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image2',
			    'value' => get_template_directory_uri().'/framework/vc_params/pixi_list/pixi_list_style_2.png',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style2'))
		),
	    array(
				'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image3',
			    'value' => get_template_directory_uri().'/framework/vc_params/pixi_list/pixi_list_style_3.png',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style3'))
		),
	    array(
				'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image4',
			    'value' => get_template_directory_uri().'/framework/vc_params/pixi_list/pixi_list_style_4.png',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style4'))
		),
	    array(
				'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image5',
			    'value' => get_template_directory_uri().'/framework/vc_params/pixi_list/pixi_list_style_5.png',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style5'))
		),
	    array(
				'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image6',
			    'value' => get_template_directory_uri().'/framework/vc_params/pixi_list/pixi_list_style_6.png',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style6'))
		),
	    array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Lists', 'pixi' ),
            'param_name' => 'list',
            'description' => esc_html__( 'Enter values for list item', 'pixi' ),
            'value' => urlencode(
                json_encode( array(
                        array(
                            'list_item' => '', 
                        ),
                    ) 
                ) 
            ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("List item",'pixi'),
                    "param_name" => "list_item",
                    'admin_label' => true,
                ), 
            ),
        ),
	  array(
            "type" => "textfield",
            "heading" =>esc_html__("Font Size",'pixi'),
            "param_name" => "list_fontsize",
            'value' => '',
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Line Height",''),
            "param_name" => "list_lineheight",
            'value' => '',
        ),
	   array(
            "type" => "colorpicker",
            "heading" =>esc_html__("List item Color",'pixi'),
            "param_name" => "list_color",
            'value' => '',
        ),
	    array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class", 'pixi'),
			"param_name" => "el_class",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pixi' )
		),
	)
));