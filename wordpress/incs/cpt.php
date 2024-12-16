<?php

add_action('init', function () {

    register_post_type('slider', [
      'labels' => [
        'name'               => 'Слайдер', // основное название для типа записи
        'singular_name'      => 'Слайдер', // название для одной записи этого типа
        'add_new'            => 'Добавить новый слайд', // для добавления новой записи
        'add_new_item'       => 'Новый слайд', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item'          => 'Редактирование', // для редактирования типа записи
        'new_item'           => 'Добавить новый слайд', // текст новой записи
        'view_item'          => 'Просмотр', // для просмотра записи этого типа.
        'menu_name'          => 'Слайдер', // название меню
        'all_items'          => 'Все слайды',
            ],
  
      'public'                 => true,
      'supports'            => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
      'menu_icon'           => 'dashicons-format-gallery',
      'show_in_rest'           => true, // добавить в REST API. C WP 4.7
      'exclude_from_search' => true,
      'publicly_queryable' => false,
    ]);
});
