<?php do_action( 'bediq_before_single_event' ); ?>

<article itemscope itemtype="http://schema.org/Event" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    do_action( 'bediq_before_single_event_summary' );
    ?>

    <div class="summary entry-summary">
        <?php do_action( 'bediq_single_event_summary' ); ?>
    </div>

    <?php do_action( 'bediq_after_single_event_summary' ); ?>

</article>

<?php do_action( 'bediq_after_single_event' ); ?>