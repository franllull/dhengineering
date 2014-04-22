<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/single', 'header' ); ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure>
			<?php the_post_thumbnail('general-size'); ?>
		</figure>
	<?php endif; ?>
	<div class="blog-item-content">
		<div class="entry-item-desc ss-typography">
			<?php the_content(); ?>
		</div>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/single', 'footer' ); ?>