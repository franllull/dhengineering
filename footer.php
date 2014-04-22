			<footer class="main-footer">
				<div class="container">
					<div class="footer">
						<div class="row">
							<div class="col-sm-12">

								<?php get_sidebar('footer'); ?>
								
								<div class="copyright">
									<p>
										<?php echo ot_get_option( 'footer_text', '' ); ?>
									</p>
								</div>
								<div class="social-icon">
									<ul>
										<?php
											$footer_social_icons =  ot_get_option( 'footer_social_icons', '' );
										?>
										<?php if ( !empty($footer_social_icons) ) : ?>
											<?php foreach ($footer_social_icons as $social_icon) : ?>
												<li>
													<a target="_blank" href="<?php echo $social_icon['link']; ?>"><span class="icon-<?php echo $social_icon['type']; ?>" aria-hidden="true"></span></a>
												</li>
											<?php endforeach; ?>
										<?php endif; ?>
									</ul>
								</div>
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
