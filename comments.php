<?php
/*-----------------------------------------------------------------------------------*/
/*  Begin processing comments
/*-----------------------------------------------------------------------------------*/
?>

<?php
	$switch = true;
	if ( is_page() ) {
		$switch = ot_get_option( 'pages_comments_switch', 'on' );
	}
	if ( is_singular('portfolio') ) {
		$switch = ot_get_option( 'portfolio_comments_switch', 'off' );
	}
	if ( $switch == "on" ) :
?>

<!-- BEGIN #comments -->
<div id="wp-comments">
<?php 
    /* Password protected? ----------------------------------------------------------*/
    if ( post_password_required() ) : 
?>
    	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'spnoy'); ?></p>
        </div><!-- #comments -->
<?php
	/* Stop processing comments.php, but don't kill the script entirely -------------*/
		return;
	endif;

/*-----------------------------------------------------------------------------------*/
/*	Display the Comments & Pings
/*-----------------------------------------------------------------------------------*/

	if ( have_comments() ) :
	
        /* Display Comments ---------------------------------------------------------*/    
        if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>
			
			<div class="comments-title">
				<span><?php comments_number( '0', '1', '%' ); ?></span> <?php _e('Comments', 'spnoy');?>
			</div>
			
        	<ul class="comments-list">
            <?php wp_list_comments( 'type=comment&callback=theme_comment&max_depth=3' ); ?>
            </ul>

        <?php endif; // end normal comments 
        
        /* Display Pings -------------------------------------------------------------*/
        if ( ! empty($comments_by_type['pings']) ) : // if there are pings ?>
		
    		<h3 class="pings-title"><?php _e('Trackbacks for this post', 'spnoy') ?></h3>
		
    		<ol class="pinglist">
            <?php wp_list_comments( 'type=pings&callback=theme_pings' ); ?>
            </ol>

        <?php endif; // end pings 
		
		/* Display Comment Navigation -----------------------------------------------*/
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    		<div class="comment-navigation">
    			<div class="nav-previous"><?php previous_comments_link(); ?></div>
    			<div class="nav-next"><?php next_comments_link(); ?></div>
    		</div>
		<?php endif; // end comment pagination check
		
		
/*-----------------------------------------------------------------------------------*/
/*	Deal with no comments or closed comments
/*-----------------------------------------------------------------------------------*/
	elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		
		<p class="nocomments"><?php _e('Comments are closed.', 'spnoy') ?></p>
		
	<?php endif;

/*-----------------------------------------------------------------------------------*/
/*	Comment Form
/*-----------------------------------------------------------------------------------*/

	if ( comments_open() ) : 

		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		//Custom Fields
		$fields =  array(
			'author'=> '<div id="respond-inputs"><p><input name="author" type="text" placeholder="' . __('Name (required)', 'spnoy') . '" size="30"' . $aria_req . ' /></p>',
			'email' => '<p><input name="email" type="text" placeholder="' . __('E-Mail (required)', 'spnoy') . '" size="30"' . $aria_req . ' /></p>',
			'url' 	=> '<p class="last"><input name="url" type="text" placeholder="' . __('Website', 'spnoy') . '" size="30" /></p></div>',
		);

	    $comments_args = array(
	    	'fields' => $fields,
            'comment_field' => '<div id="comment-text"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . __('Your Message', 'spnoy') . '"></textarea></div>',
            'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'spnoy'), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>', 'spnoy'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'title_reply' => __('Leave a Comment', 'spnoy'),
            'title_reply_to' => __('Leave a Reply to %s', 'spnoy'),
            'cancel_reply_link' => __('Cancel Reply', 'spnoy'),
            'label_submit' => __('Post Comment', 'spnoy')
	    );
		    	
	    comment_form($comments_args);

	endif; // end if comments open check ?>
	
<!-- END #comments -->
</div>
<?php endif; ?>