<?php
/*
* Template Name: Home Buying Process Page
* Description: A page template for the Buyer's page.
*/

while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="page-header">
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        </header>
        <?php if ( is_active_sidebar( 'buyers-page-sidebar' ) && is_active_sidebar( 'buying-sidebar' ) ) : ?>
            <div class="custom-sidebar-wrapper hidden-xs hidden-sm col-md-2">
                <div id="buying-sidebar" class="primary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar( 'buying-sidebar' ); ?>
                </div>
            </div>
            <section class="page-content col-sm-12 col-md-7">
        <?php elseif( is_active_sidebar( 'buying-sidebar' ) ) : ?>
            <section class="page-content col-sm-12 col-md-9">
        <?php else : ?>
            <section class="page-content col-xs-12">
        <?php endif; ?>
            <?php the_content(); ?>
        </section>
        <?php if ( is_active_sidebar( 'buyers-page-sidebar' ) && is_active_sidebar( 'buying-sidebar') ) : ?>
            <div class="custom-sidebar-wrapper align-left col-xs-12 col-md-3">
                <div id="buyers-page-sidebar" class="primary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar( 'buyers-page-sidebar' ); ?>
                </div>
            </div>
            <div class="custom-sidebar-wrapper align-left hidden-md hidden-lg col-xs-12">
                <div id="buying-sidebar" class="primary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar( 'buying-sidebar' ); ?>
                </div>
            </div>
        <?php elseif( is_active_sidebar('buying-sidebar') ) : ?>
            <div class="custom-sidebar-wrapper align-left hidden-md hidden-lg col-xs-12">
                <div id="buying-sidebar" class="primary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar( 'buying-sidebar' ); ?>
                </div>
            </div>
        <?php endif; ?>
        <footer>
            <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
        </footer>
    </article>
<?php endwhile; ?>