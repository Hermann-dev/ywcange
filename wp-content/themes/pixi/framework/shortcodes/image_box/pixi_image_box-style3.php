<?php 
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
	if($attachment_image[0]) { echo '
		<div class="thumb-service">
			<img src="'.esc_url($attachment_image[0]).'" alt="'.esc_attr($title_box).'"/>
		</div>';
	}
?>
<div class="title-wrap">
  <?php if($title_box) echo '<h6>'.esc_html($title_box).'</h6>';
		if($content_box)echo '<div class="content">'.$content_box.'</div>';
		if($link_box) echo '<div class="row-btn"><a class="link-btn" href="'. esc_url($link_box). '">'.$text_link.'</a></div>';
  ?>
 </div>
