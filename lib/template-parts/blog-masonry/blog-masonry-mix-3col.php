<?php
	global $more;
	global $ss_prefix;
	global $query;
	$more = 0;

	$ss_class = '';
	$masonry_size = rwmb_meta("{$ss_prefix}masonry_mix_3col_size");
	$ss_class .= $masonry_size;
	if ( $query->current_post == 0 ) {  // If it's the last post (current_post starts from 0 so +1 is necessary)
		$ss_class = 'grid-sizer';
	}
	if ( $masonry_size === "two-three" ) {
		$thumbnail_size = "blog-masonry-mix-3col-two-third";
	} else {
		$thumbnail_size = "blog-masonry-3-col";
	}
	
?>
<article class="blog-item <?php echo $ss_class; ?>">
	<?php
		$target = '';
		if ( ot_get_option( 'blog_new_tab_switch', 'off' ) == 'on' ) {
			$target = 'target="_blank"';
		}
	?>
    <?php if ( has_post_thumbnail() ) : ?>
		<figure>
			<a <?php echo $target; ?> href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail($thumbnail_size); ?>
			</a>
		</figure>
	<?php endif; ?>
    <div class="blog-item-content">
        <h3><a <?php echo $target; ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="blog-item-desc">
	       <?php echo strip_tags(get_the_content(''), '<p><a>'); ?>
        </div>
        <div class="blog-item-meta">
          <span><?php comments_popup_link( '0', '1', '%', '', '-' ); ?> <?php _e("comment", "spnoy"); ?></span>
          <span class="sep">|</span>
	        <span class="meta-date"><?php the_time( get_option('date_format') ); ?></span>
        </div>
    </div>
</article>