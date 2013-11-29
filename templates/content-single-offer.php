<div class="bediq-container">
	<div class="bediq-row">
		<div class="bediq-full">
			<?php do_action( 'bediq_before_single_offer' ); ?>
		</div>
	</div>

	<article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="bediq-row">
			<div class="bediq-full bg">
		    	<?php do_action( 'bediq_before_single_offer_summary' ); ?>
		    </div>
		</div>

		<div class="bediq-row">
			<div class="bediq-full">
	        	<?php do_action( 'bediq_single_offer_summary' ); ?>
	        </div>
		</div>

		<div class="bediq-row">
			<div class="bediq-full">
			    <?php do_action( 'bediq_after_single_offer_summary' ); ?>
			</div>
		</div>

	</article>

	<div class="bediq-row">
		<div class="bediq-full">
			<?php do_action( 'bediq_after_single_offer' ); ?>
		</div>
	</div>
</div>
