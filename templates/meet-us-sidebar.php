
<?php
/**
 * Template Name: Meet Us Sidebar
 * Description: A page template for pages to have the Meet Us sidebar.
 */

while ( have_posts() ) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="page-header">
            
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        
        </header>

        <!-- adding the sidebar & changing the main content class -->
        
        <?php if ( is_active_sidebar( 'meet-us-sidebar' ) ) : ?>
            
            <div class="custom-sidebar-wrapper visible-lg col-lg-3">
                
                <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                   
                    <?php dynamic_sidebar( 'meet-us-sidebar' ); ?>
                
                </div>
            
            </div>
            
            <section class="page-content col-xs-12 col-lg-9">
        
        <?php else : ?>
            
            <section class="page-content col-xs-12">
        
        <?php endif; ?>
            
                <?php the_content(); ?>
            
            </section>

        <!-- adding sidebar for mobile -->

        <?php if ( is_active_sidebar( 'meet-us-sidebar' ) ) : ?>
            
            <div class="custom-sidebar-wrapper align-left col-xs-12 hidden-lg">
                
                <div id="meet-us-sidebar" class="primary-sidebar widget-area" role="complementary">
                    
                    <?php dynamic_sidebar( 'meet-us-sidebar' ); ?>
                
                </div>
            
            </div>
        
        <?php endif; ?>
        
        <footer>
            
            <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
        
        </footer>
    
    </article>

<?php endwhile; ?>