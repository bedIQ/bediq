<?php
namespace bedIQ\Schema;

/**
 * Class outlet
 */
class Outlet {
/**
     * Get json
     *
     * @return array;
     */
    public function get_json( $post ) {
        $post_title   =   $post->post_title;
        $post_content =   $post->post_content;
        $price_range  =   get_post_meta( $post->ID, 'outlet_typical_pricing', true );
        $outlet_types =   get_post_meta( $post->ID, 'outlet_types', true );
        $opening_days =   bediq_get_sub_field( 'outlet_visibility', 'outlet_opening_days', $post->ID );
        $types        =   ( $outlet_types == 'food_establishment' ) ? 'FoodEstablishment' : 'HealthAndBeautyBusiness';

        $json   =   [
            '@context'     =>  'http://schema.org',
            'type'         =>  $types,
            'name'         =>  $post_title,
            'description'  =>  $post_content,
            'priceRange'   =>  $price_range,
            'openingHours' =>  $opening_days,
        ];

        return $json;
    }
}