<?php
	global $ss_prefix;
?>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/single', 'header' ); ?>
	<?php 
		$video = rwmb_meta( "{$ss_prefix}post_video" );
	?>
	<?php if ( !empty($video) ) : ?>
		<figure>
			<?php echo wp_oembed_get($video); ?>
		</figure>
	<?php endif; ?>
	<div class="blog-item-content">
		<div class="entry-item-desc ss-typography">
			<?php the_content(); ?>
		</div>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/single', 'footer' ); ?>