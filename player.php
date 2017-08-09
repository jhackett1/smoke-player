<?php
/*
Plugin Name: Smoke Radio Player
Plugin URI: https://github.com/jhackett1/smoke-player
Description: The pop-out live player for Smoke Radio, with show metadata information. Automatically adds a link to the Radio main menu.
Version: 1.0.0
Author: Joshua Hackett
Author URI: http://joshuahackett.com
*/

// Flush URL rewrites on activation
// function player_rewrite_flush() {
//     player_add_rewrite_rules();
//     flush_rewrite_rules();
// }
// register_activation_hook( __FILE__, 'player_rewrite_flush' );

// Recognise /player in the URL
function player_add_rewrite_rules() {
  add_rewrite_rule('player','/index.php?player','top');
}
add_action('init', 'player_add_rewrite_rules');

// Wordpress recognises the 'player' var
function player_query_vars($vars) {
  $vars[] = 'player';
  return $vars;
}
add_filter('query_vars', 'player_query_vars');

// Assign player template template if the var is found
function player_template_include( &$wp ) {
  if (array_key_exists('player', $wp->query_vars)) {
    include 'player-template.php';
    exit();
  }
  return;
}
add_filter('parse_request', 'player_template_include');


// Now add a link to the right menu

add_filter('wp_nav_menu_items', 'player_menu_link', 10, 2);
function player_menu_link( $items, $args ) {
   if ($args->theme_location == 'main_radio') {
      $items .= <<<EOD
			<li class="radio"><a href="javascript: void(0)"
							 onclick="window.open('/player',
							'windowname1',
							'width=350, height=600');
							 return false;">Listen live</a></li>
EOD;
   }
   return $items;
}
