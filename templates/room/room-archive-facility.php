
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
        <a href="<?php echo esc_url( get_post_meta( $post->ID, 'ibe_room', true ) ); ?>" taget="_blank" class="bediq-btn bediq-btn-default"><?php _e( 'Book from', 'bediq' ); ?> <?php echo get_post_meta( $post->ID, 'min_price', true ); ?></a>
    </div>
