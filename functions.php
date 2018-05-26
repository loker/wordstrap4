<?php
/* WordStrap4 functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package WordStrap4
 */
if ( ! function_exists( 'wordstrap4_setup' ) ) :
	function wordstrap4_setup() {
		load_theme_textdomain( 'wordstrap4', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'wordstrap4' ),
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wordstrap4_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wordstrap4_setup' );
function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">Devamı için tıklayın</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordstrap4_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wordstrap4_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordstrap4_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordstrap4_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wordstrap4' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wordstrap4' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wordstrap4_widgets_init' );

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

/* Enqueue scripts and styles. */
function wordstrap4_scripts() {
	wp_enqueue_style( 'wordstrap4-style', get_stylesheet_uri() );
	wp_enqueue_script( 'wordstrap4-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20180521', true );
	wp_enqueue_script( 'wordstrap4-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20180521', true );
	wp_enqueue_script( 'bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '20180521', true );
}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	};

add_action( 'wp_enqueue_scripts', 'wordstrap4_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// DEL WPEMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// Close comments on the front-end
function wordstrap4_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'wordstrap4_disable_comments_status', 20, 2);
add_filter('pings_open', 'wordstrap4_disable_comments_status', 20, 2);
// Hide existing comments
function wordstrap4_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'wordstrap4_disable_comments_hide_existing_comments', 10, 2);
// Remove comments page in menu
function wordstrap4_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'wordstrap4_disable_comments_admin_menu');
// Redirect any user trying to access comments page
function wordstrap4_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'wordstrap4_disable_comments_admin_menu_redirect');
// Remove comments metabox from dashboard
function wordstrap4_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'wordstrap4_disable_comments_dashboard');
// Remove comments links from admin bar
function wordstrap4_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'wordstrap4_disable_comments_admin_bar');
