<?php

/**
* Adds the blog sidebar to the blog single posts
*/ 

while ( have_posts() ) : the_post(); ?>
	<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<div class="article-wrapper col-xs-12 col-md-9">
	<?php else : ?>
		<div class="article-wrapper col-xs-12">
	<?php endif; ?>
    	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        	<?php get_template_part( 'templates/entry', 'single' ); ?>
    	</article>
	</div>
	<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<div id="primary-sidebar" class="primary-sidebar widget-area col-xs-12 col-md-3" role="complementary">
    		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</div>
	<?php endif; ?>
<?php endwhile; ?>