<?php
function pixi_icon_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'icon' => 'fontawesome',
		'image_icon' => '',
		'number_step' => '',
		'title' => '',
		'sup_title_box' => '',
		'text_link'=> 'Read More',
		'link' => '',
	    'color' => 'primary',
	    'pixi_template' => 'pixi_icon_box',
		'animation_css' => '',
		'animation_delay' => '0.1s',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
    $icon_name = "icon_" . $icon;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
	$template_class = basename($pixi_template,'.jpg') ;
    $class = array();
	$class[] = 'service';
	$class[] = $el_class;
    $class[] = $template_class;
    ob_start(); ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?> <?php echo esc_attr($animation_css); ?>" data-wow-delay="<?php echo esc_attr($animation_delay); ?>">
		   <?php if ($icon && !empty($iconClass) ) {
			  echo '<div class="icon-wrap"><i class="'.esc_attr($iconClass).'"></i></div>';
		   }?>
		  <div class="title-wrap">
		       <?php if( $pixi_template == 'pixi_icon_box-style9.jpg' ) { echo '<span class="step-number">'.esc_html($number_step).'</span>'; } ?>
			   <?php if($title) echo '<h6>'.esc_html($title).'</h6>'; ?>
			    <?php if( $pixi_template == 'pixi_icon_box-style1.jpg'  || $pixi_template == 'pixi_icon_box-style4.jpg' ) { echo '<span class="sup_title">'.esc_html($sup_title_box).'</span>'; } ?>
			   <?php 
				  if($content)echo '<div class="content">'.$content.'</div>';
				  if($link) echo '<div class="row-btn"><a class="link-btn" href="'. esc_url($link). '">'.$text_link.'</a></div>';
			   ?>
          </div>
          <?php if( $link && $pixi_template == 'pixi_icon_box-style7.jpg' || $link && $pixi_template == 'pixi_icon_box-style6.jpg' ) {
		   echo '<a class="arrow-btn" href="'. esc_url($link). '"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg></a>'; } ?>
		</div>
        <div class="clearfix"></div>
    <?php
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('icon_box', 'pixi_icon_box_func');}