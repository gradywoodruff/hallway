<div class="wrap">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php if (in_category( 'guest' )) { ?>
			<?php } else { ?>
			
				<?php get_template_part('parts/_title'); ?>
				<?php get_template_part('parts/_bumper'); ?>
				<?php get_template_part('parts/_finds'); ?>
			
			<?php } ?>

		<?php endwhile; ?>
	<?php endif; ?>

</div>