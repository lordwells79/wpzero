<?php

  get_header();
?>

<!-- Inizio blocco articolo singolo -->

<div id="content" class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', 'post');
                wp_link_pages(
                    array(
                    'before' => '<div class="wpzero-pagination">',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>'
                    )
                );
                comments_template();
            endwhile;
            ?>
        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php
get_footer();

?>