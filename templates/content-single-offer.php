<?php do_action( 'bediq_before_single_offer' ); ?>

<article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    do_action( 'bediq_before_single_offer_summary' );
    ?>

    <div class="summary entry-summary">
        <?php do_action( 'bediq_single_offer_summary' ); ?>
    </div>

    <?php do_action( 'bediq_after_single_offer_summary' ); ?>

</article>

<?php do_action( 'bediq_after_single_offer' ); ?>