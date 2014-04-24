<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
	<h3>
		<?php
			$target = '';
			if ( ot_get_option( 'blog_new_tab_switch', 'off' ) == 'on' ) {
				$target = 'target="_blank"';
			}
		?>
		<a <?php echo $target; ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
	<span class="by"> by <?php the_author_posts_link(); ?> </span>	