<?php

/*-----------------------------------------------------------------------------------*/
/*	Add Thumbnail Support
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 750, '' );

add_image_size( 'general-size', 750, '', false);
add_image_size( 'blog-classic-fullwidth', 1140, '', false);
add_image_size( 'blog-gird-2-col', 563, 423, true);
add_image_size( 'blog-gird-3-col', 371, 278, true);
add_image_size( 'blog-gird-4-col', 275, 206, true);
add_image_size( 'blog-masonry-2-col', 563, '', false);
add_image_size( 'blog-masonry-3-col', 371, '', false);
add_image_size( 'blog-masonry-4-col', 275, '', false);
add_image_size( 'blog-compact', 422, 317, true);
// add_image_size( 'blog-masonry-mix-3col-one-third', 371, '', false);
add_image_size( 'blog-masonry-mix-3col-two-third', 755, '', false);
// add_image_size( 'blog-masonry-mix-4col-two-fourth', 563, '', false);
// add_image_size( 'blog-masonry-mix-4col-one-fourth', 275, '', false);

add_image_size( 'portfolio-2-col', 565, 426, true);
add_image_size( 'portfolio-2-col-nogutter', 570, 426, true);
add_image_size( 'portfolio-3-col', 373, 282, true);
add_image_size( 'portfolio-3-col-full', 640, 482, true);
add_image_size( 'portfolio-3-col-nogutter', 380, 287, true);
add_image_size( 'portfolio-4-col', 278, 209, true);
add_image_size( 'portfolio-4-col-full', 480, 361, true);
add_image_size( 'portfolio-4-col-nogutter', 285, 209, true);
add_image_size( 'portfolio-5-col-nogutter', 361, 272, true);
add_image_size( 'portfolio-5-col-full', 384, 289, true);

add_image_size( 'spnoy-mosaic-gallery-layout-1', 180, 180, true);
add_image_size( 'spnoy-mosaic-gallery-layout-2', 372, 180, true);
add_image_size( 'spnoy-mosaic-gallery-layout-4', 372, 372, true);

add_image_size( 'blog-teaser', 360, 368, true);

add_image_size( 'widget-latest-portfolio', 150, 150, true);

?>