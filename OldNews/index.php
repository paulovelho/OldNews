<?php get_template_part("oldnews") ?>
<?php get_header(); ?>
<div id="content">

<?php 


//	$news = get_transient('home_news');
	if(!$news) $news = home_news();
	p_r($news);

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
?>

</div>
<?php get_template_part('footer'); ?>