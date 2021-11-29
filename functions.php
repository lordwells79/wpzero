<?php
/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists('wpzero_enqueue_scripts') ) {
    function wpzero_enqueue_scripts() {
        wp_enqueue_style('wpzero-style', get_stylesheet_uri(), array() );

        $googleFontsArgs = array(
			'family' =>	str_replace('|', '%7C','PT+Serif:700|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i'),
			'subset' =>	'latin,latin-ext'
		);

		wp_enqueue_style('google-fonts', add_query_arg ( $googleFontsArgs, "https://fonts.googleapis.com/css" ), array(), '1.0.0' );

        wp_enqueue_style(
            'bootstrap-grid',
            get_template_directory_uri() . '/css/bootstrap-grid.css',
            array(),'4.6.1'
        );

        wp_enqueue_script(
			'wpzero-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
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
        add_theme_support('post-thumbnails');

		add_image_size(
			'wpzero_miniatura_larga',
			1110,
			400,
			true
		);

		add_image_size(
			'wpzero_miniatura_media',
			730,
			263,
			true
		);

    }
    add_action( 'after_setup_theme', 'wpzero_after_setup_theme' );
}