<?php

defined('ABSPATH') || exit;

global $product;

?>

<section <?php wc_product_class('product-card back-image-section', $product) ?>>
  <div class="product-card__container">

    <div class="product-card__body">
      <?php
      $product_image_id = $product->get_image_id();
      $product_gallery_ids = $product->get_gallery_image_ids();
      ?>
      <div data-tabs data-tabs-hover class="tabs-thumbs">

        <nav data-tabs-titles class="tabs-thumbs__navigation">

          <button type="button" class="tabs-thumbs__title _tab-active">
            <?php echo wp_get_attachment_image($product_image_id, 'full') ?>
          </button>

          <?php foreach ($product_gallery_ids as $product_gallery_id) : ?>
            <button type="button" class="tabs-thumbs__title">
              <?php echo wp_get_attachment_image($product_gallery_id, 'full') ?>
            </button>
          <?php endforeach; ?>

        </nav>

        <div class="product-card__main-image">
          <div class="product-card__labels">
            <?php if ($product->is_featured()) : ?>
              <h4 class="product-item__label product-card__label">Бестселлер</h4>

            <?php endif; ?>
            <?php if ($product->is_on_sale()) : ?>
              <span class="product-item__discount product-card__discount">-20%</span>
            <?php endif; ?>

          </div>

          <div class="product-item__type product-card__type">
            <div class="product-item__badge">
              <span>
                <?php $values = get_the_terms($product->id, 'pa_filler');

                foreach ($values as $value) {
                  echo $value->name;
                } ?>

              </span>
            </div>
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/goose.svg" alt="Тип изделия">
          </div>

          <div data-tabs-body class="tabs-thumbs__content">

            <div class="tabs-thumbs__body">
              <?php echo wp_get_attachment_image($product_image_id, 'full') ?>
            </div>
            <?php foreach ($product_gallery_ids as $product_gallery_id) : ?>
              <div class="tabs-thumbs__body">
                <?php echo wp_get_attachment_image($product_gallery_id, 'full') ?>
              </div>
            <?php endforeach; ?>

          </div>

        </div>

      </div>

      <div class="product-card__content">
        <div class="product-card__top-line">

          <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

            <span class="sku_wrapper product-card__article">Артикул: <span><?php echo ($sku = $product->get_sku()) ? $sku : 'N/A'; ?></span></span>

          <?php endif; ?>

          <div class="product-card__links">
            <a class="product-card__link product-card__share" href="">
              <svg width=" 23" height="25" viewBox="0 0 23 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7.66375 14.1987L15.3475 18.6762M15.3362 6.32375L7.66375 10.8012M21.625 4.625C21.625 6.48896 20.114 8 18.25 8C16.386 8 14.875 6.48896 14.875 4.625C14.875 2.76104 16.386 1.25 18.25 1.25C20.114 1.25 21.625 2.76104 21.625 4.625ZM8.125 12.5C8.125 14.364 6.61396 15.875 4.75 15.875C2.88604 15.875 1.375 14.364 1.375 12.5C1.375 10.636 2.88604 9.125 4.75 9.125C6.61396 9.125 8.125 10.636 8.125 12.5ZM21.625 20.375C21.625 22.239 20.114 23.75 18.25 23.75C16.386 23.75 14.875 22.239 14.875 20.375C14.875 18.511 16.386 17 18.25 17C20.114 17 21.625 18.511 21.625 20.375Z"
                  stroke="black" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>

            <button type="submit" class="product-item__favorite product-card__link product-card__favorite">
              <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M16.1156 1.45776C19.7846 1.45776 22.2498 4.94995 22.2498 8.20776C22.2498 14.8054 12.0184 20.2078 11.8332 20.2078C11.648 20.2078 1.4165 14.8054 1.4165 8.20776C1.4165 4.94995 3.88178 1.45776 7.55076 1.45776C9.65724 1.45776 11.0346 2.52417 11.8332 3.46167C12.6318 2.52417 14.0091 1.45776 16.1156 1.45776Z"
                  stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>

          </div>
        </div>
        <h3 class="product-card__title title-h3"><?php the_title() ?></h3>

        <div class="product-item__size product-card__size">
          <div class="product-item__size-label product-card__size-label">
            Выберите размер (см):
          </div>
          <div class="product-item__values product-card__values">
            <a href="./product-card.html" class="product-item__size-value product-card__size-value">70х90</a>
            <a href="./product-card.html" class="product-item__size-value product-card__size-value">60х80</a>
            <a href="./product-card.html" class="product-item__size-value product-card__size-value active">50х70</a>
          </div>
        </div>

        <div class="product-item__cost product-card__cost price">
          <?php echo $product->get_price_html() ?>
          <!--<div class="product-item__price product-card__price price__new"><span class="price_before">от-->
          <!--  </span>2900<span class="price_rub"> ₽</span></div>-->
          <!--<div class="product-item__old-price product-card__old-price price__old">3 700 <span> ₽</span></div>-->
        </div>

        <div class="product-card__add-to-cart">
          <div data-quantity class="quantity product-card__quantity">
            <button data-quantity-minus type="button" class="quantity__button quantity__button--minus"></button>
            <div class="quantity__input">
              <input data-quantity-value autocomplete="off" type="text" name="form[]" value="1">
            </div>
            <button data-quantity-plus type="button" class="quantity__button quantity__button--plus"></button>
          </div>

          <button type="submit" class="product-item__button product-card__button button button__basket">
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
        </div>

        <div class="product-card__dolyami dolyami">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/product-card/dolyami.svg" alt="Логотип">
          <span>4 платежа по 900 ₽</span>
          <span><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 0.999999L7 7L1 13" stroke="black" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </span>
        </div>

        <div class="product-card__specifications specifications-product-card">
          <div class="specifications-product-card__title">Характеристики</div>
          <ul class="specifications-product-card__list">
            <li class="specifications-product-card__item">
              <div class="specifications-product-card__name">
                Цвет
              </div>
              <div class="specifications-product-card__value">Белый</div>
            </li>
            <li class="specifications-product-card__item">
              <div class="specifications-product-card__name">
                Размер (см)
              </div>
              <div class="specifications-product-card__value">50х70</div>
            </li>
            <li class="specifications-product-card__item">
              <div class="specifications-product-card__name">
                Состав
              </div>
              <div class="specifications-product-card__value">Пуховый первой категории</div>
            </li>
            <li class="specifications-product-card__item">
              <div class="specifications-product-card__name">
                Жесткость
              </div>
              <div class="specifications-product-card__value">Средняя</div>
            </li>
          </ul>

          <a href="" class="specifications-product-card__link-list">Все характеристики (10)</a>
        </div>
        <div class="product-card__features features-product-card">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/product-card/features-back.svg" alt="" class="features-product-card__back-icon">


          <div class="features-product-card__title">Особенности</div>
          <div class="features-product-card__tags">


            <div class="">

              <?php

              echo wc_get_product_tag_list(
                $product->get_id(),
                '</div><div class="features-product-card__tag"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.93742 8.49992L7.31242 10.8749L12.0624 6.12492M16.4166 8.49992C16.4166 12.8722 12.8722 16.4166 8.49992 16.4166C4.12766 16.4166 0.583252 12.8722 0.583252 8.49992C0.583252 4.12766 4.12766 0.583252 8.49992 0.583252C12.8722 0.583252 16.4166 4.12766 16.4166 8.49992Z" stroke="var(--secondary-color)" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>',
                '</div><div class="features-product-card__tag"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.93742 8.49992L7.31242 10.8749L12.0624 6.12492M16.4166 8.49992C16.4166 12.8722 12.8722 16.4166 8.49992 16.4166C4.12766 16.4166 0.583252 12.8722 0.583252 8.49992C0.583252 4.12766 4.12766 0.583252 8.49992 0.583252C12.8722 0.583252 16.4166 4.12766 16.4166 8.49992Z" stroke="var(--secondary-color)" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>',
                '</div>'
              );


              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<div class="product-card-tabs">
  <div class="product-card-tabs__container">
    <div data-tabs class="tabs">
      <nav data-tabs-titles class="tabs__navigation product-card-tabs__navigation">
        <button type="button" class="product-card-tabs__title tabs__title _tab-active">Описание</button>
        <button type="button" class="product-card-tabs__title tabs__title">Оплата</button>
        <button type="button" class="product-card-tabs__title tabs__title">Доставка</button>
      </nav>
      <div data-tabs-body class="product-card-tabs__content tabs__content">
        <div class="tabs__body  product-card-tabs__body">

          <?php echo $product->get_description() ?>

        </div>
        <div class="tabs__body  product-card-tabs__body">
          Содержимое другого таба
        </div>
        <div class="tabs__body  product-card-tabs__body">
          Содержимое третьего таба
        </div>
      </div>
    </div>
  </div>
</div>

<section class="filter-category product-card-like-it back-image-section section">
  <div class="filter-category__container">
    <div class="filter-category__top">
      <h2 class="filter-category__title title-h3 title-h3_big">Вам <span>может</span> понравиться</h2>
      <nav class="filter-category__nav">
        <ul class="filter-category__list-nav">
          <li data-f="all" class="filter-category__item-nav active">Ко всем товарам</li>
          <li data-f="pillow" class="filter-category__item-nav">Подушки</li>
          <li data-f="blanket" class="filter-category__item-nav">Одеяла</li>
          <li data-f="linen" class="filter-category__item-nav">Постельное бельё</li>
          <li data-f="other" class="filter-category__item-nav">Прочее</li>
        </ul>
      </nav>
      <div class="swiper-buttons">
        <button type="button" class="filter-category__slider-btn swiper-button swiper-button-prev"><svg width="12"
            height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.5 19L1.5 10L10.5 1" stroke="black" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
        <button type="button" class="filter-category__slider-btn swiper-button swiper-button-next"><svg width="12"
            height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.5 19L10.5 10L1.5 1" stroke="black" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
      </div>
    </div>

    <div class="filter-category__slider swiper">

      <div class="filter-category__wrapper swiper-wrapper">

        <div class="filter-category__slide swiper-slide pillow">
          <div class="product-item">

            <!-- Верхняя часть item -->
            <div class="product-item__media">
              <a href="./product-card.html" class="product-item__link">
                <img class="product-item__img whinset" src="<?php echo get_template_directory_uri() ?>/assets/img/products/pillow.jpg" alt="Image">
              </a>
              <div class="product-item__top-line">

                <?php if ($product->is_featured()) : ?>
                  <h4 class="product-item__label">Бестселлер</h4>

                <?php endif; ?>
                <?php if ($product->is_on_sale()) : ?>
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
                <a href="#!">
                  Подушка из гусиного пуха структурная
                </a>
              </h4>
              <div class="product-item__size">
                <div class="product-item__size-label">
                  Размер (с
                </div>
                <div class="product-item__values">
                  <a href="" class="product-item__size-value">70х90</a>
                  <a href="" class="product-item__size-value">60х80</a>
                  <a href="" class="product-item__size-value">50х70</a>
                </div>
              </div>

              <div class="product-item__cost price">
                <div class="product-item__price price__new"><span class="price_before">от </span>2 900<span
                    class="price_rub"> ₽</span></div>
                <div class="product-item__old-price price__old">3 700 <span> ₽</span></div>
              </div>

              <button type="submit" class="product-item__button button button__basket">
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
              </button>
            </div>


          </div>
        </div>
        <div class="filter-category__slide swiper-slide blanket">
          <div class="product-item">

            <!-- Верхняя часть item -->
            <div class="product-item__media">
              <a href="./product-card.html" class="product-item__link">
                <img class="product-item__img whinset" src="<?php echo get_template_directory_uri() ?>/assets/img/products/pillow02.jpg" alt="Image">
              </a>
              <div class="product-item__top-line">
                <h4 class="product-item__label">Бестселлер</h4>
                <span class="product-item__discount">-20%</span>
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
                <a href="#!">
                  Подушка из гусиного пуха структурная
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
                <div class="product-item__price price__new"><span class="price_before">от </span>2 900<span
                    class="price_rub"> ₽</span></div>
                <div class="product-item__old-price price__old">3 700 <span> ₽</span></div>
              </div>

              <button type="submit" class="product-item__button button button__basket">
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
              </button>
            </div>


          </div>
        </div>
        <div class="filter-category__slide swiper-slide pillow">
          <div class="product-item">

            <!-- Верхняя часть item -->
            <div class="product-item__media">
              <a href="./product-card.html" class="product-item__link">
                <img class="product-item__img whinset" src="<?php echo get_template_directory_uri() ?>/assets/img/products/pillow03.jpg" alt="Image">
              </a>
              <div class="product-item__top-line">
                <h4 class="product-item__label">Бестселлер</h4>
                <span class="product-item__discount">-20%</span>
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
                <a href="#!">
                  Подушка из гусиного пуха структурная
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
                <div class="product-item__price price__new"><span class="price_before">от </span>2 900<span
                    class="price_rub"> ₽</span></div>
                <div class="product-item__old-price price__old">3 700 <span> ₽</span></div>
              </div>

              <button type="submit" class="product-item__button button button__basket">
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
              </button>
            </div>

          </div>
        </div>
        <div class="filter-category__slide swiper-slide linen">
          <div class="product-item">

            <!-- Верхняя часть item -->
            <div class="product-item__media">
              <a href="./product-card.html" class="product-item__link">
                <img class="product-item__img whinset" src="<?php echo get_template_directory_uri() ?>/assets/img/products/pillow04.jpg" alt="Image">
              </a>
              <div class="product-item__top-line">
                <h4 class="product-item__label">Бестселлер</h4>
                <span class="product-item__discount">-20%</span>
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
                <a href="#!">
                  Подушка из гусиного пуха структурная
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
                <div class="product-item__price price__new"><span class="price_before">от </span>2 900<span
                    class="price_rub"> ₽</span></div>
                <div class="product-item__old-price price__old">3 700 <span> ₽</span></div>
              </div>

              <button type="submit" class="product-item__button button button__basket">
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
              </button>
            </div>


          </div>
        </div>
        <div class="filter-category__slide swiper-slide other">
          <div class="product-item">

            <!-- Верхняя часть item -->
            <div class="product-item__media">
              <a href="./product-card.html" class="product-item__link">
                <img class="product-item__img whinset" src="@img/products/pillow03.jpg" alt="Image">
              </a>
              <div class="product-item__top-line">
                <h4 class="product-item__label">Бестселлер</h4>
                <span class="product-item__discount">-20%</span>
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
                <a href="#!">
                  Подушка из гусиного пуха структурная
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
                <div class="product-item__price price__new"><span class="price_before">от </span>2 900<span
                    class="price_rub"> ₽</span></div>
                <div class="product-item__old-price price__old">3 700 <span> ₽</span></div>
              </div>

              <button type="submit" class="product-item__button button button__basket">
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
              </button>
            </div>


          </div>
        </div>

      </div>
    </div>

  </div>
</section>