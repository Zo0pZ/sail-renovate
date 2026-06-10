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

// ── Customizer ───────────────────────────────────────────────────────────────
add_action( 'customize_register', 'sail_customizer_register' );
function sail_customizer_register( $wp_customize ) {

	$wp_customize->add_panel( 'sail_panel', [
		'title'    => __( 'Sail Renovate', 'sail-renovate' ),
		'priority' => 130,
	] );

	// ── Section: Contact Details ──────────────────────────────────────────────
	$wp_customize->add_section( 'sail_contact', [
		'title'    => __( 'Contact Details', 'sail-renovate' ),
		'panel'    => 'sail_panel',
		'priority' => 10,
	] );

	$contact_settings = [
		'sail_phone'         => [ __( 'Phone Number', 'sail-renovate' ),        '0117 476 7858',           'text' ],
		'sail_email'         => [ __( 'Email Address', 'sail-renovate' ),        'team@sailrenovate.co.uk', 'text' ],
		'sail_location'      => [ __( 'Service Area / Location', 'sail-renovate' ), 'Bristol & Surrounding Areas', 'text' ],
		'sail_instagram_url' => [ __( 'Instagram URL', 'sail-renovate' ),        '#',                       'url' ],
		'sail_facebook_url'  => [ __( 'Facebook URL', 'sail-renovate' ),         '#',                       'url' ],
	];

	foreach ( $contact_settings as $id => [ $label, $default, $type ] ) {
		$sanitize = ( 'url' === $type ) ? 'esc_url_raw' : 'sanitize_text_field';
		$wp_customize->add_setting( $id, [
			'default'           => $default,
			'sanitize_callback' => $sanitize,
		] );
		$wp_customize->add_control( $id, [
			'label'   => $label,
			'section' => 'sail_contact',
			'type'    => $type,
		] );
	}

	// ── Section: Homepage Hero ────────────────────────────────────────────────
	$wp_customize->add_section( 'sail_hero', [
		'title'    => __( 'Homepage Hero', 'sail-renovate' ),
		'panel'    => 'sail_panel',
		'priority' => 20,
	] );

	$hero_settings = [
		'sail_hero_eyebrow'       => [ __( 'Eyebrow Text', 'sail-renovate' ),          'Trusted Renovation Experts — Bristol & the South West' ],
		'sail_hero_heading_em'    => [ __( 'Heading — Italic Line', 'sail-renovate' ),  'Exceptional' ],
		'sail_hero_heading_line2' => [ __( 'Heading — Line 2', 'sail-renovate' ),       'Renovations,' ],
		'sail_hero_heading_line3' => [ __( 'Heading — Line 3', 'sail-renovate' ),       'Trusted Results.' ],
		'sail_hero_sub'           => [ __( 'Subheading Paragraph', 'sail-renovate' ),   'From insurance reinstatement to full home renovations — surveyor-led, no hidden costs, and trusted by Bristol homeowners.' ],
		'sail_hero_cta_note'      => [ __( 'CTA Note Text', 'sail-renovate' ),          'Free quote · No obligation · Bristol & South West based' ],
		'sail_hero_stat1_num'     => [ __( 'Stat 1 — Number/Value', 'sail-renovate' ),  '10+' ],
		'sail_hero_stat1_label'   => [ __( 'Stat 1 — Label', 'sail-renovate' ),         'Years Experience' ],
		'sail_hero_stat2_num'     => [ __( 'Stat 2 — Number/Value', 'sail-renovate' ),  '500+' ],
		'sail_hero_stat2_label'   => [ __( 'Stat 2 — Label', 'sail-renovate' ),         'Projects Completed' ],
		'sail_hero_stat3_label'   => [ __( 'Stat 3 — Label', 'sail-renovate' ),         'Insurance Approved' ],
	];

	foreach ( $hero_settings as $id => [ $label, $default ] ) {
		$wp_customize->add_setting( $id, [
			'default'           => $default,
			'sanitize_callback' => 'sanitize_textarea_field',
		] );
		$wp_customize->add_control( $id, [
			'label'   => $label,
			'section' => 'sail_hero',
			'type'    => ( 'sail_hero_sub' === $id ) ? 'textarea' : 'text',
		] );
	}

	// ── Section: Philosophy Quote ─────────────────────────────────────────────
	$wp_customize->add_section( 'sail_philosophy', [
		'title'    => __( 'Philosophy Quote', 'sail-renovate' ),
		'panel'    => 'sail_panel',
		'priority' => 30,
	] );

	$wp_customize->add_setting( 'sail_philosophy_quote', [
		'default'           => "We want you to feel proud and excited every time you come home \u{2014} that\u{2019}s the standard we hold ourselves to on every single project.",
		'sanitize_callback' => 'sanitize_textarea_field',
	] );
	$wp_customize->add_control( 'sail_philosophy_quote', [
		'label'   => __( 'Quote Text', 'sail-renovate' ),
		'section' => 'sail_philosophy',
		'type'    => 'textarea',
	] );

	$wp_customize->add_setting( 'sail_philosophy_attr', [
		'default'           => '— The Sail Renovate Team',
		'sanitize_callback' => 'sanitize_text_field',
	] );
	$wp_customize->add_control( 'sail_philosophy_attr', [
		'label'   => __( 'Attribution', 'sail-renovate' ),
		'section' => 'sail_philosophy',
		'type'    => 'text',
	] );
}

// ── Contact detail helper ─────────────────────────────────────────────────────
// Usage: sail_contact('phone'), sail_contact('email'), etc.
function sail_contact( $key ) {
	$defaults = [
		'phone'         => '0117 476 7858',
		'email'         => 'team@sailrenovate.co.uk',
		'location'      => 'Bristol & Surrounding Areas',
		'instagram_url' => '#',
		'facebook_url'  => '#',
	];
	return get_theme_mod( 'sail_' . $key, $defaults[ $key ] ?? '' );
}
