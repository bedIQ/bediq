
<div class="bediq-full">
	<div class="bediq-row">
		<?php do_action( 'bediq_before_single_leisure' ); ?>
	</div>
</div>

<article itemscope itemtype="http://schema.org/LocalBusiness" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="bediq-full">
		<div class="bediq-row bg">
	    	<?php do_action( 'bediq_before_single_leisure_summary' ); ?>
	    </div>
	</div>

	<div class="bediq-full">
		<div class="bediq-row">
        	<?php do_action( 'bediq_single_leisure_summary' ); ?>
        </div>
	</div>

	<div class="bediq-full">
		<div class="bediq-row">
		    <?php do_action( 'bediq_after_single_leisure_summary' ); ?>
		</div>
	</div>

</article>

<div class="bediq-full">
	<div class="bediq-row">
		<?php do_action( 'bediq_after_single_leisure' ); ?>
	</div>
</div>