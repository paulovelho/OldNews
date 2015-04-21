
<div class="row">
	<div class="col-md-9">
		<?php 
			get_template_part( 'content', 'single' );
			comments_template( '', true ); 
		?>
	</div>
	<div class="col-md-3">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
			<h3><?php _e('Widgetized', 'OldNews') ?></h3>
		<?php endif; ?>
	</div>
</div>

