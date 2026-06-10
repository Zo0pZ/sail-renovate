<?php
/**
 * Template for individual Service custom post type entries.
 * Uses ACF fields in production; falls back to the_content() gracefully.
 *
 * @package sail-renovate
 */
get_header();
?>
<main>
  <?php while ( have_posts() ) : the_post(); ?>

  <section class="internal-hero">
    <?php if ( get_post_meta( get_the_ID(), 'service_eyebrow', true ) ) : ?>
    <span class="section-eyebrow"><?php echo esc_html( get_post_meta( get_the_ID(), 'service_eyebrow', true ) ); ?></span>
    <?php endif; ?>
    <h1 class="hero__heading"><?php the_title(); ?></h1>
    <?php if ( get_the_excerpt() ) : ?>
    <p class="hero__sub"><?php the_excerpt(); ?></p>
    <?php endif; ?>
  </section>

  <section class="page-section">
    <?php the_content(); ?>
  </section>

  <section class="page-section" style="text-align: center;">
    <h3 class="section-title" style="margin-bottom: 1rem;">
      <?php printf(
        /* translators: %s: service title */
        esc_html__( 'Ready to discuss your %s project?', 'sail-renovate' ),
        '<em>' . esc_html( get_the_title() ) . '</em>'
      ); ?>
    </h3>
    <p style="color: var(--text-muted); font-size: 1.1rem; margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
      <?php esc_html_e( 'Get in touch with our team for a free initial assessment and to discuss how we can help.', 'sail-renovate' ); ?>
    </p>
    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
      <a href="tel:01174767858" class="btn btn--primary"><?php esc_html_e( 'Call 0117 476 7858', 'sail-renovate' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--outline"><?php esc_html_e( 'Send Enquiry', 'sail-renovate' ); ?></a>
    </div>
  </section>

  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
