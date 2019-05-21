<?php
namespace bedIQ;
/**
 * Class Advanced Custom fields
 */

class Advanced_Custom_Fields {

    /**
     * Constructor for Advanced_Custom_Fields Class
     */
    function __construct() {
        $this->bediq_custom_fields();
    }

    /**
     * Get custom fields
     *
     * @param  array $fields
     *
     * @param  integer $parent
     *
     * @return array
     */
    public function bediq_custom_fields() {
        $user_dropdown = $this->bediq_users_dropdown();

        if ( function_exists( 'acf_add_local_field_group' ) ) {
            acf_add_local_field_group( array(
                'key' => 'room_features',
                'title' => 'Room Features',
                'fields' => array(
                    array(
                        'key' => 'room_type',
                        'label' => 'Room Type',
                        'name' => 'room_type',
                        'type' => 'select',
                        'ui' => 1,
                        'choices'  => array(
                            'single'    => 'Single',
                            'double'    => 'Double',
                            'twin'      => 'Twin',
                            'tiple'     => 'Triple',
                            'quad'      => 'Quad',
                            'family'    => 'Family',
                            'family'    => 'Family',
                            'suit'      => 'Suit',
                            'villa'     => 'Villa',
                            'bungalow'  => 'Bungalow'
                        ),
                    ),
                    array(
                        'key' => 'room_size',
                        'label' => 'Room Size',
                        'name' => 'room_size',
                        'type' => 'text',
                        'instructions' => __( 'Please enter the total size of the guest room', 'bediq' ),
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'occupancy_adults',
                        'label' => 'Occupancy Adults',
                        'name' => 'occupancy_adults',
                        'type' => 'text',
                        'instructions' => __( 'Please enter the regular number of adults for this room', 'bediq' ),
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'occupancy_children',
                        'label' => 'Occupancy Children',
                        'name' => 'occupancy_children',
                        'type' => 'text',
                        'instructions' => __( 'Please enter the regular number of children for this room', 'bediq' ),
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'extrabeds',
                        'label' => 'Extrabeds',
                        'name' => 'extrabeds',
                        'type' => 'text',
                        'instructions' => __( 'Please enter the max. allowable number of Extrabeds (e.g. 1 Extrabed for Adults and 2 Extrabeds for Children)', 'bediq' ),
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'min_price',
                        'label' => 'Min. Price',
                        'name' => 'min_price',
                        'type' => 'text',
                        'instructions' => __( 'Please enter the lowest BAR rate for this room, e.g. $1600', 'bediq' ),
                        'placeholder' => '',
                    ),
                    array(
                        'key'     => 'pet_policy',
                        'label'   => 'Please select your pet policy',
                        'name'    => 'pet_policy',
                        'type'    => 'select',
                        'choices' => array(
                            'not allowed'                      => 'not allowed',
                            'not allowed (guide animals only)' => 'not allowed (guide animals only)',
                            'small pets free of charge'        => 'small pets free of charge',
                            'free of charge'                   => 'free of charge',
                            'at a charge'                      => 'at a charge'
                        ),
                        'ui' => 1,
                        'instructions' => __( 'Please add all items you would like to display on your websit.', 'bediq' ),
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'entertainments',
                        'label' => 'Entertainment',
                        'name' => 'entertainments',
                        'type' => 'repeater',
                        'instructions' => __( 'Please add all items you would like to display on your websit.', 'bediq' ),
                        'layout' => 'row',
                        'button_label' => 'Add New',
                        'sub_fields' => array(
                            array(
                                'key' => 'entertainment',
                                'label' => '',
                                'name' => 'entertainment',
                                'type' => 'text'
                            ),
                        ),
                    ),
                    array(
                        'key'   => 'room_features_field',
                        'label' => 'Room Features',
                        'name'  => 'room_features_field',
                        'type'  => 'repeater',
                        'instructions' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
                        'layout'       => 'row',
                        'button_label' => 'Add New',
                        'sub_fields'   => array(
                            array(
                                'key' => 'room_feature',
                                'label' => '',
                                'name' => 'room_feature',
                                'type' => 'text'
                            ),
                        ),
                    ),
                    array(
                        'key'   => 'bed_features',
                        'label' => 'Bed Features',
                        'name'  => 'bed_features',
                        'type'  => 'repeater',
                        'instructions' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
                        'layout'       => 'row',
                        'button_label' => 'Add New',
                        'sub_fields'   => array(
                            array(
                                'key' => 'bed_feature',
                                'label' => '',
                                'name' => 'bed_feature',
                                'type' => 'text'
                            ),
                        ),
                    ),
                    array(
                        'key'   => 'bathrooms',
                        'label' => 'Bathroom',
                        'name'  => 'bathrooms',
                        'type'  => 'repeater',
                        'instructions' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
                        'layout'       => 'row',
                        'button_label' => 'Add New',
                        'sub_fields'   => array(
                            array(
                                'key' => 'bathroom',
                                'label' => '',
                                'name' => 'bathroom',
                                'type' => 'text'
                            ),
                        ),
                    ),
                    array(
                        'key'   => 'communications',
                        'label' => 'Communication',
                        'name'  => 'communications',
                        'type'  => 'repeater',
                        'instructions' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
                        'layout'       => 'row',
                        'button_label' => 'Add New',
                        'sub_fields'   => array(
                            array(
                                'key' => 'communication',
                                'label' => '',
                                'name' => 'communication',
                                'type' => 'text'
                            ),
                        ),
                    ),
                    array(
                        'key'   => 'safeties',
                        'label' => 'Safety',
                        'name'  => 'safeties',
                        'type'  => 'repeater',
                        'instructions' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
                        'layout'       => 'row',
                        'button_label' => 'Add New',
                        'sub_fields'   => array(
                            array(
                                'key' => 'safety',
                                'label' => '',
                                'name' => 'safety',
                                'type' => 'text'
                            ),
                        ),
                    ),
                    array(
                        'key'   => 'on_requests',
                        'label' => 'On Request',
                        'name'  => 'on_Requests',
                        'type'  => 'repeater',
                        'instructions' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
                        'layout'       => 'row',
                        'button_label' => 'Add New',
                        'sub_fields'   => array(
                            array(
                                'key' => 'on_request',
                                'label' => '',
                                'name' => 'on_request',
                                'type' => 'text'
                            ),
                        ),
                    ),
                    array(
                        'key'   =>  'booking_engine',
                        'label' =>  'Link to Booking Engine',
                        'name'  =>  'booking_engine',
                        'type'  =>  'text',
                        'instructions'  =>  __( 'Please enter the link to your Booking Engine, preferably straight to the Room Type', 'bediq' ),
                    ),
                    array(
                        'key' => 'offers',
                        'label' => 'Offers',
                        'name' => 'offers',
                        'type' => 'post_object',
                        'instructions' => sprintf( __( 'Add offers to this room. You have to <a href="%s" target="_blank">create some offers</a> first!', 'bediq' ), admin_url( 'post-new.php?post_type=offer' ) ),
                        'post_type' => array(
                            0 => 'offer',
                        ),
                        'multiple' => 1,
                        'return_format' => 'object',
                        'ui' => 1
                    ),
                    array(
                        'key' => 'photographs',
                        'label' => 'Photographs of this room',
                        'name' => 'photographs',
                        'type' => 'gallery',
                        'instructions' => __( 'Some photographs of this room.', 'bediq' ),
                        'min' => '',
                        'max' => '',
                        'insert' => 'append',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'room',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                // 'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
            ));

            acf_add_local_field_group( array(
                'key' => 'offer_details',
                'title' => 'Offer Details',
                'fields' => array(
                    array(
                        'key' => 'url',
                        'label' => 'Url',
                        'name' => 'url',
                        'type' => 'text',
                        'instructions' => __( 'Please enter the URL of where the Offer will be bookable (e.g. link to booking engine)', 'bediq' ),
                    ),
                    array(
                        'key' => 'availability',
                        'label' => 'Availability',
                        'name' => 'availability',
                        'type' => 'text',
                        'instructions' => __( 'Please enter the availability, eg the total number of room nights or 5 rooms per day', 'bediq' ),
                    ),
                    array(
                        'key' => 'conditions',
                        'label' => 'Conditions',
                        'name' => 'conditions',
                        'type' => 'repeater',
                        'instructions' => __( 'Please enter all conditions that apply', 'bediq' ),
                        'layout' => 'row',
                        'button_label' => 'Add New',
                        'sub_fields' => array(
                            array(
                                'key' => 'condition',
                                'label' => '',
                                'name' => 'condition',
                                'type' => 'text',
                                'instructions' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'inclusions',
                        'label' => 'Inclusions',
                        'name' => 'inclusions',
                        'type' => 'repeater',
                        'layout' => 'row',
                        'button_label' => 'Add New',
                        'sub_fields' => array(
                            array(
                                'key' => 'inclusion',
                                'label' => '',
                                'name' => 'inclusion',
                                'type' => 'text'
                            ),
                        ),
                    ),
                    array(
                        'key' => 'discounted_price',
                        'label' => 'Discounted Price',
                        'name' => 'discounted_price',
                        'type' => 'text',
                        'instructions' => __( 'Please enter the promotional price', 'bediq' ),
                    ),
                    array(
                        'key' => 'original_price',
                        'label' => 'Original Price',
                        'name' => 'original_price',
                        'type' => 'text',
                        'instructions' => __( 'Please enter Original Price', 'bediq' ),
                    ),
                    array(
                        'key' => 'currency',
                        'label' => 'Currency',
                        'name' => 'currency',
                        'type' => 'select',
                        'ui' => 1,
                        'instructions' => __( 'Please select the currency', 'bediq' ),
                        'choices' => $this->bediq_get_currencies()
                    ),
                    array(
                        'key' => 'promotion_begins',
                        'label' => 'Promotion Begins',
                        'name' => 'promotion_begins',
                        'type' => 'date_picker',
                        'display_format' => 'd-m-Y',
                        'return_format' => 'd-m-Y',
                        'first_day' => 1,
                        'instructions' => __( 'Please enter the date from when the promotion is available', 'bediq' )
                    ),
                    array(
                        'key' => 'promotion_ends',
                        'label' => 'Promotion Ends',
                        'name' => 'promotion_ends',
                        'type' => 'date_picker',
                        'display_format' => 'd-m-Y',
                        'return_format' => 'd-m-Y',
                        'first_day' => 1,
                        'instructions' => __( 'Please select the date until which the promotion is available', 'bediq' )
                    ),
                    array(
                        'key' => 'stay_from',
                        'label' => 'Stay From',
                        'name' => 'stay_from',
                        'type' => 'date_picker',
                        'display_format' => 'd-m-Y',
                        'return_format' => 'd-m-Y',
                        'first_day' => 1
                    ),
                    array(
                        'key' => 'stay_until',
                        'label' => 'Stay Until',
                        'name' => 'stay_until',
                        'type' => 'date_picker',
                        'display_format' => 'd-m-Y',
                        'return_format' => 'd-m-Y',
                        'first_day' => 1
                    ),
                    array(
                        'key' => 'seller',
                        'label' => 'Seller',
                        'name' => 'seller',
                        'type' => 'select',
                        'choices'   => $user_dropdown,
                        'ui' => 1
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'offer',
                        ),
                    ),
                )
            ));
        }
    }

    /**
     * Get currencies
     *
     * @return array
     */
    public function bediq_get_currencies() {
        $currency = array(
            'AED' => 'United Arab Emirates Dirham',
            'AFN' => 'Afghanistan Afghani',
            'ALL' => 'Albania Lek',
            'AMD' => 'Armenia Dram',
            'ANG' => 'Netherlands Antilles Guilder',
            'AOA' => 'Angola Kwanza',
            'ARS' => 'Argentina Peso',
            'AUD' => 'Australia Dollar',
            'AWG' => 'Aruba Guilder',
            'AZN' => 'Azerbaijan New Manat',
            'BAM' => 'Bosnia and Herzegovina Convertible Marka',
            'BBD' => 'Barbados Dollar',
            'BDT' => 'Bangladesh Taka',
            'BGN' => 'Bulgaria Lev',
            'BHD' => 'Bahrain Dinar',
            'BIF' => 'Burundi Franc',
            'BMD' => 'Bermuda Dollar',
            'BND' => 'Brunei Darussalam Dollar',
            'BOB' => 'Bolivia Boliviano',
            'BRL' => 'Brazil Real',
            'BSD' => 'Bahamas Dollar',
            'BTN' => 'Bhutan Ngultrum',
            'BWP' => 'Botswana Pula',
            'BYR' => 'Belarus Ruble',
            'BZD' => 'Belize Dollar',
            'CAD' => 'Canada Dollar',
            'CDF' => 'Congo/Kinshasa Franc',
            'CHF' => 'Switzerland Franc',
            'CLP' => 'Chile Peso',
            'CNY' => 'China Yuan Renminbi',
            'COP' => 'Colombia Peso',
            'CRC' => 'Costa Rica Colon',
            'CUC' => 'Cuba Convertible Peso',
            'CUP' => 'Cuba Peso',
            'CVE' => 'Cape Verde Escudo',
            'CZK' => 'Czech Republic Koruna',
            'DJF' => 'Djibouti Franc',
            'DKK' => 'Denmark Krone',
            'DOP' => 'Dominican Republic Peso',
            'DZD' => 'Algeria Dinar',
            'EGP' => 'Egypt Pound',
            'ERN' => 'Eritrea Nakfa',
            'ETB' => 'Ethiopia Birr',
            'EUR' => 'Euro Member Countries',
            'FJD' => 'Fiji Dollar',
            'FKP' => 'Falkland Islands (Malvinas) Pound',
            'GBP' => 'United Kingdom Pound',
            'GEL' => 'Georgia Lari',
            'GGP' => 'Guernsey Pound',
            'GHS' => 'Ghana Cedi',
            'GIP' => 'Gibraltar Pound',
            'GMD' => 'Gambia Dalasi',
            'GNF' => 'Guinea Franc',
            'GTQ' => 'Guatemala Quetzal',
            'GYD' => 'Guyana Dollar',
            'HKD' => 'Hong Kong Dollar',
            'HNL' => 'Honduras Lempira',
            'HRK' => 'Croatia Kuna',
            'HTG' => 'Haiti Gourde',
            'HUF' => 'Hungary Forint',
            'IDR' => 'Indonesia Rupiah',
            'ILS' => 'Israel Shekel',
            'IMP' => 'Isle of Man Pound',
            'INR' => 'India Rupee',
            'IQD' => 'Iraq Dinar',
            'IRR' => 'Iran Rial',
            'ISK' => 'Iceland Krona',
            'JEP' => 'Jersey Pound',
            'JMD' => 'Jamaica Dollar',
            'JOD' => 'Jordan Dinar',
            'JPY' => 'Japan Yen',
            'KES' => 'Kenya Shilling',
            'KGS' => 'Kyrgyzstan Som',
            'KHR' => 'Cambodia Riel',
            'KMF' => 'Comoros Franc',
            'KPW' => 'Korea (North) Won',
            'KRW' => 'Korea (South) Won',
            'KWD' => 'Kuwait Dinar',
            'KYD' => 'Cayman Islands Dollar',
            'KZT' => 'Kazakhstan Tenge',
            'LAK' => 'Laos Kip',
            'LBP' => 'Lebanon Pound',
            'LKR' => 'Sri Lanka Rupee',
            'LRD' => 'Liberia Dollar',
            'LSL' => 'Lesotho Loti',
            'LTL' => 'Lithuania Litas',
            'LVL' => 'Latvia Lat',
            'LYD' => 'Libya Dinar',
            'MAD' => 'Morocco Dirham',
            'MDL' => 'Moldova Leu',
            'MGA' => 'Madagascar Ariary',
            'MKD' => 'Macedonia Denar',
            'MMK' => 'Myanmar (Burma) Kyat',
            'MNT' => 'Mongolia Tughrik',
            'MOP' => 'Macau Pataca',
            'MRO' => 'Mauritania Ouguiya',
            'MUR' => 'Mauritius Rupee',
            'MVR' => 'Maldives (Maldive Islands) Rufiyaa',
            'MWK' => 'Malawi Kwacha',
            'MXN' => 'Mexico Peso',
            'MYR' => 'Malaysia Ringgit',
            'MZN' => 'Mozambique Metical',
            'NAD' => 'Namibia Dollar',
            'NGN' => 'Nigeria Naira',
            'NIO' => 'Nicaragua Cordoba',
            'NOK' => 'Norway Krone',
            'NPR' => 'Nepal Rupee',
            'NZD' => 'New Zealand Dollar',
            'OMR' => 'Oman Rial',
            'PAB' => 'Panama Balboa',
            'PEN' => 'Peru Nuevo Sol',
            'PGK' => 'Papua New Guinea Kina',
            'PHP' => 'Philippines Peso',
            'PKR' => 'Pakistan Rupee',
            'PLN' => 'Poland Zloty',
            'PYG' => 'Paraguay Guarani',
            'QAR' => 'Qatar Riyal',
            'RON' => 'Romania New Leu',
            'RSD' => 'Serbia Dinar',
            'RUB' => 'Russia Ruble',
            'RWF' => 'Rwanda Franc',
            'SAR' => 'Saudi Arabia Riyal',
            'SBD' => 'Solomon Islands Dollar',
            'SCR' => 'Seychelles Rupee',
            'SDG' => 'Sudan Pound',
            'SEK' => 'Sweden Krona',
            'SGD' => 'Singapore Dollar',
            'SHP' => 'Saint Helena Pound',
            'SLL' => 'Sierra Leone Leone',
            'SOS' => 'Somalia Shilling',
            'SPL*' => 'Seborga Luigino',
            'SRD' => 'Suriname Dollar',
            'STD' => 'São Tomé and Príncipe Dobra',
            'SVC' => 'El Salvador Colon',
            'SYP' => 'Syria Pound',
            'SZL' => 'Swaziland Lilangeni',
            'THB' => 'Thailand Baht',
            'TJS' => 'Tajikistan Somoni',
            'TMT' => 'Turkmenistan Manat',
            'TND' => 'Tunisia Dinar',
            'TOP' => 'Tonga Pa\'anga',
            'TRY' => 'Turkey Lira',
            'TTD' => 'Trinidad and Tobago Dollar',
            'TVD' => 'Tuvalu Dollar',
            'TWD' => 'Taiwan New Dollar',
            'TZS' => 'Tanzania Shilling',
            'UAH' => 'Ukraine Hryvna',
            'UGX' => 'Uganda Shilling',
            'USD' => 'United States Dollar',
            'UYU' => 'Uruguay Peso',
            'UZS' => 'Uzbekistan Som',
            'VEF' => 'Venezuela Bolivar Fuerte',
            'VND' => 'Viet Nam Dong',
            'VUV' => 'Vanuatu Vatu',
            'WST' => 'Samoa Tala',
            'XAF' => 'Communauté Financière Africaine (BEAC) CFA Franc BEAC',
            'XCD' => 'East Caribbean Dollar',
            'XDR' => 'International Monetary Fund (IMF) Special Drawing Rights',
            'XOF' => 'Communauté Financière Africaine (BCEAO) Franc',
            'XPF' => 'Comptoirs Français du Pacifique (CFP) Franc',
            'YER' => 'Yemen Rial',
            'ZAR' => 'South Africa Rand',
            'ZMK' => 'Zambia Kwacha',
            'ZWD' => 'Zimbabwe Dollar'
        );

        return $currency;
    }

    /**
     * User dropdown depending on a user role
     *
     * @param string $role user capability
     * @return array
     */
    public function bediq_users_dropdown( $role = false ) {
        $items = array();
        $users = get_users();

        foreach ( $users as $user ) {
            //check role
            if ( $role && user_can( $user->ID, $role ) ) {
                $items[$user->ID] = $user->display_name;
            } else if ( !$role ) {
                $items[$user->ID] = $user->display_name;
            }
        }

        return $items;
    }
}

