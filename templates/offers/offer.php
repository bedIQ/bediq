<?php
global $post;

$price = get_post_meta( $post->ID, 'price', true );
$price_valid_to = (int) get_post_meta( $post->ID, 'price_valid_to', true );
$currency = get_post_meta( $post->ID, 'currency', true );
$url = esc_url( get_post_meta( $post->ID, 'url', true ) );
$discount = get_post_meta( $post->ID, 'price_discount', true );
?>

        <div class="hotel-offers bediq-half">
            <?php bediq_print_tax_link( 'hotel_offers' ); ?>
             <span class="time">
                <?php _e( 'book by', 'bediq' ); ?> <time itemprop="priceValidUntil" datetime="<?php echo date( 'c', $price_valid_to ) ?>"><?php echo date_i18n( 'j F, Y', $price_valid_to ); ?></time>
            </span>
            <span class="bediq-separator">|</span>
                <span class="price">
                    <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <a href="<?php echo $url; ?>"><?php _e( 'from', 'bediq' ); ?> <span itemprop="priceDiscount"><?php echo $currency; ?> <?php echo $price; ?></span></a>
                        <span class="bediq-separator">|</span>
                        <span itemprop="priceCurrency"><?php echo $currency; ?></span> <del><span itemprop="price"><?php echo $discount; ?></span></del>
                    </span>
                </span>
            
        </div>
