<?php
/**
 * Template Name: Home Buying Process Page
 * Description: A page template for the Buyer's page.
 */


while( have_posts() ) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="page-header">
            
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        
        </header>

        <!-- adding the buying sidebar sidebar & changing the main content class if the buyers page sidebar is also active -->
        
        <?php if( is_active_sidebar( 'buying-sidebar' ) && is_active_sidebar( 'buyers-page-sidebar' ) ) : ?>
            
            <div class="custom-sidebar-wrapper visible-lg col-lg-2">
                
                <div id="buying-sidebar" class="sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'buying-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <section class="page-content col-sm-12 col-lg-7">

        <!-- adding the buying sidebar if active changing the main content class -->
        
        <?php elseif( is_active_sidebar( 'buying-sidebar' ) ) : ?>

            <div class="custom-sidebar-wrapper visible-lg col-lg-3">
                
                <div id="buying-sidebar" class="sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'buying-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <section class="page-content col-sm-12 col-lg-9">

        <!-- changing the main content class if only the buying page sidebar is active -->

        <?php elseif( is_active_sidebar( 'buying-page-sidebar' ) ) : ?>

            <section class="page-content col-sm-12 col-lg-9">
        
        <?php else : ?>
            
            <section class="page-content col-xs-12">
        
        <?php endif; ?>
            
                <?php the_content(); ?>
        
            </section>

        <!-- adding the buying page sidebar & buying sidebar for mobile -->
        
        <?php if( is_active_sidebar( 'buyers-page-sidebar' ) ) : ?>

                <div class="custom-sidebar-wrapper visible-lg col-lg-3">
                    
                    <div id="buyers-page-sidebar" class="sidebar widget-area" role="complementary">
                        
                        <?php dynamic_sidebar( 'buyers-page-sidebar' ); ?>
                    
                    </div>
                
                </div>

        <?php endif; ?>
        
        <footer>
            
            <?php wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) ); ?>
        
        </footer>
    
    </article>

<?php endwhile; ?>