<?php
function pixi_image_box($params) {
    extract(shortcode_atts(array(
		'tpl' =>  'tpl1',
		'pixi_template' => 'pixi_image_box',
        'image' => '',
        'title_box' => '',
		'sup_title_box' => '',
		'content_box' => '',
		'text_link'=> 'Read More',
        'link_box' => '',
		'direction' => 'left',
		'animation_css' => '',
		'animation_delay' => '0.1s',
        'el_class' => ''
    ), $params));
	$template_class = basename($pixi_template,'.jpg') ;
	$class = array();
    $class[] = 'image_box';
	$class[] = $el_class;
    $class[] = $template_class;
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
    ob_start();
    ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?> <?php echo esc_attr( $animation_css); ?>" data-wow-delay="<?php echo esc_attr($animation_delay); ?>">
        <?php include $template_class.'.php'; ?>
	</div>
    <?php
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('image_box', 'pixi_image_box'); }