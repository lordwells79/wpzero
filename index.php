<?php

  get_header();
?>
<div id="content" class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content' );
                endwhile;
            else:
                esc_html_e( 'Nessun post trovato.', 'wpzero' );
            endif;

             // paginazione
             get_template_part( 'template-parts/pagination');
        ?>
        </div>
    </div>
</div>

<?php
  get_footer();

?>