<?php
/*
Template Name: Home
*/
?>
<?php get_header() ?>

	<?php
		global $ss_prefix;
		$args = array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
			'post_parent'    => $post->ID,
			'order'          => 'ASC',
			'orderby'        => 'menu_order'
		);
		$first = true;
		$query = new WP_Query($args);
	?>
		
	<?php if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post(); ?>

		<?php
			$page_title = rwmb_meta("{$ss_prefix}page_header_switch");

			$ss_class = '';
			$ss_style = '';
			$ss_data_attr = '';

			$template_name = get_page_template_slug( get_the_id() );
			$space_from_top = rwmb_meta("{$ss_prefix}fullwidth_space_from_top");
			$space_from_bottom = rwmb_meta("{$ss_prefix}fullwidth_space_from_bottom");
			$outer_space_from_top = rwmb_meta("{$ss_prefix}fullwidth_outer_space_from_top");
			$outer_space_from_bottom = rwmb_meta("{$ss_prefix}fullwidth_outer_space_from_bottom");
			$bg_color = rwmb_meta( "{$ss_prefix}fullwidth_background_color" );
			$text_color = rwmb_meta( "{$ss_prefix}fullwidth_text_color" );
			$bg_repeat = rwmb_meta( "{$ss_prefix}fullwidth_background_image_repeatable" );
			$parallax = rwmb_meta( "{$ss_prefix}fullwidth_parallax_effect" );
			$bg_image = rwmb_meta( "{$ss_prefix}fullwidth_background_image",  "type=image&size=full" );
			$bg_image = array_shift($bg_image);
			$bg_image = $bg_image['full_url'];

			// Setting Defaults For Spacing
			if ( empty($space_from_top) ) {
				$space_from_top = '0';
			}
			if ( empty($space_from_bottom) ) {
				$space_from_bottom = '0';
			}
			if ( empty($outer_space_from_top) ) {
				$outer_space_from_top = '0';
			}
			if ( empty($outer_space_from_bottom) ) {
				$outer_space_from_bottom = '0';
			}

			$ss_style .= 'color: ' . $text_color . ';';
			$ss_style .= 'background-color: ' . $bg_color . ';';
			$ss_style .= 'padding-top: ' . $space_from_top . 'px;';
			$ss_style .= 'padding-bottom: ' . $space_from_bottom . 'px;';
			$ss_style .= 'margin-top: ' . $outer_space_from_top . 'px;';
			$ss_style .= 'margin-bottom: ' . $outer_space_from_bottom . 'px;';
			
			if ( !empty($bg_image) ) {
				$ss_style .= 'background: url(' . $bg_image  . ') no-repeat center center; ';
				$ss_style .= 'background-size: cover; ';
			}
			if ( !empty($bg_repeat) ) {
				$ss_style .= 'background-repeat: repeat; ';
				$ss_style .= 'background-size: auto; ';
			}
			if ( !empty($parallax) ) {
				$ss_data_attr .= 'data-center="background-position: 50% 0px;" ';
				$ss_data_attr .= 'data-top-bottom="background-position: 50% -100px;" ';
				$ss_data_attr .= 'data-bottom-top="background-position: 50% 100px;" ';
				$ss_style .= 'background-attachment: fixed; ';
			}

		?>

			<?php if ( $template_name == "template-fullwidth.php" ) : ?>

				<section id="<?php echo ss_get_slug(get_the_id()); ?>" style="<?php echo $ss_style; ?>" <?php echo $ss_data_attr; ?> >
					<div class="container">
						<div class="row">
							<div id="post-<?php the_ID(); ?>" class="col-sm-12">
								
								<?php if ( !empty($page_title) ) : ?>
									<?php get_template_part( 'lib/template-parts/page-header' ); ?>
								<?php endif; ?>

								<div class="section-content ss-typography">
									<?php the_content(); ?>
								</div>

							</div>
						</div>
					</div>
				</section>

			<?php elseif ( $template_name == "template-fullscreen.php" ) : ?>

				<section id="<?php echo ss_get_slug(get_the_id()); ?>" style="<?php echo $ss_style; ?>" <?php echo $ss_data_attr; ?> >

					<?php if ( !empty($page_title) ) : ?>
						<?php get_template_part( 'lib/template-parts/page-header' ); ?>
					<?php endif; ?>

					<div class="section-content">
						<?php the_content(); ?>
					</div>

				</section>

			<?php endif; ?>

	<?php endwhile;  ?><?php endif; ?>

	<?php wp_reset_query(); ?>

<?php get_footer(); ?>