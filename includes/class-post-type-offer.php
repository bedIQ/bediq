<?php
namespace bedIQ;
/**
 * Class Post_Type_Offer
 */
class Post_Type_Offer extends Post_Type {
    /**
     * Constructor for Post_Type_Offer
     */
    function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ) );
        add_action( 'init', array( $this, 'register_taxonomy' ) );
        $this->add_meta_box();
    }

    /**
     * Register post type
     *
     * @return void
     */
    public function register_post_type() {
        $show_in_menu = true;
        register_post_type( 'offer', array(
            'label'           => __( 'Offers', 'bediq' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'menu_position'   => 6,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'offers'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'menu_icon'       => 'dashicons-tickets-alt',
            'taxonomies'      => [ 'hotel_offers' ],
            'labels'          => array(
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
            ),
            'rewrite'          =>  array(
                'slug'               => 'offers',
                'with_front'         => true,
                'pages'              => true,
                'feeds'              => true,
            ),
        ) );
    }

    /**
     * Register taxonomy
     *
     * @return void
     */
    public function register_taxonomy() {
        register_taxonomy( 'offer_types', array( 'offer' ),
            array(
                'hierarchical'   => true,
                'label'          => __( 'Offer Types', 'bediq' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => 'hotel-offers'),
                'singular_label' => __( 'Offers', 'bediq' )
            )
        );
    }

    /**
     * Add meta box
     */
    public function add_meta_box() {
        if ( function_exists('acf_add_local_field_group') ) {
            acf_add_local_field_group(array(
                'key'       => 'group_5d0886c4c4bd0',
                'title'     => __( 'Booking', 'bediq' ),
                'fields'    => array(
                    array(
                        'key'   => 'field_5d0886db10d80',
                        'label' => __( 'Booking URL', 'bediq' ),
                        'name'  => 'bediq_offer_booking_url',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_5d08870610d81',
                        'label' => __( 'Offer Code', 'bediq' ),
                        'name'  => 'bediq_offer_code',
                        'type'  => 'text',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param'     => 'post_type',
                            'operator'  => '==',
                            'value'     => 'offer',
                        ),
                    ),
                ),
                'menu_order'            => 0,
                'position'              => 'side',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
            ));

            acf_add_local_field_group(array(
                'key'       => 'group_5d08b3e862749',
                'title'     => __( 'Downloads', 'bediq' ),
                'fields'    => array(
                    array(
                        'key'           => 'field_5d08b3f37d9fa',
                        'label'         => '',
                        'name'          => 'downloads',
                        'type'          => 'repeater',
                        'min'           => 1,
                        'max'           => 0,
                        'layout'        => 'block',
                        'button_label'  => __( 'Add new download', 'bediq' ),
                        'sub_fields'    => array(
                            array(
                                'key'   => 'field_5d08b40f7d9fb',
                                'label' => __( 'Download Name', 'bediq' ),
                                'name'  => 'download_name',
                                'type'  => 'text',
                            ),
                            array(
                                'key'           => 'field_5d08b4297d9fc',
                                'label'         => __( 'Upload File', 'bediq' ),
                                'name'          => 'upload_file',
                                'type'          => 'file',
                                'return_format' => 'array',
                                'library'       => 'all',
                                'min_size'      => '',
                                'max_size'      => '',
                                'mime_types'    => '',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param'     => 'post_type',
                            'operator'  => '==',
                            'value'     => 'offer',
                        ),
                    ),
                ),
                'menu_order'            => 0,
                'position'              => 'side',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
            ));

            acf_add_local_field_group(array(
                'key'       => 'group_5d08b541a8fd8',
                'title'     => __( 'Gallery Images', 'bediq' ),
                'fields'    => array(
                    array(
                        'key'           => 'field_5d08b54eddbfe',
                        'label'         => '',
                        'name'          => 'gallery_image',
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
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param'     => 'post_type',
                            'operator'  => '==',
                            'value'     => 'offer',
                        ),
                    ),
                ),
                'menu_order'            => 0,
                'position'              => 'side',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
            ));

            acf_add_local_field_group(array(
                'key'       => 'group_5d08b262016ed',
                'title'     => __( 'Offer Good For', 'bediq' ),
                'fields'    => array(
                    array(
                        'key'       => 'field_5d08b27996ab3',
                        'label'     => '',
                        'name'      => 'offer_good_for',
                        'type'      => 'checkbox',
                        'choices'   => array(
                            'family'            => __( 'Family', 'bediq' ),
                            'couple'            => __( 'Couple', 'bediq' ),
                            'friends'           => __( 'Friends', 'bediq' ),
                            'solo Traveller'    => __( 'Solo Traveller', 'bediq' ),
                            'corporate'         => __( 'Corporate', 'bediq' ),
                        ),
                        'allow_custom'  => 0,
                        'default_value' => array(
                        ),
                        'layout'        => 'vertical',
                        'toggle'        => 0,
                        'return_format' => 'value',
                        'save_custom'   => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param'     => 'post_type',
                            'operator'  => '==',
                            'value'     => 'offer',
                        ),
                    ),
                ),
                'menu_order'            => 0,
                'position'              => 'side',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
            ));

            acf_add_local_field_group(array(
                'key'       => 'group_5d08b2d9caf32',
                'title'     => 'Offer Type',
                'fields'    => array(
                    array(
                        'key'       => 'field_5d08b2e6fec77',
                        'label'     => '',
                        'name'      => 'offer_type',
                        'type'      => 'checkbox',
                        'choices'   => array(
                            'discount'      => __( 'Discount', 'bediq' ),
                            'value-Add'     => __( 'Value-Add', 'bediq' ),
                            'package'       => __( 'Package', 'bediq' ),
                            'flash Sale'    => __( 'Flash Sale', 'bediq' ),
                        ),
                        'allow_custom'  => 0,
                        'default_value' => array(
                        ),
                        'layout'        => 'vertical',
                        'toggle'        => 0,
                        'return_format' => 'value',
                        'save_custom'   => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param'     => 'post_type',
                            'operator'  => '==',
                            'value'     => 'offer',
                        ),
                    ),
                ),
                'menu_order'            => 0,
                'position'              => 'side',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' =>  'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
            ));

            acf_add_local_field_group(array(
                'key'       => 'group_5d0216520406d',
                'title'     => __( 'Offers', 'bediq' ),
                'fields'    => array(
                    array(
                        'key'           => 'field_5d02166562276',
                        'label'         => __( 'Location Available', 'bediq' ),
                        'name'          => 'location_available',
                        'type'          => 'repeater',
                        'min'           => 1,
                        'max'           => 0,
                        'layout'        => 'row',
                        'button_label'  => __( 'Add New Offer', 'bediq' ),
                        'sub_fields'    => array(
                            array(
                                'key'   => 'field_5d0217c862277',
                                'label' => '',
                                'name'  => 'available_offer',
                                'type'  => 'select',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_5d02166562276',
                                            'operator' => '!=empty',
                                        ),
                                    ),
                                ),
                                'choices' => array(
                                ),
                                'default_value' => array(
                                ),
                                'allow_null' => 0,
                                'multiple' => 1,
                                'ui' => 1,
                                'ajax' => 1,
                                'return_format' => 'value',
                                'placeholder' => '',
                            ),
                        ),
                    ),
                    array(
                        'key'           => 'field_5d021994117ed',
                        'label'         => __( 'Original Price', 'bediq' ),
                        'name'          => 'original_price',
                        'type'          => 'text',
                    ),
                    array(
                        'key'   => 'field_5d0219ab117ee',
                        'label' => 'Offer Price',
                        'name'  => 'offer_price',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_5d0219e0117ef',
                        'label' => __( 'Minimum Booking', 'bediq' ),
                        'name'  => 'minimum_booking',
                        'type'  => 'text',
                        'wrapper'   => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array(
                        'key'       => 'field_5d021a41117f0',
                        'label'     => __( 'Unit', 'bediq' ),
                        'name'      => 'unit',
                        'type'      => 'select',
                        'wrapper'   => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Amount'    => __( 'Amount', 'bediq' ),
                            'People'    => __( 'People', 'bediq' ),
                            'Night'     => __( 'Night', 'bediq' ),
                        ),
                    ),
                    array(
                        'key'       => 'field_5d021a95117f1',
                        'label'     => __( 'Advance Booking', 'bediq' ),
                        'name'      => 'advance_booking',
                        'type'      => 'number',
                        'wrapper'   => array(
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key'       => 'field_5d021ad1117f2',
                        'label'     => __( 'Unit', 'bediq' ),
                        'name'      => 'advance_booking_unit',
                        'type'      => 'select',
                        'wrapper'   => array(
                            'width' => '50',
                        ),
                        'choices' => array(
                            'Hours'     => __( 'Hours', 'bediq' ),
                            'Weeks'     => __( 'Weeks', 'bediq' ),
                            'Days'      => __( 'Days', 'bediq' ),
                            'Months'    => __( 'Months', 'bediq' ),
                        ),
                        'return_format' => 'value',
                    ),
                    array(
                        'key'           => 'field_5d0311d0276a9',
                        'label'         => 'Visibility',
                        'name'          => 'visibility',
                        'type'          => 'repeater',
                        'min'           => 1,
                        'max'           => 0,
                        'layout'        => 'table',
                        'button_label'  => __( 'Add new date range', 'bediq' ),
                        'sub_fields'    => array(
                            array(
                                'key'       => 'field_5d0311ec276aa',
                                'label'     => '',
                                'name'      => 'date_range',
                                'type'      => 'group',
                                'wrapper'   => array(
                                    'width' => '25',
                                ),
                                'layout'    => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key'               => 'field_5d031247276ab',
                                        'label'             => __( 'From', 'bediq' ),
                                        'name'              => 'visibility_from_date',
                                        'type'              => 'date_picker',
                                        'display_format'    => 'd/m/Y',
                                        'return_format'     => 'd/m/Y',
                                        'first_day'         => 1,
                                    ),
                                    array(
                                        'key'               => 'field_5d031278276ac',
                                        'label'             => __( 'To', 'bediq' ),
                                        'name'              => 'visibility_to_date',
                                        'type'              => 'date_picker',
                                        'display_format'    => 'd/m/Y',
                                        'return_format'     => 'd/m/Y',
                                        'first_day'         => 1,
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_5d0871934ed3a',
                                'label'         => __( 'Days', 'bediq' ),
                                'name'          => 'visiblity_days',
                                'type'          => 'group',
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'       => 'field_5d0871b84ed3b',
                                        'label'     => '',
                                        'name'      => 'days',
                                        'type'      => 'checkbox',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-visiblity-days',
                                            'id' => '',
                                        ),
                                        'choices' => array(
                                            'monday'    => __( 'Monday', 'bediq' ),
                                            'tuesday'   => __( 'Tuesday', 'bediq' ),
                                            'wednesday' => __( 'Wednesday', 'bediq' ),
                                            'thursday'  => __( 'Thursday', 'bediq' ),
                                            'friday'    => __( 'Friday', 'bediq' ),
                                            'saturday'  => __( 'Saturday', 'bediq' ),
                                            'sunday'    => __( 'Sunday', 'bediq' ),
                                        ),
                                        'allow_custom' => 0,
                                        'default_value' => array(
                                        ),
                                        'layout' => 'vertical',
                                        'toggle' => 0,
                                        'return_format' => 'value',
                                        'save_custom' => 0,
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_5d0872b0e1e32',
                                'label'         => __( 'From HH:mm', 'bediq' ),
                                'name'          => 'start_time',
                                'type'          => 'group',
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'       => 'field_5d0872fee1e33',
                                        'label'     => '',
                                        'name'      => 'monday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format' => 'g:i a',
                                        'return_format' => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08732be1e34',
                                        'label'     => '',
                                        'name'      => 'tuesday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format' => 'g:i a',
                                        'return_format' => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d087347e1e35',
                                        'label'     => '',
                                        'name'      => 'wednesday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08735be1e36',
                                        'label'     => '',
                                        'name'      => 'thursday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08736ee1e37',
                                        'label'     => '',
                                        'name'      => 'friday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08737fe1e38',
                                        'label'     => '',
                                        'name'      => 'saturday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d087396e1e39',
                                        'label'     => '',
                                        'name'      => 'sunday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_5d0873b1e1e3a',
                                'label'         => __( 'To HH:mm', 'bediq' ),
                                'name'          => 'end_time',
                                'type'          => 'group',
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'       => 'field_5d0873c3e1e3b',
                                        'label'     => '',
                                        'name'      => 'monday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d0873dce1e3c',
                                        'label'     => '',
                                        'name'      => 'tuesday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d0873ebe1e3d',
                                        'label'     => '',
                                        'name'      => 'wednesday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'     => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d0873fae1e3e',
                                        'label'     => '',
                                        'name'      => 'thursday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d087405e1e3f',
                                        'label'     => '',
                                        'name'      => 'friday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d087410e1e40',
                                        'label'     => '',
                                        'name'      => 'saturday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08741de1e41',
                                        'label'     => '',
                                        'name'      => 'sunday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key'           => 'field_5d08841ba50e6',
                        'label'         => __( 'Eligibility', 'bediq' ),
                        'name'          => 'bediq_eligibility',
                        'type'          => 'repeater',
                        'min'           => 1,
                        'max'           => 0,
                        'layout'        => 'table',
                        'button_label'  => __( 'Add new date range', 'bediq' ),
                        'sub_fields'    => array(
                            array(
                                'key'       => 'field_5d08841ca50e7',
                                'label'     => '',
                                'name'      => 'date_range',
                                'type'      => 'group',
                                'wrapper'   => array(
                                    'width' => '25',
                                    'class' => '',
                                    'id'    => '',
                                ),
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key'               => 'field_5d08841ca50e8',
                                        'label'             => __( 'From', 'bediq' ),
                                        'name'              => 'visibility_from_date',
                                        'type'              => 'date_picker',
                                        'display_format'    => 'd/m/Y',
                                        'return_format'     => 'd/m/Y',
                                        'first_day'         => 1,
                                    ),
                                    array(
                                        'key'               => 'field_5d08841ca50e9',
                                        'label'             => __( 'To', 'bediq' ),
                                        'name'              => 'visibility_to_date',
                                        'type'              => 'date_picker',
                                        'display_format'    => 'd/m/Y',
                                        'return_format'     => 'd/m/Y',
                                        'first_day'         => 1,
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_5d08841ca50ea',
                                'label'         => __( 'Days', 'bediq' ),
                                'name'          => 'visiblity_days',
                                'type'          => 'group',
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'       => 'field_5d08841ca50eb',
                                        'label'     => '',
                                        'name'      => 'days',
                                        'type'      => 'checkbox',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-visiblity-days',
                                            'id'    => '',
                                        ),
                                        'choices'   => array(
                                            'monday'    => __( 'Monday', 'bediq' ),
                                            'tuesday'   => __( 'Tuesday', 'bediq' ),
                                            'wednesday' => __( 'Wednesday', 'bediq' ),
                                            'thursday'  => __( 'Thursday', 'bediq' ),
                                            'friday'    => __( 'Friday', 'bediq' ),
                                            'saturday'  => __( 'Saturday', 'bediq' ),
                                            'sunday'    => __( 'Sunday', 'bediq' ),
                                        ),
                                        'allow_custom'  => 0,
                                        'save_custom'   => 0,
                                        'default_value' => array(
                                        ),
                                        'layout'        => 'vertical',
                                        'toggle'        => 0,
                                        'return_format' => 'value',
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_5d08841ca50ec',
                                'label'         => __( 'From HH:mm', 'bediq' ),
                                'name'          => 'start_time',
                                'type'          => 'group',
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'       => 'field_5d08841ca50ed',
                                        'label'     => '',
                                        'name'      => 'monday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50ee',
                                        'label'     => '',
                                        'name'      => 'tuesday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50ef',
                                        'label'     => '',
                                        'name'      => 'wednesday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50f0',
                                        'label'     => '',
                                        'name'      => 'thursday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50f1',
                                        'label'     => '',
                                        'name'      => 'friday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50f2',
                                        'label'     => '',
                                        'name'      => 'saturday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50f3',
                                        'label'     => '',
                                        'name'      => 'sunday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_5d08841ca50f4',
                                'label'         => __( 'To HH:mm', 'bediq' ),
                                'name'          => 'end_time',
                                'type'          => 'group',
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'       => 'field_5d08841ca50f5',
                                        'label'     => '',
                                        'name'      => 'monday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50f6',
                                        'label'     => '',
                                        'name'      => 'tuesday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50f7',
                                        'label'     => '',
                                        'name'      => 'wednesday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50f8',
                                        'label'     => '',
                                        'name'      => 'thursday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50f9',
                                        'label'     => '',
                                        'name'      => 'friday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50fa',
                                        'label'     => '',
                                        'name'      => 'saturday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d08841ca50fb',
                                        'label'     => '',
                                        'name'      => 'sunday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key'           => 'field_5d088536abcad',
                        'label'         => __( 'Availability', 'bediq' ),
                        'name'          => 'bediq_availability',
                        'type'          => 'repeater',
                        'min'           => 1,
                        'max'           => 0,
                        'layout'        => 'table',
                        'button_label'  => __( 'Add new date range', 'bediq' ),
                        'sub_fields'    => array(
                            array(
                                'key'       => 'field_5d088536abcae',
                                'label'     => '',
                                'name'      => 'date_range',
                                'type'      => 'group',
                                'wrapper'   => array(
                                    'width' => '25',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'               => 'field_5d088536abcaf',
                                        'label'             => __( 'From', 'bediq' ),
                                        'name'              => 'visibility_from_date',
                                        'type'              => 'date_picker',
                                        'display_format'    => 'd/m/Y',
                                        'return_format'     => 'd/m/Y',
                                        'first_day'         => 1,
                                    ),
                                    array(
                                        'key'               => 'field_5d088536abcb0',
                                        'label'             => __( 'To', 'bediq' ),
                                        'name'              => 'visibility_to_date',
                                        'type'              => 'date_picker',
                                        'display_format'    => 'd/m/Y',
                                        'return_format'     => 'd/m/Y',
                                        'first_day'         => 1,
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_5d088536abcb1',
                                'label'         => __( 'Days', 'bediq' ),
                                'name'          => 'visiblity_days',
                                'type'          => 'group',
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'       => 'field_5d088536abcb2',
                                        'label'     => '',
                                        'name'      => 'days',
                                        'type'      => 'checkbox',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-visiblity-days',
                                            'id'    => '',
                                        ),
                                        'choices'   => array(
                                            'monday'    => __( 'Monday', 'bediq' ),
                                            'tuesday'   => __( 'Tuesday', 'bediq' ),
                                            'wednesday' => __( 'Wednesday', 'bediq' ),
                                            'thursday'  => __( 'Thursday', 'bediq' ),
                                            'friday'    => __( 'Friday', 'bediq' ),
                                            'saturday'  => __( 'Saturday', 'bediq' ),
                                            'sunday'    => __( 'Sunday', 'bediq' ),
                                        ),
                                        'allow_custom'  => 0,
                                        'save_custom'   => 0,
                                        'default_value' => array(
                                        ),
                                        'layout'        => 'vertical',
                                        'toggle'        => 0,
                                        'return_format' => 'value',
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_5d088536abcb3',
                                'label'         => __( 'From HH:mm', 'bediq' ),
                                'name'          => 'start_time',
                                'type'          => 'group',
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'       => 'field_5d088536abcb4',
                                        'label'     => '',
                                        'name'      => 'monday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088536abcb5',
                                        'label'     => '',
                                        'name'      => 'tuesday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088536abcb6',
                                        'label'     => '',
                                        'name'      => 'wednesday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088536abcb7',
                                        'label'     => '',
                                        'name'      => 'thursday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088536abcb8',
                                        'label'     => '',
                                        'name'      => 'friday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088536abcb9',
                                        'label'     => '',
                                        'name'      => 'saturday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088537abcba',
                                        'label'     => '',
                                        'name'      => 'sunday_start',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_5d088537abcbb',
                                'label'         => __( 'To HH:mm', 'bediq' ),
                                'name'          => 'end_time',
                                'type'          => 'group',
                                'layout'        => 'block',
                                'sub_fields'    => array(
                                    array(
                                        'key'       => 'field_5d088537abcbc',
                                        'label'     => '',
                                        'name'      => 'monday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088537abcbd',
                                        'label'     => '',
                                        'name'      => 'tuesday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id' => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088537abcbe',
                                        'label'     => '',
                                        'name'      => 'wednesday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088537abcbf',
                                        'label'     => '',
                                        'name'      => 'thursday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088537abcc0',
                                        'label'     => '',
                                        'name'      => 'friday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088537abcc1',
                                        'label'     => '',
                                        'name'      => 'saturday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                    array(
                                        'key'       => 'field_5d088537abcc2',
                                        'label'     => '',
                                        'name'      => 'sunday_end',
                                        'type'      => 'time_picker',
                                        'wrapper'   => array(
                                            'width' => '',
                                            'class' => 'bediq-time-picker',
                                            'id'    => '',
                                        ),
                                        'display_format'    => 'g:i a',
                                        'return_format'     => 'g:i a',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key'           => 'field_5d0888ff4a970',
                        'label'         => __( 'Conditions', 'bediq' ),
                        'name'          => 'conditions',
                        'type'          => 'repeater',
                        'min'           => 1,
                        'max'           => 0,
                        'layout'        => 'table',
                        'button_label'  => __( 'Add new condtion', 'bediq' ),
                        'sub_fields'    => array(
                            array(
                                'key'   => 'field_5d08891b4a971',
                                'label' => '',
                                'name'  => 'condition',
                                'type'  => 'text',
                            ),
                        ),
                    ),
                    array(
                        'key'   => 'field_5d088951e3b8c',
                        'label' => __( 'Description', 'bediq' ),
                        'name'  => 'description',
                        'type'  => 'textarea',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param'     => 'post_type',
                            'operator'  => '==',
                            'value'     => 'offer',
                        ),
                    ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
            ));

        }
    }
}