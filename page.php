<?php get_header(); ?>

<div id="contentmiddle2">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<span class="macky">You are here: <a href="<?php home_url(); ?>/" title="home"><?php _e('Home', 'Detox'); ?></a> | <?php the_title(); ?></span>

<h1><?php the_title(); ?></h1>

<small><span class="sigdate">{</span> <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "Tags: None";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>
 
<div class="entry">
<?php the_content(__('Read more', 'Detox'));?>
<div class="clearfix"></div><hr class="clear" />
<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
<?php edit_post_link('<h3>Edit</h3>','',' '); ?>
</div>

<div class="clearfix"></div><hr class="clear" />

<div id="ad">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('singlebar') ) : ?>	
<h3><?php _e('Widgets', 'Detox'); ?></h3>
<img src="<?php echo get_template_directory_uri(); ?>/images/blog.png" alt="blogtimes" />
<?php endif; ?>
</div>

<div class="clearfix"></div><hr class="clear" />

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'Detox'); ?></p>
<?php endif; ?>

<div class="post-navigation clear">
<div class="post-prev"><?php previous_post_link(); ?></div> 
<div class="post-next"><?php next_post_link(); ?></div>
</div>

</div>
</div>
<?php get_template_part('rbar', 'Detox') ?>
<?php get_template_part('slide', 'Detox') ?>
<?php get_template_part('footer', 'Detox') ?>