<?php global $pixi_options; ?>
 <div class="single-header img_overlay">
    <?php $image_link = get_the_post_thumbnail_url(get_the_ID(),'full');  ?>
    <div class="blog-hero" style="background-image: url(<?php echo esc_url($image_link); ?>);" ></div>
	<div class="container wrapper">
	   <?php $quote_content = get_post_meta(get_the_ID(), 'tb_post_quote', true);
		echo '<div class="blockquote-post"><blockquote>'.$quote_content.'</blockquote></div>'; ?>
	</div>
</div>
<div class="title-wrap center">
	<h3 class="post-title"><?php the_title(); ?></h3> 
	 <ul class="meta-post">
		<?php if (isset($pixi_options['post-meta-single']) && in_array('cat', $pixi_options['post-meta-single'])) {  ?>
			 <li><i class="fa fa-folder-open-o"></i><?php the_terms( get_the_ID(), 'category' ); ?></li>
		<?php } ?>
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