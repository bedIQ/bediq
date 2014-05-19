<?php
/**
 * bediq_template_room_book_now - 10
 */
do_action( 'bediq_before_archive_room' ); ?>

    <article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php
        /**
         * bediq_template_featured_image - 10
         * bediq_template_archive_post_title - 15
         * bediq_template_post_content - 20
         */
        do_action( 'bediq_archive_room' ); ?>

    </article>

<?php do_action( 'bediq_after_archive_room' ); ?>
