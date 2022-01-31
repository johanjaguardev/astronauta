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
$image = get_the_post_thumbnail( $page->ID );
?>

<div class="<?php echo $slug;?>__page page">
  <div class="<?php echo $slug;?>__container container">
    <div class="<?php echo $slug;?>__page-left page__left">
      <h2><?php echo $title;?></h2>
      <div class="<?php echo $slug;?>__page-content page__content">
        <?php echo $content;?>
      </div>
      <a href="<?php echo $link?>" class="home__page-link page__link btn"><?php echo $label?></a>

    </div>
    <div class="<?php echo $slug;?>__page-right page__right">
      <figure class="<?php echo $slug;?>__page-img page__img">
      <?php echo $image;?>  
      </figure>
    </div>
  </div>
</div> 