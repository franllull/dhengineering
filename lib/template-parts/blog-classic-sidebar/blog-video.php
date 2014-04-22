<?php
	global $ss_prefix;
	global $more;
	$more = 0;
?>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/blog', 'header' ); ?>
	<?php 
		$video = rwmb_meta( "{$ss_prefix}post_video" );
	?>
	<?php if ( !empty($video) ) : ?>
		<figure>
			<?php echo wp_oembed_get($video); ?>
		</figure>
	<?php endif; ?>
	<div class="blog-item-content">
		<div class="blog-item-desc ss-typography">
			<?php the_content(''); ?>
		</div>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/blog', 'footer' ); ?>