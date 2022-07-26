<?php

// Site scripts and styles

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style('main', get_theme_file_uri('assets/css/styles.css'));
	wp_enqueue_script('main', get_theme_file_uri('assets/js/scripts.js'), array(), null, true);
} );

// Editor scripts and styles

add_action( 'enqueue_block_editor_assets', function() {
	wp_enqueue_style('main', get_theme_file_uri('assets/css/editor.css'));
	wp_enqueue_script('main', get_theme_file_uri('assets/js/scripts.js'), array(), null, true);
} );

// Remove gutenberg styling

function remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
remove_action( 'wp_body_open', 'gutenberg_global_styles_render_svg_filters' );