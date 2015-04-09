

<div class="full-row category-nav">
	<div>
<?php 
	$cats = getParentCategories();
	foreach ($cats as $c) {
		if($c->slug == "extra") continue;
		?>
		<span><a href="/caderno/<?=$c->slug?>"><?=$c->name?></a></span>
		<?
	}
?>
		<span><a href="/caderno/extra">Caderno Extra</a></span>
	</div>
</div>
