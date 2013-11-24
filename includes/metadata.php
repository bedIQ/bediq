<?php

function bediq_custom_fields() {
    if ( function_exists( 'x_add_metadata_group' ) && function_exists( 'x_add_metadata_field' ) ) {

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

        // Events and Activities
        x_add_metadata_group( 'events', array('event', 'activity'), array(
            'label' => 'Event'
        ) );

        x_add_metadata_field( 'owner', array('event', 'activity'), array(
            'group' => 'events',
            'field_type' => 'select',
            'values' => bediq_users_dropdown( 'delete_others_pages' ),
            'description' => 'Please choose organizer or set one up under <a href="users.php">Users</a>',
            'label' => 'Organizer',
        ) );

        x_add_metadata_field( 'start_time', array('event', 'activity'), array(
            'group' => 'events',
            'field_type' => 'datepicker',
            'description' => 'Please enter the start time of the event',
            'label' => 'Event Begins',
        ) );

        x_add_metadata_field( 'end_time', array('event', 'activity'), array(
            'group' => 'events',
            'field_type' => 'datepicker',
            'description' => 'Please enter the end time of the event',
            'label' => 'End Time',
        ) );

        x_add_metadata_field( 'overlay', array('event'), array(
            'group' => 'events',
            'label' => 'Photo',
            'field_type' => 'upload',
            'description' => ''
        ) );

        //activity special
        x_add_metadata_group( 'activity', array('activity'), array(
            'label' => 'Activity'
        ) );

        x_add_metadata_field( 'occurance', array('activity'), array(
            'group' => 'activity',
            'description' => 'please enter the date or occurence (e.g. Every other Monday) of this activity',
            'label' => 'Occurance',
        ) );

        //Offers
        x_add_metadata_group( 'offers', 'offer', array(
            'label' => 'Offers'
        ) );

        x_add_metadata_field( 'overlay', array('offer'), array(
            'group' => 'offers',
            'label' => 'Photo',
            'field_type' => 'upload',
            'description' => ''
        ) );

        /*
        x_add_metadata_field( 'discount_type', 'offer', array(
            'group' => 'offers',
            'field_type' => 'select',
            'label' => 'Discount Type',
            'description' => 'Please choose the discount Type',
            'values' => array(
                'Special Price' => 'Special Price',
                'Last-Minute' => 'Last-Minute',
                'Early Bird' => 'Early Bird',
                'Pay-Stay' => 'Pay-Stay',
                'Free Credit' => 'Free Credit',
                'Package' => 'Package'
            )
        ) );
        */

        x_add_metadata_field( 'url', 'offer', array(
            'group' => 'offers',
            'description' => 'Please enter the URL of where the Offer will be bookable (e.g. link to booking engine)',
            'label' => 'URL',
        ) );

        x_add_metadata_field( 'availability', 'offer', array(
            'group' => 'offers',
            'description' => 'Please enter the availability, eg the total number of room nights or 5 rooms per day',
            'label' => 'Availability',
        ) );

        x_add_metadata_field( 'item_terms', 'offer', array(
            'group' => 'offers',
            'description' => 'Please enter all conditions that apply',
            'label' => 'Conditions',
            'multiple' => true
        ) );

        x_add_metadata_field( 'benefit', 'offer', array(
            'group' => 'offers',
            'description' => '',
            'label' => 'Inclusions',
            'multiple' => true
        ) );

        x_add_metadata_field( 'price', 'offer', array(
            'group' => 'offers',
            'description' => 'Please enter the promotional price',
            'label' => 'Discounted Price',
        ) );

        x_add_metadata_field( 'price_discount', 'offer', array(
            'group' => 'offers',
            'description' => 'Please enter Original Price',
            'label' => 'Original Price',
        ) );

        x_add_metadata_field( 'currency', 'offer', array(
            'group' => 'offers',
            'field_type' => 'select',
            'description' => 'Please select the currency',
            'label' => 'Currency',
            'values' => $currency
        ) );

        x_add_metadata_field( 'price_valid_from', 'offer', array(
            'group' => 'offers',
            'field_type' => 'datepicker',
            'description' => 'Please enter the date from when the promotion is available',
            'label' => 'Promotion Begins'
        ) );

        x_add_metadata_field( 'price_valid_to', 'offer', array(
            'group' => 'offers',
            'field_type' => 'datepicker',
            'description' => 'Please select the date until which the promotion is available',
            'label' => 'Promotion Ends'
        ) );

        x_add_metadata_field( 'stay_from', 'offer', array(
            'group' => 'offers',
            'field_type' => 'datepicker',
            'description' => '',
            'label' => 'Stay From'
        ) );

        x_add_metadata_field( 'stay_until', 'offer', array(
            'group' => 'offers',
            'field_type' => 'datepicker',
            'description' => '',
            'label' => 'Stay Until'
        ) );

        x_add_metadata_field( 'seller', 'offer', array(
            'group' => 'offers',
            'field_type' => 'select',
            'label' => 'Seller',
            'values' => bediq_users_dropdown( 'delete_others_pages' )
        ) );

        //facility ,leisure and outlet
        x_add_metadata_group( 'facility', array('facility', 'leisure', 'outlet'), array(
            'label' => 'Facilities'
        ) );

        x_add_metadata_field( 'address', array('facility', 'leisure', 'outlet'), array(
            'group' => 'facility',
            'label' => 'Address',
            'field_type' => 'textarea',
            'description' => 'Physical address of the item.'
        ) );

        x_add_metadata_field( 'telephone', array('facility', 'leisure', 'outlet'), array(
            'group' => 'facility',
            'label' => 'Telephone',
            'description' => 'The telephone number.'
        ) );

        x_add_metadata_field( 'fax', array('facility', 'leisure', 'outlet'), array(
            'group' => 'facility',
            'label' => 'Fax Number',
            'description' => 'The fax number.'
        ) );

        x_add_metadata_field( 'map', array('facility', 'leisure', 'outlet'), array(
            'group' => 'facility',
            'label' => 'Map',
            'description' => 'A URL to a map of the place.'
        ) );

        x_add_metadata_field( 'photo', array('facility', 'leisure', 'outlet'), array(
            'group' => 'facility',
            'label' => 'Photo',
            'field_type' => 'upload',
            'description' => 'A photograph of this place.'
        ) );

        x_add_metadata_field( 'opening_hours', array('facility', 'leisure', 'outlet'), array(
            'group' => 'facility',
            'label' => 'Opening Hours',
            'field_type' => 'textarea',
            'description' => 'The opening hours for a business. Opening hours can be specified as a weekly time range, starting with days, then times per day. Multiple days can be listed with commas \',\' separating each day. Day or time ranges are specified using a hyphen \'-\'.'
        ) );

        x_add_metadata_field( 'opening_hours_schema', array('facility', 'leisure', 'outlet'), array(
            'group' => 'facility',
            'label' => 'Opening Hours (Schema.org)',
            'field_type' => 'textarea',
            'description' => 'The opening hours for a business. Opening hours can be specified as a weekly time range, starting with days, then times per day. Multiple days can be listed with commas \',\' separating each day. Day or time ranges are specified using a hyphen \'-\'.'
        ) );

        x_add_metadata_field( 'style', array('facility', 'leisure', 'outlet'), array(
            'group' => 'facility',
            'label' => 'Style',
            'description' => ''
        ) );

        //rooms
        x_add_metadata_group( 'rooms', array('room'), array(
            'label' => 'Rooms'
        ) );

        x_add_metadata_field( 'room_type', 'room', array(
            'group' => 'rooms',
            'field_type' => 'select',
            'label' => 'Room Type',
            'description' => 'Please choose the right accommodation Type',
            'values' => array(
                'Single' => 'Single',
                'Double' => 'Double',
                'Twin' => 'Twin',
                'Triple' => 'Triple',
                'Quad' => 'Quad',
                'Family' => 'Family',
                'Suite' => 'Suite',
                'Villa' => 'Villa',
                'Bungalow' => 'Bungalow',
                'Tent' => 'Tent'
            )
        ) );

        x_add_metadata_field( 'room_size', 'room', array(
            'group' => 'rooms',
            'label' => 'Room Size',
            'description' => 'Please enter the total size of the guest room'
        ) );

        x_add_metadata_field( 'occupancy_adults', 'room', array(
            'group' => 'rooms',
            'label' => 'Occupancy Adults',
            'description' => 'Please enter the regular number of adults for this room'
        ) );

        x_add_metadata_field( 'occupancy_child', 'room', array(
            'group' => 'rooms',
            'label' => 'Occupancy Children',
            'description' => 'Please enter the regular number of children for this room'
        ) );

        x_add_metadata_field( 'extra_beds', 'room', array(
            'group' => 'rooms',
            'label' => 'Extrabeds',
            'description' => 'Please enter the max. allowable number of Extrabeds (e.g. 1 Extrabed for Adults and 2 Extrabeds for Children)'
        ) );

        x_add_metadata_field( 'min_price', 'room', array(
            'group' => 'rooms',
            'label' => 'Min. Price',
            'description' => 'Please enter the lowest BAR rate for this room, e.g. 1600 ฿'
        ) );

        x_add_metadata_field( 'pet_policy', 'room', array(
            'group' => 'rooms',
            'field_type' => 'select',
            'label' => 'Pets',
            'description' => 'Please select your pet policy',
            'values' => array(
                'not allowed' => 'not allowed',
                'not allowed (guide animals only)' => 'not allowed (guide animals only)',
                'small pets free of charge' => 'small pets free of charge',
                'free of charge' => 'free of charge',
                'at a charge' => 'at a charge'
            )
        ) );

        x_add_metadata_field( 'entertainment', 'room', array(
            'group' => 'rooms',
            'label' => 'Entertainment',
            'description' => 'Please add all items you would like to display on you website.',
            'multiple' => true
        ) );

        x_add_metadata_field( 'facilities_room', 'room', array(
            'group' => 'rooms',
            'label' => 'Room Features',
            'description' => 'Please add all items you would like to display on you website.',
            'multiple' => true
        ) );

        x_add_metadata_field( 'bed_features', 'room', array(
            'group' => 'rooms',
            'label' => 'Bed Features',
            'description' => 'Please add all items you would like to display on you website.',
            'multiple' => true
        ) );

        x_add_metadata_field( 'bath', 'room', array(
            'group' => 'rooms',
            'label' => 'Bathroom',
            'description' => 'Please add all items you would like to display on you website.',
            'multiple' => true
        ) );

        x_add_metadata_field( 'communication', 'room', array(
            'group' => 'rooms',
            'label' => 'Communication',
            'description' => 'Please add all items you would like to display on you website.',
            'multiple' => true
        ) );

        x_add_metadata_field( 'safety', 'room', array(
            'group' => 'rooms',
            'label' => 'Safety',
            'description' => 'Please add all items you would like to display on you website.',
            'multiple' => true
        ) );

        x_add_metadata_field( 'on_request', 'room', array(
            'group' => 'rooms',
            'label' => 'On Request',
            'description' => 'Please add all items you would like to display on you website.',
            'multiple' => true
        ) );

        x_add_metadata_field( 'ibe_room', 'room', array(
            'group' => 'rooms',
            'label' => 'Link to Booking Engine',
            'description' => 'Please enter the link to your Booking Engine, preferably straight to the Room Type'
        ) );

        //services
        x_add_metadata_group( 'services', array('post'), array(
            'label' => 'Services'
        ) );

        x_add_metadata_field( 'address', 'post', array(
            'group' => 'services',
            'label' => 'Address',
            'description' => ''
        ) );

        x_add_metadata_field( 'place', 'post', array(
            'group' => 'services',
            'label' => 'Place',
            'description' => ''
        ) );

        //TODO: events

        x_add_metadata_field( 'phone', 'post', array(
            'group' => 'services',
            'label' => 'Phone',
            'description' => ''
        ) );

        x_add_metadata_field( 'fax', 'post', array(
            'group' => 'services',
            'label' => 'Fax',
            'description' => ''
        ) );

        x_add_metadata_field( 'branchof', 'post', array(
            'group' => 'services',
            'label' => 'Branch Of',
            'description' => ''
        ) );

        x_add_metadata_field( 'currencies', 'post', array(
            'group' => 'services',
            'label' => 'Currencies Accepted',
            'description' => ''
        ) );

        x_add_metadata_field( 'payment_accepted', 'post', array(
            'group' => 'services',
            'label' => 'Payment Accepted',
            'description' => ''
        ) );

        x_add_metadata_field( 'price_range', 'post', array(
            'group' => 'services',
            'label' => 'Price Range',
            'description' => ''
        ) );
    }
}

add_action( 'admin_init', 'bediq_custom_fields' );

function bediq_post_dropdown( $post_type = 'post' ) {
    $items = array(0 => '--Select--');
    $posts = get_posts( array('post_type' => $post_type, 'numberposts' => -1) );

    foreach ($posts as $post) {
        $items[$post->ID] = $post->post_title;
    }

    return $items;
}

/**
 * User dropdown depending on a user role
 *
 * @param string $role user capability
 * @return array
 */
function bediq_users_dropdown( $role = false ) {
    $items = array();
    $users = get_users();

    foreach ($users as $user) {
        //check role
        if ( $role && user_can( $user->ID, $role ) ) {
            $items[$user->ID] = $user->display_name;
        } else if ( !$role ) {
            $items[$user->ID] = $user->display_name;
        }
    }

    return $items;
}

function bediq_x_meta_repeat( $slug, $field, $object_type, $object_id, $value ) {
    var_dump( $slug, $field, $object_type, $object_id, $value );
    ?>
    <div class="custom-metadata-field <?php echo $field->field_type ?>">

    </div>
    <?php
}
