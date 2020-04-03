<?php
vc_add_shortcode_param( 'image_select', 'pixi_shortcode_template' );
function pixi_shortcode_template( $settings, $value ) {
   return '<div class="my_param_block">'
	.'<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
	esc_attr( $settings['param_name'] ) . ' ' .
	esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />
	<img src="'.esc_attr( $value ).'">'.
	'</div>'; // This is html markup that will be outputted in content elements edit form
} ?>