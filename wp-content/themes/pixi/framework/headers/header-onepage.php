<!-- Start Header -->
<header id="header">
	<div id="mo_header" class="mo-header-onepage">
		<!-- Start Header Menu -->
		<div class="container">
			<div class="mo-logo no-padding">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php pixi_logo(); ?>
				</a>
			</div>
		</div>
		<div class="mo-menu">
			<?php
				$attr = array(
					'container_class' => 'mo-menu-list ',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				);
				/* Select menu dynamic */
				$menu_slug = get_post_meta(get_the_ID(),'tb_menu',true);
				if($menu_slug != '' && $menu_slug != 'global') {
					$attr['menu'] = $menu_slug;
				}
				/* Select menu position */
				$menu_class = get_post_meta(get_the_ID(),'tb_menu_positon',true);
				$attr['menu_class'] = 'text-right';
				if($menu_class != '' && $menu_class != 'global') {
					$attr['menu_class'] = $menu_class;
				}
				/* Select theme location */
				$menu_locations = get_nav_menu_locations();
				if (!empty($menu_locations['main_navigation'])) {
					$attr['theme_location'] = 'main_navigation';
				}
				wp_nav_menu( $attr );
			?>
		</div>
		<!-- End Header Menu -->
	</div>
</header>
<!-- End Header -->
