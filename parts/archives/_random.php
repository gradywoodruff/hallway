<?php $posts = get_posts('orderby=rand&numberposts=1'); foreach($posts as $post) { ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php if (in_category( 'guest' )) { ?>
			<?php } else { ?>

				<?php get_template_part('parts/_bumper'); ?>

				<div class="wrap">
					<?php get_template_part('parts/_title'); ?>
					<?php get_template_part('parts/_finds'); ?>
				</div>
			
			<?php } ?>

		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>
