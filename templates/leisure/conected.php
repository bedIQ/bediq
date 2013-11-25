<?php
// Find connected pages
$connected_offers = new WP_Query( array('connected_type' => 'offer_to_leisure', 'connected_items' => get_queried_object(), 'nopaging' => true) );
$connected_events = new WP_Query( array('connected_type' => 'event_to_leisure', 'connected_items' => get_queried_object(), 'nopaging' => true) );
$connected_activities = new WP_Query( array('connected_type' => 'leisure_to_activity', 'connected_items' => get_queried_object(), 'nopaging' => true) );

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

// Display connected pages
if ( $connected_events->have_posts() ) {
    ?>
    <h2><?php _e( 'Events at', 'twentyeleven' ); ?> <?php the_title(); ?></h2>
    <ul itemscope itemtype="http://schema.org/Event">
        <?php while ($connected_events->have_posts()) : $connected_events->the_post(); ?>
            <li><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
   </ul>

    <?php
    // Prevent weirdness
    wp_reset_postdata();
}

if ( $connected_activities->have_posts() ) {
    ?>
    <h2><?php _e( 'Activities at', 'twentyeleven' ); ?> <?php the_title(); ?></h2>
    <ul itemscope itemtype="http://schema.org/Event">
        <?php while ($connected_activities->have_posts()) : $connected_activities->the_post(); ?>
            <li><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>

    <?php
    // Prevent weirdness
    wp_reset_postdata();
}
?>