<!-- adding the blog sidebar to the blog page-->
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

                    <!-- adding the blog sidebar & changing the main content class -->
                    
                    <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
                        
                        <div class="blog-sidebar col-lg-3 visible-lg">
                            
                            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                                
                                <?php dynamic_sidebar( 'blog-sidebar' ); ?>
                            
                            </div>
                        
                        </div>
                        
                        <div id="content" class="col-xs-12 col-lg-9" role="main">

                    <?php else : ?>

                        <div id="content" class="<?php echo hji_theme_main_class(); ?>" role="main">

                    <?php endif; ?>
                    
                    
                    <?php do_action( 'hji_theme_before_content_col' ); ?>
                   
                    <?php include hji_theme_template_path(); ?>
                    
                    <?php do_action( 'hji_theme_after_content_col' ); ?>
                
                </div>
                
                <!-- adding the blog sidebar for mobile -->
                
                <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
                    
                    <div class="blog-sidebar col-xs-12 hidden-lg">
                        
                        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                          
                            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
                        
                        </div>
                   
                    </div>

                <?php endif; ?>

                
                <?php do_action( 'hji_theme_before_sidebar' ); ?>
                
                <?php ( hji_theme_display_sidebar() ? get_sidebar( hji_theme_template_base() ) : '' ) ?>
                
                <?php do_action( 'hji_theme_after_sidebar' ); ?>

                <?php do_action( 'hji_theme_layout_after' ); ?>
            
            </section>

            <?php do_action( 'hji_theme_after_primary' ); ?>

            <?php get_footer( hji_theme_template_base() ); ?>
        
        </div>

        <?php do_shortcode( 'hji_theme_body_end' ); ?>

    </body>

</html>