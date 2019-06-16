<?php
/**
 * Utitlity functions
 * @package tacensi
 * @author tacensi
 * @version 1.3
 */

/**
 * Add page/post slug to the body class
 */
function tacensi_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'tacensi_slug_body_class' );

/**
  * remove unncessary header info
  */
function tacensi_remove_header_info() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'start_post_rel_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link' );

	//Remove emoji code
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	//Remove qTranslate Meta
	remove_action( 'wp_head','qtranxf_wp_head_meta_generator' );

	//Remove REST Api
	remove_action( 'wp_head', 'rest_output_link_wp_head' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

	// Remove welcome panel
	remove_action('welcome_panel', 'wp_welcome_panel');

}
add_action('init', 'tacensi_remove_header_info');


// tamanho do excerpt
// add_filter( 'excerpt_length', function ( $length ) {
// 	return 50;
// }, 999 );
