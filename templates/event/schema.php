<?php $location = ''; //of_get_option( 'contact-location' ); ?>
<div class="hidden">
    <span itemprop="place" itemscope itemtype="http://schema.org/Place">
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