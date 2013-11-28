<div class="bediq-full">
    <div class="bediq-row">
        <?php do_action( 'bediq_before_single_room' ); ?>
    </div>
</div>

<article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="bediq-full">
        <div class="bediq-row bg">
            <?php do_action( 'bediq_before_single_room_summary' ); ?>
        </div>
    </div>

    <div class="bediq-full">
        <div class="bediq-row">
            <?php do_action( 'bediq_single_room_summary' ); ?>
        </div>
    </div>

    <div class="bediq-full">
        <div class="bediq-row">
            <?php do_action( 'bediq_after_single_room_summary' ); ?>
        </div>
    </div>

</article>

<div class="bediq-full">
    <div class="bediq-row">
        <?php do_action( 'bediq_after_single_room' ); ?>
    </div>
</div>