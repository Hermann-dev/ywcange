<?php
/*-----------------------------------------------*
  testimonial Post Type
/*-----------------------------------------------*/
add_action('init', 'th_testimonial_register');  

function th_testimonial_register() {
	$labels = array(
        'name'               => esc_html__( 'Testimonials' , 'pixi' ),
        'singular_name'      => esc_html__( 'Testimonials' , 'pixi' ),
        'add_new'            => esc_html__( 'Add New' , 'pixi' ),
        'add_new_item'       => esc_html__( 'Add New Testimonial item' , 'pixi' ),
        'edit_item'          => esc_html__( 'Edit Testimonial item' , 'pixi' ),
        'new_item'           => esc_html__( 'New Testimonial item' , 'pixi' ),
        'all_items'          => esc_html__( 'All Testimonial items' , 'pixi' ),
        'view_item'          => esc_html__( 'View Testimonial item' , 'pixi' ),
        'search_items'       => esc_html__( 'Search Testimonial item' , 'pixi' ),
        'not_found'          => esc_html__( 'No products found' , 'pixi' ),
        'not_found_in_trash' => esc_html__( 'No products found in the Trash' , 'pixi' ),
        'parent_item_colon'  => '',
        'menu_name'          => esc_html__('Testimonials','pixi')
    );
    $args = array(
        'labels'    => $labels,
		'menu_icon' => 'dashicons-megaphone',
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'supports' => array('title','thumbnail')
       );  
    register_post_type( 'testimonials' , $args );
	register_taxonomy(
    	"testimonials-type", 
    	array("testimonials"), 
    	array(
    		"hierarchical" => true, 
    		"context" => "normal", 
    		'show_ui' => true,
    		"label" => "testimonial Categories", 
    		"singular_label" => "team Category", 
    		"rewrite" => true
    	)
    );
}
add_action("admin_init", "th_testimonial_title_settings");  

function th_testimonial_title_settings(){
    add_meta_box("testimonial_title_settings", "Testimonial", "th_testimonial_title_config", "testimonials", "normal", "high");
}   
function th_testimonial_title_config(){
        global $post;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);
		if(isset($custom["testimonial_content"][0])) $testimonial_content = $custom["testimonial_content"][0];
		if(isset($custom["role"][0])) $role = $custom["role"][0];
?>
	<div class="metabox-options form-table fullwidth-metabox image-upload-dep">
		<div class="metabox-option">
			<h6><?php esc_html_e('Role' , 'pixi') ?>:</h6>
			<input type="text" name="role" value="<?php echo esc_attr($role); ?>">
		</div>
		<div class="metabox-option">
			<h6><?php esc_html_e('Testimonial' , 'pixi') ?>:</h6>
			<textarea name="testimonial_content"><?php echo esc_textarea($testimonial_content); ?></textarea>
		</div>
		
	</div>
<?php }

// Save testimonial meta
add_action('save_post', 'th_save_testimonial_meta'); 
function th_save_testimonial_meta(){
    global $post;  	
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return $post_id;
	}else{
		$post_metas = array('role','testimonial_content');
		foreach($post_metas as $post_meta) {
			if(isset($_POST[$post_meta])) update_post_meta($post->ID, $post_meta, sanitize_text_field($_POST[$post_meta]));
		}
    }
}


/*-----------------------------------------------*
  Portfolio Post Type
/*-----------------------------------------------*/
add_action('init', 'th_portfolio_register');  
function th_portfolio_register() {
	$labels = array(
        'name'               => esc_html__( 'Portfolio' , 'pixi' ),
        'singular_name'      => esc_html__( 'Portfolio' , 'pixi' ),
        'add_new'            => esc_html__( 'Add New' , 'pixi' ),
        'add_new_item'       => esc_html__( 'Add New Portfolio item' , 'pixi' ),
        'edit_item'          => esc_html__( 'Edit Portfolio item' , 'pixi' ),
        'new_item'           => esc_html__( 'New Portfolio item' , 'pixi' ),
        'all_items'          => esc_html__( 'All Portfolio items' , 'pixi' ),
        'view_item'          => esc_html__( 'View Portfolio item' , 'pixi' ),
        'search_items'       => esc_html__( 'Search Portfolio item' , 'pixi' ),
        'not_found'          => esc_html__( 'No products found' , 'pixi' ),
        'not_found_in_trash' => esc_html__( 'No products found in the Trash' , 'pixi' ),
        'parent_item_colon'  => '',
        'menu_name'          => esc_html__('Portfolio','pixi')
    );
    $args = array(
		'labels'    => $labels,
		'menu_icon' => 'dashicons-format-gallery',
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'supports' => array('title','editor','thumbnail')
       );  
    register_post_type( 'portfolio' , $args );
    register_taxonomy(
    	"project-type", 
    	array("portfolio"), 
    	array(
    		"hierarchical" => true, 
    		"context" => "normal", 
    		'show_ui' => true,
    		"label" => "Portfolio Categories", 
    		"singular_label" => "Portfolio Category", 
    		"rewrite" => true
    	)
    );
}

add_filter( 'manage_edit-portfolio_columns', 'th_portfolio_columns_settings' ) ;
function th_portfolio_columns_settings( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __('Title', 'pixi'),
		'category' => __( 'Category', 'pixi'),
		'date' => __('Date', 'pixi'),
		'thumbnail' => ''	
	);
	return $columns;
}

add_action( 'manage_portfolio_posts_custom_column', 'th_portfolio_columns_content', 10, 2 );
function th_portfolio_columns_content( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'category' :
			$taxonomy = "project-type";
			$post_type = get_post_type($post_id);
			$terms = get_the_terms($post_id, $taxonomy);
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
					$post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>No categories.</i>';
			break;
		case 'thumbnail' :
			the_post_thumbnail('thumbnail', array('class' => 'column-img'));
			break;
		default :
			break;
	}
}

function isAssoc($arr){
    return array_keys($arr) !== range(0, count($arr) - 1);
}
function th_create_dropdown($name,$elements,$current_value,$folds = NULL) {
    $folds_class = $selected = '';
    if($folds) $folds_class = ' portfolios';
    echo '<select id="nnn" name="'.$name.'" class="select'.$folds_class.'">';
    if(isAssoc($elements)) {
        foreach($elements as $title => $key) {
            if($key == $current_value) $selected = 'selected';
            echo '<option value="'.$key.'"'.$selected.'>'.$title.'</option>';
            $selected = '';
        }
    } else {
        foreach($elements as $key) {
            if($key == $current_value) $selected = 'selected';
            echo '<option value="'.$key.'"'.$selected.'>'.$key.'</option>';
            $selected = '';
        }
    }
    echo '</select>';
}


add_action("admin_init", "th_portfolio_extra_settings");   
function th_portfolio_extra_settings(){
    add_meta_box("portfolio_extra_settings", "Portfolio Post Settings", "th_portfolio_extra_settings_config", "portfolio", "normal", "high");
}   
function th_portfolio_extra_settings_config(){
        global $post;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);
        $link_type = $link_url = $url = '';
		
		if (isset($custom["url"][0])) {
			$url = sanitize_text_field($custom["url"][0]);
		}
		if (isset($custom["link_url"][0])) {
			$link_url = sanitize_text_field($custom["link_url"][0]);
		}
		if(isset($custom["link_type"][0])) $link_type = $custom["link_type"][0];
        if(isset($custom["link_url"][0])) $link_url;
        if(isset($custom["url"][0])) $url;
?>
	<div class="metabox-options form-table fullwidth-metabox">
		<div class="metabox-option">
			<h6><?php _e('Thumbnail Link Type', 'pixi') ?>:</h6>
            <?php
            $link_type_arr = array(
				'Single Page - Opens a progect page' => 'single_page',
				'Default - Is opening in a Lightbox' => 'lightbox', 
				'Video Link - Is opening a Video in a Lightbox' => 'direct', 
				'External Link - Opens a Custom Link' => 'external'
			);
            th_create_dropdown('link_type',$link_type_arr,$link_type, true); ?>
            <p class="description"><?php echo esc_html_e('Choose what thumbnail does.', 'pixi') ?></p>
        </div>
        <div class="metabox-option video-link">
            <h6><?php esc_html_e('Video link', 'pixi') ?>:</h6>
            <input type="text" name="link_url" value="<?php echo esc_attr($link_url); ?>">
            <p class="description"><?php echo esc_html_e('You can set the thumbnail to open a video from third-party websites(Vimeo, YouTube) in an URL. Ex: http://www.youtube.com/watch?v=y6Sxv-sUYtM', 'pixi') ?></p>
        </div>
        <div class="metabox-option ext-link">
        <h6><?php esc_html_e('External link', 'pixi') ?>:</h6>
        <input type="text" name="url" value="<?php echo esc_attr($url); ?>">
        <p class="description"><?php echo esc_html_e('You can set the thumbnail to open a custom link.', 'pixi') ?></p>
        </div>
	</div>
<?php }

// Save Custom Fields
add_action('save_post', 'th_save_portfolio_post_settings'); 
function th_save_portfolio_post_settings(){
    global $post;  

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return $post_id;
	}else{
	    if (isset($_POST["link_url"])) {
            $link_url = sanitize_text_field($_POST["link_url"]);
        }
		if (isset($_POST["url"])) {
            $url = sanitize_text_field($_POST["url"]);
        }
		if(isset($_POST["link_type"])) update_post_meta($post->ID, "link_type", $_POST["link_type"]);
		if(isset($_POST["link_url"])) update_post_meta($post->ID, "link_url", $link_url);
		if(isset($_POST["url"])) update_post_meta($post->ID, "url", $url);
    }
}

/*-----------------------------------------------*
  team Post Type
/*-----------------------------------------------*/
add_action('init', 'th_team_register');  
function th_team_register() {
	$labels = array(
        'name'               => esc_html__( 'Team' , 'pixi' ),
        'singular_name'      => esc_html__( 'Team' , 'pixi' ),
        'add_new'            => esc_html__( 'Add New' , 'pixi' ),
        'add_new_item'       => esc_html__( 'Add New Team item' , 'pixi' ),
        'edit_item'          => esc_html__( 'Edit Team item' , 'pixi' ),
        'new_item'           => esc_html__( 'New Team item' , 'pixi' ),
        'all_items'          => esc_html__( 'All Team items' , 'pixi' ),
        'view_item'          => esc_html__( 'View Team item' , 'pixi' ),
        'search_items'       => esc_html__( 'Search Team item' , 'pixi' ),
        'not_found'          => esc_html__( 'No products found' , 'pixi' ),
        'not_found_in_trash' => esc_html__( 'No products found in the Trash' , 'pixi' ),
        'parent_item_colon'  => '',
        'menu_name'          => esc_html__('Team','pixi')
    );
    $args = array(
        'labels'    => $labels,
		'menu_icon' => 'dashicons-businessman',
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'supports' => array('title','thumbnail','editor')
       );  
    register_post_type( 'team' , $args );
	register_taxonomy(
    	"team-type", 
    	array("team"), 
    	array(
    		"hierarchical" => true, 
    		"context" => "normal", 
    		'show_ui' => true,
    		"label" => "team Categories", 
    		"singular_label" => "team Category", 
    		"rewrite" => true
    	)
    );
}

// Thumbnail column
add_filter( 'manage_edit-team_columns', 'th_team_columns_settings' ) ;
function th_team_columns_settings( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __('Title', 'pixi'),
		'date' => __('Date', 'pixi'),
		'slider-thumbnail' => ''	
	);
	return $columns;
}
add_action( 'manage_team_posts_custom_column', 'th_team_columns_content', 10, 2 );
function th_team_columns_content( $column, $post_id ) {
	global $post;
	the_post_thumbnail('thumbnail', array('class' => 'column-img'));
}

// Team Title and Caption
add_action("admin_init", "th_team_title_settings");   
if(!function_exists('th_team_title_settings')) {
	function th_team_title_settings(){
	    add_meta_box("team_title_settings", "Team Member", "th_team_member_config", "team", "normal", "high");
	    add_meta_box("team_member_social", "Team Member Social", "th_team_member_social", "team", "normal", "high");
	}   
	function th_team_member_config(){
	        global $post;
	        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;	        
	        $custom = get_post_custom($post->ID);
	        $member_name = $member_position = $member_bio = '';
	        if(isset($custom["member_position"][0])) $member_position = $custom["member_position"][0];
	        if(isset($custom["member_bio"][0])) $member_bio = $custom["member_bio"][0];
	?>	    
		<div class="metabox-options form-table fullwidth-metabox image-upload-dep">
			<div class="metabox-option">
				<h6><?php esc_html_e('Position', 'pixi') ?>:</h6>
				<input type="text" name="member_position" value="<?php echo esc_attr($member_position); ?>">
			</div>
			<div class="metabox-option">
				<h6><?php esc_html_e('Short Bio', 'pixi') ?>:</h6>
				<textarea name="member_bio"><?php echo esc_textarea($member_bio); ?></textarea>
			</div>
		</div>
	<?php
	}
	function th_team_member_social(){
	        global $post;
	        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
	        $custom = get_post_custom($post->ID);	
	?>
		<div class="metabox-options form-table fullwidth-metabox image-upload-dep">
			<?php 
			$member_socials = array('facebook','twitter','linkedin','pinterest','instagram','flickr','link');
			foreach($member_socials as $member_social) {
				$current_val = '';
				if(isset($custom["member_".$member_social][0])) {
					$current_val = $custom["member_".$member_social][0];
				}
				echo '<div class="metabox-option">';
				echo '<h6>'. esc_attr($member_social) .'</h6>';
				echo '<input type="text" name="member_'.esc_attr($member_social).'" value="'.esc_attr($current_val).'">';
				echo '</div>';
			} ?>					
		</div>
	<?php
	}
}  

// Save Slide
add_action('save_post', 'th_save_team_meta'); 
function th_save_team_meta(){
    global $post;  	
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return $post_id;
	}else{
		$post_metas = array('member_position','member_bio');
		foreach($post_metas as $post_meta) {
			if(isset($_POST[$post_meta])) update_post_meta($post->ID, $post_meta, $_POST[$post_meta]);
		}
		$member_socials = array('facebook','twitter','linkedin','pinterest','instagram','flickr','link');
		
		foreach($member_socials as $member_social) {
			if(isset($_POST['member_'.$member_social])) update_post_meta($post->ID, 'member_'.$member_social, $_POST['member_'.$member_social]);
		}
    }
}