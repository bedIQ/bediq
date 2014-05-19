<article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="bediq-summary-before">
        <?php
        /**
         * bediq_template_room_schema, 15
         * bediq_template_room_book_now, 20
         */
        do_action( 'bediq_before_single_room_summary' ); ?>
    </div>

    <div class="bediq-summary">

        <?php
        /**
         * bediq_template_post_content, 10
         */
        do_action( 'bediq_single_room_summary' ); ?>
    </div>

    <div class="bediq-summary-after">
        <?php
        /**
         * bediq_template_room_tab_room 15
         */
        do_action( 'bediq_after_single_room_summary' ); ?>
    </div>

</article>