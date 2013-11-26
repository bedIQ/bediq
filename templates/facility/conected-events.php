<?php
// Find connected pages
$connected_events = new WP_Query( array('connected_type' => 'event_to_facility', 'connected_items' => get_queried_object(), 'nopaging' => true) );
                        

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
?>