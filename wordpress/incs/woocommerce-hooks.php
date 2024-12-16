<?php

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


// карточка товара

remove_action( 'woocommerce_before_shop_loop_item',
			  'woocommerce_template_loop_product_link_open', 10);

remove_action( 'woocommerce_after_shop_loop_item',
			  'woocommerce_template_loop_product_link_close', 5);

remove_action( 'woocommerce_before_shop_loop_item_title',
			  'woocommerce_show_product_loop_sale_flash', 10);