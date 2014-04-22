<?php
	global $more;
	global $ss_prefix;
	global $query;
	$more = 0;

	$ss_class = '';
	$featured_video = rwmb_meta("{$ss_prefix}portfolio_video");
	$portfolio_link = rwmb_meta("{$ss_prefix}portfolio_link");
	if ( !empty($featured_video) ) {
		$lightbox_url = $featured_video;
		$lightbox_class = 'mfp-iframe';
	} else {
		$lightbox_url = wp_get_attachment_url( get_post_thumbnail_id() );
		$lightbox_class = 'mfp-image';
	}
	if ( empty($portfolio_link) ) {
		$portfolio_link = get_permalink();
	}
	if ( $query->current_post == 0 ) {
		$ss_class .= 'portfolio-grid-sizer ';
	}

	$term_list = wp_get_post_terms( get_the_ID(), 'portfolio-category', array("fields" => "all") );
	foreach ($term_list as $term => $value) {
		$ss_class .= $value->slug . ' ';
	}
?>
<article class="portfolio-item <?php echo $ss_class; ?>">
    <div class="inner-container">
        <?php if ( has_post_thumbnail() ) : ?>
			<figure class="portfolio-item-image">
				<a href="<?php echo $portfolio_link; ?>">
					<?php the_post_thumbnail('portfolio-3-col'); ?>
				</a>
			</figure>
		<?php endif; ?>
        <div class="portfolio-item-overlay">
            <div class="item-overlay-center">
                <div class="item-buttons">
                    <div class="item-view">
                        <a class="item-format <?php echo $lightbox_class; ?>" href="<?php echo $lightbox_url; ?>">
                        	<?php if ( $lightbox_class == 'mfp-image') : ?>
                            	<span class="icon-expand2" aria-hidden="true"></span>
                            <?php else: ?>
                            	<span class="icon-play2" aria-hidden="true"></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="item-link">
                        <a href="<?php echo $portfolio_link; ?>">
                            <span class="icon-link4" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                <h3><a href="<?php echo $portfolio_link; ?>"><?php the_title(); ?></a></h3>
            </div>
        </div>
    </div>
</article>