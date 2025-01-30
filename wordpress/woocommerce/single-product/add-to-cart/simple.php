<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php do_action( 'woocommerce_before_add_to_cart_quantity' ); ?>
		
		
	<div class="product-card__add-to-cart">

	<div data-quantity class="quantity product-card__quantity">
				<button data-quantity-minus type="button" class="quantity__button quantity__button--minus"></button>
				<div class="quantity__input">
					
					
	<?php
		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);
 ?>
					
				</div>
				<button data-quantity-plus type="button" class="quantity__button quantity__button--plus"></button>
	</div>

			<?php do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>

<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="product-item__button product-card__button button button__basket single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
							<div class="button-wrapper button-wrapper__null">
							<svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M14.6671 9.125V5.75C14.6671 3.26472 12.8016 1.25 10.5004 1.25C8.19924 1.25 6.33376 3.26472 6.33376 5.75V9.125M1.7421 10.646L1.1171 17.846C0.93939 19.8931 0.850537 20.9167 1.16506 21.7073C1.44136 22.4018 1.92555 22.9761 2.54003 23.338C3.23951 23.75 4.19143 23.75 6.09527 23.75H14.9056C16.8094 23.75 17.7613 23.75 18.4608 23.338C19.0753 22.9761 19.5595 22.4018 19.8358 21.7073C20.1503 20.9167 20.0615 19.8931 19.8838 17.846L19.2588 10.646C19.1087 8.91726 19.0337 8.05292 18.6737 7.39943C18.3567 6.82391 17.8883 6.36325 17.3281 6.07608C16.6921 5.75 15.8882 5.75 14.2806 5.75L6.72027 5.75C5.1126 5.75 4.30877 5.75 3.67274 6.07607C3.11258 6.36325 2.64418 6.82391 2.32716 7.39943C1.96719 8.05291 1.89216 8.91726 1.7421 10.646Z"
									stroke="black" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							В корзину
						</div>

						<div class="button-wrapper button-wrapper__add">
							<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M18.3337 1.75L6.87533 14.125L1.66699 8.5" stroke="white" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							Добавлено
						</div>
	
</button>

<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</div>	

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
