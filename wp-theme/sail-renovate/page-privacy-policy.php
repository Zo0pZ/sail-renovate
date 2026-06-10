<?php
/**
 * Template for the Privacy Policy page (slug: privacy-policy).
 *
 * @package sail-renovate
 */
get_header();
?>
<main>
  <section class="internal-hero" style="max-width: 900px; text-align: center;">
    <span class="section-eyebrow"><?php esc_html_e( 'Legal Information', 'sail-renovate' ); ?></span>
    <h1 class="hero__heading"><?php esc_html_e( 'Privacy Policy', 'sail-renovate' ); ?></h1>
  </section>

  <div class="legal-content fade-in">
    <p><em><?php esc_html_e( 'Last updated: April 2026', 'sail-renovate' ); ?></em></p>

    <p><?php esc_html_e( 'Sail Renovate Ltd ("we", "our", or "us") is committed to protecting and respecting your privacy. This policy outlines how we collect, use, and process your personal data in accordance with the UK General Data Protection Regulation (UK GDPR) and the Data Protection Act 2018.', 'sail-renovate' ); ?></p>

    <h2><?php esc_html_e( '1. Information We Collect', 'sail-renovate' ); ?></h2>
    <p><?php esc_html_e( 'We may collect and process the following data about you:', 'sail-renovate' ); ?></p>
    <ul>
      <li><strong><?php esc_html_e( 'Identity and Contact Data:', 'sail-renovate' ); ?></strong> <?php esc_html_e( 'Name, address, email address, and telephone numbers provided when you request a quote, submit an enquiry, or enter into a contract with us.', 'sail-renovate' ); ?></li>
      <li><strong><?php esc_html_e( 'Property Data:', 'sail-renovate' ); ?></strong> <?php esc_html_e( 'Details regarding your property required to provide accurate surveying, quotes, and renovation or reinstatement services.', 'sail-renovate' ); ?></li>
      <li><strong><?php esc_html_e( 'Financial Data:', 'sail-renovate' ); ?></strong> <?php esc_html_e( 'Bank account and payment details necessary for processing transactions relating to our services.', 'sail-renovate' ); ?></li>
      <li><strong><?php esc_html_e( 'Insurance Data:', 'sail-renovate' ); ?></strong> <?php esc_html_e( 'If relevant to a reinstatement claim, details of your insurance policy, claim references, and correspondence with loss adjusters.', 'sail-renovate' ); ?></li>
    </ul>

    <h2><?php esc_html_e( '2. How We Use Your Information', 'sail-renovate' ); ?></h2>
    <p><?php esc_html_e( 'We use your personal data primarily to fulfill our contractual obligations to you. This includes:', 'sail-renovate' ); ?></p>
    <ul>
      <li><?php esc_html_e( 'Providing quotations and arranging site surveys.', 'sail-renovate' ); ?></li>
      <li><?php esc_html_e( 'Executing renovation, repair, or maintenance contracts.', 'sail-renovate' ); ?></li>
      <li><?php esc_html_e( 'Liaising with insurance companies and loss adjusters on your behalf during reinstatement claims.', 'sail-renovate' ); ?></li>
      <li><?php esc_html_e( 'Managing payments and internal record keeping.', 'sail-renovate' ); ?></li>
      <li><?php esc_html_e( 'Responding to your queries and providing customer support.', 'sail-renovate' ); ?></li>
    </ul>

    <h2><?php esc_html_e( '3. Data Sharing', 'sail-renovate' ); ?></h2>
    <p><?php esc_html_e( 'We do not sell your personal data. We may share your information with trusted third parties strictly for the purposes of delivering our services. This includes:', 'sail-renovate' ); ?></p>
    <ul>
      <li><?php esc_html_e( 'Subcontractors and tradespeople actively working on your project.', 'sail-renovate' ); ?></li>
      <li><?php esc_html_e( 'Your insurance company or appointed loss adjusters (when managing a claim on your behalf).', 'sail-renovate' ); ?></li>
      <li><?php esc_html_e( 'Professional advisers such as accountants, lawyers, and building control inspectors.', 'sail-renovate' ); ?></li>
    </ul>

    <h2><?php esc_html_e( '4. Data Security', 'sail-renovate' ); ?></h2>
    <p><?php esc_html_e( 'We have implemented robust security measures to prevent your personal data from being accidentally lost, used, or accessed in an unauthorised way. Access to your personal data is limited to those employees, agents, and contractors who have a business need to know.', 'sail-renovate' ); ?></p>

    <h2><?php esc_html_e( '5. Your Legal Rights', 'sail-renovate' ); ?></h2>
    <p><?php esc_html_e( 'Under UK data protection law, you have the right to:', 'sail-renovate' ); ?></p>
    <ul>
      <li><?php esc_html_e( 'Request access to your personal data.', 'sail-renovate' ); ?></li>
      <li><?php esc_html_e( 'Request correction of any inaccurate data we hold about you.', 'sail-renovate' ); ?></li>
      <li><?php esc_html_e( 'Request erasure of your personal data under certain circumstances.', 'sail-renovate' ); ?></li>
      <li><?php esc_html_e( 'Object to or restrict the processing of your data.', 'sail-renovate' ); ?></li>
    </ul>
    <p><?php esc_html_e( 'If you wish to exercise any of these rights, please contact us using the details below.', 'sail-renovate' ); ?></p>

    <h2><?php esc_html_e( '6. Contact Us', 'sail-renovate' ); ?></h2>
    <p><?php esc_html_e( 'If you have any questions about this privacy policy or our privacy practices, please contact us:', 'sail-renovate' ); ?></p>
    <p>
      <strong><?php esc_html_e( 'Email:', 'sail-renovate' ); ?></strong> <a href="mailto:team@sailrenovate.co.uk">team@sailrenovate.co.uk</a><br>
      <strong><?php esc_html_e( 'Phone:', 'sail-renovate' ); ?></strong> 0117 476 7858
    </p>
  </div>
</main>
<?php get_footer(); ?>
