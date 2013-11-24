<?php
global $post;

$start_date = (int) get_post_meta( $post->ID, 'start_time', true );
$end_date = (int) get_post_meta( $post->ID, 'end_time', true );
$event_locations = array();// wedevs_get_event_locations( $post->ID );
?>
<div class="widget bediq-event-details">
    <h3 class="widget-title"><?php _e( 'Details of', 'bediq' ); ?> <?php the_title(); ?></h3>

    <p><?php _e( 'Begins:', 'bediq' ); ?> <time itemprop="startDate" datetime="<?php echo date_i18n( 'c', $start_date, true ) ?>"><?php echo date_i18n( 'j F, Y g:i a', $start_date ); ?></time></p>
    <p><?php _e( 'Ends:', 'bediq' ); ?> <time itemprop="endDate" datetime="<?php echo date_i18n( 'c', $end_date ) ?>"><?php echo date_i18n( 'j F, Y g:i a', $end_date ); ?></time></p>

    <?php if ( $event_locations ): ?>
        <p><?php _e( 'Location:', 'bediq' ); ?> <?php echo implode( ', ', $event_locations ); ?></p>
    <?php endif ?>

</div>