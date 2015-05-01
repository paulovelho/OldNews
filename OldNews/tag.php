<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content" class="content-search">

	<div class="full-row">
		<h2 class="search-title">Tags relacionadas:
		<?php /* Search Count */ 
		echo "<span>[".single_tag_title(null, false)."]</span>";
		_e(' &mdash; '); 
		echo $count." resultados";
		wp_reset_query(); 
		?>
		</h2>
	</div>


<div class="row">
	<div class="col-md-8">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="row search-result">
				<div class="col-md-4 right">
					<span class="category"><?php $cat = get_the_category(); echo $cat[0]->name; ?></span>
					<span class="date"><?php echo formatDatePost(get_the_time("Y-m-d")); ?></span>
				</div>
				<div class="col-md-8">
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<div class="sentry"><?php the_excerpt(); ?></div>
					<div class="read-all right">
						<a href="<?php the_permalink() ?>">Leia notícia completa</a>
					</div>
				</div>

			</div>
		<?php endwhile; else: ?>
		<p>Nada foi encontrado em nossos arquivos!</p>
		<?php endif; ?>
		</div>

		<div class="postspace"></div>
		<div class="clearfix"></div><hr class="clear" />
		<div class="navigation">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi('', '', '', '', 3, false);} ?>
		</div>
	</div>

	<div class="col-md-4">&nbsp;</div>
</div>
<?php get_template_part('footer'); ?>



