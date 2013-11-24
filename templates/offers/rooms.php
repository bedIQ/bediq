<?php
global $post;

// Find connected rooms
$connected = new WP_Query( array('connected_type' => 'room_to_offer', 'connected_items' => get_queried_object(), 'nopaging' => true) );

// Display connected rooms
$rooms = array();
if ( $connected->have_posts() ) {
    while ($connected->have_posts()) {
        $connected->the_post();

        $rooms[] = sprintf( '<a href="%s">%s</a>', get_permalink(), the_title( '', '', false ) );
    }

    wp_reset_postdata();
}

printf(
    __( 'This hotel deal is bookable in %s from %s until %s for stays %s until %s with the following conditions:', 'bediq' ),
    implode( ', ', $rooms ),
    date_i18n( 'j F, Y', (int) get_post_meta( $post->ID, 'price_valid_from', true ) ),
    date_i18n( 'j F, Y', (int) get_post_meta( $post->ID, 'price_valid_to', true ) ),
    date_i18n( 'j F, Y', (int) get_post_meta( $post->ID, 'stay_from', true ) ),
    date_i18n( 'j F, Y', (int) get_post_meta( $post->ID, 'stay_until', true ) )
);
