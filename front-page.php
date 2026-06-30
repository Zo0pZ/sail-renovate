<?php
/**
 * Front page template (set via Settings → Reading → "A static page").
 *
 * @package sail-renovate
 */
get_header();
$img      = esc_url( get_template_directory_uri() . '/images/' );
$phone     = sail_contact( 'phone' );
$phone_tel = 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
?>

<!-- ── Hero ── -->
<section class="hero" aria-labelledby="hero-heading">
  <div class="hero__content">
    <span class="hero__eyebrow"><?php echo esc_html( sail_field( 'home_hero_eyebrow', __( 'Trusted Renovation Experts — Bristol & the South West', 'sail-renovate' ) ) ); ?></span>
    <h1 class="hero__heading" id="hero-heading">
      <?php echo esc_html( sail_field( 'home_hero_heading', __( 'Exceptional Renovations,', 'sail-renovate' ) ) ); ?><br>
      <em><?php echo esc_html( sail_field( 'home_hero_heading_accent', __( 'Trusted Results.', 'sail-renovate' ) ) ); ?></em>
    </h1>
    <p class="hero__sub">
      <?php echo esc_html( sail_field( 'home_hero_sub', __( 'From insurance reinstatement to full home renovations — surveyor-led, no hidden costs, and trusted by Bristol homeowners.', 'sail-renovate' ) ) ); ?>
    </p>
    <div class="hero__ctas">
      <a href="<?php echo esc_url( sail_field( 'home_hero_cta1_url', home_url( '/contact/' ) ) ); ?>" class="btn btn--primary"><?php echo esc_html( sail_field( 'home_hero_cta1_label', __( 'Start Your Project', 'sail-renovate' ) ) ); ?></a>
      <a href="<?php echo esc_url( sail_field( 'home_hero_cta2_url', home_url( '/projects/' ) ) ); ?>" class="btn btn--outline"><?php echo esc_html( sail_field( 'home_hero_cta2_label', __( 'View Our Work', 'sail-renovate' ) ) ); ?></a>
    </div>
    <p class="hero__cta-note"><?php echo esc_html( sail_field( 'home_hero_reassurance', __( 'Free quote · No obligation · Bristol & South West based', 'sail-renovate' ) ) ); ?></p>
    <div class="hero__stats">
      <div>
        <div class="stat__num"><?php echo esc_html( get_theme_mod( 'sail_hero_stat1_num', '10+' ) ); ?></div>
        <div class="stat__label"><?php echo esc_html( get_theme_mod( 'sail_hero_stat1_label', 'Years Experience' ) ); ?></div>
      </div>
      <div>
        <div class="stat__num"><?php echo esc_html( get_theme_mod( 'sail_hero_stat2_num', '500+' ) ); ?></div>
        <div class="stat__label"><?php echo esc_html( get_theme_mod( 'sail_hero_stat2_label', 'Projects Completed' ) ); ?></div>
      </div>
      <div>
        <div class="stat__num" style="color: var(--accent);">&#10003;</div>
        <div class="stat__label"><?php echo esc_html( get_theme_mod( 'sail_hero_stat3_label', 'Insurance Approved' ) ); ?></div>
      </div>
    </div>
  </div>
  <div class="hero__image">
    <video autoplay muted loop playsinline
           poster="<?php echo $img; ?>5-living-room.jpg">
      <source src="<?php echo esc_url( get_template_directory_uri() ); ?>/video/Drone_Footage_Video_Generation.mp4" type="video/mp4">
    </video>
    <div class="hero__badge">
      <p class="hero__badge-text"><?php esc_html_e( 'We make your home feel', 'sail-renovate' ); ?> <em><?php esc_html_e( 'extraordinary', 'sail-renovate' ); ?></em> <?php esc_html_e( 'again.', 'sail-renovate' ); ?></p>
      <span class="hero__badge-sub"><?php esc_html_e( 'Bristol & Surrounding Areas', 'sail-renovate' ); ?></span>
    </div>
  </div>
</section>

<!-- ── Intro Band ── -->
<div class="intro-band" role="list" aria-label="<?php esc_attr_e( 'Core services overview', 'sail-renovate' ); ?>">
  <div class="intro-item" role="listitem">
    <svg class="intro-item__icon" viewBox="0 0 40 40" fill="none" stroke="white" stroke-width="1.5" aria-hidden="true">
      <rect x="8" y="12" width="24" height="22" rx="1"/>
      <path d="M4 14 L20 4 L36 14"/>
      <path d="M16 34 L16 24 L24 24 L24 34"/>
    </svg>
    <div class="intro-item__title"><?php echo esc_html( sail_field( 'home_intro_1_title', __( 'Renovations & Repairs', 'sail-renovate' ) ) ); ?></div>
    <p class="intro-item__body"><?php echo esc_html( sail_field( 'home_intro_1_body', __( 'From insurance reinstatements to complete home renovations, trusted by homeowners and insurers across Bristol and the South West.', 'sail-renovate' ) ) ); ?></p>
  </div>
  <div class="intro-item" role="listitem">
    <svg class="intro-item__icon" viewBox="0 0 40 40" fill="none" stroke="white" stroke-width="1.5" aria-hidden="true">
      <circle cx="20" cy="20" r="14"/>
      <path d="M14 20 L18 24 L26 16"/>
    </svg>
    <div class="intro-item__title"><?php echo esc_html( sail_field( 'home_intro_2_title', __( 'Accredited & Qualified', 'sail-renovate' ) ) ); ?></div>
    <p class="intro-item__body"><?php echo esc_html( sail_field( 'home_intro_2_body', __( 'Qualified surveyors and certified tradespeople ensuring every project meets the highest standards.', 'sail-renovate' ) ) ); ?></p>
  </div>
  <div class="intro-item" role="listitem">
    <svg class="intro-item__icon" viewBox="0 0 40 40" fill="none" stroke="white" stroke-width="1.5" aria-hidden="true">
      <path d="M20 8 C20 8 10 16 10 24 a10 10 0 0 0 20 0 C30 16 20 8 20 8Z"/>
      <path d="M16 24 L20 20 L24 24"/>
    </svg>
    <div class="intro-item__title"><?php echo esc_html( sail_field( 'home_intro_3_title', __( 'Eco & Smart Upgrades', 'sail-renovate' ) ) ); ?></div>
    <p class="intro-item__body"><?php echo esc_html( sail_field( 'home_intro_3_body', __( 'Solar panels, smart heating, and sustainable materials for a greener, more efficient home.', 'sail-renovate' ) ) ); ?></p>
  </div>
</div>

<!-- ── Services ── -->
<section class="services" id="services" aria-labelledby="services-heading">
  <div class="section-header">
    <div>
      <p class="section-eyebrow"><?php echo esc_html( sail_field( 'home_services_eyebrow', __( 'What We Do', 'sail-renovate' ) ) ); ?></p>
      <h2 class="section-title" id="services-heading">
        <?php echo esc_html( sail_field( 'home_services_title', __( 'Our', 'sail-renovate' ) ) ); ?> <em><?php echo esc_html( sail_field( 'home_services_title_accent', __( 'Services', 'sail-renovate' ) ) ); ?></em>
      </h2>
    </div>
    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="section-link">
      <?php esc_html_e( 'All Services', 'sail-renovate' ); ?>
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>

  <div class="services-grid">
    <?php
    $service_q = new WP_Query( [
      'post_type'      => 'service',
      'posts_per_page' => 4,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    ] );
    $service_delays = [ '', ' fade-in-delay-1', ' fade-in-delay-2', ' fade-in-delay-3' ];
    $si = 0;
    if ( $service_q->have_posts() ) :
      while ( $service_q->have_posts() ) : $service_q->the_post();
        $s_thumb = get_the_post_thumbnail_url( null, 'large' );
        $s_tag   = sail_field( 'service_tag', '' );
        $s_delay = $service_delays[ $si % 4 ];
    ?>
    <a href="<?php the_permalink(); ?>" class="service-card fade-in<?php echo esc_attr( $s_delay ); ?>">
      <img class="service-card__img"
           src="<?php echo $s_thumb ? esc_url( $s_thumb ) : esc_url( $img ) . '12-bathroom.jpg'; ?>"
           alt="<?php echo esc_attr( get_the_title() ); ?>" />
      <div class="service-card__content">
        <?php if ( $s_tag ) : ?>
        <p class="service-card__tag"><?php echo esc_html( $s_tag ); ?></p>
        <?php endif; ?>
        <h3 class="service-card__title"><?php echo esc_html( get_the_title() ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <?php
      $si++;
      endwhile;
      wp_reset_postdata();
    else :
      // Fallback when no service posts exist yet in the CMS.
    ?>
    <a href="<?php echo esc_url( home_url( '/services/insurance-reinstatement/' ) ); ?>" class="service-card fade-in">
      <img class="service-card__img" src="<?php echo esc_url( $img ); ?>12-bathroom.jpg" alt="<?php esc_attr_e( 'Home repair and restoration work', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Insurance Approved', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Home Repairs & Restoration', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/services/property-refurbishment/' ) ); ?>" class="service-card fade-in fade-in-delay-1">
      <img class="service-card__img" src="<?php echo esc_url( $img ); ?>3-kitchen.jpg" alt="<?php esc_attr_e( 'Professional property renovation', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Full Project Management', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Property Renovations', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/services/property-maintenance/' ) ); ?>" class="service-card fade-in fade-in-delay-2">
      <img class="service-card__img" src="<?php echo esc_url( $img ); ?>15-garden.jpg" alt="<?php esc_attr_e( 'Eco-friendly home improvements', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Sustainable Living', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Eco Home Improvements', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/services/claims-management/' ) ); ?>" class="service-card fade-in fade-in-delay-3">
      <img class="service-card__img" src="<?php echo esc_url( $img ); ?>6-study.jpg" alt="<?php esc_attr_e( 'Claims management service', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Insurance Approved', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Claims Management', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <?php endif; ?>
  </div>
</section>

<!-- ── Why Sail Renovate ── -->
<section class="why-us" id="why-us" aria-labelledby="why-heading">
  <div class="why-us__content">
    <div>
      <p class="section-eyebrow"><?php echo esc_html( sail_field( 'home_why_eyebrow', __( 'Why Choose Us', 'sail-renovate' ) ) ); ?></p>
      <h2 class="section-title" id="why-heading">
        <?php echo esc_html( sail_field( 'home_why_title', __( 'A team you can', 'sail-renovate' ) ) ); ?><br><em><?php echo esc_html( sail_field( 'home_why_title_accent', __( 'truly rely on.', 'sail-renovate' ) ) ); ?></em>
      </h2>
    </div>
    <div class="why-us__list">
      <div class="why-item fade-in">
        <span class="why-item__num">01</span>
        <div>
          <h3 class="why-item__title"><?php echo esc_html( sail_field( 'home_why_1_title', __( 'Over a Decade of Expertise', 'sail-renovate' ) ) ); ?></h3>
          <p class="why-item__body"><?php echo esc_html( sail_field( 'home_why_1_body', __( "With more than ten years serving homeowners and insurers across Bristol and the South West, we've earned a reputation for reliability, quality, and transparency on every project — large or small.", 'sail-renovate' ) ) ); ?></p>
        </div>
      </div>
      <div class="why-item fade-in fade-in-delay-1">
        <span class="why-item__num">02</span>
        <div>
          <h3 class="why-item__title"><?php echo esc_html( sail_field( 'home_why_2_title', __( 'Qualified Surveyor-Led Projects', 'sail-renovate' ) ) ); ?></h3>
          <p class="why-item__body"><?php echo esc_html( sail_field( 'home_why_2_body', __( 'Every project is overseen by a qualified surveyor, ensuring accurate scoping, fair pricing, and a finished result that meets industry standards and your expectations.', 'sail-renovate' ) ) ); ?></p>
        </div>
      </div>
      <div class="why-item fade-in fade-in-delay-2">
        <span class="why-item__num">03</span>
        <div>
          <h3 class="why-item__title"><?php echo esc_html( sail_field( 'home_why_3_title', __( 'Dedicated Customer Care', 'sail-renovate' ) ) ); ?></h3>
          <p class="why-item__body"><?php echo esc_html( sail_field( 'home_why_3_body', __( "Your dedicated project contact keeps you informed at every stage — no surprises, no delays, just clear communication and a home you'll love.", 'sail-renovate' ) ) ); ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="why-us__image">
    <img src="<?php echo $img; ?>18-front.jpg" alt="<?php esc_attr_e( 'Completed renovation by Sail Renovate', 'sail-renovate' ); ?>" />
    <div class="why-us__image-badge">
      <strong><?php echo esc_html( sail_field( 'home_why_badge_num', '10+' ) ); ?></strong>
      <span><?php echo esc_html( sail_field( 'home_why_badge_label', __( 'Years Trusted', 'sail-renovate' ) ) ); ?></span>
    </div>
  </div>
</section>

<!-- ── Portfolio ── -->
<section class="portfolio" id="portfolio" aria-labelledby="portfolio-heading">
  <div class="section-header">
    <div>
      <p class="section-eyebrow"><?php echo esc_html( sail_field( 'home_portfolio_eyebrow', __( 'Recent Projects', 'sail-renovate' ) ) ); ?></p>
      <h2 class="section-title" id="portfolio-heading">
        <?php echo esc_html( sail_field( 'home_portfolio_title', __( 'Our', 'sail-renovate' ) ) ); ?> <em><?php echo esc_html( sail_field( 'home_portfolio_title_accent', __( 'Work', 'sail-renovate' ) ) ); ?></em>
      </h2>
    </div>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="section-link">
      <?php esc_html_e( 'View all projects', 'sail-renovate' ); ?>
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>

  <div class="portfolio-grid">
    <?php
    $port_q = new WP_Query( [
      'post_type'      => 'project',
      'posts_per_page' => 5,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    ] );
    $port_delays = [ '', ' fade-in-delay-1', ' fade-in-delay-2', '', ' fade-in-delay-1' ];
    $pi2 = 0;
    if ( $port_q->have_posts() ) :
      while ( $port_q->have_posts() ) : $port_q->the_post();
        $p_thumb = get_the_post_thumbnail_url( null, 'large' );
        $p_type  = get_post_meta( get_the_ID(), 'project_type', true );
        $p_loc   = get_post_meta( get_the_ID(), 'project_location', true );
        $p_disp  = trim( implode( ' &middot; ', array_filter( [ $p_type, $p_loc ] ) ) );
        $p_delay = $port_delays[ $pi2 % 5 ];
    ?>
    <a href="<?php the_permalink(); ?>" class="proj-card fade-in<?php echo esc_attr( $p_delay ); ?>">
      <img src="<?php echo $p_thumb ? esc_url( $p_thumb ) : esc_url( $img ) . '1-front.jpg'; ?>"
           alt="<?php echo esc_attr( get_the_title() ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <?php if ( $p_disp ) : ?>
        <p class="proj-card__type"><?php echo wp_kses_post( $p_disp ); ?></p>
        <?php endif; ?>
        <p class="proj-card__title"><?php echo esc_html( get_the_title() ); ?></p>
      </div>
    </a>
    <?php
      $pi2++;
      endwhile;
      wp_reset_postdata();
    else :
      // Fallback: one real project card when CPT is empty.
    ?>
    <a href="<?php echo esc_url( home_url( '/projects/period-property-transformation/' ) ); ?>" class="proj-card fade-in">
      <img src="<?php echo esc_url( $img ); ?>1-front.jpg" alt="<?php esc_attr_e( 'Full renovation, Bristol', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Full Renovation · Clifton', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Period Property Transformation', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <?php endif; ?>
  </div>

  <div class="portfolio-cta fade-in">
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--outline"><?php esc_html_e( 'Discuss Your Project', 'sail-renovate' ); ?></a>
  </div>
</section>

<!-- ── Philosophy ── -->
<section class="philosophy" aria-label="<?php esc_attr_e( 'Company philosophy', 'sail-renovate' ); ?>">
  <blockquote class="philosophy__quote">
    &#8220;<?php echo esc_html( sail_field( 'home_philosophy_quote', __( "We want you to feel proud and excited every time you come home — that's the standard we hold ourselves to on every single project.", 'sail-renovate' ) ) ); ?>&#8221;
  </blockquote>
  <p class="philosophy__attr"><?php echo esc_html( sail_field( 'home_philosophy_attr', __( '— The Sail Renovate Team', 'sail-renovate' ) ) ); ?></p>
</section>

<!-- ── FAQ ── -->
<section class="faq" id="faq" aria-labelledby="faq-heading">
  <div style="text-align:center; margin-bottom: 1rem;">
    <p class="section-eyebrow" style="justify-content:center; display:flex; gap:0.5rem;"><?php echo esc_html( sail_field( 'home_faq_eyebrow', __( 'Common Questions', 'sail-renovate' ) ) ); ?></p>
    <h2 class="section-title" id="faq-heading"><?php echo esc_html( sail_field( 'home_faq_title', __( 'Frequently Asked', 'sail-renovate' ) ) ); ?></h2>
  </div>

  <div class="faq-list" role="list">
    <?php
    $faq_q = new WP_Query( [
      'post_type'      => 'faq',
      'posts_per_page' => -1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    ] );
    if ( $faq_q->have_posts() ) :
      while ( $faq_q->have_posts() ) : $faq_q->the_post();
    ?>
    <div class="faq-item" role="listitem">
      <button class="faq-question" aria-expanded="false">
        <?php echo esc_html( get_the_title() ); ?>
        <span class="faq-icon" aria-hidden="true"></span>
      </button>
      <div class="faq-answer" role="region">
        <?php the_content(); ?>
      </div>
    </div>
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      // Fallback until FAQ posts are added in the WP admin
      $faqs = [
        [ __( 'Do you offer free quotes?', 'sail-renovate' ), __( 'Absolutely. We offer free, no-obligation quotes for all project types. One of our qualified surveyors will visit your property to assess the work required and provide a detailed, transparent quote with no hidden costs.', 'sail-renovate' ) ],
        [ __( 'What types of projects do you specialise in?', 'sail-renovate' ), __( 'We specialise in home repairs, property renovations, insurance reinstatement, and property refurbishment. We handle everything from small repairs to complete property transformations across Bristol and the South West.', 'sail-renovate' ) ],
        [ __( 'Are you approved by insurance companies?', 'sail-renovate' ), __( 'Yes. We are trusted by major insurers to carry out restoration and repair work. We handle the documentation and scoping process to make insurance claims as smooth as possible for homeowners.', 'sail-renovate' ) ],
        [ __( 'How do you manage projects and keep me informed?', 'sail-renovate' ), __( "Each project is assigned a dedicated project manager who acts as your single point of contact. They'll keep you updated throughout the build with regular progress reports, handle any issues that arise, and ensure the project stays on time and on budget.", 'sail-renovate' ) ],
        [ __( 'What areas do you cover?', 'sail-renovate' ), __( "We're based in Bristol and cover the wider Bristol area including Clifton, Redland, Bishopston, Westbury Park, Horfield, and surrounding areas. If you're unsure whether we cover your location, give us a call and we'll let you know.", 'sail-renovate' ) ],
        [ __( 'What eco-friendly options do you offer?', 'sail-renovate' ), __( 'We offer a full range of eco upgrades including solar panel installation, smart heating systems (such as heat pumps and smart thermostats), improved insulation, sustainable materials, and EV charging points. We can also advise on available government grants and incentives.', 'sail-renovate' ) ],
      ];
      foreach ( $faqs as $faq ) :
    ?>
    <div class="faq-item" role="listitem">
      <button class="faq-question" aria-expanded="false">
        <?php echo esc_html( $faq[0] ); ?>
        <span class="faq-icon" aria-hidden="true"></span>
      </button>
      <div class="faq-answer" role="region">
        <p><?php echo esc_html( $faq[1] ); ?></p>
      </div>
    </div>
    <?php
      endforeach;
    endif;
    ?>
  </div>
</section>

<!-- ── Contact / CTA ── -->
<section class="contact" id="contact" aria-labelledby="contact-heading">
  <div class="contact__info">
    <div>
      <p class="section-eyebrow"><?php echo esc_html( sail_field( 'home_contact_eyebrow', __( 'Get In Touch', 'sail-renovate' ) ) ); ?></p>
      <h2 class="section-title" id="contact-heading">
        <?php echo esc_html( sail_field( 'home_contact_title', __( 'Start Your', 'sail-renovate' ) ) ); ?> <em><?php echo esc_html( sail_field( 'home_contact_title_accent', __( 'Project', 'sail-renovate' ) ) ); ?></em>
      </h2>
      <p class="contact__intro"><?php echo esc_html( sail_field( 'home_contact_intro', __( 'Whether you require an urgent insurance repair or are planning a comprehensive home renovation, our team is ready to assist. Contact us today to arrange a free, no-obligation surveyor visit.', 'sail-renovate' ) ) ); ?></p>
    </div>

    <div class="contact__detail">
      <svg class="contact__detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.12 1.18 2 2 0 012.11 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
      <div>
        <p class="contact__detail-label"><?php esc_html_e( 'Phone', 'sail-renovate' ); ?></p>
        <div class="contact__detail-value"><a href="<?php echo esc_url( $phone_tel ); ?>"><?php echo esc_html( $phone ); ?></a></div>
      </div>
    </div>

    <div class="contact__detail">
      <svg class="contact__detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
      <div>
        <p class="contact__detail-label"><?php esc_html_e( 'Email', 'sail-renovate' ); ?></p>
        <div class="contact__detail-value"><a href="mailto:<?php echo esc_attr( sail_contact( 'email' ) ); ?>"><?php echo esc_html( sail_contact( 'email' ) ); ?></a></div>
      </div>
    </div>

    <div class="contact__detail">
      <svg class="contact__detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
      <div>
        <p class="contact__detail-label"><?php esc_html_e( 'Location', 'sail-renovate' ); ?></p>
        <div class="contact__detail-value"><?php echo esc_html( sail_contact( 'location' ) ); ?></div>
      </div>
    </div>

    <div>
      <p class="contact__detail-label" style="margin-bottom:0.75rem;"><?php esc_html_e( 'Follow Us', 'sail-renovate' ); ?></p>
      <div class="contact__socials">
        <a href="<?php echo esc_url( sail_contact( 'instagram_url' ) ); ?>" class="social-btn" aria-label="<?php esc_attr_e( 'Instagram', 'sail-renovate' ); ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
        </a>
        <a href="<?php echo esc_url( sail_contact( 'facebook_url' ) ); ?>" class="social-btn" aria-label="<?php esc_attr_e( 'Facebook', 'sail-renovate' ); ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
        </a>
      </div>
    </div>
  </div>

  <div class="contact__cta">
    <div style="text-align: center; max-width: 640px; margin: 0 auto;">
      <p class="section-eyebrow"><?php echo esc_html( sail_field( 'home_cta_eyebrow', __( 'Ready to Transform Your Home?', 'sail-renovate' ) ) ); ?></p>
      <h3 class="cta-card__title"><?php echo esc_html( sail_field( 'home_cta_title', __( 'Ready to start your project?', 'sail-renovate' ) ) ); ?></h3>
      <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.7; margin: 1.5rem 0 2.5rem;">
        <?php echo esc_html( sail_field( 'home_cta_body', __( 'Join our satisfied clients and experience professional renovation services across Bristol and the South West. Free consultation, no obligation.', 'sail-renovate' ) ) ); ?>
      </p>
      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="<?php echo esc_url( $phone_tel ); ?>" class="btn btn--primary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.12 1.18 2 2 0 012.11 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
          <?php
          /* translators: %s: phone number */
          printf( esc_html__( 'Call %s', 'sail-renovate' ), esc_html( $phone ) );
          ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--outline"><?php esc_html_e( 'Get Started Today', 'sail-renovate' ); ?></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
