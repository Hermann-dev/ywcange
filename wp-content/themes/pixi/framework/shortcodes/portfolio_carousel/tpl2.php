<div <?php post_class(); ?>>
  <div class="portfolio-effect2">
	<?php echo '<div>'.$attachment.'</div>';?>
	<div class="overlay"></div>
	<div class="content-block">
		<a class="portfolio-link <?php echo esc_attr($th_is_lightbox); ?>" href="<?php echo esc_html($full); ?>"></a>
		<h4><?php echo esc_html($title); ?></h4>
	<h6 class="read-more"><?php echo esc_attr($term_string); ?></h6>
	</div>
  </div>
</div>