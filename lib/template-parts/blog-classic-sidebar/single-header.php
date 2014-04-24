<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item post'); ?>>
	<h2>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>
	<div class="blog-item-meta row">
		<div class="meta-space col-sm-6">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?><?php the_author_posts_link(); ?> in  <?php the_time('F Y') ?> 
		</div>
		<div class="meta-space cat col-sm-6"><?php the_category('  '); ?></div>
	</div>
