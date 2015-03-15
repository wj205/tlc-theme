<?php 

function learningWordPress_resources() {

	wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'learningWordPress_resources');


// Add Our Widget Locations
function ourWidgetsInit() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class= "widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="sidebar-title">',
		'after_title' => '</h4>'
	));

	register_sidebar( array(
		'name' => 'Footer Area 1',
		'id' => 'footer1'
	));

	register_sidebar( array(
		'name' => 'Footer Area 2',
		'id' => 'footer2'
	));

	register_sidebar( array(
		'name' => 'Footer Area 3',
		'id' => 'footer3'
	));

	register_sidebar( array(
		'name' => 'Footer Area 4',
		'id' => 'footer4'
	));

	register_sidebar( array(
		'name' => 'Header Area 1',
		'id' => 'header1',
		'before_widget' => '<div class= "header-widget-item">',
		'after_widget' => '</div>'
	));
}

add_action('widgets_init', 'ourWidgetsInit');

// Get top ancestor
function get_top_ancestor_id() {

	global $post;

	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];

	}

	return $post->ID;

}

// Does page have children?
function has_children() {

	global $post;

	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);

}

// Customize excerpt word count length
function custom_excerpt_length() {
	return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');


// Theme setup (where we add functionality to our theme)
function learningWPTheme_setup() {

	// Add Navigation Menus Support
	register_nav_menus(array(
		'primary' => __( 'Primary Menu'),
		'footer' => __( 'Footer Menu'),
		'sidebar-social' => __( 'Social Media Menu'),
	));

	// Add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('banner-image', 920, 420, array('center', 'center'));

	// Add Post format support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'learningWPTheme_setup');

//Customize Appearance Options
function learningWPTheme_customize_register( $wp_customize ) {

	//Standard Color Picker
	$wp_customize->add_section('lWPT_standard_colors', array(
		'title' => __('Standard Colors', 'LearningWPTheme'),
		'priority' => 30,
	));

	$wp_customize->add_setting('lWPT_page_title_color', array(
		'default' => '#333',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_page_title_color_control', array(
		'label' => __('Page Title Color', 'LearningWPTheme'),
		'section' => 'lWPT_standard_colors',
		'settings' => 'lWPT_page_title_color',
	) ) );

	$wp_customize->add_setting('lWPT_post_title_color', array(
		'default' => '#333',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_post_title_color_control', array(
		'label' => __('Post Title Color', 'LearningWPTheme'),
		'section' => 'lWPT_standard_colors',
		'settings' => 'lWPT_post_title_color',
	)));

	$wp_customize->add_setting('lWPT_post_division_border_color', array(
		'default' => '#D4AF37',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_post_division_border_color_control', array(
		'label' => __('Post Division Border Color', 'LearningWPTheme'),
		'section' => 'lWPT_standard_colors',
		'settings' => 'lWPT_post_division_border_color',
	)));

	$wp_customize->add_setting('lWPT_excerpt_link_color', array(
		'default' => '#999',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_excerpt_link_color_control', array(
		'label' => __('Excerpt Link Color', 'LearningWPTheme'),
		'section' => 'lWPT_standard_colors',
		'settings' => 'lWPT_excerpt_link_color',
	)));

	//Customize Navbar
	$wp_customize->add_section('lWPT_custom_navbar', array(
		'title' => __('Customize Navbar', 'LearningWPTheme'),
		'priority' => 31,
	));

	$wp_customize->add_setting('lWPT_navbar_text_color', array(
		'default' => '#333',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_navbar_text_color_control', array(
		'label' => __('Navbar Text Color', 'LearningWPTheme'),
		'section' => 'lWPT_custom_navbar',
		'settings' => 'lWPT_navbar_text_color',
	)));

	$wp_customize->add_setting('lWPT_navbar_text_hover_color', array(
		'default' => '#999',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_navbar_text_hover_color_control', array(
		'label' => __('Navbar Text Hover Color', 'LearningWPTheme'),
		'section' => 'lWPT_custom_navbar',
		'settings' => 'lWPT_navbar_text_hover_color',
	)));


	//Customize Sidebar
	$wp_customize->add_section('lWPT_custom_sidebar', array(
		'title' => __('Customize Sidebar', 'LearningWPTheme'),
		'priority' => 32,
	));

	$wp_customize->add_setting('lWPT_sidebar_title_text', array(
		'default' => __("I'm Gigi!"),
		'transport' => 'refresh',
	));

	$wp_customize->add_control('lWPT_sidebar_title_text_control', array(
		'label' => __('Sidebar Title', 'LearningWPTheme'),
		'section' => 'lWPT_custom_sidebar',
		'settings' => 'lWPT_sidebar_title_text',
	));

	$wp_customize->add_setting('lWPT_sidebar_title_color', array(
		'default' => '#333',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_sidebar_title_color_control', array(
		'label' => __('Sidebar Title Color', 'LearningWPTheme'),
		'section' => 'lWPT_custom_sidebar',
		'settings' => 'lWPT_sidebar_title_color',
	)));

	$wp_customize->add_setting('lWPT_sidebar_tagline_text', array(
		'default' => __("I love to do the blogs and love my fiance and Popeye's"),
		'transport' => 'refresh',
	));

	$wp_customize->add_control('lWPT_sidebar_tagline_text_control', array(
		'label' => __('Sidebar Tagline', 'LearningWPTheme'),
		'section' => 'lWPT_custom_sidebar',
		'settings' => 'lWPT_sidebar_tagline_text',
	));

	$wp_customize->add_setting('lWPt_sidebar_feature_image', array(
		'default' => 'http://localhost:8888/wordpress/wp-content/uploads/2015/02/gigi_avatar.png',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'lWPt_sidebar_feature_image_control', array(
		'label' => 'Sidebar Feature Image',
		'section' => 'lWPT_custom_sidebar',
		'settings' => 'lWPt_sidebar_feature_image',
	)));

	$wp_customize->add_setting('lWPT_sidebar_division_border_color', array(
		'default' => '#D4AF37',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_sidebar_division_border_color_control', array(
		'label' => __('Sidebar Division Border Color', 'LearningWPTheme'),
		'section' => 'lWPT_custom_sidebar',
		'settings' => 'lWPT_sidebar_division_border_color',
	)));

	$wp_customize->add_setting('lWPT_sidebar_social_media_menu_text_color', array(
		'default' => '#eee',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_sidebar_social_media_menu_text_color_control', array(
		'label' => __('Social Media Menu Text Color', 'LearningWPTheme'),
		'section' => 'lWPT_custom_sidebar',
		'settings' => 'lWPT_sidebar_social_media_menu_text_color',
	)));

	$wp_customize->add_setting('lWPT_sidebar_social_media_menu_text_hover_color', array(
		'default' => '#999',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_sidebar_social_media_menu_text_hover_color_control', array(
		'label' => __('Social Media Menu Text Hover Color', 'LearningWPTheme'),
		'section' => 'lWPT_custom_sidebar',
		'settings' => 'lWPT_sidebar_social_media_menu_text_hover_color',
	)));

	$wp_customize->add_setting('lWPT_sidebar_social_media_menu_button_color', array(
		'default' => '#333',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lWPT_sidebar_social_media_menu_button_color_control', array(
		'label' => __('Social Media Menu Button Color', 'LearningWPTheme'),
		'section' => 'lWPT_custom_sidebar',
		'settings' => 'lWPT_sidebar_social_media_menu_button_color',
	)));

}

add_action('customize_register', 'learningWPTheme_customize_register');

//Output Customize CSS
function learningWPTheme_customize_css() { ?>

	<style type="text/css">

		.site-header h1 a:link,
		.site-header h1 a:visited{
			color: <?php echo get_theme_mod('lWPT_page_title_color'); ?>;
		}

		.site-header nav ul li a:link,
		.site-header nav ul li a:visited{
			color: <?php echo get_theme_mod('lWPT_navbar_text_color'); ?>;
		}

		.site-header nav ul li.current-menu-item a:link,
		.site-header nav ul li.current-menu-item a:visited,
		.site-header nav ul li.current-page-ancestor a:link,
		.site-header nav ul li.current-page-ancestor a:visited {
			/*background-color: #333;*/
			color: <?php echo get_theme_mod('lWPT_navbar_text_color'); ?>;
			border-bottom: 1px solid <?php echo get_theme_mod('lWPT_navbar_text_color'); ?>;
		}

		.site-header nav ul li a:hover{
			color: <?php echo get_theme_mod('lWPT_navbar_text_hover_color'); ?>;
		}

		.secondary-column h1{
			color: <?php echo get_theme_mod('lWPT_sidebar_title_color'); ?>;
		}

		.secondary-column div{
			border-bottom: 1px solid <?php echo get_theme_mod('lWPT_sidebar_division_border_color'); ?>;
		}

		#menu-social-media-links li a:link,
		#menu-social-media-links li a:visited{
			color: <?php echo get_theme_mod('lWPT_sidebar_social_media_menu_text_color'); ?>;
			background-color: <?php echo get_theme_mod('lWPT_sidebar_social_media_menu_button_color'); ?>;
		}

		#menu-social-media-links li a:hover{
			color: <?php echo get_theme_mod('lWPT_sidebar_social_media_menu_text_hover_color'); ?>;
		}

		article.post{
			border-bottom: 1px solid <?php echo get_theme_mod('lWPT_post_division_border_color'); ?>;
		}

		.post h2 a:link,
		.post h2 a:visited{
			color: <?php echo get_theme_mod('lWPT_post_title_color'); ?>;
		} 

		.excerpt a:link,
		.excerpt a:visited{
			color: <?php echo get_theme_mod('lWPT_excerpt_link_color'); ?>;
		}

	</style>

<?php }

add_action('wp_head', 'learningWPTheme_customize_css');