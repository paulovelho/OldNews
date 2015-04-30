<?php
	$category = get_the_category();
	$cat_id = $category[0]->cat_ID;

?>

<div class="full-row content-extra">
	<?php
		switch ($cat_id) {
			case 35:
				get_template_part( 'content', 'imagem_do_mes' );
				break;
			default:
				get_template_part( 'content', 'single' );
				break;
		}
		comments_template( '', true );
	?>
</div>
