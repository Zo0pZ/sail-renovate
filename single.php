<?php
/**
 * Single blog post template.
 *
 * @package sail-renovate
 */
get_header();
?>
<main id="main" class="site-main">
  <?php while ( have_posts() ) : the_post(); ?>
  <section class="internal-hero">
    <span class="section-eyebrow"><?php the_category( ', ' ); ?></span>
    <h1 class="hero__heading"><?php the_title(); ?></h1>
    <p class="hero__sub"><?php esc_html_e( 'Posted on', 'sail-renovate' ); ?> <?php the_date(); ?></p>
  </section>

  <section class="page-section">
    <div style="max-width: 800px; margin: 0 auto;">
      <?php if ( has_post_thumbnail() ) : ?>
      <figure style="margin-bottom: 3rem;">
        <?php the_post_thumbnail( 'large', [ 'style' => 'width:100%; border-radius:2px;' ] ); ?>
      </figure>
      <?php endif; ?>
      <div class="legal-content">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
