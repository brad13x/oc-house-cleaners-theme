<?php
/**
 * OC House Cleaners — functions.php
 */

// ── Theme Setup ──────────────────────────────────────────────
function ochc_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo' );

    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'ochc' ),
        'footer'  => __( 'Footer Menu', 'ochc' ),
    ] );
}
add_action( 'after_setup_theme', 'ochc_setup' );

// ── Enqueue Styles & Scripts ─────────────────────────────────
function ochc_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style(
        'ochc-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get( 'Version' )
    );

    // Tabler Icons (outline)
    wp_enqueue_style(
        'tabler-icons',
        'https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css',
        [],
        null
    );

    // Main JS
    wp_enqueue_script(
        'ochc-script',
        get_template_directory_uri() . '/js/main.js',
        [],
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'ochc_enqueue_assets' );

// ── Excerpt Length ────────────────────────────────────────────
function ochc_excerpt_length( $length ) {
    return 28;
}
add_filter( 'excerpt_length', 'ochc_excerpt_length' );

function ochc_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'ochc_excerpt_more' );

// ── Register Sidebar ──────────────────────────────────────────
function ochc_register_sidebars() {
    register_sidebar( [
        'name'          => __( 'Blog Sidebar', 'ochc' ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'Widgets for the blog list and single post sidebar.', 'ochc' ),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ] );
}
add_action( 'widgets_init', 'ochc_register_sidebars' );

// ── Custom Contact Form Handler ────────────────────────────────
// Handles the simple Name / Phone / Email form via admin-post
function ochc_handle_contact_form() {
    if ( ! isset( $_POST['ochc_contact_nonce'] ) ||
         ! wp_verify_nonce( $_POST['ochc_contact_nonce'], 'ochc_contact_action' ) ) {
        wp_die( 'Security check failed.' );
    }

    $name  = sanitize_text_field( $_POST['contact_name'] ?? '' );
    $phone = sanitize_text_field( $_POST['contact_phone'] ?? '' );
    $email = sanitize_email( $_POST['contact_email'] ?? '' );

    $to      = get_option( 'admin_email' );
    $subject = 'New Booking Request — OC House Cleaners';
    $body    = "New booking request received:\n\nName: {$name}\nPhone: {$phone}\nEmail: {$email}\n";
    $headers = [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>" ];

    wp_mail( $to, $subject, $body, $headers );

    // Redirect to thank-you page if it exists, otherwise back to contact page with success flag
    $thank_you = get_page_by_path( 'thank-you' );
    if ( $thank_you ) {
        wp_safe_redirect( home_url( '/thank-you/' ) );
    } else {
        wp_safe_redirect( add_query_arg( 'sent', '1', home_url( '/contact/' ) ) );
    }
    exit;
}
add_action( 'admin_post_ochc_contact',        'ochc_handle_contact_form' );
add_action( 'admin_post_nopriv_ochc_contact', 'ochc_handle_contact_form' );

// ── Simple Nav Walker ─────────────────────────────────────────
if ( ! class_exists( 'OCHC_Nav_Walker' ) ) {
    class OCHC_Nav_Walker extends Walker_Nav_Menu {
        function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
            $classes    = empty( $item->classes ) ? [] : (array) $item->classes;
            $is_current = in_array( 'current-menu-item', $classes );
            $class_str  = $is_current ? ' class="current"' : '';
            $output    .= '<a href="' . esc_url( $item->url ) . '"' . $class_str . '>'
                        . esc_html( $item->title ) . '</a>';
        }
    }
}

// Fallback if no menu is assigned
if ( ! function_exists( 'ochc_fallback_nav' ) ) {
    function ochc_fallback_nav() {
        $pages = [ 'Home' => '/', 'About' => '/about/', 'Services' => '/services/',
                   'Pricing' => '/pricing/', 'Blog' => '/blog/', 'Contact' => '/contact/' ];
        foreach ( $pages as $label => $url ) {
            $current = ( home_url( $url ) === home_url( $_SERVER['REQUEST_URI'] ) ) ? ' class="current"' : '';
            echo '<a href="' . esc_url( home_url( $url ) ) . '"' . $current . '>' . esc_html( $label ) . '</a>';
        }
    }
}

// Footer nav fallback
if ( ! function_exists( 'ochc_footer_fallback_nav' ) ) {
    function ochc_footer_fallback_nav() {
        $pages = [ 'Home' => '/', 'About' => '/about/', 'Services' => '/services/',
                   'Pricing' => '/pricing/', 'Blog' => '/blog/', 'Contact' => '/contact/' ];
        echo '<ul>';
        foreach ( $pages as $label => $url ) {
            echo '<li><a href="' . esc_url( home_url( $url ) ) . '">' . esc_html( $label ) . '</a></li>';
        }
        echo '</ul>';
    }
}

// ── Helper: render the booking form ──────────────────────────
// Call ochc_booking_form( 'dark' ) for dark bg, ochc_booking_form() for light bg
function ochc_booking_form( $style = 'light' ) {
    $class = ( $style === 'dark' ) ? 'contact-form' : 'contact-page-form';
    ?>
    <form class="<?php echo esc_attr( $class ); ?>" method="POST" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <input type="hidden" name="action" value="ochc_contact">
        <?php wp_nonce_field( 'ochc_contact_action', 'ochc_contact_nonce' ); ?>
        <input type="text"  name="contact_name"  placeholder="Your Name"     required autocomplete="name">
        <input type="tel"   name="contact_phone" placeholder="Phone Number"   required autocomplete="tel">
        <input type="email" name="contact_email" placeholder="Email Address"  required autocomplete="email">
        <button type="submit" class="btn-submit">SUBMIT &rarr;</button>
    </form>
    <?php
}
