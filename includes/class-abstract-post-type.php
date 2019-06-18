<?php
namespace bedIQ;

/**
 * Class Registger Post type
 */
abstract class Post_Type {
    /**
     * Register necessary post types and custom taxonomies
     *
     * @return void
     */
    abstract public function register_post_type();

    /**
     * Register taxonomy
     *
     * @return void
     */
    abstract public function register_taxonomy();
}