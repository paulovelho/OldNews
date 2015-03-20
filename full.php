<?php
/*
Template Name: fullwidth template
*/
?>
<?php get_header(); ?>

<div id="contentfull">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1><?php the_title(); ?></h1>

<div class="entry">
<?php the_content(__('Read more', 'Detox'));?>
<div class="clearfix"></div><hr class="clear" />
<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
<?php edit_post_link('<h3>Edit</h3>','',' '); ?>
</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'Detox'); ?></p>
<?php endif; ?>
</div>

<?php get_template_part('footer', 'Detox') ?>