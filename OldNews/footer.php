
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
					<br/>
				</div>
				<div class="col-md-4">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column3') ) : ?>
					<?php endif; ?>
					<div class="badges">
						<a href="http://www.facebook.com/100anosatras">
							<img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="facebook" title="facebook" />
						</a>
						<a href="http://www.twitter.com/100anosatras">
							<img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="twitter" title="twitter" />
						</a><br/>
						<a href="http://www.100anosatras.com.br/feed/">
							<img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS" title="RSS" />
						</a>
						<a href="http://contacto.100anosatras.com.br/">
							<img src="<?php bloginfo('template_directory'); ?>/images/mail.png" alt="Contacto" title="Contacto" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>