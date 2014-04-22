<?php
	global $more;
	global $ss_prefix;
	global $query;
	global $ss_featured_portfolio_img_size;
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
	if ( $query && $query->current_post == 0 ) {
		$ss_class .= 'portfolio-grid-sizer ';
	}

	$term_list = wp_get_post_terms( get_the_ID(), 'portfolio-category', array("fields" => "all") );
	foreach ($term_list as $term => $value) {
		$ss_class .= $value->slug . ' ';
	}

	$template_name = get_page_template_slug( get_queried_object_id() );
	if ( !empty($ss_featured_portfolio_img_size) ) {
		$template_name = $ss_featured_portfolio_img_size;
	}
	switch ($template_name) {
		case 'template-portfolio-2col.php':
			$thumbnail_size = 'portfolio-2-col';
			break;
		
		case 'template-portfolio-2col-nogutter.php':
			$thumbnail_size = 'portfolio-2-col-nogutter';
			break;
		
		case 'template-portfolio-3col.php':
			$thumbnail_size = 'portfolio-3-col';
			break;
		
		case 'template-portfolio-3col-full.php':
			$thumbnail_size = 'portfolio-3-col-full';
			break;
		
		case 'template-portfolio-3col-nogutter.php':
			$thumbnail_size = 'portfolio-3-col-nogutter';
			break;
		
		case 'template-portfolio-4col.php':
			$thumbnail_size = 'portfolio-4-col';
			break;
		
		case 'template-portfolio-4col-nogutter.php':
			$thumbnail_size = 'portfolio-4-col-nogutter';
			break;
		
		case 'template-portfolio-4col-full.php':
			$thumbnail_size = 'portfolio-4-col-full';
			break;
		
		case 'template-portfolio-5col-nogutter.php':
			$thumbnail_size = 'portfolio-5-col-nogutter';
			break;
		
		case 'template-portfolio-5col-full.php':
			$thumbnail_size = 'portfolio-5-col-full';
			break;
		
		default:
			$thumbnail_size = 'portfolio-2-col';
			break;
	}
	
?>
<article class="portfolio-item <?php echo $ss_class; ?>">
    <div class="inner-container">
        <?php if ( has_post_thumbnail() ) : ?>
			<figure class="portfolio-item-image">
				<a href="<?php echo $portfolio_link; ?>">
					<?php the_post_thumbnail($thumbnail_size); ?>
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