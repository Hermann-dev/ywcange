<?php
function pixi_title_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'title' => '',
		'subtitle' => '',
		'position' => 'text-center',
		'pixi_template' => 'pixi_heading',
		'animation_css' => '',
		'animation_delay' => '0.1s',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	$template_class = basename($pixi_template,'.jpg') ;
    ob_start();?>
      <?php echo '<div class="'.esc_attr($template_class).' '.esc_attr($position).' '.esc_attr($animation_css).'" data-wow-delay="'.esc_attr($animation_delay).'">';
	   if($subtitle) echo '<h5>'.esc_html($subtitle).'</h5>';
	   if($title) echo '<h3>'.esc_html($title).'</h3>'; ?>                    
    </div>
    <?php
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('title_box', 'pixi_title_box_func');}