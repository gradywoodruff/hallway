<?php get_header(); ?>

<?php

$recent_finds = wp_get_recent_posts(array('numberposts' => 1, 'post_status' => 'publish', 'category' => '1'));
foreach( $recent_finds as $lastfind ):
	$lastfindyear = date( 'Y', strtotime( $lastfind['post_date'] ) );
	$lastfindmonth = date( 'm', strtotime( $lastfind['post_date'] ) );
	$lastfindday = date( 'j', strtotime( $lastfind['post_date'] ) ); 
endforeach;
?>
<meta http-equiv="refresh" content="0; URL='<?php echo get_day_link( $lastfindyear, $lastfindmonth, $lastfindday ); ?>'" />

<?php get_footer(); ?>