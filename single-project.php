<?php
/**
 * Template for individual Project custom post type entries.
 * Uses ACF gallery field in production; falls back to the_content() gracefully.
 *
 * @package sail-renovate
 */
get_header();
$img = esc_url( get_template_directory_uri() . '/images/' );
?>
<main>
  <?php while ( have_posts() ) : the_post(); ?>

  <section class="internal-hero">
    <?php if ( get_post_meta( get_the_ID(), 'project_type', true ) ) : ?>
    <span class="section-eyebrow"><?php echo esc_html( get_post_meta( get_the_ID(), 'project_type', true ) ); ?></span>
    <?php endif; ?>
    <h1 class="hero__heading"><?php the_title(); ?></h1>
    <?php if ( get_the_excerpt() ) : ?>
    <p class="hero__sub"><?php the_excerpt(); ?></p>
    <?php endif; ?>
  </section>

  <?php if ( has_post_thumbnail() ) : ?>
  <div style="width: 100%; max-height: 600px; overflow: hidden;">
    <?php the_post_thumbnail( 'full', [ 'style' => 'width:100%; height:600px; object-fit:cover; display:block;' ] ); ?>
  </div>
  <?php endif; ?>

  <section class="page-section">
    <div class="grid-2" style="align-items: flex-start;">
      <div class="content-block">
        <?php the_content(); ?>
      </div>

      <div>
        <?php
        /* Project meta sidebar — populated by ACF in production */
        $meta = [
          __( 'Project Type', 'sail-renovate' ) => get_post_meta( get_the_ID(), 'project_type', true ),
          __( 'Location',     'sail-renovate' ) => get_post_meta( get_the_ID(), 'project_location', true ),
          __( 'Completed',    'sail-renovate' ) => get_post_meta( get_the_ID(), 'project_date', true ),
        ];
        $has_meta = array_filter( $meta );
        if ( $has_meta ) :
        ?>
        <div class="card" style="margin-bottom: 2rem;">
          <?php foreach ( $has_meta as $label => $value ) : ?>
          <div style="padding: 0.75rem 0; border-bottom: 1px solid var(--border);">
            <p style="font-size:0.72rem; font-weight:500; letter-spacing:0.08em; text-transform:uppercase; color:var(--accent); margin-bottom:0.25rem;"><?php echo esc_html( $label ); ?></p>
            <p style="font-family:var(--serif); font-size:1.1rem; color:var(--navy); margin:0;"><?php echo esc_html( $value ); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--primary" style="width:100%; justify-content:center;"><?php esc_html_e( 'Start a Similar Project', 'sail-renovate' ); ?></a>
      </div>
    </div>
  </section>

  <!-- Back to all projects -->
  <div style="padding: 2rem 3rem; border-top: 1px solid var(--border);">
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" style="display:inline-flex; align-items:center; gap:0.5rem; font-size:0.8rem; font-weight:500; letter-spacing:0.06em; text-transform:uppercase; color:var(--text-muted);">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
      <?php esc_html_e( 'Back to Our Work', 'sail-renovate' ); ?>
    </a>
  </div>

  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
