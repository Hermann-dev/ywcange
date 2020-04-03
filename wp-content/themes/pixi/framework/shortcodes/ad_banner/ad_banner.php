<?php
function pixi_ad_banner_func($atts, $ad_content = null) {
    extract(shortcode_atts(array(
		'image' => '',
		'title' => '',
		'ad_content' => '',
		'button_label' => 'ORDER NOW',
		'link' => '',
		'el_class' => '',
    ), $atts));
	$ad_content = wpb_js_remove_wpautop($ad_content, true);
    $class = array();
	$class[] = 'mo-ad-banner';
	$class[] = $el_class;
    ob_start();
    ?>
    <div class="ad_banner">
       <div class="<?php echo esc_attr(implode(' ', $class)); ?>">
       <?php if($image) {
			echo '<figure> '.wp_get_attachment_image($image, 'full') .'</figure>';
		}?>
		 <div class="overlay-effect">
			<div class="overlay-inner">
	          <?php if($title) echo '<h4 class="title">'.esc_html($title).'</h4>'; ?>
		      <?php if($ad_content) echo '<div class="content">'. $ad_content .'</div>'; ?>
              <?php if($link) echo '<a class="link-btn" href="'. esc_url($link). '">'. esc_html($button_label) .'</a>'; ?>
            </div>
		 </div>	
	  </div>
    </div>
    <?php
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('ad_banner', 'pixi_ad_banner_func');}