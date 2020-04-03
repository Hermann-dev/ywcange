<div class="<?php echo esc_attr($class_columns); ?>">
    <div class="team-member-temp3 <?php echo esc_attr($animation_css); ?>" <?php echo esc_attr($anim_delay); ?>>
     <div class="team-member-overlay">
        <?php if (has_post_thumbnail()) the_post_thumbnail('pixi-team'); ?>
		<div class="team-member-links social-icons style1">
		  <?php
			$facebook = get_post_meta(get_the_ID(),'member_facebook',true);
			$twitter = get_post_meta(get_the_ID(),'member_twitter',true);
			$linkedin = get_post_meta(get_the_ID(),'member_linkedin',true);
			$pinterest = get_post_meta(get_the_ID(),'member_pinterest',true);
			$instagram = get_post_meta(get_the_ID(),'member_instagram',true);
			$flickr = get_post_meta(get_the_ID(),'member_flickr',true);
			$link= get_post_meta(get_the_ID(),'member_link',true);
			$social =  array();
			if($facebook) $social[] = '<a class="facebook" href="'.esc_url($facebook).'" target="_blank"><span class="fa fa-facebook"></span></a>';
			if($twitter) $social[] = '<a class="twitter" href="'.esc_url($twitter).'" target="_blank"><span class="fa fa-twitter"></span></a>';
			if($linkedin) $social[] = '<a class="linkedin" href="'.esc_url($linkedin).'" target="_blank"><span class="fa fa-linkedin"></span></a>';
			if($pinterest) $social[] = '<a  class="pinterest" href="'.esc_url($pinterest).'" target="_blank"><span class="fa fa-pinterest"></span></a>';
			if($instagram) $social[] = '<a  class="instagram" href="'.esc_url($instagram).'" target="_blank"><span class="fa fa-instagram"></span></a>';
			if($flickr) $social[] = '<a  class="flickr" href="'.esc_url($flickr).'" target="_blank"><span class="fa fa-flickr"></span></a>';
			if($link) $social[] = '<a  class="linkedin" href="'.esc_url($link).'" target="_blank"><span class="fa fa-link"></span></a>';
			if(!empty($social)) echo '<div class="icon-links">'.implode(' ', $social).'</div>'
		  ?>
		</div>
     </div>
	 <div class="team-details team-member-details">
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<h6><?php echo get_post_meta(get_the_ID(),'member_position',true); ?></h6>
	 </div>
  </div>
</div>