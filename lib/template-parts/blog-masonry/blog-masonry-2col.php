<?php
	global $more;
	$more = 0;
?>
<article class="blog-item">
	<?php
		$target = '';
		if ( ot_get_option( 'blog_new_tab_switch', 'off' ) == 'on' ) {
			$target = 'target="_blank"';
		}
	?>
    <?php if ( has_post_thumbnail() ) : ?>
		<figure>
			<a <?php echo $target; ?> href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('blog-masonry-2-col'); ?>
			</a>
		</figure>
	<?php endif; ?>
    <div class="blog-item-content">
        <h3><a <?php echo $target; ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <span class="by"> by <?php the_author_posts_link(); ?> </span>
        <div class="blog-item-desc">
	       <?php the_excerpt(); ?>
        </div>
        <div class="blog-item-meta">
	<span class="cat"><?php the_category('');?></span><span class="meta-date"><?php the_time('F Y') ?> </span>
        </div>
    </div>
</article>
