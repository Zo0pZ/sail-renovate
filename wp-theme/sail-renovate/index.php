<?php
/**
 * Required WordPress fallback template.
 * Routes to front-page.php when a static front page is set (recommended),
 * or renders a basic post loop otherwise.
 *
 * @package sail-renovate
 */

get_header();
?>
<main id="main" class="site-main">
	<section class="internal-hero">
		<h1 class="hero__heading"><?php bloginfo( 'name' ); ?></h1>
		<p class="hero__sub"><?php bloginfo( 'description' ); ?></p>
	</section>

	<section class="page-section">
		<?php if ( have_posts() ) : ?>
			<div class="grid-3">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="card">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No posts found.', 'sail-renovate' ); ?></p>
		<?php endif; ?>
	</section>
</main>
<?php get_footer(); ?>
