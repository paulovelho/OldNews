
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="full-row">
	<header class="entry-header">
		<h2 class="entry-title">Imagem do mez</h2>
	</header><!-- .entry-header -->
</div>
<div class="row">
	<div class="col-md-7 imagem-do-mes-large">
		<?=	the_post_thumbnail("large"); ?>
	</div>

	<div class="col-md-5">
		<div class="entry-meta">
			<span class="category">Caderno Extra</span>
			<span class="date"><?php the_title(); ?></span>
		</div><!-- .entry-meta -->
		<div class="entry-content imagem-do-mes">
			<?php
				the_content(); 
			?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php
				$tags = get_the_tag_list("",", ");
			?>
			<div class="post-credito"><span class="autor"><?=get_the_author()?>,</span><br/> pela <a href="/agencia-secular-de-noticias" title="Agência Secular de Notícias"><span class="agencia">Agência Secular de Notícias</span></a>.</div>
			<div class="tags"><span class="t">Tags: </span><span class="i">[<?=$tags?>]</span></div><br/>
			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

		</footer><!-- .entry-meta -->

	</div>

</div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php

$current_id = get_the_ID();

// get imagens do mês
function getImagensMez($except){
	$imgs = [];
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 6,
		'cat' => 35,
		'no_found_rows' => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false
	);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();
		if($except == get_the_ID()) continue;
		array_push($imgs, array(
			"title" => get_the_title(),
			"id" => get_the_ID(),
			"link" => get_the_permalink(),
			"description" => get_the_excerpt(),
			"thumb" => get_the_post_thumbnail()
		));
	endwhile;

	if(count($imgs) == 6) array_pop($imgs);

	set_transient( 'imagens-do-mez', $news );
	return $imgs;
}

$imagens = get_transient('imagens-do-mez');
if(!$imagens) $imagens = getImagensMez($current_id);

?>

<div class="full-row outras-imagens top-line">
	<h4>Imagens de outros mezes</h4>
</div>
<div class="row outras-imagens">
	<?
	$index = 1;
	foreach ($imagens as $i) {
		?>
	<div class="col-md-4">
		<h3><?=$i["title"]?></h3>
		<a href="<?=$i["link"]?>" alt="<?=$i["description"]?>" title="<?=$i["description"]?>"><?=$i["thumb"]?></a>
	</div>
		<?
		if($index == 3) {
			echo "</div><div class='row outras-imagens'>";
		}
		$index ++;
	}
	?>
</div>
<br/><br/>
