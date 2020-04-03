<?php
function pixi_package_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
	    "style" => 'style1',
		"title" => '',
		"sup_title" => '',
		"price" => '$99',
		"period" => '/ month',
		"content_package" => '',
		"button_label" => 'Order Now',
		"button_url" => '#',
		'animation_css' => '',
		'animation_delay' => '0.1s',
		"el_class" => '',
    ), $atts));
	$content_package = wpb_js_remove_wpautop($content_package, true);
    $class = array();
	$class[] = 'pricing-item';
	$class[] = $style;
	$class[] = $el_class;
    ob_start();
    ?> 
		<div class="<?php echo esc_attr(implode(' ', $class)); ?> <?php echo esc_attr( $animation_css); ?>" data-wow-delay="<?php echo esc_attr($animation_delay); ?>">
		    <?php if($style == 'style1' && $sup_title ) echo '<h6>'.esc_html($sup_title).'</h6>'; ?>
			<?php if($title) echo '<h3>'.esc_html($title).'</h3>'; ?>
            <?php if($style == 'style2' && $sup_title ) echo '<h6>'.esc_html($sup_title).'</h6>'; ?>
              <div class="pricing"> 
                 <?php if($price) echo '<span class="pricing-currency">'.esc_html($price).'</span>'; 
                 if($period) echo '<span class="pricing-period">'.esc_html($period).'</span>'; ?>
             </div>
            <div class="content"><?php if($content_package) echo _($content_package); ?></div>
            <a class="button <?php if($style == 'style1') echo 'slide'; if($style == 'style2') echo 'hover_shine'; ?>  " href="<?php if($button_url) echo esc_url($button_url); ?>"><?php if($button_label) echo esc_html($button_label); ?><i class="ion-arrow-right-c"></i></a>
		</div>
    <?php
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('Package_box', 'pixi_package_box_func');}


