<?php

class Bed_IQ_Settings {

    function __construct() {
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_menu() {
        $menu_position = apply_filters( 'bediq_menu_position', 16 );
        $capability = apply_filters( 'bediq_menu_capability', 'activate_plugins' );

        add_menu_page( __( 'bedIQ', 'wpuf' ), __( 'bedIQ', 'wpuf' ), $capability, 'bediq', array($this, 'plugin_settings'), null, $menu_position );
        add_submenu_page( 'bediq', __( 'Rooms', 'bediq' ), __( 'Rooms', 'bediq' ), $capability, 'edit.php?post_type=bediq_room' );
        add_submenu_page( 'bediq', __( 'Events', 'bediq' ), __( 'Events', 'bediq' ), $capability, 'edit.php?post_type=bediq_event' );
        add_submenu_page( 'bediq', __( 'Offers', 'bediq' ), __( 'Offers', 'bediq' ), $capability, 'edit.php?post_type=bediq_offer' );
        add_submenu_page( 'bediq', __( 'Outlets', 'bediq' ), __( 'Outlet', 'bediq' ), $capability, 'edit.php?post_type=bediq_outlet' );
        add_submenu_page( 'bediq', __( 'Facilities', 'bediq' ), __( 'Facilities', 'bediq' ), $capability, 'edit.php?post_type=bediq_facility' );
        add_submenu_page( 'bediq', __( 'Activities', 'bediq' ), __( 'Activities', 'bediq' ), $capability, 'edit.php?post_type=bediq_activity' );
        add_submenu_page( 'bediq', __( 'Leisure', 'bediq' ), __( 'Leisure', 'bediq' ), $capability, 'edit.php?post_type=bediq_leisure' );
        add_submenu_page( 'bediq', __( 'Services', 'bediq' ), __( 'Services', 'bediq' ), $capability, 'edit.php?post_type=bediq_services' );
    }

    function plugin_settings() {
        echo '<div class="wrap">';
            echo '<h2>bedIQ Services</h2';
        echo '</div>';
    }
}

new Bed_IQ_Settings();