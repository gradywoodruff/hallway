<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset');?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<title>
			<?php if (is_month()) { ?>
				<?php echo get_the_date('M Y'); ?>
			<?php } elseif (is_home()) { ?>
				HALLWAY
			<?php } elseif (in_category( 'guest' ) && !is_month()) { ?>
				<?php echo get_the_title(); ?>
			<?php } elseif (is_day()) { ?>
				<?php echo get_the_date(); ?>
			<?php } elseif (is_page( 'random' )) { ?>
				RANDOM FINDS
			<?php } else { ?>
				HALLWAY
			<?php } ?>
		</title>
		<meta name="description" content="The Best Music Finds Every Day" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/assets/ico/favicon.ico' ?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . '/assets/ico/apple-touch-icon.png' ?>">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() . '/assets/ico/favicon-32x32.png' ?>" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() . '/assets/ico/favicon-16x16.png' ?>" sizes="16x16">
		<link rel="manifest" href="<?php echo get_template_directory_uri() . '/assets/ico/manifest.json' ?>">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri() . '/assets/ico/safari-pinned-tab.svg' ?>" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-83889298-1', 'auto');
			ga('send', 'pageview');
		</script>
		<?php wp_head(); ?>
	</head>

	
		<body class="
			<?php if (is_day()) { ?>
				bump 
				intro 
				page--finds
			<?php } elseif (is_home()) { ?>
				bump
				intro
				page--front
			<?php } elseif (in_category( 'guest' ) && !is_month()) { ?>
				bump 
				intro 
				page--finds
			<?php } elseif (is_page( 'random' )) { ?>
				bump 
				intro 
				page--finds
			<?php } else { ?>
			<?php } ?>
		">

		<?php get_template_part('parts/_top'); ?>

