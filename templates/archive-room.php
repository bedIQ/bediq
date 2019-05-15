<?php
/**
 * The Template for displaying all archive room.
 *
 * Override this template by copying it to yourtheme/bediq/archive-room.php
 *
 * @author      Tareq Hasan
 * @package     BedIQ/Templates
 * @version     0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'bediq' ); ?>

    <?php do_action( 'bediq_before_main_content' ); ?>

        <div class="bediq-container">

            <div class="bediq-col-9">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php bediq_get_template_part( 'content', 'archive-room' ); ?>

                <?php endwhile; // end of the loop. ?>
            </div> <!-- .bediq-col-9 -->

            <div class="bediq-col-3 sidebar">
                <?php dynamic_sidebar( 'bediq-archive-room' ); ?>
            </div> <!-- .sidebar -->

        </div> <!-- .bediq-container -->

    <?php do_action( 'bediq_after_main_content' ); ?>

<?php get_footer( 'bediq' ); ?>