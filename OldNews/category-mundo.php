<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<?php
	$category_id = 2;
	$page_id = 112;
	$page = get_post($page_id);
?>

<div id="content">
	<header class="page-header">
		<h1 class="page-title">Mundo</h1>
	</header>

	<div class="row">
		<div class="col-md-8 category-page">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="page">
					<?=apply_filters('the_content', $page->post_content)?>
				</div>
			</article>
		</div>
		<div class="col-md-4 category-side">
			<ul>
			<?
			$news = get_transient('category_news-'.$category_id);
			if(!$news) $news = category_news($category_id);
			foreach ($news as $n) {
				?>
			<li>
                <div class="oldnews-post-small-thumbnail">
                    <?php if ( $n["has_thumb"] ) { echo '<a href="'.$n["link"].'" class="oldnews-thumbnail-link">'.$n["thumb"].'</a>'; } ?>
                    <div class="oldnews-post-header">
	     	    		<span class="oldnews-post-date"><?php echo formatDatePost($n["time"]) ?></span><br/>
        		    	<a href="<?=$n["link"]?>" class="oldnews-header-link"><?=$n["title"]?></a>
                    </div>
                </div>
			</li>
				<?
			}
			?>
			</ul>
		</div>
	</div>

</div>
<?php get_template_part('footer'); ?>