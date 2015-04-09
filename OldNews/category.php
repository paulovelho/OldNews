<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<div id="content">
	<header class="page-header">
		<h1 class="page-title"><?php printf( single_cat_title( '', false )); ?></h1>

		<?php
			$category_description = category_description();
			if ( ! empty( $category_description ) ) {
				/**
				 * Filter the default Twenty Eleven category description.
				 *
				 * @since Twenty Eleven 1.0
				 *
				 * @param string The default category description HTML.
				 */
				echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
			}
		?>
	</header>

</div>
<?php get_template_part('footer'); ?>