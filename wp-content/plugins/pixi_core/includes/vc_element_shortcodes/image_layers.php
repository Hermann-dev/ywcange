<?php
vc_map(array(
	"name" => esc_html__("Image Layers", 'pixi'),
	"base" => "image_layers",
	"category" => esc_html__('Extra Elements', 'pixi'),
	"icon" => "tb-icon-for-vc fa fa-clone",
	"params" => array(
	
	array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Images Lists', 'pixi' ),
            'param_name' => 'images_list',
            'description' => esc_html__( 'Enter values for list item', 'pixi' ),
            'params' => array(
                array(
                    "type" => "attach_image",
                    "heading" =>esc_html__("List item",'pixi'),
                    "param_name" => "images_list_item",
                ), 
				array(
						'type'				=> 'textfield',
						'param_name'		=> "offcet_x",
						'heading'			=> esc_html__('Horizontal offset', 'pixi'),
						'description' => esc_html__('Add the layer offset in %, for example -100 or 100','pixi'),
						'edit_field_class'	=> 'vc_column vc_col-sm-6',
					),
					array(
						'type'				=> 'textfield',
						'param_name'		=> 'offcet_y',
						'heading'			=> esc_html__('Vertical offset', 'pixi'),
						'description'       => esc_html__('Add the layer offset in %, for example -100 or 100','pixi'),
						'edit_field_class'	=> 'vc_column vc_col-sm-6',
					),
					array(
						'type'				=> 'dropdown',
						'param_name'		=> 'layer_animation',
						'heading'			=> esc_html__('Animation', 'pixi'),
						'description'       => esc_html__('Choose the appear effect for the element','pixi'),
						'value'				=> array(
							esc_html__('Fade In', 'pixi')		=> 'fadeIn',
							esc_html__('Fade In Down', 'pixi')  => 'fadeInDown',
							esc_html__('Fade In Left', 'pixi')	=> 'fadeInLeft',
							esc_html__('Fade In Right', 'pixi') => 'fadeInRight',
							esc_html__('Fade In Up', 'pixi')	=> 'fadeInUp',
							esc_html__('Slide In Up', 'pixi')	=> 'slideInUp',
							esc_html__('Slide In Down', 'pixi')	=> 'slideInDown',
							esc_html__('Slide In Left', 'pixi')	=> 'slideInLeft',
							esc_html__('Slide In Right', 'pixi')=> 'slideInRight',
							esc_html__('Zoom In', 'pixi')		=> 'zoomIn',
							esc_html__('Zoom In Left', 'pixi')	=> 'zoomInLeft',
							esc_html__('Zoom In Right', 'pixi')	=> 'zoomInRight',
							esc_html__('Zoom In Up', 'pixi')	=> 'zoomInUp',
							esc_html__('Flip In X', 'pixi')	=> 'flipInX',
							esc_html__('Flip In Y', 'pixi')	=> 'flipInY',
						),
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra Class", 'pixi'),
						"param_name" => "el_class",
						"value" => "",
						"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pixi' )
				),
            ),
        ),
		
	)
));