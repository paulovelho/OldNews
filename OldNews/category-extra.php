<?php get_template_part("oldnews") ?>
<?php get_header(); ?>

<?php

$news = home_extra();
//p_r($news);

?>

<div id="content">
	<header class="page-header">
		<h1 class="page-title">+ Mais</h1>
	</header>
	<div class="row">
		<div class="col-md-6 line-title">
			<hr/>
			<h2>Imagem do mez</h2>
			<a href="<?=$news["image-mes"]["link"]?>" title="<?=$news["image-mes"]["description"]?>">
			<?=$news["image-mes"]["thumb"]?><br/>
			<p><?=$news["image-mes"]["title"]?></p>
			</a>
		</div>
		<div class="col-md-3 classificados">
			<h2>Classificados</h2>
			<h3><?=$news["classificados"][0]["title"]?></h3>
			<p><?=$news["classificados"][0]["content"]?></p>
			<hr/>
			<h3><?=$news["classificados"][1]["title"]?></h3>
			<p><?=$news["classificados"][1]["content"]?></p>
			<hr/>
		</div>
		<div class="col-md-3 anuncio">
			<?=$news["anuncio"][0]?><br/><br/>
			<?=$news["anuncio"][1]?><br/>
		</div>
	</div>

</div>
<?php get_template_part('footer'); ?>