<?php
/**
 * Sets our SCSS constant for the improved build process
 * REQUIRED
 *
 * @since 2.7.0
 */
if( !defined( 'HJI_BLVD_SCSS' ) ) :
    define( 'HJI_BLVD_SCSS', true );
endif;

/**
 * Registering Additional Widgets & deregistering a few we don't need
*/
if( !function_exists( 'hji_schmitz_smith_widgets_init' ) ) :
    function hji_schmitz_smith_widgets_init() {
        register_sidebar( array(
            'id'            => 'buying-sidebar',
            'name'          => __( 'Buying Sidebar Widgets', 'hji_themework' ),
            'description'   => __( 'Add widgets here that you want to appear in the Buyers Sidebar section.' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        register_sidebar( array(
            'id'            => 'selling-sidebar',
            'name'          => __( 'Selling Sidebar Widgets', 'hji_themework' ),
            'description'   => __( 'Add widgets here that you want to appear in the Selling sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        register_sidebar( array(
            'id'            => 'explore-austin-sidebar',
            'name'          => __( 'Explore Austin Sidebar Widgets', 'hji_themework' ),
            'description'   => __( 'Add widgets here that you want to appear on the pages in the "Explore Austin" drop-down section.' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s"><div class="widget-inner">',
      'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        register_sidebar( array(
            'id'            => 'relocation-page',
            'name'          => __( 'Relocation Page Widgets', 'hji_themework' ),
            'description'   => __( 'Add widgets here that you want to appear on the Relocation page' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s"><div class="widget-inner">',
          'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        register_sidebar( array(
            'id'            => 'meet-us-sidebar',
            'name'          => __( 'Meet Us Sidebar Widgets', 'hji_themework' ),
            'description'   => __( 'Add widgets here that you want to appear in the Meet Us Sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        register_sidebar( array(
            'id'            => 'buyers-page-sidebar',
            'name'          => __( 'Buyers Page Widgets', 'hji_themework' ),
            'description'   => __( 'Add widgets here that you want to appear on the Buyers page.' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        register_sidebar( array(
            'id'            => 'sellers-page-sidebar',
            'name'          => __( 'Sellers Page Sidebar Widgets', 'hji_themework' ),
            'description'   => __( 'Add widgets here that you want to appear on the Sellers page.' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        register_sidebar( array(
            'id'            => 'blog-sidebar',
            'name'          => __( 'Blog Sidebar Widgets', 'hji_themework' ),
            'description'   => __( 'Add widgets here that you want to appear on the Blog page.' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        register_sidebar( array(
            'id'            => 'search-all-homes-sidebar',
            'name'          => __( 'Search Homes Now Sidebar Widgets', 'hji_themework' ),
            'description'   => __( 'Add widgets here that you want to appear on the Search Homes Now page.' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));
        unregister_sidebar( 'idx-horizontal-search');
        unregister_sidebar( 'blvd-main-sidebarwidgets');
    }
    add_action( 'widgets_init', 'hji_schmitz_smith_widgets_init', 11 );
endif;

/**
 * Loading in the Caviar Dreams font
 */
if( !function_exists( 'hji_schmitz_smith_font_loader' ) ) :
    function hji_schmitz_smith_font_loader() {
        wp_enqueue_style( 'hji_schmitz_smith_font', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );
    }
    add_action( 'wp_enqueue_scripts', 'hji_schmitz_smith_font_loader' );
endif;

/**
 * Adding child theme js
 */
if( !function_exists( 'hji_schmitz_smith_enqueue_scripts' ) ) :
    function hji_schmitz_smith_enqueue_scripts() {
        wp_enqueue_script( 'hji_schmitz_smith_scripts', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), null, true );
    }
    add_action( 'wp_enqueue_scripts', 'hji_schmitz_smith_enqueue_scripts' );
endif;
