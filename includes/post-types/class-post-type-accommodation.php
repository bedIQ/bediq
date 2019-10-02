<?php
namespace bedIQ\Post_Type;
/**
 * Class Post_Type_Accommodation
 */
class Accommodation implements \bedIQ\Post_Type {

    /**
     * Construtor for Post_Type_Accommodation
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
        register_post_type( 'accommodation', [
            'label'           => __( 'Accommodations', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 5,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => ['slug' => 'accommodations'],
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => ['title', 'editor', 'thumbnail'],
            'taxonomies'      => [ 'accommodation_types' ],
            'menu_icon'       => 'dashicons-admin-home',
            'labels'          => [
                'name'               => __( 'Accommodations', 'bediq' ),
                'singular_name'      => __( 'Accommodation', 'bediq' ),
                'menu_name'          => __( 'Accommodations', 'bediq' ),
                'add_new'            => __( 'Add New', 'bediq' ),
                'add_new_item'       => __( 'Add New Accommodations', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Accommodation', 'bediq' ),
                'new_item'           => __( 'New Accommodation', 'bediq' ),
                'view'               => __( 'View Accommodation', 'bediq' ),
                'view_item'          => __( 'View Accommodation', 'bediq' ),
                'search_items'       => __( 'Search Accommodations', 'bediq' ),
                'not_found'          => __( 'No Accommodations Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Accommodations Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Accommodation', 'bediq' ),
            ],
            'rewrite'          =>  [
                'slug'               => 'accommodations',
                'with_front'         => true,
                'pages'              => true,
                'feeds'              => true,
            ],
            'capabilities'    => [
                'edit_post'          => 'edit_accommodation',
                'read_post'          => 'read_accommodation',
                'delete_post'        => 'delete_accommodation',
                'edit_others_posts'  => 'edit_others_accommodations',
                'publish_posts'      => 'publish_accommodations',
                'read_private_posts' => 'read_private_accommodations',
                'create_posts'       => 'create_accommodations',
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

        register_taxonomy( 'accommodation_types', [],
            [
                'hierarchical'   => true,
                'label'          => __( 'Accommodation Types', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => ['slug' => ''],
                'singular_label' => __( 'Accommodation Type', 'bediq' )
            ]
        );
    }

    /**
     * Add metabox using advanced custom field
     */
    public function add_meta_box() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        acf_add_local_field_group( [
            'key'    => 'room_features',
            'title'  => __( 'Room Features', 'bediq' ),
            'fields' => [
                [

                    'key'          => 'offers',
                    'label'        => __( 'Offers', 'bediq' ),
                    'name'         => 'acm_offers',
                    'type'         => 'repeater',
                    'layout'       => 'row',
                    'button_label' => 'Add New Offer',
                    'min'          =>  '1',
                    'sub_fields' => [
                        [
                            'key'   => 'offer',
                            'label' => '',
                            'name'  => 'acm_offer',

                            'type'  => 'post_object',
                            'post_type' => [
                                0 => 'offer',
                            ],
                            'multiple'      => 1,
                            'return_format' => 'object',
                            'ui'            => 1
                        ],
                    ],
                ],
                [

                    'key'   => 'floor_size',
                    'label' => __( 'Floor Size', 'bediq' ),
                    'name'  => 'acm_floor_size',
                    'type'  => 'text',

                    'wrapper'   => [
                        'width' => '50',
                    ]
                ],
                [

                    'key'   => 'floor_size_unit',
                    'label' => __( 'Unit', 'bediq' ),
                    'name'  => 'acm_floor_size_unit',
                    'type'  => 'select',

                    'wrapper' => [
                        'width' => '30',
                    ],
                    'choices' => [
                        'sqm'   => __( 'SQM', 'bediq' ),
                        'sqft'  => __( 'SQFT', 'bediq' ),
                    ]
                ],
                [
                    'key'   => 'bed_room',
                    'label' => __( 'Bed Room', 'bediq' ),
                    'name'  => 'acm_bed_room',
                    'type'  => 'repeater',
                    'min'   => 1,
                    'max'   => 0,
                    'layout' => 'block',
                    'button_label' => __( 'Add Bedroom', 'bediq' ),
                    'sub_fields' => [
                        [
                            'key'   => 'field_5cfe223476262',
                            'label' => __( 'Bed Room Name', 'bediq' ),
                            'name'  => 'acm_bed_room_name',
                            'type'  => 'text',
                        ],
                        [
                            'key'   => 'field_5cff3f0101fc0',
                            'label' => __( 'Beddings', 'bediq' ),
                            'name'  => 'acm_beddings',
                            'type'  => 'repeater',
                            'wrapper' => [
                                'width' => '50',
                            ],
                            'collapsed' => 'field_5cff429301fc1',
                            'min' => 1,
                            'max' => 0,
                            'layout' => 'block',
                            'button_label' => __( 'Add Bedding', 'bediq' ),
                            'sub_fields' => [
                                [

                                    'key'   => 'field_5cff429301fc1',
                                    'label' => __( 'Bedding', 'bediq' ),
                                    'name'  => 'acm_bedding',
                                    'type'  => 'select',

                                    'wrapper' => [
                                        'width' => '50',
                                    ],
                                    'choices' => [
                                        'king_size'   => __( 'King Size', 'bediq' ),
                                        'queen_size'  => __( 'Queen Size', 'bediq' ),
                                        'double_king' => __ ( 'Double King', 'bediq' ),
                                        'double'      => __( 'Double', 'bediq' ),
                                        'sofa'        => __( 'Sofa', 'bediq' ),
                                    ],
                                ],
                            ],
                        ],
                        [
                            'key'   => 'field_5cff43ba01fc2',
                            'label' => __( 'Bothrooms', 'bediq' ),
                            'name'  => 'acm_bathrooms',
                            'type'  => 'repeater',
                            'wrapper' => [
                                'width' => '50',
                            ],
                            'min'    => 1,
                            'max'    => 0,
                            'layout' => 'block',
                            'button_label' => __( 'Add Bathroom', 'bediq' ),
                            'sub_fields'   => [
                                [

                                    'key'   => 'field_5cff43d501fc3',
                                    'label' => __( 'Bathroom', 'bediq' ),
                                    'name'  => 'acm_bathroom',
                                    'type'  => 'select',

                                    'choices' => [
                                        'guest_toilet'   => __( 'Guest Toilet', 'bediq' ),
                                        'shower'         => __( 'Shower', 'bediq' ),
                                        'bathtub'        => __( 'Bathtub', 'bediq' ),
                                        'bathtub_shower' => __( 'Bathtub & Shower', 'bediq' ),
                                    ],
                                ],
                            ],
                        ],
                        [
                            'key'     => 'occupancy',
                            'label'   => 'Occupancy',
                            'name'    => 'acm_occupancy',
                            'type'    => 'number',
                            'wrapper' => [
                                'width' => '33',
                            ],
                        ],
                        [
                            'key'     => 'adult',
                            'label'   => __( 'Adults', 'bediq' ),
                            'name'    => 'acm_adults',
                            'type'    => 'number',
                            'wrapper' => [
                                'width' => '33',
                            ],
                        ],
                        [
                            'key'     => 'children',
                            'label'   => __( 'Children', 'bediq' ),
                            'name'    => 'acm_children',
                            'type'    => 'number',
                            'wrapper' => [
                                'width' => '33',
                            ],
                        ],
                        [
                            'key'       => 'field_5cff4b681e373',
                            'label'     => __( 'View', 'bediq' ),
                            'name'      => 'acm_view',
                            'type'      => 'select',
                            'choices'   => [
                                'view' => __( 'View', 'bediq' ),
                            ],
                            'multiple'      => 1,
                            'ui'            => 1,
                            'ajax'          => 1,
                            'return_format' => 'value',
                        ],
                    ],
                ],
                [
                    'key'       => 'field_5cff64bdba408',
                    'label'     => 'Policies',
                    'name'      => 'acm_policies',
                    'type'      => 'select',
                    'choices'   => [
                        'pets_allowed'      => __( 'Pets Allowed', 'bediq' ),
                        'smoking_allowed'   => __( 'Smoking Allowed', 'bediq' ),
                    ],
                    'multiple'      => 1,
                    'ui'            => 1,
                    'ajax'          => 1,
                    'return_format' => 'value',
                ],
                [
                    'key'    => 'field_5cff6575ba409',
                    'label'  => __( 'Features and Amenities', 'bediq' ),
                    'name'   => 'acm_features_and_amenities',
                    'type'   => 'repeater',
                    'min'    => 1,
                    'max'    => 0,
                    'layout' => 'row',
                    'button_label' => __( 'Add features and amenity group', 'bediq' ),
                    'sub_fields' => [
                        [
                            'key'   => 'field_display_name',
                            'label' =>  __( 'Display Name', 'bediq' ),
                            'name'  =>  'acm_display_name',
                            'type'  =>  'text',
                        ],
                        [
                            'key'       => 'field_5cff659aba40a',
                            'label'     => __( 'Features', 'bediq' ),
                            'name'      => 'acm_features',
                            'type'      => 'select',
                            'choices'   => [
                                'view'  => __( 'View', 'bediq' ),
                            ],
                            'multiple'      => 1,
                            'ui'            => 1,
                            'ajax'          => 1,
                            'return_format' => 'value',
                            'placeholder'   => '',
                        ],
                    ],
                ],
                [
                    'key'   => 'short_description',
                    'label' => __( 'Short Description', 'bediq' ),
                    'name'  => 'short_description',
                    'type'  => 'textarea',
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'accommodation',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'normal',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_5cff819e50636',
            'title'     => __( 'Connectivity', 'bediq' ),
            'fields'    => [
                [
                    'key'   => 'room_type_code',
                    'label' => __( 'Roomtype Code', 'bediq' ),
                    'name'  => 'acm_room_type_code',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'from_price',
                    'label' => 'From Price',
                    'name'  => 'acm_from_price',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_5cff827b836c1',
                    'label' => 'To Price',
                    'name'  => 'acm_to_price',
                    'type'  => 'text',
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'accommodation',
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
            'key'       => 'group_5d009eb5f2f56',
            'title'     => __( 'Accommodation Types', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d00c6dfe11e3',
                    'label'         => '',
                    'name'          => 'accommodation_taxonomy_types',
                    'type'          => 'taxonomy',
                    'taxonomy'      => 'accommodation_types',
                    'field_type'    => 'radio',
                    'allow_null'    => 0,
                    'add_term'      => 1,
                    'save_terms'    => 0,
                    'load_terms'    => 0,
                    'return_format' => 'id',
                    'multiple'      => 0,
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'accommodation',
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
            'key'       => 'group_bed_room_image',
            'title'     => __( 'Bed Room Image', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'bed_room_image',
                    'label'         => '',
                    'name'          => 'acm_bed_room_image',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'post-thumbnail',
                    'library'       => 'all',
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'accommodation',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_bath_room_image',
            'title'     => __( 'Bath Room Image', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'bathroom_image',
                    'label'         => '',
                    'name'          => 'acm_both_room_image',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'post-thumbnail',
                    'library'       => 'all',
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'accommodation',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
        ] );

        acf_add_local_field_group( [
            'key'       => 'group_view_image',
            'title'     => __( 'View Image', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_view_image',
                    'label'         => '',
                    'name'          => 'acm_view_image',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'post-thumbnail',
                    'library'       => 'all',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'accommodation',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
        ] );

        acf_add_local_field_group( [
            'key' => 'group_floor_plan_image',
            'title' => __( 'Floor Plan Image', 'bediq' ),
            'fields' => [
                [
                    'key' => 'field_floor_plan_image',
                    'label' => '',
                    'name' => 'acm_floor_plan_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'post-thumbnail',
                    'library' => 'all',
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'accommodation',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
        ] );

        acf_add_local_field_group( [
            'key' => 'group_gallery_image',
            'title' => __( 'Gallery Image', 'bediq' ),
            'fields' => [
                [
                    'key'           => 'field_gallery_image',
                    'label'         => '',
                    'name'          => 'acm_gallery_image',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'post-thumbnail',
                    'library'       => 'all',
                ],
            ],
            'location' => [
                [
                    [
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'accommodation',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'side',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
        ] );
    }
}