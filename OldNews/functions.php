<?php

// adding post support
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 400, 200, array("center", "center") );

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



function formatDate($data){
	$data = explode("-", $data);
	return $data[2]." de ".giveMeMonth(intval($data[1]))." de ".$data[0];
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
	/* Retrieves all the terms from the taxonomy portfolio_category
	 *  http://codex.wordpress.org/Function_Reference/get_categories
	 */

	$args = array(
		'orderby' => 'name',
		'order' => 'ASC',
		'taxonomy' => 'category');

	$categories = get_categories( $args );
//	p_r($categories);

	$news = array();
	$home_news = array();
	$home_news["extras"] = array();
	$home_news["cats"] = array();
	
	/* Pulls the first post from each of the individual portfolio categories */
	foreach( $categories as $category ) {
	
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 2,
			'cat' => $category->cat_ID,
			'no_found_rows' => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false
		);
		$the_query = new WP_Query( $args );

		// The Loop
		while ( $the_query->have_posts() ) : $the_query->the_post();
			/* All the data pulled is saved into an array which we'll save later */

			$news[get_the_date('Ymd')] = array(
				'category' => $category->name,
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
	
	set_transient( 'home_news', $home_news );
	return $home_news;
}

/**
 * Deletes the home_news transient if a portfolio post is updated
 */
function news_save( $post_id, $post ) {

	// If this is an auto save routine don't do anyting
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;

	delete_transient( 'home_news' );
	
}
add_action('save_post', 'news_save', 10, 2 );


?>