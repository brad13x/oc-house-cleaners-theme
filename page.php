<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> /
        <span><?php the_title(); ?></span>
    </div>
    <h1><?php the_title(); ?></h1>
</div>

<?php
// ── Contact page ──────────────────────────────────────────────
// If this is the /contact/ page, show the booking form layout
if ( is_page( 'contact' ) ) : ?>

    <div class="contact-page-wrap">
        <div class="section-tag">Get in Touch</div>
        <h2 class="page-content-title">Book a Cleaning</h2>
        <p style="font-size:14px;color:#666;line-height:1.75;margin-bottom:8px;">
            Fill out the form below and we'll get back to you within 24 hours to confirm your booking.
        </p>
        <p style="font-size:13px;color:#999;margin-bottom:4px;">
            Or call us directly: <a href="tel:7145550190" style="color:#f97316;font-weight:700;">(714) 555-0190</a>
        </p>

        <?php
        // Show success message if redirected back with ?sent=1
        $sent = isset( $_GET['sent'] ) ? sanitize_key( $_GET['sent'] ) : '';
        if ( $sent === '1' ) :
        ?>
            <div style="background:#e8f5e9;border:1px solid #a5d6a7;border-radius:8px;padding:14px 18px;margin:20px 0;color:#2e7d32;font-size:13px;font-weight:600;" role="alert">
                Thank you! We'll be in touch within 24 hours.
            </div>
        <?php endif; ?>

        <form class="contact-page-form" method="POST" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="ochc_contact">
            <?php wp_nonce_field( 'ochc_contact_action', 'ochc_contact_nonce' ); ?>
            <input type="text"  name="contact_name"  placeholder="Your Name"    required>
            <input type="tel"   name="contact_phone" placeholder="Phone Number" required>
            <input type="email" name="contact_email" placeholder="Email Address" required>
            <button type="submit" class="btn-submit">SUBMIT &rarr;</button>
        </form>

        <?php if ( get_the_content() ) : ?>
            <div class="page-content" style="margin-top:40px;">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>
    </div>

<?php
// ── All other static pages ────────────────────────────────────
else : ?>

    <div class="page-content-wrap">
        <?php if ( get_the_content() ) : ?>
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>
    </div>

<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
