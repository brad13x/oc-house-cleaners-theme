<!-- SUBSCRIBE -->
<section class="subscribe-section" aria-label="Newsletter signup">
    <div class="subscribe-text">
        <div class="sub-tag">Stay in Touch</div>
        <h3>Get <em>cleaning tips</em> and exclusive offers in your inbox.</h3>
    </div>
    <form class="subscribe-form" method="POST" action="#">
        <input type="email" name="subscribe_email" placeholder="Your email address" aria-label="Email address">
        <button type="submit">SUBSCRIBE</button>
    </form>
</section>

<!-- FOOTER -->
<footer class="site-footer" role="contentinfo">
<div class="footer-inner">
    <div class="footer-grid">
        <div>
            <div class="footer-about-logo"><em>OC</em> House Cleaners</div>
            <p class="footer-about-desc">
                Professional home cleaning services across Orange County, CA.
                Locally owned, fully insured, and dedicated to your satisfaction since 2010.
            </p>
            <div class="footer-contact-info">
                <a href="tel:7145550190">(714) 555-0190</a><br>
                <a href="mailto:hello@ochousecleaners.com">hello@ochousecleaners.com</a><br>
                Serving Orange County, CA
            </div>
        </div>

        <div class="footer-col">
            <h4>Pages</h4>
            <?php
            wp_nav_menu( [
                'theme_location' => 'footer',
                'container'      => false,
                'items_wrap'     => '<ul>%3$s</ul>',
                'fallback_cb'    => 'ochc_footer_fallback_nav',
            ] );
            ?>
        </div>

        <div class="footer-col">
            <h4>Services</h4>
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/services/#regular' ) ); ?>">Regular House Cleaning</a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/#deep' ) ); ?>">Deep Cleaning</a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/#move' ) ); ?>">Move In / Move Out</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; <?php echo date( 'Y' ); ?> OC House Cleaners. All rights reserved. Serving Orange County, CA.</p>
    </div>
</div><!-- /.footer-inner -->
</footer>


<?php // ochc_footer_fallback_nav is defined in functions.php ?>

<?php wp_footer(); ?>
</body>
</html>
