<?php
/**
 * Setup Functions
 *
 * @package tacensi
 * @author tacensi
 * @version 1.3
 */

function tacensi_setup() {

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	// Post Thumbnail
	add_theme_support( 'post-thumbnails' );

	// Deixa o WP se virar com o <title>
	add_theme_support( 'title-tag' );

	// Custom header
	// add_theme_support( 'custom-header' );

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Image sizes - Inserir tamanhos de imagrem
	add_image_size( 'huge', 3840, 3840, false ); // nome, largura, altura, crop
	add_image_size( 'bigger', 1920, 1920, false ); // nome, largura, altura, crop

	// menus
	register_nav_menus(
		array(
			'main' => 'Menu principal'
		)
	);

	//Auto Update
	add_filter( 'auto_update_core', '__return_true' );
	add_filter( 'auto_update_plugin', '__return_true' );
	add_filter( 'auto_update_theme', '__return_true' );

}
add_action( 'after_setup_theme', 'tacensi_setup' );


//Link home dinamica no menu
function tacensi_home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'tacensi_home_page_menu_args' );


///// Widgets par ao blog
function tacensi_widgets_init() {

	register_sidebar( array(
		'name'          => 'Widgets',
		'id'            => 'sidebar-1',
		'description'   => 'Barra lateral',
		'before_widget' => '<div id="%1$s" class="item-widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'tacensi_widgets_init' );
