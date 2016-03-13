<?php
/**
 * Template Name: Home Selling Process Page
 * Description: A page template for the Seller's page.
 */

while ( have_posts() ) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="page-header">
            
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        
        </header>

        <!-- adding the selling sidebar sidebar & changing the main content class if the sellers page sidebar is also active -->
        
        <?php if ( is_active_sidebar( 'selling-sidebar' ) && is_active_sidebar( 'sellers-page-sidebar' ) ) : ?>
            
            <div class="custom-sidebar-wrapper hidden-xs hidden-sm col-md-2">
                
                <div id="selling-sidebar" class="primary-sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'selling-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <section class="page-content col-xs-12 col-md-7">

        <!-- adding the selling sidebar & changing the main content class if only the selling sidebar is active -->

        <?php elseif( is_active_sidebar( 'selling-sidebar' ) ) : ?>

            <div class="custom-sidebar-wrapper hidden-xs hidden-sm col-md-3">
                
                <div id="selling-sidebar" class="primary-sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'selling-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <section class="page-content col-xs-12 col-md-9">

        <!-- changing the main content class if only the sellers page sidebar is active -->
        
        <?php elseif( is_active_sidebar( 'sellers-page-sidebar' ) ) : ?>
            
            <section class="page-content col-xs-12 col-md-9">
        
        <?php else : ?>
            
            <section class="page-content col-xs-12">
        
        <?php endif; ?>
            
                <?php the_content(); ?>
        
            </section>

        <!-- adding the sellers page sidebar & selling sidebar for mobile -->
        
        <?php if ( is_active_sidebar( 'sellers-page-sidebar' ) && is_active_sidebar( 'selling-sidebar' ) ) : ?>
            
            <div class="custom-sidebar-wrapper align-left col-xs-12 col-md-3">
                
                <div id="sellers-page-sidebar" class="primary-sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'sellers-page-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <div class="custom-sidebar-wrapper align-left col-xs-12 hidden-md hidden-lg">
                
                <div id="selling-sidebar" class="primary-sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'selling-sidebar' ); ?>
                
                </div>
            
            </div>

        <!-- adding the sellers page sidebar if the selling sidebar isn't active  -->

        <?php elseif( is_active_sidebar( 'sellers-page-sidebar' ) ) : ?>

            <div class="custom-sidebar-wrapper align-left col-xs-12 col-md-3">
                
                <div id="sellers-page-sidebar" class="primary-sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'sellers-page-sidebar' ); ?>
                
                </div>
            
            </div>

        <!-- adding selling sidebar for mobile -->
        
        <?php elseif( is_active_sidebar( 'selling-sidebar' ) ) : ?>
            
            <div class="custom-sidebar-wrapper align-left col-xs-12 hidden-md hidden-lg">
                
                <div id="selling-sidebar" class="primary-sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'selling-sidebar' ); ?>
                
                </div>
            
            </div>
        
        <?php endif; ?>
        
        <footer>
            
            <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
        
        </footer>
    
    </article>

<?php endwhile; ?>