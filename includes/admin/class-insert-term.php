<?php
namespace bedIQ\Admin;
/**
 * Class Insert_Term
 */
class Insert_Term {

    /**
     * Create term
     *
     * @return void
     */
    public function create_new_term() {
        $accommodation_terms      =   [
            '0' =>  [
                'name'          =>  __( 'Hotel Room', 'bediq' ),
                'slug'          =>  'hotel-room',
                'description'   =>  __( 'Hotel Room', 'bediq' ),
                'taxonomy'      =>  'accommodation_types'
            ],
            '1' =>  [
                'name'          =>  __( 'Suite', 'bediq' ),
                'slug'          =>  'suite',
                'description'   =>  __( 'Suite', 'bediq' ),
                'taxonomy'      =>  'accommodation_types'
            ],
            '2' =>  [
                'name'          =>  __( 'House/Villa', 'bediq' ),
                'slug'          =>  'house-villa',
                'description'   =>  __( 'House/Villa', 'bediq' ),
                'taxonomy'      =>  'accommodation_types'
            ],
            '3' =>  [
                'name'          =>  __( 'Apartment/Residence', 'bediq' ),
                'slug'          =>  'apartment-residence',
                'description'   =>  __( 'Apartment/Residence', 'bediq' ),
                'taxonomy'      =>  'accommodation_types'
            ],
            '4' =>  [
                'name'          =>  __( 'Accommodation', 'bediq' ),
                'slug'          =>  'accommodation',
                'description'   => __( 'Accommodation', 'bediq' ),
                'taxonomy'      =>  'offer_types'
            ]
        ];

        $offer_terms    =   [
            '0' =>  [
                'name'          =>  __( 'Accommodation', 'bediq' ),
                'slug'          =>  'accommodation',
                'description'   => __( 'Accommodation', 'bediq' ),
                'taxonomy'      =>  'offer_types'
            ],
            '1' =>  [
                'name'          =>  __( 'Dining', 'bediq' ),
                'slug'          =>  'dining',
                'description'   => __( 'Dining', 'bediq' ),
                'taxonomy'      =>  'offer_types'
            ],
            '2' =>  [
                'name'          =>  __( 'Activity', 'bediq' ),
                'slug'          =>  'activity',
                'description'   => __( 'Activity', 'bediq' ),
                'taxonomy'      =>  'offer_types'
            ],
            '3' =>  [
                'name'          =>  __( 'Activity', 'bediq' ),
                'slug'          =>  'activity',
                'description'   => __( 'Activity', 'bediq' ),
                'taxonomy'      =>  'offer_types'
            ],
            '4' =>  [
                'name'          =>  __( 'Meeting', 'bediq' ),
                'slug'          =>  'meeting',
                'description'   => __( 'Meeting', 'bediq' ),
                'taxonomy'      =>  'offer_types'
            ],
            '5' =>  [
                'name'          =>  __( 'Event', 'bediq' ),
                'slug'          =>  'event',
                'description'   => __( 'Event', 'bediq' ),
                'taxonomy'      =>  'offer_types'
            ],
        ];


        $terms = array_merge( $accommodation_terms, $offer_terms );
        foreach ( $terms as $term ) {
            if ( ! term_exists( $term['name'], $term['taxonomy'] ) ) {
                wp_insert_term(
                    $term['name'],
                    $term['taxonomy'],
                    [
                        'slug'          =>  $term['slug'],
                        'description'   =>  $term['description']
                    ]
                );
            }
        }
    }
}