<?php
namespace bedIQ\Manager;
/**
 * Schema Manager
 */
class Schema_Manager {
    /**
     * Constructor Schema_Manager class
     */
    function __construct() {
        $this->include_files();
        add_action( 'wp_head', [ $this, 'print_schema_markup' ] );
    }

    /**
     * Include files
     *
     * @return void
     */
    public function include_files() {
        // Schema
        require_once BEDIQ_INCLUDES . '/schema/class-schema-accommodation.php';
        require_once BEDIQ_INCLUDES . '/schema/class-schema-offer.php';
        require_once BEDIQ_INCLUDES . '/schema/class-schema-outlet.php';
        require_once BEDIQ_INCLUDES . '/schema/class-schema-poi.php';
        require_once BEDIQ_INCLUDES . '/schema/class-schema-facility.php';
        require_once BEDIQ_INCLUDES . '/schema/class-schema-meeting.php';
    }

    /**
     * print schema markup
     *
     * @return void
     */
    public function print_schema_markup() {
        $schemas = [
            'accommodation' =>  '\bedIQ\Schema\Accommodation',
            'offer'         =>  '\bedIQ\Schema\Offer',
            'outlet'        =>  '\bedIQ\Schema\Outlet',
            'poi'           =>   '\bedIQ\Schema\Point_Of_Interest',
            'facility'      =>   '\bedIQ\Schema\Facility',
            'meeting'       =>   '\bedIQ\Schema\Meeting',
        ];

        foreach ( $schemas as $post_type => $schema ) {
            if ( ! is_singular( $post_type ) ) {
                continue;
            }
            global $post;

            $schema_object = new $schema();
            $output        = "\n\n";
            $output        .= "\n";
            $output        .= '<script type="application/ld+json">';
            $output        .= json_encode( $schema_object->get_json( $post ), JSON_UNESCAPED_UNICODE );
            $output        .= '</script>';
            $output        .= "\n\n";

            echo $output;
        }
    }
}