<?php
global $post;

$image = ( get_post_meta( $post->ID, 'photo') );
?>

<div class="flexslider">
  <ul class="slides">
  <!--<img src="slide3.jpg" />-->
  	
  	<?php
  	if ( has_post_thumbnail() ) { ?>
  	<li>
       <?php if ( function_exists( 'wpthumb') ) {
            $args = apply_filters( 'bediq_wpthumb_featured_image', 'width=990&height=300&crop=1' );
            the_post_thumbnail( $args);
        } else {
            $args = array('class' => 'flex-container', 'itemprop' => 'image');
            the_post_thumbnail( 'full', apply_filters( 'bediq_featured_image', $args ));
        } ?>

    </li>
    <?php } ?>
    <?php
    foreach ($image as $img) { ?>
	    <?php if ( function_exists( 'wpthumb' ) && !empty( $image ) ) {
	        $args = array('width' => 990, 'height' => 300, 'crop' => true);
	        $img = wpthumb( $img, apply_filters( 'bediq_wpthumb_image', $args ) );
	    }
	    if ( $img ) {
	        ?>
	       <li> <img src="<?php echo $img; ?>" /> </li>
	    <?php } 
	}?>
  </ul>
</div>