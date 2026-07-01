<?php
/**
 * Template Name: Testimonials
 * Template for the Testimonials page (slug: testimonials).
 *
 * WordPress auto-applies this via the slug ("testimonials"). The Template Name
 * header is kept as a fallback so the page can also be assigned manually via
 * Page Attributes → Template.
 *
 * IMPORTANT: if the page body (Gutenberg editor) still contains hardcoded
 * testimonial content, clear it in the WP editor to prevent duplicate output.
 * The authoritative testimonials come from the Testimonial CPT loop below.
 *
 * @package sail-renovate
 */
get_header();
if ( have_posts() ) the_post();
?>
<main>

	<!-- ── Internal Hero ── -->
	<section class="internal-hero">
		<span class="section-eyebrow"><?php echo esc_html( sail_field( 'testimonials_hero_eyebrow', __( 'Client Reviews', 'sail-renovate' ) ) ); ?></span>
		<h1 class="hero__heading"><?php echo esc_html( sail_field( 'testimonials_hero_heading', __( 'What our clients say about us.', 'sail-renovate' ) ) ); ?></h1>
		<p class="hero__sub"><?php echo esc_html( sail_field( 'testimonials_hero_intro', __( 'Real feedback from homeowners and insurers across Bristol and the South West.', 'sail-renovate' ) ) ); ?></p>
	</section>

	<!-- ── Testimonial grid (from Testimonial CPT) ── -->
	<!-- title = client name, content = quote body -->
	<section class="page-section testimonials-grid">
		<?php
		$testi_q = new WP_Query( [
			'post_type'      => 'testimonial',
			'posts_per_page' => -1,
			'orderby'        => 'menu_order date',
			'order'          => 'ASC',
		] );
		if ( $testi_q->have_posts() ) :
			while ( $testi_q->have_posts() ) : $testi_q->the_post();
				// Optional CPT ACF fields — gracefully absent until testimonial_rating /
				// testimonial_role are populated via the Testimonial ACF group.
				$t_rating = get_field( 'testimonial_rating' );
				$t_role   = get_field( 'testimonial_role' );
				$t_stars  = ( $t_rating && is_numeric( $t_rating ) ) ? (int) $t_rating : 5;
		?>
			<article class="testimonial-card fade-in">
				<div class="testimonial-card__stars" aria-label="<?php echo esc_attr( $t_stars ); ?> <?php esc_attr_e( 'out of 5 stars', 'sail-renovate' ); ?>">
					<?php echo str_repeat( '&#9733;', $t_stars ); ?>
				</div>
				<blockquote class="testimonial-card__quote">
					<?php the_content(); ?>
				</blockquote>
				<p class="testimonial-card__author"><?php echo esc_html( get_the_title() ); ?></p>
				<?php if ( $t_role ) : ?>
				<p class="testimonial-card__role"><?php echo esc_html( $t_role ); ?></p>
				<?php endif; ?>
			</article>
		<?php
			endwhile;
			wp_reset_postdata();
		else :
		?>
			<p class="testimonials-grid__empty"><?php esc_html_e( 'Client testimonials coming soon.', 'sail-renovate' ); ?></p>
		<?php endif; ?>
	</section>

	<!-- ── Final CTA (only rendered when heading field is populated) ── -->
	<?php $cta_h = sail_field( 'testimonials_cta_heading' ); if ( $cta_h ) : ?>
	<section class="page-section--alt page-cta">
		<div class="inner" style="text-align: center;">
			<?php $cta_ey = sail_field( 'testimonials_cta_eyebrow' ); if ( $cta_ey ) : ?>
			<span class="section-eyebrow"><?php echo esc_html( $cta_ey ); ?></span>
			<?php endif; ?>
			<h2 class="section-title"><?php echo esc_html( $cta_h ); ?></h2>
			<?php $cta_t = sail_field( 'testimonials_cta_text' ); if ( $cta_t ) : ?>
			<p class="page-cta__text"><?php echo esc_html( $cta_t ); ?></p>
			<?php endif; ?>
			<?php $btn_l = sail_field( 'testimonials_cta_button_label' ); if ( $btn_l ) : ?>
			<a class="btn btn--primary" href="<?php echo esc_url( sail_field( 'testimonials_cta_button_url', home_url( '/contact/' ) ) ); ?>">
				<?php echo esc_html( $btn_l ); ?>
			</a>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
