<?php
/*
 * Template Name: Relocate to Austin Page
 * Description: Page template for the Relocate to Austin Page.
 */

?>

<?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="page-header">

            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

        </header>

        <?php if ( is_active_sidebar( 'explore-austin-sidebar' ) ) : ?>

            <div class="custom-sidebar-wrapper hidden-xs hidden-sm col-md-2">

                <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">

                    <?php dynamic_sidebar( 'explore-austin-sidebar' ); ?>

                </div>

            </div>

        <?php endif; ?>

        <section class="page-content col-sm-12 col-md-7">

            <?php the_content(); ?>

        </section>

        <?php if ( is_active_sidebar( 'relocation-page' ) ) : ?>

            <div class="custom-sidebar-wrapper align-left hidden-md hidden-lg col-xs-12">

                <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">

                    <?php dynamic_sidebar( 'relocation-page' ); ?>

                </div>

            </div>

        <?php endif; ?>

        <footer>

            <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

        </footer>

    </article>

<?php endwhile; ?>
