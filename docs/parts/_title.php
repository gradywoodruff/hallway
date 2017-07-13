<div class="wrap wrap--top-pad fadein">
	
	<div class="title noselect padding--top">

		<?php if ( is_day() ) { ?>

			<div class="title__logo">
				<?php get_template_part('parts/_logo'); ?>
			</div>

			<div class="title__copy">
				<?php echo get_the_date(); ?>
			</div>

		<?php } elseif ( is_month() ) { ?>
			
			<div class="title__logo">
				<?php get_template_part('parts/_logo'); ?>
			</div>

			<div class="title__copy">
				<?php echo get_the_date('M Y'); ?>
			</div>

		<?php } elseif ( is_search()) { ?>

			<div class="title__logo">
				<?php get_template_part('parts/_logo'); ?>
			</div>
		

			<div class="title__copy">
				<?php global $wp_query; ?>
				<?php $totalresults = $wp_query->found_posts; ?>

				<?php echo $totalresults; ?> <?php echo pluralize($totalresults, 'find', 'finds');?> with "<?php the_search_query(); ?>"
			</div>

		<?php } elseif ( is_page( 'random' )) { ?>

			<div class="title__logo">
				<?php get_template_part('parts/_logo'); ?>
			</div>
		
			<div class="title__copy">
				<?php echo get_the_date(); ?>
			</div>

		<?php } elseif ( is_home()) { ?>

			<div class="title__logo">
				<?php get_template_part('parts/_logo'); ?>
			</div>

		<?php } else { ?>

			<div class="title__logo">
				<?php get_template_part('parts/_logo'); ?>
			</div>

			<div class="title__copy">
				<?php the_title(); ?>
			</div>

		<?php } ?>
	</div>

</div>