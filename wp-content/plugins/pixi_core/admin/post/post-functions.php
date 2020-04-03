<?php
/*-----------------------------------------------*
  User Profile Theme
/*-----------------------------------------------*/
function pixi_social_user_profile($user_fields) {
  $user_fields['user_subtitle'] 	   = esc_html__( 'Author Info', 'pixi' );
  $user_fields['facebook'] 			   = esc_html__( 'Facebook URL', 'pixi' );
  $user_fields['twitter'] 			   = esc_html__( 'Twitter URL', 'pixi' );
  $user_fields['googleplus'] 		   = esc_html__( 'Google Plus URL', 'pixi' );
  $user_fields['linkedin'] 			   = esc_html__( 'Linkedin URL', 'pixi' );
  $user_fields['tumblr'] 			   = esc_html__( 'Tumblr URL', 'pixi' );
  $user_fields['pinterest'] 		   = esc_html__( 'Pinterest URL', 'pixi' );
  $user_fields['instagram'] 		   = esc_html__( 'Instagram URL', 'pixi' );
  $user_fields['youtube'] 			   = esc_html__( 'Youtube URL', 'pixi' );
  $user_fields['vimeo'] 	    	   = esc_html__( 'Vimeo URL', 'pixi' );
  return $user_fields;
}
add_action( 'user_contactmethods', 'pixi_social_user_profile' );

/*-----------------------------------------------*
  Author
/*-----------------------------------------------*/
if ( ! function_exists( 'pixi_post_author_bio' ) ) :
	function pixi_post_author_bio( $name = false ) {
    $author_description = get_the_author_meta('description');
	if(!empty($author_description)) { ?>
	<div class="about-author">
	<?php echo get_avatar( get_the_author_meta( 'email' ), $size = '70' ); ?>
	<h3><?php the_author(); ?></h3>
	<?php if(get_the_author_meta('user_subtitle')) : ?>
	  <h6><?php echo the_author_meta('user_subtitle'); ?></h6>
	<?php endif; ?>
	<div class="about-author-description"><?php the_author_meta('description'); ?></div>
	  <div class="about-author-social">
		<?php if(get_the_author_meta('facebook')) : ?><a target="_blank" href="<?php echo the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a><?php endif; ?>
		<?php if(get_the_author_meta('twitter')) : ?><a target="_blank" href="<?php echo the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a><?php endif; ?>
		<?php if(get_the_author_meta('linkedin')) : ?><a target="_blank" href="<?php echo the_author_meta('linkedin'); ?>"><i class="fa fa-linkedin"></i></a><?php endif; ?>
		<?php if(get_the_author_meta('tumblr')) : ?><a target="_blank" href="<?php echo the_author_meta('tumblr'); ?>"><i class="fa fa-tumblr"></i></a><?php endif; ?>
		<?php if(get_the_author_meta('pinterest')) : ?><a target="_blank" href="<?php echo the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest"></i></a><?php endif; ?>
		<?php if(get_the_author_meta('instagram')) : ?><a target="_blank" href="<?php echo the_author_meta('instagram'); ?>"><i class="fa fa-instagram"></i></a><?php endif; ?>
		<?php if(get_the_author_meta('youtube')) : ?><a target="_blank" href="<?php echo the_author_meta('youtube'); ?>"><i class="fa fa-youtube"></i></a><?php endif; ?>
		<?php if(get_the_author_meta('vimeo')) : ?><a target="_blank" href="<?php echo the_author_meta('vimeo'); ?>"><i class="fa fa-vimeo"></i></a><?php endif; ?>
	  </div><!-- .about-author-social -->
	</div>
	<?php
	} 
  }
endif;
/*-----------------------------------------------*
  Extra shortcode
/*-----------------------------------------------*/
if (!function_exists('pixi_extra_shortcode')) {
    function pixi_extra_shortcode($name, $shortcode, $object) {
        if ($shortcode && is_object($object)) {
            $attrs = str_replace(array('[', ']', '"', $name), null, $shortcode);
            $attrs = explode(' ', $attrs);
            if (is_array($attrs)) {
                foreach ($attrs as $attr) {
                    $_attr = explode('=', $attr);
                    if (count($_attr) == 2) {
                        if ($_attr[0] == 'ids') {
                            $object->$_attr[0] = explode(',', $_attr[1]);
                        } else {
                            $object->$_attr[0] = $_attr[1];
                        }
                    }
                }
            }
        }
        return $object;
    }
}
/* Get Shortcode Content */
if (!function_exists('pixi_get_shortcode_from_content')) {
    function pixi_get_shortcode_from_content($param) {
        global $post;
        $pattern = get_shortcode_regex();
        $content = $post->post_content;
        if (preg_match_all('/' . $pattern . '/s', $content, $matches) && array_key_exists(2, $matches) && in_array($param, $matches[2])) {
            $key = array_search($param, $matches[2]);
            return $matches[0][$key];
        }
    }
}
/* Remove Shortcode */
if (!function_exists('pixi_remove_shortcode_gallery')) {
	function pixi_remove_shortcode_gallery() {
		return null;
	}
}
/*-----------------------------------------------*
  Like
/*-----------------------------------------------*/
class PixiLike {
	 function __construct(){	
		add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
		add_action('wp_ajax_pixi_like', array(&$this, 'ajax'));
		add_action('wp_ajax_nopriv_pixi_like', array(&$this, 'ajax'));
	}
	function enqueue_scripts(){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'pixi-like', PIXI_URI_PATH.'/assets/js/post-like.js', 'jquery', '1.0', TRUE );
		wp_localize_script( 'pixi-like', 'pixiLike', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}
	function ajax($post_id){		
		//update
		if( isset($_POST['likes_id']) ) {
			$post_id = str_replace('pixi-like-', '', $_POST['likes_id']);
			$type    = isset($_POST['type']) ? $_POST['type'] : '';
			echo $this->like_post($post_id, 'update', $type);
		} 
		//get
		else {
			$post_id = str_replace('pixi-like-', '', $_POST['likes_id']);
			echo $this->like_post($post_id, 'get');
		}
		exit;
	}
	function like_post($post_id, $action = 'get', $type = ''){
		if(!is_numeric($post_id)) return;
		switch($action) {
			case 'get':
				$like_count = get_post_meta($post_id, '_pixi-like', true);
				if( !$like_count ){
					$like_count = 0;
					add_post_meta($post_id, '_pixi-like', $like_count, true);
				}
				$return_value = "<span class='svg-space'> <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' class='wow draws love' x='0px' y='0px' viewBox='0 0 63.4257431 63.4257431' enable-background='new 0 0 63.4257431 63.4257431' xml:space='preserve' style='visibility: visible;'><path class='path' fill-rule='evenodd' clip-rule='evenodd' fill='none' stroke='#000000' stroke-width='3' stroke-miterlimit='10' d='M38.9352112 54.8121719c-54.8910255-16.981266-26.9966011-58.880127-8.443182-38.7315483C38.9974861-9.9171877 81.8266068 16.6946049 38.9352112 54.8121719L38.9352112 54.8121719zM38.9352112 54.8121719'></path></svg></span><span>" . $like_count . "</span><span class='meta-like'>" .esc_html__('Likes','pixi'). "</span>";
				return $return_value;
				break;
			case 'update':
				$like_count = get_post_meta($post_id, '_pixi-like', true);
				if($type != 'portfolio_list' && isset($_COOKIE['pixi-like_'. $post_id])) {
					return $like_count;
				}
				$like_count++;
				update_post_meta($post_id, '_pixi-like', $like_count);
				setcookie('pixi-like_'. $post_id, $post_id, time()*20, '/');
				if($type != 'portfolio_list') {
			    	$return_value = "<span class='svg-space'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' class='wow draws love' x='0px' y='0px' viewBox='0 0 63.4257431 63.4257431' enable-background='new 0 0 63.4257431 63.4257431' xml:space='preserve' style='visibility: visible;'><path class='path' fill-rule='evenodd' clip-rule='evenodd' fill='none' stroke='#000000' stroke-width='3' stroke-miterlimit='10' d='M38.9352112 54.8121719c-54.8910255-16.981266-26.9966011-58.880127-8.443182-38.7315483C38.9974861-9.9171877 81.8266068 16.6946049 38.9352112 54.8121719L38.9352112 54.8121719zM38.9352112 54.8121719'></path></svg></span><span>" . $like_count . "</span><span class='meta-like'>" .esc_html__('Likes','pixi'). "</span>";
					$return_value .= '</span>';
					return $return_value;
				}
				return '';
				break;
			default:
				return '';
				break;
		}
	}
	function add_pixi_like(){
		global $post;
		$output = $this->like_post($post->ID);
  		$class = 'pixi-like';
  		$title = __('Like this', 'pixi');
		if( isset($_COOKIE['pixi-like_'. $post->ID]) ){
			$class = 'pixi-like liked';
			$title = __('You already liked this!', 'pixi');
		}
		return '<a href="#" class="'. $class .'" id="pixi-like-'. $post->ID .'" title="'. $title .'">'. $output .'</a>';
	}
	function add_pixi_like_portfolio_list($portfolio_project_id){
  		$class = 'pixi-like';
  		$title = __('Like this', 'pixi');
		if( isset($_COOKIE['pixi-like_'. $portfolio_project_id]) ){
			$class = 'pixi-like liked';
			$title = __('You already like this!', 'pixi');
		}
		return '<a class="'. $class .'" data-type="portfolio_list" id="pixi-like-'. $portfolio_project_id .'" title="'. $title .'"></a>';
	}
    function add_pixi_like_blog_list($blog_id){
        $class = 'pixi-like';
        $title = __('Like this', 'pixi');
        if( isset($_COOKIE['pixi-like_'. $blog_id]) ){
            $class = 'pixi-like liked';
            $title = __('You already like this!', 'pixi');
        }
        return '<a class="hover_icon '. $class .'" data-type="portfolio_list" id="pixi-like-'. $blog_id .'" title="'. $title .'"></a>';
    }
}
global $pixi_like;
$pixi_like = new PixiLike();

function pixi_like() {
	global $pixi_like;
	echo $pixi_like->add_pixi_like(); 
}

function pixi_like_latest_posts() {
	global $pixi_like;
	return $pixi_like->add_pixi_like(); 
}

function pixi_like_portfolio_list($portfolio_project_id) {
	global $pixi_like;
	return $pixi_like->add_pixi_like_portfolio_list($portfolio_project_id);
}
/*-----------------------------------------------*
  post views
/*-----------------------------------------------*/
function pixi_set_post_views($postID)
{
    $count_key = 'pixi_post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
add_action('wp_head', 'pixi_track_post_views');
function pixi_track_post_views($postID)
{
    if (!is_single()){
        return;
    }
    if (empty($postID)) {
        global $post;
        $postID = $post->ID;
    }
    pixi_set_post_views($postID);
}
function pixi_get_post_views($postID)
{
    $count_key = 'pixi_post_views_count';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}
function pixi_reading_time()
{
    global $post;
    $wpm     = 200;
    $words   = str_word_count(strip_tags($post->post_content));
    $minutes = floor($words / $wpm);
    if (1 <= $minutes) {
        $output = $minutes . esc_html__(' min read', 'pixi');
    } else {
        $output = esc_html__('1 min read', 'pixi');
    }
    return apply_filters('pixi/pixi_reading_time', $output);
}

/*-----------------------------------------------*
  Post share
/*-----------------------------------------------*/
function pixi_post_share_buttons()
{
    global $post;
	global $pixi_options;
    $title = urlencode(get_the_title($post->ID));
    $media = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'pixi-full'); ?>
	<div class="share">
        <ul class="share-links social-icons style1">
            <li>
			   <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="<?php echo esc_html('Facebook', 'pixi'); ?>"><span>Share</span><i class="fa fa-facebook"></i></a>
			</li>
            <li>
				<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank" title="<?php echo esc_html__( 'Tweet', 'pixi' ) ?>"><span>Tweet</span><i class="fa fa-twitter"></i></a>
			</li>
            <li>
			   <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php echo $title; ?>" target="_blank" title="<?php echo esc_html__( 'LinkedIn', 'pixi' ) ?>"><i class="fa fa-linkedin"></i></a> 
		    </li>
            <li>
                <a class="pinterest" target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $media[0]; ?>&url=<?php the_permalink();?>&is_video=false&description=<?php echo $title; ?>"><i class="fa fa-pinterest"></i></a>
		    </li>
            <li>
                <a class="whatsapp" href="whatsapp://send?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
		    </li>
		</ul>
    </div> <?php }