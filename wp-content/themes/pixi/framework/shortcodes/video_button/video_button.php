<?php
function pixi_video_button_func($atts) {
    extract(shortcode_atts(array(
        'video_link' => '',
		'animation_css' => '',
		'animation_delay' => '0.1s',
		'color' => 'light',
		'position' => 'dir_center',
        'el_class' => ''
    ), $atts));
    $class = array();
	$class[] = 'mo-video-fancybox';
	$class[] = $el_class;
    ob_start(); ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<?php 
			    if($video_link) echo '<a class="lightbox-video video-button '.esc_attr($color).' '.esc_attr($position).' '.esc_attr($animation_css).'" data-wow-delay="'.esc_attr($animation_delay).'" href="'.esc_url($video_link).'"><i class="fa fa-play"></i></a>';
			?>
		</div>
    <?php
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('video_button', 'pixi_video_button_func');}