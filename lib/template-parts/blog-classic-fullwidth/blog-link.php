<?php
	global $ss_prefix;
	global $more;
	$more = 0;
?>
<?php get_template_part( 'lib/template-parts/blog-classic-fullwidth/blog', 'header' ); ?>
<div class="blog-item-content">
	<div class="blog-item-desc ss-typography">
		<?php
			$link = rwmb_meta( "{$ss_prefix}post_link" );
			echo '<div class="post-link"><a href="' . $link . '">' . $link . '</a></div>';
		?>
		<?php the_content(''); ?>
	</div>
<?php get_template_part( 'lib/template-parts/blog-classic-fullwidth/blog', 'footer' ); ?>