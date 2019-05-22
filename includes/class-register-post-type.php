<?php
namespace bedIQ;

/**
 * Class Registger Post type
 */
class Register_Post_Type {

    /**
     * Constructor for Register Post Type class
     */
    function __construct() {
        add_action( 'init', array( $this, 'init_post_types' ) );
    }

    /**
     * Register necessary post types and custom taxonomies
     *
     * @return void
     */
    function init_post_types() {

        $show_in_menu = true;

        register_post_type( 'room', array(
            'label'           => __( 'Rooms', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 5,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'rooms'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'taxonomies'      => [ 'room_types' ],
            'menu_icon'       => 'dashicons-admin-home',
            'labels'          => array(
                'name'               => __( 'Rooms', 'bediq' ),
                'singular_name'      => __( 'Room', 'bediq' ),
                'menu_name'          => __( 'Rooms', 'bediq' ),
                'add_new'            => __( 'Add Room', 'bediq' ),
                'add_new_item'       => __( 'Add New Room', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Room', 'bediq' ),
                'new_item'           => __( 'New Room', 'bediq' ),
                'view'               => __( 'View Room', 'bediq' ),
                'view_item'          => __( 'View Room', 'bediq' ),
                'search_items'       => __( 'Search Rooms', 'bediq' ),
                'not_found'          => __( 'No Rooms Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Rooms Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Room', 'bediq' ),
            ),
        ) );

        register_post_type( 'offer', array(
            'label'           => __( 'Offers', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 6,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'offers'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'menu_icon'       => 'dashicons-tickets-alt',
            'taxonomies'      => [ 'hotel_offers' ],
            'labels'          => array(
                'name'               => __( 'Offers', 'bediq' ),
                'singular_name'      => __( 'Offer', 'bediq' ),
                'menu_name'          => __( 'Offers', 'bediq' ),
                'add_new'            => __( 'Add Offer', 'bediq' ),
                'add_new_item'       => __( 'Add New Offer', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Offer', 'bediq' ),
                'new_item'           => __( 'New Offer', 'bediq' ),
                'view'               => __( 'View Offer', 'bediq' ),
                'view_item'          => __( 'View Offer', 'bediq' ),
                'search_items'       => __( 'Search Offers', 'bediq' ),
                'not_found'          => __( 'No Offers Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Offers Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Offer', 'bediq' ),
            ),
        ) );

        register_post_type( 'outlet', array(
            'label'           => __( 'Outlets', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 7,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'outlet'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'menu_icon'       => 'dashicons-store',
            'labels'          => array(
                'name'               => __( 'Outlets', 'bediq' ),
                'singular_name'      => __( 'Outlet', 'bediq' ),
                'menu_name'          => __( 'Outlet', 'bediq' ),
                'add_new'            => __( 'Add Outlet', 'bediq' ),
                'add_new_item'       => __( 'Add New Outlet', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Outlet', 'bediq' ),
                'new_item'           => __( 'New Outlet', 'bediq' ),
                'view'               => __( 'View Outlet', 'bediq' ),
                'view_item'          => __( 'View Outlet', 'bediq' ),
                'search_items'       => __( 'Search Outlet', 'bediq' ),
                'not_found'          => __( 'No Outlet Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Outlet Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Outlet', 'bediq' ),
            ),
        ) );

        //taxonomies
        register_taxonomy( 'room_types', [ 'room' ],
            array(
                'hierarchical'   => true,
                'label'          => __( 'Room Types', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => ''),
                'singular_label' => __( 'Room Type', 'bediq' )
            )
        );

        register_taxonomy( 'offer_types', array( 'offer' ),
            array(
                'hierarchical'   => true,
                'label'          => __( 'Offer Types', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => 'hotel-offers'),
                'singular_label' => __( 'Offers', 'bediq' )
            )
        );
    }
}