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
				<?php the_post_thumbnail('blog-gird-4-col'); ?>
			</a>
		</figure>
	<?php endif; ?>
    <div class="blog-item-content">
        <h3><a <?php echo $target; ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="blog-item-desc">
	       <?php the_excerpt(); ?>
        </div>
        <div class="blog-item-meta">
          <span><?php comments_popup_link( '0', '1', '%', '', '-' ); ?> <?php _e("comment", "spnoy"); ?></span>
          <span class="sep">|</span>
	        <span class="meta-date"><?php the_time( get_option('date_format') ); ?></span>
        </div>
    </div>
</article>