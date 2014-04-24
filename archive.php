<?php get_header() ?>

<section class="section-content-container right-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<?php
					$archive_title = '';

					if ( is_category() ) {
						$archive_title .= single_cat_title( '', false);
					} elseif ( is_tag() ) {
						$archive_title .= __('Posts Tagged ', 'spnoy') . single_tag_title( '', false);
					} elseif ( is_day() ) {
						$archive_title .= get_the_time( get_option('date_format') );
					} elseif ( is_month() ) {
						$archive_title .= get_the_time( get_option('date_format') );
					} elseif ( is_year() ) {
						$archive_title .= get_the_time( get_option('date_format') );
					} elseif ( is_author() ) {
						$archive_title .= get_avatar( get_the_author_meta( 'ID' ), 100 ) . get_the_author();
					} elseif ( is_tax( 'portfolio-category' ) ) {
						$archive_title .= __("Portfolio Category", 'spnoy');
					} elseif ( is_tax( 'portfolio-tags' ) ) {
						$archive_title .= __("Portfolio Tags", 'spnoy');
					} elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) {
						$archive_title .= __('Blog Archives', 'spnoy');
					}
				?>

				<?php get_template_part( 'lib/template-parts/page-header' ); ?>

				<div class="section-content">
					<div class="row">
						<div class="col-sm-8 col-md-offset-2">
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
						
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
	
<?php get_footer(); ?>