<?php
/**
 * Template for individual Service custom post type entries.
 * Uses ACF fields in production; falls back to the_content() gracefully.
 *
 * @package sail-renovate
 */
get_header();
$phone     = sail_contact( 'phone' );
$phone_tel = 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
?>
<main>
  <?php sail_breadcrumbs(); ?>
  <?php while ( have_posts() ) : the_post(); ?>

  <section class="internal-hero">
    <?php $s_eyebrow = get_field( 'hero_eyebrow' ); if ( $s_eyebrow ) : ?>
    <span class="section-eyebrow"><?php echo esc_html( $s_eyebrow ); ?></span>
    <?php endif; ?>
    <h1 class="hero__heading">
      <?php
      $s_heading = get_field( 'hero_heading' );
      echo $s_heading
        ? wp_kses( $s_heading, [ 'em' => [] ] )
        : esc_html( get_the_title() );
      ?>
    </h1>
    <?php if ( has_excerpt() ) : ?>
    <p class="hero__sub"><?php echo esc_html( get_the_excerpt() ); ?></p>
    <?php endif; ?>
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="hero__image"><?php the_post_thumbnail( 'large', [ 'alt' => get_the_title() ] ); ?></div>
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
      <a href="<?php echo esc_url( $phone_tel ); ?>" class="btn btn--primary">
        <?php
        /* translators: %s: phone number */
        printf( esc_html__( 'Call %s', 'sail-renovate' ), esc_html( $phone ) );
        ?>
      </a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--outline"><?php esc_html_e( 'Send Enquiry', 'sail-renovate' ); ?></a>
    </div>
  </section>

  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
