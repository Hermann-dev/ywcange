<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
	global $pixi_options;
	if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
			<link rel="shortcut icon" href="<?php $favicon=$pixi_options["favicon"]; echo esc_url($favicon['url']); ?>" type="image/x-icon">
	<?php } 
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper wrapper-left-navigation">
	<?php
    $page_loader = (isset($pixi_options["page_loader"])&&$pixi_options["page_loader"])?$pixi_options["page_loader"]: false;
	if($page_loader) echo ' 
	  <div class="loader-wrap">
         <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
         </div>
         <p>'. esc_html__( 'loading...', 'pixi' ) .'</p>
       </div>'; ?>
		<!-- Start Header -->
		<?php $class_header = 'mo-left-navigation';	?>
		<header class="mo-wrapper-leftnav">
			<div id="mo_header" class="<?php echo esc_attr($class_header); ?>"><!-- mo-header-stick/mo-header-fixed -->
				<!-- Start Header Menu -->
				<div class="mo-header-menu">
					<div class="mo-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<?php pixi_logo(); ?>
						</a>
					</div>
                    <div class="scroll-pane">
					<?php
						$attr = array(
							'container_class' => 'mo-menu-list',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
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
                   
                    <?php $switch_header_social_lnav =& $pixi_options["switch_social_lnav"];
                    if($switch_header_social_lnav == 1){ ?>
                    <ul class="nav social-header-lnav hidden-sm hidden-xs">
						 <?php if(isset($pixi_options['facebook_url']) AND $pixi_options['facebook_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($pixi_options['facebook_url']);?>" title="<?php echo esc_attr_e('facebook','pixi'); ?>" ><i class="fa fa-facebook"></i></a></li>
						 <?php endif; 
						  if(isset($pixi_options['twitter_url']) AND $pixi_options['twitter_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($pixi_options['twitter_url']);?>"  title="<?php echo esc_attr_e('twitter','pixi'); ?>"><i class="fa fa-twitter"></i></a></li>
						 <?php endif; 
						  if(isset($pixi_options['linkedin_url']) AND $pixi_options['linkedin_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($pixi_options['linkedin_url']);?>" title="<?php echo esc_attr_e('linkedin','pixi'); ?>"><i class="fa fa-linkedin"></i></a></li>
						 <?php endif; 
						 if(isset($pixi_options['youtube_url']) AND $pixi_options['youtube_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($pixi_options['youtube_url']);?>" title="<?php echo esc_attr_e('youtube','pixi'); ?>"><i class="fa fa-youtube"></i></a></li>
						 <?php endif; 
						 if(isset($pixi_options['instagram_url']) AND $pixi_options['instagram_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($pixi_options['instagram_url']);?>" title="<?php echo esc_attr_e('instagram','pixi'); ?>"><i class="fa fa-instagram"></i></a></li>
						 <?php endif;
						 if(isset($pixi_options['pinterest_url']) AND $pixi_options['pinterest_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($pixi_options['pinterest_url']);?>" title="<?php echo esc_attr_e('pinterest','pixi'); ?>"><i class="fa fa-pinterest"></i></a></li>
						 <?php endif; ?>    
                    </ul>
                   <?php } ?>
                   
                   <?php if(isset($pixi_options['copyright_txt_lnav']) AND $pixi_options['copyright_txt_lnav'] !=''): ?>
					   <div class="copyright_txt_lnav hidden-sm hidden-xs"><?php echo wptexturize($pixi_options['copyright_txt_lnav']);?></div>
				  <?php endif; ?>
				</div>
				<!-- End Header Menu -->
			</div>
		</header>