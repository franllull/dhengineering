<?php
	global $ss_prefix;
?>
<?php get_header() ?>

<section class="section-content-container">
	<div class="container">
	    <div class="row">
	        <div class="col-sm-12">

	        	<?php get_template_part( 'lib/template-parts/page-header' ); ?>

	        	<div class="section-content" >

	        		<?php if ( have_posts() ) : while ( have_posts() ) :  the_post(); ?>

					<?php
						$layout = rwmb_meta("{$ss_prefix}portfolio_layout");
						switch ($layout) {
							case 'layout-two-third':
								get_template_part( 'lib/template-parts/portfolio/portfolio-single', 'two-third' );
								break;

							case 'layout-fullwidth':
								get_template_part( 'lib/template-parts/portfolio/portfolio-single', 'fullwidth' );
								break;
							
							default:
								get_template_part( 'lib/template-parts/portfolio/portfolio-single', 'two-third' );
								break;
						}
					?>

					<?php endwhile; endif; ?>

					<?php comments_template('', true); ?>

				</div>

			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'lib/template-parts/portfolio/portfolio-single-related-posts' ); ?>
	
<?php get_footer(); ?>