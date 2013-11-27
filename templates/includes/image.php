<?php
global $post;

$image = esc_attr( get_post_meta( $post->ID, 'overlay', true ) );
?>
<div class="bediq-image">
    <?php
    if ( function_exists( 'wpthumb' ) && !empty( $image ) ) {
        $args = array('width' => 700, 'height' => 300, 'crop' => true);
        $image = wpthumb( $image, apply_filters( 'bediq_wpthumb_image', $args ) );
    }
    if ( $image ) {
        ?>
        <img src="<?php echo $image; ?>" itemprop="image" class="archive-image" alt="image" />
    <?php } ?>
</div>