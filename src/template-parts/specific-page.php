<?php 
$page = get_page_by_path( $args['page'] );

$title = get_the_title( $page );
$content= get_the_content( $page->ID );
$link= get_post_meta( $page->ID, 'btn-link', TRUE);
$label= get_post_meta( $page->ID, 'btn-label', TRUE);
$image = get_the_post_thumbnail( $page->ID );
?>

<div class="<?php echo $args['page']?>__page page">
  <div class="<?php echo $args['page']?>__container container">
    <div class="<?php echo $args['page']?>__page-left page__left">
      <h2><?php echo $title?></h2>
      <div class="<?php echo $args['page']?>__page-content page__content">
        <?php echo $content?>
      </div>
      <a href="<?php echo $link?>" class="home__page-link page__link btn"><?php echo $label?></a>

    </div>
    <div class="<?php echo $args['page']?>__page-right page__right">
      <figure class="<?php echo $args['page']?>__page-img page__img">
      <?php echo $image;?>  
      </figure>
    </div>
  </div>
</div> 