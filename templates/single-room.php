<?php
/**
 * The Template for displaying all single room.
 *
 * Override this template by copying it to yourtheme/bediq/single-room.php
 *
 * @author 		Tareq Hasan
 * @package 	BedIQ/Templates
 * @version     0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'bediq' ); ?>

	<?php do_action( 'bediq_before_main_content' ); ?>

    <div class="bediq-container">

        <?php
        /**
         * bediq_template_post_title, 10
         * bediq_template_room_thumbnail_image, 15
         */
        do_action( 'bediq_before_single_room' ); ?>

        <div class="bediq-col-9">

    		<?php while ( have_posts() ) : the_post(); ?>

    			<?php bediq_get_template_part( 'content', 'single-room' ); ?>

    		<?php endwhile; // end of the loop. ?>
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

    </div>

	<?php do_action( 'bediq_after_main_content' ); ?>

<?php get_footer( 'bediq' ); ?>