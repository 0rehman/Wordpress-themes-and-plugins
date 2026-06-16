<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>


<li <?php wc_product_class( '', $product ); ?>>
	<div class="product-item">
                <div class="product-thumbnail">
                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                    </a>
                    <div class="prod-icons">
                        <ul>
                            <li class="add-cart-btn"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></li><li class="wishlist-btn"><?php echo do_shortcode('[ti_wishlists_addtowishlist]');?></li>
                        </ul>
                     </div>   
                </div>

                <div class="product-detail">
                    <div class="product-titlle">
                        <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                        <h3><?php the_title(); ?></h3>
                        </a>                                            
                       
                    </div>
                    <div class="product-price">
                        <span class="price"><b><?php echo $product->get_price_html(); ?></b></span>
                    </div>
                    <div class="cat-rating">
                        <div class="woocommerce star-rating">
                            <?php if ($average = $product->get_average_rating()) : ?>
                        <?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>'; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="product-buttons">
                        <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                    </div>
                </div>                                             
            </div>
</li>
