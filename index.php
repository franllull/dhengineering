<?php get_header() ?>
<div class="mainslider">
	<?php putRevSlider( "main" ) ?>
</div>

<section class="section-content-container right-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<?php get_template_part( 'lib/template-parts/page-header' ); ?>

				<div class="section-content">
					<div class="row">
						<div class="col-sm-8">

							<div class="blog-container blog-normal">
								<?php
									$paged = get_query_var('paged') ? get_query_var('paged') : 1;
									$args = array(
										'post_type' => 'post',
										'paged' => $paged,
									);

									$query = new WP_Query($args);
								?>
								<?php if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post(); ?>
								
									<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/blog', get_post_format() ); ?>

								<?php endwhile; ?>
								<?php else : ?>

									<h2><?php _e('Not Found', 'spnoy') ?></h2>

								<?php endif; ?>

								<?php wp_reset_query(); ?>

							</div>

							<div class="hidden"><?php posts_nav_link(); ?></div>
							<?php ss_pagination($query->max_num_pages); ?>

						</div>

						<?php get_sidebar(); ?>
						
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
	
<?php get_footer(); ?>
