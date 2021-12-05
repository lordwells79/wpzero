<?php
    if ( post_password_required() ) {
        return;
    }
    if ( have_comments() ) :
        echo comments_number(
            '<h3 class="comments">' . esc_html__( 'No comments','wpzero') . '</h3>',
            '<h3 class="comments">1 ' . esc_html__('comment','wpzero') . '</h3>',
            '<h3 class="comments">% ' . esc_html__('comments','wpzero') . '</h3>'
        );
        //wp_list_comments();
        // utilizziamo la funzione di callback al posto di wp_list_comments() x modificare la struttura dei commenti
        echo '<ul class="commentlist">';
            wp_list_comments('type=comment&callback=wpzero_list_comments');
        echo '</ul>';
    endif;

    if ( get_comment_pages_count() > 1 && get_option('page_comments') ) :
        previous_comments_link(esc_html__('&laquo;','wpzero'));
        next_comments_link(esc_html__('&raquo;','wpzero'));
    endif;

    comment_form();
?>