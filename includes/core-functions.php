<?php
/**
 * Get template part implementation for BedIQ
 *
 * Looks at the theme directory first
 */
function bediq_get_template_part( $slug, $name = '' ) {
    $bediq = bediq();

    $templates = [];
    $name = (string) $name;

    // lookup at theme/slug-name.php or bediq/slug-name.php
    if ( '' !== $name ) {
        $templates[] = "{$slug}-{$name}.php";
        $templates[] = $bediq->theme_dir_path . "{$slug}-{$name}.php";
    }

    $template = locate_template( $templates );

    // fallback to plugin default template
    if ( !$template && $name && file_exists( $bediq->template_path() . "{$slug}-{$name}.php" ) ) {
        $template = $bediq->template_path() . "{$slug}-{$name}.php";
    }

    // if not yet found, lookup in slug.php only
    if ( !$template ) {
        $templates = [
            "{$slug}.php",
            $bediq->theme_dir_path . "{$slug}.php"
        ];

        $template = locate_template( $templates );
    }

    if ( $template ) {
        load_template( $template, false );
    }
}

function bediq_get_template( $template_name, $args = [] ) {
    $bediq = bediq();

    if ( $args && is_array($args) ) {
        extract( $args );
    }

    $template = locate_template( [
        $bediq->theme_dir_path . $template_name,
        $template_name
    ] );

    if ( ! $template ) {
        $template = $bediq->template_path() . $template_name;
    }

    if ( file_exists( $template ) ) {
        include $template;
    }
}

/**
 * Display a multi meta field
 *
 * @param string $meta_key
 * @param int $post_id
 */
function bediq_display_multi_meta( $meta_key, $post_id, $title = '', $item_prop = '' ) {
    $array = get_post_meta( $post_id, $meta_key );

    if ( count( $array ) > 0 && $array[0] != '' ) {
        if ( $array ) {

            if ( !empty( $title ) ) {
                echo $title;
            }

            if ( !empty( $item_prop ) ) {
                printf( '<ul itemprop="%s">', $item_prop );
            } else {
                echo '<ul>';
            }

            foreach ($array as $item) {
                printf( '<li>%s</li>', $item );
            }
            echo '</ul>';
        }
    }
}

function bediq_date_iso( $timestamp ) {
    $datetime = date_i18n( 'c', $timestamp, true );

    return $datetime;
}

/**
 * Prints a single taxonomy links from a post
 *
 * @param type $taxonomy
 */
function bediq_print_tax_link( $taxonomy ) {
    global $post;

    $cat = get_the_term_list( $post->ID, $taxonomy, '', ', ', '' );
    if ( $cat && !is_wp_error( $cat ) ) {
        echo $cat;
    }
}

/**
 * Get amenities and features
 *
 * @return array
 */
function bediq_get_sub_field( $repeater_field, $sub_field = '', $post_id ) {
    if ( ! function_exists( 'get_field' ) ) {
        return;
    }
    $sub_filed_values =     [];
    $fields           =     get_field( $repeater_field, $post_id );

    if ( count( $fields ) ) {
        foreach ( $fields as $field ) {
            if ( ! is_array( $field[$sub_field] ) ) {
                $sub_filed_values[] = $field[$sub_field];
            } else {
                foreach ( $field[$sub_field] as $single_field ) {
                    $sub_filed_values[] =    $single_field;
                }
            }
        }
    }
    return $sub_filed_values;
}

function bediq_get_post( $post_type ) {
    if ( is_singular( $post_type ) ) {
        global $post;

        return $post;
    }

    $args = array(
        'post_type'      => $post_type,
        'numberposts'    => -1,
        'posts_per_page' => 1,
        'order'          => 'ASC'
    );

    $posts = get_posts($args);

    return $posts[0];
}
