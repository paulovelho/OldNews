<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content">

<div class="row">
	<div class="col-md-9">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php comments_template( '', true ); ?>

		<?php endwhile; // end of the loop. ?>
	</div>
	<div class="col-md-3">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
			<h3><?php _e('Widgetized', 'OldNews') ?></h3>
		<?php endif; ?>
	</div>
</div>

</div>
<?php get_template_part('footer'); ?>