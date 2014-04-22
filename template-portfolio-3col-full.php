<?php
/*
Template Name: Portfolio - 3 Columns - Full
*/
?>

<?php get_header() ?>

<section class="section-content-container">

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php get_template_part( 'lib/template-parts/page-header' ); ?>
			</div>
		</div>
	</div>

	<div class="section-content">
		
		<?php
			global $ss_prefix;
			$is_template_full = true;  // Used in portfolio-filterbar.php
			$portfolio_per_page = rwmb_meta("{$ss_prefix}portfolio_per_page");
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$selected_cat = rwmb_meta( "{$ss_prefix}portfolio_page_categories_not" , "type=taxonomy&taxonomy=portfolio-category");
			$cat_slug = array();
			foreach ($selected_cat as $cat) {
				array_push($cat_slug, $cat->term_id);
			}
			$args = array(
				'post_type' => 'portfolio',
				'posts_per_page' => $portfolio_per_page,
				'paged' => $paged,
				'category__not_in' => $cat_slug
			);

			$query = new WP_Query($args);
		?>
		
		<?php get_template_part( 'lib/template-parts/portfolio/portfolio-filterbar' ); ?>

		<div class="portfolio-items-container portfolio-3col-nogutter filtering-on">

			<?php if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post(); ?>

				<?php get_template_part( 'lib/template-parts/portfolio/portfolio' ); ?>

			<?php endwhile; ?>
			<?php else : ?>

				<h2><?php _e('Not Found', 'spnoy') ?></h2>

			<?php endif; ?>

			<?php wp_reset_query();  // Reset query to default, Important ?>

		</div>

		<div class="hidden"><?php posts_nav_link(); ?></div>
		<?php ss_pagination($query->max_num_pages); ?>

	</div>

</section>
	
<?php get_footer(); ?>