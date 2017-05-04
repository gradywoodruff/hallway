<div class="archive noselect">
	<?php global $post; $archive_args = array('post_type' => 'post', 'posts_per_page'=> -1); $archive_query = new WP_Query( $archive_args ); $formatted_data = []; ?>

	<?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); $date_new = get_the_time("M Y"); $key = $date_new; ?>

		<?php if (! isset($formatted_data[$date_new])) { $formatted_data[$date_new] = []; } ?>

		<?php array_push($formatted_data[$date_new], $post); ?>
	<?php endwhile; ?>

	<?php $keys = array_keys($formatted_data);
	for ($i = 0; $i < count($keys); $i++): ?>
		<?php 
		$month = $keys[$i]; 
		$posts = $formatted_data[$month]; 
		$num_posts = count($posts);
		$explosion = explode(" ", $month);
		$monthNum = array(
			"Jan" => 1,
			"Feb" => 2, 
			"Mar" => 3,
			"Apr" => 4,
			"May" => 5,
			"Jun" => 6,
			"Jul" => 7,
			"Aug" => 8,
			"Sep" => 9,
			"Oct" => 10,
			"Nov" => 11,
			"Dec" => 12
		);
		$month_abbr = $explosion[0];
		$year_month = $monthNum[$month_abbr];
		$year_year = $explosion[1]; ?>

			<div class="archive__month">
				<a href="<?php echo get_month_link( $year_year, $year_month ); ?>">
					
				    <div class="<?php echo "archive__month__wrap archive__month__wrap--" . $num_posts; ?>">

					    <div class="archive__title">
					    	<?php echo $month; ?>
					    </div>

						<?php for ($j = 0; $j < count($posts); $j++): ?> 
							<?php 
							$p = $posts[$j];
							$thumb_id = get_post_thumbnail_id($p->ID);
							$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail');
							$day_image = wp_get_attachment_image_src( get_post_thumbnail_id( $p->ID ), 'day_image' ); ?>

							<div class="archive__background" style="background-image:url('<?php echo $thumb_url[0]; ?>');"></div>


						<?php endfor; ?>
					</div>
				</a>
			</div>

	<?php 
	endfor; ?>
</div>