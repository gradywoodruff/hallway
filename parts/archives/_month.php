<div class="wrap--full">
	<div class="noselect">
		<?php global $wp_the_query;

		$loaded_posts = $wp_the_query->posts;
		$reverse_posts = array_reverse($loaded_posts);
		$wp_the_query->posts = $reverse_posts;
		if (have_posts()) :
			while (have_posts()) : the_post();
				if (in_category( 'guest' )) { 
				} else {
					
				$archive_year = get_the_time( 'Y' );
				$archive_month = get_the_time( 'm' );
				$archive_day = get_the_time( 'd' );
				$out .= ' <a href="' . get_day_link( $year, $month, $day ) . '"title="'.esc_attr( get_the_time( 'j M Y' ) ) . ' Finds">'; ?>


				<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>">

					<?php 
						$thumb_id = get_post_thumbnail_id($p->ID);
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail');
						$day_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'day_image' ); 
					?>
				
					<div class="month__box" style="background-image:url('<?php echo $thumb_url[0]; ?>');">
					<div class="month__box--hover" style="background-image:url('<?php echo $day_image[0]; ?>');"></div>
						
						<div class="month__title">
							<?php echo get_the_date('j'); ?>
						</div>

					</div>

				</a>

			<?php } endwhile; ?>

		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>
</div>

<div class="wrap--full">
	<div class="noselect">
		<?php global $wp_the_query;

		$loaded_posts = $wp_the_query->posts;
		$reverse_posts = array_reverse($loaded_posts);
		$wp_the_query->posts = $reverse_posts;
		if (have_posts()) :
			while (have_posts()) : the_post();
				if (in_category( 'guest' )) { 
					
				$archive_year = get_the_time( 'Y' );
				$archive_month = get_the_time( 'm' );
				$archive_day = get_the_time( 'd' );
				$out .= ' <a href="' . get_day_link( $year, $month, $day ) . '"title="'.esc_attr( get_the_time( 'j M Y' ) ) . ' Finds">'; ?>


				<a href="<?php echo get_permalink(); ?>">

					<?php 
						$thumb_id = get_post_thumbnail_id($p->ID);
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail');
						$day_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'day_image' ); 
					?>
				
					<div class="month__box" style="background-image:url('<?php echo $thumb_url[0]; ?>');">
					<div class="month__box--hover" style="background-image:url('<?php echo $day_image[0]; ?>');"></div>
						
						<div class="month--guest__title">
							<?php the_title(); ?>
						</div>

					</div>

				</a>
				<?php } else { ?>
			<?php } endwhile; ?>

		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>
</div>





