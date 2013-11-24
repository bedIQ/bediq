<?php
/**
 * The Template for displaying all single room.
 *
 * Override this template by copying it to yourtheme/bediq/single-event.php
 *
 * @author      Tareq Hasan
 * @package     BedIQ/Templates
 * @version     0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'bediq' ); ?>

    <?php do_action( 'bediq_before_main_content' ); ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php bediq_get_template_part( 'content', 'single-event' ); ?>

        <?php endwhile; // end of the loop. ?>

    <?php do_action( 'bediq_after_main_content' ); ?>

    <?php do_action( 'bediq_sidebar' ); ?>

<?php get_footer( 'bediq' ); ?>