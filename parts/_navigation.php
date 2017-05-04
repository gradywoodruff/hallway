<div class="wrap">
	<div class="navigation">
		<?php if ( is_date() ) { ?>
			
			<?php
				$currentm = get_the_date('m');
				$currenty = get_the_date('Y');
			?>

		    <div class="navigation--prev">
			    <?php if ( function_exists( 'dap_next_posts_link' ) ) {
			        dap_next_posts_link(); ?>
			        	<i class="ss-icon ss-standard">previous</i>
			        </a>
			    <?php } ?>
		    </div>

			<?php if (is_day()) { ?>
				<div class="navigation--grid">
				    <a href=" <?php echo get_month_link($currenty, $currentm); ?>">
						<i class="ss-icon ss-standard">grid</i>
				    </a>
			    </div>

			<?php } elseif (is_month()) { ?>
				<div class="navigation--grid">
				    <a href="<?php echo get_permalink( get_page_by_path( 'archive' ) ); ?>" title="Finds Archive">
						<i class="ss-icon ss-standard">rows</i>
				    </a>
			    </div>
			<?php } ?>

		    <div class="navigation--next">
			    <?php if ( function_exists( 'dap_previous_posts_link' ) ) { 
			        dap_previous_posts_link(); ?>
			        	<i class="ss-icon ss-standard">next</i>
			        </a>
			    <?php } ?>
		    </div>

	    <?php } elseif (is_search()) { ?>
			<div class="navigation--search">
			    <a href="<?php echo get_permalink( get_page_by_path( 'archive' ) ); ?>" title="Finds Archive">
					<i class="ss-icon ss-standard">rows</i>
			    </a>
		    </div>

			<?php } elseif (is_page( 'random' )) { ?>
				<div class="navigation--search">
				    <a href="<?php echo get_permalink( get_page_by_path( 'archive' ) ); ?>" title="Finds Archive">
						<i class="ss-icon ss-standard">rows</i>
				    </a>
			    </div>
	    <?php } ?>
	</div>
</div>