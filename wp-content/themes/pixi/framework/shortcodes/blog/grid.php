<?php global $pixi_options; 
$id = get_the_ID();
$terms = wp_get_object_terms($id, 'category');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="grid-mid-post <?php echo esc_attr($animation_css); ?>" <?php echo esc_attr($anim_delay); ?>>
	<?php
		$media_output = '';
		$format = get_post_format() ? get_post_format() : 'standard';
		switch ($format) {
				
			case 'gallery':
				$media_output = '';
				$attachment_ids = array();
				$attachment_ids = get_post_meta(get_the_ID(), 'mo_portfolio_gallery', true);
				if(!empty($attachment_ids)) {
					$date = time() . '_' . uniqid(true);
					$media_output .= '<div id="carousel-generic'.esc_attr($date).'" class="carousel-post dots-nav-dark" >';
					foreach($attachment_ids as $attachment_id ) {
						$image_attributes = wp_get_attachment_image_src($attachment_id, 'pixi-small');
						if($image_attributes[0]){
							$media_output .= '<div class="item">
											  <figure>
												<img src="'.esc_url($image_attributes[0]).'" alt="'.the_title_attribute('echo=0').'" height="260"/>
											   </figure>
											</div>';
						}
					}
					$media_output .= '</div>';
					$media_output .= '
					<div class="info-post">
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. pixi_custom_excerpt($excerpt_lenght) .'</p>
						<div class="footer-info-post">
							<ul class="meta-post">
							   <li><i class="fa fa-user-o"></i>'.esc_html__('By ', 'pixi').' '.get_the_author().'</li>
							   <li><i class="fa fa-clock-o"></i>'.get_the_date().'</li>
							 </ul>
							<a class="arrow-btn" href="'.get_the_permalink().'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
						</div>
					</div>';
				 }
			break;
				
			case 'video':
				$media_output = '';
				$video_url = get_post_meta(get_the_ID(), 'tb_post_video_url', true);
				if (has_post_thumbnail()) {
					$media_output .= '
					<figure>
					  '.get_the_post_thumbnail(get_the_ID(), "pixi-small").'
					  <figcaption>
						<a class="video-button lightbox-video" href="'.esc_url($video_url).'"><i class="video-icon"></i></a>
					  </figcaption>
					</figure>';	
					$media_output .= '
					<div class="info-post">
						<a class="cat-name hover_shine" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. pixi_custom_excerpt($excerpt_lenght) .'</p>
						<div class="footer-info-post">
							<ul class="meta-post">
							   <li><i class="fa fa-user-o"></i>'.esc_html__('By ', 'pixi').' '.get_the_author().'</li>
							   <li><i class="fa fa-clock-o"></i>'.get_the_date().'</li>
							 </ul>
							<a class="arrow-btn" href="'.get_the_permalink().'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
						</div>
					</div>';
				}
				else {
					$media_output .= ' 
					<div class="embed-responsive embed-responsive-16by9">
						<iframe id="vimeo-video" src="'.esc_url($video_url).'"></iframe>
					</div>';
					$media_output .= '
					<div class="info-post">
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. pixi_custom_excerpt($excerpt_lenght) .'</p>
						<div class="footer-info-post">
							<ul class="meta-post">
							   <li><i class="fa fa-user-o"></i>'.esc_html__('By ', 'pixi').' '.get_the_author().'</li>
							   <li><i class="fa fa-clock-o"></i>'.get_the_date().'</li>
							 </ul>
							<a class="arrow-btn" href="'.get_the_permalink().'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
						</div>
					</div>';
				}
			break;
				
			case 'quote':
				$media_output = '';
				$quote_content = get_post_meta(get_the_ID(), 'tb_post_quote', true);
				if($quote_content) {
					$media_output .= '
					<figure>
					   <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "pixi-small").'</a>
						<div class="blockquote-post">
						   <blockquote>'.esc_html($quote_content).'</blockquote>
						</div>
					</figure>';
					$media_output .= '
					<div class="info-post">
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. pixi_custom_excerpt($excerpt_lenght) .'</p>
						<div class="footer-info-post">
							<ul class="meta-post">
							   <li><i class="fa fa-user-o"></i>'.esc_html__('By ', 'pixi').' '.get_the_author().'</li>
							   <li><i class="fa fa-clock-o"></i>'.get_the_date().'</li>
							 </ul>
							<a class="arrow-btn" href="'.get_the_permalink().'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
						</div>
					</div>';	
				}
			break;
				
			case 'audio':
				$media_output = '';
				$audio_source_from = get_post_meta(get_the_ID(), 'tb_audio_type', true);
				$audio_type = get_post_meta(get_the_ID(), 'tb_post_audio_type', true);
				$audio_url = get_post_meta(get_the_ID(), 'tb_post_audio_url', true);
				
				if($audio_source_from == 'soundcloud') {
					if (has_post_thumbnail()) {
					$media_output = '
						<figure>
						   <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "pixi-small").'</a>
						   <div class="audio-post">
							  <div class="embed-responsive embed-responsive-16by9">'. get_post_meta(get_the_ID(), 'tb_post_audio_iframe', true).'</div> 
						   </div>
						</figure>';			
					} else{
						$media_output .= '<div class="empty_thumbnail"></div>';
					}
					$media_output .= '
					<div class="info-post">
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. pixi_custom_excerpt($excerpt_lenght) .'</p>
						<div class="footer-info-post">
							<ul class="meta-post">
							   <li><i class="fa fa-user-o"></i>'.esc_html__('By ', 'pixi').' '.get_the_author().'</li>
							   <li><i class="fa fa-clock-o"></i>'.get_the_date().'</li>
							 </ul>
							<a class="arrow-btn" href="'.get_the_permalink().'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
						</div>
					</div>';	
				} else {
					$media_output .= '<figure><a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "pixi-small").'</a>';
					if($audio_url) {
					   $media_output .= '<div class="audio-post">'. do_shortcode('[audio '.esc_html($audio_type).'="'.esc_url($audio_url).'"][/audio]') .'</div>';
					}
					$media_output .= '</figure>';
					$media_output .= '
					<div class="info-post">
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. pixi_custom_excerpt($excerpt_lenght) .'</p>
						<div class="footer-info-post">
							<ul class="meta-post">
							   <li><i class="fa fa-user-o"></i>'.esc_html__('By ', 'pixi').' '.get_the_author().'</li>
							   <li><i class="fa fa-clock-o"></i>'.get_the_date().'</li>
							 </ul>
							<a class="arrow-btn" href="'.get_the_permalink().'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
						</div>
					</div>';				
				} 
			break;
				
			case 'link':
				$media_output = '';
				$link = get_post_meta(get_the_ID(), 'tb_post_link', true);
				$media_output .= '
				<figure><a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "pixi-small").'</a>';		
                if($link) { $media_output .= '<a class="mo-link" href="'.esc_url($link).'">'.esc_html($link).'</a>'; }
				$media_output .= '</figure>';		
				$media_output .= '
					<div class="info-post">
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. pixi_custom_excerpt($excerpt_lenght) .'</p>
						<div class="footer-info-post">
							<ul class="meta-post">
							   <li><i class="fa fa-user-o"></i>'.esc_html__('By ', 'pixi').' '.get_the_author().'</li>
							   <li><i class="fa fa-clock-o"></i>'.get_the_date().'</li>
							 </ul>
							<a class="arrow-btn" href="'.get_the_permalink().'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
						</div>
					</div>';					
			break;
				
			default:
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
						<ul class="meta-post">
						   <li><i class="fa fa-user-o"></i>'.esc_html__('By ', 'pixi').' '.get_the_author().'</li>
						   <li><i class="fa fa-clock-o"></i>'.get_the_date().'</li>
						 </ul>
						<a class="arrow-btn" href="'.get_the_permalink().'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8" enable-background="new 0 0 18.5 8"><line class="st0 line" x1="17.4" y1="4" x2="0" y2="4"></line><line class="st0 " x1="18" y1="4.5" x2="14" y2="0.5"></line><line class="st0" x1="14" y1="7.5" x2="18" y2="3.5"></line></svg> </a>
					</div>
				</div>';					
				break;
		}
		echo '<div class="format-post">'.$media_output.'</div>'?>
   </div>
</article>