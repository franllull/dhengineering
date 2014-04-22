<?php
	global $ss_prefix;
	global $more;
	$more = 0;
?>
<?php get_template_part( 'lib/template-parts/blog-classic-fullwidth/blog', 'header' ); ?>
	<?php 
		$audio = rwmb_meta( "{$ss_prefix}post_audio" );
	?>
	<?php if ( !empty($audio) ) : ?>
		<figure>
			<?php echo wp_oembed_get($audio); ?>
		</figure>
	<?php endif; ?>
	<div class="blog-item-content">
		<div class="blog-item-desc ss-typography">
			<?php the_content(''); ?>
		</div>
<?php get_template_part( 'lib/template-parts/blog-classic-fullwidth/blog', 'footer' ); ?>