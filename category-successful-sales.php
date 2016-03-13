<?php while ( have_posts() ) : the_post(); ?>
	
	<?php get_template_part( 'templates/entry', get_post_type() != 'post' ? get_post_type() : get_post_format() ); ?>

<?php endwhile; ?>

<?php get_template_part( 'templates/nav', 'below' ); ?>