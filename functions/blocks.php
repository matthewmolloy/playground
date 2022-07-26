<?php

// Register custom ACF blocks

// https://www.advancedcustomfields.com/resources/acf_register_block_type/

add_action('acf/init', 'acf_init_block_types');
function acf_init_block_types()
{
	if (function_exists('acf_register_block_type')) {

		// Block example

		acf_register_block_type(array(
			'name'              => 'block-example',
			'title'             => 'Block Example',
			'description'       => 'An example of an ACF Block',
			'render_template'   => 'template-parts/blocks/block-example.php',
			'category'          => 'widgets',
			'icon'              => 'format-aside',
			'keywords'          => array('example', 'block')
		));
	}
}
