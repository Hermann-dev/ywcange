<!-- Start Header -->
<?php 
	global $pixi_options;
	$class_header = 'mo-header-v4';
	$disable_stick_menu = get_post_meta(get_the_ID(),'tb_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($pixi_options['stick_main_menu_v4']) && $pixi_options['stick_main_menu_v4']) {
			$class_header .= ' mo-header-stick';
		}
	}
?>
<header id="header">
	<div id="mo_header" class="mo-header-fixed <?php echo esc_attr($class_header); ?>">
		<div class="mo-header-top t_motivo hidden-sm hidden-xs">
		  <div class="container">
		     <div class="mo-header-tl col-sm-6 no-padding">
			      <?php 
				   if(isset($pixi_options['menu_other_v4_tl']) AND $pixi_options['menu_other_v4_tl'] !=''): ?>
                   <div class="contact_info"><?php echo wptexturize($pixi_options['menu_other_v4_tl']); ?></div>
                  <?php endif; ?>
			 </div>
			 
			 <div class="mo-header-tr col-sm-6 no-padding">
				   <?php if (isset($pixi_options['menu_other_v4_tr']) && in_array('sidepanel', $pixi_options['menu_other_v4_tr'])) {  ?>
					  <div class="menu-toggle">
						<span class="menu-sm-lines">
							<span class="menu-sm-line"></span>
							<span class="menu-sm-line"></span>
							<span class="menu-sm-line"></span>
						</span>
					  </div>
					<?php } ?>
				   <?php if (isset($pixi_options['menu_other_v4_tr']) && in_array('search', $pixi_options['menu_other_v4_tr'])) {  ?>
					   <div class="mo-search-header">
						  <a class="search-trigger"><i class="icon ion-android-search"></i></a>
					   </div>
				   <?php } ?>
				   <?php if (isset($pixi_options['menu_other_v4_tr']) && in_array('social', $pixi_options['menu_other_v4_tr'])) {  ?>
					<ul class="social-header">
						<?php top_social(); ?>
					</ul> 
				   <?php } ?>
				   <?php if (isset($pixi_options['menu_other_v4_tr']) && in_array('lang', $pixi_options['menu_other_v4_tr'])) {  ?>
					  <?php lang_link(); ?>
				   <?php } ?>
			 </div>
		  </div>
		</div><!-- End Header Top -->
		<div class="mo-header-menu">
			<div class="container">
                    <div id="mo-header-icon" class="mo-header-icon visible-xs visible-sm"><span></span></div>
                    <div class="mo-col-logo">
						<div class="mo-logo">
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<?php pixi_logo(); ?>
							</a>
						</div>
					</div>
				    <div class="menu_other_v4">
					       <?php if (isset($pixi_options['menu_other_v4']) && in_array('sidepanel', $pixi_options['menu_other_v4'])) {  ?>
						      <div class="menu-toggle">
								<span class="menu-sm-lines">
									<span class="menu-sm-line"></span>
									<span class="menu-sm-line"></span>
									<span class="menu-sm-line"></span>
								</span>
						      </div>
						    <?php } ?>
						    
						   <?php if (isset($pixi_options['menu_other_v4']) && in_array('search', $pixi_options['menu_other_v4'])) {  ?>
						       <div class="mo-search-header">
                                  <a class="search-trigger"><i class="icon ion-android-search"></i></a>
                               </div>
                           <?php } ?>
    
						   <?php 
							global $woocommerce;
							if (isset($pixi_options['menu_other_v4']) && in_array('cart', $pixi_options['menu_other_v4']) && class_exists('Woocommerce')) {  ?>
							   <div class="mo_mini_cart">                    
									<div class="mo-cart-header">
									 <a class="mo-icon" href="javascript:void(0)"><i class="icon ion-bag"></i><span class="cart_total"><?php $items_count = $woocommerce->cart->cart_contents_count; echo esc_html($items_count); ?></span></a>
								</div>
									<div class="mo-cart-content">
									   <h6><?php echo esc_html__('MY SHOPPING CART', 'pixi'); ?></h6>
									   <div class="widget_shopping_cart_content"></div>
									</div>
								</div>
							<?php } ?>
	                        
	                       <?php if (isset($pixi_options['menu_other_v4']) && in_array('social', $pixi_options['menu_other_v4'])) {  ?>
						    <ul class="social-header-v4">
								<?php top_social(); ?>
							</ul> 
					       <?php } ?>
                        
	                       <?php if (isset($pixi_options['menu_other_v4']) && in_array('lang', $pixi_options['menu_other_v4'])) {  ?>
						      <?php lang_link(); ?>
							<?php } ?>
					    
						    <?php if (isset($pixi_options['menu_other_v4']) && in_array('button', $pixi_options['menu_other_v4'])) {  
	                        if(isset($pixi_options['menu_other_but_v4']) AND $pixi_options['menu_other_but_v4'] !=''): ?>
			                     <a class="btn-nav" href="<?php echo esc_url($pixi_options['menu_other_but_link_v4']);?>"><?php echo esc_html($pixi_options['menu_other_but_v4']);?></a>
			                 <?php endif; } ?>
                       </div> <!-- End menu_other_v5 -->
					<div class="mo-col-menu">
						<?php
							$attr = array(
								'container_class' => 'mo-menu-list motivo_cc hidden-xs hidden-sm ',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							);
							/* Select menu dynamic */
							$menu_slug = get_post_meta(get_the_ID(),'tb_menu',true);
							if($menu_slug != '' && $menu_slug != 'global') {
								$attr['menu'] = $menu_slug;
							}
							/* Select menu position */
							$menu_class = get_post_meta(get_the_ID(),'tb_menu_positon',true);
							$attr['menu_class'] = 'text-center';
							if($menu_class != '' && $menu_class != 'global') {
								$attr['menu_class'] = $menu_class;
							}
							/* Select theme location */
							$menu_locations = get_nav_menu_locations();
							if (!empty($menu_locations['main_navigation'])) {
								$attr['theme_location'] = 'main_navigation';
								wp_nav_menu( $attr );
							} else {
								$attr = array(
									'menu_class'  => 'menu mo-menu-list text-center',
								);
								wp_page_menu($attr);
							} ?>
                    </div>
            </div>    
		</div><!-- End mo-header-menu -->
    </div><!-- End mo_header -->
</header>

<div class="sidepanel">
    <a id="menu-close" href="#" class="close-btn"><span></span></a>
    <div class="sidepanel-content"> 
    <?php if (is_active_sidebar("pixi-sidepanel-header")) { 
		  dynamic_sidebar("pixi-sidepanel-header"); 
	} ?>
    </div>
</div> 
<div class="sidepanel-overlay"></div>
<!-- End sidepanel -->

<div class="main-search">
    <div class="main-search-overlay"></div>
    <div class="main-search-container">
        <div class="main-search-close">
            <span></span>
        </div>
        <div class="main-search-content">
            <?php get_search_form(); ?>
        </div>
    </div>
</div> <!-- End main-search -->