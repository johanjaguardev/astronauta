<?php 

/** * Values given from the specific page */
$page= get_page_by_path('modulos');
$title= get_the_title($page);
$content = $page->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
$image= get_the_post_thumbnail_url( $page->ID );
wp_reset_query();
$category = 'modulos';
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

<div class="modulos modulos__page page" style="background-image: url(<?php echo $image;?>)">
  <div class="modulos__container container">
    <div class="modulos__page-center page__center">
      <div class="modulos__ico">
        <?php echo $content;?>
      </div>   
      <h2><?php echo $title;?></h2>
    </div>
    <div class="modulos__grid">

<?php if ( $arr_posts->have_posts() ) :
  while ( $arr_posts->have_posts() ) :
    $arr_posts->the_post();
      array_push($arr_dots, $conteo);
      $conteo++;
    ?>
      <article class="modulos__item">
        <div class="modulos__1">
          <div class="modulos__svg modulos__svg-1">
            <?php echo get_post_meta( $post->ID, 'svg', TRUE);?>
            <h3 class="modulos__title-1"><?php the_title();?></h3>
          </div>
        </div>
        <div class="modulos__2" style="background-image: url(<?php echo $image;?>)">
          <div class="modulos__2-box">
            <div class="modulos__close">X</div>
            <div class="modulos__2-row-1">
              <div class="modulos__2-left">
                <div class="modulos__svg modulos__svg-2">
                  <?php echo get_post_meta( $post->ID, 'svg', TRUE);?>
                </div>
                <h3 class="modulos__title-2"><?php the_title(); ?></h3>
              </div>
              <div class="modulos__2-right">
                <figure class="modulos__figure">
                  <img src="<?php echo get_the_post_thumbnail_url( $post->ID );?>" class="modulos__img"/>  
                </figure>
              </div>
            </div>
            <div class="modulos__2-row-2">
              <div class="modulos__content">
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">...</a>
              </div>
            </div>
          </div>

        </div>
      </article>

  <?php endwhile;
endif;?>
    </div>
  </div>

</div>
