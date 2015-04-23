
<?php /* "Mumbling around" */ ?> 
	</div>
	<div class="clear"></div>
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column1') ) : ?>
					<?php endif; ?>
				</div>
				<div class="col-md-4">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column2') ) : ?>
					<?php endif; ?>
				</div>
				<div class="col-md-4">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column3') ) : ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>