<?php get_header('home'); ?>

<main class="page">
<?php get_template_part( 'sidebtn' ); ?>
	
	<section class="intro">

    <div class="intro__container">
      <?php

    global $post;
    $slider = get_posts( array(

    'post_type' => 'slider',
	'order' => 'ASC',

    ) );
// tretbed_dump($slider);
  ?>


      <div class="intro__slider-pagination"></div>
    </div>

    <!-- Оболочка слайдера -->
    <div class="intro__slider swiper">
      <!-- Движущаяся часть слайдера -->
      <div class="intro__wrapper swiper-wrapper">

        <?php foreach ($slider as $post): setup_postdata( $post );  ?>

        <!-- Слайд -->
        <div class="intro__slide swiper-slide">
          <div class="intro__background whinset">
            <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title() ?>">
          </div>
          <div class="intro__container">
            <div class="intro__content">
              <h1 class="intro__title">
                <?php the_title() ?>
              </h1>
              <div class="intro__text">
                <?php the_content(); ?>
              </div>

              <div class="intro__button-wrap">
                <a href="" data-goto=".filter-category" class="intro__button button">В каталог
                  <svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M26.7071 8.70711C27.0976 8.31658 27.0976 7.68342 26.7071 7.29289L20.3431 0.928932C19.9526 0.538408 19.3195 0.538408 18.9289 0.928932C18.5384 1.31946 18.5384 1.95262 18.9289 2.34315L24.5858 8L18.9289 13.6569C18.5384 14.0474 18.5384 14.6805 18.9289 15.0711C19.3195 15.4616 19.9526 15.4616 20.3431 15.0711L26.7071 8.70711ZM0 9H26V7H0V9Z"
                      fill="white" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

        </div>


        <?php endforeach; ?>

      </div>

    </div>

    <a href="#popular" class="intro__arrow-down df-fbc" data-goto=".popular">
      <svg width="28" height="16" viewBox="0 0 28 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M27 1.5L14 14.5L0.999999 1.5" stroke="black" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>

    </a>
  </section>

  <section class="popular" id="popular">
    <div class="popular__container">
      <div class="popular__top">
        <h2 class="popular__title title-h2">Бестселлеры</h2>

        <div class="swiper-buttons">
          <button type="button" class="popular__slider-btn swiper-button swiper-button-prev"><svg width="12" height="20"
              viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.5 19L1.5 10L10.5 1" stroke="black" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <button type="button" class="popular__slider-btn swiper-button swiper-button-next"><svg width="12" height="20"
              viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.5 19L10.5 10L1.5 1" stroke="black" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
	  
		  <?php echo do_shortcode( '[tretbed_featured_products]' ) ?>
		  
    </div>
  </section>
	
  <section class="category back-image-section section">
    <div class="category__container">
      <h2 class="category__title title-h2">Категории товаров</h2>
      <div class="category__items">
        <div class="category__item">
          <div class="category__media">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/category/01.jpg" alt="Подушки"
              class="category__image">
          </div>
          <div class="category__info">
            <h3 class="category__name">Подушки</h3>
            <ul class="category__list-tags">
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Бамбук</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class=" category__link-tag">Эвкалипт</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class=" category__link-tag">Шерсть овечья</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class=" category__link-tag">Шерсть верблюжья</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class=" category__link-tag">Пух</a>
              </li>
            </ul>
          </div>
          <a href="<?php echo get_category_link(37); ?>" target="_blank" class=" category__link">
            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M19.0352 1.53516C19.0352 0.70673 18.3636 0.0351571 17.5352 0.0351574L4.03516 0.0351566C3.20673 0.0351566 2.53516 0.706729 2.53516 1.53516C2.53516 2.36358 3.20673 3.03516 4.03516 3.03516H16.0352V15.0352C16.0352 15.8636 16.7067 16.5352 17.5352 16.5352C18.3636 16.5352 19.0352 15.8636 19.0352 15.0352L19.0352 1.53516ZM2.59582 18.5958L18.5958 2.59582L16.4745 0.474497L0.474496 16.4745L2.59582 18.5958Z"
                fill="white" />
            </svg>
          </a>
        </div>
        <div class="category__item">
          <div class="category__media">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/category/02.jpg" alt="Одеяла"
              class="category__image">
          </div>
          <div class="category__info">
            <h3 class="category__name">Одеяла</h3>
            <ul class="category__list-tags">
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Бамбук</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Эвкалипт</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Шерсть овечья</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Шерсть верблюжья</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Пух</a>
              </li>
            </ul>
          </div>
          <a href="<?php echo get_category_link(41); ?>" target="_blank" class="category__link">
            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M19.0352 1.53516C19.0352 0.70673 18.3636 0.0351571 17.5352 0.0351574L4.03516 0.0351566C3.20673 0.0351566 2.53516 0.706729 2.53516 1.53516C2.53516 2.36358 3.20673 3.03516 4.03516 3.03516H16.0352V15.0352C16.0352 15.8636 16.7067 16.5352 17.5352 16.5352C18.3636 16.5352 19.0352 15.8636 19.0352 15.0352L19.0352 1.53516ZM2.59582 18.5958L18.5958 2.59582L16.4745 0.474497L0.474496 16.4745L2.59582 18.5958Z"
                fill="white" />
            </svg>

          </a>
        </div>
        <div class="category__item">
          <div class="category__media">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/category/03.jpg" alt="Постельное бельё"
              class="category__image">

          </div>
          <div class="category__info">
            <h3 class="category__name">Постельное бельё</h3>
            <ul class="category__list-tags">
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Бамбук</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Эвкалипт</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Шерсть овечья</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Шерсть верблюжья</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Пух</a>
              </li>
            </ul>
          </div>
          <a href="<?php echo get_category_link(42); ?>" target="_blank" class="category__link">
            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M19.0352 1.53516C19.0352 0.70673 18.3636 0.0351571 17.5352 0.0351574L4.03516 0.0351566C3.20673 0.0351566 2.53516 0.706729 2.53516 1.53516C2.53516 2.36358 3.20673 3.03516 4.03516 3.03516H16.0352V15.0352C16.0352 15.8636 16.7067 16.5352 17.5352 16.5352C18.3636 16.5352 19.0352 15.8636 19.0352 15.0352L19.0352 1.53516ZM2.59582 18.5958L18.5958 2.59582L16.4745 0.474497L0.474496 16.4745L2.59582 18.5958Z"
                fill="white" />
            </svg>

          </a>
        </div>
        <div class="category__item">
          <div class="category__media">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/category/04.jpg" alt="Прочее"
              class="category__image">
          </div>
          <div class="category__info">
            <h3 class="category__name">Прочее</h3>
            <ul class="category__list-tags">
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Бамбук</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Эвкалипт</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Шерсть овечья</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Шерсть верблюжья</a>
              </li>
              <li class="category__tag">
                <a href="./catalog.html" class="category__link-tag">Пух</a>
              </li>
            </ul>
          </div>
          <a href="<?php echo get_category_link(43); ?>" target="_blank" class="category__link">
            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M19.0352 1.53516C19.0352 0.70673 18.3636 0.0351571 17.5352 0.0351574L4.03516 0.0351566C3.20673 0.0351566 2.53516 0.706729 2.53516 1.53516C2.53516 2.36358 3.20673 3.03516 4.03516 3.03516H16.0352V15.0352C16.0352 15.8636 16.7067 16.5352 17.5352 16.5352C18.3636 16.5352 19.0352 15.8636 19.0352 15.0352L19.0352 1.53516ZM2.59582 18.5958L18.5958 2.59582L16.4745 0.474497L0.474496 16.4745L2.59582 18.5958Z"
                fill="white" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>
   
  <section class="filter-category section">
    <div data-tabs class="filter-category__container">
      <div class="filter-category__top">
        <h2 class="filter-category__title title-h2">Каталог</h2>
        <nav class="filter-category__nav">
          <ul data-tabs-titles class="filter-category__list-nav">
            <li data-f="all" class="filter-category__item-nav active _tab-active">Ко всем товарам</li>
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
		
	<div data-tabs-body class="tabs__content">

         <?php echo do_shortcode( '[tretbed_catalog_products]' ) ?>
		<?php echo do_shortcode( '[tretbed_catalog_products_p]' ) ?>
		<?php echo do_shortcode( '[tretbed_catalog_products_p]' ) ?>
		<?php echo do_shortcode( '[tretbed_catalog_products_p]' ) ?>
		<?php echo do_shortcode( '[tretbed_catalog_products_p]' ) ?>


    </div>
  </section>

  <section class="features back-image-section">
    <div class="features__container">
      <h2 class="features__title title-h2">Почему именно мы</h2>
      <ul class="features__list">
        <li class="features__item">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/features/01.svg" alt=""
            class="features__icon">
          <h5 class="features__name">Более <span>1500 товаров</span></h5>
        </li>
        <li class="features__item">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/features/02.svg" alt=""
            class="features__icon">
          <h5 class="features__name">Быстрая доставка</h5>
        </li>
        <li class="features__item">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/features/03.svg" alt=""
            class="features__icon">
          <h5 class="features__name">Высокое качество</h5>
        </li>
        <li class="features__item">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/features/04.svg" alt=""
            class="features__icon">
          <h5 class="features__name">Гарантия</h5>
        </li>
      </ul>
    </div>
  </section>

</main>

<?php get_footer(); ?>