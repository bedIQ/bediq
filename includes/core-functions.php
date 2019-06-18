<?php
/**
 * Get template part implementation for BedIQ
 *
 * Looks at the theme directory first
 */
function bediq_get_template_part( $slug, $name = '' ) {
    $bediq = bediq();

    $templates = array();
    $name = (string) $name;

    // lookup at theme/slug-name.php or bediq/slug-name.php
    if ( '' !== $name ) {
        $templates[] = "{$slug}-{$name}.php";
        $templates[] = $bediq->theme_dir_path . "{$slug}-{$name}.php";
    }

    $template = locate_template( $templates );

    // fallback to plugin default template
    if ( !$template && $name && file_exists( $bediq->template_path() . "{$slug}-{$name}.php" ) ) {
        $template = $bediq->template_path() . "{$slug}-{$name}.php";
    }

    // if not yet found, lookup in slug.php only
    if ( !$template ) {
        $templates = array(
            "{$slug}.php",
            $bediq->theme_dir_path . "{$slug}.php"
        );

        $template = locate_template( $templates );
    }

    if ( $template ) {
        load_template( $template, false );
    }
}

function bediq_get_template( $template_name, $args = array() ) {
    $bediq = bediq();

    if ( $args && is_array($args) ) {
        extract( $args );
    }

    $template = locate_template( array(
        $bediq->theme_dir_path . $template_name,
        $template_name
    ) );

    if ( ! $template ) {
        $template = $bediq->template_path() . $template_name;
    }

    if ( file_exists( $template ) ) {
        include $template;
    }
}

/**
 * Display a multi meta field
 *
 * @param string $meta_key
 * @param int $post_id
 */
function bediq_display_multi_meta( $meta_key, $post_id, $title = '', $item_prop = '' ) {
    $array = get_post_meta( $post_id, $meta_key );

    if ( count( $array ) > 0 && $array[0] != '' ) {
        if ( $array ) {

            if ( !empty( $title ) ) {
                echo $title;
            }

            if ( !empty( $item_prop ) ) {
                printf( '<ul itemprop="%s">', $item_prop );
            } else {
                echo '<ul>';
            }

            foreach ($array as $item) {
                printf( '<li>%s</li>', $item );
            }
            echo '</ul>';
        }
    }
}

function bediq_date_iso( $timestamp ) {
    $datetime = date_i18n( 'c', $timestamp, true );

    return $datetime;
}

/**
 * Prints a single taxonomy links from a post
 *
 * @param type $taxonomy
 */
function bediq_print_tax_link( $taxonomy ) {
    global $post;

    $cat = get_the_term_list( $post->ID, $taxonomy, '', ', ', '' );
    if ( $cat && !is_wp_error( $cat ) ) {
        echo $cat;
    }
}

/**
 * Get currencies
 *
 * @return array
 */
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

/**
 * User dropdown depending on a user role
 *
 * @param string $role user capability
 * @return array
 */
function bediq_users_dropdown( $role = false ) {
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
