<?php
global $post;

$photos = get_post_meta( $post->ID, 'photo');
?>

<?php
if ( ! $photos && has_post_thumbnail() ) {
    the_post_thumbnail( 'weslider-slide-image', apply_filters( 'bediq_featured_image', array() ) );
}
?>

<div class="room-slider flexslider">
    <ul class="slides">
    <?php
    foreach ($photos as $attachment_id) {
        $image_url = wp_get_attachment_image( $attachment_id, 'weslider-slide-image' );

	    if ( $image_url ) {
	        ?>
	       <li><?php echo $image_url; ?></li>
	    <?php }
	}?>
    </ul>
</div>