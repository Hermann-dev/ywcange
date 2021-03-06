<?php
function pixi_team_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl' =>  'tpl1',
		'columns' =>  4,
        'el_class' => '',
        'category' => '',
		'posts_per_page' => -1,
		'orderby' => 'none',
        'order' => 'none',
		'single_option' => '',
		'animation_css' => '',
    ), $atts));
    $class = array();
    $class[] = 'mo-team-wrapper clearfix';
    $class[] = $tpl;
	$class[] = $single_option;
    $class[] = $el_class;
	$class_columns = '';
	$animate_delay = 0;
	switch ($columns) {
		case 1:
			$class_columns = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
			break;
		case 2:
			$class_columns = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
			break;
		case 3:
			$class_columns = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
			break;
		case 4:
			$class_columns = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
			break;
		default:
			$class_columns = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
			break;
	}
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'team',
    	'post_status' => 'publish'
	);
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
				array(
					'taxonomy' => 'team-type',
					'field' => 'id',
					'terms' => $category
				)
		);
    }
    $wp_query = new WP_Query($args);
	$posts = $wp_query->posts;
	foreach($posts as $post) {
		$animate_delay +=2;
		$anim_delay = 'data-wow-delay=.'.$animate_delay.'s';
	}	
    ob_start();
	if ( $wp_query->have_posts() ) { ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<div class="mo-team">
			<div class="row">
				<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); 
				 include $tpl.'.php';
				 } ?>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
    <?php
	} else {
		echo _e('Post not found!', 'pixi');
    }
	wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('team', 'pixi_team_func'); }