<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content">
<?php 

//	$news = get_transient('home_news');
	if(!$news) $news = home_news();

?>
	<div class="row">
		<div class="col-md-12 manchete">
			<h2><?=$news["manchete"]["title"]?></h2>
				<span class="category"><?=$news["manchete"]["category"]?></span>
				<span class="date"><?=formatDate($news["manchete"]["time"])?></span>
			<p><?=$news["manchete"]["content"]?></p>
		</div>
	</div>

	<div class="home-categories">
	<?php
		$column = 1;
		foreach($news["cats"] as $n){
			if($column == 1){
				echo '<div class="row">';
			}
			?>
			<div class="col-md-4">
				<span class="category"><?=$n["category"]?></span>
				<span class="date"><?=formatDate($n["time"])?></span>
				<h4><?=$n["title"]?></h4>
				<p><?=$n["content"]?></p>
			</div>
			<?
			if($column == 3){
				echo '</div>';
				$column = 0;
			}
			$column++;
		}

		// 5 categories, adds one space:
		?>
			<div class="col-md-4">&nbsp;</div>
		</div>
	</div>
<?

/*
	foreach ($categories as $category) : ?>
		<?php query_posts('category_name='.$category->name.'&showposts=1'); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="entry multipost" id="post-<?php the_ID(); ?>">
			<?php the_date('','<span class="postinfo">','</span>'); ?>
			<div class="postheader">
				<span class="postinfo"><?php the_date('','<h2>','</h2>'); ?></span>
				<h1 class="typeface-js"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<span class="postinfo"><?php _e("Filed under:"); ?> <?php the_category(',') ?> — Posted by <?php the_author() ?> @ <?php the_time() ?> <?php edit_post_link(__('Edit This')); ?></span>
			</div>
			<?php the_content(__('(more...)')); ?>
			<div class="postfooter postinfo"><?php the_tags(__('Tags: '), ', ', ' — '); ?></div>
    	</div><!-- end Entry -->
    	<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	<?php endforeach; 
*/
	p_r($news);
?>

</div>
<?php get_template_part('footer'); ?>