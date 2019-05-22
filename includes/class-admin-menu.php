<?php
namespace bedIQ;

/**
 *  Class Admin
 */
class Admin_Menu {

    /**
     *  Constructor for Admin class
     */
    function __construct() {
        add_action( 'wp_dashboard_setup', array( $this, 'replace_dashboard_widgets' ), 9999 );

        add_filter( 'custom_menu_order', array( $this, 'custom_menu_order' ), 10, 1 );
        add_filter( 'menu_order', array( $this, 'custom_menu_order' ), 10, 1 );

        add_action( 'admin_menu', array( $this, 'set_admin_menu_separator' ) );

        add_action( 'load-index.php', array( $this, 'remove_welcome_panel' ) );

        // add_filter( 'parent_file', array($this, 'fix_parent_menu' ) );
    }

    /**
     * Set menu separator
     */
    public function set_admin_menu_separator() {
        $position = 3;
        global $menu;

        $menu[$position] = array(
            0   =>  '',
            1   =>  'read',
            2   =>  'separator' . $position,
            3   =>  '',
            4   =>  'wp-menu-separator'
        );
    }

    /**
     * Rearance admin menu item
     *
     * @param  [type] $menu_order
     *
     * @return array
     */
    public function custom_menu_order( $menu_order ) {
        if ( !$menu_order ) return true;

        return array(
            'index.php',
            'separator1',
            'edit.php?post_type=room',
            'edit.php?post_type=offer',
            'edit.php?post_type=outlet',
            'separator3',
        );
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

    /**
     * highlight the proper top level menu
     *
     * @link http://wordpress.org/support/topic/moving-taxonomy-ui-to-another-main-menu?replies=5#post-2432769
     * @global obj $current_screen
     * @param string $parent_file
     * @return string
     */
    function fix_parent_menu( $parent_file ) {
        global $current_screen;

        $post_types = array(
            'bediq_room', 'bediq_event', 'bediq_offer', 'bediq_outlet',
            'bediq_facility', 'bediq_activity', 'bediq_leisure', 'bediq_services'
        );

        if ( in_array( $current_screen->post_type, $post_types ) ) {
            $parent_file = 'bediq';
        }

        return $parent_file;
    }
}