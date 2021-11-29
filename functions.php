<?php
/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists('wpzero_enqueue_scripts') ) {
    function wpzero_enqueue_scripts() {
        wp_enqueue_style(
            'bootstrap-grid',
            get_template_directory_uri() . '/css/bootstrap-grid.css',
            array(),'4.6.1'
        );
    }
    add_action( 'wp_enqueue_scripts', 'wpzero_enqueue_scripts' );
}


/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wpzero_after_setup_theme')) {

    function wpzero_after_setup_theme() {

        global $content_width;

        if( ! isset ($content_width) ) $content_width = 1100;

        register_nav_menus( array(
            'main-menu' => esc_html__( 'Main menu', 'wpzero' ),
        ));

        add_theme_support('title_tag');
        add_theme_support('automatic-feed-links');

    }
    add_action( 'after_setup_theme', 'wpzero_after_setup_theme' );
}