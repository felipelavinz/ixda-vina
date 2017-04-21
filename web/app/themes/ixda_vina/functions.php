<?php

/**
 * IxDA Viña del Mar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IxDA_Viña_del_Mar
 */

if ( ! function_exists( 'ixda_vina_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ixda_vina_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on IxDA Viña del Mar, use a find and replace
	 * to change 'ixda_vina' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ixda_vina', get_template_directory() . '/languages' );

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
	register_nav_menus( [
		'main'      => esc_html__( 'Primary', 'ixda_vina' ),
		'auxiliary' => esc_html__( 'Auxiliary', 'ixda_vina' ),
	] );

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
	add_theme_support( 'custom-background', apply_filters( 'ixda_vina_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Configure default post thumbnail size
	set_post_thumbnail_size( 200, 135, true );

	add_image_size('single-post__hero', 960, 650, true );
	add_image_size('single-post__hero--lg', 1070, 725, true);
	add_image_size('single-post__hero--sm', 768, 520, true);
}
endif;
add_action( 'after_setup_theme', 'ixda_vina_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ixda_vina_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ixda_vina_content_width', 640 );
}
add_action( 'after_setup_theme', 'ixda_vina_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ixda_vina_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ixda_vina' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ixda_vina' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ixda_vina_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ixda_vina_scripts() {
	wp_enqueue_style( 'webfonts', '//fonts.googleapis.com/css?family=Roboto:400,400i,700,700i', [], false, 'all' );
	wp_enqueue_style( 'ixda_vina-style', get_stylesheet_directory_uri() .'/style/style.css', [ 'webfonts'] );
	wp_enqueue_script( 'gulpicon', get_stylesheet_directory_uri() .'/img/output/grunticon.loader.js', [], '2.1.6', false );

	wp_enqueue_script( 'ixda_vina-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'ixda_vina-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'ixda_vina_scripts' );

add_action('wp_head', function(){
$path = get_stylesheet_directory_uri() .'/img/output';
echo<<<EOL
<script>
grunticon([
	"$path/icons.data.svg.css",
	"$path/icons.data.png.css",
	"$path/icons.fallback.css"
], grunticon.svgLoadedCallback );
</script>
EOL;
}, 9999);

add_filter('wp_nav_menu_objects', function( $menu_items, $args ){
	if ( $args->theme_location !== 'main' ) {
		return $menu_items;
	}
	$items_count = count( $menu_items );
	$half_count  = floor( $items_count / 2 );
	$first_half  = array_slice( $menu_items, 0, $half_count );
	$second_half = array_slice( $menu_items, $half_count );
	$first_half[] = (object)[
		'ID'      => 0,
		'db_id'   => 0,
		'object'  => 'custom',
		'type'    => 'custom',
		'title'   => 'IxDA',
		'classes' => [ 'logo-ixda' ],
		'url'     => get_bloginfo('home')
	];
	return array_merge( $first_half, $second_half );
}, 10, 2);

add_filter('walker_nav_menu_start_el', function( $item_output, $item, $depth, $args ){
	if ( ! in_array('logo-ixda', $item->classes)  ) {
		return $item_output;
	}
	return '<img src="'. get_stylesheet_directory_uri() .'/img/dist/logo-ixda.svg" alt="IxDA Viña del Mar" />';
}, 10, 4);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Indica si hay eventos programados
 * @return bool Eventos o falso si no existen
 * @todo
 */
function ixda_has_events() {
	static $events;
	$events = new Event_Post_Query([
		'posts_per_page' => 3
	]);
	return count( $events ) > 0 ? $events : false;
}

/**
 * Indica si hay trabajos de la bolsa disponibles
 * @return bool Trabajos de la bolsa o falso si no existen
 * @todo
 */
function ixda_has_jobs() {
	static $jobs;
	$jobs_feed = fetch_feed('https://www.getonbrd.cl/categories/diseno-ux/rss');
	if ( is_wp_error( $jobs ) ) {
		return false;
	}
	return $jobs_feed->get_items( 0, 4 );
}

/**
 * Indica si hay partners para mostrar
 * @return bool Partners o falso si no existen
 * @todo
 */
function ixda_has_partners() {
	return true;
}

/**
 * Controla cosas específicas del tema
 */
class Ixda_Vina_Theme {

	/**
	 * Inicializar accciones y filtros
	 */
	public function init() {
		add_filter('get_the_archive_title', [ $this, 'filter_archive_title'] );
		add_action('pre_get_posts', [ $this, 'modify_main_query'] );
		add_filter('acf/fields/google_map/api', [ $this, 'set_google_maps_api_key']);
	}

	/**
	 * Configura la API Key de Google Maps, que se obtiene del archivo de variables de entorno
	 * @param  array $api Propiedades del API de Google Maps
	 * @return array      Proopiedades del API de Google Maps filtradas
	 */
	public function set_google_maps_api_key( array $api ) : array {
		$api['key'] = $_ENV['GOOGLE_MAPS_API_KEY'] ?? '';
		return $api;
	}

	/**
	 * Modificar la Query principal de WordPressInstaller
	 * @param  WP_Query $q Query de WordPress
	 * @return WP_Query    Query modificad
	 */
	public function modify_main_query( WP_Query $q ) : WP_Query {
		if ( is_front_page() && $q->is_main_query() ) {
			$q->set('posts_per_page', 2);
		}
		if ( is_archive() && $q->is_main_query() ) {
			$q->set('posts_per_page', 8);
		}
		return $q;
	}

	/**
	 * Filtrar el título en páginas de archivos
	 * @param  string $title Título de la página de archivo
	 * @return string        Título filtrado
	 */
	public function filter_archive_title( string $title ) : string {
		if ( is_category() ) {
			return single_cat_title( '', false );
		}
		return $title;
	}
}

(function(){
	( new Ixda_Vina_Theme )->init();
})();