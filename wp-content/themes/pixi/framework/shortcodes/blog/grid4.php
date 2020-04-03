<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="grid-left-post <?php echo esc_attr($animation_css); ?>" <?php echo esc_attr($anim_delay); ?>>
    <div class="format-post">
		<?php if (has_post_thumbnail()) { ?>
		<figure>
		   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pixi-small');?></a>
		</figure>		
		<?php  } else{ ?>
		   <div class="empty_thumbnail"></div>
		<?php  } ?>
	</div>					
		
	<div class="info-post">
		<div class="cat-name"><?php echo the_terms( get_the_ID(), 'category' ); ?></div>
		<h3 class="post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
		<p><?php echo pixi_custom_excerpt($excerpt_lenght); ?></p>
		<div class="footer-info-post">
			<ul class="meta-post"><li><?php echo get_the_author(); ?></li><li class="space">-</li><li><?php echo get_the_date(); ?></li></ul>
			<a class="arrow-btn" href="<?php the_permalink(); ?>"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
		</div>
	</div>
  </div>
</article>