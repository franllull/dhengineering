<?php get_header() ?>

<section class="section-content-container right-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<?php
					$archive_title = '';

					if ( is_category() ) {
						$archive_title .= __('Archive for ', 'spnoy') . '&#8216;' . single_cat_title( '', false) . '&#8217;';
					} elseif ( is_tag() ) {
						$archive_title .= __('Posts Tagged ', 'spnoy') . '&#8216;' . single_tag_title( '', false) . '&#8217;';
					} elseif ( is_day() ) {
						$archive_title .= __('Archive for ', 'spnoy') . '&#8216;' . get_the_time( get_option('date_format') ) . '&#8217;';
					} elseif ( is_month() ) {
						$archive_title .= __('Archive for ', 'spnoy') . '&#8216;' . get_the_time( get_option('date_format') ) . '&#8217;';
					} elseif ( is_year() ) {
						$archive_title .= __('Archive for ', 'spnoy') . '&#8216;' . get_the_time( get_option('date_format') ) . '&#8217;';
					} elseif ( is_author() ) {
						$archive_title .= __('Author Archive', 'spnoy');
					} elseif ( is_tax( 'portfolio-category' ) ) {
						$archive_title .= __('Archive for ', 'spnoy') . '&#8216;' . __("Portfolio Category", 'spnoy') . '&#8217;';
					} elseif ( is_tax( 'portfolio-tags' ) ) {
						$archive_title .= __('Archive for ', 'spnoy') . '&#8216;' . __("Portfolio Tags", 'spnoy') . '&#8217;';
					} elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) {
						$archive_title .= __('Blog Archives', 'spnoy');
					}
				?>

				<?php get_template_part( 'lib/template-parts/page-header' ); ?>

				<div class="section-content">
					<div class="row">

						<div class="col-sm-8">
							<div class="blog-container blog-normal">

								<?php if ( have_posts() ) : while ( have_posts() ) :  the_post(); ?>
								
									<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/blog' ); ?>

								<?php endwhile; ?>
								<?php else : ?>

									<h2><?php _e('Not Found', 'spnoy') ?></h2>

								<?php endif; ?>

								<?php wp_reset_query();  // Reset query to default, Important ?>

							</div>

							<div class="hidden"><?php posts_nav_link(); ?></div>
							<?php ss_pagination(); ?>

						</div>

						<?php get_sidebar(); ?>
						
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
	
<?php get_footer(); ?>