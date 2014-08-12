<?php
/*
Plugin Name: bedIQ - Responsive hotel websites
Plugin URI: http://bediq.com/
Description: Responsive hotel websites
Version: 0.1
Author: Tareq Hasan
Author URI: http://tareq.weDevs.com/
License: GPL2
*/

/**
 * Copyright (c) 2013 Tareq (email: tareq@wedevs.com). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

// don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Bed_IQ class
 *
 * @class Bed_IQ The class that holds the entire Bed_IQ plugin
 */
class Bed_IQ {

    public $plugin_url;
    public $plugin_path;
    public $theme_dir_path;

    /**
     * Constructor for the Bed_IQ class
     *
     * Sets up all the appropriate hooks and actions
     * within our plugin.
     *
     * @uses register_activation_hook()
     * @uses register_deactivation_hook()
     * @uses is_admin()
     * @uses add_action()
     */
    public function __construct() {

        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        $this->file_includes();

        // Localize our plugin
        add_action( 'init', array( $this, 'localization_setup' ) );
        add_action( 'init', array( $this, 'init_post_types' ) );
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'admin_notices', array( $this, 'required_plugin_notice' ) );

        add_filter( 'template_include', array( $this, 'template_loader' ), 20 );

        // Loads frontend scripts and styles
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

        add_filter( 'body_class', array($this, 'body_class') );

        add_filter( 'parent_file', array($this, 'fix_parent_menu' ) );
    }

    /**
     * Initializes the Bed_IQ() class
     *
     * Checks for an existing Bed_IQ() instance
     * and if it doesn't find one, creates it.
     */
    public static function get_instance() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new Bed_IQ();
        }

        return $instance;
    }

    function init() {
        $this->theme_dir_path = apply_filters( 'bediq_theme_dir_path', 'bediq/' );
    }

    function file_includes() {

        if ( is_admin() ) {
            require_once dirname( __FILE__ ) . '/includes/metadata.php';
            require_once dirname( __FILE__ ) . '/admin/settings.php';
        } else {
            require_once dirname( __FILE__ ) . '/includes/core-functions.php';
            require_once dirname( __FILE__ ) . '/includes/template-functions.php';
        }

        require_once dirname( __FILE__ ) . '/includes/posts-to-posts.php';
    }

    /**
     * Placeholder for activation function
     *
     * Nothing being called here yet.
     */
    public function activate() {

    }

    /**
     * Placeholder for deactivation function
     *
     * Nothing being called here yet.
     */
    public function deactivate() {

    }

    /**
     * Initialize plugin for localization
     *
     * @uses load_plugin_textdomain()
     */
    public function localization_setup() {
        load_plugin_textdomain( 'bediq', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     * Enqueue admin scripts
     *
     * Allows plugin assets to be loaded.
     *
     * @uses wp_enqueue_script()
     * @uses wp_localize_script()
     * @uses wp_enqueue_style
     */
    public function enqueue_scripts() {

        /**
         * All styles goes here
         */
        wp_enqueue_style( 'bediq-styles', plugins_url( 'assets/css/style.css', __FILE__ ), false, date( 'Ymd' ) );
        wp_enqueue_style( 'ui-styles', plugins_url( 'assets/css/ui.css', __FILE__ ), false, date( 'Ymd' ) );
        wp_enqueue_style( 'flexslider', plugins_url( 'assets/css/flexslider.css', __FILE__ ), false, date( 'Ymd' ) );

        /**
         * All scripts goes here
         */
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-accordion' );
        wp_enqueue_script( 'jquery-ui-tabs' );
        wp_enqueue_script( 'flexslider', plugins_url( 'assets/js/jquery.flexslider.js', __FILE__ ), array( 'jquery' ), false, true );
        wp_enqueue_script( 'bediq-scripts', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), false, true );


        /**
         * Example for setting up text strings from Javascript files for localization
         *
         * Uncomment line below and replace with proper localization variables.
         */
        // $translation_array = array( 'some_string' => __( 'Some string to translate', 'bediq' ), 'a_value' => '10' );
        // wp_localize_script( 'base-plugin-scripts', 'bediq', $translation_array ) );

    }

    /**
     * Register necessary post types and custom taxonomies
     *
     * @return void
     */
    function init_post_types() {

        $show_in_menu = false;

        register_post_type( 'bediq_room', array(
            'label'           => __( 'Rooms', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'rooms'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
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

        register_post_type( 'bediq_event', array(
            'label'           => __( 'Events', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'events'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'labels'          => array(
                'name'               => __( 'Events', 'bediq' ),
                'singular_name'      => __( 'Event', 'bediq' ),
                'menu_name'          => __( 'Event', 'bediq' ),
                'add_new'            => __( 'Add Event', 'bediq' ),
                'add_new_item'       => __( 'Add New Event', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Event', 'bediq' ),
                'new_item'           => __( 'New Event', 'bediq' ),
                'view'               => __( 'View Event', 'bediq' ),
                'view_item'          => __( 'View Event', 'bediq' ),
                'search_items'       => __( 'Search Events', 'bediq' ),
                'not_found'          => __( 'No Events Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Events Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Event', 'bediq' ),
            ),
        ) );

        register_post_type( 'bediq_offer', array(
            'label'           => __( 'Offers', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'offers'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'labels'          => array(
                'name'               => __( 'Offers', 'bediq' ),
                'singular_name'      => __( 'Offer', 'bediq' ),
                'menu_name'          => __( 'Offer', 'bediq' ),
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


        register_post_type( 'bediq_outlet', array(
            'label'           => __( 'Outlets', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'outlet'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
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

        register_post_type( 'bediq_facility', array(
            'label'           => __( 'Facilities', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'facility'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'labels'          => array(
                'name'               => __( 'Facilities', 'bediq' ),
                'singular_name'      => __( 'Facility', 'bediq' ),
                'menu_name'          => __( 'Facility', 'bediq' ),
                'add_new'            => __( 'Add Facility', 'bediq' ),
                'add_new_item'       => __( 'Add New Facility', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Facility', 'bediq' ),
                'new_item'           => __( 'New Facility', 'bediq' ),
                'view'               => __( 'View Facility', 'bediq' ),
                'view_item'          => __( 'View Facility', 'bediq' ),
                'search_items'       => __( 'Search Facilities', 'bediq' ),
                'not_found'          => __( 'No Facilities Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Facilities Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Facility', 'bediq' ),
            ),
        ) );

        register_post_type( 'bediq_activity', array(
            'label'           => __( 'Activities', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'activity'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'labels'          => array(
                'name'               => __( 'Activities', 'bediq' ),
                'singular_name'      => __( 'Activity', 'bediq' ),
                'menu_name'          => __( 'Activity', 'bediq' ),
                'add_new'            => __( 'Add Activity', 'bediq' ),
                'add_new_item'       => __( 'Add New Activity', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Activity', 'bediq' ),
                'new_item'           => __( 'New Activity', 'bediq' ),
                'view'               => __( 'View Activity', 'bediq' ),
                'view_item'          => __( 'View Activity', 'bediq' ),
                'search_items'       => __( 'Search Activities', 'bediq' ),
                'not_found'          => __( 'No Activities Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Activities Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Activity', 'bediq' ),
            ),
        ) );

        register_post_type( 'bediq_leisure', array(
            'label'           => __( 'Leisure', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'leisure'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'labels'          => array(
                'name'               => __( 'Leisure', 'bediq' ),
                'singular_name'      => __( 'Leisure', 'bediq' ),
                'menu_name'          => __( 'Leisure', 'bediq' ),
                'add_new'            => __( 'Add Leisure', 'bediq' ),
                'add_new_item'       => __( 'Add New Leisure', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Leisure', 'bediq' ),
                'new_item'           => __( 'New Leisure', 'bediq' ),
                'view'               => __( 'View Leisure', 'bediq' ),
                'view_item'          => __( 'View Leisure', 'bediq' ),
                'search_items'       => __( 'Search Leisure', 'bediq' ),
                'not_found'          => __( 'No Leisure Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Leisure Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Leisure', 'bediq' ),
            ),
        ) );

        register_post_type( 'bediq_services', array(
            'label'           => __( 'Services', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'services'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'labels' => array(
                'name'               => __( 'Services', 'bediq' ),
                'singular_name'      => __( 'Service', 'bediq' ),
                'menu_name'          => __( 'Service', 'bediq' ),
                'add_new'            => __( 'Add Service', 'bediq' ),
                'add_new_item'       => __( 'Add New Service', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Service', 'bediq' ),
                'new_item'           => __( 'New Service', 'bediq' ),
                'view'               => __( 'View Service', 'bediq' ),
                'view_item'          => __( 'View Service', 'bediq' ),
                'search_items'       => __( 'Search Services', 'bediq' ),
                'not_found'          => __( 'No Services Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Services Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Service', 'bediq' ),
            ),
        ) );

        //taxonomies
        register_taxonomy( 'bediq_accommodation', array( 'room' ),
            array(
                'hierarchical'   => true,
                'label'          => __( 'Accommodation', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => ''),
                'singular_label' => __( 'Accommodation', 'bediq' )
            )
        );

        register_taxonomy( 'bediq_hotel_offers', array( 'offer' ),
            array(
                'hierarchical'   => true,
                'label'          => __( 'Hotel Offers', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => 'hotel-offers'),
                'singular_label' => __( 'Offers', 'bediq' )
            )
        );

        register_taxonomy( 'bediq_venues', array( 'facility' ),
            array(
                'hierarchical'   => true,
                'label'          => __( 'Venues', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => ''),
                'singular_label' => __( 'Venues', 'bediq' )
            )
        );

        register_taxonomy( 'bediq_dining', array( 'outlet' ),
            array(
                'hierarchical'   => true,
                'label'          => __( 'Dining', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => ''),
                'singular_label' => __( 'Dining', 'bediq' )
            )
        );

        register_taxonomy( 'bediq_things_to_do', array( 'activity' ),
            array(
                'hierarchical'   => true,
                'label'          => __( 'Things To Do', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => ''),
                'singular_label' => __( 'Things To Do', 'bediq' )
            )
        );

        register_taxonomy( 'bediq_accommodation', array( 'room' ),
            array(
                'hierarchical'   => true,
                'label'          => __( 'Accommodation', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => ''),
                'singular_label' => __( 'Accommodation', 'bediq' )
            )
        );
    }

    /**
     * Show error nag in admin area if required plugins are not
     * installed
     *
     * @return void
     */
    function required_plugin_notice() {

        if ( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }

        $required_plugins = array(
            array(
                'function' => 'cmb_init',
                'name'     => 'Custom Meta Boxes',
                'url'      => 'https://github.com/humanmade/Custom-Meta-Boxes'
            )
        );

        $not_installed = array();
        foreach ($required_plugins as $plugin) {
            if ( !function_exists( $plugin['function'] ) ) {
                $not_installed[] = sprintf( '<a href="%s" target="_blank">%s</a>', esc_url( $plugin['url'] ), $plugin['name'] );
            }
        }

        if ( $not_installed ) {
            ?>
            <div class="error">
                <p>
                    <?php printf( __( 'Please install %s plugin(s) for <strong>Bed IQ</strong> to work properly', 'bediq' ), implode( ', ', $not_installed ) ); ?>
                </p>
            </div>
            <?php
        }
    }

    /**
     * Get the plugin url.
     *
     * @access public
     * @return string
     */
    public function plugin_url() {
        if ( $this->plugin_url ) {
            return $this->plugin_url;
        }

        return $this->plugin_url = untrailingslashit( plugins_url( '/', __FILE__ ) );
    }


    /**
     * Get the plugin path.
     *
     * @access public
     * @return string
     */
    public function plugin_path() {
        if ( $this->plugin_path ) {
            return $this->plugin_path;
        }

        return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
    }

    /**
     * Get the template path.
     *
     * @access public
     * @return string
     */
    public function template_path() {
        return $this->plugin_path() . '/templates/';
    }


    /**
     * Get Ajax URL.
     *
     * @access public
     * @return string
     */
    public function ajax_url() {
        return admin_url( 'admin-ajax.php', 'relative' );
    }

    function template_loader( $template ) {
        $find = array( 'bediq.php' );
        $file = '';

        if ( is_single() && get_post_type() == 'bediq_room' ) {
            $file   = 'single-bediq_room.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_single() && get_post_type() == 'bediq_event' ) {
            $file   = 'single-bediq_event.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_single() && get_post_type() == 'bediq_offer' ) {
            $file   = 'single-bediq_offer.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_single() && get_post_type() == 'bediq_outlet' ) {
            $file   = 'single-bediq_outlet.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_single() && get_post_type() == 'bediq_facility' ) {
            $file   = 'single-bediq_facility.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_single() && get_post_type() == 'bediq_activity' ) {
            $file   = 'single-bediq_activity.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_single() && get_post_type() == 'bediq_leisure' ) {
            $file   = 'single-bediq_leisure.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_single() && get_post_type() == 'bediq_services' ) {
            $file   = 'single-bediq_services.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;
        }


        else if ( is_post_type_archive('bediq_room')) {
            $file   = 'archive-bediq_room.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;
        }else if ( is_post_type_archive('bediq_event')) {
            $file   = 'archive-bediq_event.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_post_type_archive('bediq_offer')) {
            $file   = 'archive-bediq_offer.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_post_type_archive('bediq_outlet')) {
            $file   = 'archive-bediq_outlet.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_post_type_archive('bediq_facility')) {
            $file   = 'archive-bediq_facility.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_post_type_archive('bediq_activity')) {
            $file   = 'archive-bediq_activity.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_post_type_archive('bediq_leisure')) {
            $file   = 'archive-bediq_leisure.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_post_type_archive('bediq_services')) {
            $file   = 'archive-bediq_services.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;
        }

        if ( $file ) {
            $template = locate_template( $find );

            if ( ! $template ) {
                $template = $this->template_path() . $file;
            }
        }

        return $template;
    }

    function body_class( $classes ) {
        $current_theme = wp_get_theme();
        $classes[] = $current_theme->template;

        return $classes;
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

} // Bed_IQ

global $bediq;
$bediq = Bed_IQ::get_instance();