<?php get_header(); ?>

<div class="newsletter__section fadein">
	
	<div class="newsletter__logo">
		<div class="newsletter__logo--on" style="background-image:url('<?php echo get_template_directory_uri() . '/assets/images/flashlight-on.png' ?>');"></div>
	</div>

</div>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php if (!empty_content($post->post_content)) { ?>
			<div class="newsletter__section newsletter__section--black">
				<div class="newsletter__opening">
					<?php the_content(); ?>
				</div>
			</div>
		<?php } ?>


	<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>

<?php 
$posts = get_field('newsletter__finds');

if( $posts ): ?>
    <?php foreach( $posts as $post): ?>
        <?php setup_postdata($post); ?>

				<?php $day_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'day_image' ); ?>
				<?php if ($day_image) { ?>
				<div class="newsletter__image" style="background-image:url('<?php echo $day_image[0]; ?>');">
				<?php } else { ?>
				<div class="newsletter__image" style="background-color:#000;">
				<?php } ?>
					<div class="wrap wrap--top-pad">
						<div class="newsletter__message">
							<?php echo get_the_date(); ?>
						</div>
					</div>
				</div>

    <?php endforeach; ?>
	<div class="wrap wrap--top-pad">
    <?php foreach( $posts as $post): ?>
        <?php setup_postdata($post); ?>

		<?php if (get_field('find_1_url') || get_field('find_2_url') || get_field('find_3_url') || get_field('find_4_url') || get_field('find_5_url')) { ?>

			<?php for ($n = 0; $n < 5; $n++) { ?>
				<?php $f = $n + 1; ?>
				<?php if (get_field('find_'.$f.'_url')) {  ?>

					<div class="find find--expanded find--<?php echo $f ?> find--newsletter fadein" alt="On <?php echo get_the_date('j M Y'); ?>, Hallway found '<?php echo get_field('find_'.$f.'_title') ?>'<?php if (get_field('find_'.$f.'_artist')) { ?> by <?php echo the_field('find_'.$f.'_artist') ?> <?php } ?>">

						<a href="<?php the_field('find_'.$f.'_url'); ?>" target="_blank">
							<span class="find__name">
								<?php if (get_field('find_'.$f.'_title')) { ?>
									<?php echo the_field('find_'.$f.'_title'); ?>
								<?php } else { ?>
									<?php echo get_field('find_'.$f.'_url'); ?>
								<?php } ?>
							</span>
						</a>

						<?php if (get_field('find_'.$f.'_description')) { ?>
							<span class="find__context" data-link="<?php the_field('find_'.$f.'_url'); ?>">
								<?php echo the_field('find_'.$f.'_description'); ?>
							</span>

							<i class="noselect find__context-button find__context-button--<?php echo $f?> ss-icon ss-standard">information</i>
						<?php } ?>
						
					</div>
					
				<?php } ?>
			<?php } ?>
		<?php } ?>

    <?php endforeach; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php if( have_rows('newsletter__links') ) : ?>

	<div class="wrap">
	<?php while ( have_rows('newsletter__links') ) : the_row(); ?>
		
		<div class="find">
			<a href="<?php the_sub_field('newsletter__link'); ?>" target="_blank">
				<span class="find__name"><?php the_sub_field('newsletter__title'); ?></span>
			</a>
			<span class="find__context" data-link="<?php the_sub_field('newsletter__link'); ?>"><?php the_sub_field('newsletter__description'); ?></span>
		</div>

	<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>