<?php if (  ot_get_option( 'portfolio_related_switch', 'on' ) == 'on' ) : ?>
	
	<?php
		$terms = get_the_terms( $post->ID , 'portfolio-category');
		if ( is_array($terms) ) {
			$term_ids = array_values( wp_list_pluck( $terms,'term_id' ) );
		}
		$args = array( 
			'post_type' => 'portfolio',
			'tax_query' => array(
				array(
					'taxonomy' => 'portfolio-category',
					'field' => 'id',
					'terms' => $term_ids
				)
			),
			'posts_per_page' => 3,
			'ignore_sticky_posts' => 1,
			'orderby' => 'date',
			'post__not_in' => array($post->ID)
		);

		$query = new WP_Query($args);
	?>

	<section class="section-content-container related-portfolio" style="background-color: #f0f0f0; color: #133939; padding-top: 60px; padding-bottom: 90px; margin-top: 0;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<div class="section-header-2">
						<div class="section-header-2-inner">
							<h4><?php _e("Most Recent Projects", "spnoy"); ?></h4>
							<div class="ss-sec-separator">
								<div class="ss-sec-separator-inner">
									<div class="ss-sec-separator-left-line"></div>
									<span class="icon icon-heart3" aria-hidden="true"></span>
									<div class="ss-sec-separator-right-line"></div>
								</div>
							</div>
							<div class="gap" data-height-size="60px"></div>
						</div>
					</div>

					<div class="section-content" >
						<div class="portfolio-items-container portfolio-3col-gutter filtering-on">
							<?php if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post(); ?>
								<?php if ( has_post_thumbnail() ) : ?>
									<?php get_template_part( 'lib/template-parts/portfolio/portfolio' ); ?>
								<?php endif; ?>
							<?php endwhile; ?><?php endif; ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

<?php endif; ?>