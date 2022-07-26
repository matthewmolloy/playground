<?php

// Register custom posts

// https://developer.wordpress.org/reference/functions/register_post_type/

function custom_post_example()
{
	register_post_type(
		'custom_type',
		array(
			'labels' => array(
				'name' => __('Custom Types', 'sitename'),
				'singular_name' => __('Custom Post', 'sitename'),
				'all_items' => __('All Custom Posts', 'sitename'),
				'add_new' => __('Add New', 'sitename'),
				'add_new_item' => __('Add New Custom Type', 'sitename'),
				'edit' => __('Edit', 'sitename'),
				'edit_item' => __('Edit Post Types', 'sitename'),
				'new_item' => __('New Post Type', 'sitename'),
				'view_item' => __('View Post Type', 'sitename'),
				'search_items' => __('Search Post Type', 'sitename'),
				'not_found' =>  __('Nothing found in the Database.', 'sitename'),
				'not_found_in_trash' => __('Nothing found in Trash', 'sitename'),
				'parent_item_colon' => ''
			),
			'description' => __('This is the example custom post type', 'sitename'),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8,
			'menu_icon' => 'dashicons-book',
			'rewrite'	=> array('slug' => 'custom_type', 'with_front' => false),
			'has_archive' => 'custom_type',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		)
	);
	register_taxonomy_for_object_type('category', 'custom_type');
	register_taxonomy_for_object_type('post_tag', 'custom_type');
}

add_action('init', 'custom_post_example');

// https://developer.wordpress.org/reference/functions/register_taxonomy/

register_taxonomy(
	'custom_cat',
	array('custom_type'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Custom Categories', 'sitename'),
			'singular_name' => __('Custom Category', 'sitename'),
			'search_items' =>  __('Search Custom Categories', 'sitename'),
			'all_items' => __('All Custom Categories', 'sitename'),
			'parent_item' => __('Parent Custom Category', 'sitename'),
			'parent_item_colon' => __('Parent Custom Category:', 'sitename'),
			'edit_item' => __('Edit Custom Category', 'sitename'),
			'update_item' => __('Update Custom Category', 'sitename'),
			'add_new_item' => __('Add New Custom Category', 'sitename'),
			'new_item_name' => __('New Custom Category Name', 'sitename')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'custom-slug'),
	)
);

register_taxonomy(
	'custom_tag',
	array('custom_type'),
	array(
		'hierarchical' => false,
		'labels' => array(
			'name' => __('Custom Tags', 'sitename'),
			'singular_name' => __('Custom Tag', 'sitename'),
			'search_items' =>  __('Search Custom Tags', 'sitename'),
			'all_items' => __('All Custom Tags', 'sitename'),
			'parent_item' => __('Parent Custom Tag', 'sitename'),
			'parent_item_colon' => __('Parent Custom Tag:', 'sitename'),
			'edit_item' => __('Edit Custom Tag', 'sitename'),
			'update_item' => __('Update Custom Tag', 'sitename'),
			'add_new_item' => __('Add New Custom Tag', 'sitename'),
			'new_item_name' => __('New Custom Tag Name', 'sitename')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
	)
);
