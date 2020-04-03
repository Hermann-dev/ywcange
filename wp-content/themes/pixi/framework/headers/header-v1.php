<!-- Start Header -->
<?php 
	global $pixi_options;
	$class_header = 'mo-sidepanel';
	if(isset($pixi_options['fixed_main_menu_v1']) && $pixi_options['fixed_main_menu_v1']) {
		$class_header .= ' mo-header-fixed';
	}
	$layout_menu_v1 =& $pixi_options["layout_menu_v1"];
    if ( $layout_menu_v1 == 'boxed' ){
		$classes[] = 'right';
      } else {
		$classes[] = 'left';
	}
?>
<header id="header">
      <div id="mo_header" class="mo-header-v1 mo-header-fixed left <?php echo esc_attr($class_header); ?> <?php echo esc_attr($layout_menu_v1); ?>">
            <div class="menu-toggle">
                <div class="logo"> 
				   <a href="<?php echo esc_url(home_url('/')); ?>">
					 <?php pixi_logo(); ?>
				   </a>
				</div><!-- End logo -->
             
              <div class="menu-lines">
				<span class="menu-sm-lines">
					<span class="menu-sm-line"></span>
					<span class="menu-sm-line"></span>
					<span class="menu-sm-line"></span>
				</span>
              </div>
              
              <?php if(isset($pixi_options['text_v1']) AND $pixi_options['text_v1'] !='') { ?>
			      <h6 class="text_v1 hidden-sm hidden-xs"> <?php echo wptexturize($pixi_options['text_v1']);?></h6>
			  <?php } ?>
              <?php $switch_header_social_v1 =& $pixi_options["switch_social_v1"];
                if($switch_header_social_v1 == 1){ ?>
                   <div class="social-sidepanel hidden-sm hidden-xs">
                     <ul class="nav">
                       <?php top_social(); ?>
				     </ul>
                    </div>
              <?php } ?>
            </div><!-- End menu-toggle -->
       </div><!-- End mo-header-v1 -->
      <div class="mo-sidepanel-v1 sidepanel left <?php echo esc_attr($layout_menu_v1); ?>">
           <a id="menu-close" href="#" class="close-btn"><span></span></a>
            <nav class="sidepanel-content">
               <?php
                $attr = array(
                    'container_class' => 'nav-sidepanel',
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
                        'menu_class'  => 'menu mo-menu-list',
                    );
                    wp_page_menu($attr);
                }
            ?>
            </nav>
      </div>
</header>
<div class="sidepanel-overlay"></div>
