<?php
$html.= '
<div class="masonry-item '.esc_attr($column).' '.esc_attr($term_string).'  '.esc_attr($animation_css).'" '.esc_attr($anim_delay).'>
  <div class="masonry-img work-img" style="'.esc_attr($portfolio_grid).'">
   <div class="portfolio-effect4 img-perspective">
		'.$attachment .'
		<div class="perspective-caption">
			<div class="overlay-inner">
				<h5>'.esc_html($title).'</h5>
				<p class="term">'.esc_attr($term_string).'</p>
			</div>
			<a class="portfolio-link '.esc_attr($th_is_lightbox).'" data-title="'.esc_attr($title).'" href="'.esc_url($full).'">
				<div class="circle-btn"><span></span><svg x="0px" y="0px" width="50px" height="50px" viewBox="0 0 54 54"><circle fill="transparent" stroke="#656e79" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle></svg></div>
			</a>	
		</div>
	</div>
  </div>
</div>';?>