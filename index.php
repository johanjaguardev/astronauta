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
<?php get_footer();?>