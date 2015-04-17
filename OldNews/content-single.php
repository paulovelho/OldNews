
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<span class="category"><?php $cat = get_the_category(); echo $cat[0]->name; ?></span>
			<span class="date"><?php echo formatDatePost(get_the_time("Y-m-d")); ?></span>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			$tags = get_the_tag_list("",", ");
		?>
		<div class="post-credito"><span class="autor"><?=get_the_author()?>,</span><br/> pela <a href="/agencia-secular-de-noticias" title="Agência Secular de Notícias"><span class="agencia">Agência Secular de Notícias</span></a>.</div>
		<div class="tags"><span class="t">Tags: </span><span class="i">[<?=$tags?>]</span></div><br/>
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->