<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.8.0

 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( $related_products ) : ?>
     <div class="mo-related products">
		<h3><?php esc_html_e( 'Related Products', 'pixi' ); ?></h3>
		<?php woocommerce_product_loop_start(); ?>
			<div class="mo-product-items row">
				<?php foreach ( $related_products as $related_product ) : ?>
				<?php
				 	$post_object = get_post( $related_product->get_id() );
					setup_postdata( $GLOBALS['post'] =& $post_object );
					wc_get_template_part( 'content', 'product' ); ?>
				<?php endforeach; ?>
			</div>
		<?php woocommerce_product_loop_end(); ?>
	</div>
<?php endif;
wp_reset_postdata();