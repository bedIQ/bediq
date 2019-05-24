<?php
namespace bedIQ\Admin;

/**
 * Class Cleanup
 */
class Cleanup {

    /**
     * Constructor for Cleanup Class
     */
    function __construct() {
        add_action( 'wp_dashboard_setup', array( $this, 'replace_dashboard_widgets' ), 9999 );
        add_action( 'load-index.php', array( $this, 'remove_welcome_panel' ) );
    }

    /**
     * Replace dashboard widgets
     *
     * @return void
     */
    public function replace_dashboard_widgets() {
       global $wp_meta_boxes;
        $wp_meta_boxes['dashboard']['normal']['core'] = array();
        $wp_meta_boxes['dashboard']['side']['core'] = array();
    }

    /**
     * Remove wp dashboard welcome panel
     *
     * @return void
     */
    public function remove_welcome_panel() {
        remove_action('welcome_panel', 'wp_welcome_panel');
    }
}