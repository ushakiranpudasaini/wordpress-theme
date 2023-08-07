<?php

$monal_mag_theme_ob = wp_get_theme();
$monal_mag_ver      = $monal_mag_theme_ob->get('Version');
define('MONAL_MAG_VERSION', $monal_mag_ver);

/**
 * Theme setup.
 */
function monal_mag_setup()
{
	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

	add_theme_support('title-tag');

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'monal-mag'),
			'side' => __('Side Menu', 'monal-mag'),
			'buttonmenu' => __('Button Menu', 'monal-mag'),
			'buttonmenu1' => __('Button Menu1', 'monal-mag'),
			'buttonmenu2' => __('Button Menu2', 'monal-mag'),
			'buttonmenu3' => __('Button Menu3', 'monal-mag'),
			'buttonmenu4' => __('Button Menu4', 'monal-mag'),
			'buttonmenu5' => __('Button Menu5', 'monal-mag'),
			'buttonmenu6' => __('Button Menu6', 'monal-mag'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	
	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	add_theme_support('wp-block-styles');
	add_theme_support('align-wide');
	add_theme_support("responsive-embeds");
	add_theme_support('register_block_pattern');
		add_theme_support('register_block_style');
	

	add_theme_support('editor-styles');
	add_editor_style('css/editor-style.css');
	add_theme_support('customize-selective-refresh-widgets');
}

add_action('after_setup_theme', 'monal_mag_setup');

/**
 * Enqueue theme assets.
 */
function monal_mag_enqueue_scripts()
{
	$theme = wp_get_theme();

	// Styles
	wp_enqueue_style('monal-mag', monal_mag_asset('css/output.css'), array(), $theme->get('Version'));
	wp_enqueue_style('example-poppins',  'https://fonts.googleapis.com/css2?family=Poppins&display=swap', array(), $theme->get('Version'));
	wp_enqueue_style('monal-splide-css',  get_template_directory_uri() . '/resources/css/splide.css', array(), $theme->get('Version'));
	
	// Scripts
	wp_enqueue_script('monal-mag', monal_mag_asset('js/app.js'), array(), $theme->get('Version'));
	wp_enqueue_script('monal-splide', get_template_directory_uri() . '/resources/js/splide.min.js', array(), $theme->get('Version'));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

}

add_action('wp_enqueue_scripts', 'monal_mag_enqueue_scripts');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function monal_mag_asset($path)
{
	if (wp_get_environment_type() === 'production') {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/' . $path);
}



/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function monal_mag_nav_menu_add_li_class($classes, $item, $args, $depth)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}

	if (isset($args->{"li_class_$depth"})) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_css_class', 'monal_mag_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function monal_mag_nav_menu_add_submenu_class($classes, $args, $depth)
{
	if (isset($args->submenu_class)) {
		$classes[] = $args->submenu_class;
	}

	if (isset($args->{"submenu_class_$depth"})) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_submenu_css_class', 'monal_mag_nav_menu_add_submenu_class', 10, 3);


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function monal_mag_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'monal-mag'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'monal-mag'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span class="title">',
			'after_title'   => '</span></h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer 1', 'monal-mag'),
			'id'            => 'footer-1',
			'description'   => esc_html__('Add Footer widgets here.', 'monal-mag'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="text-2xl widget-title"><span class="title">',
			'after_title'   => '</span></h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer 2', 'monal-mag'),
			'id'            => 'footer-2',
			'description'   => esc_html__('Add Footer widgets here.', 'monal-mag'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span class="title">',
			'after_title'   => '</span></h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer 3', 'monal-mag'),
			'id'            => 'footer-3',
			'description'   => esc_html__('Add Footer widgets here.', 'monal-mag'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span class="title">',
			'after_title'   => '</span></h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Home Body', 'monal-mag'),
			'id'            => 'home-body',
			'description'   => esc_html__('body widgets.', 'monal-mag'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span class="title">',
			'after_title'   => '</span></h2>',
		)
	);
}
add_action('widgets_init', 'monal_mag_widgets_init');

/// Widgets 
require_once dirname(__FILE__) . '/custom-widgets/monal_mag_design.php';
require_once dirname(__FILE__) . '/custom-widgets/monal_mag_newsdesign.php';
require_once dirname(__FILE__) . '/custom-widgets/monal_mag_related.php';
require_once dirname(__FILE__) . '/custom-widgets/monal_mag_latestarticle.php';
require_once dirname(__FILE__) . '/custom-widgets/monal_mag_slider.php';
require_once dirname(__FILE__) . '/custom-widgets/monal_mag_feature.php';

/// Enqueue CUstomizer
require_once dirname(__FILE__) . '/inc/customizer.php';

/// Template Functions 
require_once dirname(__FILE__) . '/inc/template_functions.php'; 


//chatgpt
//Button background color with its border ,text and bg 
function custom_theme_customizer( $wp_customize ) {
    // Add a section for button settings
    $wp_customize->add_section( 'button_settings', array(
        'title' => 'Button Settings',
        'priority' => 30,
    ) );

    // Add setting for button text color
    $wp_customize->add_setting( 'button_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Add setting for button background color
    $wp_customize->add_setting( 'button_background_color', array(
        'default' => '#007bff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Add setting for button border color
    $wp_customize->add_setting( 'button_border_color', array(
        'default' => '#007bff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Add control for button text color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text_color', array(
        'label' => 'Button Text Color',
        'section' => 'button_settings',
        'settings' => 'button_text_color',
    ) ) );

    // Add control for button background color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_background_color', array(
        'label' => 'Button Background Color',
        'section' => 'button_settings',
        'settings' => 'button_background_color',
    ) ) );

    // Add control for button border color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_border_color', array(
        'label' => 'Button Border Color',
        'section' => 'button_settings',
        'settings' => 'button_border_color',
    ) ) );


	//heart button

// Add setting for cart button visibility
$wp_customize->add_setting( 'cart_button_visibility', array(
	'default' => 'show',
	'sanitize_callback' => 'sanitize_text_field',
) );

// Add setting for search button visibility
$wp_customize->add_setting( 'search_button_visibility', array(
	'default' => 'show',
	'sanitize_callback' => 'sanitize_text_field',
) );

// Add setting for button visibility on mobile devices
$wp_customize->add_setting( 'button_visibility_mobile', array(
	'default' => 'visible',
	'sanitize_callback' => 'sanitize_text_field',
) );

// Add setting for button visibility on desktop devices
$wp_customize->add_setting( 'button_visibility_desktop', array(
	'default' => 'visible',
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'cart_button_visibility', array(
	'label' => 'Cart Button Visibility',
	'section' => 'button_settings',
	'settings' => 'cart_button_visibility',
	'type' => 'radio',
	'choices' => array(
		'show' => 'Show',
		'hide' => 'Hide',
	),
) );

// Add control for search button visibility
$wp_customize->add_control( 'search_button_visibility', array(
	'label' => 'Search Button Visibility',
	'section' => 'button_settings',
	'settings' => 'search_button_visibility',
	'type' => 'radio',
	'choices' => array(
		'show' => 'Show',
		'hide' => 'Hide',
	),
) );

// Add control for button visibility on mobile devices
$wp_customize->add_control( 'button_visibility_mobile', array(
	'label' => 'Button Visibility on Mobile',
	'section' => 'button_settings',
	'settings' => 'button_visibility_mobile',
	'type' => 'radio',
	'choices' => array(
		'visible' => 'Visible',
		'hidden' => 'Hidden',
	),
) );

// Add control for button visibility on desktop devices
$wp_customize->add_control( 'button_visibility_desktop', array(
	'label' => 'Button Visibility on Desktop',
	'section' => 'button_settings',
	'settings' => 'button_visibility_desktop',
	'type' => 'radio',
	'choices' => array(
		'visible' => 'Visible',
		'hidden' => 'Hidden',
	),
) );


}
add_action( 'customize_register', 'custom_theme_customizer' );
