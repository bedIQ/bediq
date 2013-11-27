<?php
global $post;

$start_date = (int) get_post_meta( $post->ID, 'start_time', true );
$end_date = (int) get_post_meta( $post->ID, 'end_time', true );
$event_locations = array();// wedevs_get_event_locations( $post->ID );
?>

    <div class="bediq-time">
        <div>
            <time itemprop="startDate" datetime="<?php echo bediq_date_iso( $start_date ) ?>"><?php echo date_i18n( 'j F, Y', $start_date ); ?></time><br />
            <?php echo date_i18n( 'g:i a', $start_date ); ?><br />
            <?php echo implode( ', ', $event_locations ); ?>
        </div>
    </div>