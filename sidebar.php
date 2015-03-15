<!-- secondary-column -->
	<div class="secondary-column">
		<div class="secondary-column-head">
			<h1><?php echo get_theme_mod('lWPT_sidebar_title_text'); ?></h1>
			<img src='<?php echo get_theme_mod('lWPt_sidebar_feature_image'); ?>'/>
			<p><?php echo get_theme_mod('lWPT_sidebar_tagline_text'); ?></p>
		</div>
		<?php dynamic_sidebar('sidebar1') ?>
		<div class="social-menu">			
			<?php $args = array(
					'theme_location' => 'sidebar-social'
				);
			wp_nav_menu( $args ); ?>
		</div>
	</div>