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
        $this->bediq_add_image();
        $this->bediq_custom_taxonomy();
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
                'key'    => 'room_features',
                'title'  => __( 'Room Features', 'bediq' ),
                'fields' => array(
                    array(
                        'key'    => 'offers',
                        'label'  => __( 'Offers', 'bediq' ),
                        'name'   => 'offers',
                        'type'   => 'repeater',
                        'layout' => 'row',
                        'button_label' => 'Add New Offer',
                        'min'   =>  '1',
                        'sub_fields' => array(
                            array(
                                'key'   => 'offer',
                                'label' => '',
                                'name'  => 'offer',
                                'type' => 'post_object',
                                'post_type' => array(
                                    0 => 'offer',
                                ),
                                'multiple' => 1,
                                'return_format' => 'object',
                                'ui' => 1
                            ),
                        ),
                    ),
                    array(
                        'key'   => 'floor_size',
                        'label' => __( 'Floor Size', 'bediq' ),
                        'name'  => 'floor_size',
                        'type'  => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                        )
                    ),
                    array(
                        'key'     => 'floor_size_unit',
                        'label'   => __( 'Unit', 'bediq' ),
                        'name'    => 'floor_size_unit',
                        'type'    => 'select',
                        'wrapper' => array(
                            'width' => '30',
                        ),
                        'choices' => array(
                            'sqm'   => __( 'SQM', 'bediq' ),
                            'sqft'  => __( 'SQFT', 'bediq' ),
                        )
                    ),
                    array(
                        'key'   => 'field_5cfe21a576261',
                        'label' => __( 'Bed Room', 'bediq' ),
                        'name'  => 'bed_room',
                        'type'  => 'repeater',
                        'min'   => 1,
                        'max'   => 0,
                        'layout' => 'block',
                        'button_label' => __( 'Add Bedroom', 'bediq' ),
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_5cfe223476262',
                                'label' => __( 'Bed Room Name', 'bediq' ),
                                'name'  => 'bed_room_name',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_5cff3f0101fc0',
                                'label' => __( 'Beddings', 'bediq' ),
                                'name'  => 'beddings',
                                'type'  => 'repeater',
                                'wrapper' => array(
                                    'width' => '50',
                                ),
                                'collapsed' => 'field_5cff429301fc1',
                                'min' => 1,
                                'max' => 0,
                                'layout' => 'block',
                                'button_label' => __( 'Add Bedding', 'bediq' ),
                                'sub_fields' => array(
                                    array(
                                        'key'     => 'field_5cff429301fc1',
                                        'label'   => __( 'Bedding', 'bediq' ),
                                        'name'    => 'bedding',
                                        'type'    => 'select',
                                        'wrapper' => array(
                                            'width' => '50',
                                        ),
                                        'choices' => array(
                                            'king_size'    => __( 'King Size', 'bediq' ),
                                            'queen_size'   => __( 'Queen Size', 'bediq' ),
                                            'double_king'  => __ ( 'Double King', 'bediq' ),
                                            'double'       => __( 'Double', 'bediq' ),
                                            'sofa'         => __( 'Sofa', 'bediq' ),
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key'   => 'field_5cff43ba01fc2',
                                'label' => __( 'Bothrooms', 'bediq' ),
                                'name'  => 'bothrooms',
                                'type'  => 'repeater',
                                'wrapper' => array(
                                    'width' => '50',
                                ),
                                'min' => 1,
                                'max' => 0,
                                'layout' => 'block',
                                'button_label' => __( 'Add Bothroom', 'bediq' ),
                                'sub_fields'   => array(
                                    array(
                                        'key'     => 'field_5cff43d501fc3',
                                        'label'   => __( 'Bothroom', 'bediq' ),
                                        'name'    => 'bothroom',
                                        'type'    => 'select',
                                        'choices' => array(
                                            'guest_toilet'      => __( 'Guest Toilet', 'bediq' ),
                                            'shower'            => __( 'Shower', 'bediq' ),
                                            'bathtub'           => __( 'Bathtub', 'bediq' ),
                                            'bathtub_shower'    => __( 'Bathtub & Shower', 'bediq' ),
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key'     => 'field_5cff48dcf0fe9',
                                'label'   => 'Occupancy',
                                'name'    => 'occupancy',
                                'type'    => 'number',
                                'wrapper' => array(
                                    'width' => '33',
                                ),
                            ),
                            array(
                                'key'     => 'field_5cff4955f0fea',
                                'label'   => __( 'Adults', 'bediq' ),
                                'name'    => 'adults',
                                'type'    => 'number',
                                'wrapper' => array(
                                    'width' => '33',
                                ),
                            ),
                            array(
                                'key'     => 'field_5cff4967f0feb',
                                'label'   => __( 'Children', 'bediq' ),
                                'name'    => 'children',
                                'type'    => 'number',
                                'wrapper' => array(
                                    'width' => '33',
                                ),
                            ),
                            array(
                                'key' => 'field_5cff4b681e373',
                                'label' => __( 'View', 'bediq' ),
                                'name' => 'view',
                                'type' => 'select',
                                'choices' => array(
                                    'view' => __( 'View', 'bediq' ),
                                ),
                                'multiple' => 1,
                                'ui' => 1,
                                'ajax' => 1,
                                'return_format' => 'value',
                            ),
                        ),
                    ),
                    array(
                        'key'   => 'field_5cff64bdba408',
                        'label' => 'Policies',
                        'name'  => 'policies',
                        'type'  => 'select',
                        'choices' => array(
                            'pets_allowed'      => __( 'Pets Allowed', 'bediq' ),
                            'smoking_allowed'   => __( 'Smoking Allowed', 'bediq' ),
                        ),
                        'multiple' => 1,
                        'ui' => 1,
                        'ajax' => 1,
                        'return_format' => 'value',
                    ),
                    array(
                        'key'    => 'field_5cff6575ba409',
                        'label'  => __( 'Features and Amenities', 'bediq' ),
                        'name'   => 'features_and_amenities',
                        'type'   => 'repeater',
                        'min'    => 1,
                        'max'    => 0,
                        'layout' => 'row',
                        'button_label' => __( 'Add features and amenity group', 'bediq' ),
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_display_name',
                                'label' =>  __( 'Display Name', 'bediq' ),
                                'name'  =>  'display_name',
                                'type'  =>  'text',
                            ),
                            array(
                                'key' => 'field_5cff659aba40a',
                                'label' => __( 'Features', 'bediq' ),
                                'name' => 'features',
                                'type' => 'select',
                                'choices' => array(
                                    'view' => __( 'View', 'bediq' ),
                                ),
                                'multiple' => 1,
                                'ui' => 1,
                                'ajax' => 1,
                                'return_format' => 'value',
                                'placeholder' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_5cff6798e3404',
                        'label' => __( 'Short Description', 'bediq' ),
                        'name' => 'short_description',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'accommodation',
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
                'key' => 'group_5cff819e50636',
                'title' => 'Connectivity',
                'fields' => array(
                    array(
                        'key'   => 'field_5cff81a4836bf',
                        'label' => __( 'Roomtype Code', 'bediq' ),
                        'name'  => 'room_type_code',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_5cff825c836c0',
                        'label' => 'From Price',
                        'name'  => 'from_price',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_5cff827b836c1',
                        'label' => 'To Price',
                        'name'  => 'to_price',
                        'type'  => 'text',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param'     => 'post_type',
                            'operator'  => '==',
                            'value'     => 'accommodation',
                        ),
                    ),
                ),
                'menu_order'            => -1,
                'position'              => 'side',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
            ));

            acf_add_local_field_group( array(
                'key' => 'offer_details',
                'title' => __( 'Offer Details', 'bediq' ),
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
                        'label' => __( 'Availability', 'bediq' ),
                        'name' => 'availability',
                        'type' => 'text',
                        'instructions' => __( 'Please enter the availability, eg the total number of room nights or 5 rooms per day', 'bediq' ),
                    ),
                    array(
                        'key' => 'item_terms',
                        'label' => __( 'Conditions', 'bediq' ),
                        'name' => 'item_terms',
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
                        'key' => 'benefit',
                        'label' => __( 'Inclusions', 'bediq' ),
                        'name' => 'inclusions',
                        'type' => 'repeater',
                        'layout' => 'row',
                        'button_label' => __( 'Add New', 'bediq' ),
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
                        'key'   => 'price',
                        'label' => __( 'Discounted Price', 'bediq' ),
                        'name'  => 'price',
                        'type'  => 'text',
                        'instructions' => __( 'Please enter the promotional price', 'bediq' ),
                    ),
                    array(
                        'key' => 'price_discount',
                        'label' => __( 'Original Price', 'bediq' ),
                        'name' => 'price_discount',
                        'type' => 'text',
                        'instructions' => __( 'Please enter Original Price', 'bediq' ),
                    ),
                    array(
                        'key' => 'currency',
                        'label' => __( 'Currency', 'bediq' ),
                        'name' => 'currency',
                        'type' => 'select',
                        'ui' => 1,
                        'instructions' => __( 'Please select the currency', 'bediq' ),
                        'choices' => $this->bediq_get_currencies()
                    ),
                    array(
                        'key' => 'price_valid_from',
                        'label' => __( 'Promotion Begins', 'bediq' ),
                        'name' => 'price_valid_from',
                        'type' => 'date_picker',
                        'display_format' => 'd-m-Y',
                        'return_format' => 'd-m-Y',
                        'first_day' => 1,
                        'instructions' => __( 'Please enter the date from when the promotion is available', 'bediq' )
                    ),
                    array(
                        'key'   => 'price_valid_to',
                        'label' => __( 'Promotion Ends', 'bediq' ),
                        'name'  => 'price_valid_to',
                        'type'  => 'date_picker',
                        'display_format'    => 'd-m-Y',
                        'return_format'     => 'd-m-Y',
                        'first_day'         => 1,
                        'instructions'      => __( 'Please select the date until which the promotion is available', 'bediq' )
                    ),
                    array(
                        'key'   => 'stay_from',
                        'label' => __( 'Stay From', 'bediq' ),
                        'name'  => 'stay_from',
                        'type'  => 'date_picker',
                        'display_format'    =>  'd-m-Y',
                        'return_format'     =>  'd-m-Y',
                        'first_day'         =>  1
                    ),
                    array(
                        'key'   => 'stay_until',
                        'label' => __( 'Stay Until', 'bediq' ),
                        'name'  => 'stay_until',
                        'type'  => 'date_picker',
                        'display_format'    => 'd-m-Y',
                        'return_format'     => 'd-m-Y',
                        'first_day'         => 1
                    ),
                    array(
                        'key'   => 'seller',
                        'label' => __( 'Seller', 'bediq' ),
                        'name'  => 'seller',
                        'type'  => 'select',
                        'choices'   => $user_dropdown,
                        'ui'        => 1
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
     * Add taxonomy fields
     *
     * @return void
     */
    public function bediq_custom_taxonomy() {
        if ( function_exists('acf_add_local_field_group') ) {
            acf_add_local_field_group( array(
                'key' => 'group_5d009eb5f2f56',
                'title' => __( 'Accommodation Types', 'bediq' ),
                'fields' => array(
                    array(
                        'key' => 'field_5d00c6dfe11e3',
                        'label' => '',
                        'name' => 'accommodation_taxonomy_types',
                        'type' => 'taxonomy',
                        'taxonomy' => 'accommodation_types',
                        'field_type' => 'radio',
                        'allow_null' => 0,
                        'add_term' => 1,
                        'save_terms' => 0,
                        'load_terms' => 0,
                        'return_format' => 'id',
                        'multiple' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'accommodation',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'side',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
            ));
        }
    }

    /**
     * Add bediq image
     *
     * @return void
     */
    public function bediq_add_image() {
        if ( function_exists('acf_add_local_field_group')  ) {
            acf_add_local_field_group( array(
                'key' => 'group_bed_room_image',
                'title' => __( 'Bed Room Image', 'bediq' ),
                'fields' => array(
                    array(
                        'key' => 'field_5d0086e7c2f19',
                        'label' => '',
                        'name' => 'bed_room_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'post-thumbnail',
                        'library' => 'all',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'accommodation',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'side',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
            ));

            acf_add_local_field_group( array(
                'key' => 'group_both_room_image',
                'title' => __( 'Both Room Image', 'bediq' ),
                'fields' => array(
                    array(
                        'key' => 'field_5d0086e7c2f19',
                        'label' => '',
                        'name' => 'both_room_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'post-thumbnail',
                        'library' => 'all',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'accommodation',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'side',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
            ));

            acf_add_local_field_group( array(
                'key' => 'group_view_image',
                'title' => __( 'View Image', 'bediq' ),
                'fields' => array(
                    array(
                        'key' => 'field_view_image',
                        'label' => '',
                        'name' => 'view_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'post-thumbnail',
                        'library' => 'all',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'accommodation',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'side',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
            ));

            acf_add_local_field_group( array(
                'key' => 'group_floor_plan_image',
                'title' => __( 'Floor Plan Image', 'bediq' ),
                'fields' => array(
                    array(
                        'key' => 'field_floor_plan_image',
                        'label' => '',
                        'name' => 'floor_plan_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'post-thumbnail',
                        'library' => 'all',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'accommodation',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'side',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
            ));

            acf_add_local_field_group( array(
                'key' => 'group_gallery_image',
                'title' => __( 'Gallery Image', 'bediq' ),
                'fields' => array(
                    array(
                        'key' => 'field_gallery_image',
                        'label' => '',
                        'name' => 'gallery_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'post-thumbnail',
                        'library' => 'all',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'accommodation',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'side',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
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

