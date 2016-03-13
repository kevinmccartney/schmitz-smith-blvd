<?php
/**
 * Template Name: Selling Sidebar
 * Description: A page template for pages to have the Selling sidebar.
 */

while ( have_posts() ) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="page-header">
            
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
       
        </header>
        
        <!-- adding the sidebar & changing the main content class -->

        <?php if ( is_active_sidebar( 'selling-sidebar' ) ) : ?>
           
            <div class="custom-sidebar-wrapper visible-md visible-lg col-md-3">
                
                <div id="selling-sidebar" class="sidebar widget-area" role="complementary">
                   
                    <?php dynamic_sidebar( 'selling-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <section class="page-content col-xs-12 col-lg-9">
        
        <?php else : ?>
            
            <section class="page-content col-xs-12">
        
        <?php endif; ?>
            
                <?php the_content(); ?>
        
            </section>
        
        <!-- adding sidebar for mobile -->

        <?php if ( is_active_sidebar( 'selling-sidebar' ) ) : ?>
            
            <div class="custom-sidebar-wrapper hidden-md hidden-lg col-xs-12">
                
                <div id="selling-sidebar" class="sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'selling-sidebar' ); ?>
                
                </div>
            
            </div>
        

        <?php endif; ?>
        
        <footer>
           
            <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
        
        </footer>
    
    </article>

<?php endwhile; ?>