<?php
/**
* This template is pulling in the appropriate sidebars on the category archive pages
*/

if ( is_category( 'successful-sales' ) ): ?>
  <div class="page-header">
    <h1 class="page-title">Successful Sales</h1>
  </div>
  <?php if( is_active_sidebar( 'selling-sidebar' ) ) : ?>
    <div class="custom-sidebar-wrapper hidden-xs hidden-sm col-md-3">
      <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'selling-sidebar' ); ?>
      </div>
    </div>
    <section class="page-content col-xs-12 col-md-9">
  <?php endif; ?>
<?php elseif( is_active_sidebar( 'blog-sidebar' ) ) : ?>
  <section class="page-content col-xs-12 col-md-9">
<?php else : ?>
  <section class="page-content col-xs-12">
<?php endif; ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'templates/entry' ); ?>
  <?php endwhile; ?>
  <?php get_template_part( 'templates/nav', 'below' ); ?>
  </section>
<?php if ( !is_category( 'successful-sales' ) && is_active_sidebar( 'blog-sidebar' ) ) : ?>
  <div class="blog-sidebar col-xs-12 col-md-3">
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar( 'blog-sidebar' ); ?>
    </div>
  </div>
<?php endif; ?>