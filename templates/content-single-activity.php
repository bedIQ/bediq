<div class="bediq-full">
	<div class="bediq-row">
		<?php do_action( 'bediq_before_single_activity' ); ?>
	</div>
</div>

<article itemscope itemtype="http://schema.org/Event" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="bediq-full">
		<div class="bediq-row bg">
	    	<?php do_action( 'bediq_before_single_activity_summary' ); ?>
	    </div>
	</div>

	<div class="bediq-full">
		<div class="bediq-row">
        	<?php do_action( 'bediq_single_activity_summary' ); ?>
        </div>
	</div>

	<div class="bediq-full">
		<div class="bediq-row">
		    <?php do_action( 'bediq_after_single_activity_summary' ); ?>
		</div>
	</div>

</article>

<div class="bediq-full">
	<div class="bediq-row">
		<?php do_action( 'bediq_after_single_activity' ); ?>
	</div>
</div>