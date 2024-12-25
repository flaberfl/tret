<?php

add_action('after_setup_theme', function () {
    add_theme_support ('woocommerce');
    add_theme_support ('title-tag');
    add_theme_support ('post_thumbnail');
     
     
//      register_nav_menus(
    
//     array(
//         'header-menu'
        
        
//         )         
// );
});


add_action('wp_enqueue_scripts', 'add_scripts_and_styles');

function add_scripts_and_styles()
{
	
wp_enqueue_script( 'jquery' );
wp_register_script( 'filter', get_stylesheet_directory_uri() . '/assets/js/filter.js', array( 'jquery' ), time(), true );
wp_enqueue_script( 'filter' );
	
wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/app.js', 'null', 'null', true);
		
wp_enqueue_style('style', get_stylesheet_uri());
}



function tretbed_dump( $data ) {
    echo "<pre>" . print_r( $data, 1 ) . "</pre>";
}

// Вывод значения атрибута товара
// function tretbet_attr_name() {
//  $values = get_the_terms( $product->id, 'pa_filler');
 
// foreach ( $values as $value ) {
//   echo $value->name;
// 	}
// }

// Добавление AJAX фильтра
// add_action( 'wp_enqueue_scripts', 'tretbed_jquery_scripts' );
 
// function tretbed_jquery_scripts() {
 
// 	wp_enqueue_script( 'jquery' );
 
// 	wp_register_script( 'filter', get_stylesheet_directory_uri() . '/assets/js/filter.js', array( 'jquery' ), time(), true );
// 	wp_enqueue_script( 'filter' );
//  	wp_localize_script( 'filter', 'true_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
// }

// add_action( 'wp_ajax_myfilter', 'true_filter_function' ); 
// add_action( 'wp_ajax_nopriv_myfilter', 'true_filter_function' );
 
// function true_filter_function(){
 
// 	$args = array(
// 		'orderby' => 'date', // сортировка по дате у нас будет в любом случае (но вы можете изменить/доработать это)
// 		'order'	=> $_POST[ 'date' ] // ASC или DESC
// 	);
 
// 	// для таксономий
// 	if( isset( $_POST[ 'categoryfilter' ] ) ) {
// 		$args[ 'tax_query' ] = array(
// 			array(
// 				'taxonomy' => 'category',
// 				'field' => 'id',
// 				'terms' => $_POST[ 'categoryfilter' ]
// 			)
// 		);
// 	}
 

// 	query_posts( $args );
 
// 	if ( have_posts() ) {
//       		while ( have_posts() ) : the_post();
// 			// тут вывод шаблона поста, например через get_template_part()
//           		echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
// 		endwhile;
// 	} else {
// 		echo 'Ничего не найдено';
// 	}
 
// 	die();
// }



require_once get_template_directory() . '/incs/woocommerce-hooks.php';
require_once get_template_directory() . '/incs/customizer.php';
require_once get_template_directory() . '/incs/cpt.php';
