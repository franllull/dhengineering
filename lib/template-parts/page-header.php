<?php
	global $ss_prefix;
	global $archive_title;

	$page_title = rwmb_meta("{$ss_prefix}page_title");
	$page_header = rwmb_meta("{$ss_prefix}page_header_switch");
	$page_header_effect = rwmb_meta("{$ss_prefix}page_header_effect_switch");
	$breadcrumbs_switch = rwmb_meta("{$ss_prefix}breadcrumbs_switch");
	$left_line_effect = '';
	$right_line_effect = '';
	$title_effect = '';
	$effect_class = '';

	if ( !empty($archive_title) ) {
		$page_title = $archive_title ;
		$page_header = 1;
	}
	if ( is_search() ) {
		$page_title = __("Search for ", "spnoy") . '&#8216;' . get_search_query() . '&#8217;' ;
		$page_header = 1;
	}
	if ( is_home() ) {
		$page_title = __("BLOG", "spnoy");
		$page_header = 1;
	}
	if ( !empty($page_header_effect) ) {
		$effect_class = 'ss-effect';
		$left_line_effect = ' data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-offset="2" ';
		$right_line_effect = ' data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-offset="2" ';
		$title_effect = ' data-ss-effect="fade-from-top" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2" ';
	}
?>

<?php if ( !empty($page_header) ) : ?>

	<div class="section-header">
		<div class="section-header-inner">
			<div class="section-heading-left-line <?php echo $effect_class; ?> " <?php echo $left_line_effect; ?> ></div>
			<h1 class="section-heading <?php echo $effect_class; ?> " <?php echo $title_effect; ?> >
				<span><?php echo $page_title; ?></span>
			</h1>
			<div class="section-heading-right-line <?php echo $effect_class; ?> " <?php echo $right_line_effect; ?> ></div>
		</div>
		<?php if ( !empty($breadcrumbs_switch) ) : ?>
			<div class="theme-breadcrumbs-container">
				<?php ss_breadcrumbs(); ?>
			</div>
		<?php endif; ?>
	</div>

<?php endif; ?>