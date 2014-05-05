<?php

function bediq_p2p_register_connection() {
    // Make sure the Posts 2 Posts plugin is active.
    if ( !function_exists( 'p2p_register_connection_type' ) )
        return;

    p2p_register_connection_type( array(
        'name' => 'event_to_offer',
        'from' => 'bediq_offer',
        'to' => 'bediq_event'
    ) );

    p2p_register_connection_type( array(
        'name' => 'event_to_outlet',
        'from' => 'bediq_outlet',
        'to' => 'bediq_event'
    ) );

    p2p_register_connection_type( array(
        'name' => 'event_to_leisure',
        'from' => 'bediq_leisure',
        'to' => 'bediq_event'
    ) );

    p2p_register_connection_type( array(
        'name' => 'event_to_facility',
        'from' => 'bediq_event',
        'to' => 'bediq_facility'
    ) );

    p2p_register_connection_type( array(
        'name' => 'room_to_offer',
        'from' => 'bediq_offer',
        'to' => 'bediq_room'
    ) );

    //activity
    p2p_register_connection_type( array(
        'name' => 'outlet_to_activity',
        'from' => 'bediq_outlet',
        'to' => 'bediq_activity'
    ) );

    p2p_register_connection_type( array(
        'name' => 'leisure_to_activity',
        'from' => 'bediq_leisure',
        'to' => 'bediq_activity'
    ) );

    p2p_register_connection_type( array(
        'name' => 'facility_to_activity',
        'from' => 'bediq_facility',
        'to' => 'bediq_activity'
    ) );

    p2p_register_connection_type( array(
        'name' => 'offer_to_activity',
        'from' => 'bediq_offer',
        'to' => 'bediq_activity'
    ) );

    //services
    p2p_register_connection_type( array(
        'name' => 'offer_to_services',
        'from' => 'bediq_offer',
        'to' => 'bediq_services'
    ) );

    //offer
    p2p_register_connection_type( array(
        'name' => 'offer_to_facility',
        'from' => 'bediq_offer',
        'to' => 'bediq_facility'
    ) );

    p2p_register_connection_type( array(
        'name' => 'offer_to_outlet',
        'from' => 'bediq_offer',
        'to' => 'bediq_outlet'
    ) );

    p2p_register_connection_type( array(
        'name' => 'offer_to_leisure',
        'from' => 'bediq_offer',
        'to' => 'bediq_leisure'
    ) );
}

add_action( 'wp_loaded', 'bediq_p2p_register_connection' );