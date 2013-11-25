<?php global $post; 
$style = get_post_meta( $post->ID, 'style', true );
$opening_hours = get_post_meta( $post->ID, 'opening_hours', true );
$opening_hours_schema = esc_attr( get_post_meta( $post->ID, 'opening_hours_schema', true ) );
$address = get_post_meta( $post->ID, 'address', true );
?>
<div class="bediq-widget-area">
    <div class="widget">
        <h3 class="widget-title"><?php _e( 'Style', 'twentyeleven' ); ?></h3>
        <?php echo $style; ?>
    </div>
    <div class="widget">
        <h3 class="widget-title"><?php _e( 'Opening Hours', 'twentyeleven' ); ?></h3>
        <meta itemprop="openingHours" content="<?php echo $opening_hours_schema; ?>" /><?php echo $opening_hours; ?>
    </div>
    <div class="widget">
        <h3 class="widget-title"><?php _e( 'Location & Contact', 'twentyeleven' ); ?></h3>
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><?php echo $address; ?></div>
    </div>
</div>