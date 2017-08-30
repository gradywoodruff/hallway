<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php if (in_category( 'guest' )) { ?>
		
			<?php get_template_part('parts/_bumper'); ?>

			<div class="wrap">
				<?php get_template_part('parts/_finds'); ?>
				<?php get_template_part('parts/_meta'); ?>
			</div>
			
		<?php } ?>

	<?php endwhile; ?>
<?php endif; ?>
