<?php
	global $more;
	$more = 0;
?>
<?php get_template_part( 'lib/template-parts/blog-classic-fullwidth/blog', 'header' ); ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('blog-classic-fullwidth'); ?>
			</a>
		</figure>
	<?php endif; ?>
	<div class="blog-item-content">
		<div class="blog-item-desc ss-typography">
			<?php the_excerpt(); ?>
		</div>
<?php get_template_part( 'lib/template-parts/blog-classic-fullwidth/blog', 'footer' ); ?>