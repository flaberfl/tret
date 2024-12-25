<?php

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


// карточка товара

remove_action( 'woocommerce_before_shop_loop_item',
			  'woocommerce_template_loop_product_link_open', 10);

remove_action( 'woocommerce_after_shop_loop_item',
			  'woocommerce_template_loop_product_link_close', 5);

remove_action( 'woocommerce_before_shop_loop_item_title',
			  'woocommerce_show_product_loop_sale_flash', 10);

// Отключение надписи кол-во товаров на странице
remove_action ( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// Отключение пагинации
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

// Отключение уведомления о добавления в Корзину
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );



// кастомный шорткод вывода товаров в слайдере ИЗБРАННЫХ продуктов
add_shortcode( 'tretbed_featured_products', 'tretbed_featured_products' );
function tretbed_featured_products( $atts ){
    global $woocommerce_loop, $woocommerce;

    extract( shortcode_atts( array(
        'limit' => '12',
        'orderby' => 'date',
        'order' => 'DESC',
        ), $atts ) );
	
	    $args = array(
		'post_status'   => 'publish',
		'post_type'     => 'product',
        'posts_per_page'=> $limit,
        'orderby'       => $orderby,
        'order'         => $order,
		'post__in' => wc_get_featured_product_ids(),
    );

    ob_start();
	
	$atts['visibility'] = 'featured';

    $products = new WP_Query( $args );

    if ( $products->have_posts() ) : ?>

		<?php woocommerce_product_loop_start(); ?>

            <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                <?php wc_get_template_part( 'content', 'product-featured' ); ?>

            <?php endwhile; // end of the loop. ?>

        <?php woocommerce_product_loop_end(); ?>

    <?php endif;

    wp_reset_postdata();

      return '<div class="woocommerce"><div class="popular__slider swiper"><div class="swiper-wrapper">' . ob_get_clean() . '</div></div></div>';
}


// кастомный шорткод вывода товаров в слайдере ВСЕХ продуктов
add_shortcode( 'tretbed_catalog_products', 'tretbed_catalog_products' );
function tretbed_catalog_products( $atts ){
    global $woocommerce_loop, $woocommerce;

    extract( shortcode_atts( array(
        'limit' => '12',
        'orderby' => 'date',
        'order' => 'DESC',
        ), $atts ) );
	
	    $args = array(
		'post_status'   => 'publish',
		'post_type'     => 'product',
        'posts_per_page'=> $limit,
        'orderby'       => $orderby,
        'order'         => $order,
    );

    ob_start();
	
    $products = new WP_Query( $args );

    if ( $products->have_posts() ) : ?>

		<?php woocommerce_product_loop_start(); ?>

            <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                <?php wc_get_template_part( 'content', 'product-catalog' ); ?>

            <?php endwhile; // end of the loop. ?>

        <?php woocommerce_product_loop_end(); ?>

    <?php endif;

    wp_reset_postdata();

      return '<div class="woocommerce"><div class="filter-category__slider swiper"><div class="swiper-wrapper">' . ob_get_clean() . '</div></div></div>';
}

// кастомный шорткод вывода товаров в слайдере ПОДУШЕК
add_shortcode( 'tretbed_catalog_products_p', 'tretbed_catalog_products_p' );
function tretbed_catalog_products_p( $atts ){
    global $woocommerce_loop, $woocommerce;

    extract( shortcode_atts( array(
        'limit' => '12',
        ), $atts ) );
	
	    $args = array(
		'post_status'   => 'publish',
		'post_type'     => 'product',
        'posts_per_page'=> $limit,
		 'tax_query' => [
        [
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => 37,
            'operator' => 'IN'
        ],
    ],
    );

    ob_start();
	
    $products = new WP_Query( $args );

    if ( $products->have_posts() ) : ?>

		<?php woocommerce_product_loop_start(); ?>

            <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                <?php wc_get_template_part( 'content', 'product-catalog' ); ?>

            <?php endwhile; // end of the loop. ?>

        <?php woocommerce_product_loop_end(); ?>

    <?php endif;

    wp_reset_postdata();

      return '<div class="filter-category__slider swiper woocommerce"><div class="swiper-wrapper">' . ob_get_clean() . '</div></div>';
}

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');
 
function translate_text($translated) {
$translated = str_ireplace('Подытог', 'Итого к оплате', $translated);
return $translated;
}


/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<div class="breadcrumbs"><nav class="breadcrumbs__container"><ul class="breadcrumbs__list">',
            'wrap_after'  => '</li></nav></div>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => '<div></div>',
        );
}


add_action( 'woocommerce_after_shop_loop_item', 'custom_display_post_meta', 9 );
function custom_display_post_meta() {
   global $product;
   $attr = array('pa_size'); // указываем массив нужных атрибутов для вывода
   foreach ( $attr as $key=>$attribute ) {
   $values = wc_get_product_terms( $product->id, $attribute, array( 'fields' => 'names' ) );
   if (!empty($values))
    echo '<div>3<span>'.wc_attribute_label($attribute).'</span> : <span>'. implode( ', ', $values ).'</span></div>';
    }
}