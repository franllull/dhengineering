<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item post'); ?>>
	<h2>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>
	<div class="blog-item-meta">
		<span class="meta-date"><?php the_time( get_option('date_format') ); ?></span>
		<span class="sep">|</span>
		<span><?php _e("By", "spny" ); ?> <?php the_author(); ?>,</span>
		<?php the_category('<span class="sep">,</span>'); ?>
	</div>