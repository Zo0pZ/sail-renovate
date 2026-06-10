<?php
/**
 * Template for the Projects / Our Work page (slug: projects).
 *
 * @package sail-renovate
 */
get_header();
$img = esc_url( get_template_directory_uri() . '/images/' );
?>
<main>
  <section class="internal-hero">
    <span class="section-eyebrow"><?php esc_html_e( 'Our Work', 'sail-renovate' ); ?></span>
    <h1 class="hero__heading"><?php esc_html_e( 'From first call to final sign-off —', 'sail-renovate' ); ?> <em><?php esc_html_e( 'here\'s the evidence.', 'sail-renovate' ); ?></em></h1>
    <p class="hero__sub"><?php esc_html_e( 'Explore our recent projects across Bristol and the South West, from insurance reinstatements and home repairs to full property renovations.', 'sail-renovate' ); ?></p>
    <div class="hero__badges">
      <span class="badge-pill"><?php esc_html_e( 'Qualified Surveyors', 'sail-renovate' ); ?></span>
      <span class="badge-pill"><?php esc_html_e( 'Insurance Approved', 'sail-renovate' ); ?></span>
      <span class="badge-pill"><?php esc_html_e( 'Bristol Based', 'sail-renovate' ); ?></span>
    </div>
  </section>

  <section class="page-section" style="padding-top: 0;">
    <div class="filter-bar" role="group" aria-label="<?php esc_attr_e( 'Filter projects by category', 'sail-renovate' ); ?>">
      <button class="filter-btn active" data-filter="all"><?php esc_html_e( 'All', 'sail-renovate' ); ?></button>
      <button class="filter-btn" data-filter="insurance"><?php esc_html_e( 'Insurance', 'sail-renovate' ); ?></button>
      <button class="filter-btn" data-filter="refurbishment"><?php esc_html_e( 'Refurbishment', 'sail-renovate' ); ?></button>
      <button class="filter-btn" data-filter="eco"><?php esc_html_e( 'Eco', 'sail-renovate' ); ?></button>
    </div>

    <div class="project-grid" id="projectGrid">
      <?php
      $projects = [
        [ '/projects/period-property-transformation/', '1-front.jpg',   __( 'Full renovation in Clifton', 'sail-renovate' ),             'refurbishment', __( 'Full Renovation · Clifton', 'sail-renovate' ),                __( 'Period Property Transformation', 'sail-renovate' ),  __( 'A complete internal strip-out and refurbishment of a Victorian townhouse, blending modern amenities with restored period features.', 'sail-renovate' ) ],
        [ null,                                        '16-hallway.jpg', __( 'Insurance repair in Horfield', 'sail-renovate' ),            'insurance',     __( 'Insurance Repair · Horfield', 'sail-renovate' ),              __( 'Fire Damage Restoration', 'sail-renovate' ),         __( 'Working directly with the insurer to fully reinstate a fire-damaged ground floor, managing the claim through to final sign-off.', 'sail-renovate' ) ],
        [ null,                                        '11-bathroom.jpg',__( 'Property refurbishment in Redland', 'sail-renovate' ),       'refurbishment', __( 'Property Refurbishment · Redland', 'sail-renovate' ),        __( 'Luxury Bathroom Suite', 'sail-renovate' ),           __( 'Complete redesign and installation of a high-end family bathroom featuring custom tiling, underfloor heating, and premium fixtures.', 'sail-renovate' ) ],
        [ null,                                        '4-diner.jpg',    __( 'Kitchen-diner extension in Westbury Park', 'sail-renovate' ),'refurbishment', __( 'Extension & Kitchen · Westbury Park', 'sail-renovate' ),   __( 'Kitchen-Diner Extension', 'sail-renovate' ),         __( 'Project management and delivery of a rear extension to create a light-filled, open-plan kitchen and dining area.', 'sail-renovate' ) ],
        [ null,                                        '15-garden.jpg',  __( 'Eco upgrade in Bishopston', 'sail-renovate' ),               'eco',           __( 'Eco Upgrade · Bishopston', 'sail-renovate' ),                __( 'Solar & Smart Heating', 'sail-renovate' ),           __( 'Installation of a full solar PV array with battery storage, integrated with a new smart heating system for maximum efficiency.', 'sail-renovate' ) ],
        [ null,                                        '2-rear.jpg',     __( 'Water damage reinstatement', 'sail-renovate' ),              'insurance',     __( 'Insurance Reinstatement · Southville', 'sail-renovate' ),   __( 'Water Damage Reinstatement', 'sail-renovate' ),      __( 'Rapid response drying and complete reinstatement of flooring and joinery following extensive escape of water.', 'sail-renovate' ) ],
      ];
      $delays = [ '', ' fade-in-delay-1', ' fade-in-delay-2', '', ' fade-in-delay-1', ' fade-in-delay-2' ];
      foreach ( $projects as $i => $p ) :
        $tag = 'div';
        $href_attr = '';
        if ( $p[0] ) {
          $tag = 'a';
          $href_attr = ' href="' . esc_url( home_url( $p[0] ) ) . '"';
        }
      ?>
      <<?php echo $tag . $href_attr; ?> class="project-card fade-in<?php echo $delays[ $i ]; ?>" data-category="<?php echo esc_attr( $p[3] ); ?>">
        <div class="project-card__image">
          <img src="<?php echo $img . esc_attr( $p[1] ); ?>" alt="<?php echo esc_attr( $p[2] ); ?>" />
        </div>
        <div class="project-card__content">
          <span class="project-card__type"><?php echo esc_html( $p[4] ); ?></span>
          <h3 class="project-card__title"><?php echo esc_html( $p[5] ); ?></h3>
          <p class="project-card__description"><?php echo esc_html( $p[6] ); ?></p>
          <?php if ( $p[0] ) : ?>
          <span class="project-card__link">
            <?php esc_html_e( 'View Project', 'sail-renovate' ); ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </span>
          <?php endif; ?>
        </div>
      </<?php echo $tag; ?>>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="page-section--alt">
    <div class="inner" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
      <span class="section-eyebrow"><?php esc_html_e( 'Ready to get started?', 'sail-renovate' ); ?></span>
      <h2 class="section-title"><?php esc_html_e( 'Seen enough?', 'sail-renovate' ); ?> <em><?php esc_html_e( 'Let\'s talk about your project.', 'sail-renovate' ); ?></em></h2>
      <p style="color: var(--text-muted); font-size: 1.05rem; max-width: 520px; margin: 1rem auto 0;"><?php esc_html_e( 'Free quote, no obligation. We cover Bristol and the surrounding area.', 'sail-renovate' ); ?></p>
      <div style="display: flex; gap: 1rem; margin-top: 2rem; flex-wrap: wrap; justify-content: center;">
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--primary"><?php esc_html_e( 'Get a Free Quote', 'sail-renovate' ); ?></a>
        <a href="tel:01174767858" class="btn btn--navy"><?php esc_html_e( 'Call 0117 476 7858', 'sail-renovate' ); ?></a>
      </div>
    </div>
  </section>
</main>

<script>
const filterBtns  = document.querySelectorAll('.filter-btn');
const projectCards = document.querySelectorAll('#projectGrid .project-card');
filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    filterBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const filter = btn.dataset.filter;
    projectCards.forEach(card => {
      card[filter === 'all' || card.dataset.category === filter ? 'removeAttribute' : 'setAttribute']('hidden', '');
    });
  });
});
</script>
<?php get_footer(); ?>
