<?php
/**
 * Template for the About page (slug: about).
 *
 * @package sail-renovate
 */
get_header();
if ( have_posts() ) the_post();
$img = esc_url( get_template_directory_uri() . '/images/' );
?>
<main>
  <!-- ── Internal Hero ── -->
  <section class="internal-hero">
    <span class="section-eyebrow"><?php esc_html_e( 'About Us', 'sail-renovate' ); ?></span>
    <h1 class="hero__heading"><?php esc_html_e( 'Trusted renovation specialists across', 'sail-renovate' ); ?> <em><?php esc_html_e( 'Bristol & the South West', 'sail-renovate' ); ?></em>.</h1>
    <p class="hero__sub"><?php esc_html_e( 'We are a surveyor-led renovation and reinstatement company, dedicated to bringing professionalism, transparency, and exceptional craftsmanship to every project.', 'sail-renovate' ); ?></p>
    <div style="margin-top: 2rem;">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--primary"><?php esc_html_e( 'Get a Free Quote', 'sail-renovate' ); ?></a>
    </div>
    <div class="about-hero-stats">
      <div>
        <div class="stat__num"><?php echo esc_html( get_theme_mod( 'sail_about_stat1_num', '10+' ) ); ?></div>
        <div class="stat__label"><?php echo esc_html( get_theme_mod( 'sail_about_stat1_label', 'Years Experience' ) ); ?></div>
      </div>
      <div>
        <div class="stat__num"><?php echo esc_html( get_theme_mod( 'sail_about_stat2_num', '500+' ) ); ?></div>
        <div class="stat__label"><?php echo esc_html( get_theme_mod( 'sail_about_stat2_label', 'Projects Completed' ) ); ?></div>
      </div>
      <div>
        <div class="stat__num" style="color: var(--accent);">&#10003;</div>
        <div class="stat__label"><?php echo esc_html( get_theme_mod( 'sail_about_stat3_label', 'Insurance Approved' ) ); ?></div>
      </div>
    </div>
  </section>

  <!-- ── Our Story ── -->
  <section class="page-section">
    <div class="grid-2 fade-in">
      <div class="content-block">
        <span class="section-eyebrow"><?php esc_html_e( 'Our Story', 'sail-renovate' ); ?></span>
        <h2 class="section-title"><?php esc_html_e( 'Built on a foundation of', 'sail-renovate' ); ?> <em><?php esc_html_e( 'trust and expertise.', 'sail-renovate' ); ?></em></h2>
        <?php
        $story = get_the_content();
        if ( $story ) {
          the_content();
        } else {
          // Default content shown until edited in the WP editor
          ?>
          <p><?php esc_html_e( 'Sail Renovate was founded in 2023 by Shane, Jamie, and Gemma — with a clear mission: to elevate the standard of property renovations and insurance reinstatements in Bristol and the surrounding areas.', 'sail-renovate' ); ?></p>
          <p><?php esc_html_e( 'Between them, Shane, Jamie, and Gemma bring over a decade of hands-on experience across construction, surveying, and insurance. They recognised that homeowners needed more than just skilled tradespeople — they needed reliable project management, clear communication, and the reassurance of qualified oversight on every job.', 'sail-renovate' ); ?></p>
          <p><?php esc_html_e( 'Today, Sail Renovate handles everything from insurance reinstatements to full home transformations, all managed by a dedicated team who treats every property as if it were their own.', 'sail-renovate' ); ?></p>
          <?php
        }
        ?>
      </div>
      <div class="about-image">
        <img src="<?php echo $img; ?>2-rear.jpg" alt="<?php esc_attr_e( 'Sail Renovate team working on site', 'sail-renovate' ); ?>" />
      </div>
    </div>
  </section>

  <!-- ── Core Values ── -->
  <section class="page-section--alt">
    <div class="inner">
      <span class="section-eyebrow"><?php esc_html_e( 'The Sail Difference', 'sail-renovate' ); ?></span>
      <h2 class="section-title"><?php esc_html_e( 'Our core', 'sail-renovate' ); ?> <em><?php esc_html_e( 'values', 'sail-renovate' ); ?></em>.</h2>

      <div class="values-grid">
        <div class="value-card fade-in">
          <div class="value-card__icon-wrap" aria-hidden="true">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2L20 6v6c0 5-3.5 9.74-8 11C7.5 21.74 4 17 4 12V6l8-4z"/>
              <path d="M9 12l2 2 4-4"/>
            </svg>
          </div>
          <h3><?php echo esc_html( sail_field( 'value_1_title', __( 'Surveyor-Led Delivery', 'sail-renovate' ) ) ); ?></h3>
          <p><?php echo esc_html( sail_field( 'value_1_body', __( 'Every project is assessed, scoped, and overseen by a qualified surveyor. This ensures accuracy in our quoting and adherence to the highest building standards throughout the build.', 'sail-renovate' ) ) ); ?></p>
        </div>
        <div class="value-card fade-in fade-in-delay-1">
          <div class="value-card__icon-wrap" aria-hidden="true">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            </svg>
          </div>
          <h3><?php echo esc_html( sail_field( 'value_2_title', __( 'Transparent Communication', 'sail-renovate' ) ) ); ?></h3>
          <p><?php echo esc_html( sail_field( 'value_2_body', __( "We believe in keeping you informed. You'll have a dedicated point of contact providing regular updates, so you always know exactly what is happening with your property.", 'sail-renovate' ) ) ); ?></p>
        </div>
        <div class="value-card fade-in fade-in-delay-2">
          <div class="value-card__icon-wrap" aria-hidden="true">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <circle cx="12" cy="8" r="6"/>
              <path d="M8 14v7M12 14v7M16 14v7"/>
              <path d="M6 21h12"/>
            </svg>
          </div>
          <h3><?php echo esc_html( sail_field( 'value_3_title', __( 'Exceptional Craftsmanship', 'sail-renovate' ) ) ); ?></h3>
          <p><?php echo esc_html( sail_field( 'value_3_body', __( 'We never compromise on quality. Our network of vetted, certified tradespeople take immense pride in their work, resulting in finishes that stand the test of time.', 'sail-renovate' ) ) ); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Testimonial ── -->
  <section class="about-testimonial">
    <div class="about-testimonial__stars" aria-label="<?php esc_attr_e( '5 stars', 'sail-renovate' ); ?>">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
    <blockquote>
      &#8220;<?php echo esc_html( sail_field( 'testimonial_quote', __( "We've worked together for nearly 10 years on a wide range of insurance reinstatement projects, and the service has always been reliable, professional, and completed to a high standard. Communication is excellent, works are handled efficiently, and we know our clients are in safe hands throughout the process. We would have no hesitation in recommending their services.", 'sail-renovate' ) ) ); ?>&#8221;
    </blockquote>
    <p class="about-testimonial__attr"><?php echo esc_html( sail_field( 'testimonial_attr', 'Steve &mdash; Ellipta' ) ); ?></p>
  </section>

  <!-- ── Team ── -->
  <section class="page-section">
    <span class="section-eyebrow"><?php esc_html_e( 'The Team', 'sail-renovate' ); ?></span>
    <h2 class="section-title"><?php esc_html_e( 'The people behind', 'sail-renovate' ); ?> <em><?php esc_html_e( 'the projects.', 'sail-renovate' ); ?></em></h2>

    <div class="team-grid">
      <?php
      $team_q = new WP_Query( [
        'post_type'      => 'team_member',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ] );
      $team_delays = [ '', ' fade-in-delay-1', ' fade-in-delay-2' ];
      $ti = 0;
      if ( $team_q->have_posts() ) :
        while ( $team_q->have_posts() ) : $team_q->the_post();
          $t_thumb = get_the_post_thumbnail_url( null, 'medium' );
          $t_delay = $team_delays[ $ti % 3 ];
      ?>
      <div class="team-card fade-in<?php echo esc_attr( $t_delay ); ?>">
        <div class="team-card__photo">
          <?php if ( $t_thumb ) : ?>
          <img src="<?php echo esc_url( $t_thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
          <?php else : ?>
          <div class="team-card__photo-placeholder">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
            <span><?php esc_html_e( 'Photo coming soon', 'sail-renovate' ); ?></span>
          </div>
          <?php endif; ?>
        </div>
        <div class="team-card__body">
          <p class="team-card__name"><?php echo esc_html( get_the_title() ); ?></p>
          <?php if ( get_the_excerpt() ) : ?>
          <p class="team-card__role"><?php echo esc_html( get_the_excerpt() ); ?></p>
          <?php endif; ?>
          <div class="team-card__bio"><?php the_content(); ?></div>
        </div>
      </div>
      <?php
          $ti++;
        endwhile;
        wp_reset_postdata();
      else :
        // Placeholder cards shown until team members are added via WP admin
        $team = [
          [ 'Gemma', '[ Role ]', '[ Background sentence to be provided by Gemma. ]', '[ What she brings to clients — to be provided by Gemma. ]' ],
          [ 'Shane',  '[ Role ]', '[ Background sentence to be provided by Shane. ]',  '[ What he brings to clients — to be provided by Shane. ]'  ],
          [ 'Jamie',  '[ Role ]', '[ Background sentence to be provided by Jamie. ]',  '[ What he brings to clients — to be provided by Jamie. ]'  ],
        ];
        foreach ( $team as $i => $member ) :
      ?>
      <div class="team-card fade-in<?php echo esc_attr( $team_delays[ $i ] ); ?>">
        <div class="team-card__photo">
          <div class="team-card__photo-placeholder">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
            <span><?php esc_html_e( 'Photo coming soon', 'sail-renovate' ); ?></span>
          </div>
        </div>
        <div class="team-card__body">
          <p class="team-card__name"><?php echo esc_html( $member[0] ); ?></p>
          <p class="team-card__role"><?php echo esc_html( $member[1] ); ?></p>
          <div class="team-card__bio">
            <p><?php echo esc_html( $member[2] ); ?></p>
            <p><?php echo esc_html( $member[3] ); ?></p>
          </div>
        </div>
      </div>
      <?php
        endforeach;
      endif;
      ?>
    </div>

    <p class="team-placeholder-note"><?php esc_html_e( 'Add team members via WordPress Admin → Team. Use the title for the name, excerpt for job role, and content for the bio. Upload a featured image for the photo.', 'sail-renovate' ); ?></p>

    <!-- ── Tradespeople ── -->
    <div style="margin-top: 4rem; padding-top: 3.5rem; border-top: 1px solid var(--border);">
      <span class="section-eyebrow"><?php esc_html_e( 'Our Tradespeople', 'sail-renovate' ); ?></span>
      <h2 class="section-title" style="font-size: clamp(1.6rem, 3vw, 2.2rem);"><?php esc_html_e( 'The skilled hands', 'sail-renovate' ); ?> <em><?php esc_html_e( 'behind every finish.', 'sail-renovate' ); ?></em></h2>
      <div class="grid-2 fade-in" style="align-items: flex-start; margin-top: 2.5rem; gap: 4rem;">
        <div class="content-block">
          <p><?php esc_html_e( 'Our tradespeople are central to every project we deliver. Over the years, we\'ve built relationships with a core group of skilled craftsmen who genuinely share our standards — and many of them have been working alongside us from the very beginning.', 'sail-renovate' ); ?></p>
          <p><?php esc_html_e( 'Whether it\'s plastering, joinery, tiling, or decoration, you\'ll often see the same familiar faces across our projects. That consistency is something we\'re proud of: it means tradespeople who know exactly how we work, communicate without needing to be chased, and take real pride in the quality of finish they leave behind.', 'sail-renovate' ); ?></p>
          <p><?php esc_html_e( 'We\'ll be introducing them properly soon — with photos and a little background on each person, so you know exactly who to expect before work begins on your property.', 'sail-renovate' ); ?></p>
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
          <?php for ( $i = 0; $i < 3; $i++ ) : ?>
          <div style="aspect-ratio: 3/4; background: var(--cream); border: 1px solid var(--border); border-radius: 2px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 0.6rem; color: var(--text-muted);">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
            <span style="font-size: 0.68rem; font-weight: 500; letter-spacing: 0.06em; text-transform: uppercase;"><?php esc_html_e( 'Photo coming soon', 'sail-renovate' ); ?></span>
          </div>
          <?php endfor; ?>
          <div style="aspect-ratio: 3/4; background: var(--bg-warm); border: 1px solid var(--border); border-radius: 2px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 0.6rem; color: var(--text-muted); padding: 1rem; text-align: center;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><rect x="1" y="10" width="22" height="11" rx="2"/><path d="M1 13h22M7 10V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v4"/><circle cx="7" cy="21" r="1" fill="currentColor" stroke="none"/><circle cx="17" cy="21" r="1" fill="currentColor" stroke="none"/></svg>
            <span style="font-size: 0.68rem; font-weight: 500; letter-spacing: 0.06em; text-transform: uppercase;"><?php esc_html_e( 'Van shot coming soon', 'sail-renovate' ); ?></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Trust Banner ── -->
  <section class="page-section--alt">
    <div class="grid-2 fade-in" style="align-items: center;">
      <div class="about-image" style="order: -1;">
        <img src="<?php echo $img; ?>19-kitchen.jpg" alt="<?php esc_attr_e( 'Finished high quality renovation', 'sail-renovate' ); ?>" />
      </div>
      <div class="content-block">
        <h2 class="section-title"><?php esc_html_e( 'Trusted by homeowners and', 'sail-renovate' ); ?> <em><?php esc_html_e( 'insurers alike.', 'sail-renovate' ); ?></em></h2>
        <p><?php esc_html_e( 'Our rigorous standards have earned us the trust of major insurance providers to handle complex reinstatement works. We bring that exact same level of scrutiny, project management, and attention to detail to our private home renovations.', 'sail-renovate' ); ?></p>
        <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--primary"><?php esc_html_e( 'Get a Free Quote', 'sail-renovate' ); ?></a>
          <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="btn btn--navy"><?php esc_html_e( 'View Our Work', 'sail-renovate' ); ?></a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
