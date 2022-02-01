<?php 

/** * Values given from the specific page */
$page= get_page_by_path('clientes');
$title= get_the_title($page);
wp_reset_query();
$category = 'clientes';
$argsQuery = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>$category,
  'posts_per_page' => 5,

);
$arr_posts = new WP_Query( $argsQuery );
$arr_dots = []; 
$conteo = 0;
?> 

<div class="clientes clientes__page page">
  <a name="clientes"></a>
  <div class="clientes__container container">
    <div class="clientes__page-center page__center">
      <h2><?php echo $title;?></h2>
      <figure class="clientes__page-figure page__figure">
        <img src="<?php echo $image;?>" class="clientes__page-img page__img"/>  
      </figure>
    </div>
    <div class="clientes__carousel">
      <div class="clientes-siema">
  <?php if ( $arr_posts->have_posts() ) :
    while ( $arr_posts->have_posts() ) :
      $arr_posts->the_post();
        array_push($arr_dots, $conteo);
        $conteo++;
      ?>
        <article class="clientes-siema__item">
          <figure class="clientes__figure">
            <img src="<?php echo get_the_post_thumbnail_url( $post->ID );?>" class="clientes__img"/>  
          </figure>
        </article>
    <?php endwhile;
  endif;?>
      </div>
      <div class="clientes-siema__sides siema__sides">
        <button class="clientes-siema__side siema__side siema__prev"><</button>
        <button class="clientes-siema__side siema__side siema__next">></button>
      </div>
      <?php if( count($arr_dots) ):?>
        <div class="clientes-siema__dots siema__dots">
          <?php foreach ($arr_dots as &$dot):?>
            <button class="clientes-siema__dot siema__dot" data-number=<?php echo $dot?>><?php echo $dot + 1?></button>
          <?php endforeach;?>
        </div>
      <?php endif;?>
    </div>
  </div>
</div>