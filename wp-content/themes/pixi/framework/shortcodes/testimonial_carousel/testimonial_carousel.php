<?php
function motivoweb_testimonial_carousel_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl' =>  'tpl1',
		'col_lg' =>  1,
		'col_md' =>  1,
		'col_sm' =>  1,
		'col_xs' =>  1,
		'item_space' =>  0,
		'text_color' =>  'black_txt',
		'loop' =>  'false',
		'autoplay' =>  'false',
		'smartspeed' =>  500,
		'nav' =>  'false',
		'nav_position' =>  'nav-middle',
		'dots' =>  'false',
		'dots_dir_position' =>  'dots-center',
		'dots_nav_color' =>  'primary',
		'el_class' => '',
        'category' => '',
		'posts_per_page' => -1,
		'orderby' => 'none',
        'order' => 'none',
    ), $atts));
    $class = array();
    $class[] = 'mo-testimonial-carousel';
    $class[] = $tpl;
	$class[] = $dots_dir_position;
	$class[] = $nav_position;
	$class[] = $dots_nav_color;
	$class[] = $text_color;
    $class[] = $el_class;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'testimonials',
        'post_status' => 'publish');
		
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'testimonials-type',
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
    $wp_query = new WP_Query($args);
    ob_start();
	if ( $wp_query->have_posts() ) { ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<div class="testimonial-carousel"  data-col_lg="<?php echo esc_attr($col_lg); ?>" data-col_md="<?php echo esc_attr($col_md); ?>" data-col_sm="<?php echo esc_attr($col_sm); ?>" data-col_xs="<?php echo esc_attr($col_xs); ?>" data-item_space="<?php echo esc_attr($item_space); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-smartspeed="<?php echo esc_attr($smartspeed); ?>" data-nav="<?php echo esc_attr($nav); ?>" data-dots="<?php echo esc_attr($dots); ?>">
				<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); 
				 include $tpl.'.php'; 
				 } ?>
			</div>
		</div>
    <?php
	} else {
		echo _e('Post not found!', 'pixi');
    }
	wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('pixi_shortcode')) { pixi_shortcode('testimonial_carousel', 'motivoweb_testimonial_carousel_func'); }