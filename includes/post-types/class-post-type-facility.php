<?php
namespace bedIQ\Post_Type;
/**
 * Class Post Type Facility
 */
class Facility implements \bedIQ\Post_Type {
    /**
     * Constructor for Facility Class
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
        register_post_type( 'facility', [
            'label'           => __( 'Facilities', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 6,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => ['slug' => 'facility'],
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => ['title', 'editor', 'thumbnail'],
            'menu_icon'       => "data:image/svg+xml;base64," . base64_encode( '<?xml version="1.0" encoding="UTF-8"?>
				<svg width="18px" height="19px" viewBox="0 0 18 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <!-- Generator: Sketch 61.2 (89653) - https://sketch.com -->
				    <title>Offers</title>
				    <desc>Created with Sketch.</desc>
				    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g id="BedIQ" transform="translate(-13.000000, -127.000000)" fill="#9EA3A8">
				            <path d="M23.4460898,127.863242 C23.7996951,128.207137 24.1563793,128.547716 24.5066688,128.894453 C24.6928267,129.078479 24.9090635,129.165163 25.1710109,129.162558 C25.7441688,129.157347 26.3173267,129.159953 26.8904846,129.1609 C28.0758793,129.162795 28.9964846,130.078189 29.0009846,131.260032 C29.0031162,131.800032 29.0147214,132.340268 28.9964846,132.879558 C28.9851162,133.2334 29.1014056,133.506953 29.3548267,133.749716 C29.6868793,134.067558 29.9995109,134.405768 30.3185372,134.736637 C31.1299583,135.578137 31.127353,136.827716 30.3133267,137.668742 C29.9656425,138.027795 29.6193793,138.388268 29.2681425,138.743768 C29.0841162,138.929689 28.9971951,139.145689 28.9998004,139.407874 C29.0050109,139.987663 29.003353,140.567453 29.0009846,141.147479 C28.9960109,142.317479 28.0761162,143.233584 26.9025635,143.238558 C26.6226162,143.239742 26.3424319,143.238558 26.0627214,143.238558 C25.782774,143.238558 25.502353,143.247321 25.2231162,143.236189 C24.9235109,143.224347 24.6821688,143.324295 24.4713793,143.537216 C24.1338793,143.878505 23.7845372,144.207716 23.4401688,144.542137 C22.5906162,145.366347 21.344353,145.370374 20.493853,144.550426 C20.1340898,144.203216 19.773853,143.856716 19.4185898,143.505242 C19.2326688,143.320979 19.0166688,143.234532 18.7544846,143.2369 C18.1746951,143.242111 17.5949056,143.240453 17.0148793,143.238084 C15.8448793,143.233111 14.9268793,142.311795 14.9238004,141.139663 C14.9226162,140.580005 14.9162214,140.019874 14.9266425,139.460216 C14.9325635,139.160847 14.8385372,138.919032 14.6256162,138.708479 C14.2843267,138.370979 13.955353,138.021637 13.6206951,137.677268 C12.7967214,136.8289 12.7924583,135.579558 13.6119319,134.730953 C13.9591425,134.371426 14.3056425,134.010953 14.6571162,133.655926 C14.8416162,133.469768 14.9275898,133.253058 14.9252214,132.991584 C14.9204846,132.411795 14.9219056,131.832005 14.9240372,131.251979 C14.928774,130.082216 15.8496162,129.165163 17.0229319,129.161374 C17.5690898,129.159479 18.1159583,129.150716 18.662353,129.164926 C18.9910898,129.173216 19.2537477,129.072558 19.4834846,128.835479 C19.8079583,128.500347 20.1501951,128.182505 20.4853267,127.858032 C21.3422214,127.027663 22.5891951,127.030032 23.4460898,127.863242 Z M24.5147214,136.839788 C23.4588793,136.8424 22.599853,137.708295 22.6024523,138.766979 C22.6053004,139.822821 23.4709583,140.681611 24.5296425,140.679011 C25.5854846,140.676163 26.4445109,139.810505 26.4416758,138.751584 C26.4390635,137.695979 25.5731688,136.836953 24.5147214,136.839788 Z M25.2775898,131.978374 C22.7687214,134.490795 20.2574846,137.000847 17.7471951,139.511374 C17.7000635,139.558742 17.649853,139.604216 17.6117214,139.657742 C17.4596688,139.872084 17.4362214,140.100874 17.5589056,140.335111 C17.6778004,140.561532 17.8743793,140.668584 18.0882477,140.679479 C18.3426162,140.677821 18.5005898,140.567926 18.6471951,140.421084 C21.1565372,137.909137 23.6675372,135.398847 26.1780635,132.888084 C26.2157214,132.850426 26.2548004,132.813716 26.2889056,132.772979 C26.5901688,132.412505 26.4274583,131.878189 25.974853,131.747216 C25.6911162,131.665268 25.475353,131.780137 25.2775898,131.978374 Z M24.5168293,138.119443 C24.8737504,138.117558 25.1638819,138.407453 25.161762,138.764137 C25.1598556,139.111347 24.8744609,139.396979 24.5272504,139.399122 C24.1703293,139.401242 23.8804346,139.111347 23.8823201,138.754426 C23.884224,138.407216 24.1698556,138.121584 24.5168293,138.119443 Z M19.4058004,131.72092 C18.3494846,131.718321 17.4831162,132.582084 17.4835896,133.637689 C17.4840635,134.696847 18.3433267,135.558716 19.400353,135.559901 C20.4580898,135.561084 21.3216162,134.699689 21.3225643,133.6429 C21.3235109,132.584689 20.4644846,131.723295 19.4058004,131.72092 Z M19.4009925,133.000582 C19.7493872,132.999637 20.0371504,133.281479 20.0428346,133.628216 C20.0485188,133.984426 19.7605188,134.278584 19.4047819,134.280009 C19.0490451,134.281189 18.7593872,133.988689 18.7634135,133.632005 C18.7674398,133.283847 19.0525977,133.001532 19.4009925,133.000582 Z" id="Offers"></path>
				        </g>
				    </g>
				</svg>' ),
            'taxonomies'      => [],
            'labels'          => [
                'name'               => __( 'Facilities', 'bediq' ),
                'singular_name'      => __( 'Facility', 'bediq' ),
                'menu_name'          => __( 'Facilities', 'bediq' ),
                'add_new'            => __( 'Add Facility', 'bediq' ),
                'add_new_item'       => __( 'Add New Facility', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Facility', 'bediq' ),
                'new_item'           => __( 'New Facility', 'bediq' ),
                'view'               => __( 'View Facility', 'bediq' ),
                'view_item'          => __( 'View Facility', 'bediq' ),
                'search_items'       => __( 'Search Facility', 'bediq' ),
                'not_found'          => __( 'No Facilities Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Facility Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Facility', 'bediq' ),
            ],
            'rewrite'          =>  [
                'slug'               => 'facilities',
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
            'key'       => 'group_facilities',
            'title'     => __( 'Booking', 'bediq' ),
            'fields'    => [
                [
                    'key'   => 'field_facility_booking',
                    'label' => __( 'Booking URL', 'bediq' ),
                    'name'  => 'facility_booking_url',
                    'type'  => 'text',
                ],
                [
                    'key'       => 'field_5d0a11db36416',
                    'label'     => __( 'Typical Pricing', 'bediq' ),
                    'name'      => 'facility_typical_pricing',
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
                        'value'     => 'facility',
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
            'key'       => 'group_facility_downloads',
            'title'     => __( 'Downloads', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d0a12a89b3db',
                    'label'         => '',
                    'name'          => 'facility_download_file',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'block',
                    'button_label'  => __( 'Add new download', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'   => 'field_5d0a12cc9b3dc',
                            'label' => __( 'Download Name', 'bediq' ),
                            'name'  => 'facility_download_name',
                            'type'  => 'text',
                        ],
                        [
                            'key'           => 'field_5d0a12eb9b3dd',
                            'label'         => '',
                            'name'          => 'facility_download_file',
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
                        'value'     => 'facility',
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
            'key'       => 'group_facility_floor_plan_image',
            'title'     => __( 'Floor Plan Image', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d0a13abdf555',
                    'label'         => '',
                    'name'          => 'facility_floor_plan_image',
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
                        'value'     => 'facility',
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
            'key'       => 'group_facility_gallery_image',
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
                        'value'     => 'facility',
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
            'key'       => 'group_facility_available_offer',
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
                    'key'   => 'field_5d09ff299e7ba',
                    'label' => __( 'Location', 'bediq' ),
                    'name'  => 'facility_location',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_5d09ff3d9e7bb',
                    'label' => __( 'Dress Code', 'bediq' ),
                    'name'  => 'facility_dress_code',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_5d09ff5f9e7bc',
                    'label' => 'Style',
                    'name'  => 'facility_style',
                    'type'  => 'text',
                ],
                [
                    'key'           => 'field_5d09ff7c9e7bd',
                    'label'         => '',
                    'name'          => 'facility_capacity',
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
                    'key'           => 'field_facility_shift',
                    'label'         => __( 'Opening Hours', 'bediq' ),
                    'name'          => 'facility_visibility',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'table',
                    'button_label'  => __( 'Add new shift', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'           => 'field_facility_opening_hours',
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
                            'key'           => 'field_facility_opening_days',
                            'label'         => __( 'Days', 'bediq' ),
                            'name'          => 'facility_opening_days',
                            'type'          => 'group',
                            'instructions'  => '',
                            'wrapper'       => [
                                'width' => '25',
                            ],
                            'layout' => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_facility_opening_day',
                                    'label'     => '',
                                    'name'      => 'facility_opening_days',
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
                            'name'          => 'facility_start_time',
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
                        'value'     => 'facility',
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