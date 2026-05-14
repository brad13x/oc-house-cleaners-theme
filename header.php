<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- TOPBAR -->
<div class="topbar">
    <div class="topbar-left">
        <span><i class="ti ti-phone" aria-hidden="true"></i> <a href="tel:7145550190" style="color:inherit;">(714) 555-0190</a></span>
        <span><i class="ti ti-clock" aria-hidden="true"></i> Mon–Fri: 8:00–18:00</span>
        <span><i class="ti ti-mail" aria-hidden="true"></i> <a href="mailto:hello@ochousecleaners.com" style="color:inherit;">hello@ochousecleaners.com</a></span>
    </div>
    <div class="topbar-right">
        <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook">
            <i class="ti ti-brand-facebook" aria-hidden="true"></i>
        </a>
        <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram">
            <i class="ti ti-brand-instagram" aria-hidden="true"></i>
        </a>
        <a href="https://yelp.com" target="_blank" rel="noopener" aria-label="Yelp">
            <i class="ti ti-brand-yelp" aria-hidden="true"></i>
        </a>
    </div>
</div>

<!-- HEADER -->
<header class="site-header" role="banner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?> Home">
        <i class="ti ti-sparkles" aria-hidden="true"></i>
        <div class="logo-text">
            <strong><em>OC</em> House Cleaners</strong>
            <span>Orange County, CA</span>
        </div>
    </a>

    <nav class="main-nav" id="main-nav" role="navigation" aria-label="Main Navigation">
        <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new OCHC_Nav_Walker(),
            'fallback_cb'    => 'ochc_fallback_nav',
        ] );
        ?>
    </nav>

    <div class="header-ctas">
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-outline">GET QUOTE</a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary">BOOK NOW</a>
    </div>

    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle menu" aria-expanded="false">
        <i class="ti ti-menu-2" aria-hidden="true"></i>
    </button>
</header>


<?php // Nav walker and fallback are defined in functions.php ?>
