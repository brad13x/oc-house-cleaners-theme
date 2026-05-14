# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

A custom WordPress theme for **OC House Cleaners** — an Orange County residential cleaning service. The theme is entirely custom (no parent theme, no page builder) and lives as a standalone theme directory dropped into `wp-content/themes/`.

## Development workflow

There is no build step — no npm, no Webpack, no Sass. Edit PHP/CSS/JS directly and refresh the browser. To preview locally, the theme must be active in a WordPress install (Local, MAMP, or similar).

Copy the theme folder to your WordPress install:
```
cp -r oc-house-cleaners-theme /path/to/wordpress/wp-content/themes/
```

Then activate it in WP Admin → Appearance → Themes.

## Theme architecture

**Template hierarchy** (standard WordPress):
- `front-page.php` — homepage (hero, services, why-us, how-it-works, CTA, about, testimonials, blog preview)
- `page.php` — all static pages; branches on `is_page('contact')` to show the booking form layout vs. generic content
- `single.php` — blog post view with sidebar
- `archive.php` — blog listing with sidebar
- `index.php` — fallback
- `header.php` / `footer.php` — shared chrome; loaded via `get_header()` / `get_footer()`
- `sidebar.php` — blog sidebar; registered as `blog-sidebar` widget area

**`functions.php` responsibilities:**
- Theme setup (title-tag, thumbnails, HTML5, custom-logo, nav menus)
- Enqueues `style.css` + Tabler Icons CDN + `js/main.js`
- `OCHC_Nav_Walker` — strips `<li>` wrappers, outputs bare `<a>` tags for the flat header nav
- `ochc_fallback_nav()` / `ochc_footer_fallback_nav()` — hardcoded nav links used when no menu is assigned in WP Admin
- `ochc_booking_form( $style )` — reusable booking form helper; call with `'dark'` for the dark-bg version (`.contact-form`) or omit/`'light'` for the light version (`.contact-page-form`)
- Contact form handler hooked to `admin_post_ochc_contact` (handles both logged-in and logged-out users); sends email via `wp_mail()` and redirects to `/thank-you/` or `/contact/?sent=1`

**Registered nav menu locations:** `primary` (header) and `footer`.

## Styles & icons

All CSS is in `style.css` — the WordPress theme stylesheet (the header comment block is required). No preprocessor. Color tokens used throughout:
- Brand navy: `#1a237e`
- Brand orange: `#f97316`
- Light bg: `#f5f7ff`
- Body text: `#1a1a2e`

Icons come from [Tabler Icons](https://tabler.io/icons) loaded via CDN as a webfont. Usage: `<i class="ti ti-{icon-name}"></i>`.

Responsive breakpoints in `style.css`: `960px` (tablet) and `640px` (mobile). The mobile nav opens as an absolutely-positioned dropdown anchored to `.site-header` (which has `isolation: isolate`).

## Contact / booking form

The form POSTs to `admin-post.php` with `action=ochc_contact`. It is CSRF-protected with `wp_nonce_field`. On success it redirects to the `/thank-you/` page if that page exists, otherwise to `/contact/?sent=1`. The success message on the contact page is rendered when `?sent=1` is in the query string.

The form is rendered in two places via `ochc_booking_form()`: the homepage hero (`front-page.php`) and the full contact page (`page.php`). The contact page also has an inline duplicate form — keep them in sync or consolidate.

## Expected WordPress pages

These slugs are hardcoded in templates and the fallback nav:
- `/` (front page)
- `/about/`
- `/services/`
- `/pricing/`
- `/blog/`
- `/contact/`
- `/thank-you/` (optional; used for form redirect)
