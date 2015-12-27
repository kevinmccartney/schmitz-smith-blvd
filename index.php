<?php

/**
 * This template is pulling in the appropriate sidebars on the category archive pages
*/

?>

<?php if ( is_category( 'successful-sales' ) ): ?>

    <div class="page-header">
	  
	    <h1 class="page-title">Successful Sales</h1>
	  
    </div>

    <div class="custom-sidebar-wrapper hidden-xs hidden-sm col-md-3">

        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">

          <?php dynamic_sidebar( 'selling-sidebar' ); ?>

        </div>

    </div>

<?php endif; ?>

<section class="page-content col-sm-12 col-md-9">

  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'templates/entry' ); ?>

  <?php endwhile; ?>

  <?php get_template_part( 'templates/nav', 'below' ); ?>

</section>

<?php if ( is_category( 'successful-sales' ) ): ?>

<!-- do nothing -->

<?php else: ?>

    <div class="successful-sales-sidebar hidden-xs hidden-sm col-md-3">';

        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">

          <?php dynamic_sidebar( 'blog-sidebar' ); ?>

        </div>

    </div>

<?php endif; ?>
