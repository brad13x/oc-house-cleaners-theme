<?php get_header(); ?>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> /
        <span>Blog</span>
    </div>
    <h1>Cleaning Tips &amp; Guides</h1>
    <p>Expert advice to keep your Orange County home fresh and spotless.</p>
    <svg class="page-hero-wave" viewBox="0 0 1440 32" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M0,20 C360,40 1080,0 1440,20 L1440,32 L0,32 Z" fill="#f5f7ff"/>
    </svg>
</div>

<!-- BLOG LIST + SIDEBAR -->
<div class="blog-list-layout">

    <!-- POSTS -->
    <main role="main" aria-label="Blog posts">
        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <article class="post-list-card" id="post-<?php the_ID(); ?>">

                    <?php
                    $cats = get_the_category();
                    if ( ! empty( $cats ) ) :
                    ?>
                        <a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>" class="post-list-cat">
                            <?php echo esc_html( $cats[0]->name ); ?>
                        </a>
                    <?php endif; ?>

                    <h2 class="post-list-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <div class="post-list-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                    <div class="post-list-footer">
                        <div class="post-list-meta">
                            <span>
                                <i class="ti ti-user" aria-hidden="true"></i>
                                <?php the_author(); ?>
                            </span>
                            <span>
                                <i class="ti ti-calendar" aria-hidden="true"></i>
                                <?php echo get_the_date(); ?>
                            </span>
                            <span>
                                <i class="ti ti-clock" aria-hidden="true"></i>
                                <?php
                                $words   = str_word_count( strip_tags( get_the_content() ) );
                                $minutes = max( 1, round( $words / 200 ) );
                                echo esc_html( $minutes ) . ' min read';
                                ?>
                            </span>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="read-more-link">
                            Read More <i class="ti ti-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>

                </article>
            <?php endwhile; ?>

            <!-- PAGINATION -->
            <nav class="pagination-wrap" aria-label="Blog pagination">
                <?php
                $paginate = paginate_links( [
                    'type'      => 'array',
                    'prev_text' => '&laquo;',
                    'next_text' => 'Next <i class="ti ti-arrow-right"></i>',
                ] );
                if ( $paginate ) {
                    foreach ( $paginate as $link ) {
                        $is_current = strpos( $link, 'current' ) !== false;
                        $is_next    = strpos( $link, 'next' ) !== false;
                        $class      = 'page-number';
                        if ( $is_current ) $class .= ' current';
                        if ( $is_next )    $class .= ' next';
                        echo '<span class="' . esc_attr( $class ) . '">' . $link . '</span>';
                    }
                }
                ?>
            </nav>

        <?php else : ?>
            <div class="post-list-card">
                <p>No posts found yet. Check back soon!</p>
            </div>
        <?php endif; ?>
    </main>

    <!-- SIDEBAR -->
    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
