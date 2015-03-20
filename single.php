<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="xxf1">
<?php if (function_exists('vp_get_thumb_url')) {  $thumb=vp_get_thumb_url($post->post_content, 'slider');}?><img src="<?php if ($thumb!='') echo $thumb; ?>" alt="<?php the_title(); ?>" />
<div class="xover">
<span class="macky"><?php the_category(', ') ?></span>
<h2><?php the_title(); ?></h2>

<small><span class="sigdate">{</span>  <span class="post-comments">
<?php comments_popup_link(__('No Comment', 'Detox'), __('1 Comment', 'Detox'), __('% Comments', 'Detox'), '', __('Closed', 'Detox')); ?>
</span> \ <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>
</div>
</div>

<div id="contentmiddle2">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<span class="macky"><?php the_category(', ') ?> <span class="big">{<?php comments_number('0', '1', '%' );?>}</span> <a href="#comments"><?php _e('Add your reply?', 'Detox'); ?></a></span>

<h1><?php the_title(); ?></h1>

<small><span class="sigdate">{</span> <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', ''); } else {echo "Tags: None";} }?> <?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ''; } ?> \ 
<?php the_time('M', 'Detox'); ?><span class="bigdate"><?php the_time('j', 'Detox'); ?> }</span></small>
 
<div class="entry">
<?php the_content(__('Read more', 'Detox'));?>
<div class="clearfix"></div><hr class="clear" />
<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
<?php edit_post_link('<h3>Edit</h3>','',' '); ?>
</div>

<div class="rel">
<div class="author"><?php the_author_posts_link(); ?></div>
<div class="spostinfo">
<div class="bypostauthor">
<?php if ( get_the_author_meta( 'description' ) ) :  ?>

<div id="author-description">
<h3><?php printf( esc_attr__( 'About %s' ), get_the_author() ); ?> :</h3>
<div class="author-avatar alignleft">
<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 60 ) ); ?>
</div>

<?php the_author_meta( 'description' ); ?>
<div class="more"><span class="bigdate">{</span> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'Tracks' ), get_the_author() ); ?></a> <span class="bigdate">}</span></div>
</div>
<?php endif; ?>
</div>
</div>
</div>

<div class="rell">
<h3><?php _e('Related', 'Detox'); ?></h3>
<?php 
$max_articles = 4; // How many articles to display 
echo '<ul>'; 
$cnt = 0; $article_tags = get_the_tags(); 
$tags_string = ''; 
if ($article_tags) { 
foreach ($article_tags as $article_tag) { 
$tags_string .= $article_tag->slug . ','; 
} 
} 
$tag_related_posts = get_posts('exclude=' . $post->ID . '&numberposts=' . $max_articles . '&tag=' . $tags_string); 
if ($tag_related_posts) { 
foreach ($tag_related_posts as $related_post) { 
$cnt++; 
echo '<li class="child-' . $cnt . '">'; 
echo '<a href="' . get_permalink($related_post->ID) . '">'; 
echo $related_post->post_title . '</a></li>'; 
} 
} 
// Only if there's not enough tag related articles, 
// we add some from the same category 
if ($cnt < $max_articles) { 
$article_categories = get_the_category($post->ID); 
$category_string = ''; 
foreach($article_categories as $category) { 
$category_string .= $category->cat_ID . ','; 
} 
$cat_related_posts = get_posts('exclude=' . $post->ID . '&numberposts=' . $max_articles . '&category=' . $category_string); 
if ($cat_related_posts) { 
foreach ($cat_related_posts as $related_post) { 
$cnt++; 
if ($cnt > $max_articles) break; 
echo '<li class="child-' . $cnt . '">'; 
echo '<a href="' . get_permalink($related_post->ID) . '">'; 
echo $related_post->post_title . '</a></li>'; 
} 
} 
} 
echo '</ul>'; 
?>
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

<?php comments_template(); ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'Detox'); ?></p>
<?php endif; ?>

<div class="post-navigation clear">
<div class="post-prev"><?php $prevPost = get_previous_post(); $prevthumbnail = get_the_post_thumbnail($prevPost->ID,array(80,97)); ?>
<?php previous_post_link('%link', '{ Previous Post }'); ?><?php previous_post_link('%link', $prevthumbnail); ?></div>

<?php // Display the thumbnail of the next post ?>
<div class="post-next"><?php $nextPost = get_next_post(); $nextthumbnail = get_the_post_thumbnail($nextPost->ID,array(80,97)); ?>
<?php next_post_link('%link', '{ Next Post }'); ?><?php next_post_link('%link', $nextthumbnail); ?></div>
</div>
                    
</div>
</div>

<?php get_template_part('rbar', 'Detox') ?>
<?php get_template_part('slide', 'Detox') ?>
<?php get_template_part('footer', 'Detox') ?>