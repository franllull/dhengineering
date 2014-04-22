<?php
	global $ss_prefix;
	global $cat_slug;
	global $is_template_full;

	$ss_class = "";
	if ( $is_template_full ) {
		$ss_class .= "center-align ";
	}
	$terms = get_terms("portfolio-category");
	$count = count($terms);
	$portfolio_filter_bar = rwmb_meta("{$ss_prefix}portfolio_filter_bar");
?>
<?php if ( $count > 0 && !empty($portfolio_filter_bar) ) : ?>
	<div class="portfolio-button-group <?php echo $ss_class; ?>">
        <label class="radio-input-checked"><input type="radio" name="portfolio-radios" value="*" checked><?php _e('All', 'spnoy') ?></label>
        <?php
			foreach ( $terms as $term ) {
				if ( !(in_array( $term->slug, $cat_slug)) ) {
					echo '<label><input type="radio" name="portfolio-radios" value=".' . $term->slug . '">' . $term->name . '</label>';
				}
			}
		?>
    </div>
<?php endif; ?>