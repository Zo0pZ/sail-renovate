<?php
/**
 * Template for the Contact page (slug: contact).
 *
 * @package sail-renovate
 */
get_header();
$phone     = sail_contact( 'phone' );
$phone_tel = 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
?>
<main class="contact-page">
  <!-- ── Left: Info ── -->
  <div class="contact__info-side fade-in">
    <span class="section-eyebrow"><?php echo esc_html( sail_field( 'contact_hero_eyebrow', __( 'Get In Touch', 'sail-renovate' ) ) ); ?></span>
    <h1 class="hero__heading">
      <?php echo esc_html( sail_field( 'contact_hero_heading', __( "Let's discuss your", 'sail-renovate' ) ) ); ?><br>
      <?php $ct_acc = sail_field( 'contact_hero_heading_accent', __( 'next project.', 'sail-renovate' ) ); if ( $ct_acc ) : ?><em><?php echo esc_html( $ct_acc ); ?></em><?php endif; ?>
    </h1>
    <p class="hero__sub"><?php echo esc_html( sail_field( 'contact_hero_intro', __( 'Whether you require an urgent insurance repair or are planning a comprehensive home renovation, our team is ready to assist. Contact us today to arrange a free, no-obligation surveyor visit.', 'sail-renovate' ) ) ); ?></p>

    <div class="contact-details">
      <div class="contact__detail">
        <svg class="contact__detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.12 1.18 2 2 0 012.11 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        <div>
          <p class="contact__detail-label"><?php esc_html_e( 'Phone', 'sail-renovate' ); ?></p>
          <div class="contact__detail-value"><a href="<?php echo esc_url( $phone_tel ); ?>"><?php echo esc_html( $phone ); ?></a></div>
        </div>
      </div>

      <div class="contact__detail">
        <svg class="contact__detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        <div>
          <p class="contact__detail-label"><?php esc_html_e( 'Email', 'sail-renovate' ); ?></p>
          <div class="contact__detail-value"><a href="mailto:<?php echo esc_attr( sail_contact( 'email' ) ); ?>"><?php echo esc_html( sail_contact( 'email' ) ); ?></a></div>
        </div>
      </div>

      <div class="contact__detail">
        <svg class="contact__detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        <div>
          <p class="contact__detail-label"><?php esc_html_e( 'Service Area', 'sail-renovate' ); ?></p>
          <div class="contact__detail-value"><?php echo esc_html( sail_contact( 'location' ) ); ?></div>
        </div>
      </div>

      <div>
        <p class="contact__detail-label"><?php esc_html_e( 'Follow Us', 'sail-renovate' ); ?></p>
        <div class="contact__socials">
          <a href="<?php echo esc_url( sail_contact( 'instagram_url' ) ); ?>" class="social-btn" aria-label="<?php esc_attr_e( 'Instagram', 'sail-renovate' ); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
          <a href="<?php echo esc_url( sail_contact( 'facebook_url' ) ); ?>" class="social-btn" aria-label="<?php esc_attr_e( 'Facebook', 'sail-renovate' ); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Right: Form ── -->
  <div class="contact__form-side fade-in fade-in-delay-1">
    <form action="mailto:<?php echo esc_attr( sail_contact( 'email' ) ); ?>" method="post" enctype="text/plain" novalidate>
      <?php wp_nonce_field( 'sail_contact_form', 'sail_contact_nonce' ); ?>
      <div class="form-row">
        <div class="form-group" style="margin-bottom:0;">
          <label for="fname"><?php esc_html_e( 'First Name', 'sail-renovate' ); ?></label>
          <input type="text" id="fname" name="first_name" placeholder="<?php esc_attr_e( 'e.g. Jane', 'sail-renovate' ); ?>" required />
        </div>
        <div class="form-group" style="margin-bottom:0;">
          <label for="lname"><?php esc_html_e( 'Last Name', 'sail-renovate' ); ?></label>
          <input type="text" id="lname" name="last_name" placeholder="<?php esc_attr_e( 'e.g. Smith', 'sail-renovate' ); ?>" required />
        </div>
      </div>

      <div class="form-group">
        <label for="email"><?php esc_html_e( 'Email Address', 'sail-renovate' ); ?></label>
        <input type="email" id="email" name="email" placeholder="<?php esc_attr_e( 'jane.smith@example.com', 'sail-renovate' ); ?>" required />
      </div>

      <div class="form-group">
        <label for="phone"><?php esc_html_e( 'Phone Number', 'sail-renovate' ); ?></label>
        <input type="tel" id="phone" name="phone" placeholder="<?php esc_attr_e( '07700 900000', 'sail-renovate' ); ?>" />
      </div>

      <div class="form-group">
        <label for="service"><?php esc_html_e( 'Project Type', 'sail-renovate' ); ?></label>
        <select id="service" name="service">
          <option value=""><?php esc_html_e( 'Please select...', 'sail-renovate' ); ?></option>
          <option value="repairs"><?php esc_html_e( 'Insurance Reinstatement / Repairs', 'sail-renovate' ); ?></option>
          <option value="renovations"><?php esc_html_e( 'Property Refurbishment', 'sail-renovate' ); ?></option>
          <option value="eco"><?php esc_html_e( 'Eco & Smart Home Upgrades', 'sail-renovate' ); ?></option>
          <option value="maintenance"><?php esc_html_e( 'Property Maintenance', 'sail-renovate' ); ?></option>
          <option value="other"><?php esc_html_e( 'Other Enquiry', 'sail-renovate' ); ?></option>
        </select>
      </div>

      <div class="form-group">
        <label for="message"><?php esc_html_e( 'Project Details', 'sail-renovate' ); ?></label>
        <textarea id="message" name="message" placeholder="<?php esc_attr_e( 'Please provide a brief description of your requirements, location, and ideal timeline...', 'sail-renovate' ); ?>"></textarea>
      </div>

      <button type="submit" class="form-submit"><?php esc_html_e( 'Send Enquiry', 'sail-renovate' ); ?></button>
    </form>
  </div>
</main>
<?php get_footer(); ?>
