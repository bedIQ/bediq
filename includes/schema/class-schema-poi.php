<?php
namespace bedIQ\Schema;
/**
 * Class POI
 */
class Point_Of_Interest {
    /**
     * Get json
     *
     * @return array
     */
    public function get_json( $post ) {
        $name           =   $post->post_title;
        $description    =   $post->post_content;
        $opening_days   =   bediq_get_sub_field( 'poi_visibility', 'poi_opening_days', $post->ID );

        $json   =   [
            'name'          =>  $name,
            'description'   =>  $description,
            'openingHours'  =>  $opening_days,
        ];

        return $json;
    }
}