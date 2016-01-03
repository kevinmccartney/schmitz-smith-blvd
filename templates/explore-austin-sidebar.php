<?php
/*
* Template Name: Explore Austin Sidebar
* Description: A page template for the pages to have the Explore Austin sidebar.
*/
?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page-header">
        <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
    </header>
    <?php if ( is_active_sidebar( 'explore-austin-sidebar' ) ) : ?>
        <div class="custom-sidebar-wrapper hidden-xs hidden-sm col-md-3">
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'explore-austin-sidebar' ); ?>
            </div>
        </div>
        <section class="page-content col-xs-12 col-md-9">
    <?php else : ?>
        <section class="page-content col-xs-12">
    <?php endif; ?>
        <?php the_content(); ?>
    </section>
    <?php if ( is_active_sidebar( 'explore-austin-sidebar' ) ) : ?>
        <div class="custom-sidebar-wrapper hidden-md hidden-lg col-xs-12">
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'explore-austin-sidebar' ); ?>
            </div>
        </div>
    <?php endif; ?>
    <footer>
        <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
    </footer>
</article>
<?php endwhile; ?>