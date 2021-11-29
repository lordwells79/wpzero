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

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'wpzero_list_comments' ) ) {

	function wpzero_list_comments($comment, $args, $depth) {

?>

        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

            <div id="comment-<?php comment_ID(); ?>" class="comment-container">

                <div class="comment-avatar">
                    <?php echo get_avatar($comment->comment_author_email, 80, 'retro' ); ?>
                </div>

                <div class="comment-text">

                    <header class="comment-author">

                        <span class="author"><cite><?php printf( esc_html__('%s ha scritto:','wpzero'), get_comment_author_link());?> </cite></span>

                        <time datetime="<?php echo esc_attr(get_comment_date())?>" class="comment-date">

                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>">
                                <?php printf(esc_html__('%1$s at %2$s','wpzero'), get_comment_date(),  get_comment_time()) ?>
                            </a>

                            <?php

                                comment_reply_link(
                                    array_merge(
                                        $args,
                                        array(
                                            'depth' => $depth,
                                            'max_depth' => $args['max_depth']
                                        )
                                    )
                                );

                                edit_comment_link(esc_html__('(Modifica)', 'wpzero'));

                            ?>

                        </time>

                    </header>

                    <?php if ($comment->comment_approved == '0') : ?>

                        <p><em><?php esc_html_e('Il tuo commento è in attesa di approvazione.','wpzero') ?></em></p>

                    <?php endif; ?>

                    <?php comment_text() ?>

                </div>

            </div>ß
        </li>                
    <?php

	}

}