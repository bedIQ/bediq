<?php
global $post;

$availability = get_post_meta( $post->ID, 'availability', true );
?>

<div id="bediq-accordion">
	<h3><?php _e( 'Benefits', 'bediq' ); ?></h3>
		<div>
			<p><?php printf( __( 'Guests booking the %s can enjoy the following benefits:', 'bediq' ), get_the_title() ); ?></p>
            <p><?php bediq_display_multi_meta( 'benefit', $post->ID, '', 'itemOffered' ); ?></p>
		</div>
	<h3><?php _e( 'Conditions', 'bediq' ); ?></h3>
	<div>
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
	</div>

    <h3><?php _e( 'Availability', 'bediq' ); ?></h3>
    <div>
        <p><link itemprop="availability" href="http://schema.org/InStock" /><?php echo $availability; ?></p>
    </div>

</div>
