<?php
	global $ss_prefix;
?>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/single', 'header' ); ?>
<div class="blog-item-content">
	<div class="entry-item-desc ss-typography">
		<?php
			$link = rwmb_meta( "{$ss_prefix}post_link" );
			echo '<div class="post-link"><a href="' . $link . '">' . $link . '</a></div>';
		?>
		<?php the_content(); ?>
	</div>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/single', 'footer' ); ?>