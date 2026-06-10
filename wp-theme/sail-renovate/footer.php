<!-- ── Footer ── -->
<footer>
  <div class="footer__logo">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/Sail_Renovate_Primary_Orange_MAIN-300x229.png"
         alt="<?php esc_attr_e( 'Sail Renovate', 'sail-renovate' ); ?>" />
  </div>

  <ul class="footer__links">
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'sail-renovate' ); ?></a></li>
    <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'sail-renovate' ); ?></a></li>
    <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'sail-renovate' ); ?></a></li>
    <li><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><?php esc_html_e( 'Our Work', 'sail-renovate' ); ?></a></li>
    <li><a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>"><?php esc_html_e( 'Testimonials', 'sail-renovate' ); ?></a></li>
    <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'sail-renovate' ); ?></a></li>
    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'sail-renovate' ); ?></a></li>
  </ul>

  <div class="footer__badges">
    <span class="badge-pill"><?php esc_html_e( 'Qualified Surveyors', 'sail-renovate' ); ?></span>
    <span class="badge-pill"><?php esc_html_e( 'Insurance Approved', 'sail-renovate' ); ?></span>
    <span class="badge-pill"><?php esc_html_e( 'Bristol Based', 'sail-renovate' ); ?></span>
  </div>

  <p class="footer__copy">
    &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php esc_html_e( 'Sail Renovate Ltd. All rights reserved.', 'sail-renovate' ); ?>
  </p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
