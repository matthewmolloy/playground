<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php if (!function_exists('has_site_icon') || !has_site_icon()) { ?>
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-apple.png" rel="apple-touch-icon" />
		<?php } ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<header>
			<div class="container">
				<a href="<?php echo get_template_directory_uri(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg">
				</a>
			</div>
		</header>

		<main role="main" id="main">