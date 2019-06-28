<?php
namespace bedIQ\Schema;
/**
 * Class Schema Facility
 */
class Facility {

    /**
     * Get json
     *
     * @return array
     */
    public function get_json( $post ) {
        $post_title    =   $post->post_title;
        $post_content  =   $post->post_content;
        $opening_hours =   bediq_get_sub_field( 'facility_visibility', 'facility_opening_days', $post->ID );

        $json       =   [
            '@context'     =>  'http://schema.org',
            'type'         =>  'ParkingFacility',
            'name'         =>  $post_title,
            'description'  =>  $post_content,
            'openingHours' =>  $opening_hours
        ];

        return $json;
    }
}