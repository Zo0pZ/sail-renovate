<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon-16x16.png">
  <link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() ); ?>/site.webmanifest">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ── Navigation ── -->
<nav class="nav" id="nav">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__logo" aria-label="<?php esc_attr_e( 'Sail Renovate home', 'sail-renovate' ); ?>">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/Sail_Renovate_Primary_Orange_MAIN-300x229.png" alt="<?php esc_attr_e( 'Sail Renovate', 'sail-renovate' ); ?>" />
  </a>

  <ul class="nav__links">
    <li>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
         <?php echo is_front_page() ? 'aria-current="page"' : ''; ?>>
        <?php esc_html_e( 'Home', 'sail-renovate' ); ?>
      </a>
    </li>
    <li>
      <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"
         <?php echo is_page( 'about' ) ? 'aria-current="page"' : ''; ?>>
        <?php esc_html_e( 'About', 'sail-renovate' ); ?>
      </a>
    </li>
    <li class="nav__item nav__item--has-mega">
      <button class="nav__mega-trigger"
              <?php echo ( is_page( 'services' ) || get_post_type() === 'service' ) ? 'aria-current="page"' : ''; ?>
              aria-expanded="false" aria-controls="megaNav">
        <?php esc_html_e( 'Services', 'sail-renovate' ); ?>
        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
      </button>
    </li>
    <li>
      <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"
         <?php echo ( is_page( 'projects' ) || get_post_type() === 'project' ) ? 'aria-current="page"' : ''; ?>>
        <?php esc_html_e( 'Our Work', 'sail-renovate' ); ?>
      </a>
    </li>
    <li>
      <a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>"
         <?php echo is_page( 'testimonials' ) ? 'aria-current="page"' : ''; ?>>
        <?php esc_html_e( 'Testimonials', 'sail-renovate' ); ?>
      </a>
    </li>
    <li>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
         <?php echo is_page( 'contact' ) ? 'aria-current="page"' : ''; ?>>
        <?php esc_html_e( 'Contact', 'sail-renovate' ); ?>
      </a>
    </li>
  </ul>

  <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nav__cta">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.12 1.18 2 2 0 012.11 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
    <?php esc_html_e( 'Get a Quote', 'sail-renovate' ); ?>
  </a>

  <button class="nav__burger" id="burger"
          aria-label="<?php esc_attr_e( 'Open menu', 'sail-renovate' ); ?>"
          aria-expanded="false">
    <span></span><span></span><span></span>
  </button>

  <!-- Mega Nav Panel -->
  <div class="mega-nav" id="megaNav" role="region" aria-label="<?php esc_attr_e( 'Services menu', 'sail-renovate' ); ?>">
    <div class="mega-nav__inner">
      <div class="mega-nav__grid">
        <a href="<?php echo esc_url( home_url( '/services/insurance-reinstatement/' ) ); ?>" class="mega-nav__card">
          <svg class="mega-nav__card-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
            <path d="M20 4 L34 10 V22 C34 30 20 36 20 36 C20 36 6 30 6 22 V10 Z"/>
            <path d="M14 20 L18 24 L26 16"/>
          </svg>
          <h4><?php esc_html_e( 'Insurance Reinstatement', 'sail-renovate' ); ?></h4>
          <p><?php esc_html_e( 'Trusted delivery for insurer-led repairs and reinstatement projects.', 'sail-renovate' ); ?></p>
        </a>
        <a href="<?php echo esc_url( home_url( '/services/property-refurbishment/' ) ); ?>" class="mega-nav__card">
          <svg class="mega-nav__card-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
            <rect x="8" y="12" width="24" height="22" rx="1"/>
            <path d="M4 14 L20 4 L36 14"/>
            <path d="M16 34 L16 24 L24 24 L24 34"/>
          </svg>
          <h4><?php esc_html_e( 'Property Refurbishment', 'sail-renovate' ); ?></h4>
          <p><?php esc_html_e( 'Complete home makeovers from kitchens and bathrooms to full transformations.', 'sail-renovate' ); ?></p>
        </a>

        <a href="<?php echo esc_url( home_url( '/services/project-management/' ) ); ?>" class="mega-nav__card">
          <svg class="mega-nav__card-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
            <rect x="10" y="8" width="20" height="26" rx="1"/>
            <path d="M15 16 H25"/>
            <path d="M15 21 H25"/>
            <path d="M15 26 H20"/>
          </svg>
          <h4><?php esc_html_e( 'Project Management', 'sail-renovate' ); ?></h4>
          <p><?php esc_html_e( 'Co-ordinated delivery, procurement and contractor scheduling.', 'sail-renovate' ); ?></p>
        </a>
        <a href="<?php echo esc_url( home_url( '/services/claims-management/' ) ); ?>" class="mega-nav__card">
          <svg class="mega-nav__card-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
            <circle cx="20" cy="20" r="14"/>
            <path d="M14 20 L18 24 L26 16"/>
          </svg>
          <h4><?php esc_html_e( 'Claims Management', 'sail-renovate' ); ?></h4>
          <p><?php esc_html_e( 'Working with insurers and homeowners to keep claims moving smoothly.', 'sail-renovate' ); ?></p>
        </a>
      </div>
      <div class="mega-nav__footer">
        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="mega-nav__all">
          <?php esc_html_e( 'View all services', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
  </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu" role="dialog" aria-label="<?php esc_attr_e( 'Navigation menu', 'sail-renovate' ); ?>">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-link"><?php esc_html_e( 'Home', 'sail-renovate' ); ?></a>
  <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="mobile-link"><?php esc_html_e( 'About', 'sail-renovate' ); ?></a>
  <div class="mobile-services">
    <button class="mobile-services__trigger" aria-expanded="false">
      <?php esc_html_e( 'Services', 'sail-renovate' ); ?>
      <svg class="nav__chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </button>
    <div class="mobile-services__list">
      <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="mobile-services__all"><?php esc_html_e( 'All Services', 'sail-renovate' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/services/insurance-reinstatement/' ) ); ?>"><?php esc_html_e( 'Insurance Reinstatement', 'sail-renovate' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/services/property-refurbishment/' ) ); ?>"><?php esc_html_e( 'Property Refurbishment', 'sail-renovate' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/services/property-maintenance/' ) ); ?>"><?php esc_html_e( 'Property Maintenance', 'sail-renovate' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/services/project-management/' ) ); ?>"><?php esc_html_e( 'Project Management', 'sail-renovate' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/services/claims-management/' ) ); ?>"><?php esc_html_e( 'Claims Management', 'sail-renovate' ); ?></a>
    </div>
  </div>
  <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="mobile-link"><?php esc_html_e( 'Our Work', 'sail-renovate' ); ?></a>
  <a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>" class="mobile-link"><?php esc_html_e( 'Testimonials', 'sail-renovate' ); ?></a>
  <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mobile-link"><?php esc_html_e( 'Contact', 'sail-renovate' ); ?></a>
  <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nav__cta"><?php esc_html_e( 'Get a Quote', 'sail-renovate' ); ?></a>
</div>
