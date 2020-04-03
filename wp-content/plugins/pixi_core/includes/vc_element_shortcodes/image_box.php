<?php
vc_map(array(
	"name" => esc_html__("Image Box", 'pixi'),
	"base" => "image_box",
	"class" => "tb-demo-item",
	"category" => esc_html__('Extra Elements', 'pixi'),
	"icon" => "tb-icon-for-vc fa fa-picture-o",
	"params" => array(
	    array(
            'type' => 'pixi_template_imgclass',
            'param_name' => 'pixi_template',
            "shortcode" => "pixi_image_box",
            "heading" => esc_html__("Shortcode Template",'pixi'),
            "group" => esc_html__("Template", 'pixi'),
        ), 
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Image", 'pixi'),
			"param_name" => "image",
			"value" => "",
			"description" => esc_html__("Select image for demo item.", 'pixi')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'pixi'),
			"param_name" => "title_box",
			"value" => "",
			"description" => esc_html__("Please, enter title for demo item.", 'pixi')
		),
	    array(
            "type" => "textfield",
			"heading" => esc_html__("SUP Title", 'pixi'),
			"param_name" => "sup_title_box",
			"value" => "",
            'description' => esc_html__( 'Sup title', 'pixi' ),
	        'dependency'  => array(
	           "element"=>"pixi_template",
	           "value"=> array('pixi_image_box-style6.jpg' )
		    ),
        ),
	    array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Description", 'pixi'),
			"param_name" => "content_box",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'pixi')
		),
	    array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__( 'text', 'pixi' ),
			"param_name" => "text_link",
			"value" => "",
			"description" => esc_html__("Please, enter button text in this element.", 'pixi')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link", 'pixi'),
			"param_name" => "link_box",
			"value" => "",
			"description" => esc_html__("Please, enter demo link for demo item.", 'pixi')
		),
	   array(
		    "type" => "dropdown",
			"heading" => esc_html__("directtion", 'pixi'),
			"param_name" => "direction",
 			"value" => array(
	            "left"    => "left",
				"center"  => "center",
				"right"   => "right"
			),
	        "dependency" => array(
	           "element"=>"pixi_template",
			   "value"=> array('pixi_image_box-style6.jpg')
		    ),
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
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation Delay', 'pixi' ),
            'value' => array(
                esc_html__( '0.1s', 'pixi' ) => '0.1s',
                esc_html__( '0.2s', 'pixi' ) => '0.2s',
                esc_html__( '0.3s', 'pixi' ) => '0.3s',
	            esc_html__( '0.4s', 'pixi' ) => '0.4s',
                esc_html__( '0.5s', 'pixi' ) => '0.5s',
                esc_html__( '0.6s', 'pixi' ) => '0.6s',
                esc_html__( '0.7s', 'pixi' ) => '0.7s',
	            esc_html__( '0.8s', 'pixi' ) => '0.8s',
                esc_html__( '0.9s', 'pixi' ) => '0.9s',
            ),
            'param_name' => 'animation_delay',
		    'description' => esc_html__( 'Select animation delay.', 'pixi' ),
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