<?php
// Fallback — WordPress requires this file.
// Most traffic hits front-page.php, archive.php, or single.php instead.
get_header();
?>

<div class="page-content-wrap">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <h1 class="page-content-title"><?php the_title(); ?></h1>
            <div class="page-content"><?php the_content(); ?></div>
        <?php endwhile; ?>
    <?php else : ?>
        <h1 class="page-content-title">Nothing here yet</h1>
        <p>Try heading back to the <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home page</a>.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
