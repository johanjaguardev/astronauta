<html>
  <head>
    <title>Astronauta 2.0</title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="header">
      <div class="container header__container">
        <div class="header__logo">
          <?php the_custom_logo()?>
        </div>
        <nav class="header__nav">
        <?php wp_nav_menu( array( 
          'theme_location' => 'header__menu', 
          'container_class' => 'header__menu' ) ); ?>
        </nav>
      </div>
    </header>
  