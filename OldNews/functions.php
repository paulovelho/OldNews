<?php

// adding post support
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 400, 200, array("center", "center") );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'post-thumb', 100, 100, array("center", "center") );
}

add_post_type_support( '{{post_type}}', 'simple-page-sidebars' );


register_sidebars( 1,
	array(
		'name' => __('Post widget', 'OldNews'),
		'id' => 'sidebar',
		'description' => __('The single bar widget area for your single posts.', 'OldNews'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) 
);
register_sidebars( 1,
	array(
		'name' => __('Footer widget - Column 1', 'OldNews'),
		'id' => 'footer-column1',
		'description' => __('Column 1 for footer.', 'OldNews'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) 
);
register_sidebars( 1,
	array(
		'name' => __('Footer widget - Column 2', 'OldNews'),
		'id' => 'footer-column2',
		'description' => __('Column 1 for footer.', 'OldNews'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) 
);
register_sidebars( 1,
	array(
		'name' => __('Footer widget - Column 3', 'OldNews'),
		'id' => 'footer-column3',
		'description' => __('Column 1 for footer.', 'OldNews'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) 
);


function p_r($data){
	echo "<pre>"; print_r($data); echo "</pre>";
}

function giveMeWeek($n){
	$dias_semana = array("domingo", "segunda-feira", "terça-feira", "quarta-feira", "quinta-feira", "sexta-feira", "sábado");
	return $dias_semana[$n];
}
function giveMeMonth($n){
	$meses = array("", "janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro");
	return $meses[$n];	
}

function show100yearsAgoDate(){
	$HundredAgo = mktime(0, 0, 0, date("m"), date("d"), date("Y")-100);
	echo "Hoje é ".giveMeWeek(strftime('%w', $HundredAgo)).strftime(", %d de ", $HundredAgo).giveMeMonth(intval(strftime('%m', $HundredAgo))).strftime(' de %Y', $HundredAgo);
}


function formatDatePost($data){
	$data = explode("-", $data);
	return $data[2]." de ".giveMeMonth(intval($data[1]))." de ".($data[0]-100);
}


function formatDate($data){
	$data = explode("-", $data);
	return $data[2]." de ".giveMeMonth(intval($data[1]))." de ".$data[0];
}


function getParentCategories(){
	$args = array(
		'orderby' => 'name',
		'order' => 'ASC',
		'taxonomy' => 'category',
		'child_of' => 0
	);
	$categories = get_categories( $args );
	return $categories;
}

function getArrCategories(){
	return array(
		3 => "Brasil", 
		6 => "Ciências",
		4 => "Cultura",
		5 => "Esportes",
		2 => "Mundo"
	);
}


function category_news($catID){
	$news = [];
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 6,
		'cat' => $catID,
		'no_found_rows' => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'orderby' => 'most_recent'
	);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();
		array_push($news, array(
			"title" => get_the_title(),
			"id" => get_the_ID(),
			"time" => get_the_date('Y-m-d'),
			"link" => get_the_permalink(),
			"has_thumb" => has_post_thumbnail(get_the_ID()),
			"thumb" => get_the_post_thumbnail(get_the_ID(), "post-thumb" )
		));
	endwhile;

	set_transient( 'category_news-'.$catID, $news );
	return $news;
}


/**
 * @package WordPress
 * @subpackage Portfolio Press
 *
 * Loops over each of the terms in the custom taxonomy "portfolio_categories"
 * and retrieves the first post from each.  Since this is an expensive
 * request the result is built into an array and saved as a transient.
 */
function home_news() {
	$categories = getArrCategories();
//	p_r($categories);

	$home_news = array();
	$home_news["extras"] = array();
	$home_news["cats"] = array();
	$home_news["imagem"] = null;
	
	/* Pulls the first post from each of the individual portfolio categories */
	$news = array();
	foreach ($categories as $cat_id => $cat_name) {
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 4,
			'cat' => $cat_id,
			'no_found_rows' => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'orderby' => 'most_recent'
		);
		$the_query = new WP_Query( $args );

		// The Loop
		while ( $the_query->have_posts() ) : $the_query->the_post();
			/* All the data pulled is saved into an array which we'll save later */
			$news[get_the_date('Ymdhis')] = array(
				'category' => $cat_name,
				'id' => get_the_ID(),
				'title' => get_the_title(),
				'time' => (get_the_date('Y')-100).get_the_date('-m-d'),
				'link' => get_the_permalink(),
				'content' => get_the_excerpt(),
				'thumb' => get_the_post_thumbnail()
			);
		endwhile;
    }
	// Reset Post Data
	wp_reset_postdata();
    ksort($news);
    $news = array_reverse($news);

    // I have the news, let's organize it:
	foreach ($news as $n) {
		if(empty($home_news["manchete"])){
			// newest one is head:
			$home_news["manchete"] = $n;
		} else {
			if(empty($home_news["cats"][$n["category"]])){
				$home_news["cats"][$n["category"]] = $n;
			} else {
				array_push($home_news["extras"], $n);
			}
		}
	}
	
	// get the last image of the month:
	// imagem do mês, categoria_id = 35
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 1,
		'cat' => 35	);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$home_news["imagem"] = array(
			'id' => get_the_ID(),
			'title' => get_the_title(),
			'link' => get_the_permalink(),
			'caption' => get_the_excerpt(),
			'image' => wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), "large") )
		);
	endwhile;
	// Reset Post Data
	wp_reset_postdata();

	set_transient( 'home_news', $home_news );
	return $home_news;
}

function home_extra(){
	$news = [];
	// imagem do mez:
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 1,
		'cat' => 35,
		'no_found_rows' => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'orderby' => 'most_recent'
	);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$news["image-mes"]["title"] = get_the_title();
		$news["image-mes"]["link"] = get_the_permalink();
		$news["image-mes"]["thumb"] = get_the_post_thumbnail(get_the_ID(), 'large');
		$news["image-mes"]["description"] = get_the_excerpt();
	endwhile;

	// classificados
	// anuncio:
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 2,
		'cat' => 37,
		'no_found_rows' => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'orderby' => 'rand'
	);
	$the_query = new WP_Query( $args );
	$news["classificados"] = array();
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$classificado = [];
		$classificado["title"] = get_the_title();
		$classificado["content"] = get_the_content();
		array_push($news["classificados"], $classificado);
	endwhile;

	// anuncio:
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 2,
		'cat' => 66,
		'no_found_rows' => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'orderby' => 'rand'
	);
	$the_query = new WP_Query( $args );
	$news["anuncio"] = array();
	while ( $the_query->have_posts() ) : $the_query->the_post();
		array_push($news["anuncio"], get_the_post_thumbnail(get_the_ID(), 'large'));
	endwhile;

	return $news;
}

/**
 * Deletes the home_news transient if a portfolio post is updated
 */
function news_save( $post_id, $post ) {
	// If this is an auto save routine don't do anyting
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	delete_transient( 'home_news' );
	// brasil:
	delete_transient( 'category_news-3' );
	// mundo:
	delete_transient( 'category_news-2' );
	// esportes:
	delete_transient( 'category_news-5' );
	// ciências:
	delete_transient( 'category_news-6' );
	// cultura:
	delete_transient( 'category_news-4' );
	// imagens do mez:
	delete_transient( 'imagens-do-mez' );
}
add_action('save_post', 'news_save', 10, 2 );

?>