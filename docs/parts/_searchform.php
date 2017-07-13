<div class="searchform">

	<div class="wrap wrap--top-pad">
		<div class="title noselect padding--top">

			<div class="title__logo">
				<?php get_template_part('parts/_logo'); ?>
			</div>

			<div class="title__copy">
				Search
			</div>

		</div>
	</div>

	<div class="wrap">

		<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	        <button type="submit" id="searchsubmit" value="search">
				<i class="ss-icon ss-standard top--search">search</i>
	        </button>
	        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
	        <input type="text" name="s" id="s" placeholder="search" value="<?php the_search_query(); ?>"/>
		</form>

	</div>

	<div class="searchform__close noselect">
		<i class="ss-icon ss-standard top--close">close</i>
	</div>
</div>