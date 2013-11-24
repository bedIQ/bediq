<?php

function bediq_p2p_register_connection() {
    // Make sure the Posts 2 Posts plugin is active.
    if ( !function_exists( 'p2p_register_connection_type' ) )
        return;

    p2p_register_connection_type( array(
        'name' => 'event_to_offer',
        'from' => 'offer',
        'to' => 'event'
    ) );

    p2p_register_connection_type( array(
        'name' => 'event_to_outlet',
        'from' => 'outlet',
        'to' => 'event'
    ) );

    p2p_register_connection_type( array(
        'name' => 'event_to_leisure',
        'from' => 'leisure',
        'to' => 'event'
    ) );

    p2p_register_connection_type( array(
        'name' => 'event_to_facility',
        'from' => 'event',
        'to' => 'facility'
    ) );

    p2p_register_connection_type( array(
        'name' => 'room_to_offer',
        'from' => 'offer',
        'to' => 'room'
    ) );

    //activity
    p2p_register_connection_type( array(
        'name' => 'outlet_to_activity',
        'from' => 'outlet',
        'to' => 'activity'
    ) );

    p2p_register_connection_type( array(
        'name' => 'leisure_to_activity',
        'from' => 'leisure',
        'to' => 'activity'
    ) );

    p2p_register_connection_type( array(
        'name' => 'facility_to_activity',
        'from' => 'facility',
        'to' => 'activity'
    ) );

    p2p_register_connection_type( array(
        'name' => 'offer_to_activity',
        'from' => 'offer',
        'to' => 'activity'
    ) );

    //services
    p2p_register_connection_type( array(
        'name' => 'offer_to_services',
        'from' => 'offer',
        'to' => 'services'
    ) );

    //offer
    p2p_register_connection_type( array(
        'name' => 'offer_to_facility',
        'from' => 'offer',
        'to' => 'facility'
    ) );

    p2p_register_connection_type( array(
        'name' => 'offer_to_outlet',
        'from' => 'offer',
        'to' => 'outlet'
    ) );

    p2p_register_connection_type( array(
        'name' => 'offer_to_leisure',
        'from' => 'offer',
        'to' => 'leisure'
    ) );
}

add_action( 'wp_loaded', 'bediq_p2p_register_connection' );