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
            'menu_icon'       => "data:image/svg+xml;base64," . base64_encode( '<?xml version="1.0" encoding="UTF-8"?>
                <svg width="16px" height="17px" viewBox="0 0 16 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 61.2 (89653) - https://sketch.com -->
                    <title>Meetings</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="BedIQ" transform="translate(-14.000000, -240.000000)" fill="#9EA3A8">
                            <path d="M22.890464,246.412672 C22.1661346,245.685708 21.4274993,244.943872 20.6809581,244.194508 C19.6082052,245.290225 18.5501346,246.371261 17.504864,247.439119 C17.7478758,247.681755 17.9786523,247.912155 18.2171464,248.149896 C19.0387934,247.327872 19.8687228,246.497567 20.7127699,245.653331 C21.4604405,246.403825 22.199264,247.145472 22.9710287,247.920061 C23.8564875,247.034978 24.7357346,246.155919 25.6202523,245.27159 C25.6202523,245.644484 25.6189346,246.014555 25.6206287,246.384814 C25.6221346,246.715167 25.8387934,246.948578 26.1382758,246.946131 C26.4281581,246.943684 26.6361581,246.711214 26.6363464,246.385943 C26.6372875,245.464719 26.6370648,244.543308 26.6369111,243.622084 C26.6369111,243.571072 26.6314523,243.520249 26.628817,243.475449 C26.6050993,243.466414 26.5954993,243.459637 26.5858993,243.459637 C25.6063228,243.458508 24.6267464,243.453049 23.6471699,243.459825 C23.3642523,243.461708 23.1385581,243.710743 23.1460875,243.974837 C23.153617,244.247025 23.3764875,244.463872 23.6650523,244.471214 C23.8873581,244.476672 24.1100405,244.472531 24.3323464,244.472719 L24.8300405,244.472719 C24.1781817,245.124578 23.5364875,245.766461 22.890464,246.412672 M19.2865111,256.809661 L18.2867934,256.809661 C18.0554523,254.904908 19.3154993,253.00919 21.4429346,252.670555 L21.4429346,250.884578 L13.9999228,250.884578 L13.9999228,249.872437 L14.7701817,249.872437 L14.7701817,240.888908 L29.1451464,240.888908 L29.1451464,249.865661 L29.9231228,249.865661 L29.9231228,250.877425 L22.4793581,250.877425 L22.4793581,252.674319 C23.6159228,252.862178 24.5107934,253.428014 25.1233111,254.410037 C25.5795934,255.142084 25.7153111,255.949614 25.6394523,256.809472 L24.6363464,256.809472 C24.6363464,256.652296 24.6355934,256.500955 24.6365346,256.349614 C24.6425581,255.532484 24.3425111,254.843919 23.7205817,254.320437 C22.8806758,253.613425 21.9189817,253.456249 20.9130523,253.881849 C19.8924405,254.313472 19.3454287,255.119684 19.2878287,256.23799 C19.2786052,256.422461 19.2865111,256.607684 19.2865111,256.809661" id="Meetings"></path>
                        </g>
                    </g>
                </svg>' ),
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
