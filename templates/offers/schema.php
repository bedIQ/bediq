<?php
global $post;

$price_valid_to = (int) get_post_meta( $post->ID, 'price_valid_to', true );
?>
<div class="hidden">
    <meta itemprop="priceValidUntil" content="<?php echo date_i18n( 'c', $price_valid_to ); ?>" />
    <meta itemprop="productID" content="<?php the_ID(); ?>" />
</div>