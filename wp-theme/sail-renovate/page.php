<?php
/**
 * Generic page template — used for any page without a dedicated template file.
 *
 * @package sail-renovate
 */
get_header();
?>
<main id="main" class="site-main">
  <?php sail_breadcrumbs(); ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <section class="internal-hero">
    <h1 class="hero__heading"><?php echo esc_html( get_the_title() ); ?></h1>
  </section>
  <section class="page-section">
    <div class="legal-content">
      <?php the_content(); ?>
    </div>
  </section>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
