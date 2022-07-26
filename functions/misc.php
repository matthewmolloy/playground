<?php

// Custom admin footer

function joints_custom_admin_footer()
{
	_e('<span id="footer-thankyou"><a href="https://github.com/matthewmolloy/playground" target="_blank">Playground</a></span>.');
}
add_filter('admin_footer_text', 'joints_custom_admin_footer');

// Disable emojis

function disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
	add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

function disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
	if ('dns-prefetch' == $relation_type) {
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
		$urls = array_diff($urls, array($emoji_svg_url));
	}
	return $urls;
}

// Remove DNS prefetch

add_action('init', 'remove_dns_prefetch');
function remove_dns_prefetch()
{
	remove_action('wp_head', 'wp_resource_hints', 2, 99);
}

// Remove unnecessary actions

remove_action('wp_head', 'rsd_link'); // EditURI/RSD (Really Simple Discovery) link
remove_action('wp_head', 'wlwmanifest_link'); // wlwmanifest (Windows Live Writer) link
remove_action('wp_head', 'wp_generator'); //m eta name generator
remove_action('wp_head', 'wp_shortlink_wp_head'); // shortlink
remove_action('wp_head', 'feed_links', 2); // feed links
remove_action('wp_head', 'feed_links_extra', 3); // comments feed.
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); // relational links

remove_filter('wp_robots', 'wp_robots_max_image_preview_large');

add_filter('nav_menu_item_id', '__return_false');

// WP JSON

function remove_json_api()
{
	remove_action('wp_head', 'rest_output_link_wp_head', 10); // Remove the REST API lines from the HTML Header
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10); // Remove the REST API lines from the HTML Header
	remove_action('rest_api_init', 'wp_oembed_register_route'); // Remove the REST API endpoint.
	add_filter('embed_oembed_discover', '__return_false'); // Turn off oEmbed auto discovery.
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10); // Don't filter oEmbed results.
	remove_action('wp_head', 'wp_oembed_add_discovery_links'); // Remove oEmbed discovery links.
	remove_action('wp_head', 'wp_oembed_add_host_js'); // Remove oEmbed-specific JavaScript from the front-end and back-end.
	add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' ); // Remove all embeds rewrite rules.
}
add_action('after_setup_theme', 'remove_json_api');

function disable_json_api()
{
	add_filter('json_enabled', '__return_false');
	add_filter('json_jsonp_enabled', '__return_false');

	add_filter('rest_enabled', '__return_false');
	add_filter('rest_jsonp_enabled', '__return_false');
}
add_action('after_setup_theme', 'disable_json_api');
