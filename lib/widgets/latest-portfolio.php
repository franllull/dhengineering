<?php

class widget_ss_latest_portfolio extends WP_Widget { 
	
	// Widget Settings
	function widget_ss_latest_portfolio() {
		$widget_ops = array('description' => __('Display your latest portfolio posts.', 'spnoy') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'latest_portfolio' );
		$this->WP_Widget( 'latest_portfolio', __('Nivan : Latest Portfolio', 'spnoy'), $widget_ops, $control_ops );
	}
	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$number = $instance['number'];
		
		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		<ul>
		<?php
			global $prefix;
			$args = array(
				'post_type' => 'portfolio',
				'posts_per_page' => $number
			);
			$query = new WP_Query($args);
			if ( $query->have_posts() ):
			while( $query->have_posts() ): $query->the_post();

			$link_to = rwmb_meta("{$prefix}portfolio_link");
			if ( empty($link_to) ) {
				$link_to = get_permalink();
			}
		?>
			<?php if ( has_post_thumbnail() ): ?>
				<li>
					<a href="<?php echo $link_to; ?>" title="<?php the_title(); ?>">
				 	<div class="inner-container">
                        <?php the_post_thumbnail('widget-latest-portfolio'); ?>
                        <div class="portfolio-item-overlay">
                            <div class="item-overlay-center">
                                <div class="item-buttons">
                                    <div class="item-link">
                                        
                                            <span class="icon-link4" aria-hidden="true"></span>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     </a>
				</li>
			<?php endif; ?>
		<?php endwhile; endif; ?>

		<?php wp_reset_query();  // Reset query to default, Important ?>
		
		</ul>

		<?php echo $after_widget;
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => __('Recent Portfolio', 'spnoy'), 'number' => 4);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input type="text" class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">Number of items to show:</label>
			<input type="text" class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
	<?php
	}
	
}

// Add Widget
function widget_ss_latest_portfolio_init() {
	register_widget('widget_ss_latest_portfolio');
}
add_action('widgets_init', 'widget_ss_latest_portfolio_init');

?>