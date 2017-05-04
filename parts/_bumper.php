<div class="bumper noselect">
<?php $day_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'day_image' ); ?>
<?php if ($day_image) { ?>
	<div class="bumper--image" style="background-image:url('<?php echo $day_image[0]; ?>');">
<?php } else { ?>
	<div class="bumper--image" style="background-color:#000;">
<?php } ?>

		<?php if (in_category( 'guest' )) { ?>
			<div class="bumper__message bumper__message--1 bumper__message--1--guest">
				<?php echo get_the_title(); ?>
			</div>
		<?php } else { ?>
			<div class="bumper__message bumper__message--1">
				<?php echo get_the_date(); ?>
			</div>
		<?php } ?>

		<div class="bumper__message bumper__message--2">	
			<?php echo get_bloginfo( $show, 'name' ); ?>
		</div>

	</div>
</div>