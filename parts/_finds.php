<?php if (get_field('find_1_url') || get_field('find_2_url') || get_field('find_3_url') || get_field('find_4_url') || get_field('find_5_url')) { ?>
		
	<?php for ($n = 0; $n < 5; $n++) { ?>
		<?php $f = $n + 1; ?>
		<?php if (get_field('find_'.$f.'_url')) {  ?>

			<div class="find find--<?php echo $f ?> fadein" alt="On <?php echo get_the_date('j M Y'); ?>, Hallway found '<?php echo get_field('find_'.$f.'_title') ?>'<?php if (get_field('find_'.$f.'_artist')) { ?> by <?php echo the_field('find_'.$f.'_artist') ?> <?php } ?>">

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
					<span class="find__context">
						<?php echo the_field('find_'.$f.'_description'); ?>
					</span>

					<i class="noselect find__context-button find__context-button--<?php echo $f?> ss-icon ss-standard">information</i>
				<?php } ?>
				
			</div>
			
		<?php } ?>
	<?php } ?>

<?php } ?>