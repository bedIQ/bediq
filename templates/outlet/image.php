<?php
global $post;

$image = esc_attr( get_post_meta( $post->ID, 'photo', true ) );
?>
<div class="bediq-image-wrap">
    <?php
    if ( function_exists( 'wpthumb' ) && !empty( $image ) ) {
        $image = wpthumb( $image, 'width=700&height=267&crop=1' );
    }

    if ( $image ) {
        ?>
        <img src="<?php echo $image; ?>" itemprop="image" class="archive-image" alt="image" />
    <?php } ?>
</div>