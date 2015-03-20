<?php get_header(); ?>

<div id="contentmiddle2">

<?php if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="pagetitle"><?php echo single_cat_title(); ?> <?php _e('Posts', 'y2k'); ?></h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="pagetitle"><?php _e('Archive', 'y2k'); ?> <?php the_time('F jS, Y'); ?></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="pagetitle"><?php _e('Archive', 'y2k'); ?> <?php the_time('F, Y'); ?></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="pagetitle"><?php _e('Archive', 'y2k'); ?> <?php the_time('Y'); ?></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="pagetitle"><?php _e('Author Archive', 'y2k'); ?></h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="pagetitle"><?php _e('Blog Archive', 'y2k'); ?></h2>
<?php } ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post">
<span class="macky"><?php the_category(', ') ?></span>
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

<small><span class="sigdate">{</span>  <span class="post-comments">
<?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?>
</span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>
	
<div class="sentry">
<div class="f1">
<a href="<?php the_permalink() ?>" ><?php if (function_exists('vp_get_thumb_url')) {  $thumb=vp_get_thumb_url($post->post_content, 'slider');}?><img src="<?php if ($thumb!='') echo $thumb; ?>" alt="<?php the_title(); ?>" /></a>
</div>
<?php the_excerpt(); ?>
<div class="more"><span class="bigdate">{</span> <a href="<?php the_permalink() ?>"><?php _e('Read more', 'Detox')?> &#187; &#187;</a> <span class="bigdate">}</span></div>
</div>
</div>
<div class="sez"></div>

<div class="clearfix"></div><hr class="clear" />

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'Detox'); ?></p>
<?php endif; ?>

<div id="ad">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('singlebar') ) : ?>	
<h3><?php _e('Widgets', 'Detox'); ?></h3>
<img src="<?php echo get_template_directory_uri(); ?>/images/blog.png" alt="blogtimes" />
<?php endif; ?>
</div>

<div class="navigation">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi('', '', '', '', 3, false);} ?>
</div>

</div>

<div id="r_sidebar">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('archivebar') ) : ?>

<h3><?php _e('Tags', 'Detox'); ?></h3>
<div class="scat">
<?php wp_tag_cloud('smallest=13&largest=13&number=18&orderby=count'); ?>
</div>
<div class="sez"></div>

<h3><?php _e('Categories', 'Detox'); ?></h3>
<div class="cat">
<ul><?php wp_list_categories('orderby=id&show_count=0&sort_column=name&title_li=&depth=-1'); ?></ul>
</div>
	
<div class="sez"></div>
	
<h3><?php _e('Arch<span>ives</span>', 'Detox') ?></h3>
<div class="cat">
<ul><?php wp_get_archives('type=monthly&limit=8'); ?></ul>
</div>

<div class="sez"></div>

<h3><?php _e('Recently', 'Detox'); ?></h3>
<div class="cat">
<ul><?php wp_get_archives('type=postbypost&limit=8'); ?></ul>
</div>
<div class="sez"></div>

<?php endif; ?>
</div>

<?php get_template_part('footer', 'Detox') ?>