<?php
namespace bedIQ\Schema;
/**
 *
 */
class Offer {
    /**
     * Get json
     *
     * @return array;
     */
    public function get_json( $post ) {
        $post_title    =   $post->post_title;
        $post_content  =   $post->post_content;
        $availabl_from =   $this->get_post_type( $post->ID );
        $category      =   $this->get_custom_taxonomy();

        $json   =   [
            '@context'          =>  'http://schema.org',
            'type'              =>  'Offer',
            'name'              =>  $post_title,
            'description'       =>  $post_content,
            'availableAtOrFrom' =>  $availabl_from,
            'category'          =>  $category
        ];

        return $json;
    }

    /**
     * get post type
     *
     * @return array
     */
    public function get_post_type( $post_id ) {
        $post_ids   = bediq_get_sub_field( 'location_available', 'available_offer', $post_id );
        $post_name  = [];

        if ( count( $post_ids ) ) {
            foreach ( $post_ids as $post_id ) {
                $post        = get_post( $post_id );
                $post_name[] = $post->post_title;
            }
        }

        return $post_name;
    }

    /**
     * get custom taxonomy
     *
     * @return array
     */
    public function get_custom_taxonomy() {
        $terms     =   get_terms( 'offer_types' );
        $term_name =   [];

        if ( count( $terms ) ) {
            foreach ( $terms as $term ) {
               $term_name[] = $term->name;
            }
        }

        return $term_name;
    }
}