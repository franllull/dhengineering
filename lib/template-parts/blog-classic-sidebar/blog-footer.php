		<?php
			$target = '';
			$blog_readmore_swith = ot_get_option( 'blog_readmore_swith', 'on' );
			if ( $blog_readmore_swith == 'on' ) :
				if ( ot_get_option( 'blog_new_tab_switch', 'off' ) == 'on' ) {
					$target = 'target="_blank"';
				}
		?>
			<a class="more-link" <?php echo $target; ?> href="<?php the_permalink(); ?>"><?php _e("READ MORE", "spnoy") ?></a>
		<?php endif; ?>
	</div>
</article>