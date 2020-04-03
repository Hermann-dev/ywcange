<?php
/*
Template Name: Left Navigation Template
*/
?>
<?php get_header('left-navigation'); ?>
<?php
global $pixi_options;
$tb_show_page_comment = (int) isset($pixi_options['page_comment']) ?  $pixi_options['page_comment']: 1;
?>
	<div class="main-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php if($tb_show_page_comment){ ?>
				<div class="container">
					<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
				</div>
			<?php } ?>
		<?php endwhile; // end of the loop. ?>
	</div>
<?php get_footer(); ?>