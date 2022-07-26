<?php

// Custom login

function joints_login_css()
{
	wp_enqueue_style('joints_login_css', get_template_directory_uri() . '/assets/css/login.css', false);
}

function joints_login_url()
{
	return home_url();
}

function joints_login_title()
{
	return get_option('blogname');
}

add_action('login_enqueue_scripts', 'joints_login_css', 10);
add_filter('login_headerurl', 'joints_login_url');
add_filter('login_headertitle', 'joints_login_title');

// Wrap default blocks

add_filter('render_block', 'wrap_embed_block', 10, 2);

function wrap_embed_block($block_content, $block)
{
	if (str_contains($block['blockName'], 'core/')) {
		$block_content = '<div><div class="container">' . $block_content . '</div></div>';
		return $block_content;
	}
	if (null === $block['blockName'] && !empty($block_content) && !ctype_space($block_content)) {
		$block_content = '<div><div class="container">' . $block_content . '</div></div>';
		return $block_content;
	}
	return $block_content;
}
