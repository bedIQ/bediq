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
        register_post_type( 'poi', [
            'label'           => __( 'Point Of Interest', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 5,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => ['slug' => 'poi'],
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => ['title', 'editor', 'thumbnail'],
            'taxonomies'      => [ 'poi_types' ],
            'menu_icon'       => "data:image/svg+xml;base64," . base64_encode( '<?xml version="1.0" encoding="UTF-8"?>
				<svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <!-- Generator: Sketch 61.2 (89653) - https://sketch.com -->
				    <title>Points of Interest</title>
				    <desc>Created with Sketch.</desc>
				    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g id="BedIQ" transform="translate(-14.000000, -183.000000)" fill="#9EA3A8">
				            <path d="M20.9776345,191.939448 L22.9266,191.939448 L22.9266,189.990759 L20.9776345,189.990759 L20.9776345,191.939448 Z M18.9737724,187.978897 C18.9737724,187.451724 18.9837034,186.948828 18.9715655,186.446483 C18.9528069,185.649241 18.2937724,185.010069 17.5003931,185.003724 C16.7122552,184.997103 16.0452207,185.612828 15.9969448,186.391034 C15.9475655,187.196828 16.5417724,187.918483 17.3431517,187.972276 C17.8744621,188.00731 18.4099103,187.978897 18.9737724,187.978897 L18.9737724,187.978897 Z M24.9381862,193.952966 C24.9381862,194.476276 24.9321172,194.971724 24.9395655,195.466897 C24.9519793,196.26331 25.604669,196.913793 26.3947379,196.927586 C27.1930828,196.941379 27.8714276,196.320138 27.916669,195.533931 C27.9627379,194.73531 27.3803931,194.018621 26.5881172,193.96069 C26.0501862,193.921241 25.5067379,193.952966 24.9381862,193.952966 L24.9381862,193.952966 Z M18.972669,193.948 C18.440531,193.948 17.9301862,193.937517 17.420669,193.949931 C16.6300483,193.970069 15.9941862,194.64069 15.9941862,195.437103 C15.9941862,196.232138 16.6336345,196.899724 17.4209448,196.927034 C18.2297724,196.955172 18.9337724,196.337241 18.968531,195.54 C18.9911517,195.021931 18.972669,194.502207 18.972669,193.948 L18.972669,193.948 Z M24.9439793,187.983862 C25.4675655,187.983862 25.9632897,187.990759 26.4587379,187.982483 C27.2557034,187.968966 27.9050828,187.316 27.9186,186.525931 C27.9321172,185.735586 27.3252207,185.062759 26.5475655,185.006483 C25.740669,184.947724 25.0099103,185.533379 24.9514276,186.334207 C24.9122552,186.872414 24.9439793,187.415862 24.9439793,187.983862 L24.9439793,187.983862 Z M29.9221862,195.204552 L29.9221862,195.670483 C29.9083931,195.721517 29.8874276,195.772 29.8816345,195.823862 C29.5986,198.395448 26.6728069,199.773379 24.5208069,198.338897 C23.4830138,197.647034 22.9718414,196.652552 22.9478414,195.409517 C22.9384621,194.930345 22.9464621,194.450897 22.9464621,193.961793 L20.9660483,193.961793 C20.9660483,194.456966 20.9715655,194.937517 20.9649448,195.417793 C20.9357034,197.524828 19.2123931,199.082897 17.1260483,198.892 C15.4234276,198.736414 14.0979103,197.321241 14.0060483,195.56069 C13.9202552,193.914897 15.1315655,192.336966 16.768531,192.048138 C17.3732207,191.941103 18.0043931,191.981103 18.6234276,191.955724 C18.7357034,191.951034 18.848531,191.954897 18.9624621,191.954897 L18.9624621,189.97531 C18.8587379,189.97531 18.7671517,189.976414 18.6758414,189.975034 C18.1715655,189.967586 17.6648069,189.989655 17.1638414,189.946345 C15.4369448,189.797103 14.1536345,188.455034 14.0099103,186.677379 C13.8813586,185.085379 15.0101862,183.546345 16.6173586,183.129241 C16.8259103,183.075172 17.0402552,183.042345 17.2518414,182.999862 L17.7177724,182.999862 C17.7690828,183.013655 17.8201172,183.033517 17.872531,183.039586 C19.336531,183.206759 20.5536345,184.268 20.8628759,185.70469 C20.9580483,186.145793 20.9426,186.612276 20.9635655,187.067724 C20.9776345,187.366483 20.9663241,187.666345 20.9663241,187.966759 L22.9467379,187.966759 C22.9467379,187.461103 22.9401172,186.972828 22.9478414,186.485103 C22.972669,184.860828 24.0474276,183.499448 25.6063241,183.114621 C25.8002552,183.066621 25.9991517,183.037931 26.1955655,182.999862 L26.6612207,182.999862 C26.7128069,183.013655 26.7638414,183.033517 26.8159793,183.039586 C28.2783241,183.206759 29.4744621,184.264414 29.8134966,185.696138 C29.8576345,185.882345 29.8863241,186.072414 29.9221862,186.260552 L29.9221862,186.726483 C29.9083931,186.777517 29.8874276,186.828 29.8816345,186.880138 C29.7194276,188.346069 28.6319793,189.582759 27.1952897,189.877655 C26.7674276,189.965379 26.3177724,189.953241 25.8777724,189.972552 C25.5712897,189.986069 25.2637034,189.97531 24.9552897,189.97531 L24.9552897,191.955448 C25.4609448,191.955448 25.9492207,191.949379 26.4372207,191.956552 C28.0617724,191.981655 29.4190138,193.053931 29.8060483,194.61669 C29.8540483,194.810621 29.8838414,195.008414 29.9221862,195.204552 L29.9221862,195.204552 Z" id="Points-of-Interest"></path>
				        </g>
				    </g>
				</svg>' ),
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
                'slug'               => 'poi',
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
                    'label' => __( 'Booking URL', 'bediq' ),
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
                        'value'     => 'poi',
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
                        'value'     => 'poi',
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
                        'value'     => 'poi',
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
                        'value'     => 'poi',
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
                        'value'     => 'poi',
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
                    'key'           => 'field_poi_shift',
                    'label'         => __( 'Opening Hours', 'bediq' ),
                    'name'          => 'poi_visibility',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'table',
                    'button_label'  => __( 'Add new shift', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'           => 'field_poi_opening_hours',
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
                            'key'           => 'field_poi_opening_days',
                            'label'         => __( 'Days', 'bediq' ),
                            'name'          => 'poi_opening_days',
                            'type'          => 'group',
                            'instructions'  => '',
                            'wrapper'       => [
                                'width' => '25',
                            ],
                            'layout' => 'block',
                            'sub_fields'    => [
                                [
                                    'key'       => 'field_poi_opening_day',
                                    'label'     => '',
                                    'name'      => 'poi_opening_day',
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
                        'value'     => 'poi',
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
                        'value'     => 'poi',
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