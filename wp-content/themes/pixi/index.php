<?php get_header(); 
global $pixi_options;
$tb_blog_layout = isset($pixi_options['tb_blog_layout']) ? $pixi_options['tb_blog_layout'] : '2cr';
$tb_show_page_title = isset($pixi_options['tb_page_show_page_title']) ? $pixi_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($pixi_options['tb_page_show_page_breadcrumb']) ? $pixi_options['tb_page_show_page_breadcrumb'] : 0;
$tb_archive_title_bar = (int) isset($pixi_options['tb_archive_title_bar'])? $pixi_options['tb_archive_title_bar']: 0;
$cl_content ='col-xs-12 col-sm-12 col-md-12 col-lg-12';
?>
<div class="main-content">
    <?php if ( $tb_archive_title_bar ){ 
	  pixi_title_bar($tb_show_page_title, $tb_show_page_breadcrumb); 
   } else { ?>
	 <div class="no-pagetitle">
	  	 <div class="mo-blog-archive container">
	  	   <h2 class="mo-page_title color-main"><?php echo pixi_page_title(); ?></h2> 
        </div>
	  </div>
   <?php } ?>
	 <div class="single-content">
	   <div class="mo-blog-archive container">
            
				<?php if ( is_active_sidebar('pixi-main-sidebar') || is_active_sidebar('pixi-left-sidebar') || is_active_sidebar('pixi-right-sidebar') ) {
				  if ( $tb_blog_layout == '2cl' || $tb_blog_layout == '2cr' ){
					  $cl_content = 'with-sidebar';
				   }
				 } ?>
				
               <!-- Start Left Sidebar -->
				<?php if ( $tb_blog_layout == '2cl' ) { ?>
				   <?php if (is_active_sidebar('pixi-left-sidebar')) { ?><div class="sidebar sidebar-left"><?php dynamic_sidebar('pixi-left-sidebar'); ?></div>
                   <?php }elseif(is_active_sidebar('pixi-main-sidebar')){?><div class="sidebar sidebar-left"><?php dynamic_sidebar('pixi-main-sidebar');?></div><?php }?>
				<?php } ?>
				<!-- End Left Sidebar -->
               
                 <!-- Start Content -->
				<div class="<?php echo esc_attr($cl_content) ?> content mo-blog">
				   <div class="posts grid-posts">
					<?php
					if( have_posts() ) {
						while ( have_posts() ) : the_post();?>
						 <div class="grid-post col-xs-12 col-sm-12">  
						      <div <?php post_class(); ?>> 
								<div class="post-content"> 
									<div class="info-post">
									 	<?php $categories = get_the_category( get_the_ID() ); ?>
									 	<div class="cat-name bg-gradient hover_shine"><a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?> "><?php echo esc_html( $categories[0]->name ) ?></a></div>
										<h3 class="post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
										<p><?php the_excerpt(); ?></p>
										<div class="footer-info-post">
									    	<ul class="meta-post">
												<li><i class="fa fa-user-o"></i><?php the_author(); ?></li>
												<li><i class="fa fa-clock-o"></i><?php the_date(); ?></li>
												 <li><i class="fa fa-comments-o"></i><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); echo esc_html__(' Comment', 'pixi'); ?></a></li> 
									    	</ul>
											<a class="arrow-btn" href="<?php the_permalink(); ?>"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
										</div>
								    </div>
								</div>
							  </div>
							</div>
						<?php endwhile; 
					    } else {
							get_template_part( 'framework/templates/entry', 'none');
						} ?>
		                </div><!-- posts -->
		                 <div class="clearfix"></div>
					     <?php pixi_paging_nav(); ?>
				   </div>
				<!-- End Content -->
				
             <!-- Start Right Sidebar -->
			 <?php if ( $tb_blog_layout == '2cr' ) { ?>
			   <?php if (is_active_sidebar('pixi-right-sidebar')) { ?><div class="sidebar sidebar-right"><?php dynamic_sidebar('pixi-right-sidebar'); ?></div>
			   <?php }elseif(is_active_sidebar('pixi-main-sidebar')){?><div class="sidebar sidebar-right"><?php dynamic_sidebar('pixi-main-sidebar');?></div><?php }?>
			 <?php } ?>
			 <!-- End Right Sidebar -->
      
       </div> <!-- End container -->
   </div> <!-- End single-content -->
</div> <!-- End main-content -->
<?php get_footer(); ?>