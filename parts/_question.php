<div class="question">

	<div class="question__inner">

		<?php
		$page = get_page_by_title( 'about' );
		$content = apply_filters('the_content', $page->post_content); 
		?>

		<div class="about-content">
			<?php echo $content; ?>
		</div>
	</div>

	<div class="question__close">
		<i class="ss-icon ss-standard top--close">close</i>
	</div>

</div>