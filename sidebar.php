<aside class="sidebar" role="complementary" aria-label="Blog sidebar">

    <!-- CTA Widget -->
    <div class="sidebar-cta-widget">
        <h4>Ready for a spotless home?</h4>
        <p>Book a cleaning today and get 10% off your first visit.</p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary">BOOK NOW</a>
    </div>

    <!-- Categories -->
    <div class="sidebar-widget">
        <div class="widget-title">Categories</div>
        <ul>
        <?php
        $cats = get_categories( [ 'hide_empty' => true ] );
        foreach ( $cats as $cat ) :
        ?>
            <li class="widget-cat-item">
                <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
                    <?php echo esc_html( $cat->name ); ?>
                </a>
                <span class="cat-badge"><?php echo esc_html( $cat->count ); ?></span>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <!-- Recent Posts -->
    <div class="sidebar-widget">
        <div class="widget-title">Recent Posts</div>
        <?php
        $recent = new WP_Query( [ 'posts_per_page' => 4, 'post_status' => 'publish' ] );
        $colors = [ 'c1', 'c2', 'c3', 'c1' ];
        $j = 0;
        while ( $recent->have_posts() ) : $recent->the_post(); ?>
        <div class="widget-recent-post">
            <div class="widget-recent-thumb <?php echo esc_attr( $colors[ $j % 4 ] ); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                <?php else : ?>
                    <i class="ti ti-article" aria-hidden="true"></i>
                <?php endif; ?>
            </div>
            <div>
                <div class="widget-recent-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
                <div class="widget-recent-date"><?php echo get_the_date(); ?></div>
            </div>
        </div>
        <?php $j++; endwhile; wp_reset_postdata(); ?>
    </div>

    <!-- Service Areas -->
    <div class="sidebar-widget">
        <div class="widget-title">Serving OC Since 2010</div>
        <p style="font-size:12px;color:#888;line-height:1.8;">
            Irvine &middot; Anaheim &middot; Santa Ana &middot; Fullerton &middot;
            Huntington Beach &middot; Newport Beach &middot; and more.
        </p>
    </div>

    <!-- Dynamic WordPress Widgets (optional) -->
    <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
    <?php endif; ?>

</aside>
