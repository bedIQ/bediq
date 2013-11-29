<?php
global $post;

$start_date = (int) get_post_meta( $post->ID, 'start_time', true );
$end_date = (int) get_post_meta( $post->ID, 'end_time', true );
$event_locations = array();// wedevs_get_event_locations( $post->ID );
?>

    <div class="bediq-half">
        <div>
        	<span class="time">
	            <time itemprop="startDate" datetime="<?php echo bediq_date_iso( $start_date ) ?>">
	            	<?php echo date_i18n( 'j F, Y', $start_date ); ?>
	            </time>
	        </span>
            <span class="bediq-separator">|</span>
            <span class="date">
            	<?php echo date_i18n( 'g:i a', $start_date ); ?>
            </span>
            <span class="bediq-separator">|</span>
            <span class="location">
            	<?php echo implode( ', ', $event_locations ); ?>
            </span>
        </div>
    </div>