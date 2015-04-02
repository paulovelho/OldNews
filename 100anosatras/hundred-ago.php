<?php
/**
 * Plugin Name: 100 anos atrás
 * Plugin URI: http://www.100anosatras.com.br
 * Description: Plugin for blog 100 anos atrás
 * Version: 0.1
 * Author: Platypus Technology
 * Author URI: http://www.platypusweb.com.br
 * License: Free
 */

/*
// not working
 unction hundred_years_in_permalink($permalink, $post) {
	$year100 = (get_the_date("Y", $post)-100);

	return str_replace('%year-hundred%', $year100, $permalink);
}

function hundred_years_rules(){
//	add_rewrite_rule("/([^/]*)/([^/]*)/([^/^;]*);([0-9]+)", "index.php?p=$matches[4]");
}

add_action( 'init', 'hundred_years_rules', 10 );
add_filter('post_link', 'hundred_years_in_permalink', 10, 2);

*/

?>