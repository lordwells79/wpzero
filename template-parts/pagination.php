<?php
    $posts_pagination = get_the_posts_pagination(
        array(
            'prev_text' => esc_html__( 'Precedente', 'wpzero' ),
            'next_text' => esc_html__( 'Successivo', 'wpzero' ),
        )
    );
    if ( $posts_pagination ) {
        echo $posts_pagination;
    }
?>