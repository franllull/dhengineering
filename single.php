<?php
	global $ss_prefix;
	// $blog_id = '';
	// if ( get_option('page_for_posts') ) {  // Get blog page from "Settings > Reading"
	// 	$blog_id = get_option('page_for_posts');
	// }
	// $cookie_name = 'ss_blog_cookie';
	// if ( isset($_COOKIE[$cookie_name]) ) {
	// 	$blog_template = $_COOKIE[$cookie_name];
	// } else {
	// 	$blog_template = get_page_template_slug($blog_id);
	// }
	$post_layout = rwmb_meta("{$ss_prefix}post_layout");
	
?>
<?php get_header() ?>

<section class="section-content-container right-sidebar">
	<div class="container">
	    <div class="row">
	        <div class="col-sm-12">

	        	<?php get_template_part( 'lib/template-parts/page-header' ); ?>

	        	<div class="section-content" >
	        		
					<?php if ($post_layout == "fullwidth") : ?>
						 <div class="row">
		                    <div class="col-sm-12">
		                        <div class="blog-container blog-single">
									<?php if ( have_posts() ) : while ( have_posts() ) :  the_post(); ?>
										<?php get_template_part( 'lib/template-parts/blog-classic-fullwidth/single', get_post_format() ); ?>
										<?php comments_template('', true); ?>
									<?php endwhile; endif; ?>
								</div>
							</div>
						</div>
					<?php else: ?>
		                <div class="row">
		                    <div class="col-sm-8">
		                        <div class="blog-container blog-single">
									<?php if ( have_posts() ) : while ( have_posts() ) :  the_post(); ?>
										<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/single', get_post_format() ); ?>
										<?php comments_template('', true); ?>
									<?php endwhile; endif; ?>
								</div>
							</div>
							<?php get_sidebar(); ?>
						</div>
					<?php endif; ?>
					
				</div>

			</div>
		</div>
	</div>
</section>
	
<?php get_footer(); ?>