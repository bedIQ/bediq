<?php do_action( 'bediq_before_single_outlet' ); ?>

<article itemscope itemtype="http://schema.org/LocalBusiness" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    do_action( 'bediq_before_single_outlet_summary' );
    ?>

    <div class="summary entry-summary">
        <?php do_action( 'bediq_single_outlet_summary' ); ?>
    </div>

    <?php do_action( 'bediq_after_single_outlet_summary' ); ?>

</article>

<?php do_action( 'bediq_after_single_outlet' ); ?>