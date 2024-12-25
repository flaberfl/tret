<div class="catalog__top-line">

	<div data-spollers="550,max" class="catalog__filter-spoller spollers">
		<details data-open class="spollers__item">
			<summary class="spollers__title catalog__filter-spoller-title">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M13.0505 7H3.5C2.11929 7 1 5.88071 1 4.5C1 3.11929 2.11929 2 3.5 2H13.0505M6.94949 18H16.5C17.8807 18 19 16.8807 19 15.5C19 14.1193 17.8807 13 16.5 13H6.94949M1 15.5C1 17.433 2.567 19 4.5 19C6.433 19 8 17.433 8 15.5C8 13.567 6.433 12 4.5 12C2.567 12 1 13.567 1 15.5ZM19 4.5C19 6.433 17.433 8 15.5 8C13.567 8 12 6.433 12 4.5C12 2.567 13.567 1 15.5 1C17.433 1 19 2.567 19 4.5Z"
						stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<span class="catalog__spoller-open">Развернуть фильтр</span>
				<span class="catalog__spoller-close">Свернуть фильтр</span>

			</summary>
			<div class="spollers__body">

				<div class="catalog__filter filter">

		<form action="" id="price_filler" method="GET">	
					<?php $product_filler = get_terms( array( 'taxonomy' => 'pa_filler', 'hide_empty' => false ) ); ?>

				<?php if( $product_filler ) :

					$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );

				?>

								<select multiple data-tags=".tags-1" data-pseudo-label="Наполнитель" name="1">
									<?php foreach( $product_filler as $product_filler ) : ?>
<!-- 									<option value="<?php echo add_query_arg( 'filter_filler', $product_filler->slug, $shop_page_url ) ?>"><?php if( isset( $_GET[ 'filter_filler' ] ) && $product_filler->slug == $_GET[ 'filter_filler' ] ) : ?><?php endif; ?><?php echo $product_filler->name ?></option> -->
									
									
										<option value="<?php echo add_query_arg( 'filter_filler', $product_filler->slug, $shop_page_url ) ?>"><?php if( isset( $_GET[ 'filter_filler' ] ) && $product_filler->slug == $_GET[ 'filter_filler' ] ) : ?><?php endif; ?><?php echo $product_filler->name ?></option>

									<?php endforeach; ?>

								</select>

							<?php endif; ?>
			
			<button type="submit">
				Отправить данные
			</button>
					
			</form>			
											
					
				</div>

			</div>
		</details>
	</div>
	

	<div class="catalog__filter-sort filter-sort" data-da=".catalog__header, 1400">

		<div class="filter-sort__title">
			<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M5.5 11H16.5M2.75 5.5H19.25M8.25 16.5H13.75" stroke="black" stroke-width="2" stroke-linecap="round"
					stroke-linejoin="round" />
			</svg>
			Сортировать по:
		</div>
		<div class="filter-sort__by">
			<a href="?orderby=price-desc" <?php if( isset( $_GET['orderby'] ) && 'price-desc' == $_GET['orderby'] ) : ?> class="active"<?php endif; ?>>
				Убыванию цены
			</a>
			<a href="?orderby=price" <?php if( isset( $_GET['orderby'] ) && 'price' == $_GET['orderby'] ) : ?> class="active"<?php endif; ?>>
				Возрастанию цены
			</a>
		</div>
	</div>

</div>
<div class="catalog__tags tags">
	<div class="tags-1"></div>
	<div class="tags-2"></div>
	<div class="tags-3"></div>
	<div class="tags-4"></div>
</div>