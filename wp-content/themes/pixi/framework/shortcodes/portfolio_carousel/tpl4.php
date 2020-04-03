<div class="portfolio-effect4 img-perspective">
	<?php echo '<div>'.$attachment.'</div>';?>
	<div class="perspective-caption">
		<div class="overlay-inner">
			<h5><?php the_title(); ?></h5>
			<p class="term"><?php echo esc_attr($term_string); ?></p>
		</div>
		<a class="portfolio-link <?php echo esc_attr($th_is_lightbox); ?>" href="<?php echo esc_url($full); ?>">
			<div class="circle-btn"><span></span><svg x="0px" y="0px" width="50px" height="50px" viewBox="0 0 54 54"><circle fill="transparent" stroke="#656e79" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle></svg></div>
		</a>	
	</div>
</div>