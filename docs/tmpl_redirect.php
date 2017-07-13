<?php /* Template Name: Redirect */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset');?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<title>Hallway on <?php the_title(); ?></title>
		<meta name="description" content="Hallway's Custom Spotify Playlist" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/assets/ico/favicon.ico' ?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . '/assets/ico/apple-touch-icon.png' ?>">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() . '/assets/ico/favicon-32x32.png' ?>" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() . '/assets/ico/favicon-16x16.png' ?>" sizes="16x16">
		<link rel="manifest" href="<?php echo get_template_directory_uri() . '/assets/ico/manifest.json' ?>">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri() . '/assets/ico/safari-pinned-tab.svg' ?>" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">
		<?php if (get_field('redirect_link')) { ?>
			<meta http-equiv="refresh" content="0; URL='<?php echo the_field('redirect_link'); ?>'" />
		<?php } ?>
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

	
	<body style="height:100%;height:100vh;width:100%;width:100vw;background-color:<?php if (get_field('redirect_color')) { echo the_field('redirect_color'); } ?>;">

		<?php wp_footer(); ?>
	</body>
	
</html>