<?php get_header(); 
global $pixi_options;
$tb_show_page_title = isset($pixi_options['tb_page_show_page_title']) ? $pixi_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($pixi_options['tb_post_show_breadcrumb']) ? $pixi_options['tb_post_show_breadcrumb'] : 1;
$tb_post_show_nav = (int) isset($pixi_options['tb_post_show_nav']) ?  $pixi_options['tb_post_show_nav']: 1;
$tb_post_show_author = (int) isset($pixi_options['tb_post_show_author']) ? $pixi_options['tb_post_show_author'] : 1;
$tb_post_show_comment = (int) isset($pixi_options['tb_post_show_comment']) ?  $pixi_options['tb_post_show_comment']: 1; ?>
	<div class="main-content">
      <div class="internal-content">
		<article <?php post_class(); ?>>
				<div class="container">
                  <div class="mo-team-article">
					<?php while ( have_posts() ) : the_post(); ?>
                          <div class="col-md-4 col-xs-12 mo-thumb">
                             <?php if (has_post_thumbnail()) the_post_thumbnail('pixi-team'); ?>
                          </div>
                          <div class="col-md-8 col-xs-12">
                            <div class="mo-team-content">
                                    <h1 class="mo-title color-gradient"><?php the_title(); ?></h1> 
                                    <span class="mo-position">/ <?php echo get_post_meta(get_the_ID(),'member_position',true); ?></span>
                                    <?php
                                    $facebook = get_post_meta(get_the_ID(),'member_facebook',true);
                                    $twitter = get_post_meta(get_the_ID(),'member_twitter',true);
                                    $linkedin = get_post_meta(get_the_ID(),'member_linkedin',true);
                                    $pinterest = get_post_meta(get_the_ID(),'member_pinterest',true);
                                    $instagram = get_post_meta(get_the_ID(),'member_instagram',true);
                                    $flickr = get_post_meta(get_the_ID(),'member_flickr',true);
								    $link= get_post_meta(get_the_ID(),'member_link',true);

                                    $social =  array();
                                    if($facebook) $social[] = '<a class="facebook" href="'.esc_url($facebook).'"><span class="fa fa-facebook"></span></a>';
                                    if($twitter) $social[] = '<a class="twitter" href="'.esc_url($twitter).'"><span class="fa fa-twitter"></span></a>';
                                    if($linkedin) $social[] = '<a class="linkedin" href="'.esc_url($linkedin).'"><span class="fa fa-linkedin"></span></a>';
                                    if($pinterest) $social[] = '<a class="pinterest" href="'.esc_url($pinterest).'"><span class="fa fa-pinterest"></span></a>';
                                    if($instagram) $social[] = '<a class="instagram" href="'.esc_url($instagram).'"><span class="fa fa-instagram"></span></a>';
                                    if($flickr) $social[] = '<a class="flickr" href="'.esc_url($flickr).'"><span class="fa fa-flickr"></span></a>';
								    if($link) $social[] = '<a class="linkedin" href="'.esc_url($link).'" target="_blank"><span class="fa fa-link"></span></a>';
                                    if(!empty($social)) echo '<div class="team-icon-links social-icons style1">'.implode(' ', $social).'</div>'
                                   ?>
                                   <p class="mo-bio"><?php echo get_post_meta(get_the_ID(),'member_bio',true); ?></p>
                                <div class="mo-content"><?php the_content(); ?></div>
                             </div>   
                         </div>
					<?php endwhile; ?>
                  </div>  
				</div>
		</article>
       </div>
	   <div class="mo-related mo-team-related">
		<div class="container">
			<?php
				$taxterms = wp_get_object_terms( get_the_ID(), 'team_category', array('fields' => 'ids') );
				$args = array(
				'post_type' => 'team',
				'post_status' => 'publish',
				'posts_per_page' => 5, // you may edit this number
				'orderby' => 'rand',
				'post__not_in' => array (get_the_ID()),
				);
				$related_items = new WP_Query( $args );
				if ($related_items->have_posts()) :
				?>
				<div class="mo-team-related-carousel">
				  <div class="owl-carousel dots-nav-dark" data-col_lg="3" data-col_md="3" data-col_sm="3" data-col_xs="1" data-item_space="15" data-loop="true" data-autoplay="true" data-smartspeed="700" data-nav="false" data-dots="false">
					<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
					  <div class="team-member-temp3">
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
								if($pinterest) $social[] = '<a class="pinterest" href="'.esc_url($pinterest).'" target="_blank"><span class="fa fa-pinterest"></span></a>';
								if($instagram) $social[] = '<a class="instagram" href="'.esc_url($instagram).'" target="_blank"><span class="fa fa-instagram"></span></a>';
								if($flickr) $social[] = '<a class="flickr" href="'.esc_url($flickr).'" target="_blank"><span class="fa fa-flickr"></span></a>';
								if($link) $social[] = '<a class="linkedin" href="'.esc_url($link).'" target="_blank"><span class="fa fa-link"></span></a>';
								if(!empty($social)) echo '<div class="icon-links">'.implode(' ', $social).'</div>'
							  ?>
							</div>
						</div>
						<div class="team-details team-member-details">
				    		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					    	<h6><?php echo get_post_meta(get_the_ID(),'member_position',true); ?></h6>
					    </div>
					</div>
					<?php endwhile; ?>
					</div>
				</div>
				<?php
				endif;
				wp_reset_postdata(); ?>
			</div>
		</div> 
	</div>
<?php get_footer(); ?>