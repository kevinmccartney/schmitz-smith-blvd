<!-- Adds the blog sidebar to the blog single posts -->

<!doctype html>

<html <?php language_attributes(); ?>>
    
    <?php get_header( hji_theme_template_base() ); ?>
    
    <body <?php body_class(); ?>>
        
        <?php do_action( 'hji_theme_body_start' ); ?>
        
        <!--[if lt IE 9]>
        <div class="alert alert-warning">
            <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'hji-textdomain'); ?>
        </div>
        <![endif]-->
        
        <div id="wrapper" class="body-wrapper">
            
            <?php do_action( 'hji_theme_before_navbar' ); ?>
            
            <?php get_template_part( 'templates/header-navbar' ); ?>
            
            <?php do_action( 'hji_theme_after_navbar' ); ?>
            
            <section id="primary" class="primary-wrapper container">
                
                <?php do_action( 'hji_theme_layout_before' ); ?>
                
                <div class="row">
                    
                    <?php do_action( 'hji_theme_before_content' ); ?>
                    
                    <div id="content" class="<?php echo hji_theme_main_class(); ?>" role="main">
                        
                        <?php do_action( 'hji_theme_before_content_col' ); ?>
                        
                        <!-- adding the blog sidebar only if the post is not in the successful-sales category -->

                        <?php if( is_active_sidebar( 'blog-sidebar' ) && !in_category('successful-sales') ) : ?>
                            
                            <div class="article-wrapper col-xs-12 col-md-9">
                        
                        <?php else : ?>
                            
                            <div class="article-wrapper col-xs-12">
                            
                        <?php endif; ?>
                                
                                <?php include hji_theme_template_path(); ?>
                            
                            </div>

                            <!-- adding the blog sidebar if the post is not in the successful sales category -->
                                                        
                        <?php if( is_active_sidebar( 'blog-sidebar' ) && !in_category('successful-sales') ) : ?>

                            <div class="custom-sidebar-wrapper col-xs-12 hidden-xs hidden-sm col-md-3">
                
                                <div id="blog-sidebar" class="sidebar widget-area" role="complementary">
                                
                                    <?php dynamic_sidebar( 'blog-sidebar' ); ?>

                                </div>
                            
                            </div>
                            
                        <?php endif; ?>
                            
                        <?php get_template_part( 'templates/nav', 'below' ); ?>
                           
                        <?php do_action( 'hji_theme_after_content_col' ); ?>
                        
                    </div>
                    
                </div>
                
                <?php do_action( 'hji_theme_layout_after' ); ?>
           
            </section>
         
            <?php do_action( 'hji_theme_after_primary' ) ?>
         
            <?php get_footer( hji_theme_template_base() ); ?>        
        
        </div>
        
        <?php do_shortcode( 'hji_theme_body_end' ); ?>
    
    </body>

</html>