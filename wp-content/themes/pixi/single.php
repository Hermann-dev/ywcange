<?php get_header(); 
global $pixi_options;
$tb_post_layout = isset($pixi_options['tb_post_layout']) ? $pixi_options['tb_post_layout'] : '1col';
$tb_post_header_layout = isset($pixi_options['tb_post_header_layout']) ? $pixi_options['tb_post_header_layout'] : 'basic';
$tb_show_page_title = isset($pixi_options['tb_page_show_page_title']) ? $pixi_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($pixi_options['tb_post_show_breadcrumb']) ? $pixi_options['tb_post_show_breadcrumb'] : 1;
$tb_post_show_nav = (int) isset($pixi_options['tb_post_show_nav'])? $pixi_options['tb_post_show_nav']: 1;
$tb_post_show_author = (int) isset($pixi_options['tb_post_show_author']) ? $pixi_options['tb_post_show_author'] : 1;
$tb_related_post = (int) isset($pixi_options['tb_related_post']) ? $pixi_options['tb_related_post'] : 1;
$tb_post_show_comment = (int) isset($pixi_options['tb_post_show_comment']) ? $pixi_options['tb_post_show_comment']: 1; 
$cl_content ='col-xs-12 col-sm-12 col-md-12 col-lg-12';
?>
<div class="main-content">
	<div class="mo-media <?php echo get_post_format(); ?>">
	 <?php while ( have_posts() ) : the_post(); ?>
	
		
	    <?php if ( $tb_post_header_layout == 'img_overlay' ) { get_template_part( 'framework/templates/blog_single/entry', get_post_format());  } ?>
	    <?php if ( $tb_post_layout == '1col' ) { 
	       if ( $tb_post_header_layout == 'basic' ) { get_template_part( 'framework/templates/blog_single_basic/entry', get_post_format());  } 
        } ?>
	    <div class="container mo-blog-article">
		 <?php if ( is_active_sidebar('pixi-main-sidebar') || is_active_sidebar('pixi-left-sidebar') || is_active_sidebar('pixi-right-sidebar') ) {
		  if ( $tb_post_layout == '2cl' || $tb_post_layout == '2cr' ){
			  $cl_content = 'with-sidebar';
		   }
		 } ?>
		<!-- Start Left Sidebar -->
		<?php if ( $tb_post_layout == '2cl' ) { ?>
	       <?php if ( $tb_post_header_layout == 'basic' ) {?><div class="basic-sidebar"><?php }?>
		   <?php if (is_active_sidebar('pixi-left-sidebar')) { ?><div class="sidebar sidebar-left"><?php dynamic_sidebar('pixi-left-sidebar'); ?></div>
		   <?php }elseif(is_active_sidebar('pixi-main-sidebar')){?><div class="sidebar sidebar-left"><?php dynamic_sidebar('pixi-main-sidebar');?></div><?php }?>
		   <?php if ( $tb_post_header_layout == 'basic' ) {?></div><?php }?>
		<?php } ?>
		<!-- End Left Sidebar -->
						
		<!-- Start Content -->
		<div class="<?php echo esc_attr($cl_content) ?> content mo-blog">
			  <article <?php post_class(); ?>>
				<div class="mo-post-item">
				<div class="single-post entry-content">
				   <div class="sticky-buttons">
					 <?php if ( isset($pixi_options['post-meta-single'])) { 
					   if (is_array($pixi_options['post-meta-single'])) {
						 if ( in_array('like', $pixi_options['post-meta-single'], true)) {
							?> <div class="blog_like"><?php if( function_exists('pixi_like') ) pixi_like(); ?> </div> <?php
						 }
					   }
				     } ?>
						   
					 <?php if (function_exists('pixi_post_share_buttons') && isset($pixi_options['post_share'])) { 
	                  if (is_array($pixi_options['post_share'])) {
						 if ( in_array('sticky', $pixi_options['post_share'], true)) {
							echo pixi_post_share_buttons();
						 }
					   }
                    } ?>
				   </div>
					<?php the_content(); 
					 wp_link_pages(array(
						'before'		   => '<div class="page-links">',
						'after'		       => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
					)); ?>
					<div class="clearfix"></div> 
					
					<div class="row">  
					  <div class="col-md-6 col-xs-12">
					    <?php if ( isset($pixi_options['post-meta-single'])) { 
						  if (is_array($pixi_options['post-meta-single'])) {
							 if ( in_array('tag', $pixi_options['post-meta-single'], true)) {
								?>  <div class="tags"> <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?></div> <?php
							 }
						   }
					   } ?>
					   </div>
					   <div class="col-md-6 col-xs-12">
					   <?php if (function_exists('pixi_post_share_buttons') && isset($pixi_options['post_share'])) { 
						  if (is_array($pixi_options['post_share'])) {
							 if ( in_array('basic', $pixi_options['post_share'], true)) {
								echo pixi_post_share_buttons();
							 }
						   }
					   } ?>
					  </div>
					</div>
			      </div>
			    </div>
			  </article>
			  
			  <div class="clearfix"></div>
			  <?php if ( function_exists('pixi_post_author_bio') && $tb_post_show_author ) { pixi_post_author_bio(); } ?>
			  
			  <div class="clearfix"></div>
			  <?php if ( $tb_related_post ) { pixi_related_post(); }  ?>
			  
			 <?php if ( (comments_open() && $tb_post_show_comment) || (get_comments_number() && $tb_post_show_comment) ) { ?>
			     <div class="clearfix"></div>
				 <div class="single-comments">
					<?php comments_template(); ?>
				 </div>
			 <?php }?>

			 <?php if ( $tb_post_show_nav ){ ?>
			   <div class="clearfix"></div>
			   <div class="single-directions"><?php pixi_post_directions();?></div> 
	         <?php } ?>
		</div><!-- End content mo-blog -->
        
	    <!-- Start Right Sidebar -->
		  <?php if ( $tb_post_layout == '2cr' ) { ?>
	        <?php if ( $tb_post_header_layout == 'basic' ) {?><div class="basic-sidebar"><?php }?>
            <?php if (is_active_sidebar('pixi-right-sidebar')) { ?><div class="sidebar sidebar-right"><?php dynamic_sidebar('pixi-right-sidebar'); ?></div>
		    <?php } elseif(is_active_sidebar('pixi-main-sidebar')){?><div class="sidebar sidebar-right"><?php dynamic_sidebar('pixi-main-sidebar');?></div><?php } ?>
		    <?php if ( $tb_post_header_layout == 'basic' ) {?></div><?php }?>
		 <?php } ?>
	    <!-- End Right Sidebar -->
	 <?php endwhile; ?>
			 
    </div><!-- End container -->
  </div><!-- End mo-media -->
</div><!-- End main-content -->
<?php get_footer(); ?>