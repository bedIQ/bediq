<?php global $post;
    $room_type = get_post_meta( $post->ID, 'room_type', true );
    $room_size = get_post_meta( $post->ID, 'room_size', true );
    $occupancy_adults = get_post_meta( $post->ID, 'occupancy_adults', true );
	$occupancy_child = get_post_meta( $post->ID, 'occupancy_child', true );
    ?>
    
        <div class="bediq-half">

            <?php if ( !empty( $occupancy_adults ) || !empty( $occupancy_child ) ) { ?>
                <?php _e( '', 'bediq' ); ?>
                max.
                    <?php
                    if ( !empty( $occupancy_adults ) ) {
                        printf( __( '%s adults', 'bediq' ), $occupancy_adults );
                    }

                    if ( !empty( $occupancy_child ) ) {
                        printf( __( ' and %s kids', 'bediq' ), $occupancy_child );
                    } 
                } ?>
               		<?php _e( ', ', 'bediq' ); ?> <?php echo $room_type; ?>
                <?php if ( !empty( $room_size ) ) { ?>
	                    <?php _e( ', ', 'bediq' ); ?> <?php echo $room_size; ?>
                <?php } ?>

        </div>
        <div align="right">
            <a href="<?php echo esc_url( get_post_meta( $post->ID, 'ibe_room', true ) ); ?>" target="_blank" class="bediq-btn bediq-btn-default">
                <?php _e( 'Book from', 'bediq' ); ?> <?php echo get_post_meta( $post->ID, 'min_price', true ); ?>
            </a>
        </div>
 
