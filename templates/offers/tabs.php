<?php
global $post;

$availability = get_post_meta( $post->ID, 'availability', true );
?>

<div class="tabbable">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab"><?php _e( 'Benefits', 'bediq' ); ?></a></li>
        <li><a href="#tab2" data-toggle="tab"><?php _e( 'Conditions', 'bediq' ); ?></a></li>
    </ul>
    <div class="tab-content">
        <div id="tab1" class="tab-pane active">
            <p><?php printf( __( 'Guests booking the %s can enjoy the following benefits:', 'bediq' ), get_the_title() ); ?></p>
            <p><?php bediq_display_multi_meta( 'benefit', $post->ID, '', 'itemOffered' ); ?></p>
        </div>
        <div id="tab2" class="tab-pane">
            <p>

                <?php
                // Find connected pages
                $connected = new WP_Query( array('connected_type' => 'room_to_offer', 'connected_items' => get_queried_object(), 'nopaging' => true) );

                // Display connected pages
                $rooms = array();
                if ( $connected->have_posts() ) {
                    while ($connected->have_posts()) {
                        $connected->the_post();

                        $rooms[] = sprintf( '<a href="%s">%s</a>', get_permalink(), the_title( '', '', false ) );
                    }

                    wp_reset_postdata();
                }
                ?>


                <?php
                printf( __( 'This hotel deal is bookable in %s from %s until %s for stays %s until %s with the following conditions:', 'bediq' ), implode( ', ', $rooms ), date_i18n( 'j F, Y', (int) get_post_meta( $post->ID, 'price_valid_from', true ) ), date_i18n( 'j F, Y', (int) get_post_meta( $post->ID, 'price_valid_to', true ) ), date_i18n( 'j F, Y', (int) get_post_meta( $post->ID, 'stay_from', true ) ), date_i18n( 'j F, Y', (int) get_post_meta( $post->ID, 'stay_until', true ) ) );
                ?>
            </p>

            <p><?php bediq_display_multi_meta( 'item_terms', $post->ID, '', 'itemTerms' ); ?></p>
            <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <strong><?php _e( 'Availability', 'bediq' ); ?></strong> <br />
                <link itemprop="availability" href="http://schema.org/InStock" /><?php echo $availability; ?>
            </p>
        </div> <!-- .tab-pane -->
    </div> <!-- .tab-conent -->
</div> <!-- .tabbale -->