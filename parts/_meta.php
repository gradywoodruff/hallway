<?php if (get_field('interview_archive_link')) { ?>

	<div class="title noselect fadein">

		<a class="meta meta--archive" href="<?php echo the_field('interview_archive_link'); ?>" target="_blank">

			<div class="meta__icon">
				<i class="ss-icon ss-social-regular">youtube</i>
			</div>
			<div class="meta__copy">
				Interview Archive
			</div>

		</a>

	</div>
<?php } ?>