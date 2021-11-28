<!DOCTYPE html>
    <html <?php language_attributes(); ?>>
        <head>
            <meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

            <?php wp_head(); ?>
        </head>

        <body <?php body_class(); ?>>

            <?php

            if ( function_exists('wp_body_open') ) {
                wp_body_open();
            }

            ?>

            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wpzero' ); ?></a>
