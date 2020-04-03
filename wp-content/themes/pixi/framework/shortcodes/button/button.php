<?php
function pixi_button_func($atts) {
    extract(shortcode_atts(array(
	    'text'     => 'learn more',
		'link'     => '#',
        'color'    => 'light',
		'hr_color' => 'hr_light',
	    'bg_color' => 'bg_primary',
		'hr_bg_color'=> 'bg_hr_primary',
		'radius'   => 'radius4',
		'hr_style' => 'linear',
		'shadow'   => 'no_shadow',
		'hr_shadow'=> 'hr_no_shadow',
        'size'     => 'medium',
        'position' => 'text-center',
		'icon'     => 'fontawesome',
		'animation_css' => '',
		'animation_delay' => '0.1s',
        'el_class' => ''
    ), $atts));
    $icon_name = "icon_" . $icon;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $class = array();
    $class[] = $el_class;
	//link 
	$link_button = null;
    if ($link !== '') { $link_button = vc_build_link($link); }
    if ( strlen( $link_button['url'] ) > 0 ) {
        $href = $link_button['url'];
    } else{ $href = '#'; }
	$target = (empty($link_button['target'])) ? '_self' : $link_button['target'];
    ob_start(); ?>
     <div class="<?php echo esc_attr($position);?> <?php echo esc_attr(implode(' ', $class));?> <?php echo esc_attr($animation_css); ?>" data-wow-delay="<?php echo esc_attr($animation_delay); ?>">
          <a class="button <?php echo esc_attr($color .' '.$hr_color .' '.$bg_color .'  '.$hr_bg_color .' '. $size.' '.$radius .' '.$shadow .' '.$hr_shadow .' '. $hr_style);?>" href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_html($text); if(isset($iconClass) && !empty($iconClass)) {  echo '<i class="'.esc_attr($iconClass).'"></i>'; } ?></a> 
	 </div>
    <?php return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('button', 'pixi_button_func'); }