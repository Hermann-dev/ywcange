<div id="tb-blog-metabox" class='tb_metabox' style="display: none;">
	<div id="tb-tab-blog" class='categorydiv'>
		<ul class='category-tabs'>
		   <li class='tb-tab'><a href="#tabs-general"><i class="dashicons dashicons-admin-generic"></i> <?php echo esc_html_e('GENERAL','pixi');?></a></li>
		   <li class='tb-tab'><a href="#tabs-header"><i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('HEADER','pixi');?></a></li>
		   <li class='tb-tab'><a href="#tabs-titlebar"><i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('TITLEBAR','pixi');?></a></li>
		   <li class='tb-tab'><a href="#tabs-footer"><i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('FOOTER','pixi');?></a></li>
		</ul>
		<div class='tb-tabs-panel'>
			<div id="tabs-general">
				<?php
					$body_layout = array('global' => 'Global', 'boxed' => 'Boxed' , 'wide' => 'Wide' , 'lines' => 'lines');
					$this->select('body_layout',
							'Body Layout',
							$body_layout,
							'',
							'',
							''
					);
				?>
				<?php
					$this->picker('body_background',
							'Body Background',
							''
					);
				?>
			</div>
			
			<div id="tabs-header">
				<p class="tb_info tb-title-mb"><i class="dashicons dashicons-admin-tools"></i><?php echo esc_html_e('Manage Header','pixi'); ?></p>
				<?php
				   $headers = array('global' => 'Global', 'sidepanel' => 'Header V1','header-v2' => 'Header V2', 'header-v3' => 'Header V3', 'header-v4' => 'Header V4', 'header-v5' => 'Header V5', 'header-v6' => 'Header V6','header-onepage' => 'Header One Page');

					$this->select('header',
							'Select Header',
							$headers,
							'',
							''
					);
				?>
				<p class="tb_info tb-title-mb"><i class="dashicons dashicons-admin-tools"></i><?php echo esc_html_e('Manage Logo','pixi'); ?></p>
				<?php
					$this->upload('logo',
							'Logo',
							''
					);
				?>
				<p class="tb_info tb-title-mb"><i class="dashicons dashicons-admin-tools"></i><?php echo esc_html_e('Manage Menu','pixi'); ?></p>
				<?php
					$menus = array();
					$menus_obj = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
					$menus['global'] = 'Global';
					foreach ( $menus_obj as $menu_obj ) {
						$menus[$menu_obj->slug] = $menu_obj->name;
					}
					$this->select('menu',
							'Select Menu',
							$menus,
							'',
							''
					);
					$menu_positon = array('global' => 'Global', 'text-left' => 'Align Left','text-center' => 'Align Center','text-right' => 'Align Right');
					$this->select('menu_positon',
							'Select Position',
							$menu_positon,
							'',
							''
					);
					$this->checkbox('disable_stick_menu',
							'Disable Stick Menu',
							'off',
							'',
							''
					);
				?>
			</div>
			
			<div id="tabs-titlebar">
				<?php
					$this->upload('bg_title_bar', 'Background');
				    $page_title = array('global' => 'Global', 'pagetitle-v1' => 'No page title', 'pagetitle-v2' => 'Page title V2' ,'pagetitle-v3' => 'Page title V3', 'pagetitle-v4' => 'Page title V4', 'pagetitle-v5' => 'Page title V5');
					$this->select('page_title',
							'Select page title',
							$page_title,
							'',
							''
					);
				?>
			</div>
			
			<div id="tabs-footer">
				<?php
					$footers = array('global' => 'Global',  'footer-v0' => 'No footer', 'footer-v1' => 'Footer V1', 'footer-v2' => 'Footer V2' ,'footer-v3' => 'Footer V3' ,'footer-v4' => 'Footer V4', 'footer-v5' => 'Footer V5' );
					$this->select('footer',
							'Select Footer',
							$footers,
							'',
							''
					);
				?>
			</div>
		</div>
	</div>
</div>