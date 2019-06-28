<?php
namespace bedIQ\Schema;

/**
 * Class Schema Meeting
 */
class Meeting {

    /**
     * Get json
     *
     * @return array
     */
    public function get_json( $post ) {
        $post_title   =  $post->post_title;
        $post_content =  $post->post_content;
        $floor_size   =  get_post_meta( $post->ID, 'floor_size', true );
        $policy_name  =  get_post_meta( $post->ID, 'policy_name', true );

        $json   =   [
            '@context'    =>  'http://schema.org',
            'type'        =>  'MeetingRoom',
            'name'        =>  $post_title,
            'description' =>  $post_content,
            'floorSize'   =>  $floor_size,
            'petsAllowed' =>  $policy_name
        ];

        return $json;
    }
}