<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content">

<div class="row">
	<div class="col-md-9">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php comments_template( '', true ); ?>

		<?php endwhile; // end of the loop. ?>
	</div>
	<div class="col-md-3">
		&nbsp;
	</div>
</div>

</div>
<?php get_template_part('footer'); ?>