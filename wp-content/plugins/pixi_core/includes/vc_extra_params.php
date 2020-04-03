<?php
vc_add_param ( "vc_row", array (
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("row style", 'pixi'),
			"param_name" => "row_separator",
			"group"         => esc_html__("Custom Options", 'pixi'),
			"description" => esc_html__("Select shap style in this row.",'pixi'),
			"value" => array(
				esc_html__("None Select", 'pixi')    => "none",
				esc_html__("large triangle", 'pixi') => "lg_triangle",
				esc_html__("Small triangle", 'pixi') => "sm_triangle",
	            esc_html__("round", 'pixi')          => "round",
	            esc_html__("curve", 'pixi')          => "curve",
				esc_html__("angled left", 'pixi')    => "angled_left",
				esc_html__("angled right", 'pixi')   => "angled_right",
				esc_html__("wave", 'pixi')           => "wave",
				esc_html__("waves", 'pixi')          => "waves",
	            esc_html__("waves animate", 'pixi')  => "waves_animate",
             )
) );
vc_add_param ( "vc_row", array (
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("position separator", 'pixi'),
			"param_name" => "position_separator",
			"group"         => esc_html__("Custom Options", 'pixi'),
			"description" => esc_html__("Select shap position in this row.",'pixi'),
			"value" => array(
	            esc_html__("bottom", 'pixi') => "svg_bottom",
	            esc_html__("top", 'pixi')    => "svg_top",
	            esc_html__("top AND bottom", 'pixi')  => "svg_top_bottom")
) );
vc_add_param ( "vc_row", array (
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("color separator", 'pixi'),
			"param_name" => "color_separator",
			"group"         => esc_html__("Custom Options", 'pixi'),
			"description" => esc_html__("Select shap color style in this row.",'pixi'),
			"value" => array(
	            esc_html__("None", 'pixi')      => "svg_none",
	            esc_html__("White", 'pixi')     => "svg_white",
				esc_html__("Grey", 'pixi')      => "svg_grey",
				esc_html__("Dark", 'pixi')      => "svg_dark",
	            esc_html__("Primary", 'pixi')   => "svg_primary",
				esc_html__("Secondary", 'pixi') => "svg_secondary")
) );
vc_add_param ( "vc_row", array (
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("bottom color separator", 'pixi'),
			"param_name" => "bottom_color_separator",
			"group"         => esc_html__("Custom Options", 'pixi'),
			"description" => esc_html__("Select bottom shap color style in this row.",'pixi'),
	        'dependency'  => array(
	           "element"=>"position_separator",
	           "value"=>  "svg_top_bottom",
	     	),
			"value" => array(
	            esc_html__("None", 'pixi')      => "svg_bottom_none",
	            esc_html__("White", 'pixi')     => "svg_bottom_white",
				esc_html__("Grey", 'pixi')      => "svg_bottom_grey",
				esc_html__("Dark", 'pixi')      => "svg_bottom_dark",
	            esc_html__("Primary", 'pixi')   => "svg_bottom_primary",
				esc_html__("Secondary", 'pixi') => "svg_bottom_secondary")
) );
vc_add_param ( "vc_row", array (
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("canvas", 'pixi'),
			"param_name" => "canvas",
			"group"       => esc_html__("Custom Options", 'pixi'),
			"description" => esc_html__("Select the particles in this element.",'pixi'),
			"value" => array(
				esc_html__("None Select", 'pixi') => "none",
				esc_html__("particles style 1", 'pixi') => "particles1",
				esc_html__("particles style 2", 'pixi') => "particles2")
) );
vc_add_param ( "vc_row", array (
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => esc_html__("Background color", 'pixi'),
			"param_name" => "content_bg_color",
	        "group"      => esc_html__("Design Options", 'pixi'),
			"description" 	=> esc_html__( "Select background color in this row.", 'pixi' ),
			"value"      => array(
	            esc_html__("light", 'pixi')     => "bg-light",
				esc_html__("Grey", 'pixi')      => "bg-grey",
				esc_html__("Dark", 'pixi')      => "bg-dark",
	            esc_html__("Gradient", 'pixi')  => "bg-gradient",
	            esc_html__("Primary", 'pixi')   => "bg-color-main",
				esc_html__("Secondary", 'pixi') => "bg-color-secondary")
) );
vc_add_param ( "vc_row", array (
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => esc_html__("content color", 'pixi'),
			"param_name" => "content_color",
	        "group"      => esc_html__("Design Options", 'pixi'),
			"description" 	=> esc_html__( "Select content text color in this row.", 'pixi' ),
			"value"      => array(
	            esc_html__("Dark Text", 'pixi')  => "dark_txt",
				esc_html__("White Text", 'pixi') => "white_txt")
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Gradient Overlay 'primary color'", 'pixi' ),
		"param_name" 	=> "mo_bg_overlay",
		"value" 		=> "",
		"group"         => esc_html__("Design Options", 'pixi'),
		"description" 	=> esc_html__( "Select color Gradient background overlay ( primary color ) in this row.", 'pixi' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Gradient Overlay 'second color'", 'pixi' ),
		"param_name" 	=> "mo_bg_second_overlay",
		"value" 		=> "",
		"group"         => esc_html__("Design Options", 'pixi'),
		"description" 	=> esc_html__( "Select color Gradient background overlay ( second color ) in this row.", 'pixi' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "checkbox",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Background Fixed", 'pixi' ),
		"param_name" 	=> "mo_bg_fixed",
		"value" 		=> "",
		"group"         => esc_html__("Design Options", 'pixi'),
		"description" 	=> esc_html__( "Enable background fixed in this row.", 'pixi' )
) );
vc_add_param ( "vc_custom_heading", array (
		"type" 			=> "textarea",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Custom CSS", 'pixi' ),
		"param_name" 	=> "custom_css",
		"value" 		=> "",
		"description" 	=> esc_html__( "Enter style in this custom heading. EX: line-height: 24px; letter-spacing: 0.04em; ...", 'pixi' )
) );