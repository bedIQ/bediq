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
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'bediq' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?> (<?php echo $room_type; ?>)</a></h2>
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

    <div class="clear"></div>

    <div class="bediq-row">
        <div class="bediq-half">
            <?php
            global $post;
            $entertain = get_post_meta( $post->ID, 'entertainment', true );
            $bed = get_post_meta( $post->ID, 'bed_features', true );
            $bath = get_post_meta( $post->ID, 'bath', true );
            $communication = get_post_meta( $post->ID, 'communication', true );
            $safety = get_post_meta( $post->ID, 'safety', true );
            $request = get_post_meta( $post->ID, 'on_request', true );
            ?>
            <ul>
                <?php if ( !empty( $entertain ) ) { ?>
                    <li><?php echo $entertain; ?></li>
                <?php } ?>

                <?php if ( !empty( $bed ) ) { ?>
                    <li><?php echo $bed; ?></li>
                <?php } ?>

                <?php if ( !empty( $bath ) ) { ?>
                    <li><?php echo $bath; ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="bediq-half">
            <ul>
                <?php if ( !empty( $communication ) ) { ?>
                    <li><?php echo $communication; ?></li>
                <?php } ?>

                <?php if ( !empty( $safety ) ) { ?>
                    <li><?php echo $safety; ?></li>
                <?php } ?>

                <?php if ( !empty( $request ) ) { ?>
                    <li><?php echo $request; ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div align=right>
        <a href="<?php echo esc_url( get_post_meta( $post->ID, 'ibe_room', true ) ); ?>" taget="_blank" class="btn btn-danger"><?php _e( 'Book from', 'bediq' ); ?> <?php echo get_post_meta( $post->ID, 'min_price', true ); ?></a>
    </div>
