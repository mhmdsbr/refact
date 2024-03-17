<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function starter_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'starter_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function starter_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'starter_theme_pingback_header' );


// Register Custom Post Type
function custom_post_type_menu()
{

	$labels = array(
		'name' => _x('Menus', 'Post Type General Name', 'WPGULP'),
		'singular_name' => _x('Menu', 'Post Type Singular Name', 'WPGULP'),
		'menu_name' => __('Menu', 'WPGULP'),
		'name_admin_bar' => __('Menu', 'WPGULP'),
		'archives' => __('Menu Archives', 'WPGULP'),
		'attributes' => __('Menu Attributes', 'WPGULP'),
		'parent_item_colon' => __('Parent Menu:', 'WPGULP'),
		'all_items' => __('All Menus', 'WPGULP'),
		'add_new_item' => __('Add New Menu', 'WPGULP'),
		'add_new' => __('Add New', 'WPGULP'),
		'new_item' => __('New Menu', 'WPGULP'),
		'edit_item' => __('Edit Menu', 'WPGULP'),
		'update_item' => __('Update Menu', 'WPGULP'),
		'view_item' => __('View Menu', 'WPGULP'),
		'view_items' => __('View Menus', 'WPGULP'),
		'search_items' => __('Search Menu', 'WPGULP'),
		'not_found' => __('Not found', 'WPGULP'),
		'not_found_in_trash' => __('Not found in Trash', 'WPGULP'),
		'featured_image' => __('Featured Image', 'WPGULP'),
		'set_featured_image' => __('Set featured image', 'WPGULP'),
		'remove_featured_image' => __('Remove featured image', 'WPGULP'),
		'use_featured_image' => __('Use as featured image', 'WPGULP'),
		'insert_into_item' => __('Insert into menu', 'WPGULP'),
		'uploaded_to_this_item' => __('Uploaded to this menu', 'WPGULP'),
		'items_list' => __('Menus list', 'WPGULP'),
		'items_list_navigation' => __('Menus list navigation', 'WPGULP'),
		'filter_items_list' => __('Filter menus list', 'WPGULP'),
	);
	$args = array(
		'label' => __('Menu', 'WPGULP'),
		'description' => __('Menu Description', 'WPGULP'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes'),
		'taxonomies' => array('category', 'post_tag'),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-menu-alt',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type('menu', $args);

}

add_action('init', 'custom_post_type_menu', 0);

