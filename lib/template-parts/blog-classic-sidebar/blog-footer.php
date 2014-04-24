		<?php
			$target = '';
			$blog_readmore_swith = ot_get_option( 'blog_readmore_swith', 'on' );
			if ( $blog_readmore_swith == 'on' ) :
				if ( ot_get_option( 'blog_new_tab_switch', 'off' ) == 'on' ) {
					$target = 'target="_blank"';
				}
		?>
		<?php endif; ?>
	</div>
</article>