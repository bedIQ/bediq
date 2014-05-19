<?php do_action( 'bediq_before_archive_room' ); ?>

    <article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php
        /**
         * @hooked bediq_template_featured_image - 10
         * @hooked bediq_template_archive_post_title - 15
         * @hooked bediq_template_room_book_now - 20
         * @hooked bediq_template_post_content - 25
         */
        do_action( 'bediq_archive_room' ); ?>

    </article>

<?php do_action( 'bediq_after_archive_room' ); ?>
