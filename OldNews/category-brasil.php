<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<?php
	$category_id = 3;
	$page_parent = 108;
	// página mãe
	$args = array(
		'post_parent' => $page_parent,
		'post_type'   => 'page', 
		'posts_per_page' => 1,
		'post_status' => 'publish',
		'orderby' => "menu_order" );
	$pages = get_posts($args);
	$page = array_pop($pages);

//	$news = get_transient('category_news-'.$category_id);
	if(!$news) $news = category_news($category_id);


?>


<div id="content">
	<header class="page-header">
		<h1 class="page-title">Brasil</h1>
	</header>

	<div class="row">
		<div class="col-md-8 category-page">
			<?=apply_filters('the_content', $page->post_content)?>
		</div>
		<div class="col-md-4">
			<?
				p_r($news);
			?>
		</div>
	</div>

</div>
<?php get_template_part('footer'); ?>