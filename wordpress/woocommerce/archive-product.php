<?php get_header(); ?>

<?php do_action( 'woocommerce_before_main_content' ); ?>


<section class="catalog back-image-section-1">

	<?php get_template_part( 'sidebtn' ); ?>

	<div class="catalog__container">
		<div class="catalog__header"> 

			<?php if ( apply_filters( 'woocommerce_show_page_title', true )) : ?>
			<h1 class="woocommerce-products-header__title page-title catalog__title title-h3">
				<?php woocommerce_page_title(); ?>
			</h1>
			<?php endif; ?>

			<?php do_action( 'woocommerce_sidebar'); ?>

		</div>

				
	<?php
			
	if ( woocommerce_product_loop() ) {

// 	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	do_action( 'woocommerce_after_shop_loop' );
} else {

	do_action( 'woocommerce_no_products_found' );
}
	
	 ?>
	

		<div class="catalog__bottom">
										<?php
										$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
										$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
										$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
										$format  = isset( $format ) ? $format : '';

										if ( $total > 1 ) : ?>
										<nav class="pagination order-pagination">
											<?php
											echo str_replace( '<ul class=\'page-numbers\'>', '<ul class="order-pagination__list">', paginate_links(
												apply_filters(
													'woocommerce_pagination_args',
													array( // WPCS: XSS ok.
														'base'      => $base,
														'format'    => $format,
														'add_args'  => false,
														'current'   => max( 1, $current ),
														'total'     => $total,
														'prev_text' => '<button class="order-pagination-left order-pagination__number">
					<svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M8.1106 1.48172L3.60216 6L8.1106 10.5183L6.72263 11.9062L0.816378 6L6.72263 0.09375L8.1106 1.48172Z"
							fill="black"></path>
					</svg>
					</button>',
														'next_text' => '<button class="order-pagination__number order-pagination-right">
					<svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M0.889404 1.48172L5.39784 6L0.889404 10.5183L2.27737 11.9062L8.18362 6L2.27737 0.09375L0.889404 1.48172Z"
							fill="black"></path>
					</svg></button>',
														'type'      => 'list',
														'end_size'  => 3,
														'mid_size'  => 3,
													)
												) )
											);
											?>
										</nav>
										<?php endif; ?>
			
			
		</div>

	</div>
</section>


<?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_footer(); ?>