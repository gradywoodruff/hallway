<?php

function hallway_resources() {
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/styles/styles.css');
	wp_enqueue_style( 'ss-social-regular', get_template_directory_uri() . '/assets/fonts/ss/ss-social-regular.css');
	wp_enqueue_style( 'ss-standard', get_template_directory_uri() . '/assets/fonts/ss/ss-standard.css');
	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/scripts/App.js', ' ', '3.0', true);
	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/assets/scripts/Vendor.js', ' ', '3.0', false);
} add_action('wp_enqueue_scripts', 'hallway_resources');

function admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/styles/admin.css');
} add_action('admin_enqueue_scripts', 'admin_style');


function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name; 
	}
	return $classes;
} add_filter( 'body_class', 'add_slug_body_class' );

function hallway_setup() {

	// Nav menus
	register_nav_menus(array(
		'archives' => __( 'archives'),
		'bottom' => __( 'bottom')
	));

	//Pluralize
	function pluralize($count, $singular, $plural = false)
	{
	   if (!$plural) $plural = $singular . 's';

	  return ($count == 1 ? $singular : $plural) ;
	}	
	// Add featured image support
	add_theme_support('post-thumbnails');

} add_action('after_setup_theme', 'hallway_setup');

function empty_content($str) {
    return trim(str_replace('&nbsp;','',strip_tags($str))) == '';
}


function hllwy_book_post_type () {
	$labels = array (
		'name' => 'Books',
		'singular_name' => 'Book',
		'add_new' => 'Add Book',
		'all_items' => 'All Books',
		'add_new_item' => 'Add Book',
		'edit_item' => 'Edit Book',
		'new_item' => 'New Book',
		'view_item' => 'View Book',
		'search_item' => 'Search Books',
		'not_found' => 'No Books Found',
		'not_found_in_trash' => 'No Books Found In Trash',
		'parent_item_colon' => 'Parent Book'
	);
	$books = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' =>5,
		'exclude_from_search' => false
	);
	register_post_type('books',$books);
} add_action('after_setup_theme', 'hllwy_book_post_type');

function hllwy_newsletter_post_type () {
	$labels = array (
		'name' => 'Newsletters',
		'singular_name' => 'Newsletter',
		'add_new' => 'Add Newsletter',
		'all_items' => 'All Newsletters',
		'add_new_item' => 'Add Newsletter',
		'edit_item' => 'Edit Newsletter',
		'new_item' => 'New Newsletter',
		'view_item' => 'View Newsletter',
		'search_item' => 'Search Newsletters',
		'not_found' => 'No Newsletters Found',
		'not_found_in_trash' => 'No Newsletters Found In Trash',
		'parent_item_colon' => 'Parent Newsletter'
	);
	$newsletters = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' =>5,
		'exclude_from_search' => false
	);
	register_post_type('newsletters',$newsletters);
} add_action('after_setup_theme', 'hllwy_newsletter_post_type');


function hllwy_story_post_type () {
	$labels = array (
		'name' => 'Stories',
		'singular_name' => 'Story',
		'add_new' => 'Add Story',
		'all_items' => 'All Stories',
		'add_new_item' => 'Add Story',
		'edit_item' => 'Edit Story',
		'new_item' => 'New Story',
		'view_item' => 'View Story',
		'search_item' => 'Search Stories',
		'not_found' => 'No Stories Found',
		'not_found_in_trash' => 'No Stories Found In Trash',
		'parent_item_colon' => 'Parent Story'
	);
	$stories = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' =>5,
		'exclude_from_search' => false
	);
	register_post_type('stories',$stories);

	add_filter('rest_prepare_stories', function($response) {
	     $response->data['acf'] = get_fields($response->data['id']);
	     return $response;
	});

} add_action('after_setup_theme', 'hllwy_story_post_type');


add_action( 'pre_get_posts', 'dap_remove_date_archives_pagination' );
function dap_remove_date_archives_pagination( $query ) {
	if ( !is_admin() && is_date() && $query->is_main_query() ) {
		$query->set( 'nopaging', true );
	}
}
function dap_next_posts_link( $label = null ) {
	echo  dap_get_next_posts_link( $label );
}
function dap_get_next_posts_link( $label = null ) {
	return dap_get_date_archive_link( $label, 'next' );
}
function dap_previous_posts_link( $label = null ) {
	echo dap_get_previous_posts_link( $label );
}
function dap_get_previous_posts_link( $label = null ) {
	return dap_get_date_archive_link( $label, 'previous' );
}
function dap_get_next_date_archive_date() {
	$date_post = dap_get_next_cpt_date_archive_post();
	if ( !empty( $date_post ) && isset( $date_post->post_date ) ) {
		$date = explode( ' ', $date_post->post_date );
		return $date[0];
	}
	return '';
}
function dap_get_previous_date_archive_date() {
	$date_post = dap_get_previous_cpt_date_archive_post();
	if ( !empty( $date_post ) && isset( $date_post->post_date ) ) {
		$date = explode( ' ', $date_post->post_date );
		return $date[0];
	}
	return '';
}
function dap_get_next_date_archive_post() {
	return dap_get_adjacent_cpt_date_archive_post( 'next' );
}
function dap_get_previous_date_archive_post() {
	return dap_get_adjacent_cpt_date_archive_post( 'previous' );
}
function dap_get_adjacent_date_archive_post( $adjacent = 'next' ) {
	global $wp_query;
	if ( !is_date() ) {
		return;
	}
	$query = $wp_query->query;
	$post_type   = isset( $query['post_type'] ) ? $query['post_type'] : 'post';
	$post_status = isset( $query['post_status'] ) ? $query['post_status'] : 'publish';
	
	$reset_query_vars =  array(
		'second' , 'minute', 'hour',
		'day', 'monthnum', 'year',
		'w', 'm',
		'paged', 'offset',
	);
	foreach ( $reset_query_vars as $var ) {
		unset( $query[ $var ] );
	}
	$previous = ( 'previous' === strtolower( $adjacent ) ) ? true : false;
	$order    = ( $previous ) ? 'ASC' : 'DESC';
	$type     = ( $previous ) ? 'after' : 'before';
	$year     = get_the_date( 'Y' );
	$month    = get_the_date( 'm' );
	$day      = get_the_date( 'd' );
	$args = array(
		'post_type'      => $post_type,
		'post_status'    => $post_status,
		'posts_per_page' => 1,
		'order'          => $order,
		'no_found_rows'  => true,
	);
	if ( is_year() && $year ) {
		$args['date_query'][0][ $type ] = array( 'year' => $year );
	}
	if ( is_month() && $year && $month ) {
		$args['date_query'][0][ $type ] = array( 'year' => $year, 'month' => $month );
	}
	if ( is_day() && $year && $month && $day ) {
		$args['date_query'][0][ $type ] = array( 'year' => $year, 'month' => $month, 'day' => $day );
	}
	$args = array_merge( $query, $args );
	$post = get_posts( $args );
	if ( isset( $post[0] ) ) {
		$post = $post[0];
	} else {
		$post = false;
	}
	return $post;
}
function dap_get_date_archive_link( $label = null, $adjacent = 'next' ) {
	global $wp_locale;
	if ( !is_date() ) {
		return '';
	}
	$post     = dap_get_adjacent_date_archive_post( $adjacent );
	$previous = ( 'previous' === strtolower( $adjacent ) ) ? true : false;
	if ( !isset( $post->post_date ) ) {
		return '';
	}
	$year  = get_the_date( 'Y', $post );
	$month = get_the_date( 'm', $post );
	$day   = get_the_date( 'd', $post );
	$url  = '';
	$text = '';
	if ( is_year() ) {
		$url  = get_year_link( $year );
		$text = sprintf( '%d', $year );
	}
	if ( is_month() && $year && $month ) {
		$url  = get_month_link( $year, $month );
		$text = sprintf( __( '%1$s %2$d' ), $wp_locale->get_month( $month ), $year );
	}
	if ( is_day() && $year && $month && $day ) {
		$url  = get_day_link( $year, $month, $day );
		$date_format = get_option( 'date_format' );
		$date_format = ( $date_format ) ? $date_format : 'Y/m/d';
		$text = mysql2date( $date_format, $post->post_date );
	}
	if ( $label ) {
		$text = trim( $label );
	}
	if ( $url && $text ) {
		return "<a href='$url' title='{$text}'>";
	}
	return '';
}

function hllwy_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Finds';
    $submenu['edit.php'][5][0] = 'Finds';
    $submenu['edit.php'][10][0] = 'Add Find';
    $submenu['edit.php'][16][0] = 'Find Tags';
}
function hllwy_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Finds';
    $labels->singular_name = 'Find';
    $labels->add_new = 'Add Find';
    $labels->add_new_item = 'Add Find';
    $labels->edit_item = 'Edit Find';
    $labels->new_item = 'Find';
    $labels->view_item = 'View Find';
    $labels->search_items = 'Search Finds';
    $labels->not_found = 'No Finds found';
    $labels->not_found_in_trash = 'No Finds found in Trash';
    $labels->all_items = 'All Finds';
    $labels->menu_name = 'Finds';
    $labels->name_admin_bar = 'Finds';
} add_action( 'admin_menu', 'hllwy_change_post_label' );
add_action( 'init', 'hllwy_change_post_object' );