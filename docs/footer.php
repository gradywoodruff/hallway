		<?php wp_footer(); ?>
		<div id="preload">
			<?php $finds = array('category_name' => 'finds',);
			$prev_post = get_previous_post( $finds ); 
			$prev_back = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post->ID), 'single-post' );
			if($prev_post) : ?>
				<img src="<?php echo $prev_back[0]; ?>" width="1" height="1">
			<?php endif ; ?>

			<?php $next_post = get_next_post( $finds ); 
			$next_back = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'single-post' );
			if($next_post) : ?>
		    	<img src="<?php echo $next_back[0]; ?>" width="1" height="1">
			<?php endif ; ?>
		</div>	
	</body>
	
</html>


