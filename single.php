<?php get_header(); ?>

	<?php if (in_category( 'guest' )) { ?>

		<?php get_template_part('parts/_title'); ?>
		<?php get_template_part('parts/archives/_guest'); ?>
		<?php get_template_part('parts/_footer'); ?>

	<?php } elseif (in_category( 'finds' )) { ?>

		<?php 
		$year = get_the_date('Y'); 
		$month = get_the_date('m'); 
		$day = get_the_date('j'); 
		?>
		<meta http-equiv="refresh" content="0; URL='<?php echo get_day_link( $year, $month, $day); ?>'" />

	<?php } else { ?>
		
		<?php
		$recent_finds = wp_get_recent_posts(array('numberposts' => 1, 'post_status' => 'publish'));
		foreach( $recent_finds as $lastfind ):
			$lastfindyear = date( 'Y', strtotime( $lastfind['post_date'] ) );
			$lastfindmonth = date( 'm', strtotime( $lastfind['post_date'] ) );
			$lastfindday = date( 'j', strtotime( $lastfind['post_date'] ) ); 
		endforeach;
		?>
		<meta http-equiv="refresh" content="0; URL='<?php echo get_day_link( $lastfindyear, $lastfindmonth, $lastfindday ); ?>'" />

	<?php } ?>

<?php get_footer(); ?>

