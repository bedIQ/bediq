<?php

class Bed_IQ_Settings {

    function __construct() {
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_menu() {
        $menu_position = apply_filters( 'bediq_menu_position', 16 );
        $capability = apply_filters( 'bediq_menu_capability', 'activate_plugins' );

        add_menu_page( __( 'Bed IQ', 'wpuf' ), __( 'Bed IQ', 'wpuf' ), $capability, 'bediq', array($this, 'plugin_settings'), null, $menu_position );
        add_submenu_page( 'bediq', __( 'Archive', 'wpuf' ), __( 'Archive', 'wpuf' ), $capability, 'bediq-archives', array($this, 'plugin_settings') );
    }

    function plugin_settings() {
        echo 'hi';
    }
}

new Bed_IQ_Settings();