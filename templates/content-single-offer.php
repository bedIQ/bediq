<div class="bediq-col-12">
	<?php do_action( 'bediq_before_single_offer' ); ?>
</div>

<article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="bediq-col-12">
	    <?php do_action( 'bediq_before_single_offer_summary' ); ?>
	</div>

	<div class="bediq-col-12">
        <?php do_action( 'bediq_single_offer_summary' ); ?>
	</div>

	<div class="bediq-col-12">
	    <?php do_action( 'bediq_after_single_offer_summary' ); ?>
	</div>

</article>

<div class="bediq-col-12">
	<?php do_action( 'bediq_after_single_offer' ); ?>
</div>