<?php
namespace bedIQ\Post_Type;
/**
 * Class Point_Of_Interest
 */
class Point_Of_Interest {
    /**
     * Constructor for Point_Of_interest
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
        register_post_type( 'interesting_point', [
            'label'           => __( 'Point Of Interest', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 5,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => ['slug' => 'interesting-point'],
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => ['title', 'editor', 'thumbnail'],
            'taxonomies'      => [ 'interesting_point_types' ],
            'menu_icon'       => 'dashicons-admin-home',
            'labels'          => [
                'name'               => __( 'Points of Interest', 'bediq' ),
                'singular_name'      => __( 'Point of Interest', 'bediq' ),
                'menu_name'          => __( 'Points of Interest', 'bediq' ),
                'add_new'            => __( 'Add New', 'bediq' ),
                'add_new_item'       => __( 'Add New Point of Interest', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Point of Interest', 'bediq' ),
                'new_item'           => __( 'New Points of Interest', 'bediq' ),
                'view'               => __( 'View Points of Interest', 'bediq' ),
                'view_item'          => __( 'View Points of Interest', 'bediq' ),
                'search_items'       => __( 'Search Points of Interest', 'bediq' ),
                'not_found'          => __( 'No Points of Interest Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Points of Interest Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Points of Interest', 'bediq' ),
            ],
            'rewrite'          =>  [
                'slug'               => 'interesting-point',
                'with_front'         => true,
                'pages'              => true,
                'feeds'              => true,
            ],
            'map_meta_cap' => true
        ] );
    }

    /**
     * Register taxonomy
     *
     * @return void
     */
    public function register_taxonomy() {
        return;
    }

    /**
     * Add meta box using acf
     *
     * @return void
     */
    public function add_meta_box() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        acf_add_local_field_group( [
            'key'       => 'grout_interesting_point_booking',
            'title'     => __( 'Booking', 'bediq' ),
            'fields'    => [
                [
                    'key'   => 'field_5d0a118736415',
                    'label' => 'Booking URL',
                    'name'  => 'outlet_booking_url',
                    'type'  => 'text',
                ],
                [
                    'key'       => 'field_interesting_typical_pricing',
                    'label'     => __( 'Typical Pricing', 'bediq' ),
                    'name'      => 'interesting_poiint_typical_pricing',
                    'type'      => 'select',
                    'choices'   => [
                        '$' => '$',
                        '$$$' => '$$$',
                        '$$$$' => '$$$$',
                    ],
                ],
            ],
            'location'  => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'interesting_point',
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
            'key'       => 'group_interesting_point_good_for',
            'title'     => __( 'Good For', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_interesting_audience_type',
                    'label'         => '',
                    'name'          => 'interesting_audience_type',
                    'type'          => 'text',
                    'placeholder'   =>  __( 'Audience Type', 'bediq' ),
                ],
                [
                    'key'           => 'field_interesting_weather',
                    'label'         => '',
                    'name'          => 'interesting_weather',
                    'type'          => 'text',
                    'placeholder'   =>  __( 'Weather', 'bediq' ),
                ],
                [
                    'key'           => 'field_interesting_activity_type',
                    'label'         => '',
                    'name'          => 'interesting_activity_type',
                    'type'          => 'text',
                    'placeholder'   =>  __( 'Activity Type', 'bediq' ),
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'interesting_point',
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
            'key'       => 'group_interesting_point_download',
            'title'     => __( 'Downloads', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_interesting_point_download_file_repeater',
                    'label'         => '',
                    'name'          => 'interesting_point_download_file',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'block',
                    'button_label'  => __( 'Add new download', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'   => 'field_interesting_point_download_name',
                            'label' => __( 'Download Name', 'bediq' ),
                            'name'  => 'interesting_point_download_name',
                            'type'  => 'text',
                        ],
                        [
                            'key'           => 'field_interesting_point_download_file',
                            'label'         => '',
                            'name'          => 'interesting_point_download_file',
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
            'location'  => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'interesting_point',
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
            'key'       => 'group_point_of_interest_floor_plan_image',
            'title'     => __( 'Floor Plan Image', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_point_of_interesting_floor_plan_image',
                    'label'         => '',
                    'name'          => 'point_of_interesting_floor_plan_image',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'post-thumbnail',
                    'library'       => 'all',
                    'min_width'     => '',
                    'min_height'    => '',
                    'min_size'      => '',
                    'max_width'     => '',
                    'max_height'    => '',
                    'max_size'      => '',
                    'mime_types'    => '',
                ],
            ],
            'location'  => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'interesting_point',
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
            'key'       => 'group_point_of_interesting_gallery_image',
            'title'     => __( 'Gallery Image', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_point_of_interesting_gallery_image',
                    'label'         => '',
                    'name'          => 'point_of_interesting_gallery_image',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'post-thumbnail',
                    'library'       => 'all',
                    'min_width'     => '',
                    'min_height'    => '',
                    'min_size'      => '',
                    'max_width'     => '',
                    'max_height'    => '',
                    'max_size'      => '',
                    'mime_types'    => '',
                ],
            ],
            'location'  => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'interesting_point',
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
            'key'       => 'group_point_of_interest',
            'title'     => __( 'Offers Available', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d09fcc8daaf8',
                    'label'         => __( 'Offers Available', 'bediq' ),
                    'name'          => 'offers_available',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'table',
                    'button_label'  => __( 'Add new offer', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'           => 'field_5d09fd21daaf9',
                            'label'         => '',
                            'name'          => '',
                            'type'          => 'select',
                            'choices'       => [
                            ],
                            'default_value' => [
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
                    'key'   => 'field_5d09ff5f9e7bc',
                    'label' => 'Style',
                    'name'  => 'outlet_style',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_point_of_interest_dress_code',
                    'label' => __( 'Dress Code', 'bediq' ),
                    'name'  => 'point_of_interest_dress_code',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_point_interest_address',
                    'label' => __( 'Address', 'bediq' ),
                    'name'  => 'point_of_interest_address_code',
                    'type'  => 'text',
                ],
                [
                    'key' => 'field_point_of_interest_gmap',
                    'label' => '',
                    'name' => 'google_map',
                    'type' => 'google_map',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '100',
                        'class' => '',
                        'id' => '',
                    ),
                    'center_lat' => '',
                    'center_lng' => '',
                    'zoom' => '',
                    'height' => '',
                ],
                [
                    'key'       => 'field_5d0a00709e7c0',
                    'label'     => __( 'Policy Name', 'bediq' ),
                    'name'      => 'policy_name',
                    'type'      => 'select',
                    'choices'   => [
                        'pets_allowed'      => __( 'Pets Allowed', 'bediq' ),
                        'smoking_allowed'   => __( 'Smoking Allowed', 'bediq' ),
                    ],
                    'allow_null'    => 0,
                    'multiple'      => 1,
                    'ui'            => 1,
                    'ajax'          => 1,
                    'return_format' => 'value',
                    'placeholder'   => '',
                ],
                [
                    'key'           => 'field_outlet_shift',
                    'label'         => __( 'Opening Hours', 'bediq' ),
                    'name'          => 'visibility',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'table',
                    'button_label'  => __( 'Add new shift', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'           => 'field_5d0a011c9e7c1',
                            'label'         => __( 'Opening Hours', 'bediq' ),
                            'name'          => 'opening_hours',
                            'type'          => 'group',
                            'wrapper'       => [
                                'width' => '25',
                            ],
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'   => 'field_5d0a01539e7c2',
                                    'label' => __( 'Shift Name', 'bediq' ),
                                    'name'  => 'shift_name',
                                    'type'  => 'text',
                                ],
                                [
                                    'key'       => 'field_5d0a01899e7c3',
                                    'label'     => '',
                                    'name'      => '24_hours',
                                    'type'      => 'checkbox',
                                    'choices'   => [
                                        '24 Hours' => '24 Hours',
                                    ],
                                    'allow_custom' => 0,
                                    'layout' => 'vertical',
                                    'toggle' => 0,
                                    'return_format' => 'value',
                                    'save_custom' => 0,
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d0a01c29e7c4',
                            'label'         => __( 'Days', 'bediq' ),
                            'name'          => 'outlet_opening_days',
                            'type'          => 'group',
                            'instructions'  => '',
                            'wrapper'       => [
                                'width' => '25',
                            ],
                            'layout' => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d0a01e09e7c5',
                                    'label'     => '',
                                    'name'      => 'outlet_opening_days',
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
                                    'layout' => 'vertical',
                                    'toggle' => 0,
                                    'return_format' => 'value',
                                    'save_custom' => 0,
                                ],
                            ],
                        ],
                        [
                            'key'           => 'field_5d0a02459e7c6',
                            'label'         => __( 'From HH:mm', 'bediq' ),
                            'name'          => 'outlet_start_time',
                            'type'          => 'group',
                            'wrapper'       => [
                                'width' => '25',
                            ],
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d0a026a9e7c7',
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
                                    'key'       => 'field_5d0a029e9e7c8',
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
                                    'key'       => 'field_5d0a02b49e7c9',
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
                                    'key'       => 'field_5d0a02cb9e7ca',
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
                                    'key' => 'field_5d0a02dc9e7cb',
                                    'label' => '',
                                    'name' => 'friday_start',
                                    'type' => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key' => 'field_5d0a02eb9e7cc',
                                    'label' => '',
                                    'name' => 'saturday_start',
                                    'type' => 'time_picker',
                                    'wrapper'   => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id'    => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d0a02fa9e7cd',
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
                            'key'           => 'field_5d0a031d9e7ce',
                            'label'         => __( 'To HH:mm', 'bediq' ),
                            'name'          => 'outlet_end_time',
                            'type'          => 'group',
                            'wrapper'       => [
                                'width' => '25',
                            ],
                            'layout'        => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_5d0a031d9e7cf',
                                    'label'     => '',
                                    'name'      => 'monday_end',
                                    'type'      => 'time_picker',
                                    'wrapper'   => [
                                        'class' => 'bediq-time-picker',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                                [
                                    'key'       => 'field_5d0a031d9e7d0',
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
                                    'key'       => 'field_5d0a031d9e7d1',
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
                                    'key'       => 'field_5d0a031d9e7d2',
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
                                    'key'       => 'field_5d0a031d9e7d3',
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
                                    'key'       => 'field_5d0a031d9e7d4',
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
                                    'key'   => 'field_5d0a031d9e7d5',
                                    'label' => '',
                                    'name'  => 'sunday_end',
                                    'type'  => 'time_picker',
                                    'wrapper' => [
                                        'width' => '',
                                        'class' => 'bediq-time-picker',
                                        'id' => '',
                                    ],
                                    'display_format'    => 'g:i a',
                                    'return_format'     => 'g:i a',
                                ],
                            ],
                        ],
                    ]
                ],

                [
                    'key'   => 'field_5d0a04c80f7ad',
                    'label' => __( 'Short Description', 'bediq' ),
                    'name'  => 'short_description',
                    'type'  => 'textarea',
                ],
            ],
            'location'  => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'interesting_point',
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

        acf_add_local_field_group( [
            'key'       => 'group_5d0af196c2752',
            'title'     => __( 'Outlet Types', 'bediq' ),
            'fields'    => [
                [
                    'key'       => 'field_5d0af28e94bae',
                    'label'     => '',
                    'name'      => 'outlet_types',
                    'type'      => 'select',
                    'choices'   => [
                        'food_establishment'            => __( 'Food Establishment', 'bediq' ),
                        'health_and_beauty_business'    => __( 'Health And Beauty Business', 'bediq' ),
                    ],
                    'allow_null'    => 0,
                    'multiple'      => 0,
                    'ui'            => 0,
                    'return_format' => 'value',
                    'ajax'          => 0,
                    'placeholder'   => '',
                ],
                [
                    'key'               => 'field_5d0af45149fad',
                    'label'             => '',
                    'name'              => 'health_and_beauty_bussiness',
                    'type'              => 'checkbox',
                    'conditional_logic' => [
                        [
                            [
                                'field'     => 'field_5d0af28e94bae',
                                'operator'  => '==',
                                'value'     => 'health_and_beauty_business',
                            ],
                        ],
                    ],
                    'wrapper'           => [
                        'width' => '',
                        'class' => 'bediq-outlet-types',
                        'id'    => '',
                    ],
                    'choices'           => [
                        'beauty_salon'  => __( 'Beauty Salon', 'bediq' ),
                        'day_spa'       => __( 'Day Spa', 'bediq' ),
                        'hair_salon'    => __( 'Hair Salon', 'bediq' ),
                        'health_club'   => __( 'Health Club', 'bediq' ),
                        'nail_salon'    => __( 'Nail Salon', 'bediq' ),
                    ],
                    'layout'     => 'vertical',
                    'toggle'        => 0,
                    'return_format' => 'value',
                    'save_custom'   => 0,
                ],
                [
                    'key'               => 'field_5d0af5c90e270',
                    'label'             => '',
                    'name'              => 'food_establishment',
                    'type'              => 'checkbox',
                    'conditional_logic' => [
                        [
                            [
                                'field'     => 'field_5d0af28e94bae',
                                'operator'  => '==',
                                'value'     => 'food_establishment',
                            ],
                        ],
                    ],
                    'wrapper'          => [
                        'width' => '',
                        'class' => 'bediq-outlet-types',
                        'id'    => '',
                    ],
                    'choices'         => [
                        'restaurant'    => __( 'Restaurant', 'bediq' ),
                        'bar'           => __( 'Bar', 'bediq' ),
                        'pub'           => __( 'Pub', 'bediq' ),
                        'cafe'          => __( 'Cafe', 'bediq' ),
                        'bakery'        => __( 'Bakery', 'bediq' ),
                        'brewery'       => __( 'Brewery', 'bediq' ),
                    ],
                    'layout'        => 'vertical',
                    'toggle'        => 0,
                    'return_format' => 'value',
                    'save_custom'   => 0,
                ],
            ],
            'location'  =>  [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'interesting_point',
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
    }
}