<div class="col-sm-4">
    <aside class="sidebar">
		 <?php 
			if ( is_page() ){
				// Page Sidebar 
				global $ss_prefix;
				$sidebar = rwmb_meta("{$ss_prefix}sidebars");
				if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar($sidebar) );
			} else {
				// Primary Sidebar 
				if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('primary-sidebar') );
			}
		?>
	</aside>
</div>