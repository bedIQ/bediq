<div class="bediq-container">
	<div class="bediq-row">
		<div class="bediq-full">
			<?php do_action( 'bediq_before_archive_event' ); ?>
		</div>
	</div>

	<article itemscope itemtype="http://schema.org/Event" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="bediq-row">
			<div class="bediq-full bg">
		    	<?php do_action( 'bediq_before_archive_event_summary' ); ?>
		    </div>
		</div>

		<div class="bediq-row">
			<div class="bediq-full">
	        	<?php do_action( 'bediq_archive_event_summary' ); ?>
	        </div>
		</div>

		<div class="bediq-row">
			<div class="bediq-full">
			    <?php do_action( 'bediq_after_archive_event_summary' ); ?>
			</div>
		</div>

	</article>

	<div class="bediq-row">
		<div class="bediq-full">
			<?php do_action( 'bediq_after_archive_event' ); ?>
		</div>
	</div>
</div>