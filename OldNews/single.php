<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content">

<?php 
while ( have_posts() ) : the_post();

	$category = get_the_category();
	$parent = $category[0]->category_parent;

	switch ($parent) {
		case 21: // EXTRA
			include(TEMPLATEPATH."/single-extra.php");
			break;	
		default:
			include(TEMPLATEPATH."/single-default.php");
			break;
	}


endwhile;
?>


</div>
<?php get_template_part('footer'); ?>