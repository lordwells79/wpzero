<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="Content-Type"
        content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
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
    <header id="site-navigation" class="header">
        <div class="container">
            <div class="row">

                <!-- Inizio logo WordPress -->
                <div class="col-md-4 logo">

                    <?php

                                if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) {

                                    echo the_custom_logo();

                                } else {

                                    echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';

                                        echo esc_attr(get_bloginfo('name'));
                                        echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';

                                    echo '</a>';

                                }

                            ?>

                </div>
                <!-- Fine logo WordPress -->
                <!-- Inizio menu WordPress -->
                <div class="col-md-8">

                    <button class="menu-toggle" aria-controls="top-menu" aria-expanded="false" type="button">
                        <span aria-hidden="true"><?php esc_html_e( 'Menu', 'wpzero' ); ?></span>
                    </button>

                    <nav id="main-menu">

                        <?php
                                    wp_nav_menu( array(
                                                'theme_location' => 'main-menu',
                                                'container' => false
                                    ));
                                ?>

                    </nav>

                </div>
                <!-- Fine menu WordPress -->
            </div>
        </div>
    </header>