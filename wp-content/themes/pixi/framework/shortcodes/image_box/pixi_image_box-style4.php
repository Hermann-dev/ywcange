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
  ?>
 </div>
  <?php if( $link_box) {
   echo ' <a href="'. esc_url($link_box). '" class="circle-btn"><span></span><svg x="0px" y="0px" width="50px" height="50px" viewBox="0 0 54 54"><circle fill="transparent" stroke="#656e79" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle></svg></a>'; 
 } ?>