<?php
	global $more;
	$more = 0;
?>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/blog', 'header' ); ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('general-size'); ?>
			</a>
		</figure>
	<?php endif; ?>
	<div class="blog-item-content">
		<div class="blog-item-desc">
			 <?php the_excerpt(); ?>
		</div>
	<div class="blog-item-meta">
		<span class="cat"><?php the_category('');?></span><span class="meta-date"><?php the_time('F Y') ?> </span>
        	</div>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/blog', 'footer' ); ?>
