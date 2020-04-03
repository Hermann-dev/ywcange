<?php
function pixi_list_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'list_style' => 'list-style1',                  
        'list_fontsize' => '15px',                  
        'list_lineheight' => '30',                  
        'list_color' => '#92959c',                  
        'list' => '',                  
        'list_item' => '',
	    'el_class' => '',
    ), $atts));
	
	$class = array();
	$class[] = 'list';
	$class[] = $el_class;
	$lists = array();
    $lists = (array) vc_param_group_parse_atts($list); 
    ob_start();
?>
	 <div class="lists">
		<div class="list-inner">
			<div class="list-content <?php echo esc_attr(implode(' ', $class));?> ">
				<?php if($list_style == 'list-style4' || $list_style == 'list-style5' || $list_style == 'list-style6') { ?>
					<ol class="list-style <?php echo esc_attr($list_style); ?>" style="font-size: <?php echo esc_attr($list_fontsize); ?>px; line-height: <?php echo esc_attr($list_lineheight); ?>px; color: <?php echo esc_attr($list_color); ?>">
						<?php foreach ($lists as $key => $value) { ?>
							<li><?php echo esc_html($value['list_item']); ?></li>
						<?php } ?>
					</ol>
				<?php } else { ?>
					<ul class="list-style <?php echo esc_attr($list_style); ?>" style="font-size: <?php echo esc_attr($list_fontsize); ?>px; line-height: <?php echo esc_attr($list_lineheight); ?>px; color: <?php echo esc_attr($list_color); ?>">
						<?php foreach ($lists as $key => $value) { ?>
							<?php if( !empty($value['list_item']) ) { ?><li><?php echo esc_html($value['list_item']); ?></li><?php } ?>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>   
    <?php
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('list', 'pixi_list_func');}