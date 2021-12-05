<?php
/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists('wpzero_enqueue_scripts') ) {
    function wpzero_enqueue_scripts() {
        wp_enqueue_style('wpzero-style', get_stylesheet_uri(), array() );


        $css = '';
        if ( get_header_image() ) :
            $css .= '
                header.header {
                background-image: url('.esc_url(get_header_image()).');
                -webkit-background-size: cover !important;
                -moz-background-size: cover !important;
                -o-background-size: cover !important;
                background-size: cover !important;
            }';
        endif;
        if ( get_header_textcolor() ) :
            $css .= '
            .logo a {
                color: #'.esc_attr(get_header_textcolor()).';
            }';
        endif;

        if ( get_theme_mod('wpzero_colore_overlay') ) :
            $css .= '
            a:hover,
            a:focus,
            .logo a:hover,
            .logo a:focus,
            #main-menu a:hover,
            #main-menu ul li a:hover,
            #main-menu li:hover > a,
            #main-menu a:focus,
            #main-menu ul li a:focus,
            #main-menu li.focus > a,
            #main-menu li:focus > a,
            #main-menu ul li.current-menu-item > a,
            #main-menu ul li.current_page_item > a,
            #main-menu ul li.current-menu-parent > a,
            #main-menu ul li.current_page_ancestor > a,
            #main-menu ul li.current-menu-ancestor > a {
            color: '.esc_attr(get_theme_mod('wpzero_colore_overlay')).';
            }';
        endif;
        
        wp_add_inline_style( 'wpzero-style', $css );


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
        wp_enqueue_style(
            'owl.carousel',
            get_template_directory_uri() . '/css/owl.carousel.css',
            array(),'2.3.4'
        );
        wp_enqueue_style(
            'owl.theme.default',
            get_template_directory_uri() . '/css/owl.theme.default.css',
            array(),'2.3.4'
        );

        wp_enqueue_script(
			'wpzero-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);
        wp_enqueue_script(
			'owl.carousel',
            get_template_directory_uri() . '/js/owl.carousel.js',
            array('jquery'),
            '1.0',
            TRUE
		);
        wp_enqueue_script(
			'wpzero-script',
            get_template_directory_uri() . '/js/script.js',
            array('jquery'),
            '1.0',
            TRUE
		);
        
        if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
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
        
        
        add_theme_support('title-tag');
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form'));

		add_image_size(
			'wpzero_miniatura_larga',
			1110,
			400,
			true
		);

		add_image_size(
			'wpzero_miniatura_media',
			730,
			350,
			true
		);
        
        add_theme_support( 'custom-background', array(
            'default-color' => 'f3f3f3',
        ));
        add_theme_support( 'custom-header', array(
            'width' => 1920,
            'height' => 90
        ));

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

                <span class="author"><cite><?php printf( esc_html__('%s ha scritto:','wpzero'), get_comment_author_link());?>
                    </cite></span>

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

    </div>
</li>
<?php

	}

}

/*-----------------------------------------------------------------------------------*/
/* Sidebar*/
/*-----------------------------------------------------------------------------------*/

function wpzero_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Barra Laterale','wpzero'),
        'id' => 'wpzero-sidebar',
        'description' => esc_html__('La seguente barra laterale verrà
        visualizzata di fianco a pagine e articoli.', 'wpzero'),
        'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Barra laterale nel footer','wpzero'),
        'id' => 'wpzero-footer-sidebar',
        'description' => esc_html__('La seguente barra laterale verrà
        visualizzata in fondo alla pagina.', 'wpzero'),
        'before_widget' => '<div id="%1$s" class="col-md-4 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="title">',
        'after_title' => '</h4>'
    ));
}
add_action( 'widgets_init', 'wpzero_widgets_init' );

/*-----------------------------------------------------------------------------------*/
/* limito le categorie nel widget*/
/*-----------------------------------------------------------------------------------*/
function widget_categories_args_filter ($arg) {

    $args['number'] = 5;
    $args['orderby'] = 'count';
    $args['order']   = 'DESC';
    $args['show_count']   = 1;
    $args['title_li']   = '';


    return $args;
} 
add_filter( 'widget_categories_args', 'widget_categories_args_filter', 10, 1 );

/*-----------------------------------------------------------------------------------*/
/* Come gestire sezioni, impostazioni e controlli /
/*-----------------------------------------------------------------------------------*/

function wpzero_customize_register( $wp_customize ) {
    
    $wp_customize->add_panel('wpzero_pannello', array(
        'title' => esc_html__( 'Pannello wpzero', 'wpzero' ),
        
    ));

    $wp_customize->add_section('wpzero_impostazioni_carousel', 
    array(
        'title' => esc_html__( 'Impostazioni carousel', 'wpzero' ),
        'panel' => 'wpzero_pannello',
    ));

    $wp_customize->add_setting( 'wpzero_elementi_carousel', array(
        'default' => 5,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control( 'wpzero_elementi_carousel', array(
        'type' => 'number',
        'section' => 'wpzero_impostazioni_carousel',
        'label' => esc_html__('Elementi carousel.', 'wpzero'),
        'description' => esc_html__('Quanti elementi visualizzare nel
        carousel?', 'wpzero'),
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
            'step' => 1,
        )
    ));
    
    $wp_customize->add_section('wpzero_impostazioni_contenuto',
        array(
            'title' => esc_html__( 'Impostazioni contenuto', 'wpzero' ),
            'panel' => 'wpzero_pannello',
    ));
    $wp_customize->add_setting( 'wpzero_informazioni_articolo',
        array(
            'default' => true,
            'sanitize_callback' => 'wpzero_checkbox_sanize',
    ));

    $wp_customize->add_control( 'wpzero_informazioni_articolo',
        array(
            'type' => 'checkbox',
            'section' => 'wpzero_impostazioni_contenuto',
            'label' => esc_html__('Informazioni articolo.', 'wpzero'),
            'description' => esc_html__('Vuoi nascondere le informazioni del
            post?.', 'wpzero'),
    ));

    $wp_customize->add_section('wpzero_impostazioni_footer', array(
            'title' => esc_html__( 'Impostazioni footer', 'wpzero' ),
            'panel' => 'wpzero_pannello',
        ));
    $wp_customize->add_setting( 'wpzero_testo_footer', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control( 'wpzero_testo_footer', array(
        'type' => 'textarea',
        'section' => 'wpzero_impostazioni_footer',
        'label' => esc_html__('Testo del footer.', 'wpzero'),
        'description' => esc_html__('Inserisci qui il testo del footer.',
        'wpzero'),
    ));

    $wp_customize->add_setting( 'wpzero_colore_overlay', array(
        'default' => '#8098D0',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control( 'wpzero_colore_overlay', array(
        'type' => 'color',
        'section' => 'colors',
        'label' => esc_html__('Colore overlay.', 'wpzero'),
        'description' => esc_html__('Seleziona un colore al passaggio del
        mouse.', 'wpzero'),
    ));
    
    function wpzero_checkbox_sanize( $input ) {
        return $input ? true : false;
    }
}

add_action( 'customize_register', 'wpzero_customize_register' );