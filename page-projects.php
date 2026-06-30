<?php
/**
 * Template for the Projects / Our Work page (slug: projects).
 *
 * @package sail-renovate
 */
get_header();
$img       = esc_url( get_template_directory_uri() . '/images/' );
$phone     = sail_contact( 'phone' );
$phone_tel = 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
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
      <?php
      $proj_terms = get_terms( [ 'taxonomy' => 'project_cat', 'hide_empty' => false ] );
      if ( ! is_wp_error( $proj_terms ) ) :
        foreach ( $proj_terms as $term ) :
      ?>
      <button class="filter-btn" data-filter="<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></button>
      <?php
        endforeach;
      endif;
      ?>
    </div>

    <div class="project-grid" id="projectGrid">
      <?php
      $proj_query = new WP_Query( [
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ] );
      $proj_delays = [ '', ' fade-in-delay-1', ' fade-in-delay-2', '', ' fade-in-delay-1', ' fade-in-delay-2' ];
      $pi = 0;
      while ( $proj_query->have_posts() ) : $proj_query->the_post();
        $p_type    = get_post_meta( get_the_ID(), 'project_type', true );
        $p_loc     = get_post_meta( get_the_ID(), 'project_location', true );
        $p_terms   = get_the_terms( get_the_ID(), 'project_cat' );
        $cat_slug  = ( $p_terms && ! is_wp_error( $p_terms ) ) ? $p_terms[0]->slug : '';
        $disp_type = trim( implode( ' &middot; ', array_filter( [ $p_type, $p_loc ] ) ) );
        $delay     = $proj_delays[ $pi % count( $proj_delays ) ];
      ?>
      <a href="<?php the_permalink(); ?>" class="project-card fade-in<?php echo esc_attr( $delay ); ?>" data-category="<?php echo esc_attr( $cat_slug ); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="project-card__image">
          <?php the_post_thumbnail( 'medium_large', [ 'alt' => get_the_title() ] ); ?>
        </div>
        <?php endif; ?>
        <div class="project-card__content">
          <?php if ( $disp_type ) : ?>
          <span class="project-card__type"><?php echo wp_kses_post( $disp_type ); ?></span>
          <?php endif; ?>
          <h3 class="project-card__title"><?php echo esc_html( get_the_title() ); ?></h3>
          <?php if ( get_the_excerpt() ) : ?>
          <p class="project-card__description"><?php echo esc_html( get_the_excerpt() ); ?></p>
          <?php endif; ?>
          <span class="project-card__link">
            <?php esc_html_e( 'View Project', 'sail-renovate' ); ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </span>
        </div>
      </a>
      <?php
        $pi++;
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </section>

  <section class="page-section--alt">
    <div class="inner" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
      <span class="section-eyebrow"><?php esc_html_e( 'Ready to get started?', 'sail-renovate' ); ?></span>
      <h2 class="section-title"><?php esc_html_e( 'Seen enough?', 'sail-renovate' ); ?> <em><?php esc_html_e( 'Let\'s talk about your project.', 'sail-renovate' ); ?></em></h2>
      <p style="color: var(--text-muted); font-size: 1.05rem; max-width: 520px; margin: 1rem auto 0;"><?php esc_html_e( 'Free quote, no obligation. We cover Bristol and the surrounding area.', 'sail-renovate' ); ?></p>
      <div style="display: flex; gap: 1rem; margin-top: 2rem; flex-wrap: wrap; justify-content: center;">
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--primary"><?php esc_html_e( 'Get a Free Quote', 'sail-renovate' ); ?></a>
        <a href="<?php echo esc_url( $phone_tel ); ?>" class="btn btn--navy">
          <?php
          /* translators: %s: phone number */
          printf( esc_html__( 'Call %s', 'sail-renovate' ), esc_html( $phone ) );
          ?>
        </a>
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
