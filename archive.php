<?php get_header(); ?>

	<?php if ( is_category() ) { ?>

	<?php } elseif ( is_author() ) { ?>

	<?php } elseif ( is_day() ) { ?>

		<?php get_template_part('parts/_title'); ?>
		<?php get_template_part('parts/archives/_day'); ?>
		<?php get_template_part('parts/_footer'); ?>

	<?php } elseif ( is_tag() ) { ?>

		<?php get_template_part('content-tag'); ?>
		<?php get_template_part('content-navigation_tag'); ?>

	<?php } elseif ( is_month() ) { ?>
		
		<?php get_template_part('parts/_title'); ?>
		<?php get_template_part('parts/archives/_month'); ?>
		<?php get_template_part('parts/_footer'); ?>

	<?php } ?>

<?php get_footer(); ?>