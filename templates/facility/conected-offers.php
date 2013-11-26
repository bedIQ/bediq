<?php
// Find connected pages
$connected_offers = new WP_Query( array('connected_type' => 'offer_to_facility', 'connected_items' => get_queried_object(), 'nopaging' => true) );
                        
// Display connected pages
if ( $connected_offers->have_posts() ) {
    ?>
    <h2><?php _e( 'Current Offers at', 'twentyeleven' ); ?> <?php the_title(); ?></h2>
    <ul itemscope itemtype="http://schema.org/Offer">
        <?php while ($connected_offers->have_posts()) : $connected_offers->the_post(); ?>
            <li><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>

    <?php
    // Prevent weirdness
    wp_reset_postdata();
}

?>