<?php
global $post;

$start_date = (int) get_post_meta( $post->ID, 'start_time', true );
$end_date = (int) get_post_meta( $post->ID, 'end_time', true );
$event_locations = array();// wedevs_get_activity_locations( $post->ID );
?>
<div class="widget bediq-outlet-details">
    <div class="bediq-widget-area">
        <div class="widget">
            <h3 class="widget-title"><?php _e( 'Details of', 'twentyeleven' ); ?> <?php the_title(); ?></h3>

            <?php _e( 'Begins:', 'twentyeleven' ); ?> <time itemprop="startDate" datetime="<?php echo date_i18n( 'c', $start_date ) ?>"><?php echo date_i18n( 'j F, Y g:i a', $start_date ); ?></time><br />
            <?php _e( 'Ends:', 'twentyeleven' ); ?> <time itemprop="endDate" datetime="<?php echo date_i18n( 'c', $end_date ) ?>"><?php echo date_i18n( 'j F, Y g:i a', $end_date ); ?></time><br />
            <?php _e( 'Location:', 'twentyeleven' ); ?> <?php echo implode( ', ', $event_locations ); ?>
        </div>
        <div class="widget">
            <h3 class="widget-title"><?php _e( 'Organizer', 'twentyeleven' ); ?></h3>
            <?php
            printf( __( 'This event is organized by: ', 'twentyeleven' ) );
            printf( '<a href="%s">%s</a>', esc_attr( get_author_posts_url( $user->ID ) ), $user->display_name );
            ?>
        </div>
    </div>
</div>