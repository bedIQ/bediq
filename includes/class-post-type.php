<?php
namespace bedIQ;

/**
 * Class Registger Post type
 */
class Post_Type {

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

        register_post_type( 'accommodation', array(
            'label'           => __( 'Accommodations', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 5,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'accommodations'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'taxonomies'      => [ 'accommodation_types' ],
            'menu_icon'       => 'dashicons-admin-home',
            'labels'          => array(
                'name'               => __( 'Accommodations', 'bediq' ),
                'singular_name'      => __( 'Accommodation', 'bediq' ),
                'menu_name'          => __( 'Accommodations', 'bediq' ),
                'add_new'            => __( 'Add New', 'bediq' ),
                'add_new_item'       => __( 'Add New Accommodations', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Accommodation', 'bediq' ),
                'new_item'           => __( 'New Accommodation', 'bediq' ),
                'view'               => __( 'View Accommodation', 'bediq' ),
                'view_item'          => __( 'View Accommodation', 'bediq' ),
                'search_items'       => __( 'Search Accommodations', 'bediq' ),
                'not_found'          => __( 'No Accommodations Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Accommodations Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Accommodation', 'bediq' ),
            ),
            'rewrite'          =>  array(
                'slug'               => 'accommodations',
                'with_front'         => true,
                'pages'              => true,
                'feeds'              => true,
            ),
            'capabilities'    => array(
                'edit_post'          => 'edit_accommodation',
                'read_post'          => 'read_accommodation',
                'delete_post'        => 'delete_accommodation',
                'edit_others_posts'  => 'edit_others_accommodations',
                'publish_posts'      => 'publish_accommodations',
                'read_private_posts' => 'read_private_accommodations',
                'create_posts'       => 'create_accommodations',
            ),
            'map_meta_cap' => true
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
            'rewrite'          =>  array(
                'slug'               => 'offers',
                'with_front'         => true,
                'pages'              => true,
                'feeds'              => true,
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
            'rewrite'          =>  array(
                'slug'               => 'outlets',
                'with_front'         => true,
                'pages'              => true,
                'feeds'              => true,
            ),
        ) );

        //taxonomies
        register_taxonomy( 'accommodation_types', [],
            array(
                'hierarchical'   => true,
                'label'          => __( 'Accommodation Types', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => ''),
                'singular_label' => __( 'Accommodation Type', 'bediq' )
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