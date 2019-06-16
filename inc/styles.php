<?php
/**
 * Style functions for theme
 *
 * @package tacensi
 * @author tacensi
 * @version 1.3
 */
/**
 * Registering scripts and styles
 */
function tacensi_register_css_js(){

	// JQuery from Google
	wp_enqueue_script( 'mainjs', get_stylesheet_directory_uri() . '/js/main.js', null, 'v=1.3.0', true );

	wp_enqueue_style( 'tacensi-style', get_stylesheet_directory_uri() . '/css/style.css', false, 'v1.0' );
}
add_action( 'wp_enqueue_scripts', 'tacensi_register_css_js' );


/**
 * Login Customization
 */
function tacensi_login_logo() { ?>
<style type="text/css">
body.login { background-color: #003764; }
body.login div#login h1 a {
	background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png) no-repeat 0 0;
	height: 100px;
	margin-left: auto;
	margin-right: auto;
	width: 295px;
}
.login #nav a,
.login #backtoblog a {
	color: #fff !important;
	text-shadow: none;
}
.login #nav a:hover,
.login #backtoblog a:hover { color: #003764 !important }
.wp-core-ui .button-primary {
	background: #003764 !important;
	border-color: #003764 !important;
	color: #fff !important;
	text-decoration: none;
	text-shadow: none !important;
}

</style>
<?php }

function tacensi_login_logo_url() {
	return get_bloginfo( 'url' );
}
function tacensi_login_logo_url_title() {
	return 'Ir para o início';
}
add_action( 'login_enqueue_scripts', 'tacensi_login_logo' );
add_filter( 'login_headerurl', 'tacensi_login_logo_url' );
add_filter( 'login_headertitle', 'tacensi_login_logo_url_title' );

/**
 * Editor styles
 */
function tacensi_theme_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'tacensi_theme_add_editor_styles' );
