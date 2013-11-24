<?php
// Find connected pages
$connected = new WP_Query( array(
    'connected_type' => 'room_to_offer',
    'connected_items' => get_queried_object(),
    'nopaging' => true,
) );

// Display connected pages
if ( $connected->have_posts() ) {
    ?>
    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
        <h2><?php _e( 'Current Offers for the', 'bediq' ); ?> <?php the_title(); ?></h2>
        <ul>
            <?php while ($connected->have_posts()) : $connected->the_post(); ?>
                <li><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </div>

    <?php
    // Prevent weirdness
    wp_reset_postdata();
}