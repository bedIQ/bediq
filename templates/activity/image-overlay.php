<?php
global $post;

$image = esc_attr( get_post_meta( $post->ID, 'overlay', true ) );
$start_date = (int) get_post_meta( $post->ID, 'start_time', true );
$end_date = (int) get_post_meta( $post->ID, 'end_time', true );
$event_locations = array();// wedevs_get_activity_locations( $post->ID );
?>

<div class="bediq-activity-image-overlay">
    <?php
    if ( function_exists( 'wpthumb' ) && !empty( $image ) ) {
        $image = wpthumb( $image, 'width=700&height=267&crop=1' );
    }

    if ( $image ) {
        ?>
        <img src="<?php echo $image; ?>" alt="image" itemprop="image" />
    <?php } ?>

    <div class="bediq-hotel-offers">
        <div class="alignright" style="text-align:right;">
            <time itemprop="startDate" datetime="<?php echo bediq_date_iso( $start_date ) ?>"><?php echo date_i18n( 'j F, Y', $start_date ); ?></time><br />
            <?php echo date_i18n( 'g:i a', $start_date ); ?><br />
            <?php echo implode( ', ', $event_locations ); ?>
        </div>
    </div>
</div>