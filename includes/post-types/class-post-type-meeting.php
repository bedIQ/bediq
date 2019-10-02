<?php
namespace bedIQ\Post_Type;

/**
 * Class Meeting
 */
class Meeting implements \bedIQ\Post_Type {
    /**
     * Constructor for Meeting Class
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
        register_post_type( 'meeting', [
            'label'           => __( '', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 6,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => ['slug' => 'meeting'],
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => ['title', 'editor', 'thumbnail'],
            'menu_icon'       => 'dashicons-share-alt',
            'taxonomies'      => [],
            'labels'          => [
                'name'               => __( 'Meeting', 'bediq' ),
                'singular_name'      => __( 'Meeting', 'bediq' ),
                'menu_name'          => __( 'Meetings', 'bediq' ),
                'add_new'            => __( 'Add Meeting', 'bediq' ),
                'add_new_item'       => __( 'Add New Meeting', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Meeting', 'bediq' ),
                'new_item'           => __( 'New Meeting', 'bediq' ),
                'view'               => __( 'View Meeting', 'bediq' ),
                'view_item'          => __( 'View Meeting', 'bediq' ),
                'search_items'       => __( 'Search Meeting', 'bediq' ),
                'not_found'          => __( 'No Meetings Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Meeting Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Meeting', 'bediq' ),
            ],
            'rewrite'          =>  [
                'slug'               => 'meetings',
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
            'key'       => 'group_meetings',
            'title'     => __( 'Booking', 'bediq' ),
            'fields'    => [
                [
                    'key'   => 'field_meeting_booking',
                    'label' => __( 'Booking URL', 'bediq' ),
                    'name'  => 'meeting_booking_url',
                    'type'  => 'text',
                ],
            ],
            'location'  => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'meeting',
                    ],
                ],
            ],
            'menu_order'            => -1,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_suitable_for_metting',
            'title'     => __( 'Suitable for', 'bediq' ),
            'fields'    => [
                [
                    'key'       => 'field_meeting_suitable_for',
                    'label'     => '',
                    'name'      => 'meeting_suitable',
                    'type'      => 'checkbox',
                    'choices'   =>  [
                        'conference'        => __( 'Conference', 'bediq' ),
                        'board_meeting'     => __( 'Board Meeting', 'bediq' ),
                        'product_launch'    => __( 'Product Launch', 'bediq' ),
                        'road_show'         =>  __( 'Road Show', 'bediq' ),
                        'exhibition'        =>  __( 'Exhibition', 'bediq' ),
                        'gala'              =>  __( 'Gala', 'bediq' ),
                        'corporate_event'   =>  __( 'Corporate Event', 'bediq' ),
                        'social_event'      =>  __( 'Social Event', 'bediq' ),
                        'wedding'           =>  __( 'Wedding', 'bediq' )
                    ],
                    'wrapper'   =>  [
                        'class' =>  'bediq-outlet-types',
                    ]
                ],
            ],
            'location'  => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'meeting',
                    ],
                ],
            ],
            'menu_order'            => -1,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_meeting_downloads',
            'title'     => __( 'Downloads', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d0a12a89b3db',
                    'label'         => '',
                    'name'          => 'meeting_download_file',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'block',
                    'button_label'  => __( 'Add new download', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'   => 'field_5d0a12cc9b3dc',
                            'label' => __( 'Download Name', 'bediq' ),
                            'name'  => 'meeting_download_name',
                            'type'  => 'text',
                        ],
                        [
                            'key'           => 'field_5d0a12eb9b3dd',
                            'label'         => '',
                            'name'          => 'meeting_download_file',
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
                        'value'     => 'meeting',
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
            'key'       => 'group_meeting_floor_plan_image',
            'title'     => __( 'Floor Plan Image', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d0a13abdf555',
                    'label'         => '',
                    'name'          => 'meeting_floor_plan_image',
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
                        'value'     => 'meeting',
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
            'key'       => 'group_meeting_gallery_image',
            'title'     => __( 'Gallery Image', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d0a1476197fd',
                    'label'         => '',
                    'name'          => 'meeting_gallery_image',
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
                        'value'     => 'meeting',
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
            'key'       => 'group_meeting_offer',
            'title'     => __( 'Offers Available', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_offers',
                    'label'         => __( 'Offers Available', 'bediq' ),
                    'name'          => 'offers_available',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'table',
                    'button_label'  => __( 'Add new offer', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'           => 'field_offer',
                            'label'         => '',
                            'name'          => '',
                            'type'          => 'select',
                            'type'  => 'post_object',
                            'post_type' => [
                                0 => 'offer',
                            ],
                            'allow_null'    => 0,
                            'ui'            => 1,
                            'ajax'          => 1,
                            'return_format' => 'value',
                            'placeholder'   => '',
                        ],
                    ],
                ],
                [
                    'key'       => 'floor_size',
                    'label'     => __( 'Floor Size', 'bediq' ),
                    'name'      => 'floor_size',
                    'type'      => 'text',
                    'wrapper'   => [
                        'width' => '50',
                    ]
                ],
                [
                    'key'     => 'floor_size_unit',
                    'label'   => __( 'Unit', 'bediq' ),
                    'name'    => 'floor_size_unit',
                    'type'    => 'select',
                    'wrapper' => [
                        'width' => '30',
                    ],
                    'choices' => [
                        'sqm'   => __( 'SQM', 'bediq' ),
                        'sqft'  => __( 'SQFT', 'bediq' ),
                    ]
                ],
                [
                    'key'   => 'meeting_location',
                    'label' => __( 'Location', 'bediq' ),
                    'name'  => 'meeting_location',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_5d09ff3d9e7bb',
                    'label' => __( 'Dress Code', 'bediq' ),
                    'name'  => 'meeting_dress_code',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'meeting_style',
                    'label' => 'Style',
                    'name'  => 'meeting_style',
                    'type'  => 'text',
                ],
                [
                    'key'           => 'meeting_capacity',
                    'label'         => '',
                    'name'          => 'meeting_capacity',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'block',
                    'button_label'  => __( 'Add Capacity', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'       => 'field_5d09ff939e7be',
                            'label'     => 'Capacity',
                            'name'      => 'capacity',
                            'type'      => 'text',
                            'wrapper'   => [
                                'width' =>  '50'
                            ]
                        ],
                        [
                            'key' => 'field_5d09ffce9e7bf',
                            'label' => 'Adults',
                            'name' => 'adults',
                            'type' => 'select',
                            'wrapper' => [
                                'width' => '50',
                            ],
                            'choices' => [
                                'boardroom' => __( 'Boardroom', 'bediq' ),
                                'classroom' => __( 'Classroom', 'bediq' ),
                                'cocktail'  => __( 'Cocktail', 'bediq' ),
                                'theatre'   => __( 'Theatre', 'bediq' ),
                                'u_Shape'   => __( 'U-Shape', 'bediq' ),
                            ],
                            'return_format' => 'value',
                        ],
                    ],
                ],
                [
                    'key'       => 'policy_name',
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
                    'key'   => 'short_description',
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
                        'value'     => 'meeting',
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
