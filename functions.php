<?php

/*
Adds an Available Column on the Specs admin table, showing the homes availability
and what day it's set to remove from the site
POST TYPE = spec
*/
add_filter('manage_edit-spec_columns', 'available_column');
function available_column($column) {
    $column['available'] = 'Available';
    return $column;
}
add_action('manage_posts_custom_column',  'show_available_columns');
function show_available_columns($name) {
    global $post;
    switch ($name) {
        case 'available':
          $available = get_post_meta($post->ID, 'is_available');
          if( $available[0] == "0" ) {
            echo 'Available';
          } elseif ( $available[0] == "1" ) {
            echo 'Sold';
          } elseif ( $available[0] == "2" ) {
            $date_until = get_post_meta($post->ID, 'date_available_to');
            $date_parsed = date_parse($date_until[0]);
            $html = 'Under Contract <br /> Removed after: ';
            $html .= $date_parsed['month'].'/'.$date_parsed['day'].'/'.$date_parsed['year'];
            echo $html;
          } else {
            echo '';
          }
    }
}
//require_once 'C:\xampp\htdocs\titan\algoliasearch.php';



// function post_published ( $ID, $post ) {
//
//   // var_dump($ID);
//   // var_dump($post);
//   // die();
//
//   $client = new \AlgoliaSearch\Client("App ID", "Admin API Key");
//
//   $index = $client->initIndex('models');
//
//   $index->setSettings(
//       [
//           'attributesToIndex' => [
//               'address',
//               'bedrooms',
//           ]
//       ]
//   );
//   $res = $index->addObject([
//       'id' => $post->ID,
//       'address' => $post->post_title,
//       'bedrooms' => get_field( 'bedrooms',  $post->ID )
//   ]);
// }
// add_action( 'publish_model', 'post_published', 10, 2 );

function add_scripts_and_styles() {

  wp_enqueue_style('main', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'add_scripts_and_styles');

function register_my_menu() {
  register_nav_menu( 'header-menu', __( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu');

add_theme_support( 'post-thumbnails' );
