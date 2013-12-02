<?php global $post;
    $room_type = get_post_meta( $post->ID, 'room_type', true );
    $room_size = get_post_meta( $post->ID, 'room_size', true );
    $occupancy_adults = get_post_meta( $post->ID, 'occupancy_adults', true );
	$occupancy_child = get_post_meta( $post->ID, 'occupancy_child', true );
    ?>
    
        <div class="bediq-half">

            <?php if ( !empty( $occupancy_adults ) || !empty( $occupancy_child ) ) { ?>
                <span class="occupency">
                <?php _e( 'Max.', 'bediq' ); ?>
                    <?php
                    if ( !empty( $occupancy_adults ) ) {
                        printf( __( '%s adults', 'bediq' ), $occupancy_adults );
                    }

                    if ( !empty( $occupancy_child ) ) {
                        printf( __( ' and %s kids', 'bediq' ), $occupancy_child );
                    } ?>
                <?php  
                } ?>
                </span>

                <?php if ( !empty( $room_type ) ) { ?>
                    <span class="bediq-separator">|</span>
                    <span class="room-type">
                   	    <?php echo $room_type; ?>
                    </span>
                <?php } ?>

                <?php if ( !empty( $room_size ) ) { ?>
                    <span class="bediq-separator">|</span>
                    <span class="room-size">
	                    <?php echo $room_size; ?>
                    </span>
                <?php } ?>

        </div>
        <div align="right">
            <a href="<?php the_permalink(); ?>" target="_blank" class="bediq-btn bediq-btn-default">
                <?php _e( 'Book from', 'bediq' ); ?> <?php echo get_post_meta( $post->ID, 'min_price', true ); ?>
            </a>
        </div>
 
