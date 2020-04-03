<?php
$html.='
<div class="masonry-item '.esc_attr($column).' '.esc_attr($term_string).' '.esc_attr($animation_css).'" '.esc_attr($anim_delay).'>
	<div class="masonry-img portfolio-effect2" style="'.esc_attr($portfolio_grid).'">
	   '.$attachment .'
		<div class="overlay"></div>
		<div class="content-block">
			 <a class="portfolio-link '.esc_attr($th_is_lightbox).'" href="'.esc_url($full).'"></a>
			<h4>'.esc_html($title).'</h4>
			<h6 class="read-more">'.esc_attr($term_string).'</h6>
		</div>
	</div>
</div>';