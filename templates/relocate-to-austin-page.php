<?php
/**
 * Template Name: Relocate to Austin Page
 * Description: Page template for the Relocate to Austin Page.
 */

while( have_posts() ) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="page-header">
            
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        
        </header>

        <!-- adding the explore austin sidebar sidebar & changing the main content class if the relocation page sidebar is also active -->
        
        <?php if( is_active_sidebar( 'explore-austin-sidebar' ) && is_active_sidebar( 'relocation-page' ) ) : ?>
           
            <div class="custom-sidebar-wrapper visible-lg col-lg-2">
               
                <div id="explore-austin-sidebar" class="sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'explore-austin-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <section class="page-content col-xs-12 col-lg-7">

        <!-- adding the explore austin sidebar sidebar & changing the main content class -->
        
        <?php elseif( is_active_sidebar( 'explore-austin-sidebar' ) ) : ?>
            
            <div class="custom-sidebar-wrapper visible-lg col-lg-3">
                
                <div id="explore-austin-sidebar" class="sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'explore-austin-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <section class="page-content col-xs-12 col-lg-9">

        <?php elseif( is_active_sidebar( 'relocation-page' ) ) : ?>

            <section class="page-content col-xs-12 col-lg-9">
        
        <?php else : ?>
                
                <section class="page-content col-xs-12">
       
        <?php endif; ?>
            
                <?php the_content(); ?>
        
            </section>

        <!-- adding the relocation page sidebar sidebar & adding the explore austin sidebar If it's active & changing the sidebar class -->
        
        <?php if( is_active_sidebar( 'relocation-page' ) ) : ?>
            
            <div class="custom-sidebar-wrapper visible-lg col-lg-3">
               
                <div id="relocation-page-sidebar" class="sidebar widget-area" role="complementary">
                   
                    <?php dynamic_sidebar( 'relocation-page' ); ?>
                
                </div>
            
            </div>
        
        <?php endif; ?>
        
        <footer>
            
            <?php wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) ); ?>
        
        </footer>
    
    </article>

<?php endwhile; ?>