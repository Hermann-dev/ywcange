<?php get_header(); 
global $pixi_options;
$tb_portfolio_layout = isset($pixi_options['tb_portfolio_layout']) ? $pixi_options['tb_portfolio_layout'] : '2cl';
$tb_show_page_title = isset($pixi_options['tb_page_show_page_title']) ? $pixi_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($pixi_options['tb_post_show_breadcrumb']) ? $pixi_options['tb_post_show_breadcrumb'] : 1;
$tb_portfolio_show_nav = (int) isset($pixi_options['tb_portfolio_show_nav']) ? $pixi_options['tb_portfolio_show_nav'] : 1;
$tb_related_portfolio = (int) isset($pixi_options['tb_related_portfolio']) ? $pixi_options['tb_related_portfolio'] : 1;
?>
<div class="main-content">
  <div class="container mo-portfolio-article">
   <div class="row">
    <div class="portfolio-content">
	 <?php while ( have_posts() ) : the_post(); ?>
		<?php $single_portfolio_style = 'image';
		   $portfolio_gallery = array();
		   $portfolio_gallery = get_post_meta(get_the_ID(), 'mo_portfolio_gallery', true);
		   if(!empty($portfolio_gallery) ){ $single_portfolio_style = 'gallery';  }
		
		   if ( $tb_portfolio_layout == '2cl' ) { ?><div class="portfolio-side col-md-6 thumb-content"><?php get_template_part( 'framework/templates/portfolio/portfolio-' . $single_portfolio_style . '-single'); ?></div>
		   <?php } if ( $tb_portfolio_layout == '1col' ) { ?> <?php get_template_part( 'framework/templates/portfolio/portfolio-' . $single_portfolio_style . '-single'); ?> <?php } 
			  if ( $tb_portfolio_layout == '1col' ) { $cl_content = 'portfolio-full col-xs-12 col-md-12 no-padding'; } 
			  elseif ( $tb_portfolio_layout == '2cr') { $cl_content = 'portfolio-side cr col-xs-12 col-sm-6 no-padding-l'; } 
	          elseif ( $tb_portfolio_layout == '2cl' ) { $cl_content = 'portfolio-side cl col-xs-12 col-sm-6 no-padding-r'; } 
  	      ?>
		<!-- Start Content -->
		 <div class="<?php echo esc_attr($cl_content) ?> content mo-blog">
		  <article <?php post_class(); ?>>
			<div class="single-post">
				 <h3 class="post-title color-gradient"><?php the_title(); ?></h3> 
				 <div class="meta-wrap">
					  <ul class="meta-post meta-portfolio">
						<?php if (isset($pixi_options['tb_portfolio_meta_single']) && in_array('date', $pixi_options['tb_portfolio_meta_single'])) {  ?>
						   <li><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
						<?php } ?>
						<?php if (isset($pixi_options['tb_portfolio_meta_single']) && in_array('author', $pixi_options['tb_portfolio_meta_single'])) {  ?>
						  <li><i class="fa fa-user-o"></i><?php echo esc_html__('By ', 'pixi').get_the_author(); ?></li>
						<?php } ?>
						<?php if (isset($pixi_options['tb_portfolio_meta_single']) && in_array('cat', $pixi_options['tb_portfolio_meta_single'])) {  ?>
						   <li><i class="fa fa-folder-open-o"></i><?php the_terms( get_the_ID(), 'project-type' ); ?></li>
						<?php } ?>
						<?php if (isset($pixi_options['tb_portfolio_meta_single']) && in_array('view', $pixi_options['tb_portfolio_meta_single'])) {  ?>
						   <li><i class="fa fa-bookmark-o"></i> <?php echo pixi_get_post_views(get_the_ID()) . esc_html__(' Views', 'pixi'); ?></li>
						<?php } ?>
					 </ul>  
				 </div>
				 <?php if ( function_exists('pixi_like') &&  isset($pixi_options['tb_portfolio_meta_single']) && in_array('like',             $pixi_options['tb_portfolio_meta_single'])) {  ?> <div class="blog_like"><?php echo pixi_like(); ?></div>
				 <?php } ?> 
				 <div class="clearfix"></div> 

				 <?php the_content(); 
					 wp_link_pages(array(
						'before'		   => '<div class="page-links">',
						'after'		       => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
				  )); ?>
					
		         <div class="clearfix"></div> 
				 <?php if (isset($pixi_options['tb_portfolio_meta_single']) && in_array('share', $pixi_options['tb_portfolio_meta_single'])) {  ?>
				      <div class="portfolio_share"><?php echo pixi_post_share_buttons(); ?> </div>
				 <?php } ?>
			    </div>
		     </article>
		</div><!-- End content mo-blog -->
		<?php if ( $tb_portfolio_layout == '2cr' ) { ?>
		   <div class="portfolio-side col-md-6 thumb-content">
			 <?php get_template_part( 'framework/templates/portfolio/portfolio-' . $single_portfolio_style . '-single'); ?>
		   </div>
	   <?php } ?>
	   </div>	<!-- End portfolio-content -->
	    
	   <div class="clearfix"></div> 
	   <?php if($tb_related_portfolio){ ?>
		    <div class="mo-related-portfolio">
			<?php
				$taxterms = wp_get_object_terms( get_the_ID(), 'project-type', array('fields' => 'ids') );
				$args = array(
				'post_type' => 'portfolio',
				'post_status' => 'publish',
				'posts_per_page' => 3, // you may edit this number
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'project-type',
						'field' => 'id',
						'terms' => $taxterms
					)
				),
				'post__not_in' => array (get_the_ID()),
				);
				$related_items = new WP_Query( $args );
				// loop over query
				if ($related_items->have_posts()) :
				?>
			    <div class="related-posts"> 
					<h3 class="title"><?php esc_html_e('Related Posts','pixi'); ?></h3>
					<div class="related-post-inner row">
					<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
					<?php $title=get_the_title();
						  $permalink=get_the_permalink(); global $post; ?>
					  <div class="col-md-4 col-sm-6 col-xs-12">
						<div class="related-post">
							<figure>								   
							   <?php if ( has_post_thumbnail() ) the_post_thumbnail('pixi-small'); ?>
							 </figure>
							<div class="info-post">
								<h6><a href="<?php echo get_the_permalink(); ?>"> <?php the_title(); ?></a></h6>
								<div class="footer-info-post">
									<ul class="meta-post"><li><?php echo esc_html__('By ', 'pixi').get_the_author(); ?></li><li class="space">-</li><li></i><?php the_terms( get_the_ID(), 'project-type'); ?></li></ul>
									<a class="arrow-btn" href="<?php echo get_the_permalink(); ?>"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
								</div>
							</div>
						</div><!-- related-post  -->
					  </div><!-- col -->
					<?php endwhile; ?> 
					</div><!-- row -->
			    </div> <!-- related-posts  -->
				<?php endif;
			    wp_reset_postdata(); ?>
		  </div>
	   <?php } ?>
	  
	   <?php if($tb_portfolio_show_nav ){ ?>
		   <div class="clearfix"></div>
		   <div class="portfolio-directions">
			  <?php echo pixi_post_directions(); ?>
		   </div>
	   <?php } ?>  	
	   
	 <?php endwhile; ?>
	</div>
  </div><!-- End container -->
</div><!-- End main-content -->
<?php get_footer(); ?>