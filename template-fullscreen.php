<?php
/*
Template Name: Full Screen
*/
?>
<?php get_header() ?>

<?php

	global $ss_prefix;
	$ss_style = '';
	$ss_data_attr = '';
	$bg_color = rwmb_meta( "{$ss_prefix}fullwidth_background_color" );
	$text_color = rwmb_meta( "{$ss_prefix}fullwidth_text_color" );
	$bg_repeat = rwmb_meta( "{$ss_prefix}fullwidth_background_image_repeatable" );
	$parallax = rwmb_meta( "{$ss_prefix}fullwidth_parallax_effect" );
	$bg_image = rwmb_meta( "{$ss_prefix}fullwidth_background_image",  "type=image&size=full" );
	$bg_image = array_shift($bg_image);
	$bg_image = $bg_image['full_url'];
	
	$ss_style .= 'background-color: ' . $bg_color . '; ';
	$ss_style .= 'color: ' . $text_color . '; ';
	
	if ( !empty($bg_image) ) {
		$ss_style .= 'background: url(' . $bg_image  . ') no-repeat center center; ';
		$ss_style .= 'background-size: cover; ';
	}
	if ( !empty($bg_repeat) ) {
		$ss_style .= 'background-repeat: repeat; ';
		$ss_style .= 'background-size: auto; ';
	}
	if ( !empty($parallax) ) {
		$ss_data_attr .= 'data-center="background-position: 50% -130px;" ';
		$ss_data_attr .= 'data-top-bottom="background-position: 50% -200px;" ';
		$ss_data_attr .= 'data-bottom-top="background-position: 50% 200px;" ';
	}
	
?>

<section class="section-content-container" style="<?php echo $ss_style; ?>" <?php echo $ss_data_attr; ?> >

	<?php get_template_part( 'lib/template-parts/page-header' ); ?>

	<div class="section-content ss-typography">
		
		<?php if ( have_posts() ) : while ( have_posts() ) :  the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			</article>
		<?php endwhile; endif; ?>

	</div>

</section>
	
<?php get_footer(); ?>