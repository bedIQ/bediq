<?php
global $post;
$room_size = get_post_meta( $post->ID, 'room_size', true );
$room_type = get_post_meta( $post->ID, 'room_type', true );
$occupancy_adults = get_post_meta( $post->ID, 'occupancy_adults', true );
$occupancy_child = get_post_meta( $post->ID, 'occupancy_child', true );
$extra_bed = get_post_meta( $post->ID, 'extra_beds', true );
$pet_policy = get_post_meta( $post->ID, 'pet_policy', true );

?>

    <div class="alignleft">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'bediq' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?> (<?php echo $room_type; ?>)</a></h1>
    </div>

    
    <div class="alignright">
        <?php
        if ( !empty( $room_size ) ) {
            ?>
            <?php _e( 'Room Size', 'bediq' ) ?>:<?php echo $room_size; ?><br />
            <?php
        }

        if ( !empty( $occupancy_adults ) || !empty( $occupancy_child ) ) {
            ?>
            <?php
            _e( 'Suited for: max.', 'bediq' );

            if ( !empty( $occupancy_adults ) ) {
                printf( __( '%s adults', 'bediq' ), $occupancy_adults );
            }

            if ( !empty( $occupancy_child ) ) {
                printf( __( ' and %s kids', 'bediq' ), $occupancy_child );
            }
        }
        ?>
    </div>

