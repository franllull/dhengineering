<?php
	global $ss_prefix;
	global $more;
	$more = 0;
?>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/blog', 'header' ); ?>
<figure>
	<?php 
		$gallery = rwmb_meta( "{$ss_prefix}post_gallery",  "type=image&size=general-size" );
	?>
	<div class="royalSlider rsDefault">
        <?php
			foreach ($gallery as $slide) {
				echo '<img class="rsImg" src="' . $slide['url'] . '" width="' . $slide['width'] . '" height="' . $slide['height'] . '" />';
			}
        ?>
    </div>
</figure>
<div class="blog-item-content">
	<div class="blog-item-desc ss-typography">
		<?php the_content(''); ?>
	</div>
<?php get_template_part( 'lib/template-parts/blog-classic-sidebar/blog', 'footer' ); ?>