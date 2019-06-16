<?php
/**
 * Template tags and functions
 */

/**
 * Get a simple menu, <a>s inside a nav
 * @param  string $location name of the them location of the menu
 * @return string           html code for the menu
 */
function tacensi_get_menu ( $location ) {
	$locations = get_nav_menu_locations();
	$menu_id = $locations[$location];

	// bail out if can't find the menu or the items
	if ( ! $menu_id ) return false;

	$nav = wp_get_nav_menu_items( $menu_id );
	if ( ! $nav ) return false;

	// menu_output
	$menu_out = '<nav class="site-nav">' . "\n";

	// current URL for active class
	$current_url = home_url() . $_SERVER["REQUEST_URI"];

	// actual nav items
	foreach ( $nav as $item ) {
		$menu_out .= '<a href="' . $item->url . '" ' .
			'class="site-nav__item';

		if ( strstr( $current_url, $item->url ) ) {
			$menu_out .= ' current';
		}

		$menu_out .= '">' . $item->title . '</a>' . "\n";
	}

	$menu_out .= '</nav>' . "\n";

	echo $menu_out;
}

function tacensi_get_article_header() {

	$h = ( is_singular() ) ? 'h1' : 'h2';

	$header = '<header class="article-header">' . "\n" .
		'<span class="posted-on">' . "\n" .
		'<a href="';

	if ( 'image' == get_post_type() ) {
		$header .= '# ';
	}
	$header .= get_the_permalink() . '" rel="bookmark"' . "\n" .
				'<time class="entry-date published updated" datetime="' .
				get_the_time( 'c') . '">' .
				get_the_time( 'Y-m-d H\hi' ) . '</time></a>' . "\n" .
		'</span>';

	if ( 'image' != get_post_type() ) {
		$header .= '<' . $h . ' class="article-title">' .
			get_the_title() . '</' . $h . '>';
	}

	$header .= '</header>';

	echo $header;
}


if ( ! function_exists( 'tacensi_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function tacensi_get_article_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'tacensi' ) );
			if ( $categories_list ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'tacensi' ) . '</span>', $categories_list );
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'tacensi' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'tacensi' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() ) {
			echo '<p class="comments-link">
				Algum comentário? <a href="mailto:' .
					antispambot( 'tacensi@gmail.com', 1 ) .
				'">Manda uma letra.</a>
			</p>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'tacensi' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
