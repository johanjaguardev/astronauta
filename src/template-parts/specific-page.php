<?php 
/** * Values given like parameters */
$slug= $args['page'];
$columns= $args['columns'];
$imageBg= $args['imageBg'];

/** * Values given from the specific page */
$page= get_page_by_path($slug);
$title= get_the_title($page);

$content = $page->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);

$link= get_post_meta( $page->ID, 'btn-link', TRUE);
$label= get_post_meta( $page->ID, 'btn-label', TRUE);
$image= get_the_post_thumbnail_url( $page->ID );

/** * If imageBg is true, the post thumbails */

if($imageBg):?>
<div class="<?php echo $slug;?> <?php echo $slug;?>__page page page__image-bg <?php echo $slug;?>__page-image-bg" style="background-image: url(<?php echo $image;?>)">
<?php else:?>
<div class="<?php echo $slug;?> <?php echo $slug;?>__page page">
<?php endif;?>

  <div class="<?php echo $slug;?>__container container">
    <div class="<?php echo $slug;?>__page-left page__left">
      <h2><?php echo $title;?></h2>
      <div class="<?php echo $slug;?>__page-content page__content">
        <?php echo $content;?>
      </div>
<?php if((strlen($link) > 0) && (strlen($label) > 0) ):?>
      <a href="<?php echo $link?>" class="home__page-link page__link btn"><?php echo $label?></a>
<?php endif;?>
    </div>
    <div class="<?php echo $slug;?>__page-right page__right">
<?php if(!$imageBg):?>
      <figure class="<?php echo $slug;?>__page-figure page__figure">
      <img src="<?php echo $image;?>" class="<?php echo $slug;?>__page-img page__img"/>  
      </figure>
<?php endif;?>
    </div>
  </div>
</div> 