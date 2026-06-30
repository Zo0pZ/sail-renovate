<?php
/**
 * Sail Renovate theme functions
 *
 * @package sail-renovate
 */

define( 'SAIL_VERSION', '1.2.0' );

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

	// Project & component styles — loaded last so they beat page-specific rules.
	// Contains breadcrumb styles (sitewide) and project card/case-study overrides.
	wp_enqueue_style( 'sail-project-styles', $uri . '/css/sail-project.css', [ 'sail-global' ], SAIL_VERSION );

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

	// ── Section: About Page ──────────────────────────────────────────────────
	$wp_customize->add_section( 'sail_about', [
		'title'    => __( 'About Page', 'sail-renovate' ),
		'panel'    => 'sail_panel',
		'priority' => 25,
	] );

	$about_stats = [
		'sail_about_stat1_num'   => [ __( 'Stat 1 — Number/Value', 'sail-renovate' ), '10+' ],
		'sail_about_stat1_label' => [ __( 'Stat 1 — Label', 'sail-renovate' ),        'Years Experience' ],
		'sail_about_stat2_num'   => [ __( 'Stat 2 — Number/Value', 'sail-renovate' ), '500+' ],
		'sail_about_stat2_label' => [ __( 'Stat 2 — Label', 'sail-renovate' ),        'Projects Completed' ],
		'sail_about_stat3_label' => [ __( 'Stat 3 — Label', 'sail-renovate' ),        'Insurance Approved' ],
	];

	foreach ( $about_stats as $id => [ $label, $default ] ) {
		$wp_customize->add_setting( $id, [
			'default'           => $default,
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		] );
		$wp_customize->add_control( $id, [
			'label'   => $label,
			'section' => 'sail_about',
			'type'    => 'text',
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

// ── Custom Post Types ─────────────────────────────────────────────────────────
add_action( 'init', 'sail_register_post_types' );
function sail_register_post_types() {

	register_post_type( 'service', [
		'labels' => [
			'name'               => __( 'Services', 'sail-renovate' ),
			'singular_name'      => __( 'Service', 'sail-renovate' ),
			'add_new_item'       => __( 'Add New Service', 'sail-renovate' ),
			'edit_item'          => __( 'Edit Service', 'sail-renovate' ),
			'view_item'          => __( 'View Service', 'sail-renovate' ),
			'search_items'       => __( 'Search Services', 'sail-renovate' ),
			'not_found'          => __( 'No services found.', 'sail-renovate' ),
			'not_found_in_trash' => __( 'No services found in Trash.', 'sail-renovate' ),
			'menu_name'          => __( 'Services', 'sail-renovate' ),
		],
		'public'       => true,
		'has_archive'  => false,
		'show_in_rest' => true,
		'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
		'rewrite'      => [ 'slug' => 'services', 'with_front' => false ],
		'menu_icon'    => 'dashicons-hammer',
	] );

	register_post_type( 'project', [
		'labels' => [
			'name'               => __( 'Projects', 'sail-renovate' ),
			'singular_name'      => __( 'Project', 'sail-renovate' ),
			'add_new_item'       => __( 'Add New Project', 'sail-renovate' ),
			'edit_item'          => __( 'Edit Project', 'sail-renovate' ),
			'view_item'          => __( 'View Project', 'sail-renovate' ),
			'search_items'       => __( 'Search Projects', 'sail-renovate' ),
			'not_found'          => __( 'No projects found.', 'sail-renovate' ),
			'not_found_in_trash' => __( 'No projects found in Trash.', 'sail-renovate' ),
			'menu_name'          => __( 'Projects', 'sail-renovate' ),
		],
		'public'       => true,
		'has_archive'  => false,
		'show_in_rest' => true,
		'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
		'rewrite'      => [ 'slug' => 'projects', 'with_front' => false ],
		'menu_icon'    => 'dashicons-portfolio',
	] );

	// Taxonomy used by the projects filter bar on page-projects.php
	register_taxonomy( 'project_cat', 'project', [
		'labels' => [
			'name'          => __( 'Project Categories', 'sail-renovate' ),
			'singular_name' => __( 'Project Category', 'sail-renovate' ),
			'search_items'  => __( 'Search Categories', 'sail-renovate' ),
			'all_items'     => __( 'All Categories', 'sail-renovate' ),
			'edit_item'     => __( 'Edit Category', 'sail-renovate' ),
			'add_new_item'  => __( 'Add New Category', 'sail-renovate' ),
		],
		'public'       => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'rewrite'      => [ 'slug' => 'project-category' ],
	] );

	// FAQ items — title = question, content = answer. No front-end URL needed.
	register_post_type( 'faq', [
		'labels' => [
			'name'          => __( 'FAQs', 'sail-renovate' ),
			'singular_name' => __( 'FAQ', 'sail-renovate' ),
			'add_new_item'  => __( 'Add New FAQ', 'sail-renovate' ),
			'edit_item'     => __( 'Edit FAQ', 'sail-renovate' ),
			'menu_name'     => __( 'FAQs', 'sail-renovate' ),
		],
		'public'       => false,
		'show_ui'      => true,
		'show_in_rest' => true,
		'supports'     => [ 'title', 'editor', 'page-attributes' ],
		'menu_icon'    => 'dashicons-editor-help',
	] );

	// Team members — title = name, excerpt = role, content = bio, thumbnail = photo.
	register_post_type( 'team_member', [
		'labels' => [
			'name'          => __( 'Team Members', 'sail-renovate' ),
			'singular_name' => __( 'Team Member', 'sail-renovate' ),
			'add_new_item'  => __( 'Add New Team Member', 'sail-renovate' ),
			'edit_item'     => __( 'Edit Team Member', 'sail-renovate' ),
			'menu_name'     => __( 'Team', 'sail-renovate' ),
		],
		'public'       => false,
		'show_ui'      => true,
		'show_in_rest' => true,
		'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ],
		'menu_icon'    => 'dashicons-groups',
	] );

	// Testimonials — title = client name / source, content = quote.
	register_post_type( 'testimonial', [
		'labels' => [
			'name'          => __( 'Testimonials', 'sail-renovate' ),
			'singular_name' => __( 'Testimonial', 'sail-renovate' ),
			'add_new_item'  => __( 'Add New Testimonial', 'sail-renovate' ),
			'edit_item'     => __( 'Edit Testimonial', 'sail-renovate' ),
			'not_found'     => __( 'No testimonials found', 'sail-renovate' ),
			'menu_name'     => __( 'Testimonials', 'sail-renovate' ),
		],
		'public'       => false,
		'show_ui'      => true,
		'show_in_rest' => true,
		'supports'     => [ 'title', 'editor', 'page-attributes' ],
		'menu_icon'    => 'dashicons-format-quote',
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

// ── ACF field helper ──────────────────────────────────────────────────────────
// Returns an ACF field value, or $default if ACF isn't installed or the field
// is empty. This means the theme renders correctly with or without ACF active.
// Usage: sail_field( 'intro_1_title', 'Renovations & Repairs' )
function sail_field( $key, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $key, get_queried_object_id() );
		return ( $value !== false && $value !== '' && $value !== null ) ? $value : $default;
	}
	return $default;
}

// Renders an ACF image (stored as attachment ID). Renders nothing if $image_id is falsy.
function sail_acf_image( $image_id, $size = 'large', $alt = '', $class = '' ) {
	if ( ! $image_id ) {
		return;
	}
	$atts = [];
	if ( $class ) {
		$atts['class'] = $class;
	}
	if ( $alt ) {
		$atts['alt'] = $alt;
	}
	echo wp_get_attachment_image( (int) $image_id, $size, false, $atts );
}

// Renders a section eyebrow + h2.section-title with optional italic accent.
// Usage: sail_section_heading( sail_field('eyebrow','…'), sail_field('title','…'), sail_field('accent','…') )
function sail_section_heading( $eyebrow = '', $title = '', $title_accent = '' ) {
	if ( ! $eyebrow && ! $title && ! $title_accent ) {
		return;
	}
	if ( $eyebrow ) {
		echo '<span class="section-eyebrow">' . esc_html( $eyebrow ) . '</span>';
	}
	if ( $title || $title_accent ) {
		echo '<h2 class="section-title">';
		echo esc_html( $title );
		if ( $title_accent ) {
			echo ' <em>' . esc_html( $title_accent ) . '</em>';
		}
		echo '</h2>';
	}
}

// ── ACF field group registration ─────────────────────────────────────────────
// Registers field groups in PHP so they appear automatically when ACF Free is
// installed — no manual setup required in the admin UI.
add_action( 'acf/init', 'sail_register_acf_fields' );
function sail_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// ── Homepage sections ─────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sail_homepage',
		'title'  => 'Homepage — Intro Band & Why Us',
		'fields' => [
			// Intro Band
			[ 'key' => 'field_intro_band_msg',  'label' => 'Intro Band (dark strip below hero)', 'name' => '', 'type' => 'message', 'message' => 'Edit the three feature items in the dark band below the hero image.' ],
			[ 'key' => 'field_intro_1_title', 'label' => 'Item 1 — Title', 'name' => 'intro_1_title', 'type' => 'text',     'default_value' => 'Renovations & Repairs' ],
			[ 'key' => 'field_intro_1_body',  'label' => 'Item 1 — Body',  'name' => 'intro_1_body',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'From insurance reinstatements to complete home renovations, trusted by homeowners and insurers across Bristol and the South West.' ],
			[ 'key' => 'field_intro_2_title', 'label' => 'Item 2 — Title', 'name' => 'intro_2_title', 'type' => 'text',     'default_value' => 'Accredited & Qualified' ],
			[ 'key' => 'field_intro_2_body',  'label' => 'Item 2 — Body',  'name' => 'intro_2_body',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Qualified surveyors and certified tradespeople ensuring every project meets the highest standards.' ],
			[ 'key' => 'field_intro_3_title', 'label' => 'Item 3 — Title', 'name' => 'intro_3_title', 'type' => 'text',     'default_value' => 'Eco & Smart Upgrades' ],
			[ 'key' => 'field_intro_3_body',  'label' => 'Item 3 — Body',  'name' => 'intro_3_body',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Solar panels, smart heating, and sustainable materials for a greener, more efficient home.' ],
			// Why Us
			[ 'key' => 'field_why_us_msg',    'label' => 'Why Sail Renovate section', 'name' => '', 'type' => 'message', 'message' => 'Edit the three reason bullets in the Why Sail Renovate section.' ],
			[ 'key' => 'field_why_1_title', 'label' => 'Reason 1 — Title', 'name' => 'why_1_title', 'type' => 'text',     'default_value' => 'Over a Decade of Expertise' ],
			[ 'key' => 'field_why_1_body',  'label' => 'Reason 1 — Body',  'name' => 'why_1_body',  'type' => 'textarea', 'rows' => 2, 'default_value' => "With more than ten years serving homeowners and insurers across Bristol and the South West, we've earned a reputation for reliability, quality, and transparency on every project — large or small." ],
			[ 'key' => 'field_why_2_title', 'label' => 'Reason 2 — Title', 'name' => 'why_2_title', 'type' => 'text',     'default_value' => 'Qualified Surveyor-Led Projects' ],
			[ 'key' => 'field_why_2_body',  'label' => 'Reason 2 — Body',  'name' => 'why_2_body',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Every project is overseen by a qualified surveyor, ensuring accurate scoping, fair pricing, and a finished result that meets industry standards and your expectations.' ],
			[ 'key' => 'field_why_3_title', 'label' => 'Reason 3 — Title', 'name' => 'why_3_title', 'type' => 'text',     'default_value' => 'Dedicated Customer Care' ],
			[ 'key' => 'field_why_3_body',  'label' => 'Reason 3 — Body',  'name' => 'why_3_body',  'type' => 'textarea', 'rows' => 2, 'default_value' => "Your dedicated project contact keeps you informed at every stage — no surprises, no delays, just clear communication and a home you'll love." ],
		],
		'location' => [ [ [ 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ] ] ],
	] );

	// ── About page ────────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sail_about',
		'title'  => 'About Page — Content',
		'fields' => [
			// Hero
			[ 'key' => 'field_about_hero_msg',     'label' => 'Hero section',   'name' => '', 'type' => 'message', 'message' => 'Edit the top hero banner. Leave blank to use the defaults.' ],
			[ 'key' => 'field_about_hero_eyebrow', 'label' => 'Hero Eyebrow',   'name' => 'about_hero_eyebrow', 'type' => 'text', 'default_value' => 'About Us' ],
			[ 'key' => 'field_about_hero_heading', 'label' => 'Hero Heading',   'name' => 'about_hero_heading', 'type' => 'text', 'default_value' => 'Trusted renovation specialists across' ],
			[ 'key' => 'field_about_hero_accent',  'label' => 'Hero Heading Accent (italic/orange)', 'name' => 'about_hero_heading_accent', 'type' => 'text', 'default_value' => 'Bristol & the South West' ],
			[ 'key' => 'field_about_hero_sub',     'label' => 'Hero Sub-heading', 'name' => 'about_hero_sub', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'We are a surveyor-led renovation and reinstatement company, dedicated to bringing professionalism, transparency, and exceptional craftsmanship to every project.' ],
			[ 'key' => 'field_hero_cta_label',    'label' => 'Hero Button Label', 'name' => 'hero_cta_label', 'type' => 'text', 'default_value' => 'Get a Free Quote' ],
			[ 'key' => 'field_hero_cta_url',      'label' => 'Hero Button URL',   'name' => 'hero_cta_url',   'type' => 'url',  'default_value' => '/contact/' ],
			// Our Story heading
			[ 'key' => 'field_about_story_msg',    'label' => 'Our Story section', 'name' => '', 'type' => 'message', 'message' => 'Edit the Our Story section heading. Body copy comes from the page editor.' ],
			[ 'key' => 'field_about_story_eyebrow', 'label' => 'Story Eyebrow', 'name' => 'about_story_eyebrow', 'type' => 'text', 'default_value' => 'Our Story' ],
			[ 'key' => 'field_about_story_title',  'label' => 'Story Heading',  'name' => 'about_story_title',  'type' => 'text', 'default_value' => 'Built on a foundation of' ],
			[ 'key' => 'field_about_story_accent',   'label' => 'Story Heading Accent (italic/orange)', 'name' => 'about_story_title_accent', 'type' => 'text', 'default_value' => 'trust and expertise.' ],
			[ 'key' => 'field_story_image',          'label' => 'Our Story Image',     'name' => 'about_story_image',     'type' => 'image', 'return_format' => 'id', 'preview_size' => 'thumbnail' ],
			[ 'key' => 'field_story_image_alt',      'label' => 'Our Story Image Alt', 'name' => 'about_story_image_alt', 'type' => 'text',  'instructions' => 'Leave blank to use the image\'s alt text from the media library.' ],
			// Values heading
			[ 'key' => 'field_values_eyebrow', 'label' => 'Values Eyebrow',                    'name' => 'values_eyebrow',      'type' => 'text', 'default_value' => 'The Sail Difference' ],
			[ 'key' => 'field_values_title',   'label' => 'Values Heading',                    'name' => 'values_title',        'type' => 'text', 'default_value' => 'Our core' ],
			[ 'key' => 'field_values_accent',  'label' => 'Values Heading Accent (italic/orange)', 'name' => 'values_title_accent', 'type' => 'text', 'default_value' => 'values.' ],
			// Values cards
			[ 'key' => 'field_values_msg',    'label' => 'Core Values section', 'name' => '', 'type' => 'message', 'message' => 'Edit the three values cards. Icons are fixed in the design.' ],
			[ 'key' => 'field_value_1_title', 'label' => 'Value 1 — Title', 'name' => 'value_1_title', 'type' => 'text',     'default_value' => 'Surveyor-Led Delivery' ],
			[ 'key' => 'field_value_1_body',  'label' => 'Value 1 — Body',  'name' => 'value_1_body',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Every project is assessed, scoped, and overseen by a qualified surveyor. This ensures accuracy in our quoting and adherence to the highest building standards throughout the build.' ],
			[ 'key' => 'field_value_2_title', 'label' => 'Value 2 — Title', 'name' => 'value_2_title', 'type' => 'text',     'default_value' => 'Transparent Communication' ],
			[ 'key' => 'field_value_2_body',  'label' => 'Value 2 — Body',  'name' => 'value_2_body',  'type' => 'textarea', 'rows' => 2, 'default_value' => "We believe in keeping you informed. You'll have a dedicated point of contact providing regular updates, so you always know exactly what is happening with your property." ],
			[ 'key' => 'field_value_3_title', 'label' => 'Value 3 — Title', 'name' => 'value_3_title', 'type' => 'text',     'default_value' => 'Exceptional Craftsmanship' ],
			[ 'key' => 'field_value_3_body',  'label' => 'Value 3 — Body',  'name' => 'value_3_body',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'We never compromise on quality. Our network of vetted, certified tradespeople take immense pride in their work, resulting in finishes that stand the test of time.' ],
			// Testimonial
			[ 'key' => 'field_test_msg',   'label' => 'Testimonial section', 'name' => '', 'type' => 'message', 'message' => 'Edit the featured testimonial quote.' ],
			[ 'key' => 'field_test_quote', 'label' => 'Quote', 'name' => 'testimonial_quote', 'type' => 'textarea', 'rows' => 4, 'default_value' => "We've worked together for nearly 10 years on a wide range of insurance reinstatement projects, and the service has always been reliable, professional, and completed to a high standard. Communication is excellent, works are handled efficiently, and we know our clients are in safe hands throughout the process. We would have no hesitation in recommending their services." ],
			[ 'key' => 'field_test_attr',  'label' => 'Attribution (name — company)', 'name' => 'testimonial_attr', 'type' => 'text', 'default_value' => 'Steve — Ellipta' ],
			// CTA banner
			[ 'key' => 'field_about_cta_msg',     'label' => 'CTA Banner section', 'name' => '', 'type' => 'message', 'message' => 'Edit the bottom call-to-action banner.' ],
			[ 'key' => 'field_about_cta_heading', 'label' => 'CTA Heading', 'name' => 'cta_heading', 'type' => 'text', 'instructions' => 'Wrap italic/orange words in <em>…</em>.', 'default_value' => 'Trusted by homeowners and <em>insurers alike.</em>' ],
			[ 'key' => 'field_about_cta_text',    'label' => 'CTA Body Text', 'name' => 'cta_text', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Our rigorous standards have earned us the trust of major insurance providers to handle complex reinstatement works. We bring that exact same level of scrutiny, project management, and attention to detail to our private home renovations.' ],
			[ 'key' => 'field_about_cta_btn_url', 'label' => 'CTA Button URL', 'name' => 'cta_button_url', 'type' => 'url', 'default_value' => '/contact/' ],
			[ 'key' => 'field_about_cta_btn_lbl',    'label' => 'CTA Button Label',       'name' => 'cta_button_label',       'type' => 'text', 'default_value' => 'Get a Free Quote' ],
			[ 'key' => 'field_trust_banner_image',   'label' => 'Trust Banner Image',     'name' => 'trust_banner_image',     'type' => 'image', 'return_format' => 'id', 'preview_size' => 'thumbnail' ],
			[ 'key' => 'field_trust_banner_img_alt', 'label' => 'Trust Banner Image Alt', 'name' => 'trust_banner_image_alt', 'type' => 'text',  'instructions' => 'Leave blank to use the image\'s alt text from the media library.' ],
			[ 'key' => 'field_trust_cta2_label',     'label' => 'Secondary Button Label', 'name' => 'trust_cta2_label',       'type' => 'text', 'default_value' => 'View Our Work' ],
			[ 'key' => 'field_trust_cta2_url',       'label' => 'Secondary Button URL',   'name' => 'trust_cta2_url',         'type' => 'url',  'default_value' => '/projects/' ],
			// Team heading
			[ 'key' => 'field_team_eyebrow', 'label' => 'Team Eyebrow',                    'name' => 'team_eyebrow',      'type' => 'text', 'default_value' => 'The Team' ],
			[ 'key' => 'field_team_title',   'label' => 'Team Heading',                    'name' => 'team_title',        'type' => 'text', 'default_value' => 'The people behind' ],
			[ 'key' => 'field_team_accent',  'label' => 'Team Heading Accent (italic/orange)', 'name' => 'team_title_accent', 'type' => 'text', 'default_value' => 'the projects.' ],
			// Our Tradespeople
			[ 'key' => 'field_tp_msg',       'label' => 'Our Tradespeople section', 'name' => '', 'type' => 'message', 'message' => 'Edit the tradespeople section heading, intro copy, and photo slots.' ],
			[ 'key' => 'field_tp_eyebrow',   'label' => 'Eyebrow',                  'name' => 'tradespeople_eyebrow',      'type' => 'text',     'default_value' => 'Our Tradespeople' ],
			[ 'key' => 'field_tp_title',     'label' => 'Heading',                  'name' => 'tradespeople_title',        'type' => 'text',     'default_value' => 'The skilled hands behind' ],
			[ 'key' => 'field_tp_accent',    'label' => 'Heading Accent (italic/orange)', 'name' => 'tradespeople_title_accent', 'type' => 'text', 'default_value' => 'every finish.' ],
			[ 'key' => 'field_tp_intro_1',   'label' => 'Intro Paragraph 1',        'name' => 'tradespeople_intro_1',      'type' => 'textarea', 'rows' => 2, 'default_value' => "Our tradespeople are central to every project we deliver. Over the years, we've built relationships with a core group of skilled craftsmen who genuinely share our standards — and many of them have been working alongside us from the very beginning." ],
			[ 'key' => 'field_tp_intro_2',   'label' => 'Intro Paragraph 2',        'name' => 'tradespeople_intro_2',      'type' => 'textarea', 'rows' => 2, 'default_value' => "Whether it's plastering, joinery, tiling, or decoration, you'll often see the same familiar faces across our projects. That consistency is something we're proud of: it means tradespeople who know exactly how we work, communicate without needing to be chased, and take real pride in the quality of finish they leave behind." ],
			[ 'key' => 'field_tp_intro_3',   'label' => 'Intro Paragraph 3',        'name' => 'tradespeople_intro_3',      'type' => 'textarea', 'rows' => 2, 'default_value' => "We'll be introducing them properly soon — with photos and a little background on each person, so you know exactly who to expect before work begins on your property." ],
			[ 'key' => 'field_tp_photo_msg', 'label' => 'Photo slots',              'name' => '', 'type' => 'message', 'message' => 'Upload up to three tradesperson photos and a van shot. Leave blank to show placeholder tiles.' ],
			[ 'key' => 'field_tp_photo_1',   'label' => 'Tradesperson Photo 1',     'name' => 'tradesperson_photo_1',      'type' => 'image', 'return_format' => 'id', 'preview_size' => 'thumbnail' ],
			[ 'key' => 'field_tp_photo_2',   'label' => 'Tradesperson Photo 2',     'name' => 'tradesperson_photo_2',      'type' => 'image', 'return_format' => 'id', 'preview_size' => 'thumbnail' ],
			[ 'key' => 'field_tp_photo_3',   'label' => 'Tradesperson Photo 3',     'name' => 'tradesperson_photo_3',      'type' => 'image', 'return_format' => 'id', 'preview_size' => 'thumbnail' ],
			[ 'key' => 'field_tp_van_photo',   'label' => 'Van Photo',                'name' => 'tradespeople_van_photo',    'type' => 'image', 'return_format' => 'id', 'preview_size' => 'thumbnail' ],
			[ 'key' => 'field_tp_photo_1_alt', 'label' => 'Tradesperson Photo 1 Alt', 'name' => 'tradesperson_photo_1_alt', 'type' => 'text', 'instructions' => 'Descriptive alt text for screen readers. Leave blank to use the media library alt.' ],
			[ 'key' => 'field_tp_photo_2_alt', 'label' => 'Tradesperson Photo 2 Alt', 'name' => 'tradesperson_photo_2_alt', 'type' => 'text', 'instructions' => 'Descriptive alt text for screen readers. Leave blank to use the media library alt.' ],
			[ 'key' => 'field_tp_photo_3_alt', 'label' => 'Tradesperson Photo 3 Alt', 'name' => 'tradesperson_photo_3_alt', 'type' => 'text', 'instructions' => 'Descriptive alt text for screen readers. Leave blank to use the media library alt.' ],
			[ 'key' => 'field_tp_van_photo_alt', 'label' => 'Van Photo Alt',          'name' => 'tradespeople_van_photo_alt', 'type' => 'text', 'instructions' => 'Descriptive alt text for screen readers. Leave blank to use the media library alt.' ],
		],
		'location' => [ [ [ 'param' => 'page_slug', 'operator' => '==', 'value' => 'about' ] ] ],
	] );

	// ── Service CPT ────────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sail_service',
		'title'  => 'Service — Card & Hero',
		'fields' => [
			[ 'key' => 'field_service_tag',          'label' => 'Card Tag (short label, e.g. "Insurance Approved")',                                                            'name' => 'service_tag',    'type' => 'text', 'default_value' => '' ],
			[ 'key' => 'field_service_hero_eyebrow', 'label' => 'Hero Eyebrow',      'name' => 'hero_eyebrow', 'type' => 'text', 'instructions' => 'Small label above the heading, e.g. "Insurance Reinstatement".', 'default_value' => '' ],
			[ 'key' => 'field_service_hero_heading', 'label' => 'Hero Heading (rich)', 'name' => 'hero_heading', 'type' => 'text', 'instructions' => 'Full hero sentence. Wrap highlighted word(s) in <em>…</em> for orange italic styling. Leave blank to use the page title.', 'default_value' => '' ],
		],
		'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'service' ] ] ],
	] );

	// ── Project CPT ────────────────────────────────────────────────────────────
	// Built-in: title = project name, thumbnail = featured image, excerpt = intro.
	// ACF provides: project_type, project_location, project_date for the meta sidebar.
	acf_add_local_field_group( [
		'key'    => 'group_sail_project',
		'title'  => 'Project — Meta Fields',
		'fields' => [
			[ 'key' => 'field_project_type',     'label' => 'Project Type (e.g. Full Renovation)',  'name' => 'project_type',     'type' => 'text', 'default_value' => '' ],
			[ 'key' => 'field_project_location', 'label' => 'Location (e.g. Clifton, Bristol)',     'name' => 'project_location', 'type' => 'text', 'default_value' => '' ],
			[ 'key' => 'field_project_date',     'label' => 'Completion Date (e.g. October 2024)', 'name' => 'project_date',     'type' => 'text', 'default_value' => '' ],
		],
		'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'project' ] ] ],
	] );
	// Team Member CPT: title = name, excerpt = job role, content = bio, thumbnail = photo.
	// No extra ACF fields needed — WordPress built-ins cover the full profile.
}

/**
 * Plugin-free breadcrumb trail.
 * Outputs nothing on the front page. Handles pages, singular service/project CPTs, and archives.
 */
function sail_breadcrumbs() {
	if ( is_front_page() ) return;

	$sep   = '<span class="sail-breadcrumbs__sep" aria-hidden="true">/</span>';
	$items = [];

	$items[] = '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'sail-renovate' ) . '</a>';

	if ( is_singular( 'service' ) ) {
		$services_page = get_page_by_path( 'services' );
		if ( $services_page ) {
			$items[] = '<a href="' . esc_url( get_permalink( $services_page ) ) . '">' . esc_html__( 'Services', 'sail-renovate' ) . '</a>';
		}
		$items[] = '<span aria-current="page">' . esc_html( get_the_title() ) . '</span>';

	} elseif ( is_singular( 'project' ) ) {
		$archive = get_post_type_archive_link( 'project' ) ?: home_url( '/projects/' );
		$items[] = '<a href="' . esc_url( $archive ) . '">' . esc_html__( 'Our Work', 'sail-renovate' ) . '</a>';
		$items[] = '<span aria-current="page">' . esc_html( get_the_title() ) . '</span>';

	} elseif ( is_post_type_archive( 'project' ) ) {
		$items[] = '<span aria-current="page">' . esc_html__( 'Our Work', 'sail-renovate' ) . '</span>';

	} elseif ( is_page() ) {
		foreach ( array_reverse( get_post_ancestors( get_the_ID() ) ) as $ancestor ) {
			$items[] = '<a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a>';
		}
		$items[] = '<span aria-current="page">' . esc_html( get_the_title() ) . '</span>';

	} elseif ( is_single() ) {
		$items[] = '<span aria-current="page">' . esc_html( get_the_title() ) . '</span>';

	} elseif ( is_category() || is_tax() || is_archive() ) {
		$items[] = '<span aria-current="page">' . esc_html( wp_strip_all_tags( get_the_archive_title() ) ) . '</span>';
	}

	echo '<nav class="sail-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'sail-renovate' ) . '"><div class="sail-breadcrumbs__inner">'
		. implode( $sep, $items )
		. '</div></nav>';
}

// ACF JSON — version-control field groups alongside the theme.
add_filter( 'acf/settings/save_json', function () {
	return get_stylesheet_directory() . '/acf-json';
} );
add_filter( 'acf/settings/load_json', function ( $paths ) {
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
} );
