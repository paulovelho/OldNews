<div class="fleft">
<div class="post <?php the_ID(); ?>">
<?php 
	$slidecat = get_option('BlogTimes_f1_category'); 
  $my_query = new WP_Query('showposts=1&offset=0');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

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

<?php endwhile; ?>
</div>
</div>

<div class="fmiddle">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('top-column1') ) : ?>
		        
<?php 
	$slidecat = get_option('BlogTimes_f2_category'); 
  $my_query = new WP_Query('showposts=1&offset=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="post <?php the_ID(); ?>">
<span class="macky"><?php the_category(', ') ?></span>
<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

<small><span class="sigdate">{</span>  <span class="post-comments">
<?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?>
</span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>

<div class="entry">
<?php the_excerpt(); ?>
<div class="more"><span class="bigdate">{</span> <a href="<?php the_permalink() ?>"><?php _e('Read more', 'Detox')?> &#187; &#187;</a> <span class="bigdate">}</span></div>
</div>
</div>
<?php endwhile; ?>

<?php endif; ?>
</div>

<div class="fright">	
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('top-column2') ) : ?>
            
<span class="macky"><?php _e('Interest', 'Detox'); ?></span>

<div id="slide">

<h4>
<a href="javascript:hightlighted('switch1', 'link1');" class="hightlighted_down" id="link1" title="<?php _e('View about', 'Detox'); ?>" ><?php _e('About', 'Detox'); ?></a> 
<a href="javascript:hightlighted('switch2', 'link2');" class="hightlighted" id="link2" title="<?php _e('Popular', 'Detox'); ?>"><?php _e('Popular', 'Detox'); ?></a>
<a href="javascript:hightlighted('switch3', 'link3');" class="hightlighted" id="link3" title="<?php _e('View Tags', 'Detox'); ?>"><?php _e('Tags', 'Detox'); ?></a>
</h4>
<div style="display:block;" id="switch1">

<?php query_posts('pagename=about');?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="entry">
<div class="alignright"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 60 ) ); ?></div>
<?php the_excerpt(); ?>
</div>
<?php endwhile; endif; ?>

</div>

<div id="switch2" style="display: none;">

<?php query_posts('orderby=comment_count&posts_per_page=3'); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<span class="macky"><?php the_category(', ') ?></span>
<h3><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<small><span class="sigdate">{</span>  <span class="post-comments">
<?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?>
</span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>
<div class="sez"></div>
<?php endwhile; ?>
<?php else : ?>
<p><?php _e('Sorry, no posts were found.', 'Detox'); ?></p>
<?php endif; ?>

</div>

<div id="switch3" style="display: none;">
<div id="simtag2">
<?php wp_tag_cloud('smallest=8&largest=22&number=30&orderby=count'); ?>
</div>
</div>

</div>

<?php endif; ?>
</div>

<div id="middle">

<div class="left-col">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('top-column3') ) : ?>
            
<?php 
	$slidecat = get_option('BlogTimes_f4_category'); 
  $my_query = new WP_Query('showposts=2&offset=2');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="post <?php the_ID(); ?>">
<span class="macky"><?php the_category(', ') ?></span>
<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

<small><span class="sigdate">{</span>  <span class="post-comments">
<?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?>
</span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>

<div class="entry">
<?php the_excerpt(); ?>
<div class="more"><span class="bigdate">{</span> <a href="<?php the_permalink() ?>"><?php _e('Read more', 'Detox')?> &#187; &#187;</a> <span class="bigdate">}</span></div>
</div>
<div class="sez"></div>
</div>
<?php endwhile; ?>

<?php endif; ?>
</div>

<div class="right-col">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('top-column4') ) : ?>
            
<?php 
	$slidecat = get_option('BlogTimes_f5_category'); 
  $my_query = new WP_Query('showposts=2&offset=4');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="post <?php the_ID(); ?>">
<span class="macky"><?php the_category(', ') ?></span>
<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

<small><span class="sigdate">{</span>  <span class="post-comments">
<?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?>
</span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>

<div class="entry">

<?php the_excerpt(); ?>
<div class="more"><span class="bigdate">{</span> <a href="<?php the_permalink() ?>"><?php _e('Read more', 'Detox')?> &#187; &#187;</a> <span class="bigdate">}</span></div>
</div>
<div class="sez"></div>
</div>
<?php endwhile; ?>

<?php endif; ?>
</div>

</div>

<div id="lbar">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('top-column5') ) : ?>
		        
<?php 
	$slidecat = get_option('BlogTimes_f2_category'); 
  $my_query = new WP_Query('showposts=2&offset=6');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="post <?php the_ID(); ?>">
<span class="macky"><?php the_category(', ') ?></span>
<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

<small><span class="sigdate">{</span>  <span class="post-comments">
<?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?>
</span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>

<div class="entry">

<?php the_excerpt(); ?>
<div class="more"><span class="bigdate">{</span> <a href="<?php the_permalink() ?>"><?php _e('Read more', 'Detox')?> &#187; &#187;</a> <span class="bigdate">}</span></div>
</div>
<div class="sez"></div>
</div>
<?php endwhile; ?>

<?php endif; ?>
</div>

<div id="r_sidebar">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('top-column6') ) : ?>

<span class="macky"><?php _e('Inside', 'Detox'); ?> <?php bloginfo('name'); ?></span>

<h3><?php _e('Recently', 'Detox'); ?></h3>
<div class="cat">
<ul><?php wp_get_archives('type=postbypost&limit=8'); ?></ul>
</div>
<div class="sez"></div>

<h3><?php _e('Tags', 'Detox'); ?></h3>
<div class="scat">
<?php wp_tag_cloud('smallest=13&largest=13&number=18&orderby=count'); ?>
</div>
<div class="sez"></div>

<h3><?php _e('Categories', 'Detox'); ?></h3>
<div class="cat">
<ul><?php wp_list_categories('orderby=id&show_count=0&sort_column=name&title_li=&depth=-1'); ?></ul>
</div>
	
<?php endif; ?>
</div>

<div id="front">
<?php get_template_part('front2', 'Detox') ?>
</div>

<div class="x1">
<div class="post <?php the_ID(); ?>">
<?php 
	$slidecat = get_option('BlogTimes_f1_category'); 
  $my_query = new WP_Query('showposts=1&offset=0');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

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

<?php endwhile; ?>
</div>
</div>

<div class="x2">		        
<?php 
	$slidecat = get_option('BlogTimes_f2_category'); 
  $my_query = new WP_Query('showposts=1&offset=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="post <?php the_ID(); ?>">
<span class="macky"><?php the_category(', ') ?></span>
<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

<small><span class="sigdate">{</span>  <span class="post-comments">
<?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?>
</span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>

<div class="entry">
<?php the_excerpt(); ?>
<div class="more"><span class="bigdate">{</span> <a href="<?php the_permalink() ?>"><?php _e('Read more', 'Detox')?> &#187; &#187;</a> <span class="bigdate">}</span></div>
</div>
</div>
<?php endwhile; ?>
</div>

<div class="x3">	          
<h3><?php _e('Arch<span>ives</span>', 'Detox') ?></h3>
<div class="cat">
<ul><?php wp_get_archives('type=monthly&limit=8'); ?></ul>
</div>
</div>