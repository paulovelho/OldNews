<div class="x1fleft">
<div class="post <?php the_ID(); ?>">
<?php 
	$slidecat = get_option('BlogTimes_f1_category'); 
  $my_query = new WP_Query('showposts=1&offset=7');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="xf1">
<a href="<?php the_permalink() ?>" ><?php if (function_exists('vp_get_thumb_url')) {  $thumb=vp_get_thumb_url($post->post_content, 'slider');}?><img src="<?php if ($thumb!='') echo $thumb; ?>" alt="<?php the_title(); ?>" /></a>
<div class="xover">
<span class="macky"><?php the_category(', ') ?></span>
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

<small><span class="sigdate">{</span>  <span class="post-comments">
<?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?>
</span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>
	
<div class="sentry">
<?php the_excerpt(); ?>
<div class="more"><span class="bigdate">{</span> <a href="<?php the_permalink() ?>"><?php _e('Read more', 'Detox')?> &#187; &#187;</a> <span class="bigdate">}</span></div>
</div>
</div>
</div>

<?php endwhile; ?>
</div>
</div>