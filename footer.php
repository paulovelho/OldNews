</div>
<div id="s_footer">

<div class="col1">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('footer-column1') ) : ?>
		        
<h3><?php _e('Recently', 'Detox'); ?></h3>
<div class="cat">
<ul><?php wp_get_archives('type=postbypost&limit=8'); ?></ul>
</div>
<div class="sez"></div>

<?php endif; ?>
</div>

<div class="col2">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('footer-column2') ) : ?>

<h3><?php _e('Recently', 'Detox'); ?></h3>
<div class="cat">
<ul><?php wp_get_archives('type=postbypost&limit=8'); ?></ul>
</div>
<div class="sez"></div>

<?php endif; ?>
</div>

<div class="col2">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('footer-column3') ) : ?>

<h3><?php _e('Recently', 'Detox'); ?></h3>
<div class="cat">
<ul><?php wp_get_archives('type=postbypost&limit=8'); ?></ul>
</div>
<div class="sez"></div>

<?php endif; ?>
</div>

<div class="col3">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('footer-column4') ) : ?>
		        
<h3><?php _e('Recently', 'Detox'); ?></h3>
<div class="cat">
<ul><?php wp_get_archives('type=postbypost&limit=8'); ?></ul>
</div>
<div class="sez"></div>

<?php endif; ?>
</div>

</div>

<div id="xfront">
<?php get_template_part('front3', 'Detox') ?>
</div>

<div id="footer">

<div id="foo">	
<h1><?php bloginfo('name'); ?></h1>
</div>

<div id="navbarf">
<ul><?php wp_list_pages('title_li=&depth=1'); ?></ul>
</div>

<p><?php _e('Copyright', 'Detox'); ?> &copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?>  |  
<a title="Design by milo" href="http://3oneseven.com/">Design by milo</a> | 
<?php wp_loginout(); ?> | 
<a href="<?php bloginfo('rss2_url'); ?>" class="rss"><?php _e('Entries RSS', 'Detox'); ?></a> | 

<a href="<?php bloginfo('comments_rss2_url'); ?>" class="rss"><?php _e('Comments RSS', 'Detox'); ?></a> | 
<a href="#header" title="<?php _e('Jump to Page Top', 'Detox'); ?>"><?php _e('Top', 'Detox'); ?> &#8657;</a></p>
</div>

<?php wp_footer(); ?>

</body>
</html>