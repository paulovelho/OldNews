<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />	

<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?> | <?php bloginfo('description'); ?></title>

<!-- 100anosatras -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Cardo|UnifrakturMaguntia' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/ico" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />

<!-- wp -->
<?php wp_head(); ?>
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
</head>

<body <?php body_class(); ?>>

<div id="navi">
	<div id="menu">
		<div class="clock">
			<?=show100yearsAgoDate()?>
		</div>
	</div>
	
	<div id="header">
		<div class="head">
			<h1><a href="<?php home_url(); ?>/"><?php bloginfo('name'); ?></a></h1> 
			<div class="description"><?php bloginfo('description'); ?></div>
		</div>
		<div id="cat">
			<div id="search">
				<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" class="searchFolder" name="s" id="s" placeholder="buscar..." />
				</form>
			</div>
		</div>
	</div>
</div>


