<?php
/*
Template Name: 404 Template
*/
get_header(); 
global $pixi_options;
$tb_show_page_title = isset($pixi_options['tb_page_show_page_title']) ? $pixi_options['tb_page_show_page_title'] : 1; ?>
<div class="main-content"> 
	<div class="page-404">
		<div class="container">
			<div class="text-center">
				<h1 class="lrg"><?php echo esc_html__( '404 ', 'pixi' ); ?>:'( </h1>
				<h4><?php echo esc_html__( 'Oops! That page can’t be found.', 'pixi' ); ?></h4>
				<p><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'pixi' ); ?></p>
				<div class="search-content">
					<?php get_search_form(); ?>
				</div>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="button light hr_light bg_gradient bg_hr_gradient slide"><?php echo esc_html__('Back to Home Page', 'pixi'); ?><i class="ion-arrow-right-c"></i></a>
			</div>
		</div>
	</div>
</div>    
<a href="#" id="back-to-top" class="progress coming-soon-totop" data-tooltip="<?php echo esc_attr__('Back To Top', 'pixi'); ?>" >
	  <div class="arrow-top"></div>
	  <div class="arrow-top-line"></div>
	  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet">
	  <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>
</a>
<?php wp_footer(); ?>
</div><!-- wrapper  -->
</body>