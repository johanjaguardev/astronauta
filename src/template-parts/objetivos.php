<?php 

/** * Values given from the specific page */
$page= get_page_by_path('objetivos');
$title= get_the_title($page);

// $content = $page->post_content;
// $content = apply_filters('the_content', $content);
// $content = str_replace(']]>', ']]>', $content);

$image= get_the_post_thumbnail_url( $page->ID );

/** * If imageBg is true, the post thumbails */
?> 
<div class="objetivos objetivos__page page">
  <div class="objetivos__container container">
    <div class="objetivos__page-center page__center">
      <h2><?php echo $title;?></h2>
      <figure class="objetivos__page-figure page__figure">
        <img src="<?php echo $image;?>" class="objetivos__page-img page__img"/>  
      </figure>
    </div>
    
  </div>
</div>