<a href="<?php echo esc_url($link_box); ?>">
  <div class="img-perspective">
	<img class="img-resposive" src="<?php echo esc_url($attachment_image[0]); ?>" alt="<?php echo esc_attr($title_box); ?>" />
	<div class="perspective_overlay"></div>
	<div class="perspective-caption">
		<?php 
			if($title_box) echo '<h6 class="perspective-title">'.esc_html($title_box).'</h6>'; 
			if($content_box)echo '<div class="content">'.$content_box.'</div>';
		?>
	</div>
  </div>
</a>