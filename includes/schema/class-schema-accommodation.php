<?php
namespace bedIQ\Schema;
/**
 * Class Schema accommodation
 */
class Accommodation {
    /**
     * Get json
     *
     * @return array
     */
    public function get_json( $post ) {
        $post_title       =   $post->post_title;
        $post_description =   $post->post_content;
        $floor_size       =   get_post_meta( $post->ID, 'acm_floor_size', true );
        $floor_size_unit  =   get_post_meta( $post->ID, 'acm_floor_size_unit', true );
        $occupancy        =   get_post_meta( $post->ID, 'acm_occupancy', true );
        $acm_types        =   get_post_meta( $post->ID, 'accommodation_taxonomy_types', true );
        $from_price       =   get_post_meta( $post->ID, 'acm_from_price', true );
        $amenity_feature  =   bediq_get_sub_field( 'acm_features_and_amenities', 'acm_features', $post->ID );
        $occupancy        =   bediq_get_sub_field( 'acm_bed_room', 'acm_occupancy', $post->ID );
        $pet_allowed      =   get_post_meta( $post->ID, 'acm_policies', true );
        $bed              =   $this->get_bed_room( $post->ID );

        $json   =   [
            '@context'       =>  'http://schema.org',
            'type'           =>  'HotelRoom',
            'name'           =>  $post_title,
            'description'    =>  $post_description,
            'occupancy'      =>  $occupancy,
            'price'          =>  $from_price,
            'floorSize'      =>  $floor_size,
            'bed'            =>  $bed,
            'amenityFeature' =>  $amenity_feature,
            'petsAllowed'    =>  $pet_allowed,
        ];

        return $json;
    }

    /**
     * get bed room
     *
     * @return array
     */
    public function get_bed_room( $post_id ) {

        if ( ! function_exists( 'get_field' ) ) {
            return;
        }
        $sub_filed_values   =   [];
        $fields             =   get_field( 'acm_bed_room', $post_id );

        if ( count( $fields ) ) {
            foreach ( $fields as $field ) {
                foreach ( $field['acm_beddings'] as $single_field ) {
                    if ( is_array( $single_field ) ) {
                        foreach ( $single_field as $value ) {
                            $sub_filed_values[] = ucwords(str_replace('_', ' ', $value ));
                        }
                    }
                }
            }
        }

       return $sub_filed_values;
    }


}