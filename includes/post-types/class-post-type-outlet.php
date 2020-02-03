<?php
namespace bedIQ\Post_Type;
/**
 * Class Post_Type_Outlet
 */
class Outlet implements \bedIQ\Post_Type {
    /**
     * Constructor for Post_Type_OUtlet
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
        register_post_type( 'outlet', [
            'label'           => __( 'Outlets', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 6,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => ['slug' => 'outlets'],
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => ['title', 'editor', 'thumbnail'],
            'menu_icon'       => "data:image/svg+xml;base64," . base64_encode( '<?xml version="1.0" encoding="UTF-8"?>
				<svg width="18px" height="15px" viewBox="0 0 18 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <!-- Generator: Sketch 61.2 (89653) - https://sketch.com -->
				    <title>Outlets</title>
				    <desc>Created with Sketch.</desc>
				    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g id="BedIQ" transform="translate(-13.000000, -156.000000)" fill="#9EA3A8">
				            <path d="M16.4596222,156.214278 C20.1440507,156.225857 23.8289079,156.225 27.5133365,156.216 C27.9209079,156.215143 28.2003365,156.363214 28.4079793,156.705214 C29.0804079,157.812214 29.7603365,158.9145 30.4381222,160.018714 C30.5514793,160.203429 30.6665507,160.387286 30.7811936,160.571571 C30.9371936,160.8225 30.9704079,161.085429 30.8709793,161.367 C30.7036222,161.840786 30.3929079,162.186857 29.9371222,162.392571 C29.804265,162.452571 29.7691222,162.525429 29.7693365,162.663857 C29.7738365,164.919429 29.7725507,167.174571 29.7723365,169.429929 C29.7723365,170.200071 29.2908365,170.679738 28.5174793,170.679738 L15.4194793,170.679738 L15.4194793,170.679738 C14.6324079,170.679429 14.156265,170.205857 14.1560507,169.420714 C14.1556222,167.171357 14.1551936,164.922 14.1590507,162.672643 C14.159265,162.531214 14.129265,162.453 13.9848365,162.388286 C13.5226222,162.180857 13.2110507,161.826 13.0499079,161.342143 C12.962265,161.079643 12.9901222,160.830429 13.1334793,160.596214 C13.9203365,159.311786 14.7131936,158.031 15.4934079,156.7425 C15.7194793,156.369429 16.0169079,156.213 16.4596222,156.214278 Z M23.760765,160.960071 C23.5634079,162.130071 22.6944793,162.557143 22.0040507,162.572571 C21.0909793,162.593143 20.4496222,162.045 20.1721222,161.014286 C19.8134079,162.106286 19.2149079,162.608143 18.3131936,162.572143 C17.6478365,162.545786 16.7774079,162.136071 16.584765,160.996286 C16.5654793,161.055214 16.5489793,161.093143 16.5410507,161.132786 C16.4159079,161.764714 16.0383365,162.188786 15.4516222,162.428143 C15.3266936,162.478929 15.296265,162.541286 15.2964793,162.665357 C15.2999079,164.727643 15.2990507,166.789929 15.299265,168.852 C15.299265,169.014857 15.2840507,169.179857 15.3061222,169.339714 C15.3159793,169.409786 15.3993365,169.522071 15.453765,169.525071 C15.7880507,169.542429 16.1236222,169.533643 16.4718365,169.533643 L16.4716222,164.178 L16.4716222,164.178 C16.4716222,163.824857 16.5511222,163.747071 16.9100507,163.747071 C17.7843365,163.747286 18.6586222,163.7475 19.5331222,163.747929 C19.8404079,163.748143 19.9299793,163.837071 19.9299793,164.145857 L19.9305686,166.732741 L19.9305686,166.732741 L19.9308365,169.529786 C20.001765,169.533214 20.043765,169.536857 20.0853365,169.536857 L28.3524793,169.536857 L28.3524793,169.536857 C28.5869079,169.536857 28.629765,169.491214 28.6299793,169.245 C28.6304079,167.050071 28.6289079,164.855143 28.6331944,162.660429 C28.6334079,162.530786 28.5920507,162.476571 28.472265,162.427714 C27.8988365,162.1935 27.5266222,161.779714 27.392265,161.165571 C27.3824079,161.121 27.3631222,161.078357 27.3401936,161.011929 C27.1653365,162.047786 26.3855507,162.525 25.6631936,162.569143 C25.1939079,162.597857 24.770265,162.460071 24.402765,162.163286 C24.0365507,161.867357 23.8396222,161.4735 23.760765,160.960071 Z M27.0560936,163.747221 C27.364665,163.747221 27.4568079,163.839364 27.4568079,164.142793 L27.4565936,167.959221 L27.4565936,167.959221 C27.4563793,168.276793 27.3683079,168.363579 27.0468793,168.363579 L21.4943079,168.363579 L21.4943079,168.363579 C21.1955936,168.363364 21.1040936,168.271864 21.1040936,167.977007 C21.103665,166.692793 21.103665,165.408579 21.1040936,164.124364 C21.1043079,163.841079 21.1983793,163.748079 21.4853079,163.747864 C23.3423079,163.747436 25.1990936,163.747221 27.0560936,163.747221 Z M17.631765,166.627929 C17.2936222,166.624714 17.0358365,166.880143 17.0364781,167.217214 C17.0373365,167.542929 17.2953365,167.799857 17.621265,167.800286 C17.9448365,167.8005 18.2066936,167.541 18.2088365,167.2185 C18.2109793,166.892357 17.9555507,166.631143 17.631765,166.627929 Z M26.883165,164.321079 L25.8070222,164.321079 C26.1590936,164.682364 26.5233793,165.056079 26.883165,165.425293 L26.883165,164.321079 Z M25.8665507,157.362853 C25.1015507,157.364571 24.336765,157.3635 23.5719793,157.364357 C23.5196936,157.364357 23.4676222,157.371214 23.4014079,157.376143 C23.4986936,158.346857 23.5944793,159.302571 23.6909079,160.265143 L27.1186222,160.265143 C27.111765,160.223786 27.111765,160.198929 27.1036222,160.1775 C26.759265,159.279643 26.4114793,158.383071 26.072265,157.483286 C26.0296222,157.370357 25.9625507,157.362643 25.8665507,157.362853 Z M20.5286936,157.363929 C19.6653365,157.363929 18.8351936,157.361357 18.0048365,157.369929 C17.9525507,157.370357 17.8751936,157.446214 17.8526936,157.503857 C17.5126222,158.377286 17.1794079,159.253714 16.8459793,160.129929 C16.8303365,160.170857 16.8249793,160.215429 16.8134079,160.264286 L20.2381222,160.264286 C20.3345507,159.300429 20.4303365,158.344929 20.5286936,157.363929 Z" id="Outlets"></path>
				        </g>
				    </g>
				</svg>' ),
            'taxonomies'      => [],
            'labels'          => [
                'name'               => __( 'Outlets', 'bediq' ),
                'singular_name'      => __( 'Outlet', 'bediq' ),
                'menu_name'          => __( 'Outlets', 'bediq' ),
                'add_new'            => __( 'Add Outlet', 'bediq' ),
                'add_new_item'       => __( 'Add New Outlet', 'bediq' ),
                'edit'               => __( 'Edit', 'bediq' ),
                'edit_item'          => __( 'Edit Outlet', 'bediq' ),
                'new_item'           => __( 'New Outlet', 'bediq' ),
                'view'               => __( 'View Outlet', 'bediq' ),
                'view_item'          => __( 'View Outlet', 'bediq' ),
                'search_items'       => __( 'Search Outlets', 'bediq' ),
                'not_found'          => __( 'No Outlets Found', 'bediq' ),
                'not_found_in_trash' => __( 'No Outlets Found in Trash', 'bediq' ),
                'parent'             => __( 'Parent Outlet', 'bediq' ),
            ],
            'rewrite'          =>  [
                'slug'               => 'outlets',
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
            'key'       => 'group_5d0a1178c04af',
            'title'     => __( 'Booking', 'bediq' ),
            'fields'    => [
                [
                    'key'   => 'field_5d0a118736415',
                    'label' => __( 'Booking URL', 'bediq' ),
                    'name'  => 'outlet_booking_url',
                    'type'  => 'text',
                ],
                [
                    'key'       => 'field_5d0a11db36416',
                    'label'     => __( 'Typical Pricing', 'bediq' ),
                    'name'      => 'outlet_typical_pricing',
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
                        'value'     => 'outlet',
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
            'key'       => 'group_5d0a12963aebb',
            'title'     => __( 'Downloads', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d0a12a89b3db',
                    'label'         => '',
                    'name'          => 'outlet_download_file',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'block',
                    'button_label'  => __( 'Add new download', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key'   => 'field_5d0a12cc9b3dc',
                            'label' => __( 'Download Name', 'bediq' ),
                            'name'  => 'outlet_download_name',
                            'type'  => 'text',
                        ],
                        [
                            'key'           => 'field_5d0a12eb9b3dd',
                            'label'         => '',
                            'name'          => 'outlet_download_file',
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
                        'value'     => 'outlet',
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
            'key'       => 'group_5d0a139d7c415',
            'title'     => __( 'Floor Plan Image', 'bediq' ),
            'fields'    => [
                [
                    'key'           => 'field_5d0a13abdf555',
                    'label'         => '',
                    'name'          => 'outlet_floor_plan_image',
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
                        'value'     => 'outlet',
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
            'key'       => 'group_5d0a146ec8466',
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
                        'value'     => 'outlet',
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
            'key'       => 'group_5d09fb316fe1b',
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
                    'key' => 'field_5d09fdbc894e9',
                    'label' => 'Floor Size',
                    'name' => 'floor_size',
                    'type' => 'text',
                ],
                [
                    'key'       => 'field_5d09fe94ec89e',
                    'label'     => __( 'Unit', 'bediq' ),
                    'name'      => 'floor_size_unit',
                    'type'      => 'select',
                    'wrapper'   => [
                        'width' => '50',
                    ],
                    'choices' => [
                        'sqft'  => __( 'SQFT', 'bediq' ),
                        'SQM'   => __( 'SQM', 'bediq' ),
                    ],
                    'default_value' => [
                    ],
                    'allow_null'    => 0,
                    'multiple'      => 0,
                    'ui'            => 0,
                    'return_format' => 'value',
                    'ajax'          => 0,
                    'placeholder'   => '',
                ],
                [
                    'key'   => 'field_5d09ff299e7ba',
                    'label' => __( 'Location', 'bediq' ),
                    'name'  => 'outlet_location',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_5d09ff3d9e7bb',
                    'label' => __( 'Dress Code', 'bediq' ),
                    'name'  => 'outlet_dress_code',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_5d09ff5f9e7bc',
                    'label' => 'Style',
                    'name'  => 'outlet_style',
                    'type'  => 'text',
                ],
                [
                    'key'           => 'field_5d09ff7c9e7bd',
                    'label'         => '',
                    'name'          => 'outlet_capacity',
                    'type'          => 'repeater',
                    'min'           => 1,
                    'max'           => 0,
                    'layout'        => 'block',
                    'button_label'  => __( 'Add Capacity', 'bediq' ),
                    'sub_fields'    => [
                        [
                            'key' => 'field_5d09ff939e7be',
                            'label' => 'Capacity',
                            'name' => 'capacity',
                            'type' => 'text',
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
                    'key'           => 'field_outlet_shift',
                    'label'         => __( 'Opening Hours', 'bediq' ),
                    'name'          => 'outlet_visibility',
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
                        'value'     => 'outlet',
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
            'fields'  => [
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
                        'value'     => 'outlet',
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