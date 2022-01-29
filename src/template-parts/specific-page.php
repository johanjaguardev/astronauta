<?php 
$page = get_page_by_path( $args['page'] );
echo get_the_title( $page );
echo get_the_content( $page );
//echo get_post_meta( $page['ID'], 'link', TRUE);
echo get_the_post_thumbnail( $page );

?>