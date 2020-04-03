<?php
vc_map(array(
	"name" => esc_html__("button", 'pixi'),
	"base" => "button",
	"category" => esc_html__('Extra Elements', 'pixi'),
    "icon" => "tb-icon-for-vc fa fa-minus",
	"params" => array(
	   array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__( 'text', 'pixi' ),
			"param_name" => "text",
			"value" => "",
	        "admin_label" => true,
			"description" => esc_html__("Please, enter button text in this element.", 'pixi')
		),
		array(
			"type" => "vc_link",
			"class" => "",
			"heading" => esc_html__( 'Link', 'pixi' ),
			"param_name" => "link",
			"value" => "",
			"description" => esc_html__("Please, enter button link in this element.", 'pixi')
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("color", 'pixi'),
			"param_name" => "color",
			"group" => esc_html__("Style", 'pixi'),
			"value" => array(
	            "light"     => "light",
				"primary"   => "primary",
				"secondary" => "secondary",
				"dark"      => "dark"
			),
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("hover color", 'pixi'),
			"param_name" => "hr_color",
			"group" => esc_html__("Style", 'pixi'),
 			"value" => array(
	            "light"      => "hr_light",
				"primary"    => "hr_primary",
				"secondary"  => "hr_secondary",
				"dark"       => "hr_dark"
			),
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("background color", 'pixi'),
			"param_name" => "bg_color",
			"group" => esc_html__("Style", 'pixi'),
			"value" => array(
				"primary"   => "bg_primary",
				"secondary" => "bg_secondary",
				"gradient"  => "bg_gradient",
				"light"     => "bg_light",
				"dark"      => "bg_dark",
	            "outline primary"  => "outline_primary",
		        "outline secondary"=> "outline_secondary",
	            "outline gradient" => "outline_gradient",
	            "outline dark"     => "outline_dark",
	            "outline light"    => "outline_light",
			),
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("hover background color", 'pixi'),
			"param_name" => "hr_bg_color",
			"group" => esc_html__("Style", 'pixi'),
 			"value" => array(
				"primary"    => "bg_hr_primary",
				"secondary"  => "bg_hr_secondary",
				"gradient"   => "bg_hr_gradient",
				"light"      => "bg_hr_light",
				"dark"       => "bg_hr_dark",
	            "outline primary"  => "hr_outline_primary",
		        "outline secondary"=> "hr_outline_secondary",
	            "outline dark"     => "hr_outline_dark",
	            "outline light"    => "hr_outline_light",
			),
		),
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("style", 'pixi'),
			"param_name" => "radius",
	       	"group" => esc_html__("Style", 'pixi'),
			"value" => array(
	            "radius 4"  => "radius4",
	            "radius 50" => "radius50",
				"radius 0"  => "radius0",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("size", 'pixi'),
			"param_name" => "Size",
			"group" => esc_html__("Style", 'pixi'),
			"value" => array(
			    "medium" => "medium",
				"small"  => "small",
				"large"  => "large",
			),
		),
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("shadow", 'pixi'),
			"param_name" => "shadow",
		    "group" => esc_html__("Style", 'pixi'),
			"value" => array(
				"no"  => "no_shadow",
	            "yes" => "shadow",
			),
		),
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("hover shadow", 'pixi'),
			"param_name" => "hr_shadow",
		    "group" => esc_html__("Style", 'pixi'),
			"value" => array(
				"no"  => "hr_no_shadow",
				"yes" => "hr_shadow",
			),
		),
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Hover style", 'pixi'),
			"param_name" => "hr_style",
			"group" => esc_html__("Style", 'pixi'),
			"value" => array(
	            "Linear"      => "linear",
	            "Slide"       => "slide",
	            "left darker" => "hover_left_dark",
	            "shine"       => "hover_shine",
	            "gradient"    => "hover_gradient",
	            "Icon Right"  => "icon_right",
			),
		),
		array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Button Position", 'pixi'),
			"param_name" => "position",
			"value" => array(
				"center" => "text-center",
				"right"  => "text-right",
				"left"   => "text-left",
			),
		),
	    /* Start Icon */
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show or hide icon", 'pixi'),
			"param_name" => "show_icon",
		    "group" => esc_html__("Icon", 'pixi'),
			"value" => array(
				"no"  => "no_icon",
				"yes" => "had_icon",
			),
		),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'pixi' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'pixi' ) => 'fontawesome',
                esc_html__( 'Linecons', 'pixi' )     => 'linecons',
	            esc_html__( 'Ionicons', 'pixi' )     => 'ionicons',
				esc_html__( 'P7 Stroke', 'pixi' )    => 'pe7stroke',
	            esc_html__( 'ET-line', 'pixi' )      => 'etline',
            ),
	        "group" => esc_html__("Icon", 'pixi'),
            'param_name' => 'icon',
            'description' => esc_html__( 'Select icon library.', 'pixi' ),
			'dependency' => Array('element' => "show_icon", 'value' => array('had_icon'))
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'pixi' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
		    "group" => esc_html__("Icon", 'pixi'),
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'fontawesome',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'pixi' ),
        ),
	
	   array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'pixi' ),
            'param_name' => 'icon_linecons',
            'value' => '',
		    "group" => esc_html__("Icon", 'pixi'),
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'pixi' ),
        ),
	
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'pixi' ),
            'param_name' => 'icon_ionicons',
            'value' => '',
		    "group" => esc_html__("Icon", 'pixi'),
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'ionicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'ionicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'pixi' ),
        ),
	   array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'pixi' ),
            'param_name' => 'icon_pe7stroke',
            'value' => '',
		    "group" => esc_html__("Icon", 'pixi'),
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pe7stroke',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'pe7stroke',
            ),
            'description' => esc_html__( 'Select icon from library.', 'pixi' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'pixi' ),
            'param_name' => 'icon_etline',
            'value' => '',
		    "group" => esc_html__("Icon", 'pixi'),
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'etline',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'pixi' ),
        ),
        /* End Icon */
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