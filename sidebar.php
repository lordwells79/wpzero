<div class="sidebar-area">

    <?php

        get_search_form();

        if ( is_active_sidebar('wpzero-sidebar')) {

            dynamic_sidebar('wpzero-sidebar');

        } 
        else {

            the_widget(
                'WP_Widget_Categories',
                array(
                    'title'=> esc_html__('Migliori 5 Categorie',"wpzero")
                ),
                array(
                    'before_widget' => '<div class="post-article widget_categories">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h4 class="title">',
                    'after_title'   => '</h4>'
                )
            );

            the_widget(
                'WP_Widget_Calendar',
                array(
                    'title'=> esc_html__('Calendario',"wpzero")
                ),
                array(
                    'before_widget' => '<div class="post-article widget_calendar">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h4 class="title">',
                    'after_title'   => '</h4>'
                )
            );

            the_widget(
                'WP_Widget_Archives',
                'dropdown=1&count=1',
                array(
                    'before_widget' => '<div class="post-article widget_archive">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h4 class="title">',
                    'after_title'   => '</h4>'
                )
            );

        }

    ?>

</div>