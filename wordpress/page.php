<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style>
    body {
      opacity: 0;
    }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <script src="//points.boxberry.ru/js/boxberry.js?_v=20241211230345"></script> -->

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>
  
  
  
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
  <h1><?php the_title() ?></h1>
  <?php the_content() ?>
  <?php endwhile; else: ?>
  <p>Записей нет</p>
  
  <?php endif; ?>
  
  
  <?php wp_footer(); ?>
</body>
</html>