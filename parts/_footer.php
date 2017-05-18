<footer class="noselect footer--top-pad fadein">
	
	<?php get_template_part('parts/_navigation'); ?>

	<div class="wrap">
		<div class="footer__links">
			<?php
			$recent_finds = wp_get_recent_posts(array('numberposts' => 1, 'post_status' => 'publish'));
			foreach( $recent_finds as $lastfind ):
				$lastfindyear = date( 'Y', strtotime( $lastfind['post_date'] ) );
				$lastfindmonth = date( 'm', strtotime( $lastfind['post_date'] ) );
				$lastfindday = date( 'j', strtotime( $lastfind['post_date'] ) );
			endforeach;
				$finds =  '<a href="' . get_day_link( $lastfindyear, $lastfindmonth, $lastfindday ) . ' ">Finds</a>';

				$recent_episode = wp_get_recent_posts(array('numberposts' => 1,'post_type' => 'episodes', 'post_status' => 'publish'));
			foreach( $recent_episode as $lastepisode ):
				$episodes = '<a href="' . get_permalink( $lastepisode['ID'] ) . ' ">Episodes</a>';
			endforeach; 

				$recent_book = wp_get_recent_posts(array('numberposts' => 1,'post_type' => 'books', 'post_status' => 'publish'));
			foreach( $recent_book as $lastbook ):
				$books = '<a href="' . get_permalink( $lastbook['ID'] ) . ' ">Book</a>';
			endforeach; 
			?>

			<ul>
				<li>
					<a href="http://instagram.com/hllwy.co" target="_blank">instagram</a>
				</li>
				<li>
					<a href="http://twitter.com/hllwy" target="_blank">twitter</a>
				</li>
				<li>
					<a href="http://hllwy.co/spotify" target="_blank">spotify</a>
				</li>
			</ul>
		</div>
	</div>
</footer>