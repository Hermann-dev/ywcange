<?php
function pixi_counter_up_func($atts) {
    extract(shortcode_atts(array(
		'style' => 'style1',
		'icon' => 'fontawesome',
        'number' => '750',
        'title' => 'PROJECT COMPLETE',
		'animation_css' => '',
		'animation_delay' => '0.1s',
        'el_class' => ''
    ), $atts));
	$icon_name = "icon_" . $icon;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $class = array();
    $class[] = 'counter-number';
    $class[] = $style;
    $class[] = $el_class;
    ob_start();
    ?>
   <div class="<?php echo esc_attr(implode(' ', $class)); ?> <?php echo esc_attr( $animation_css); ?>" data-wow-delay="<?php echo esc_attr($animation_delay); ?>">
     <?php 
	  if($icon && !empty($iconClass) ) { echo '<i class="'.esc_attr($iconClass).'"></i>';	} 	
      if($number) echo '<h3 class="counter">'.($number).'</h3>'; 
	  if($title) echo '<h6>'.esc_html($title).'</h6>';
     ?>
   </div>
    <?php
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('counter_up', 'pixi_counter_up_func'); }