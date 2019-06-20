<?php
/*
Plugin Name: bedIQ - Responsive hotel websites
Plugin URI: https://bediq.com/
Description: Responsive hotel websites
Version: 0.1
Author: Tareq Hasan
Author URI: https://bediq.com
License: GPL2
*/

/**
 * Copyright (c) 2019 Tareq (email: info@bediq.com). All rights reserved.
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
 * bedIQ_Plugin class
 *
 * @class bedIQ_Plugin The class that holds the entire bedIQ_Plugin plugin
 */
class bedIQ_Plugin {

    /**
     * Store plugin url
     *
     * @var string
     */
    public $plugin_url;

    /**
     * Store plugin path
     *
     * @var string
     */
    public $plugin_path;

    /**
     * Store theme directory path
     *
     * @var string
     */
    public $theme_dir_path;

    /**
     * Store the intance of various classes
     *
     * @var array
     */
    private $container = [];

    /**
     * Constructor for the bedIQ_Plugin class
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

        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        register_deactivation_hook( __FILE__, [ $this, 'deactivate' ] );
        $this->file_includes();
        $this->init_classes();

        // Localize our plugin
        add_action( 'init', [ $this, 'localization_setup' ] );
        add_action( 'init', [ $this, 'init' ] );
        // Register Post Type and taxonomes
        add_action( 'init', [ $this, 'register_post_types' ] );
        add_action( 'init', [ $this, 'register_taxonomies' ] );

        add_action( 'admin_notices', [ $this, 'required_plugin_notice' ] );

        add_filter( 'template_include', [ $this, 'template_loader' ], 20 );

        // Loads frontend scripts and styles
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );

        add_filter( 'body_class', [ $this, 'body_class' ] );
    }

    /**
     * Initializes the bedIQ_Plugin() class
     *
     * Checks for an existing bedIQ_Plugin() instance
     * and if it doesn't find one, creates it.
     */
    public static function instance() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Get theme directory path
     *
     * @return void
     */
    public function init() {
        $this->theme_dir_path = apply_filters( 'bediq_theme_dir_path', 'bediq/' );
    }

    /**
     * Included files
     *
     * @return void
     */
    public function file_includes() {

        if ( is_admin() ) {
            require_once dirname( __FILE__ ) . '/includes/admin/class-insert-term.php';
            require_once dirname( __FILE__ ) . '/includes/admin/class-admin.php';
        } else {
            require_once dirname( __FILE__ ) . '/includes/template-functions.php';
        }
        require_once dirname( __FILE__ ) . '/includes/core-functions.php';
        require_once dirname( __FILE__ ) . '/includes/posts-to-posts.php';
        require_once dirname( __FILE__ ) . '/includes/interface-post-type.php';
        require_once dirname( __FILE__ ) . '/includes/post-types/class-post-type-accommodation.php';
        require_once dirname( __FILE__ ) . '/includes/post-types/class-post-type-offer.php';
        require_once dirname( __FILE__ ) . '/includes/post-types/class-post-type-outlet.php';
        require_once dirname( __FILE__ ) . '/includes/post-types/class-post-type-point-of-interest.php';
    }

    /**
     * Instantiate classes
     *
     * @return void
     */
    public function init_classes() {
        if ( is_admin() ) {
            new \bedIQ\Admin\Admin();
        }
        $this->container['accommodation']   =   new \bedIQ\Post_Type\Post_Type_Accommodation();
        $this->container['offer']           =   new \bedIQ\Post_Type\Post_Type_Offer();
        $this->container['outlet']          =   new \bedIQ\Post_Type\Post_Type_Outlet();
        $this->container['interest']        =   new \bedIQ\Post_Type\Post_Type_Point_Of_Interest();
    }

    /**
     * Placeholder for activation function
     *
     * Nothing being called here yet.
     */
    public function activate() {
        $term       = new \bedIQ\Admin\Insert_Term();

        $this->register_taxonomies();
        $term->create_new_term();

        flush_rewrite_rules();
    }

    /**
     * Register post type
     *
     * @return void
     */
    public function register_post_types() {
        $containers = $this->container;
        foreach( $containers as $container ) {
            $container->register_post_type();
        }
    }

    /**
     * Register taxonomy
     *
     * @return void
     */
    public function register_taxonomies() {
        $containers = $this->container;

        foreach( $containers as $container ) {
            $container->register_taxonomy();
        }
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
        wp_enqueue_script( 'flexslider', plugins_url( 'assets/js/jquery.flexslider.js', __FILE__ ), [ 'jquery' ], false, true );
        wp_enqueue_script( 'bediq-scripts', plugins_url( 'assets/js/script.js', __FILE__ ), [ 'jquery' ], false, true );


        /**
         * Example for setting up text strings from Javascript files for localization
         *
         * Uncomment line below and replace with proper localization variables.
         */
        // $translation_array = array( 'some_string' => __( 'Some string to translate', 'bediq' ), 'a_value' => '10' );
        // wp_localize_script( 'base-plugin-scripts', 'bediq', $translation_array ) );

    }

    public function admin_enqueue_scripts() {
        wp_enqueue_style( 'bediq-admin-style', plugins_url( 'assets/css/admin.css', __FILE__ ), false, date( 'Ymd' ) );
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

        $required_plugins = [
            [
                'function' => 'acf',
                'name'     => 'Advanced Custom Fields',
                'url'      => 'https://wordpress.org/plugins/advanced-custom-fields'
            ]
        ];

        $not_installed = [];
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
        $find = [ 'bediq.php' ];
        $file = '';

        if ( is_single() && get_post_type() == 'room' ) {
            $file   = 'single-room.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_single() && get_post_type() == 'offer' ) {
            $file   = 'single-offer.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_single() && get_post_type() == 'outlet' ) {
            $file   = 'single-outlet.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        }

        else if ( is_post_type_archive('room')) {
            $file   = 'archive-room.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_post_type_archive('offer')) {
            $file   = 'archive-offer.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        } else if ( is_post_type_archive('outlet')) {
            $file   = 'archive-outlet.php';
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
} // bedIQ_Plugin

/**
 * Returns the bedIQ instance
 *
 * @return \bedIQ_Plugin
 */
function bediq() {
    return bedIQ_Plugin::instance();
}

// kickoff the plugin
bediq();
