<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content">


	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php comments_template( '', true ); ?>

	<?php endwhile; // end of the loop. ?>
	
</div>
<?php get_template_part('footer'); ?>