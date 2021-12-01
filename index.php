<?php

  get_header();
?>
<div class="wpzero-carousel-wrapper">
    <div class="owl-carousel wpzero-carousel">
        <?php
            $html = '';
            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'meta_key' => '_thumbnail_id',
                'post__not_in' => get_option("sticky_posts")
            );

            $query = new WP_Query( $query_args );
            while ( $query->have_posts() ) : $query->the_post();
                global $post;
                $thumbnailIMG = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
                $thumbnailALT = (get_post_meta( get_post_thumbnail_id(),
                    '_wp_attachment_image_alt', true )) ? get_post_meta(
                    get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) : get_the_title() ;

                $html .= '<div>';
                $html .= '<img src="'.esc_url($thumbnailIMG[0]).'" alt="'.esc_attr($thumbnailALT).'">';
                $html .= '<h3><a href="'.get_the_permalink().'">' . esc_attr(get_the_title()) . '</a></h3>';
                $html .= '</div>';
            endwhile;
            wp_reset_query();
            wp_reset_postdata();
            echo $html;
        ?>
    </div>
</div>
<div id="content" class="container">

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


<?php
  get_footer();

?>