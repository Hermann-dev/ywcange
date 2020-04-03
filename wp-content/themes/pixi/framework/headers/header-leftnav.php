<!-- Start Header -->
<?php 
	//global $pixi_options;
	$class_header = 'mo-left-navigation';
?>
<div class="mo-wrapper-leftnav">
    <header>
        <div id="mo_header" class="<?php echo esc_attr($class_header); ?>">
            <!-- Start Header Menu -->
            <div class="mo-header-menu">
                <div class="mo-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php pixi_logo(); ?>
                    </a>
                </div>
                <?php
                    $attr = array(
                        'container_class' => 'mo-menu-list',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    );
                    /* Select menu dynamic */
                    $menu_slug = get_post_meta(get_the_ID(),'tb_menu',true);
                    if($menu_slug != '' && $menu_slug != 'global') {
                        $attr['menu'] = $menu_slug;
                    }
                    /* Select menu position */
                    $menu_class = get_post_meta(get_the_ID(),'tb_menu_positon',true);
                    $attr['menu_class'] = 'text-left';
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
</div>
