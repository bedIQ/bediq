<div class="bediq-col-12">
	<?php do_action( 'bediq_before_single_activity' ); ?>
</div>

<article itemscope itemtype="http://schema.org/Event" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="bediq-col-12">
    	<?php do_action( 'bediq_before_single_activity_summary' ); ?>
   	</div>

    <div class="bediq-col-12">
	    <?php do_action( 'bediq_single_activity_summary' ); ?>
	</div>

	<div class="bediq-col-12">
    	<?php do_action( 'bediq_after_single_activity_summary' ); ?>
    </div>

</article>

<div class="bediq-col-12">
	<?php do_action( 'bediq_after_single_activity' ); ?>
</div>