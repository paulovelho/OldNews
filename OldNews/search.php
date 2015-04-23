<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content" class="content-search">

	<div class="full-row">
		<h2 class="search-title">Busca nos arquivos por
		<?php /* Search Count */ 
		$allsearch = &new WP_Query("s=$s&showposts=-1"); 
		$key = esc_html($s, 1); 
		$count = $allsearch->post_count; 
		echo "<span>".$key."</span>";
		_e(' &mdash; '); 
		echo $count." resultados";
		wp_reset_query(); 
		?>
		</h2>
	</div>


<div class="row">
	<div class="col-md-8">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="full-row">
			<span class="category"><?php the_category() ?></span>
			<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

			<small><span class="sigdate">{</span>  <span class="post-comments"><?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?></span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ <?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>
			<div class="sentry"><?php the_excerpt(); ?></div>
			<div class="more"><span class="bigdate">{</span> <a href="<?php the_permalink() ?>"><?php _e('Read more', 'Detox')?> &#187; &#187;</a> <span class="bigdate">}</span></div>
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



