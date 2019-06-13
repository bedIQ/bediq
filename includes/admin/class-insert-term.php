<?php
namespace bedIQ\Admin;
/**
 * Class Insert_Term
 */
class Insert_Term {
    /**
     * Constructor for Insert_Term
     */
    function __construct() {
        add_action( 'init', array( $this, 'create_new_term' ), 9999 );
    }

    /**
     * Create term
     *
     * @return void
     */
    public function create_new_term() {
        $taxonomy   =   'accommodation_types';
        $terms      =   array(
            '0' =>  array(
                'name'          =>  __( 'Hotel Room', 'bediq' ),
                'slug'          =>  'hotel-room',
                'description'   =>  __( 'Hotel Room', 'bediq' )
            ),
            '1' =>  array(
                'name'          =>  __( 'Suite', 'bediq' ),
                'slug'          =>  'suite',
                'description'   =>  __( 'Suite', 'bediq' )
            ),
            '2' =>  array(
                'name'          =>  __( 'House/Villa', 'bediq' ),
                'slug'          =>  'house-villa',
                'description'   =>  __( 'House/Villa', 'bediq' )
            ),
            '3' =>  array(
                'name'          =>  __( 'Apartment/Residence', 'bediq' ),
                'slug'          =>  'apartment-residence',
                'description'   =>  __( 'Apartment/Residence', 'bediq' )
            ),
        );

        foreach ( $terms as $term ) {
            if ( ! term_exists( $term['name'], $taxonomy ) ) {
                wp_insert_term(
                    $term['name'],
                    $taxonomy
                );
            }
        }
    }
}