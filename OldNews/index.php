<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content home">

<?php 
//	$news = get_transient('home_news');
	if(!$news) $news = home_news();

//	p_r($news);
?>
	<div class="row manchete">
		<div class="col-md-2">
			<span class="category"><?=$news["manchete"]["category"]?></span>
			<span class="date"><?=formatDate($news["manchete"]["time"])?></span>
		</div>
		<div class="col-md-10">
			<a href="<?=$news["manchete"]["link"]?>" title="<?=$news["manchete"]["title"]?>"><h2><?=$news["manchete"]["title"]?></h2></a>
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
			<div class="col-md-4 quadro">
				<span class="category"><?=$n["category"]?></span>
				<span class="date"><?=formatDate($n["time"])?></span>
				<?php
				if(!empty($n["thumb"])) { 
					echo "<a href='".$n["link"]."' title='".$n["title"]."'>";
					echo "<div class='thumb_container'>".$n["thumb"]."</div>";
					echo "<h3 class='thumb_title'>".$n["title"]."</h3>";
					echo "</a>";
				} else { 
					echo "<a href='".$n["link"]."' title='".$n["title"]."'><h3>".$n["title"]."</h3></a>";
				}
				?>
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
			<div class="col-md-4 quadro">&nbsp;</div>
		</div>
	</div>

	<div class="row extra1 home-categories">
		<div class="col-md-5 imagem-do-mes">
			<a href="<?=$news['imagem']['link']?>">
				<img src="<?=$news['imagem']['image']?>" alt="<?=$news["imagem"]["caption"]?>" title="<?=$news["imagem"]["caption"]?>" />
			</a>
		</div>
		<div class="col-md-3 imagem-do-mes">
			<span class="category">Caderno Extra</span>
			<h3>Imagem do mez</h3>
			<span class="date"><?=$news["imagem"]["title"]?></span><br/><br/>
			<p><?=$news["imagem"]["caption"]?></p>
		</div>

		<div class="col-md-4">
			<span class="category"><?=$news["extras"][0]["category"]?></span>
			<span class="date"><?=formatDate($news["extras"][0]["time"])?></span>
				<?php
				if(!empty($news['extras'][0]["thumb"])) { 
					echo "<a href='".$news['extras'][0]["link"]."' title='".$news['extras'][0]["title"]."'>";
					echo "<div class='thumb_container'>".$news['extras'][0]["thumb"]."</div>";
					echo "<h3 class='thumb_title'>".$news['extras'][0]["title"]."</h3>";
					echo "</a>";
				} else { 
					echo "<a href='".$news['extras'][0]["link"]."' title='".$news['extras'][0]["title"]."'><h3>".$news['extras'][0]["title"]."</h3></a>";
				}
				?>
			<p><?=$news["extras"][0]["content"]?></p>
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
//	p_r($news);
?>

</div>
<?php get_template_part('footer'); ?>