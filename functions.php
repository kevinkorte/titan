<?php

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
