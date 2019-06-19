<?php
namespace bedIQ;

/**
 * Class Registger Post type
 */
interface Post_Type {
    /**
     * Register necessary post types and custom taxonomies
     *
     * @return void
     */
    public function register_post_type();

    /**
     * Register taxonomy
     *
     * @return void
     */
    public function register_taxonomy();
}