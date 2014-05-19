<div class="bediq-container">

    <?php
    /**
     * bediq_template_post_title, 10
     * bediq_template_room_thumbnail_image, 15
     */
    do_action( 'bediq_before_single_room' ); ?>

    <div class="bediq-col-9">

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
    </div>

    <div class="bediq-col-3 sidebar">

        <aside class="room-nav-widget">
            <?php
                $current_room = get_the_ID();
                $rooms = new WP_Query('post_type=bediq_room&posts_per_page=-1');
            ?>
            <ul class="room-nav">

                <?php while ( $rooms->have_posts() ) : $rooms->the_post(); ?>
                <?php
                    $class = (get_the_ID() == $current_room ? 'current-room' : '');
                ?>
                <li><a class="<?php echo $class; ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </aside>

        <?php dynamic_sidebar( 'room-sidebar' ); ?>

    </div> <!-- .bediq-col-3 .sidebar -->

</div> <!-- .bediq-container -->