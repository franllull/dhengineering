<?php


/*-----------------------------------------------------------------------------------*/
/*	Set WordPress JPEG Image Compression
/*-----------------------------------------------------------------------------------*/

add_filter( 'after_setup_theme', 'ss_set_image_quality', 10 );

$ss_wordpress_image_quality = '';

function ss_set_image_quality() {
	global $ss_wordpress_image_quality;
	$ss_wordpress_image_quality = ot_get_option( 'image_quality', '90' );
	function ss_image_quality( $quality ) {
		global $ss_wordpress_image_quality;
		return $ss_wordpress_image_quality;
	}
	add_filter( 'jpeg_quality', 'ss_image_quality' );
	add_filter( 'wp_editor_set_quality', 'ss_image_quality' );
}


/*-----------------------------------------------------------------------------------*/
/*	Theme Mime Types
/*-----------------------------------------------------------------------------------*/

add_filter('upload_mimes', 'ss_mime_types');

function ss_mime_types($mimes) {
	$mimes['ttf'] = 'font/ttf';
	$mimes['woff'] = 'font/woff';
	$mimes['eot'] = 'font/eot';
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}


/*-----------------------------------------------------------------------------------*/
/*	Define Content Width
/*-----------------------------------------------------------------------------------*/
	
if ( !isset($content_width) ) {
	$content_width = 750;
}


/*-----------------------------------------------------------------------------------*/
/*	Add RSS Links to head section
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/*	Set Blog Cookie
/*-----------------------------------------------------------------------------------*/

// Used in blog templates, Can't use init action, Page template is not yet defined
function ss_blog_cooklie() { 

	$cookie_name = 'ss_blog_cookie';

	if ( is_page_template('template-blog-classic-sidebar.php') ) {
		$cookie_value = 'template-blog-classic-sidebar.php';
		setcookie($cookie_name, $cookie_value, time()+3600*24, '/');
	} elseif ( is_page_template('template-blog-classic-fullwidth.php') ) {
		$cookie_value = 'template-blog-classic-fullwidth.php';
		setcookie($cookie_name, $cookie_value, time()+3600*24, '/');
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Pings Styling
/*-----------------------------------------------------------------------------------*/

function theme_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
	<?php 
}


/*-----------------------------------------------------------------------------------*/
/*	Comments Styling
/*-----------------------------------------------------------------------------------*/

function theme_comment($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

		<div id="comment-<?php comment_ID(); ?>">
			
			<div class="avatar-border"><?php echo get_avatar($comment,$size='70'); ?></div>
			
			<div class="comment-meta commentmetadata">
				<span class="comment-author vcard">
					<?php if( $comment->comment_parent ) {
						$parent = get_comment( $comment->comment_parent );
						$parent_author = ($parent->comment_author) ? $parent->comment_author : __('Anonymous', 'spnoy');
						printf('<cite class="fn">%s</cite>', get_comment_author_link());
						_e(' Replied to ', 'spnoy');
						echo '<cite class="fn">' . $parent_author . '</cite>';
					} else {
						printf('<cite class="fn">%s</cite>', get_comment_author_link());                     
					} ?>
				</span>
				
				<?php $reply_text = __('[Reply]' , 'spnoy'); ?>
				<?php comment_reply_link(array_merge( $args, array( 'reply_text' => $reply_text, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				<a class="comment-time desktop" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php echo get_comment_date(); ?></a>
			</div>

			<?php if ($comment->comment_approved == '0') : ?>
				<em class="moderation"><?php _e('Your comment is awaiting moderation.', 'spnoy') ?></em><br />
			<?php endif; ?>

			<div class="comment-body ss-typography">
				<?php comment_text() ?>
			</div>

			<span class="comment-triangle"></span>

		</div>
<?php } ?>