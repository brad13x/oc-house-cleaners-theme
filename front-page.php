<?php get_header(); ?>

<!-- HERO -->
<section class="hero" aria-label="Hero">
    <div class="hero-left">
        <div class="hero-tag">Professional Home Cleaning</div>
        <h1 class="hero-h1">
            We keep your <em>home</em><br>
            <strong>spotless</strong> so you<br>
            don't have to.
        </h1>
        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hero-btn">OUR SERVICES</a>
    </div>
    <div class="hero-right">
        <div class="hero-form">
            <div class="hero-form-title">
                <i class="ti ti-calendar-event" aria-hidden="true"></i> Book a Cleaning
            </div>
            <?php ochc_booking_form( 'dark' ); ?>
        </div>
    </div>
    <svg class="hero-wave" viewBox="0 0 1440 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M0,30 C360,60 1080,0 1440,30 L1440,50 L0,50 Z" fill="#fff"/>
    </svg>
</section>

<!-- SERVICE NAV BAR -->
<div class="service-nav" aria-label="Services overview">
    <div>
        <div class="service-nav-sub">What We Do</div>
        <div class="service-nav-title">House Cleaning Services</div>
    </div>
    <div class="service-nav-phone">
        <i class="ti ti-phone-call" aria-hidden="true"></i>
        <div>
            <div class="service-nav-sub">Call Anytime</div>
            (714) 555-0190
        </div>
    </div>
</div>

<!-- SERVICES -->
<section class="services-section" aria-labelledby="services-heading">
    <div class="section-tag">Services</div>
    <h2 class="section-h2" id="services-heading">Home Cleaning, Done Right.</h2>
    <p class="section-sub">From regular upkeep to deep cleans, we handle every corner of your home with care.</p>

    <div class="services-grid">
        <div class="service-card">
            <div class="service-card-img img-1" aria-hidden="true">
                <i class="ti ti-home-2"></i>
            </div>
            <div class="service-card-overlay">
                <div class="service-card-name">Regular House Cleaning</div>
                <div class="service-card-desc">Weekly or bi-weekly recurring service</div>
            </div>
            <a href="<?php echo esc_url( home_url( '/services/#regular' ) ); ?>" class="service-card-btn" aria-label="Learn about Regular House Cleaning">
                <i class="ti ti-plus" aria-hidden="true"></i>
            </a>
        </div>

        <div class="service-card">
            <div class="service-card-img img-2" aria-hidden="true">
                <i class="ti ti-sparkles"></i>
            </div>
            <div class="service-card-overlay">
                <div class="service-card-name">Deep Cleaning</div>
                <div class="service-card-desc">Top-to-bottom thorough clean</div>
            </div>
            <a href="<?php echo esc_url( home_url( '/services/#deep' ) ); ?>" class="service-card-btn" aria-label="Learn about Deep Cleaning">
                <i class="ti ti-plus" aria-hidden="true"></i>
            </a>
        </div>

        <div class="service-card">
            <div class="service-card-img img-3" aria-hidden="true">
                <i class="ti ti-package"></i>
            </div>
            <div class="service-card-overlay">
                <div class="service-card-name">Move In / Move Out</div>
                <div class="service-card-desc">Full clean for new or vacated homes</div>
            </div>
            <a href="<?php echo esc_url( home_url( '/services/#move' ) ); ?>" class="service-card-btn" aria-label="Learn about Move In/Move Out Cleaning">
                <i class="ti ti-plus" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <p class="services-footnote">
        Serving all of Orange County. <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">See all service areas &rarr;</a>
    </p>
</section>

<!-- WAVE -->
<svg viewBox="0 0 1440 48" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%;background:#fff;" aria-hidden="true">
    <path d="M0,0 C480,48 960,0 1440,0 L1440,48 L0,48 Z" fill="#f5f7ff"/>
</svg>

<!-- WHY CHOOSE US -->
<section class="why-section" aria-labelledby="why-heading">
    <div class="why-image" aria-hidden="true">
        <i class="ti ti-home-heart bg-icon"></i>
        <i class="ti ti-sparkles fg-icon"></i>
    </div>
    <div class="why-content">
        <div class="section-tag">Why Choose Us</div>
        <h2 class="section-h2" id="why-heading">Orange County's<br>Trusted Home Cleaners</h2>
        <p style="font-size:14px;color:#888;line-height:1.75;margin-bottom:8px;">
            Local, reliable, and thorough — we treat your home like our own.
        </p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="why-link">Book a cleaning &rarr;</a>
        <div class="why-grid">
            <div class="why-item">
                <div class="why-icon"><i class="ti ti-users" aria-hidden="true"></i></div>
                <div>
                    <div class="why-item-title">Vetted &amp; Insured</div>
                    <div class="why-item-desc">All cleaners are background-checked and fully insured.</div>
                </div>
            </div>
            <div class="why-item">
                <div class="why-icon"><i class="ti ti-leaf" aria-hidden="true"></i></div>
                <div>
                    <div class="why-item-title">Eco Products</div>
                    <div class="why-item-desc">Safe, natural products for your family and pets.</div>
                </div>
            </div>
            <div class="why-item">
                <div class="why-icon"><i class="ti ti-clock" aria-hidden="true"></i></div>
                <div>
                    <div class="why-item-title">Always On Time</div>
                    <div class="why-item-desc">We show up when we say. No surprises, no delays.</div>
                </div>
            </div>
            <div class="why-item">
                <div class="why-icon"><i class="ti ti-shield-check" aria-hidden="true"></i></div>
                <div>
                    <div class="why-item-title">100% Guaranteed</div>
                    <div class="why-item-desc">Not happy? We'll come back and make it right, free.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WAVE INTO DARK -->
<svg viewBox="0 0 1440 48" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%;background:#f5f7ff;" aria-hidden="true">
    <path d="M0,48 C360,0 1080,48 1440,48 L1440,0 L0,0 Z" fill="#1a237e"/>
</svg>

<!-- HOW IT WORKS -->
<section class="how-section" aria-labelledby="how-heading">
    <div style="text-align:center;">
        <div class="section-tag">How It Works</div>
        <h2 class="section-h2 section-h2-white" id="how-heading">Spotless home in 4 simple steps</h2>
    </div>
    <div class="how-grid">
        <div class="how-step">
            <div class="how-circle"><i class="ti ti-file-description" aria-hidden="true"></i></div>
            <div class="how-step-title">Get in Touch</div>
            <div class="how-step-desc">Fill out the form or give us a call to get started.</div>
        </div>
        <div class="how-step">
            <div class="how-circle"><i class="ti ti-calendar-event" aria-hidden="true"></i></div>
            <div class="how-step-title">Schedule a Clean</div>
            <div class="how-step-desc">Pick a date and time that works for you.</div>
        </div>
        <div class="how-step">
            <div class="how-circle"><i class="ti ti-home-check" aria-hidden="true"></i></div>
            <div class="how-step-title">We Come to You</div>
            <div class="how-step-desc">Our team arrives on time, ready to clean.</div>
        </div>
        <div class="how-step">
            <div class="how-circle"><i class="ti ti-circle-check" aria-hidden="true"></i></div>
            <div class="how-step-title">Enjoy Your Home</div>
            <div class="how-step-desc">Relax in a fresh, spotless space.</div>
        </div>
    </div>
</section>

<!-- WAVE OUT OF DARK -->
<svg viewBox="0 0 1440 48" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%;background:#1a237e;" aria-hidden="true">
    <path d="M0,0 C480,48 960,0 1440,0 L1440,48 L0,48 Z" fill="#fff"/>
</svg>

<!-- CTA BANNER -->
<section class="cta-banner" aria-label="Promotional offer">
    <div class="cta-banner-img" aria-hidden="true">
        <i class="ti ti-home-heart bg"></i>
        <i class="ti ti-sparkles fg"></i>
    </div>
    <div class="cta-banner-content">
        <div class="cta-banner-tag">Limited Offer</div>
        <h2 class="cta-banner-h3">
            First cleaning is<br><em>10% off</em> for new customers.
        </h2>
        <div class="cta-banner-btns">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary" style="border-radius:24px;padding:12px 24px;font-size:13px;">BOOK NOW</a>
            <div class="cta-phone">
                <i class="ti ti-phone" aria-hidden="true"></i>
                <div>
                    <div class="cta-phone-label">Call Us</div>
                    (714) 555-0190
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="about-section" aria-labelledby="about-heading">
    <div class="about-text">
        <div class="section-tag">About Us</div>
        <h2 class="section-h2" id="about-heading">Orange County's home<br>cleaning experts.</h2>
        <p class="about-body">
            We've been keeping OC homes clean for over a decade. Family-owned and operated,
            we take pride in every home we clean.
        </p>
        <blockquote class="about-quote">
            "We started OC House Cleaners because everyone deserves to come home to a clean,
            comfortable space — without the stress."
        </blockquote>
        <div class="about-founder">
            <div class="founder-avatar" aria-hidden="true">OC</div>
            <div>
                <div class="founder-name">OC House Cleaners</div>
                <div class="founder-role">Serving Orange County since 2010</div>
            </div>
        </div>
    </div>
    <div class="about-images" aria-hidden="true">
        <div class="about-img-block tall"><i class="ti ti-home-2"></i></div>
        <div class="about-img-block"><i class="ti ti-sparkles"></i></div>
        <div class="about-img-block"><i class="ti ti-shield-check"></i></div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testi-section" aria-labelledby="testi-heading">
    <div class="section-tag">Reviews</div>
    <h2 class="section-h2" id="testi-heading">Trusted by OC homeowners.</h2>
    <div class="testi-grid">
        <div class="testi-card">
            <div class="testi-top">
                <div class="testi-avatar" aria-hidden="true">JM</div>
                <div>
                    <div class="testi-name">Jessica M.</div>
                    <div class="testi-location">Irvine, CA</div>
                </div>
                <div class="testi-stars" aria-label="5 stars">★★★★★</div>
            </div>
            <p class="testi-text">"Absolutely love this service. My house has never been this clean. Always on time, professional, and so thorough. Highly recommend to anyone in OC!"</p>
        </div>
        <div class="testi-card">
            <div class="testi-top">
                <div class="testi-avatar" aria-hidden="true">RT</div>
                <div>
                    <div class="testi-name">Robert T.</div>
                    <div class="testi-location">Anaheim, CA</div>
                </div>
                <div class="testi-stars" aria-label="5 stars">★★★★★</div>
            </div>
            <p class="testi-text">"Used them for a move-out clean and they did a phenomenal job. Got my full deposit back. Will definitely book again at the new place!"</p>
        </div>
    </div>
</section>

<!-- BOOK A CLEANING FORM -->
<section class="contact-section" aria-labelledby="contact-heading">
    <div class="section-tag">Book a Cleaning</div>
    <h2 class="section-h2 section-h2-white" id="contact-heading">Ready for a spotless home?</h2>
    <p>Fill out the form below and we'll get back to you within 24 hours.</p>
    <?php ochc_booking_form( 'dark' ); ?>
</section>

<!-- BLOG POSTS -->
<?php
$recent_posts = new WP_Query( [
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
] );

if ( $recent_posts->have_posts() ) : ?>
<section class="blog-section" aria-labelledby="blog-heading">
    <div class="blog-section-inner">
    <div class="blog-section-header">
        <div>
            <div class="section-tag">Blog</div>
            <h2 class="section-h2" id="blog-heading">Home cleaning tips &amp; guides.</h2>
        </div>
        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="btn-primary">VIEW ALL POSTS</a>
    </div>
    <div class="blog-cards-grid">
        <?php
        $color_classes = [ 'color-1', 'color-2', 'color-3' ];
        $i = 0;
        while ( $recent_posts->have_posts() ) :
            $recent_posts->the_post();
            $cat   = get_the_category();
            $color = $color_classes[ $i % 3 ];
        ?>
        <article class="blog-card">
            <div class="blog-card-thumb <?php echo esc_attr( $color ); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'medium' ); ?>
                <?php else : ?>
                    <i class="ti ti-article" aria-hidden="true"></i>
                <?php endif; ?>
            </div>
            <div class="blog-card-body">
                <?php if ( ! empty( $cat ) ) : ?>
                    <div class="blog-card-cat"><?php echo esc_html( $cat[0]->name ); ?></div>
                <?php endif; ?>
                <div class="blog-card-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
                <div class="blog-card-meta"><?php echo get_the_date(); ?></div>
            </div>
        </article>
        <?php
            $i++;
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
    </div><!-- /.blog-section-inner -->
</section>
<?php endif; ?>

<?php get_footer(); ?>
