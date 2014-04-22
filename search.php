<?php get_header() ?>

<section class="section-content-container right-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

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