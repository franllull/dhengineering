<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
	<h2>
		<?php
			$target = '';
			if ( ot_get_option( 'blog_new_tab_switch', 'off' ) == 'on' ) {
				$target = 'target="_blank"';
			}
		?>
		<a <?php echo $target; ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>
	<div class="blog-item-meta">
		<span class="meta-date"><?php the_time( get_option('date_format') ); ?></span>
		<span class="sep">|</span>
		<span><?php _e("By", "spny" ); ?> <?php the_author(); ?>,</span>
		<?php the_category('<span class="sep">,</span>'); ?>
	</div>