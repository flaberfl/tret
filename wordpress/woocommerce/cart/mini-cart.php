<?php

/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>

<div class="widget_shopping_cart_content">

  <?php if (! WC()->cart->is_empty()) : ?>
  
          <h4 class="total-checkout__title">Корзина
          <span class="total-checkout__number df-fbc br50">2</span>
        </h4>

        <div class="total-checkout__progress-bar">
          <div class="total-checkout__progress"></div>
        </div>

        <div class="total-checkout__progress-label">
          до бесплатной доставки осталось
          <span> 5 090 руб.</span>
        </div>
  

    <ul class="total-checkout__list woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
      <?php
      do_action('woocommerce_before_mini_cart_contents');

      foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
          /**
           * This filter is documented in woocommerce/templates/cart/cart.php.
           *
           * @since 2.1.0
           */
          $product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
          $thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
          $product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
          $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
      ?>
          <li class="total-checkout__item item-total woocommerce-mini-cart-item mini_cart_item">


            <?php if (empty($product_permalink)) : ?>
              <?php echo $thumbnail;
              ?>
            <?php else : ?>
              <div class="item-total__img">
                <?php echo $thumbnail;
                ?>
              </div>
            <?php endif; ?>


            <div class="item-total__content">

              <div class="item-total__name">

                <?php if (empty($product_permalink)) : ?>
                  <?php echo wp_kses_post($product_name);
                  ?>
                <?php else : ?>
                  <a href="<?php echo esc_url($product_permalink); ?>">
                    <?php echo wp_kses_post($product_name);
                    ?>
                  </a>
                <?php endif; ?>

                <?php
                echo sprintf(
                  '<a href="%s" class="item-total__delete remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s" data-success_message="%s">                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M10.6667 3.99992V3.46659C10.6667 2.71985 10.6667 2.34648 10.5213 2.06126C10.3935 1.81038 10.1895 1.60641 9.93865 1.47858C9.65344 1.33325 9.28007 1.33325 8.53333 1.33325H7.46667C6.71993 1.33325 6.34656 1.33325 6.06135 1.47858C5.81046 1.60641 5.60649 1.81038 5.47866 2.06126C5.33333 2.34648 5.33333 2.71985 5.33333 3.46659V3.99992M6.66667 7.66659V10.9999M9.33333 7.66659V10.9999M2 3.99992H14M12.6667 3.99992V11.4666C12.6667 12.5867 12.6667 13.1467 12.4487 13.5746C12.2569 13.9509 11.951 14.2569 11.5746 14.4486C11.1468 14.6666 10.5868 14.6666 9.46667 14.6666H6.53333C5.41323 14.6666 4.85318 14.6666 4.42535 14.4486C4.04903 14.2569 3.74307 13.9509 3.55132 13.5746C3.33333 13.1467 3.33333 12.5867 3.33333 11.4666V3.99992"
                      stroke="#999999" stroke-linecap="round" stroke-linejoin="round" />
                  </svg></a>',
                  esc_url(wc_get_cart_remove_url($cart_item_key)),
                  /* translators: %s is the product name */
                  esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
                  esc_attr($product_id),
                  esc_attr($cart_item_key),
                  esc_attr($_product->get_sku()),
                  /* translators: %s is the product name */
                  esc_attr(sprintf(__('&ldquo;%s&rdquo; has been removed from your cart', 'woocommerce'), wp_strip_all_tags($product_name)))
                );
                ?>
              </div>

              <div class="item-total__variant item-total__variant_1c">
                <div class="item-total__size">

                  <select class="item-total__select" name="form[]" data-class-modif="form">
                    <option value="50" selected>50 х 70 см</option>
                    <option value="70">70 х 70 см</option>
                    <option value="100">100 х 70 см</option>
                  </select>

                </div>

                <div data-quantity class="quantity item-total__quantity">
                  <button data-quantity-minus type="button" class="quantity__button quantity__button--minus"></button>
                  <div class="quantity__input">
                    <input data-quantity-value autocomplete="off" type="text" name="form[]" value="<?php echo $cart_item['quantity'] ?>">
                  </div>
                  <button data-quantity-plus type="button" class="quantity__button quantity__button--plus"></button>
                </div>

              </div>

              <div class="item-total__price">
                <span><?php echo $product_price ?></span>
              </div>

            </div>

          </li>
      <?php
        }
      }

      do_action('woocommerce_mini_cart_contents');
      ?>
    </ul>


    <div class="total-checkout__promocode">

      <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" placeholder="Промокод"
        class="total-checkout__input">

      <button type="submit" class="total-checkout__button">Применить</button>

    </div>

    <p class="all-total__total woocommerce-mini-cart__total total">
      <?php
      /**
       * Hook: woocommerce_widget_shopping_cart_total.
       *
       * @hooked woocommerce_widget_shopping_cart_subtotal - 10
       */
      do_action('woocommerce_widget_shopping_cart_total');
      ?>
    </p>

    <a href="<?php echo wc_get_checkout_url() ?>" class="all-total__button form__button button">перейти к оформлению
      <svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M26.7071 8.70711C27.0976 8.31658 27.0976 7.68342 26.7071 7.29289L20.3431 0.928932C19.9526 0.538408 19.3195 0.538408 18.9289 0.928932C18.5384 1.31946 18.5384 1.95262 18.9289 2.34315L24.5858 8L18.9289 13.6569C18.5384 14.0474 18.5384 14.6805 18.9289 15.0711C19.3195 15.4616 19.9526 15.4616 20.3431 15.0711L26.7071 8.70711ZM0 9H26V7H0V9Z"
          fill="white" />
      </svg>
    </a>

  <?php else : ?>

    <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e('No products in the cart.', 'woocommerce'); ?></p>

  <?php endif; ?>

  <?php do_action('woocommerce_after_mini_cart'); ?>

</div>