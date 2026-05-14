<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post();
    $cats    = get_the_category();
    $words   = str_word_count( strip_tags( get_the_content() ) );
    $minutes = max( 1, round( $words / 200 ) );
?>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> /
        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a> /
        <?php if ( ! empty( $cats ) ) : ?>
            <a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>">
                <?php echo esc_html( $cats[0]->name ); ?>
            </a> /
        <?php endif; ?>
        <span><?php the_title(); ?></span>
    </div>
    <h1><?php the_title(); ?></h1>
    <p>
        <?php
        echo esc_html( $minutes ) . ' min read &nbsp;&middot;&nbsp; ';
        echo esc_html( get_the_date() ) . ' &nbsp;&middot;&nbsp; By ' . esc_html( get_the_author() );
        ?>
    </p>
    <svg class="page-hero-wave" viewBox="0 0 1440 32" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M0,20 C360,40 1080,0 1440,20 L1440,32 L0,32 Z" fill="#f5f7ff"/>
    </svg>
</div>

<!-- SINGLE + SIDEBAR -->
<div class="single-layout">

    <main role="main">
        <article class="single-post-card" id="post-<?php the_ID(); ?>">

            <!-- Featured Image -->
            <div class="single-featured-img">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large' ); ?>
                <?php else : ?>
                    <i class="ti ti-home-check" aria-hidden="true"></i>
                <?php endif; ?>
            </div>

            <div class="single-post-content">

                <!-- Category badge -->
                <?php if ( ! empty( $cats ) ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>" class="single-cat-badge">
                        <i class="ti ti-tag" aria-hidden="true"></i>
                        <?php echo esc_html( $cats[0]->name ); ?>
                    </a>
                <?php endif; ?>

                <!-- Title is already in the page hero h1; use h2 here for correct document outline -->
                <h2 class="single-post-title"><?php the_title(); ?></h2>

                <div class="single-post-meta">
                    <span><i class="ti ti-user" aria-hidden="true"></i> <?php the_author(); ?></span>
                    <span><i class="ti ti-calendar" aria-hidden="true"></i> <?php echo esc_html( get_the_date() ); ?></span>
                    <span><i class="ti ti-clock" aria-hidden="true"></i> <?php echo esc_html( $minutes ); ?> min read</span>
                </div>

                <!-- Post content -->
                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <!-- Tags -->
                <?php $tags = get_the_tags(); if ( $tags ) : ?>
                    <div class="post-tags" aria-label="Post tags">
                        <?php foreach ( $tags as $tag ) : ?>
                            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="post-tag">
                                <?php echo esc_html( $tag->name ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </article>

        <!-- Author Box -->
        <div class="author-box">
            <div class="author-avatar" aria-hidden="true">OC</div>
            <div>
                <div class="author-name">OC House Cleaners</div>
                <p class="author-bio">
                    Professional home cleaning services across Orange County, CA.
                    We share tips, guides, and expert advice to help you keep your home spotless year-round.
                </p>
            </div>
        </div>

        <!-- Related Posts -->
        <?php
        $related_args = [
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post__not_in'   => [ get_the_ID() ],
            'post_status'    => 'publish',
        ];
        if ( ! empty( $cats ) ) {
            $related_args['category__in'] = [ $cats[0]->term_id ];
        }
        $related = new WP_Query( $related_args );
        if ( $related->have_posts() ) :
            $rel_colors = [ 'c1', 'c2', 'c3' ];
            $k = 0;
        ?>
        <div class="related-posts">
            <h3>Related Posts</h3>
            <div class="related-grid">
                <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                    <div class="related-card">
                        <div class="related-thumb <?php echo esc_attr( $rel_colors[ $k % 3 ] ); ?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                            <?php else : ?>
                                <i class="ti ti-article" aria-hidden="true"></i>
                            <?php endif; ?>
                        </div>
                        <div class="related-card-body">
                            <div class="related-card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <div class="related-card-date"><?php echo get_the_date(); ?></div>
                        </div>
                    </div>
                <?php $k++; endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
        <?php endif; ?>

    </main>

    <!-- SIDEBAR -->
    <?php get_sidebar(); ?>

</div>

<?php endwhile; ?>

<?php get_footer(); ?>
