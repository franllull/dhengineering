<?php
	$portfolio_sharing_switch = ot_get_option( 'portfolio_sharing_switch', 'off' );
	$active_sharing_buttons = ot_get_option( 'portfolio_sharing_buttons', '' );
	if( $portfolio_sharing_switch == "on" ) {
?>
	<div class="social-sharing">
		<ul>
			<?php if ( in_array('facebook', $active_sharing_buttons) ) { ?>
				<li><a title="<?php _e( 'Share on Facebook' , 'spnoy' ); ?>" class="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank">
					<span class="icon-facebook" aria-hidden="true"></span>
				</a></li>
			<?php } ?>
			<?php if ( in_array('twitter', $active_sharing_buttons) ) { ?>
				<li><a title="<?php _e( 'Share on Twitter' , 'spnoy' ); ?>" class="twitter" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank">
					<span class="icon-twitter" aria-hidden="true"></span>
				</a></li>
			<?php } ?>
			<?php if ( in_array('gplus', $active_sharing_buttons) ) { ?>
				<li><a title="<?php _e( 'Share on Google+' , 'spnoy' ); ?>" class="gplus" class="gplus" href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" target="_blank">
					<span class="icon-google-plus" aria-hidden="true"></span>
				</a></li>
			<?php } ?>
			<?php if ( in_array('reddit', $active_sharing_buttons) ) { ?>
				<li><a title="<?php _e( 'Share on reddit' , 'spnoy' ); ?>" class="reddit" href="http://www.reddit.com/submit?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" target="_blank">
					<span class="icon-reddit" aria-hidden="true"></span>
				</a></li>
			<?php } ?>
			<?php if ( in_array('linkedin', $active_sharing_buttons) ) { ?>
				<li><a title="<?php _e( 'Share on Linkedin' , 'spnoy' ); ?>" class="linkedin" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title();?>" target="_blank">
					<span class="icon-linkedin" aria-hidden="true"></span>
				</a></li>
			<?php } ?>
			<?php if (in_array('email', $active_sharing_buttons) ) { ?>
				<li><a title="<?php _e( 'Share on Email' , 'spnoy' ); ?>" class="mail" href="mailto:?subject=<?php the_title();?>&amp;body=<?php the_permalink() ?>" target="_blank">
					<span class="icon-envelope3" aria-hidden="true"></span>
				</a></li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>