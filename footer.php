			<footer class="main-footer">
				<div class="container">
					<div class="footer">
						<div class="row">
							<div class="col-sm-12">

								<?php get_sidebar('footer'); ?>
								
							</div>
						</div>
						<div class="row copy">
							<div class="col-sm-6">
								© Copyright <?php echo date('Y'); ?> - Delivery Hero Holding GmbH
							</div>

							<div class="col-sm-6">
								<?php wp_nav_menu( array( 'theme_location' => 'underfoot' ) ); ?>
							</div>

						</div>

					</div>
				</div>
			</footer>

		</div> <!-- #wrapepr : END -->

		<nav class="ss-mobile-menu">
			<?php wp_nav_menu( array('theme_location' => 'primary-menu', 'container' => false, 'menu_id' => 'main-navigation-mobile', 'menu_class' => '') ); ?>
		</nav>

		<?php wp_footer(); ?>
	</body>
</html>
