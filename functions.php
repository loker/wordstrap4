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
			'primary' => esc_html__( 'Primary', 'wordstrap4' ),
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wordstrap4_setup' );

// donence Custom Post Type
function donence_init() {
    // set up donence labels
    $labels = array(
        'name' => 'Dönenceler',
        'singular_name' => 'Dönence',
        'add_new' => 'Dönence ekle',
        'add_new_item' => 'Dönence ekle',
        'edit_item' => 'Dönence düzenle',
				'new_item' => 'Yeni Dönence',
        'all_items' => 'Bütün Dönenceler',
        'view_item' => 'Dönence Görüntüle',
        'search_items' => 'Dönence Ara',
        'not_found' =>  'Dönence bulunamadı',
        'not_found_in_trash' => 'Çöpte Dönence yok',
        'parent_item_colon' => '',
        'menu_name' => 'Dönenceler',
    );

    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'donence'),
        'query_var' => true,
				'menu_position' => 5,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'revisions',
            'thumbnail',
            'page-attributes'
        )
    );
    register_post_type( 'donence', $args );

    // register taxonomy
    register_taxonomy('donence_category', 'donence', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'donence-category' )));
}
add_action( 'init', 'donence_init' );


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

