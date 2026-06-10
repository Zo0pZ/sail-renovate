<?php
/**
 * Front page template (set via Settings → Reading → "A static page").
 *
 * @package sail-renovate
 */
get_header();
$img = esc_url( get_template_directory_uri() . '/images/' );
?>

<!-- ── Hero ── -->
<section class="hero" aria-labelledby="hero-heading">
  <div class="hero__content">
    <span class="hero__eyebrow"><?php esc_html_e( 'Trusted Renovation Experts — Bristol & the South West', 'sail-renovate' ); ?></span>
    <h1 class="hero__heading" id="hero-heading">
      <em><?php esc_html_e( 'Exceptional', 'sail-renovate' ); ?></em><br>
      <?php esc_html_e( 'Renovations,', 'sail-renovate' ); ?><br>
      <?php esc_html_e( 'Trusted Results.', 'sail-renovate' ); ?>
    </h1>
    <p class="hero__sub">
      <?php esc_html_e( 'From insurance reinstatement to full home renovations — surveyor-led, no hidden costs, and trusted by Bristol homeowners.', 'sail-renovate' ); ?>
    </p>
    <div class="hero__ctas">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--primary"><?php esc_html_e( 'Start Your Project', 'sail-renovate' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="btn btn--outline"><?php esc_html_e( 'View Our Work', 'sail-renovate' ); ?></a>
    </div>
    <p class="hero__cta-note"><?php esc_html_e( 'Free quote · No obligation · Bristol & South West based', 'sail-renovate' ); ?></p>
    <div class="hero__stats">
      <div>
        <div class="stat__num">10<em>+</em></div>
        <div class="stat__label"><?php esc_html_e( 'Years Experience', 'sail-renovate' ); ?></div>
      </div>
      <div>
        <div class="stat__num">500<em>+</em></div>
        <div class="stat__label"><?php esc_html_e( 'Projects Completed', 'sail-renovate' ); ?></div>
      </div>
      <div>
        <div class="stat__num" style="color: var(--accent);">&#10003;</div>
        <div class="stat__label"><?php esc_html_e( 'Insurance Approved', 'sail-renovate' ); ?></div>
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
    <div class="intro-item__title"><?php esc_html_e( 'Renovations & Repairs', 'sail-renovate' ); ?></div>
    <p class="intro-item__body"><?php esc_html_e( 'From insurance reinstatements to complete home renovations, trusted by homeowners and insurers across Bristol and the South West.', 'sail-renovate' ); ?></p>
  </div>
  <div class="intro-item" role="listitem">
    <svg class="intro-item__icon" viewBox="0 0 40 40" fill="none" stroke="white" stroke-width="1.5" aria-hidden="true">
      <circle cx="20" cy="20" r="14"/>
      <path d="M14 20 L18 24 L26 16"/>
    </svg>
    <div class="intro-item__title"><?php esc_html_e( 'Accredited & Qualified', 'sail-renovate' ); ?></div>
    <p class="intro-item__body"><?php esc_html_e( 'Qualified surveyors and certified tradespeople ensuring every project meets the highest standards.', 'sail-renovate' ); ?></p>
  </div>
  <div class="intro-item" role="listitem">
    <svg class="intro-item__icon" viewBox="0 0 40 40" fill="none" stroke="white" stroke-width="1.5" aria-hidden="true">
      <path d="M20 8 C20 8 10 16 10 24 a10 10 0 0 0 20 0 C30 16 20 8 20 8Z"/>
      <path d="M16 24 L20 20 L24 24"/>
    </svg>
    <div class="intro-item__title"><?php esc_html_e( 'Eco & Smart Upgrades', 'sail-renovate' ); ?></div>
    <p class="intro-item__body"><?php esc_html_e( 'Solar panels, smart heating, and sustainable materials for a greener, more efficient home.', 'sail-renovate' ); ?></p>
  </div>
</div>

<!-- ── Services ── -->
<section class="services" id="services" aria-labelledby="services-heading">
  <div class="section-header">
    <div>
      <p class="section-eyebrow"><?php esc_html_e( 'What We Do', 'sail-renovate' ); ?></p>
      <h2 class="section-title" id="services-heading">
        <?php esc_html_e( 'Our', 'sail-renovate' ); ?> <em><?php esc_html_e( 'Services', 'sail-renovate' ); ?></em>
      </h2>
    </div>
    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="section-link">
      <?php esc_html_e( 'All Services', 'sail-renovate' ); ?>
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>

  <div class="services-grid">
    <a href="<?php echo esc_url( home_url( '/services/insurance-reinstatement/' ) ); ?>" class="service-card fade-in">
      <img class="service-card__img" src="<?php echo $img; ?>12-bathroom.jpg" alt="<?php esc_attr_e( 'Home repair and restoration work', 'sail-renovate' ); ?>" />
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
      <img class="service-card__img" src="<?php echo $img; ?>3-kitchen.jpg" alt="<?php esc_attr_e( 'Professional property renovation', 'sail-renovate' ); ?>" />
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
      <img class="service-card__img" src="<?php echo $img; ?>15-garden.jpg" alt="<?php esc_attr_e( 'Eco-friendly home improvements', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Sustainable Living', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Eco Home Improvements', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>

    <a href="<?php echo esc_url( home_url( '/services/project-management/' ) ); ?>" class="service-card fade-in fade-in-delay-3">
      <img class="service-card__img" src="<?php echo $img; ?>6-study.jpg" alt="<?php esc_attr_e( 'Smart home systems installation', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Technology & Automation', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Smart Home Systems', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
  </div>
</section>

<!-- ── Why Sail Renovate ── -->
<section class="why-us" id="why-us" aria-labelledby="why-heading">
  <div class="why-us__content">
    <div>
      <p class="section-eyebrow"><?php esc_html_e( 'Why Choose Us', 'sail-renovate' ); ?></p>
      <h2 class="section-title" id="why-heading">
        <?php esc_html_e( 'A team you can', 'sail-renovate' ); ?><br><em><?php esc_html_e( 'truly rely on.', 'sail-renovate' ); ?></em>
      </h2>
    </div>
    <div class="why-us__list">
      <div class="why-item fade-in">
        <span class="why-item__num">01</span>
        <div>
          <h3 class="why-item__title"><?php esc_html_e( 'Over a Decade of Expertise', 'sail-renovate' ); ?></h3>
          <p class="why-item__body"><?php esc_html_e( 'With more than ten years serving homeowners and insurers across Bristol and the South West, we\'ve earned a reputation for reliability, quality, and transparency on every project — large or small.', 'sail-renovate' ); ?></p>
        </div>
      </div>
      <div class="why-item fade-in fade-in-delay-1">
        <span class="why-item__num">02</span>
        <div>
          <h3 class="why-item__title"><?php esc_html_e( 'Qualified Surveyor-Led Projects', 'sail-renovate' ); ?></h3>
          <p class="why-item__body"><?php esc_html_e( 'Every project is overseen by a qualified surveyor, ensuring accurate scoping, fair pricing, and a finished result that meets industry standards and your expectations.', 'sail-renovate' ); ?></p>
        </div>
      </div>
      <div class="why-item fade-in fade-in-delay-2">
        <span class="why-item__num">03</span>
        <div>
          <h3 class="why-item__title"><?php esc_html_e( 'Dedicated Customer Care', 'sail-renovate' ); ?></h3>
          <p class="why-item__body"><?php esc_html_e( 'Your dedicated project contact keeps you informed at every stage — no surprises, no delays, just clear communication and a home you\'ll love.', 'sail-renovate' ); ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="why-us__image">
    <img src="<?php echo $img; ?>18-front.jpg" alt="<?php esc_attr_e( 'Completed renovation by Sail Renovate', 'sail-renovate' ); ?>" />
    <div class="why-us__image-badge">
      <strong>10+</strong>
      <span><?php esc_html_e( 'Years Trusted', 'sail-renovate' ); ?></span>
    </div>
  </div>
</section>

<!-- ── Portfolio ── -->
<section class="portfolio" id="portfolio" aria-labelledby="portfolio-heading">
  <div class="section-header">
    <div>
      <p class="section-eyebrow"><?php esc_html_e( 'Recent Projects', 'sail-renovate' ); ?></p>
      <h2 class="section-title" id="portfolio-heading">
        <?php esc_html_e( 'Our', 'sail-renovate' ); ?> <em><?php esc_html_e( 'Work', 'sail-renovate' ); ?></em>
      </h2>
    </div>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="section-link">
      <?php esc_html_e( 'View all projects', 'sail-renovate' ); ?>
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>

  <div class="portfolio-grid">
    <a href="<?php echo esc_url( home_url( '/projects/period-property-transformation/' ) ); ?>" class="proj-card fade-in">
      <img src="<?php echo $img; ?>1-front.jpg" alt="<?php esc_attr_e( 'Full renovation, Bristol', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Full Renovation · Clifton', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Period Property Transformation', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="proj-card fade-in fade-in-delay-1">
      <img src="<?php echo $img; ?>11-bathroom.jpg" alt="<?php esc_attr_e( 'Bathroom renovation Bristol', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Bathroom · Redland', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Luxury Bathroom Suite', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="proj-card fade-in fade-in-delay-2">
      <img src="<?php echo $img; ?>4-diner.jpg" alt="<?php esc_attr_e( 'Kitchen-diner extension Bristol', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Extension · Westbury Park', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Kitchen-Diner Extension', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="proj-card fade-in">
      <img src="<?php echo $img; ?>15-garden.jpg" alt="<?php esc_attr_e( 'Eco garden and outdoor upgrade', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Eco Upgrade · Bishopston', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Solar & Smart Heating', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="proj-card fade-in fade-in-delay-1">
      <img src="<?php echo $img; ?>16-hallway.jpg" alt="<?php esc_attr_e( 'Insurance restoration project', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Insurance Repair · Horfield', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Fire Damage Restoration', 'sail-renovate' ); ?></p>
      </div>
    </a>
  </div>

  <div class="portfolio-cta fade-in">
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--outline"><?php esc_html_e( 'Discuss Your Project', 'sail-renovate' ); ?></a>
  </div>
</section>

<!-- ── Philosophy ── -->
<section class="philosophy" aria-label="<?php esc_attr_e( 'Company philosophy', 'sail-renovate' ); ?>">
  <blockquote class="philosophy__quote">
    &#8220;<?php esc_html_e( 'We want you to feel proud and excited every time you come home — that\'s the standard we hold ourselves to on every single project.', 'sail-renovate' ); ?>&#8221;
  </blockquote>
  <p class="philosophy__attr"><?php esc_html_e( '— The Sail Renovate Team', 'sail-renovate' ); ?></p>
</section>

<!-- ── FAQ ── -->
<section class="faq" id="faq" aria-labelledby="faq-heading">
  <div style="text-align:center; margin-bottom: 1rem;">
    <p class="section-eyebrow" style="justify-content:center; display:flex; gap:0.5rem;"><?php esc_html_e( 'Common Questions', 'sail-renovate' ); ?></p>
    <h2 class="section-title" id="faq-heading"><?php esc_html_e( 'Frequently Asked', 'sail-renovate' ); ?></h2>
  </div>

  <div class="faq-list" role="list">
    <?php
    $faqs = [
      [ __( 'Do you offer free quotes?', 'sail-renovate' ), __( 'Absolutely. We offer free, no-obligation quotes for all project types. One of our qualified surveyors will visit your property to assess the work required and provide a detailed, transparent quote with no hidden costs.', 'sail-renovate' ) ],
      [ __( 'What types of projects do you specialise in?', 'sail-renovate' ), __( 'We specialise in home repairs, property renovations, insurance reinstatement, and property refurbishment. We handle everything from small repairs to complete property transformations across Bristol and the South West.', 'sail-renovate' ) ],
      [ __( 'Are you approved by insurance companies?', 'sail-renovate' ), __( 'Yes. We are trusted by major insurers to carry out restoration and repair work. We handle the documentation and scoping process to make insurance claims as smooth as possible for homeowners.', 'sail-renovate' ) ],
      [ __( 'How do you manage projects and keep me informed?', 'sail-renovate' ), __( 'Each project is assigned a dedicated project manager who acts as your single point of contact. They\'ll keep you updated throughout the build with regular progress reports, handle any issues that arise, and ensure the project stays on time and on budget.', 'sail-renovate' ) ],
      [ __( 'What areas do you cover?', 'sail-renovate' ), __( 'We\'re based in Bristol and cover the wider Bristol area including Clifton, Redland, Bishopston, Westbury Park, Horfield, and surrounding areas. If you\'re unsure whether we cover your location, give us a call and we\'ll let you know.', 'sail-renovate' ) ],
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
    <?php endforeach; ?>
  </div>
</section>

<!-- ── Contact / CTA ── -->
<section class="contact" id="contact" aria-labelledby="contact-heading">
  <div class="contact__info">
    <div>
      <p class="section-eyebrow"><?php esc_html_e( 'Get In Touch', 'sail-renovate' ); ?></p>
      <h2 class="section-title" id="contact-heading">
        <?php esc_html_e( 'Start Your', 'sail-renovate' ); ?> <em><?php esc_html_e( 'Project', 'sail-renovate' ); ?></em>
      </h2>
      <p class="contact__intro"><?php esc_html_e( 'Whether you require an urgent insurance repair or are planning a comprehensive home renovation, our team is ready to assist. Contact us today to arrange a free, no-obligation surveyor visit.', 'sail-renovate' ); ?></p>
    </div>

    <div class="contact__detail">
      <svg class="contact__detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.12 1.18 2 2 0 012.11 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
      <div>
        <p class="contact__detail-label"><?php esc_html_e( 'Phone', 'sail-renovate' ); ?></p>
        <div class="contact__detail-value"><a href="tel:01174767858">0117 476 7858</a></div>
      </div>
    </div>

    <div class="contact__detail">
      <svg class="contact__detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
      <div>
        <p class="contact__detail-label"><?php esc_html_e( 'Email', 'sail-renovate' ); ?></p>
        <div class="contact__detail-value"><a href="mailto:team@sailrenovate.co.uk">team@sailrenovate.co.uk</a></div>
      </div>
    </div>

    <div class="contact__detail">
      <svg class="contact__detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
      <div>
        <p class="contact__detail-label"><?php esc_html_e( 'Location', 'sail-renovate' ); ?></p>
        <div class="contact__detail-value"><?php esc_html_e( 'Bristol & Surrounding Areas', 'sail-renovate' ); ?></div>
      </div>
    </div>

    <div>
      <p class="contact__detail-label" style="margin-bottom:0.75rem;"><?php esc_html_e( 'Follow Us', 'sail-renovate' ); ?></p>
      <div class="contact__socials">
        <a href="#" class="social-btn" aria-label="<?php esc_attr_e( 'Instagram', 'sail-renovate' ); ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
        </a>
        <a href="#" class="social-btn" aria-label="<?php esc_attr_e( 'Facebook', 'sail-renovate' ); ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
        </a>
      </div>
    </div>
  </div>

  <div class="contact__cta">
    <div style="text-align: center; max-width: 640px; margin: 0 auto;">
      <p class="section-eyebrow"><?php esc_html_e( 'Ready to Transform Your Home?', 'sail-renovate' ); ?></p>
      <h3 class="cta-card__title"><?php esc_html_e( 'Ready to start your', 'sail-renovate' ); ?> <em><?php esc_html_e( 'project?', 'sail-renovate' ); ?></em></h3>
      <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.7; margin: 1.5rem 0 2.5rem;">
        <?php esc_html_e( 'Join our satisfied clients and experience professional renovation services across Bristol and the South West. Free consultation, no obligation.', 'sail-renovate' ); ?>
      </p>
      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="tel:01174767858" class="btn btn--primary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.12 1.18 2 2 0 012.11 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
          <?php esc_html_e( 'Call 0117 476 7858', 'sail-renovate' ); ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--outline"><?php esc_html_e( 'Get Started Today', 'sail-renovate' ); ?></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
