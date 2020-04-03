<?php
class pixi_Post_List_Widget extends Pixi_Widget {
	function __construct() {
		parent::__construct(
			'mo_post_list', // Base ID
			esc_html__( 'Pixi - Post List', 'pixi'), // Name
			array('description' => esc_html__('Display a list of your posts on your site.', 'pixi'),) // Args
        );
		
		$this->settings = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => esc_html__( 'Post List', 'pixi' ),
				'label' => esc_html__( 'Title', 'pixi' )
			),
			'category' => array(
				'type'   => 'mo_taxonomy',
				'std'    => '',
				'label'  => esc_html__( 'Categories', 'pixi' ),
			),
			'posts_per_page' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 3,
				'label' => esc_html__( 'Number of posts to show', 'pixi' )
			),
			'orderby' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => esc_html__( 'Order by', 'pixi' ),
				'options' => array(
					'none'   => esc_html__( 'None', 'pixi' ),
					'comment_count'  => esc_html__( 'Comment Count', 'pixi' ),
					'title'  => esc_html__( 'Title', 'pixi' ),
					'date'   => esc_html__( 'Date', 'pixi' ),
					'ID'  => esc_html__( 'ID', 'pixi' ),
				)
			),
			'order' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => esc_html__( 'Order', 'pixi' ),
				'options' => array(
					'none'  => esc_html__( 'None', 'pixi' ),
					'asc'  => esc_html__( 'ASC', 'pixi' ),
					'desc' => esc_html__( 'DESC', 'pixi' ),
				)
			),
			'el_class'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => esc_html__( 'Extra Class', 'pixi' )
			)
		);
	   add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}
        
	function widget_scripts() {
		wp_enqueue_script('widget_scripts', PIXI_JS . 'widgets.js');
	}
	function widget( $args, $instance ) {
		ob_start();
		global $post;
		extract( $args );
                
		$title                  = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category               = isset($instance['category'])? $instance['category'] : '';
		$posts_per_page         = absint( $instance['posts_per_page'] );
		$orderby                = sanitize_title( $instance['orderby'] );
		$order                  = sanitize_title( $instance['order'] );
		$el_class               = sanitize_title( $instance['el_class'] );
                
		echo ''.$before_widget;
		if ( $title )
				echo ''.$before_title . $title . $after_title;
		$query_args = array(
			'posts_per_page' => $posts_per_page,
			'orderby' => $orderby,
			'order' => $order,
			'post_type' => 'post',
			'post_status' => 'publish');
		if (isset($category) && $category != '') {
			$cats = explode(',', $category);
			$category = array();
			foreach ((array) $cats as $cat) :
			$category[] = trim($cat);
			endforeach;
			$query_args['tax_query'] = array(
									array(
										'taxonomy' => 'category',
										'field' => 'id',
										'terms' => $category
									)
							);
		}
		$wp_query = new WP_Query($query_args);                
		if ($wp_query->have_posts()){
			?>
			<ul class="mo-post-list">
				<?php while ($wp_query->have_posts()){ $wp_query->the_post(); ?>
					<li>
						<?php 
							/* get thumbnail */
							if( has_post_thumbnail() ){
								$thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
								echo '<a href="'.get_the_permalink().'"><div class="mo-thumb" style="background: url('.esc_url($thumbnail_data[0]).') no-repeat center center / cover, #333"></div></a>';
							}
						?>
						<h6 class="mo-title mo-text-ellipsis"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
						<div class="mo-meta">
							<span><?php echo get_the_date(); ?></span>
							<span><?php esc_html_e('By ', 'pixi'); echo get_the_author(); ?></span>
						</div>
					</li>
				<?php } ?>
			</ul>
		<?php 
		}
		wp_reset_postdata();
		echo ''.$after_widget;
		$content = ob_get_clean();
		echo ''.$content;
	}
}
/* Class pixi_Post_List_Widget */
function pixi_post_list_widget() {
    register_widget('pixi_Post_List_Widget');
}
add_action('widgets_init', 'pixi_post_list_widget');