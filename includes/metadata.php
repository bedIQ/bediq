<?php

function bediq_get_currencies() {
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

function bediq_metada_init() {
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

        //services
        // x_add_metadata_group( 'services', array('post'), array(
        //     'label' => 'Services'
        // ) );

        // x_add_metadata_field( 'address', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Address',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'place', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Place',
        //     'description' => ''
        // ) );

        //TODO: events

        // x_add_metadata_field( 'phone', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Phone',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'fax', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Fax',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'branchof', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Branch Of',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'currencies', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Currencies Accepted',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'payment_accepted', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Payment Accepted',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'price_range', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Price Range',
        //     'description' => ''
        // ) );
    }
}

add_action( 'admin_init', 'bediq_metada_init' );

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

function bediq_cmb_fields( $meta_boxes = array() ) {
    $user_dropdown = bediq_users_dropdown( 'delete_others_pages' );

    $room_fields = array(
        array(
            'id' => 'room_type',
            'name' => __( 'Room Type', 'bediq' ),
            'type' => 'select',
            'options' => array(
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
        ),
        array(
              'id' => 'room_size',
              'name' => __( 'Room Size', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please enter the total size of the guest room', 'bediq' )
        ),
        array(
              'id' => 'occupancy_adults',
              'name' => __( 'Occupancy Adults', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please enter the regular number of adults for this room', 'bediq' )
        ),
        array(
              'id' => 'occupancy_child',
              'name' => __( 'Occupancy Children', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please enter the regular number of children for this room', 'bediq' )
        ),
        array(
              'id' => 'extra_beds',
              'name' => __( 'Extrabeds', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please enter the max. allowable number of Extrabeds (e.g. 1 Extrabed for Adults and 2 Extrabeds for Children)', 'bediq' )
        ),
        array(
              'id' => 'min_price',
              'name' => __( 'Min. Price', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please enter the lowest BAR rate for this room, e.g. $1600', 'bediq' )
        ),
        array(
            'id' => 'pet_policy',
            'name' => __( 'Please select your pet policy', 'bediq' ),
            'type' => 'select',
            'options' => array(
                'not allowed'                      => 'not allowed',
                'not allowed (guide animals only)' => 'not allowed (guide animals only)',
                'small pets free of charge'        => 'small pets free of charge',
                'free of charge'                   => 'free of charge',
                'at a charge'                      => 'at a charge'
            )
        ),
        array(
              'id' => 'entertainment',
              'name' => __( 'Entertainment', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
              'repeatable' => true
        ),
        array(
              'id' => 'facilities_room',
              'name' => __( 'Room Features', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
              'repeatable' => true
        ),
        array(
              'id' => 'bed_features',
              'name' => __( 'Bed Features', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
              'repeatable' => true
        ),
        array(
              'id' => 'bath',
              'name' => __( 'Bathroom', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
              'repeatable' => true
        ),
        array(
              'id' => 'communication',
              'name' => __( 'Communication', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
              'repeatable' => true
        ),
        array(
              'id' => 'safety',
              'name' => __( 'Safety', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
              'repeatable' => true
        ),
        array(
              'id' => 'on_request',
              'name' => __( 'On Request', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please add all items you would like to display on your website.', 'bediq' ),
              'repeatable' => true
        ),
        array(
              'id' => 'ibe_room',
              'name' => __( 'Link to Booking Engine', 'bediq' ),
              'type' => 'url',
              'desc' => __( 'Please enter the link to your Booking Engine, preferably straight to the Room Type', 'bediq' ),
        ),
        array(
            'id' => 'offers',
            'name' => __( 'Offers' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'bediq_offer' ),
            'multiple' => true,
            'desc' => sprintf( __( 'Add offers to this room. You have to <a href="%s" target="_blank">create some offers</a> first!', 'bediq' ), admin_url( 'post-new.php?post_type=bediq_offer' ) ),
        ),
        array(
              'id' => 'photo',
              'name' => __( 'Photographs of this room', 'bediq' ),
              'type' => 'image',
              'desc' => __( 'Some photographs of this room.', 'bediq' ),
              'repeatable' => true
        ),
    );

    $event_fields = array(
        array(
              'id' => 'start_time',
              'name' => __( 'Event Begins', 'bediq' ),
              'type' => 'datetime_unix',
              'desc' => __( 'Please enter the start time of the event', 'bediq' ),
        ),
        array(
              'id' => 'end_time',
              'name' => __( 'Event Ends', 'bediq' ),
              'type' => 'datetime_unix',
              'desc' => __( 'Please enter the end time of the event', 'bediq' ),
        ),
        array(
              'id' => 'owner',
              'name' => __( 'Organizer', 'bediq' ),
              'type' => 'select',
              'desc' => __( 'Please choose organizer or set one up under <a href="users.php">Users</a>', 'bediq' ),
              'options' => $user_dropdown
        ),
        array(
            'id' => 'offers',
            'name' => __( 'Offers' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'bediq_offer' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'Add offers to this room. You have to <a href="%s" target="_blank">create some offers</a> first!', 'bediq' ), admin_url( 'post-new.php?post_type=bediq_offer' ) ),
        ),
        array(
            'id' => 'facility',
            'name' => __( 'Facilities' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'bediq_facility' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'Add facilities here. You have to <a href="%s" target="_blank">create some facilities</a> first!', 'bediq' ), admin_url( 'post-new.php?post_type=bediq_facility' ) ),
        ),
        array(
            'id' => 'leisure',
            'name' => __( 'Leisures' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'bediq_leisure' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'Add Leisures here. You have to <a href="%s" target="_blank">create some leisures</a> first!', 'bediq' ), admin_url( 'post-new.php?post_type=bediq_leisure' ) ),
        ),
        array(
            'id' => 'outlet',
            'name' => __( 'Outlets' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'bediq_outlet' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'Add outlets here. You have to <a href="%s" target="_blank">create some outlets</a> first!', 'bediq' ), admin_url( 'post-new.php?post_type=bediq_outlet' ) ),
        ),
    );

    $activity_fields = $event_fields;
    $activity_fields[] = array(
        'id' => 'occurance',
        'name' => __( 'Occurance', 'bediq' ),
        'type' => 'text',
        'desc' => __( 'please enter the date or occurence (e.g. Every other Monday) of this activity', 'bediq' ),
    );

    $offer_fields = array(
        array(
              'id' => 'url',
              'name' => __( 'URL', 'bediq' ),
              'type' => 'url',
              'desc' => __( 'Please enter the URL of where the Offer will be bookable (e.g. link to booking engine)', 'bediq' ),
        ),
        array(
              'id' => 'availability',
              'name' => __( 'Availability', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please enter the availability, eg the total number of room nights or 5 rooms per day', 'bediq' ),
        ),
        array(
              'id' => 'item_terms',
              'name' => __( 'Conditions', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please enter all conditions that apply', 'bediq' ),
              'repeatable' => true,
        ),
        array(
              'id' => 'benefit',
              'name' => __( 'Inclusions', 'bediq' ),
              'type' => 'text',
              'repeatable' => true,
        ),
        array(
              'id' => 'price',
              'name' => __( 'Discounted Price', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please enter the promotional price', 'bediq' ),
        ),
        array(
              'id' => 'price_discount',
              'name' => __( 'Original Price', 'bediq' ),
              'type' => 'text',
              'desc' => __( 'Please enter Original Price', 'bediq' ),
        ),
        array(
              'id' => 'currency',
              'name' => __( 'Currency', 'bediq' ),
              'type' => 'select',
              'desc' => __( 'Please select the currency', 'bediq' ),
              'options' => bediq_get_currencies()
        ),
        array(
              'id' => 'price_valid_from',
              'name' => __( 'Promotion Begins', 'bediq' ),
              'type' => 'date',
              'desc' => __( 'Please enter the date from when the promotion is available', 'bediq' ),
        ),
        array(
              'id' => 'price_valid_to',
              'name' => __( 'Promotion Ends', 'bediq' ),
              'type' => 'date',
              'desc' => __( 'Please select the date until which the promotion is available', 'bediq' ),
        ),
        array(
              'id' => 'stay_from',
              'name' => __( 'Stay From', 'bediq' ),
              'type' => 'date',
              'desc' => '',
        ),
        array(
              'id' => 'stay_until',
              'name' => __( 'Stay Until', 'bediq' ),
              'type' => 'date',
              'desc' => '',
        ),
        array(
              'id' => 'seller',
              'name' => __( 'Seller', 'bediq' ),
              'type' => 'select',
              'desc' => '',
              'options' => $user_dropdown
        ),
    );

    $facility_fields = array(
        array(
            'id' => 'address',
            'name' => __( 'Address', 'bediq' ),
            'type' => 'textarea',
            'desc' => __( 'Physical address of the item.', 'bediq' ),
        ),
        array(
            'id' => 'telephone',
            'name' => __( 'Telephone', 'bediq' ),
            'type' => 'text',
            'desc' => __( 'The telephone number.', 'bediq' ),
        ),
        array(
            'id' => 'fax',
            'name' => __( 'Fax Number', 'bediq' ),
            'type' => 'text',
            'desc' => __( 'The fax number.', 'bediq' ),
        ),
        array(
            'id' => 'map',
            'name' => __( 'Map', 'bediq' ),
            'type' => 'url',
            'desc' => __( 'A URL to a map of the place.', 'bediq' ),
        ),
        array(
            'id' => 'opening_hours',
            'name' => __( 'Opening Hours', 'bediq' ),
            'type' => 'textarea',
            'desc' => __( 'The opening hours for a business. Opening hours can be specified as a weekly time range, starting with days, then times per day. Multiple days can be listed with commas \',\' separating each day. Day or time ranges are specified using a hyphen \'-\'.', 'bediq' ),
        ),
        array(
            'id' => 'opening_hours_schema',
            'name' => __( 'Opening Hours (Schema.org)', 'bediq' ),
            'type' => 'textarea',
            'desc' => __( 'The opening hours for a business. Opening hours can be specified as a weekly time range, starting with days, then times per day. Multiple days can be listed with commas \',\' separating each day. Day or time ranges are specified using a hyphen \'-\'.', 'bediq' ),
        ),
        array(
            'id' => 'style',
            'name' => __( 'Style', 'bediq' ),
            'type' => 'text',
            'desc' => ''
        ),
    );

    $services_fields = array(
        array(
            'id' => 'address',
            'name' => __( 'Address', 'bediq' ),
            'type' => 'textarea',
            'desc' => '',
        ),
        array(
            'id' => 'place',
            'name' => __( 'Place', 'bediq' ),
            'type' => 'text',
            'desc' => ''
        ),
    );

    $meta_boxes[] = array(
        'title' => __( 'Room Features', 'beidq' ),
        'pages' => 'bediq_room',
        'fields' => $room_fields
    );

    $meta_boxes[] = array(
        'title' => __( 'Event Information', 'beidq' ),
        'pages' => 'bediq_event',
        'fields' => $event_fields
    );

    $meta_boxes[] = array(
        'title' => __( 'Activity Information', 'beidq' ),
        'pages' => 'bediq_activity',
        'fields' => $activity_fields
    );

    $meta_boxes[] = array(
        'title' => __( 'Offer Details', 'beidq' ),
        'pages' => 'bediq_offer',
        'fields' => $offer_fields
    );

    $meta_boxes[] = array(
        'title' => __( 'Facilities', 'beidq' ),
        'pages' => array( 'bediq_facility', 'bediq_leisure', 'bediq_outlet' ),
        'fields' => $facility_fields
    );

    $meta_boxes[] = array(
        'title' => __( 'Services', 'beidq' ),
        'pages' => array( 'bediq_services' ),
        'fields' => $services_fields
    );

    return $meta_boxes;
}

add_filter( 'cmb_meta_boxes', 'bediq_cmb_fields' );