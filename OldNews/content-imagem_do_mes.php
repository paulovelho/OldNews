
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


