<?php global $post; 
$telephone = get_post_meta( $post->ID, 'telephone', true );
$fax = get_post_meta( $post->ID, 'fax', true );
$map = get_post_meta( $post->ID, 'map', true );
//$location = of_get_option( 'contact-location' );
?>
<div class="bediq-hidden">
    <span itemprop="place" itemscope itemtype="http://schema.org/Place">
        <span itemprop="faxNumber"><?php echo $fax; ?></span>
        <span itemprop="map"><?php echo $map; ?></span>
        <span itemprop="telephone"><?php echo $telephone; ?></span>

        <?php
        if ( !empty( $location ) ) {
           list($latitude, $longitude) = explode( ',', $location );
            ?>
            <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                <meta itemprop="latitude" content="<?php echo $latitude; ?>" />
                <meta itemprop="longitude" content="<?php echo $longitude; ?>" />
            </span>
        <?php } ?>
    </span>
                    
</div>