<?php
/**
 * Sail Renovate theme functions
 *
 * @package sail-renovate
 */

define( 'SAIL_VERSION', '1.0.0' );

// ── Theme Setup ─────────────────────────────────────────────────────────────
add_action( 'after_setup_theme', 'sail_setup' );
function sail_setup() {
	load_theme_textdomain( 'sail-renovate', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
	add_theme_support( 'customize-selective-refresh-widgets' );

	register_nav_menus( [
		'primary' => __( 'Primary Navigation', 'sail-renovate' ),
		'footer'  => __( 'Footer Navigation', 'sail-renovate' ),
	] );
}

// ── Enqueue Assets ───────────────────────────────────────────────────────────
add_action( 'wp_enqueue_scripts', 'sail_enqueue_assets' );
function sail_enqueue_assets() {
	$uri = get_template_directory_uri();

	// Google Fonts — preconnect hints are output by wp_head() once the handles
	// with 'https://fonts.googleapis.com' and 'https://fonts.gstatic.com' are
	// registered. We add them as explicit dependencies so they always load first.
	wp_enqueue_style(
		'sail-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garant:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap',
		[],
		null
	);

	// Global stylesheet
	wp_enqueue_style( 'sail-global', $uri . '/css/global.css', [ 'sail-fonts' ], SAIL_VERSION );

	// Page-specific stylesheets
	if ( is_front_page() ) {
		wp_enqueue_style( 'sail-front-page', $uri . '/css/pages/front-page.css', [ 'sail-global' ], SAIL_VERSION );
	} elseif ( is_page( 'about' ) ) {
		wp_enqueue_style( 'sail-about', $uri . '/css/pages/about.css', [ 'sail-global' ], SAIL_VERSION );
	} elseif ( is_page( 'contact' ) ) {
		wp_enqueue_style( 'sail-contact', $uri . '/css/pages/contact.css', [ 'sail-global' ], SAIL_VERSION );
	} elseif ( is_page( 'services' ) ) {
		wp_enqueue_style( 'sail-services', $uri . '/css/pages/services.css', [ 'sail-global' ], SAIL_VERSION );
	} elseif ( is_page( 'projects' ) || is_page( 'our-work' ) ) {
		wp_enqueue_style( 'sail-projects', $uri . '/css/pages/projects.css', [ 'sail-global' ], SAIL_VERSION );
	} elseif ( is_page( 'privacy-policy' ) ) {
		wp_enqueue_style( 'sail-privacy', $uri . '/css/pages/privacy-policy.css', [ 'sail-global' ], SAIL_VERSION );
	} elseif ( is_singular( 'service' ) ) {
		wp_enqueue_style( 'sail-service', $uri . '/css/pages/service.css', [ 'sail-global' ], SAIL_VERSION );
	} elseif ( is_singular( 'project' ) ) {
		wp_enqueue_style( 'sail-project', $uri . '/css/pages/project.css', [ 'sail-global' ], SAIL_VERSION );
	}

	// Main JavaScript (deferred — loaded after DOM is ready)
	wp_enqueue_script( 'sail-main', $uri . '/js/main.js', [], SAIL_VERSION, true );
}

// ── Dynamic CSS for background-image URIs ────────────────────────────────────
// CSS files cannot use PHP, so pattern URLs are injected via wp_head.
add_action( 'wp_head', 'sail_dynamic_css' );
function sail_dynamic_css() {
	$pattern_light = esc_url( get_template_directory_uri() . '/images/sail-background-pattern-light.svg' );
	?>
	<style>
	footer::before,
	.about-testimonial::before,
	.philosophy::after {
		background-image: url('<?php echo $pattern_light; ?>');
	}
	</style>
	<?php
}

// ── Google Fonts preconnect hints ────────────────────────────────────────────
add_action( 'wp_head', 'sail_preconnect_fonts', 1 );
function sail_preconnect_fonts() {
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<?php
}
