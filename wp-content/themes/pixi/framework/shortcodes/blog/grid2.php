<?php global $pixi_options; 
$id = get_the_ID();
$terms = wp_get_object_terms($id, 'category');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	  <a href="<?php the_permalink() ?>" class="overlay-post <?php echo esc_attr($animation_css); ?>" <?php echo esc_attr($anim_delay); ?>>
	    <div class="img-perspective">
			<?php the_post_thumbnail('pixi-lg-height');?>
			<div class="perspective_overlay"></div>
			<p class="term hover_shine"><?php echo esc_html($terms[0]->name) ?></p>
			<div class="perspective-caption">
		    	<p class="perspective-description"><?php echo get_the_date(); ?></p>
			    <h3 class="perspective-title"><?php echo get_the_title(); ?></h3>
			</div>
	  	</div>
	  </a>
</article>