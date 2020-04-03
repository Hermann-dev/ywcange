<?php
vc_map ( array (
	"name" => 'Textillate',
	"base" => "textillate",
    "icon" => "tb-icon-for-vc fa fa-text-width",
	"category" => esc_html__( 'Extra Elements', 'pixi' ), 
	"params" => array (
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
		"param_name" => "fontsize",
		"description" => esc_html__("Please, add font size to in this element ex: 16px.", 'pixi'),
		'group' => __( 'Font Settings', 'pixi' ),
	),
	array(
		"type" => "textfield",
		"heading" =>esc_html__("Line Height",''),
		"param_name" => "lineheight",
		"description" => esc_html__("Please, add line height to in this element ex: 23px.", 'pixi'),
		'group' => __( 'Font Settings', 'pixi' ),
	),
	array(
		"type" => "dropdown",
		"heading" =>esc_html__("Text Align",''),
		"param_name" => "textalign",
		"value" => array(
			"Left"   => "left",
			"Center" => "center",
			"Right"  => "right",
		),
		"description" => esc_html__('Please, add text align to in this element', 'pixi'),
		'group' => __( 'Font Settings', 'pixi' ),
	),
	array(
		"type" => "dropdown",
		"heading" =>esc_html__("Font Weight",''),
		"param_name" => "fontweight",
		"value" => array(
			"Light" => "400",
			"Normal"  => "600",
			"Bold"   => "700",
		),
		"description" => esc_html__('Please, add font weight to in this element', 'pixi'),
		'group' => __( 'Font Settings', 'pixi' ),
	),
   array(
		"type" => "colorpicker",
		"heading" =>esc_html__("List item Color",'pixi'),
		"param_name" => "color",
		'group' => __( 'Font Settings', 'pixi' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'In Animation (effect)','pixi' ),
		'param_name' => 'in_animate_effect',
		'value' => array('flash' => 'flash', 'bounce' => 'bounce', 'shake' => 'shake', 'tada' => 'tada', 'swing' => 'swing', 'wobble' => 'wobble', 'pulse' => 'pulse', 'flip' => 'flip', 'flipInX' => 'flipInX', 'flipOutX' => 'flipOutX', 'flipInY' => 'flipInY', 'flipOutY' => 'flipOutY', 'fadeIn' => 'fadeIn', 'fadeInUp' => 'fadeInUp', 'fadeInDown' => 'fadeInDown', 'fadeInLeft' => 'fadeInLeft', 'fadeInRight' => 'fadeInRight', 'fadeInUpBig' => 'fadeInUpBig', 'fadeInDownBig' => 'fadeInDownBig', 'fadeInLeftBig' => 'fadeInLeftBig', 'fadeInRightBig' => 'fadeInRightBig', 'fadeOut' => 'fadeOut', 'fadeOutUp' => 'fadeOutUp', 'fadeOutDown' => 'fadeOutDown', 'fadeOutLeft' => 'fadeOutLeft', 'fadeOutRight' => 'fadeOutRight', 'fadeOutUpBig' => 'fadeOutUpBig', 'fadeOutDownBig' => 'fadeOutDownBig', 'fadeOutLeftBig' => 'fadeOutLeftBig', 'fadeOutRightBig' => 'fadeOutRightBig', 'bounceIn' => 'bounceIn', 'bounceInDown' => 'bounceInDown', 'bounceInUp' => 'bounceInUp', 'bounceInLeft' => 'bounceInLeft', 'bounceInRight' => 'bounceInRight', 'bounceOut' => 'bounceOut', 'bounceOutDown' => 'bounceOutDown', 'bounceOutUp' => 'bounceOutUp', 'bounceOutLeft' => 'bounceOutLeft', 'bounceOutRight' => 'bounceOutRight', 'rotateIn' => 'rotateIn', 'rotateInDownLeft' => 'rotateInDownLeft', 'rotateInDownRight' => 'rotateInDownRight', 'rotateInUpLeft' => 'rotateInUpLeft', 'rotateInUpRight' => 'rotateInUpRight', 'rotateOut' => 'rotateOut', 'rotateOutDownLeft' => 'rotateOutDownLeft', 'rotateOutDownRight' => 'rotateOutDownRight', 'rotateOutUpLeft' => 'rotateOutUpLeft', 'rotateOutUpRight' => 'rotateOutUpRight', 'hinge' => 'hinge', 'rollIn' => 'rollIn', 'rollOut' => 'rollOut'),
		'description' => __( '','pixi' ),
		'group' => __( 'Animation Settings', 'pixi' ),
		),
	array(
		'type' => 'dropdown',
		'heading' => __( 'In Animation (type)','pixi' ),
		'param_name' => 'in_animate_type',
		'value' => array( 'sequence' => '', 'reverse' => 'reverse', 'sync' => 'sync', 'shuffle' => 'shuffle' ),
		'description' => __( '','pixi' ),
		'group' => __( 'Animation Settings', 'pixi' ),
		),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Out Animation (effect)','pixi' ),
		'param_name' => 'out_animate_effect',
		'value' => array('flash' => 'flash', 'bounce' => 'bounce', 'shake' => 'shake', 'tada' => 'tada', 'swing' => 'swing', 'wobble' => 'wobble', 'pulse' => 'pulse', 'flip' => 'flip', 'flipInX' => 'flipInX', 'flipOutX' => 'flipOutX', 'flipInY' => 'flipInY', 'flipOutY' => 'flipOutY', 'fadeIn' => 'fadeIn', 'fadeInUp' => 'fadeInUp', 'fadeInDown' => 'fadeInDown', 'fadeInLeft' => 'fadeInLeft', 'fadeInRight' => 'fadeInRight', 'fadeInUpBig' => 'fadeInUpBig', 'fadeInDownBig' => 'fadeInDownBig', 'fadeInLeftBig' => 'fadeInLeftBig', 'fadeInRightBig' => 'fadeInRightBig', 'fadeOut' => 'fadeOut', 'fadeOutUp' => 'fadeOutUp', 'fadeOutDown' => 'fadeOutDown', 'fadeOutLeft' => 'fadeOutLeft', 'fadeOutRight' => 'fadeOutRight', 'fadeOutUpBig' => 'fadeOutUpBig', 'fadeOutDownBig' => 'fadeOutDownBig', 'fadeOutLeftBig' => 'fadeOutLeftBig', 'fadeOutRightBig' => 'fadeOutRightBig', 'bounceIn' => 'bounceIn', 'bounceInDown' => 'bounceInDown', 'bounceInUp' => 'bounceInUp', 'bounceInLeft' => 'bounceInLeft', 'bounceInRight' => 'bounceInRight', 'bounceOut' => 'bounceOut', 'bounceOutDown' => 'bounceOutDown', 'bounceOutUp' => 'bounceOutUp', 'bounceOutLeft' => 'bounceOutLeft', 'bounceOutRight' => 'bounceOutRight', 'rotateIn' => 'rotateIn', 'rotateInDownLeft' => 'rotateInDownLeft', 'rotateInDownRight' => 'rotateInDownRight', 'rotateInUpLeft' => 'rotateInUpLeft', 'rotateInUpRight' => 'rotateInUpRight', 'rotateOut' => 'rotateOut', 'rotateOutDownLeft' => 'rotateOutDownLeft', 'rotateOutDownRight' => 'rotateOutDownRight', 'rotateOutUpLeft' => 'rotateOutUpLeft', 'rotateOutUpRight' => 'rotateOutUpRight', 'hinge' => 'hinge', 'rollIn' => 'rollIn', 'rollOut' => 'rollOut'),
		'description' => __( '','pixi' ),
		'group' => __( 'Animation Settings', 'pixi' ),
		),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Out Animation (type)','pixi' ),
		'param_name' => 'out_animate_type',
		'value' => array( 'sequence' => '', 'reverse' => 'reverse', 'sync' => 'sync', 'shuffle' => 'shuffle' ),
		'description' => __( '','pixi' ),
		'group' => __( 'Animation Settings', 'pixi' ),
		),
	array(
		'type' => 'textfield',
		'heading' => __( 'initialDelay','pixi' ),
		'param_name' => 'initial_delay',
		'value' => 0,
		'description' => __( '','pixi' ),
		'group' => __( 'Animation Settings', 'pixi' ),
		),
	array(
		'type' => 'dropdown',
		'heading' => __( 'autoStart','pixi' ),
		'param_name' => 'auto_start',
		'value' => array( 'True' => 1, 'False' => 0 ),
		'description' => __( '','pixi' ),
		'group' => __( 'Animation Settings', 'pixi' ),
		),
	array(
		'type' => 'dropdown',
		'heading' => __( 'loop','pixi' ),
		'param_name' => 'loop',
		'value' => array( 'True' => 1, 'False' => 0 ),
		'description' => __( '','pixi' ),
		'group' => __( 'Animation Settings', 'pixi' ),
		),
	array(
		'type' => 'dropdown',
		'heading' => __( 'type','pixi' ),
		'param_name' => 'type',
		'value' => array( 'char' => 'char', 'word' => 'word' ),
		'description' => __( '','pixi' ),
		'group' => __( 'Animation Settings', 'pixi' ),
		),
	array(
		'type' => 'textfield',
		'heading' => __( 'Extra Class','pixi' ),
		'param_name' => 'class',
		'value' => '',
		'description' => __( '','pixi' ),
		),
	)
));