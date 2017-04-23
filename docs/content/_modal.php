<div class="question">
	<a class="open-modal">
		<i class="ss-icon ss-standard">question</i>
	</a>
</div>

<div class="modal">
	<div class="modal__close">
		<i class="ss-icon ss-standard">close</i>
	</div>
	<div class="about-section">
		<div class="title title--all title--about">
			KEY AF
		</div>
		<?php
		$page = get_page_by_title( 'about' );
		$content = apply_filters('the_content', $page->post_content); ?>
		
		<div class="about-content">
			<?php echo $content; ?>
		</div>

	</div>
</div>