<?php 

/** * Values given from the specific page */
$page= get_page_by_path('objetivos');
$title= get_the_title($page);
$image= get_the_post_thumbnail_url( $page->ID );
wp_reset_query();
$category = 'objetivos';
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

<div class="objetivos objetivos__page page">
  <div class="objetivos__container container">
    <div class="objetivos__page-center page__center">
      <h2><?php echo $title;?></h2>
      <figure class="objetivos__page-figure page__figure">
        <img src="<?php echo $image;?>" class="objetivos__page-img page__img"/>  
      </figure>
    </div>
    <div class="objetivos__carousel">
      <div class="objetivos-siema">
  <?php if ( $arr_posts->have_posts() ) :
    while ( $arr_posts->have_posts() ) :
      $arr_posts->the_post();
        array_push($arr_dots, $conteo);
        $conteo++;
      ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php if ( has_post_thumbnail() ) :
        the_post_thumbnail();
      endif;?>
          <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
          </header>
          <div class="entry-content">
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>">Read More</a>
          </div>
        </article>
    <?php endwhile;
  endif;?>
      </div>
      <div class="objetivos-siema__sides siema__sides">
        <button class="objetivos-siema__side siema__prev">prev</button>
        <button class="objetivos-siema__side siema__next">next</button>
      </div>
      <?php if( count($arr_dots) ):?>
        <div class="objetivos-siema__dots siema__dots">
          <?php foreach ($arr_dots as &$dot):?>
            <button class="objetivos-siema__dot siema__dot" data-number=<?php echo $dot?>><?php echo $dot + 1?></button>
          <?php endforeach;?>
        </div>
      <?php endif;?>
    </div>
  </div>
</div>