<a href="<?php echo esc_url($link_box); ?>">
  <div class="img-perspective">
	<img class="img-resposive" src="<?php echo esc_url($attachment_image[0]); ?>" alt="<?php echo esc_attr($title_box); ?>" />
	<div class="perspective_overlay"></div>
	<div class="perspective-caption">
		<?php 
			if($title_box) echo '<h6 class="perspective-title">'.esc_html($title_box).'</h6>'; 
			if($content_box)echo '<div class="content">'.$content_box.'</div>';
			if( $link_box) { echo '<div class="circle-btn"><span></span><svg x="0px" y="0px" width="50px" height="50px" viewBox="0 0 54 54"><circle fill="transparent" stroke="#656e79" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle></svg></div>'; }
		?>
	</div>
  </div>
</a>