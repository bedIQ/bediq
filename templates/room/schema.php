<?php global $post; ?>

<div class="bediq-hidden">
    <span itemprop="productID"><?php the_ID(); ?></span>
    <?php if ( $room_type = get_post_meta( $post->ID, 'room_type', true ) ): ?>
        <span itemprop="model"><?php echo esc_attr( $room_type ); ?></span>
    <?php endif; ?>
    <span itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
        <span itemprop="name"><?php echo get_the_author_meta( 'display_name' ); ?></span>
    </span>
    <span itemprop="brand" itemscope itemtype="http://schema.org/Organization">
        <span itemprop="name"><?php echo get_the_author_meta( 'display_name' ); ?></span>
    </span>
</div>