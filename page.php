<?php get_header() ?>

<section class="section-content-container right-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <?php get_template_part( 'lib/template-parts/page-header' ); ?>

                <div class="section-content">
                    <div class="row">
                    	<?php if ( have_posts() ) : while ( have_posts() ) :  the_post(); ?>
	                        <div class="col-sm-8">
	                           <article class="ss-typography">
									<?php the_content(); ?>
									<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
	                           </article>
	                           <?php comments_template('', true); ?>
	                        </div>
	                        <?php get_sidebar(); ?>
	                    <?php endwhile; endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
	
<?php get_footer(); ?>