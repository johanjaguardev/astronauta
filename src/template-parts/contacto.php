<?php 
/** * Values given like parameters */
$slug= 'contacto';

/** * Values given from the specific page */
$page= get_page_by_path($slug);
$title= get_the_title($page);

$content = $page->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);

$redes= array(
  "facebook" => get_post_meta( $page->ID, 'facebook', TRUE),
  "twitter" => get_post_meta( $page->ID, 'twitter', TRUE),
  "linkedin" => get_post_meta( $page->ID, 'linkedin', TRUE),
  "instagram" => get_post_meta( $page->ID, 'instagram', TRUE),
  "email" => get_post_meta( $page->ID, 'email', TRUE),
  "direccion" => get_post_meta( $page->ID, 'direccion', TRUE),
  "telefono" => get_post_meta( $page->ID, 'telefono', TRUE),
  "form" => get_post_meta( $page->ID, 'ninja_forms_form', TRUE),

);

$image= get_the_post_thumbnail_url( $page->ID );?>

<div class="<?php echo $slug;?> <?php echo $slug;?>__page page page__image-bg <?php echo $slug;?>__page-image-bg"
  style="background-image: url(<?php echo $image;?>)">
  <div class="<?php echo $slug;?>__container container">
    <div class="<?php echo $slug;?>__page-left page__left">
      <?php echo do_shortcode("[ninja_form id=".$redes["form"]."]"); ?>
    </div>
    <div class="<?php echo $slug;?>__page-right page__right">
      <h2 class="contacto__title-redes">Siguenos en redes</h2>
      <div class="contacto__social-box">
        <?php if( strlen( $redes["facebook"] ) > 0 ):?>
        <a href="https://www.facebook.com/<?php echo $redes["facebook"]?>" class="contacto__social contacto__facebook" target="_blank">
          
        </a>
        <?php endif;?>
        <?php if( strlen( $redes["twitter"] ) > 0 ):?>
        <a href="https://www.twitter.com/<?php echo $redes["twitter"]?>" class="contacto__social contacto__twitter" target="_blank">
          
        </a>
        <?php endif;?>
        <?php if( strlen( $redes["linkedin"] ) > 0 ):?>
        <a href="https://www.linkedin.com/in/<?php echo $redes["linkedin"]?>" class="contacto__social contacto__linkedin" target="_blank">
          
        </a>
        <?php endif;?>
        <?php if( strlen( $redes["instagram"] ) > 0 ):?>
        <a href="https://www.instagram.com/<?php echo $redes["instagram"]?>" class="contacto__social contacto__instagram" target="_blank">
          
        </a>
        <?php endif;?>
      </div>

      <h2 class="contacto__title"><?php echo $title;?></h2>
      <div class="contacto__datos-box">
        <ul class="contacto__datos-ul">
          <?php if( strlen( $redes["email"] ) > 0 ):?>
          <li class="contacto__datos-li"><a href="mailto:<?php echo $redes["email"]?>" class="contacto__datos contacto__email" target="_blank">
            <?php echo $redes["email"]?>
          </a></li>
          <?php endif;?>
          <?php if( strlen( $redes["direccion"] ) > 0 ):?>
          <li class="contacto__datos-li"><a href="#" class="contacto__datos contacto__direccion" target="_blank">
            <?php echo $redes["direccion"]?>
          </a></li>
          <?php endif;?>
          <?php if( strlen( $redes["telefono"] ) > 0 ):?>
          <li class="contacto__datos-li"><a href="tel:<?php echo $redes["telefono"]?>" class="contacto__datos contacto__telefono" target="_blank">
            <?php echo $redes["telefono"]?>
          </a></li>
          <?php endif;?>
        </ul>

      </div>

    </div>
  </div>
</div> 
