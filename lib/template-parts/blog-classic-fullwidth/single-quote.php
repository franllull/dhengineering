<?php
	global $ss_prefix;
?>
<?php get_template_part( 'lib/template-parts/blog-classic-fullwidth/single', 'header' ); ?>
<div class="blog-item-content">
	<div class="entry-item-desc ss-typography">
		<?php
			$quote_source = rwmb_meta( "{$ss_prefix}post_quote_source" );
			$quote_content = rwmb_meta( "{$ss_prefix}post_quote_content" );
		?>
		<?php if ( !empty($quote_content) ) : ?>
			<div class="post-quote ss-testimonial-item ss-item-box active">
				<p><?php echo $quote_content; ?></p>
				<span>- <span class="ss-testimonial-skills"><?php echo $quote_source; ?></span></span>
			</div>
		<?php endif; ?>
		<?php the_content(); ?>
	</div>
<?php get_template_part( 'lib/template-parts/blog-classic-fullwidth/single', 'footer' ); ?>