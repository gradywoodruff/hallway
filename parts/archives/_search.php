<div class="wrap--full">
	<div class="noselect">
		<?php global $wp_the_query;

		if (have_posts()) :
			while (have_posts()) : the_post();
			
			$archive_year = get_the_time( 'Y' );
			$archive_month = get_the_time( 'm' );
			$archive_day = get_the_time( 'd' );
			$out .= ' <a href="' . get_day_link( $year, $month, $day ) . '"title="'.esc_attr( get_the_time( 'j M Y' ) ) . ' Finds">'; ?>

			<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>">

				<?php 
				$thumb_id = get_post_thumbnail_id($p->ID);
				$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail');
				$day_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'day_image' ); ?>
			
				<div class="search__box" style="background-image:url('<?php echo $thumb_url[0]; ?>');">
				<div class="search__box--hover" style="background-image:url('<?php echo $day_image[0]; ?>');"></div>
					
					
					<div class="search__title">
						<h4><?php echo the_date(); ?></h4>
					</div>

				</div>

			</a>

			<?php
			endwhile;

			else : ?>
			<?php
			$recent_finds = wp_get_recent_posts(array('numberposts' => 1, 'post_status' => 'publish')); 
			foreach( $recent_finds as $searchfind ):
				$searchfindyear = date( 'Y', strtotime( $searchfind['post_date'] ) );
				$searchfindmonth = date( 'm', strtotime( $searchfind['post_date'] ) );
				$searchfindday = date( 'j', strtotime( $searchfind['post_date'] ) );

			 	$finds = '<a href="' . get_day_link( $searchfindyear, $searchfindmonth, $searchfindday ) . ' ">Finds</a>';

			endforeach; ?>

			<div class="search-container">

				<p>No finds with <?php the_search_query(); ?>.
				</p>
				<p>Check today's <?php echo $finds ?> or follow on <a href="http://twitter.com/hllwy" target="_blank">Twitter</a> or <a href="http://facebook.com" target="_blank">Facebook</a> for updates.</p>

			</div>

		<?php
		endif;
		?>
	</div>
</div>