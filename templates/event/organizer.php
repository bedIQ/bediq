<?php
global $post;

$user = get_post_meta( $post->ID, 'owner', true );
$owner = get_user_by( 'id', $user );
?>
<div class="widget bediq-event-organizer">
    <h3 class="widget-title"><?php _e( 'Organizer', 'bediq' ); ?></h3>
    <?php
    printf( __( 'This event is organized by: ', 'bediq' ) );
    printf( '<a href="%s">%s</a>', esc_attr( get_author_posts_url( $owner->ID ) ), $owner->display_name );
    ?>
</div>