<?php
namespace bedIQ\Post_Type;
/**
 * Class Post_Type_Offer
 */
class Offer implements \bedIQ\Post_Type {
    /**
     * Constructor for Post_Type_Offer
     */
    function __construct() {
        $this->add_meta_box();
    }

    /**
     * Register post type
     *
     * @return void
     */
    public function register_post_type() {
        $show_in_menu = true;
        register_post_type( 'offer', [
            'label'           => __( 'Offers', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 6,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => ['slug' => 'offers'],
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => ['title', 'editor', 'thumbnail'],
            'menu_icon'       => "data:image/svg+xml;base64," . base64_encode( '<?xml version="1.0" encoding="UTF-8"?>
				<svg width="18px" height="17px" viewBox="0 0 18 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <!-- Generator: Sketch 61.2 (89653) - https://sketch.com -->
				    <title>Facilities</title>
				    <desc>Created with Sketch.</desc>
				    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g id="BedIQ" transform="translate(-13.000000, -211.000000)" fill="#9EA3A8">
				            <path d="M30.8204138,220.144103 C30.7544138,220.477621 30.6927586,220.793759 30.6292414,221.109483 C30.3073103,222.705276 29.9870345,224.301276 29.6609655,225.896241 C29.604069,226.17431 29.6727586,226.135 29.3690345,226.13831 C29.113931,226.140793 28.8588276,226.138931 28.5853103,226.138931 L28.5853103,227.585552 L27.1223448,227.585552 L27.1223448,226.149483 L16.6695172,226.149483 L16.6695172,227.582034 L15.2315862,227.582034 L15.2315862,226.138931 C14.9737931,226.138931 14.7356552,226.123828 14.5002069,226.143483 C14.3125517,226.159207 14.2581379,226.085345 14.2223448,225.913414 C13.8321379,224.046793 13.4334483,222.182241 13.0364138,220.317069 C13.0293793,220.284793 13.0124138,220.254379 13,220.223345 L13,220.153414 C13.0755172,220.15031 13.1508276,220.144517 13.2263448,220.144517 L30.8204138,220.144103 Z M27.3285793,214.995607 C28.2184414,215.104228 28.8149241,215.664503 28.9506483,216.502641 C29.0009241,216.811331 28.9862345,217.130159 29.0282345,217.440917 C29.1097517,218.045262 29.2105103,218.647124 29.3029931,219.250228 C29.3089931,219.289952 29.3110621,219.33009 29.3158207,219.3814 L25.6268552,219.3814 C25.5819586,219.134986 25.5383034,218.896434 25.4907172,218.634917 C25.2536138,218.667607 25.0204414,218.699676 24.787269,218.732159 C23.575269,218.902228 22.3597517,218.986848 21.1340966,218.939676 C20.2690621,218.906572 19.9690621,218.021676 20.2609931,217.437607 C20.4056138,217.148986 20.6427172,216.989055 20.9660966,216.970641 C21.1109241,216.962366 21.2567862,216.970434 21.4022345,216.974159 C22.6570621,217.00809 23.9003034,216.894297 25.1375448,216.693814 C25.2273379,216.679124 25.2860966,216.657607 25.2908552,216.548366 C25.3357517,215.518848 26.2432,214.862986 27.3285793,214.995607 Z M26.3807034,211.000062 C26.4251862,211.012062 26.4690483,211.026959 26.5141517,211.035855 C27.4768414,211.225166 28.1240138,212.091648 28.0571862,213.103372 C27.9969793,214.011855 27.2006345,214.795993 26.2865655,214.846683 C25.2723586,214.902959 24.4203586,214.248752 24.2438759,213.277372 C24.0533241,212.229441 24.7338069,211.233648 25.7759448,211.033993 C25.8154621,211.026545 25.8531172,211.011648 25.8916,211.000062 L26.3807034,211.000062 Z" id="Facilities"></path>
				        </g>
				    </g>
				</svg>' ),
            'taxonomies'      => [ 'hotel_offers' ],
            'labels'          => [
                'name'               => __( 'Offers', 'bediq' ),
                'singular_name'      => __( 'Offer', 'bediq' ),
                'menu_name'          => __( 'Offers', 'bediq' ),
                'add_new'            => __( 'Add Offer', 'bediq' ),
                'add_new_item'       => __( 'Add New Offer', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Offer', 'bediq' ),
                'new_item'           => __( 'New Offer', 'bediq' ),
                'view'               => __( 'View Offer', 'bediq' ),
                'view_item'          => __( 'View Offer', 'bediq' ),
                'search_items'       => __( 'Search Offers', 'bediq' ),
                'not_found'          => __( 'No Offers Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Offers Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Offer', 'bediq' ),
            ],
            'rewrite'          =>  [
                'slug'               => 'offers',
                'with_front'         => true,
                'pages'              => true,
                'feeds'              => true,
            ],
        ] );
    }
    /**
     * Register taxonomy
     *
     * @return void
     */
    public function register_taxonomy() {
        register_taxonomy( 'offer_types', [ 'offer' ],
            [
                'hierarchical'   => true,
                'label'          => __( 'Offer Types', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => ['slug' => 'hotel-offers'],
                'singular_label' => __( 'Offers', 'bediq' )
            ]
        );
    }

    /**
     * Add meta box
     */
    public function add_meta_box() {
        if ( ! function_exists('acf_add_local_field_group') ) {
            return;
        }
        acf_add_local_field_group( [
            'key'       => 'group_5d0886c4c4bd0',
            'title'     => __( 'Booking', 'bediq' ),
            'fields'    => [
                [
                    'key'   => 'field_5d0886db10d80',
                    'label' => __( 'Booking URL', 'bediq' ),
                    'name'  => 'bediq_offer_booking_url',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_5d08870610d81',
                    'label' => __( 'Offer Code', 'bediq' ),
                    'name'  => 'bediq_offer_code',
                    'type'  => 'text',
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'offer',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_5d08b3e862749',
            'title'     => __( 'Downloads', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d08b3f37d9fa',
                    'label'         => '',
                    'name'          => 'downloads',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'block',
                    'button_label'  => __( 'Add new download', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'   => 'field_5d08b40f7d9fb',
                            'label' => __( 'Download Name', 'bediq' ),
                            'name'  => 'download_name',
                            'type'  => 'text',
                        ],
                        [
                            'key'           => 'field_5d08b4297d9fc',
                            'label'         => __( 'Upload File', 'bediq' ),
                            'name'          => 'upload_file',
                            'type'          => 'file',
                            'return_format' => 'array',
                            'library'       => 'all',
                            'min_size'      => '',
                            'max_size'      => '',
                            'mime_types'    => '',
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'offer',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_5d08b541a8fd8',
            'title'     => __( 'Gallery Images', 'bediq' ),
            'fields' => [
                [
                    'key' => 'gallery_images',
                    // 'label' => 'Gallery Image',
                    'name' => 'gallery_image',
                    'type' => 'gallery',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'insert' => 'append',
                    'library' => 'all',
                    'min' => '',
                    'max' => '',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'offer',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_5d08b262016ed',
            'title'     => __( 'Offer Good For', 'bediq' ),
            'fields'    => [
                [
                    'key'       => 'field_5d08b27996ab3',
                    'label'     => '',
                    'name'      => 'offer_good_for',
                    'type'      => 'checkbox',
                    'choices'   => [
                        'family'            => __( 'Family', 'bediq' ),
                        'couple'            => __( 'Couple', 'bediq' ),
                        'friends'           => __( 'Friends', 'bediq' ),
                        'solo Traveller'    => __( 'Solo Traveller', 'bediq' ),
                        'corporate'         => __( 'Corporate', 'bediq' ),
                    ],
                    'layout'        => 'vertical',
                    'toggle'        => 0,
                    'return_format' => 'value',
                    'save_custom'   => 0,
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'offer',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_5d08b2d9caf32',
            'title'     => 'Offer Type',
            'fields'    => [
                [
                    'key'       => 'field_5d08b2e6fec77',
                    'label'     => '',
                    'name'      => 'offer_type',
                    'type'      => 'checkbox',
                    'choices'   => [
                        'discount'      => __( 'Discount', 'bediq' ),
                        'value-Add'     => __( 'Value-Add', 'bediq' ),
                        'package'       => __( 'Package', 'bediq' ),
                        'flash Sale'    => __( 'Flash Sale', 'bediq' ),
                    ],
                    'layout'        => 'vertical',
                    'toggle'        => 0,
                    'return_format' => 'value',
                    'save_custom'   => 0,
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'offer',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' =>  'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_5d0216520406d',
            'title'     => __( 'Offers', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d02166562276',
                    'label'         => __( 'Location Available', 'bediq' ),
                    'name'          => 'location_available',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'row',
                    'button_label'  => __( 'Add New Offer', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'   => 'field_5d0217c862277',
                            'label' => '',
                            'name'  => 'available_offer',
                            'type' => 'post_object',
                            'conditional_logic' => [
                                [
                                    [
                                        'field' => 'field_5d02166562276',
                                        'operator' => '!=empty',
                                    ],
                                ],
                            ],
                            'post_type' => [
                                0 => 'accommodation',
                                1 => 'outlet',
                                2 => 'poi',
                                3 => 'facility',
                                4 => 'meeting',
                                5 => 'offer'
                            ],
                            'allow_null'    => 0,
                            'multiple'      => 1,
                            'ui'            => 1,
                            'ajax'          => 1,
                            'return_format' => 'value',
                            'placeholder'   => '',
                        ],
                    ],
                ],
                [
                    'key'           => 'field_5d021994117ed',
                    'label'         => __( 'Original Price', 'bediq' ),
                    'name'          => 'original_price',
                    'type'          => 'text',
                ],
                [
                    'key'   => 'offer_price',
                    'label' => 'Offer Price',
                    'name'  => 'offer_price',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_5d0219e0117ef',
                    'label' => __( 'Minimum Booking', 'bediq' ),
                    'name'  => 'minimum_booking',
                    'type'  => 'text',
                    'wrapper'   => [
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ],
                ],
                [
                    'key'       => 'field_5d021a41117f0',
                    'label'     => __( 'Unit', 'bediq' ),
                    'name'      => 'unit',
                    'type'      => 'select',
                    'wrapper'   => [
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ],
                    'choices' => [
                        'Amount'    => __( 'Amount', 'bediq' ),
                        'People'    => __( 'People', 'bediq' ),
                        'Night'     => __( 'Night', 'bediq' ),
                    ],
                ],
                [
                    'key'       => 'field_5d021a95117f1',
                    'label'     => __( 'Advance Booking', 'bediq' ),
                    'name'      => 'advance_booking',
                    'type'      => 'number',
                    'wrapper'   => [
                        'width' => '50',
                    ],
                ],
                [
                    'key'       => 'field_5d021ad1117f2',
                    'label'     => __( 'Unit', 'bediq' ),
                    'name'      => 'advance_booking_unit',
                    'type'      => 'select',
                    'wrapper'   => [
                        'width' => '50',
                    ],
                    'choices' => [
                        'hours'     => __( 'Hours', 'bediq' ),
                        'weeks'     => __( 'Weeks', 'bediq' ),
                        'days'      => __( 'Days', 'bediq' ),
                        'months'    => __( 'Months', 'bediq' ),
                    ],
                    'return_format' => 'value',
                ],
                [
                    'key'           => 'field_5d0311d0276a9',
                    'label'         => __( 'Visibility', 'bediq' ),
                    'name'          => 'visibility',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'table',
                    'button_label'  => __( 'Add new date range', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'       => 'field_5d0311ec276aa',
                            'label'     => '',
                            'name'      => 'date_range',
                            'type'      => 'group',
                            'wrapper'   => [
                                'width' => '25',
                            ],
                            'layout'    => 'block',
                            'sub_fields' => [
                                [
                                    'key'               => 'field_5d031247276ab',
                                    'label'             => __( 'From', 'bediq' ),
                                    'name'              => 'visibility_from_date',
                                    'type'              => 'date_picker',
                                    'display_format'    => 'd/m/Y',
                                    'return_format'     => 'd/m/Y',
                                    'first_day'         => 1,
                                ],
                                [
                                    'key'               => 'field_5d031278276ac',
                                    'label'             => __( 'To', 'bediq' ),
                                    'name'              => 'visibility_to_date',
                                    'type'              => 'date_picker',
                                    'display_format'    => 'd/m/Y',
                                    'return_format'     => 'd/m/Y',
                                    'first_day'         => 1,
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d0871934ed3a',
                            'label'         => __( 'Days', 'bediq' ),
                            'name'          => 'visiblity_days',
                            'type'          => 'group',
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d0871b84ed3b',
                                    'label'     => '',
                                    'name'      => 'days',
                                    'type'      => 'checkbox',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-visiblity-days',
                                        'id' => '',
                                    ],
                                    'choices' => [
                                        'monday'    => __( 'Monday', 'bediq' ),
                                        'tuesday'   => __( 'Tuesday', 'bediq' ),
                                        'wednesday' => __( 'Wednesday', 'bediq' ),
                                        'thursday'  => __( 'Thursday', 'bediq' ),
                                        'friday'    => __( 'Friday', 'bediq' ),
                                        'saturday'  => __( 'Saturday', 'bediq' ),
                                        'sunday'    => __( 'Sunday', 'bediq' ),
                                    ],
                                    'layout' => 'vertical',
                                    'toggle' => 0,
                                    'return_format' => 'value',
                                    'save_custom' => 0,
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d0872b0e1e32',
                            'label'         => __( 'From HH:mm', 'bediq' ),
                            'name'          => 'start_time',
                            'type'          => 'group',
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d0872fee1e33',
                                    'label'     => '',
                                    'name'      => 'monday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format' => 'g:i a',
                                    'return_format' => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08732be1e34',
                                    'label'     => '',
                                    'name'      => 'tuesday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format' => 'g:i a',
                                    'return_format' => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d087347e1e35',
                                    'label'     => '',
                                    'name'      => 'wednesday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08735be1e36',
                                    'label'     => '',
                                    'name'      => 'thursday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08736ee1e37',
                                    'label'     => '',
                                    'name'      => 'friday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08737fe1e38',
                                    'label'     => '',
                                    'name'      => 'saturday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d087396e1e39',
                                    'label'     => '',
                                    'name'      => 'sunday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d0873b1e1e3a',
                            'label'         => __( 'To HH:mm', 'bediq' ),
                            'name'          => 'end_time',
                            'type'          => 'group',
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d0873c3e1e3b',
                                    'label'     => '',
                                    'name'      => 'monday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d0873dce1e3c',
                                    'label'     => '',
                                    'name'      => 'tuesday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d0873ebe1e3d',
                                    'label'     => '',
                                    'name'      => 'wednesday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'     => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d0873fae1e3e',
                                    'label'     => '',
                                    'name'      => 'thursday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d087405e1e3f',
                                    'label'     => '',
                                    'name'      => 'friday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d087410e1e40',
                                    'label'     => '',
                                    'name'      => 'saturday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08741de1e41',
                                    'label'     => '',
                                    'name'      => 'sunday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'key'           => 'field_5d08841ba50e6',
                    'label'         => __( 'Eligibility', 'bediq' ),
                    'name'          => 'bediq_eligibility',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'table',
                    'button_label'  => __( 'Add new date range', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'       => 'field_5d08841ca50e7',
                            'label'     => '',
                            'name'      => 'date_range',
                            'type'      => 'group',
                            'wrapper'   => [
                                'width' => '25',
                                'class' => '',
                                'id'    => '',
                            ],
                            'layout' => 'block',
                            'sub_fields' => [
                                [
                                    'key'               => 'field_5d08841ca50e8',
                                    'label'             => __( 'From', 'bediq' ),
                                    'name'              => 'visibility_from_date',
                                    'type'              => 'date_picker',
                                    'display_format'    => 'd/m/Y',
                                    'return_format'     => 'd/m/Y',
                                    'first_day'         => 1,
                                ],
                                [
                                    'key'               => 'field_5d08841ca50e9',
                                    'label'             => __( 'To', 'bediq' ),
                                    'name'              => 'visibility_to_date',
                                    'type'              => 'date_picker',
                                    'display_format'    => 'd/m/Y',
                                    'return_format'     => 'd/m/Y',
                                    'first_day'         => 1,
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d08841ca50ea',
                            'label'         => __( 'Days', 'bediq' ),
                            'name'          => 'visiblity_days',
                            'type'          => 'group',
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d08841ca50eb',
                                    'label'     => '',
                                    'name'      => 'days',
                                    'type'      => 'checkbox',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-visiblity-days',
                                        'id'    => '',
                                    ],
                                    'choices'   => [
                                        'monday'    => __( 'Monday', 'bediq' ),
                                        'tuesday'   => __( 'Tuesday', 'bediq' ),
                                        'wednesday' => __( 'Wednesday', 'bediq' ),
                                        'thursday'  => __( 'Thursday', 'bediq' ),
                                        'friday'    => __( 'Friday', 'bediq' ),
                                        'saturday'  => __( 'Saturday', 'bediq' ),
                                        'sunday'    => __( 'Sunday', 'bediq' ),
                                    ],
                                    'layout'        => 'vertical',
                                    'toggle'        => 0,
                                    'return_format' => 'value',
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d08841ca50ec',
                            'label'         => __( 'From HH:mm', 'bediq' ),
                            'name'          => 'start_time',
                            'type'          => 'group',
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d08841ca50ed',
                                    'label'     => '',
                                    'name'      => 'monday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50ee',
                                    'label'     => '',
                                    'name'      => 'tuesday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50ef',
                                    'label'     => '',
                                    'name'      => 'wednesday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50f0',
                                    'label'     => '',
                                    'name'      => 'thursday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50f1',
                                    'label'     => '',
                                    'name'      => 'friday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50f2',
                                    'label'     => '',
                                    'name'      => 'saturday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50f3',
                                    'label'     => '',
                                    'name'      => 'sunday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d08841ca50f4',
                            'label'         => __( 'To HH:mm', 'bediq' ),
                            'name'          => 'end_time',
                            'type'          => 'group',
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d08841ca50f5',
                                    'label'     => '',
                                    'name'      => 'monday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50f6',
                                    'label'     => '',
                                    'name'      => 'tuesday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50f7',
                                    'label'     => '',
                                    'name'      => 'wednesday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50f8',
                                    'label'     => '',
                                    'name'      => 'thursday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50f9',
                                    'label'     => '',
                                    'name'      => 'friday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50fa',
                                    'label'     => '',
                                    'name'      => 'saturday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d08841ca50fb',
                                    'label'     => '',
                                    'name'      => 'sunday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'key'           => 'field_5d088536abcad',
                    'label'         => __( 'Availability', 'bediq' ),
                    'name'          => 'bediq_availability',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'table',
                    'button_label'  => __( 'Add new date range', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'       => 'field_5d088536abcae',
                            'label'     => '',
                            'name'      => 'date_range',
                            'type'      => 'group',
                            'wrapper'   => [
                                'width' => '25',
                                'class' => '',
                                'id' => '',
                            ],
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'               => 'field_5d088536abcaf',
                                    'label'             => __( 'From', 'bediq' ),
                                    'name'              => 'visibility_from_date',
                                    'type'              => 'date_picker',
                                    'display_format'    => 'd/m/Y',
                                    'return_format'     => 'd/m/Y',
                                    'first_day'         => 1,
                                ],
                                [
                                    'key'               => 'field_5d088536abcb0',
                                    'label'             => __( 'To', 'bediq' ),
                                    'name'              => 'visibility_to_date',
                                    'type'              => 'date_picker',
                                    'display_format'    => 'd/m/Y',
                                    'return_format'     => 'd/m/Y',
                                    'first_day'         => 1,
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d088536abcb1',
                            'label'         => __( 'Days', 'bediq' ),
                            'name'          => 'visiblity_days',
                            'type'          => 'group',
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d088536abcb2',
                                    'label'     => '',
                                    'name'      => 'days',
                                    'type'      => 'checkbox',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-visiblity-days',
                                        'id'    => '',
                                    ],
                                    'choices'   =>  [
                                        'monday'    => __( 'Monday', 'bediq' ),
                                        'tuesday'   => __( 'Tuesday', 'bediq' ),
                                        'wednesday' => __( 'Wednesday', 'bediq' ),
                                        'thursday'  => __( 'Thursday', 'bediq' ),
                                        'friday'    => __( 'Friday', 'bediq' ),
                                        'saturday'  => __( 'Saturday', 'bediq' ),
                                        'sunday'    => __( 'Sunday', 'bediq' ),
                                    ],
                                    'layout'        => 'vertical',
                                    'toggle'        => 0,
                                    'return_format' => 'value',
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d088536abcb3',
                            'label'         => __( 'From HH:mm', 'bediq' ),
                            'name'          => 'start_time',
                            'type'          => 'group',
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d088536abcb4',
                                    'label'     => '',
                                    'name'      => 'monday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088536abcb5',
                                    'label'     => '',
                                    'name'      => 'tuesday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088536abcb6',
                                    'label'     => '',
                                    'name'      => 'wednesday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088536abcb7',
                                    'label'     => '',
                                    'name'      => 'thursday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088536abcb8',
                                    'label'     => '',
                                    'name'      => 'friday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088536abcb9',
                                    'label'     => '',
                                    'name'      => 'saturday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088537abcba',
                                    'label'     => '',
                                    'name'      => 'sunday_start',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d088537abcbb',
                            'label'         => __( 'To HH:mm', 'bediq' ),
                            'name'          => 'end_time',
                            'type'          => 'group',
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d088537abcbc',
                                    'label'     => '',
                                    'name'      => 'monday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088537abcbd',
                                    'label'     => '',
                                    'name'      => 'tuesday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088537abcbe',
                                    'label'     => '',
                                    'name'      => 'wednesday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088537abcbf',
                                    'label'     => '',
                                    'name'      => 'thursday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088537abcc0',
                                    'label'     => '',
                                    'name'      => 'friday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088537abcc1',
                                    'label'     => '',
                                    'name'      => 'saturday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d088537abcc2',
                                    'label'     => '',
                                    'name'      => 'sunday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'key'           => 'offer_condition',
                    'label'         => __( 'Conditions', 'bediq' ),
                    'name'          => 'conditions',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'table',
                    'button_label'  => __( 'Add new condtion', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'   => 'sub_condition',
                            'label' => '',
                            'name'  => 'condition',
                            'type'  => 'text',
                        ],
                    ],
                ],
                [
                    'key'   => 'field_5d088951e3b8c',
                    'label' => __( 'Description', 'bediq' ),
                    'name'  => 'description',
                    'type'  => 'textarea',
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'offer',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ] );
    }
}