<!DOCTYPE html>
<?php
	global $ss_prefix;
	$responsive_switch = ot_get_option( 'responsive_switch', 'on' );
	$logo = ot_get_option( 'logo', '' );
	$logo_svg = ot_get_option( 'logo_svg', '' );
?>
<html class="no-js" <?php language_attributes(); ?> >

<!-- BEGIN head -->
<head>

	<!-- Meta Tags -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<?php if ( $responsive_switch == 'on' ) { ?>
		<meta name="viewport" content="width=device-width,initial-scale=1">
	<?php } else { ?>
		<meta name="viewport" content="width=1170">
	<?php } ?>	
	 
	 
	<!-- Title -->
	<title><?php bloginfo( 'name' ); ?><?php if (is_front_page()) { echo ' - '; bloginfo('description'); } else { wp_title('-'); } ?></title>


	<!-- Favicons -->
	<?php
		$favicon_16 = ot_get_option( 'favicon_16', '' );
		$favicon_57 = ot_get_option( 'favicon_57', '' );
		$favicon_114 = ot_get_option( 'favicon_114', '' );
		$favicon_72 = ot_get_option( 'favicon_72', '' );
		$favicon_144 = ot_get_option( 'favicon_144', '' );
	?>
	<?php if ( !empty($favicon_16) ) : ?>
		<link rel="shortcut icon" href="<?php echo $favicon_16; ?>">
	<?php endif; ?>
	<?php if ( !empty($favicon_57) ) : ?>
		<link rel="apple-touch-icon" href="<?php echo $favicon_57; ?>">
	<?php endif; ?>
	<?php if ( !empty($favicon_114) ) : ?>
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $favicon_114; ?>">
	<?php endif; ?>
	<?php if ( !empty($favicon_72)) : ?>
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $favicon_72; ?>">
	<?php endif; ?>
	<?php if ( !empty($favicon_144)  ) : ?>
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $favicon_144; ?>">
	<?php endif; ?>


	<!-- Pingback -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lte IE 9]
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>

<!-- END head -->
</head>
<?php
	$ss_class = "";
	$template_name = get_page_template_slug();
	if ( $template_name == "template-home.php" ) {
		$ss_class .= "ss-home ";
	}
?>
<body <?php body_class($ss_class); ?>>

	<!--[if lte IE 8]>
		<div class="browser-notice">
			<?php _e( 'You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'spnoy'); ?>
		</div>
	<![endif]-->

	<noscript class="browser-noscript">
		<?php _e( 'Please Turn On JavaScript For Seeing This Website Properly.', 'spnoy'); ?>
	</noscript>

	<div id="wrapper">

		<header class="main-header">
			<div class="container">
				<div class="header" >
					<div class="row">
						<div class="col-sm-12">
							<div class="logo">
								<a href="<?php echo home_url(); ?>">
									<?php if ( !empty($logo) ) : ?>
										<img src="<?php echo $logo; ?>" data-svg="<?php echo $logo_svg; ?>" alt="<?php bloginfo('name'); ?>">
									<?php else: ?>
										<img src="<?php echo THEME_IMAGES; ?>/logo.png" alt="<?php bloginfo('name'); ?>">
									<?php endif; ?>
								</a>
							</div>
							<nav class="main-navigation-container">
								<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
									<?php wp_nav_menu( array('theme_location' => 'primary-menu', 'container' => false, 'menu_id' => 'main-navigation', 'menu_class' => 'main-navigation') ); ?>
								<?php else: ?>
									<?php echo '<div class="setup-menu-notice">' . __('Please setup "Main Navigation" in Dashboard > Appearance > Menus.', 'spnoy') . '</div>'; ?>
								<?php endif; ?>
							</nav>
							<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
								<a href="#" class="ss-mobile-menu-button">
									<span class="icon-menu2" aria-hidden="true"></span>
									<?php _e("MENU", "spnoy"); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</header>