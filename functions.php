<?php
/**
 * LFDM functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LFDM
 */

if ( ! function_exists( 'lfdm_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lfdm_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on LFDM, use a find and replace
		 * to change 'lfdm' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lfdm', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'lfdm' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'lfdm_custom_background_args', array(
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
add_action( 'after_setup_theme', 'lfdm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lfdm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lfdm_content_width', 640 );
}
add_action( 'after_setup_theme', 'lfdm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lfdm_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lfdm' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lfdm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lfdm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lfdm_scripts() {
	wp_enqueue_style( 'lfdm-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lfdm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lfdm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lfdm_scripts' );

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

// /**
//  * Ads widgets to the footer
//  */

// register_sidebar( array(
// 'name' => 'Footer Sidebar 1',
// 'id' => 'footer-sidebar-1',
// 'description' => 'Appears in the footer area',
// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 'after_widget' => '</aside>',
// 'before_title' => '<h3 class="widget-title">',
// 'after_title' => '</h3>',
// ) );
// register_sidebar( array(
// 'name' => 'Footer Sidebar 2',
// 'id' => 'footer-sidebar-2',
// 'description' => 'Appears in the footer area',
// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 'after_widget' => '</aside>',
// 'before_title' => '<h3 class="widget-title">',
// 'after_title' => '</h3>',
// ) );
// register_sidebar( array(
// 'name' => 'Footer Sidebar 3',
// 'id' => 'footer-sidebar-3',
// 'description' => 'Appears in the footer area',
// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 'after_widget' => '</aside>',
// 'before_title' => '<h3 class="widget-title">',
// 'after_title' => '</h3>',
// ) );

/**
 * Ads editor style
 */
add_editor_style();

/**
 * Shows admin bar to admin only
 */

// show admin bar only for admins
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}
// show admin bar only for admins and editors
if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}

/**
 * Limits the exerpt length
 */

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


/**
 * Pagination
 */


function pagination($pages = '', $range = 3)
{
    $showitems = ($range * 2)+1;
 
    global $paged;
    if(empty($paged)) $paged = 1;
 
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
 
    if(1 != $pages)
    {
        echo "<div class=\"pagination\"><span>Page ".$paged." sur ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; Première</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Précédente</a>";
 
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }
 
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Suivante &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Dernière &raquo;</a>";
        echo "</div>\n";
    }
}

/**
 * Ajouter page d'options ACF 5
 *
 * @package ACF
 */
if( function_exists('acf_add_options_page') ) {
	// Page principale
	acf_add_options_page(array(
		'page_title'    => 'Options',
		'menu_title'    => 'Options',
		'menu_slug'     => 'options-generales',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));
  
  // Première sous-page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options d\'Entête',
		'menu_title'    => 'Entête',
		'parent_slug'   => 'options-generales',
	));

  // Deuxième sous-page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options de Pied de Page',
		'menu_title'    => 'Pied de page',
		'parent_slug'   => 'options-generales',
	));
  // Page d'accueil
	acf_add_options_sub_page(array(
		'page_title'    => 'Liens Réseaux Sociaux',
		'menu_title'    => 'Réseaux Sociaux',
		'parent_slug'   => 'options-generales',
	));
}

/**
* Replace footer for Jetpack Infinite Scroll.
*/
// Edit Jetpack Infinite Scroll Footer Text
add_filter( 'infinite_scroll_credit', 'your_footer_text' );

function your_footer_text() {
return '<a href="#">Mentions légales</a> | Copyright© La France de Marianne';
}


