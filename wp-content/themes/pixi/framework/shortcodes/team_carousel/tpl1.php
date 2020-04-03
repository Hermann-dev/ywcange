  <div <?php post_class(); ?>>
    <div class="team-member-temp1 team-member">
        <figure> 
         <?php if (has_post_thumbnail()) the_post_thumbnail('pixi-team'); ?>
          <div class="team-member-links top">
             <?php
                $facebook = get_post_meta(get_the_ID(),'member_facebook',true);
                $twitter = get_post_meta(get_the_ID(),'member_twitter',true);
                $linkedin = get_post_meta(get_the_ID(),'member_linkedin',true);
                $pinterest = get_post_meta(get_the_ID(),'member_pinterest',true);
                $instagram = get_post_meta(get_the_ID(),'member_instagram',true);
                $flickr = get_post_meta(get_the_ID(),'member_flickr',true);
                $link= get_post_meta(get_the_ID(),'member_link',true);

                $social =  array();
                if($facebook) $social[] = '<a href="'.esc_url($facebook).'" class="facebook" target="_blank"><span class="fa fa-facebook"></span></a>';
                if($twitter) $social[] = '<a href="'.esc_url($twitter).'" class="twitter" target="_blank"><span class="fa fa-twitter"></span></a>';
                if($linkedin) $social[] = '<a href="'.esc_url($linkedin).'" class="linkedin" target="_blank"><span class="fa fa-linkedin"></span></a>';
                if($pinterest) $social[] = '<a href="'.esc_url($pinterest).'" class="pinterest" target="_blank"><span class="fa fa-pinterest"></span></a>';
                if($instagram) $social[] = '<a href="'.esc_url($instagram).'" class="instagram" target="_blank"><span class="fa fa-instagram"></span></a>';
                if($flickr) $social[] = '<a href="'.esc_url($flickr).'" class="flickr" target="_blank"><span class="fa fa-flickr"></span></a>';
			    if($link) $social[] = '<a href="'.esc_url($link).'" target="_blank"><span class="fa fa-link"></span></a>';
                if(!empty($social)) echo '<div class="icon-links">'.implode(' ', $social).'</div>'
            ?>
            </div>
        </figure>
        <div class="team-details">
          <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
          <?php echo '<h6>'.get_post_meta(get_the_ID(),'member_position',true).'</h6>'; ?>
        </div>
        <!-- team-details --> 
      </div>
  </div>