		<div class="meta-soc-container">

			<?php if ( has_tag() ) : ?>
			    <div class="entry-meta tags">
			    	<span class="icon icon-tag2" aria-hidden="true"></span>
			        <?php the_tags( '', '<span class="sep">|</span>', '' ); ?>
			    </div>
		    <?php endif; ?>

			<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/single', 'sharing' ); ?>

		</div>

	</div>
</article>

<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/single', 'nav' ); ?>