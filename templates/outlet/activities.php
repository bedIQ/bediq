<?php
$connected_activities = new WP_Query( array(
    'connected_type' => 'outlet_to_activity',
    'connected_items' => get_queried_object(),
    'nopaging' => true
) );

// Display connected pages
if ( $connected_activities->have_posts() ) {
    ?>
    <div class="bediq-activity-list">
        <h2><?php _e( 'Activities at', 'bediq' ); ?> <?php the_title(); ?></h2>

        <ul itemscope itemtype="http://schema.org/Event">
            <?php while ($connected_activities->have_posts()) : $connected_activities->the_post(); ?>
                <li><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php
    // Prevent weirdness
    wp_reset_postdata();
}