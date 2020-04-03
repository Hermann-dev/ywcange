<?php global $pixi_options; 
$id = get_the_ID();
$terms = wp_get_object_terms($id, 'category');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="grid-carousel-post">
	<?php
		$media_output = '';
				if (has_post_thumbnail()) {
				$media_output = '
					<figure>
					   <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "pixi-small").'</a>
					</figure>';			
				} else{
					$media_output .= '<div class="empty_thumbnail"></div>';
				}
				$media_output .= '
				<div class="info-post">
					<a class="cat-name hover_shine" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>
					<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
					<p>'. pixi_custom_excerpt($excerpt_lenght) .'</p>
					<div class="footer-info-post">
						<ul class="meta-post"><li>'.get_the_author().'</li><li class="space">-</li><li>'.get_the_date().'</li></ul>
						<a class="arrow-btn" href="'.get_the_permalink().'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
					</div>
				</div>';
		 echo '<div class="format-post">'.$media_output.'</div>' ?>
   </div>
</article>