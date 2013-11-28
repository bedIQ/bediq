<?php
$connected_offers = new WP_Query( array('connected_type' => 'offer_to_leisure', 'connected_items' => get_queried_object(), 'nopaging' => true) );
$connected_events = new WP_Query( array('connected_type' => 'event_to_leisure', 'connected_items' => get_queried_object(), 'nopaging' => true) );
$connected_activities = new WP_Query( array('connected_type' => 'leisure_to_activity', 'connected_items' => get_queried_object(), 'nopaging' => true) );

global $post; 
$style = get_post_meta( $post->ID, 'style', true );
$opening_hours = get_post_meta( $post->ID, 'opening_hours', true );
$opening_hours_schema = esc_attr( get_post_meta( $post->ID, 'opening_hours_schema', true ) );
$address = get_post_meta( $post->ID, 'address', true );

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
	
	<?php if ( $connected_events->have_posts() ) {
    ?>
	<h3><?php _e( 'Events at', 'twentyeleven' ); ?> <?php the_title(); ?></h3>
	<div>
		<ul itemscope itemtype="http://schema.org/Event">
        <?php while ($connected_events->have_posts()) : $connected_events->the_post(); ?>
            <li><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
   		</ul>
	</div>
	<?php
    // Prevent weirdness
    wp_reset_postdata();
	}
	?>
	
	<?php if ( $connected_activities->have_posts() ) {
    ?>
	<h3><?php _e( 'Activities at', 'twentyeleven' ); ?> <?php the_title(); ?></h3>
	<div>
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
	?>

	<h3>Details</h3>
	<div>
		<div id="bediq-tabs" style="height:300px; width:100%;">
			<ul>
				<li><a href="#tabs-1"><?php _e( 'Style', 'twentyeleven' ); ?></a></li>
				<li><a href="#tabs-2"><?php _e( 'Opening Hours', 'twentyeleven' ); ?></a></li>
				<li><a href="#tabs-3"><?php _e( 'Location & Contact', 'twentyeleven' ); ?></a></li>
			</ul>
			<div id="tabs-1">
				<p><?php echo $style; ?></p>
			</div>
			<div id="tabs-2">
				<p><meta itemprop="openingHours" content="<?php echo $opening_hours_schema; ?>" /><?php echo $opening_hours; ?></p>
			</div>
			<div id="tabs-3">
				<p><div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><?php echo $address; ?></div></p>
			</div>
		</div>
	</div>

</div>
