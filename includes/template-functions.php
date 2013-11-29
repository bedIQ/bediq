<?php

/*  --------------------------------------------------
:: Room template Hooks
-------------------------------------------------- */

add_action( 'bediq_before_single_room', 'bediq_template_thumbnail_image', 10 );
add_action( 'bediq_before_single_room', 'bediq_template_post_title', 15 );

add_action( 'bediq_before_single_room_summary', 'bediq_template_room_schema', 15 );
add_action( 'bediq_before_single_room_summary', 'bediq_template_room_book_now', 20 );

add_action( 'bediq_single_room_summary', 'bediq_template_post_content', 10 );

add_action( 'bediq_after_single_room_summary', 'bediq_template_room_tab_room', 15 );

/*  --------------------------------------------------
:: Event template Hooks
-------------------------------------------------- */

add_action( 'bediq_before_single_event', 'bediq_template_featured_image', 10 );
add_action( 'bediq_before_single_event', 'bediq_template_post_title', 15 );

add_action( 'bediq_before_single_event_summary', 'bediq_template_time', 15 );
add_action( 'bediq_before_single_event_summary', 'bediq_template_join_button', 20 );
add_action( 'bediq_before_single_event_summary', 'bediq_template_event_schema', 25 );

add_action( 'bediq_single_event_summary', 'bediq_template_post_content', 10 );

add_action( 'bediq_after_single_event_summary', 'bediq_template_event_tab', 10 );


/*  --------------------------------------------------
:: Offer template Hooks
-------------------------------------------------- */


add_action( 'bediq_before_single_offer', 'bediq_template_featured_image', 10 );
add_action( 'bediq_before_single_offer', 'bediq_template_post_title', 15 );

add_action( 'bediq_before_single_offer_summary', 'bediq_template_offer_offer', 15 );
add_action( 'bediq_before_single_offer_summary', 'bediq_template_book_button', 20 );

add_action( 'bediq_single_offer_summary', 'bediq_template_post_content', 10 );
add_action( 'bediq_single_offer_summary', 'bediq_template_offer_schema', 15 );

add_action( 'bediq_after_single_offer_summary', 'bediq_template_offer_tab', 15 );


/*  --------------------------------------------------
:: Outlet template Hooks
-------------------------------------------------- */

add_action( 'bediq_before_single_outlet', 'bediq_template_featured_image', 10 );
add_action( 'bediq_before_single_outlet', 'bediq_template_post_title', 15 );

add_action( 'bediq_before_single_outlet_summary', 'bediq_template_outlet_schema', 15 );

add_action( 'bediq_single_outlet_summary', 'bediq_template_post_content', 10 );

add_action( 'bediq_after_single_outlet_summary', 'bediq_template_outlet_tab', 10 );



/*  --------------------------------------------------
:: Activity template Hooks
-------------------------------------------------- */

add_action( 'bediq_before_single_activity', 'bediq_template_featured_image', 10 );
add_action( 'bediq_before_single_activity', 'bediq_template_activity_title', 15 );

add_action( 'bediq_before_single_activity_summary', 'bediq_template_time', 15 );
add_action( 'bediq_before_single_activity_summary', 'bediq_template_join_button', 20 );
add_action( 'bediq_before_single_activity_summary', 'bediq_template_activity_schema', 25 );

add_action( 'bediq_single_activity_summary', 'bediq_template_post_content', 10 );

add_action( 'bediq_after_single_activity_summary', 'bediq_template_activity_tab', 10 );


/*  --------------------------------------------------
:: Leisure template Hooks
-------------------------------------------------- */


add_action( 'bediq_before_single_leisure', 'bediq_template_featured_image', 10 );
add_action( 'bediq_before_single_leisure', 'bediq_template_post_title', 15 );

add_action( 'bediq_before_single_leisure_summary', 'bediq_template_leisure_schema', 15 );

add_action( 'bediq_single_leisure_summary', 'bediq_template_post_content', 10 );

add_action( 'bediq_after_single_leisure_summary', 'bediq_template_leisure_tab', 10 );


/*  --------------------------------------------------
:: Facility template Hooks
-------------------------------------------------- */


add_action( 'bediq_before_single_facility', 'bediq_template_featured_image', 10 );
add_action( 'bediq_before_single_facility', 'bediq_template_post_title', 15 );

add_action( 'bediq_before_single_facility_summary', 'bediq_template_facility_schema', 10 );

add_action( 'bediq_single_facility_summary', 'bediq_template_post_content', 15 );

add_action( 'bediq_after_single_facility_summary', 'bediq_template_facility_tab', 10 );


/*  --------------------------------------------------
:: Services template Hooks
-------------------------------------------------- */


add_action( 'bediq_before_single_services', 'bediq_template_featured_image', 10 );
add_action( 'bediq_before_single_services', 'bediq_template_post_title', 15 );

add_action( 'bediq_before_single_services_summary', 'bediq_template_services_schema', 10 );

add_action( 'bediq_single_services_summary', 'bediq_template_post_content', 10 );

add_action( 'bediq_after_single_services_summary', 'bediq_template_services_tab', 10 );

/*  --------------------------------------------------
:: common functions
-------------------------------------------------- */


function bediq_template_post_title() {
    ?>
    <header>
        <h1 class="bediq-entry-title" itemprop="name"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->
    <?php
}

function bediq_template_post_content() {
    ?>
    <div itemprop="description" class="bediq-description">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bediq' ) ); ?>
    </div>
    <?php
}
function bediq_template_featured_image() {
    if ( has_post_thumbnail() ) {

        echo '<div class="bediq-image-wrap">';
        if ( function_exists( 'wpthumb') ) {

            $args = apply_filters( 'bediq_wpthumb_featured_image', 'width=990&height=300&crop=1' );
            the_post_thumbnail( $args);

        } else {

            $args = array('class' => 'flex-container', 'itemprop' => 'image');
            the_post_thumbnail( 'full', apply_filters( 'bediq_featured_image', $args ));
        }

        echo '</div>';

    } else {

    }
}

function bediq_template_thumbnail_image() {
    bediq_get_template( 'includes/image.php' );
}

function bediq_template_time() {
    bediq_get_template( 'includes/time.php' );
}

function bediq_template_join_button() {
    global $post;

    $url = esc_url( get_post_meta( $post->ID, 'url', true ) );
    ?>
    <div align="right" class="bediq-half">
        <a href="<?php echo $url; ?>" taget="_blank" class="bediq-btn bediq-btn-default"><?php _e( 'Join Now!', 'bediq' ); ?></a>
    </div>
    <?php
}

function bediq_template_book_button() {
    global $post;

    $url = esc_url( get_post_meta( $post->ID, 'url', true ) );
    ?>
    <div align="right" class="bediq-half">
        <a href="<?php echo $url; ?>" taget="_blank" class="bediq-btn bediq-btn-default"><?php _e( 'Book Now!', 'bediq' ); ?></a>
    </div>
    <?php
}

/*  --------------------------------------------------
:: Room functions
-------------------------------------------------- */

function bediq_template_room_schema() {
    bediq_get_template( 'room/schema.php' );
}

function bediq_template_room_tab_room() {
    bediq_get_template( 'room/tab-room.php' );
}

function bediq_template_room_book_now() {

    bediq_get_template( 'room/bar-room.php' );

}



/*  --------------------------------------------------
:: Event functions
-------------------------------------------------- */

function bediq_template_event_schema() {
    bediq_get_template( 'event/schema.php' );
}

function bediq_template_event_tab() {
    bediq_get_template( 'event/tab-event.php' );
}



/*  --------------------------------------------------
:: Offer functions
-------------------------------------------------- */


function bediq_template_offer_offer() {
    bediq_get_template( 'offers/offer.php' );
}

function bediq_template_offer_schema() {
    bediq_get_template( 'offers/schema.php' );
}

function bediq_template_offer_tab() {
    bediq_get_template( 'offers/tab-offer.php' );
}

/*  --------------------------------------------------
:: Outlet functions
-------------------------------------------------- */

function bediq_template_outlet_schema() {
    bediq_get_template( 'outlet/schema.php' );
}

function bediq_template_outlet_tab() {
    bediq_get_template( 'outlet/tab-outlet.php' );
}



/*  --------------------------------------------------
:: Activity functions
-------------------------------------------------- */

function bediq_template_activity_title() {
    ?>
    <header>
        <div class="entry-title" itemprop="name">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="alignright">
            <?php bediq_print_tax_link( 'things-to-do' ); ?>
        </div>
    </header><!-- .entry-header -->

    <?php
}

function bediq_template_activity_schema() {
    bediq_get_template( 'activity/schema.php' );
}

function bediq_template_activity_tab() {
    bediq_get_template( 'activity/tab-activity.php' );
}

/*  --------------------------------------------------
:: leisure functions
-------------------------------------------------- */

function bediq_template_leisure_schema() {
    bediq_get_template( 'leisure/schema.php' );
}

function bediq_template_leisure_tab() {
    bediq_get_template( 'leisure/tab-leisure.php' );
}


/*  --------------------------------------------------
:: Facility functions
-------------------------------------------------- */

function bediq_template_facility_schema() {
    bediq_get_template( 'facility/schema.php' );
}

function bediq_template_facility_tab() {
    bediq_get_template( 'facility/tab-facility.php' );
}

/*  --------------------------------------------------
:: Services functions
-------------------------------------------------- */

function bediq_template_services_schema() {
    bediq_get_template( 'services/schema.php' );
}

function bediq_template_services_tab() {
    bediq_get_template( 'services/tab-services.php' );
}
