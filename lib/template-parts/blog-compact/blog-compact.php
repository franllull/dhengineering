<?php
	global $more;
	$more = 0;
?>
<article class="blog-item">
    <?php if ( has_post_thumbnail() ) : ?>
		<figure>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('blog-compact'); ?>
			</a>
		</figure>
	<?php endif; ?>
    <div class="blog-item-content">
    	<?php
    		$target = '';
			if ( ot_get_option( 'blog_new_tab_switch', 'off' ) == 'on' ) {
				$target = 'target="_blank"';
			}
		?>
        <h2><a <?php echo $target; ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="blog-item-meta">
	        <span class="meta-date"><?php the_time( get_option('date_format') ); ?></span>
	        <span class="sep">|</span>
	        <span><?php _e("BY", "spnoy" ); ?> <?php the_author(); ?></span>
	        <span class="sep">|</span>
	        <span><?php the_category('<span class="sep">,</span>'); ?></span>
	    </div>
        <div class="blog-item-desc">
	      	<?php the_content(''); ?>
        </div>
    </div>
</article>


