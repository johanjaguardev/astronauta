<?php 
$tpPath = "src/template-parts/";
$shortcodesPath = "src/shortcodes/";
get_header();?>

<?php 
get_template_part( $tpPath.'test', null, array( 
  'class' => 'featured-home',
  'data'  => array(
    'size' => 'large',
    'is-active' => true,
  )) 
);
?>

<hr>
<?php get_template_part( $tpPath.'specific-page', null, array( 'page' => 'home'));?>
<?php get_footer();?>