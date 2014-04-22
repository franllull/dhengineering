<?php
	global $ss_prefix;
?>
<article class="portfolio-single-1 portfolio-single-1-full row">

    <div class="col-sm-12">
        <div class="portfolio-single-1-header">
            <figure>
            	<?php 
					$gallery = rwmb_meta( "{$ss_prefix}portfolio_gallery",  "type=image&size=blog-classic-fullwidth" );
					$featured_video = rwmb_meta("{$ss_prefix}portfolio_video");
				?>
				<?php if ( !empty($featured_video) ) : ?>
					<?php echo wp_oembed_get($featured_video); ?>
				<?php else : ?>
	                <div class="portfolio-single-1-slider royalSlider rsDefault">
	                	<?php
							foreach ($gallery as $slide) {
								echo '<img class="rsImg" src="' . $slide['url'] . '" width="' . $slide['width'] . '" height="' . $slide['height'] . '" />';
							}
				        ?>
	                </div>
            	<?php endif; ?>
            </figure>
        </div>
    </div>

    <div class="portfolio-info-container" >

        <div class="col-sm-8">
            <h2 class="portfolio-single-1-title"><?php the_title(); ?></h2>
            <div class="portfolio-single-1-desc ss-typography">
				<?php the_content(); ?>
            </div>
            <?php $portfolio_tags = get_terms('portfolio-tags'); ?>
			<?php if ( !empty($portfolio_tags) ) : ?>
				<div class="entry-meta tags">
					<span class="icon icon-tag2" aria-hidden="true"></span>
					<?php echo get_the_term_list( get_the_ID(), 'portfolio-tags', '', '<span class="sep">|</span>', '' ); ?>
				</div>
			<?php endif; ?>
        </div>

        <div class="col-sm-4">
            <div class="portfolio-more-info">

            	<?php
					$additional_info_title = rwmb_meta( "{$ss_prefix}additional_info_title");
					$additional_info_items = rwmb_meta( "{$ss_prefix}additional_info_items");
				?>
                <h3><?php echo $additional_info_title; ?></h3>
                <div class="entry-meta meta">
                    <?php
						$target = ":";
						$taget_length = strlen($target);
						foreach ( $additional_info_items as $item ) {
							if ( stripos($item, $target) !== false) {
								$target_pos = $taget_length + stripos($item, $target);
								$title = trim(substr($item, 0, $target_pos));
								$text = trim(substr($item, $target_pos));
								echo "<p>";;
									echo "{$title} <b>{$text}</b>";
								echo "</p>";;
							}
						}
					?>
                </div>

               <?php get_template_part( 'lib/template-parts/portfolio/portfolio-single', 'sharing' ); ?>

            </div>
        </div>

    </div>

</article>