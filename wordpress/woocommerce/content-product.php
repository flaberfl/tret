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
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>

            <div <?php wc_product_class( 'catalog__item product-item' , $product ); ?>>
				
              <!-- Верхняя часть item -->
              <div class="product-item__media">
                <a href="<?php echo $product->get_permalink() ?>" class="product-item__link">
                 <div class="product-item__img whinset">
			<?php echo $product->get_image()?>		 
					</div>
		
                </a>
                <div class="product-item__top-line">
					
					<?php if( $product->is_featured() ) : ?>
                  <h4 class="product-item__label">Бестселлер</h4>

					<?php endif; ?>
					<?php if( $product->is_on_sale() ) : ?>
					<span class="product-item__discount">-20%</span>
					<?php endif; ?>
					
					
                  <button type="submit" class="product-item__favorite">
                    <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M16.1156 1.45776C19.7846 1.45776 22.2498 4.94995 22.2498 8.20776C22.2498 14.8054 12.0184 20.2078 11.8332 20.2078C11.648 20.2078 1.4165 14.8054 1.4165 8.20776C1.4165 4.94995 3.88178 1.45776 7.55076 1.45776C9.65724 1.45776 11.0346 2.52417 11.8332 3.46167C12.6318 2.52417 14.0091 1.45776 16.1156 1.45776Z"
                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </button>
                </div>
                <div class="product-item__bottom-line">
                  <div class="product-item__type">
                    <div class="product-item__badge">
                      <span>
                        Гусиный пух
                      </span>
                    </div>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/goose.svg" alt="Тип изделия">
                  </div>
                </div>
              </div>

              <!-- Нижняя часть item -->
              <div class="product-item__info">
                <h4 class="product-item__title title-h4">
                  <a href="<?php echo $product->get_permalink() ?>">
                    <?php echo $product->get_title() ?>
                  </a>
                </h4>
                <div class="product-item__size">
                  <div class="product-item__size-label">
                    Размер (см)
                  </div>
                  <div class="product-item__values">
                    <a href="./product-card.html" class="product-item__size-value">70х90</a>
                    <a href="./product-card.html" class="product-item__size-value">60х80</a>
                    <a href="./product-card.html" class="product-item__size-value">50х70</a>
                  </div>
                </div>

                <div class="product-item__cost price">
					 <?php echo $product->get_price_html() ?>
<!--                   <div class="product-item__price price__new"><span class="price_before">от </span>2 900<span
                      class="price_rub"> ₽</span></div>
                  <div class="product-item__old-price price__old">3 700 <span> ₽</span></div> -->
                </div>

                <a href="<?php echo $product->add_to_cart_url() ?>" class="product-item__button button button__basket adding_to_cart">
                  <div class="button-wrapper button-wrapper__null">
                    <svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M14.667 9.125V5.75C14.667 3.26472 12.8015 1.25 10.5003 1.25C8.19912 1.25 6.33364 3.26472 6.33364 5.75V9.125M1.74197 10.646L1.11697 17.846C0.939268 19.8931 0.850415 20.9167 1.16494 21.7073C1.44124 22.4018 1.92543 22.9761 2.53991 23.338C3.23939 23.75 4.19131 23.75 6.09514 23.75H14.9055C16.8093 23.75 17.7612 23.75 18.4607 23.338C19.0752 22.9761 19.5594 22.4018 19.8357 21.7073C20.1502 20.9167 20.0613 19.8931 19.8836 17.846L19.2586 10.646C19.1086 8.91726 19.0335 8.05292 18.6736 7.39943C18.3565 6.82391 17.8882 6.36325 17.328 6.07608C16.692 5.75 15.8881 5.75 14.2805 5.75L6.72014 5.75C5.11248 5.75 4.30865 5.75 3.67261 6.07607C3.11245 6.36325 2.64406 6.82391 2.32703 7.39943C1.96706 8.05291 1.89203 8.91726 1.74197 10.646Z"
                        stroke="var(--secondary-color)" stroke-linecap="round" stroke-linejoin="round" />
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
                </a>
              </div>

            </div>