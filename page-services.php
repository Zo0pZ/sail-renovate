<?php
/**
 * Template for the Services listing page (slug: services).
 *
 * @package sail-renovate
 */
get_header();
$img = esc_url( get_template_directory_uri() . '/images/' );
?>
<main>
  <section class="internal-hero">
    <span class="section-eyebrow"><?php esc_html_e( 'Services', 'sail-renovate' ); ?></span>
    <h1 class="hero__heading"><?php esc_html_e( 'One contractor for reinstatement, refurbishment, and', 'sail-renovate' ); ?> <em><?php esc_html_e( 'everything in between.', 'sail-renovate' ); ?></em></h1>
    <p class="hero__sub"><?php esc_html_e( 'From insurance reinstatement projects to planned refurbishment and claims management, Sail Renovate provides end-to-end delivery with qualified oversight and strong communication.', 'sail-renovate' ); ?></p>
    <div class="hero__badges">
      <span class="badge-pill"><?php esc_html_e( 'Qualified Surveyors', 'sail-renovate' ); ?></span>
      <span class="badge-pill"><?php esc_html_e( 'Insurance Approved', 'sail-renovate' ); ?></span>
      <span class="badge-pill"><?php esc_html_e( 'Bristol Based', 'sail-renovate' ); ?></span>
    </div>
  </section>

  <section class="page-section">
    <div class="grid-3">
      <?php
      $services = [
        [ '/services/insurance-reinstatement/', '12-bathroom.jpg', __( 'Insurance reinstatement project', 'sail-renovate' ), __( 'Insurance Reinstatement', 'sail-renovate' ), __( 'Trusted delivery for insurer-led repairs and reinstatement projects across Bristol properties.', 'sail-renovate' ) ],
        [ '/services/property-refurbishment/',  '3-kitchen.jpg',  __( 'Property refurbishment project', 'sail-renovate' ), __( 'Property Refurbishment', 'sail-renovate' ),  __( 'Complete home makeovers from kitchens and bathrooms to full internal transformations.', 'sail-renovate' ) ],
        [ '/services/property-maintenance/',    '14-utility.jpg', __( 'Property maintenance services', 'sail-renovate' ),  __( 'Property Maintenance', 'sail-renovate' ),    __( 'Scheduled repairs and upkeep to protect property condition and avoid costly damage.', 'sail-renovate' ) ],
        [ '/services/project-management/',      '5-living-room.jpg', __( 'Project management for renovations', 'sail-renovate' ), __( 'Project Management', 'sail-renovate' ), __( 'Co-ordinated site delivery, material procurement and contractor scheduling for every project.', 'sail-renovate' ) ],
        [ '/services/claims-management/',       '13-ensuite.jpg', __( 'Claims management services', 'sail-renovate' ),     __( 'Claims Management', 'sail-renovate' ),       __( 'We work with insurers and homeowners to keep claims moving and avoid unnecessary delays.', 'sail-renovate' ) ],
      ];
      $delays = [ '', ' fade-in-delay-1', ' fade-in-delay-2', '', ' fade-in-delay-1' ];
      foreach ( $services as $i => $s ) :
      ?>
      <a href="<?php echo esc_url( home_url( $s[0] ) ); ?>" class="card-img fade-in<?php echo $delays[ $i ]; ?>">
        <img src="<?php echo $img . esc_attr( $s[1] ); ?>" alt="<?php echo esc_attr( $s[2] ); ?>" />
        <div class="card-img__content">
          <h3><?php echo esc_html( $s[3] ); ?></h3>
          <p><?php echo esc_html( $s[4] ); ?></p>
          <span class="card-img__link"><?php esc_html_e( 'Find out more', 'sail-renovate' ); ?> <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
        </div>
      </a>
      <?php endforeach; ?>

      <!-- CTA card -->
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="card-img card-img--cta fade-in fade-in-delay-2">
        <div class="card-img__content">
          <h3><?php esc_html_e( 'Not sure which service you need?', 'sail-renovate' ); ?></h3>
          <p><?php esc_html_e( 'Tell us about your property and we\'ll point you in the right direction — free, no obligation.', 'sail-renovate' ); ?></p>
          <span class="card-img__link"><?php esc_html_e( 'Talk to the Team', 'sail-renovate' ); ?> <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
        </div>
      </a>
    </div>

    <!-- Guidance strip -->
    <div class="guidance-strip">
      <div class="guidance-strip__item">
        <span class="guidance-strip__label"><?php esc_html_e( 'Had an insurance incident?', 'sail-renovate' ); ?></span>
        <p><?php
          printf(
            /* translators: 1: Insurance Reinstatement link, 2: Claims Management link */
            esc_html__( 'Look at %1$s or %2$s — we work directly with your insurer from initial assessment through to completion.', 'sail-renovate' ),
            '<a href="' . esc_url( home_url( '/services/insurance-reinstatement/' ) ) . '">' . esc_html__( 'Insurance Reinstatement', 'sail-renovate' ) . '</a>',
            '<a href="' . esc_url( home_url( '/services/claims-management/' ) ) . '">' . esc_html__( 'Claims Management', 'sail-renovate' ) . '</a>'
          );
        ?></p>
      </div>
      <div class="guidance-strip__item">
        <span class="guidance-strip__label"><?php esc_html_e( 'Planning a renovation?', 'sail-renovate' ); ?></span>
        <p><?php
          printf(
            /* translators: 1: Property Refurbishment link, 2: Project Management link */
            esc_html__( 'Explore %1$s or %2$s — from a single room through to full property transformations.', 'sail-renovate' ),
            '<a href="' . esc_url( home_url( '/services/property-refurbishment/' ) ) . '">' . esc_html__( 'Property Refurbishment', 'sail-renovate' ) . '</a>',
            '<a href="' . esc_url( home_url( '/services/project-management/' ) ) . '">' . esc_html__( 'Project Management', 'sail-renovate' ) . '</a>'
          );
        ?></p>
      </div>
    </div>
  </section>

  <section class="page-section--alt">
    <div class="inner" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
      <span class="section-eyebrow"><?php esc_html_e( 'Ready to get started?', 'sail-renovate' ); ?></span>
      <h2 class="section-title"><?php esc_html_e( 'Not sure what you need? Get in touch and', 'sail-renovate' ); ?> <em><?php esc_html_e( 'we\'ll guide you.', 'sail-renovate' ); ?></em></h2>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--primary" style="margin-top: 1rem;"><?php esc_html_e( 'Talk to the Team', 'sail-renovate' ); ?></a>
    </div>
  </section>
</main>
<?php get_footer(); ?>
