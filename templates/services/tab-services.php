<?php
$connected_offers = new WP_Query( array('connected_type' => 'offer_to_services', 'connected_items' => get_queried_object(), 'nopaging' => true) );

?>
<div id="bediq-accordion">
	<?php if ( $connected_offers->have_posts() ) {
    ?>
	<h3><?php _e( 'Current Offers at', 'twentyeleven' ); ?> <?php the_title(); ?></h3>
	<div>
		<ul itemscope itemtype="http://schema.org/Offer">
        <?php while ($connected_offers->have_posts()) : $connected_offers->the_post(); ?>
            <li><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    	</ul>
	</div>
	<?php
    // Prevent weirdness
    wp_reset_postdata();
	}
	?>
	
</div>
