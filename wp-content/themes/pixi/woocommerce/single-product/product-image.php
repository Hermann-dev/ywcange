<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.8.0

 */

 defined( 'ABSPATH' ) || exit;
 if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
 	return;
 }
global $post, $woocommerce, $product;
$post_thumbnail_id = $product->get_image_id();
$full_size_image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) ) ?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" >
	<figure class="woocommerce-product-gallery__wrapper">
		<?php
		// image variations
		if ( $product->get_image_id() ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'pixi' ) );
			$html .= '</div>';
		} 
        // slick gallery and single lightbox
	   	$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
		$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
		$image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
			'title'	=> get_the_title( get_post_thumbnail_id() )
		) );
		$attachment_count = count( $product->get_gallery_image_ids() );
		if ( $attachment_count > 0 ) {
			$image_ids = $product->get_gallery_image_ids();
			$output = '';
			$output .= '<div class="mo-slick-slider">';
			foreach($image_ids as $image_id) {
				$image_link = wp_get_attachment_url( $image_id );
				$output .= '<img src="'.esc_url($image_link).'" alt="%s"/>';
			}
			$output .= '</div>';
			$output .= '<div class="mo-slick-slider-nav">';
			foreach($image_ids as $image_id) {
				$image_link = wp_get_attachment_url( $image_id );
				$output .= '<div class="slider-item"><img src="'.esc_url($image_link).'" alt="%s"/></div>';
			}
			$output .= '</div>';
			echo _($output);
		} else {
			// image with lightbox
			$attributes = array(
				'title' => get_post_field('post_title', $post_thumbnail_id),
				'data-caption' => get_post_field('post_excerpt', $post_thumbnail_id),
				'src' => $full_size_image[0],
			);
			if ($product->get_image_id()) {
				$html2 = '<div data-thumb="' . get_the_post_thumbnail_url($post->ID, 'shop_thumbnail') . '" class="slick-item woocommerce-product-gallery__image"><a class="lightbox-gallery" href="' . esc_url($full_size_image[0]) . '">';
				$html2 .= get_the_post_thumbnail($post->ID, 'shop_single', $attributes);
				$html2 .= '</a></div>';
			} else {
				$html2 = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html2 .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'pixi'));
				$html2 .= '</div>';
			}
			echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html2, get_post_thumbnail_id($post->ID));
			do_action( 'woocommerce_product_thumbnails' );
		} ?>
</figure>
</div>