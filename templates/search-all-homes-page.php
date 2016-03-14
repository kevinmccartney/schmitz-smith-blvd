<?php
/**
 * Template Name: Serach All Homes Page Template
 * Description: A template for the Search All Homes page.
 */

while( have_posts() ) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="page-header">
            
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        
        </header>
        
        <!-- adding the sidebar & changing the main content class -->

        <?php if( is_active_sidebar( 'search-all-homes-sidebar' ) ) : ?>
            
            <div class="custom-sidebar-wrapper visible-md visible-lg col-md-3">
                
                <div id="search-all-homes-sidebar" class="sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'search-all-homes-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <section class="page-content col-xs-12 col-md-9">
        
        <?php else : ?>
            
            <section class="page-content col-xs-12">
        
        <?php endif; ?>
                
                <?php the_content(); ?>
            
            </section>
        
        <footer>
            
            <?php wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) ); ?>
        
        </footer>
    
    </article>

<?php endwhile; ?>