<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content">

<div class="row">
	<div class="col-md-9 creditos">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>
		<hr/>
		<h1>Realização</h1>
		<div class="row">
			<div class="col-md-6">
				<h4>Produção:</h4>
				<img src="<?php bloginfo('template_directory'); ?>/images/black_one.png" alt="Paulo Velho" title="Paulo Velho" /><br/>
				<a href="http://twitter.com/paulovelho">@paulovelho</a><br/>
				<a href="http://blog.paulovelho.com.br">blog.paulovelho.com.br</a>
			</div>
			<div class="col-md-6">
				<h4>Desenvolvimento:</h4>
				<img src="<?php bloginfo('template_directory'); ?>/images/platypus.png" alt="Platypus Technology" title="Platypus Technology" /><br/>
				<a href="http://www.platypusweb.com.br/">Platypus Technology</a>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		&nbsp;
	</div>
</div>

</div>
<?php get_template_part('footer'); ?>