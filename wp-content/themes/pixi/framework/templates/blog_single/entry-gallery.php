<?php 
global $pixi_options;
$media_output = '';
$attachment_ids = array();
$attachment_ids = get_post_meta(get_the_ID(), 'mo_portfolio_gallery', true); ?>
 <div class="single-header img_overlay">
	<div class="container wrapper">
		<?php if(!empty($attachment_ids)) {
			foreach($attachment_ids as $attachment_id ) {
			   if ( is_singular()) {
					$image_attributes = wp_get_attachment_image_src($attachment_id, 'full');
				}
				else if (has_post_thumbnail()) {
					$image_attributes = wp_get_attachment_image_src($attachment_id, 'pixi-medium');
				}	
				if($image_attributes[0]){
					$media_output .= '<div class="item">
									  <figure class="img-single">
										<img src="'.esc_url($image_attributes[0]).'" alt="' . the_title_attribute('echo=0') . '" height="260"/>
									   </figure>
									</div>';
				}
			}
		}
		echo '<div class="carousel-post">'.$media_output.'</div>';
		?>
		<div class="title-wrap">
			<?php if (isset($pixi_options['post-meta-single']) && in_array('cat', $pixi_options['post-meta-single'])) {  ?>
			   <div class="cat-name bg-gradient hover_shine"><?php the_terms( get_the_ID(), 'category' ); ?></div>
			<?php } ?>
			<h3 class="post-title"><?php the_title(); ?></h3> 
			 <ul class="meta-post">
				<?php if (isset($pixi_options['post-meta-single']) && in_array('author', $pixi_options['post-meta-single'])) {  ?>
					 <li><i class="fa fa-user-o"></i><?php echo esc_html__('By ', 'pixi').get_the_author(); ?></li>
				<?php } ?>
				<?php if (isset($pixi_options['post-meta-single']) && in_array('date', $pixi_options['post-meta-single'])) {  ?>
					 <li><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
				<?php } ?>
				<?php if (isset($pixi_options['post-meta-single']) && in_array('comment', $pixi_options['post-meta-single'])) {  ?>
					 <li><i class="fa fa-comments-o"></i><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); echo esc_html__(' Comment', 'pixi'); ?></a></li>  
				<?php } ?>
				<?php if (isset($pixi_options['post-meta-single']) && function_exists('pixi_set_post_views') && in_array('view', $pixi_options['post-meta-single'])) {  ?>
				   <li><i class="fa fa-bookmark-o"></i> <?php echo pixi_get_post_views(get_the_ID()) . esc_html__(' Views', 'pixi'); ?></li>
				<?php } ?>
			 </ul> 
	   </div>
	</div>
</div>