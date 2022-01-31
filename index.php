<?php 
$tpPath = "src/template-parts/";
$shortcodesPath = "src/shortcodes/";
get_header();?>

<?php get_template_part( $tpPath.'specific-page', null, array(
  'page' => 'home',
  'columns' => 2,
  'imageBg' => false
));?>
<?php get_template_part( $tpPath.'specific-page', null, array(
  'page' => 'hero',
  'columns' => 2,
  'imageBg' => true
));?>
<?php get_template_part( $tpPath.'objetivos', null);?>
<?php get_template_part( $tpPath.'modulos', null);?>
<?php get_template_part( $tpPath.'clientes', null);?>

<?php //get_template_part( $tpPath.'specific-page', null, array( 'page' => 'home'));?>

<?php //get_template_part( $tpPath.'sample-entries', null, array( 'category' => 'sample'));?>

<?php //get_template_part( $tpPath.'sample-siema', null);?>
<?php get_footer();?> 