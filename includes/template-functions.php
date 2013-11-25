<?php

/*  --------------------------------------------------
:: Room template Hooks
-------------------------------------------------- */

add_action( 'bediq_before_single_room', 'bediq_template_featured_image', 10 );

add_action( 'bediq_before_single_room_summary', 'bediq_template_post_title', 10 );
add_action( 'bediq_before_single_room_summary', 'bediq_template_room_schema', 15 );
add_action( 'bediq_before_single_room_summary', 'bediq_template_room_book_now', 20 );

add_action( 'bediq_single_room_summary', 'bediq_template_post_content', 10 );
add_action( 'bediq_single_room_summary', 'bediq_template_room_tabs', 15 );
add_action( 'bediq_single_room_summary', 'bediq_template_room_offers', 20 );

/*  --------------------------------------------------
:: Event template Hooks
-------------------------------------------------- */

add_action( 'bediq_before_single_event_summary', 'bediq_template_post_title', 10 );
add_action( 'bediq_before_single_event_summary', 'bediq_template_event_schema', 15 );
add_action( 'bediq_before_single_event_summary', 'bediq_template_event_image_overlay', 20 );

add_action( 'bediq_single_event_summary', 'bediq_template_event_details', 10 );
add_action( 'bediq_single_event_summary', 'bediq_template_event_organizer', 20 );
add_action( 'bediq_single_event_summary', 'bediq_template_post_content', 20 );


/*  --------------------------------------------------
:: Offer template Hooks
-------------------------------------------------- */

add_action( 'bediq_before_single_offer_summary', 'bediq_template_offer_header', 10 );
add_action( 'bediq_before_single_offer_summary', 'bediq_template_offer_book_button', 15 );

add_action( 'bediq_single_offer_summary', 'bediq_template_offer_schema', 10 );
add_action( 'bediq_single_offer_summary', 'bediq_template_offer_tabs', 15 );


/*  --------------------------------------------------
:: Outlet template Hooks
-------------------------------------------------- */

add_action( 'bediq_before_single_outlet_summary', 'bediq_template_post_title', 10 );
add_action( 'bediq_before_single_outlet_summary', 'bediq_template_outlet_image', 15 );
add_action( 'bediq_before_single_outlet_summary', 'bediq_template_outlet_schema', 20 );

add_action( 'bediq_single_outlet_summary', 'bediq_template_post_content', 10 );
add_action( 'bediq_single_outlet_summary', 'bediq_template_outlet_details', 15 );
add_action( 'bediq_single_outlet_summary', 'bediq_template_outlet_event', 20 );
add_action( 'bediq_single_outlet_summary', 'bediq_template_outlet_offer', 25 );
add_action( 'bediq_single_outlet_summary', 'bediq_template_outlet_activity', 30 );


/*  --------------------------------------------------
:: Room functions
-------------------------------------------------- */

function bediq_template_post_title() {
    ?>
    <header class="entry-header">
        <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->
    <?php
}

function bediq_template_post_content() {
    ?>
    <div itemprop="description">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bediq' ) ); ?>
    </div>
    <?php
}

function bediq_template_room_schema() {
    bediq_get_template( 'room/schema.php' );
}

function bediq_template_room_tabs() {
    bediq_get_template( 'room/tab.php' );
}

function bediq_template_room_offers() {
    bediq_get_template( 'room/offers.php' );
}

function bediq_template_room_book_now() {
    global $post;
    ?>
    <div align="right">
        <a href="<?php echo esc_url( get_post_meta( $post->ID, 'ibe_room', true ) ); ?>" target="_blank" class="btn btn-danger">
            <?php _e( 'Book from', 'bediq' ); ?> <?php echo get_post_meta( $post->ID, 'min_price', true ); ?>
        </a>
    </div>
    <?php
}

function bediq_template_featured_image() {
    if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'full', array('class' => 'flex-container', 'itemprop' => 'image') );
    }
}

/*  --------------------------------------------------
:: Event functions
-------------------------------------------------- */

function bediq_template_event_schema() {
    bediq_get_template( 'event/schema.php' );
}

function bediq_template_event_image_overlay() {
    bediq_get_template( 'event/image-overlay.php' );
}

function bediq_template_event_details() {
    bediq_get_template( 'event/details.php' );
}

function bediq_template_event_organizer() {
    bediq_get_template( 'event/organizer.php' );
}

/*  --------------------------------------------------
:: Offer functions
-------------------------------------------------- */


function bediq_template_offer_header() {
    bediq_get_template( 'offers/header.php' );
}

function bediq_template_offer_rooms() {
    bediq_get_template( 'offers/rooms.php' );
}

function bediq_template_offer_schema() {
    bediq_get_template( 'offers/schema.php' );
}

function bediq_template_offer_tabs() {
    bediq_get_template( 'offers/tabs.php' );
}

function bediq_template_offer_book_button() {
    global $post;

    $url = esc_url( get_post_meta( $post->ID, 'url', true ) );
    ?>
    <div align="right">
        <a href="<?php echo $url; ?>" taget="_blank" class="btn btn-danger"><?php _e( 'Book Now!', 'bediq' ); ?></a>
    </div>
    <?php
}


/*  --------------------------------------------------
:: Outlet functions
-------------------------------------------------- */

function bediq_template_outlet_image() {
    bediq_get_template( 'outlet/image.php' );
}

function bediq_template_outlet_activity() {
    bediq_get_template( 'outlet/activities.php' );
}

function bediq_template_outlet_event() {
    bediq_get_template( 'outlet/events.php' );
}

function bediq_template_outlet_offer() {
    bediq_get_template( 'outlet/offers.php' );
}

function bediq_template_outlet_schema() {
    bediq_get_template( 'outlet/schema.php' );
}

function bediq_template_outlet_details() {
    bediq_get_template( 'outlet/details.php' );
}

