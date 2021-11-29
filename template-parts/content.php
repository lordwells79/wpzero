<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( has_post_thumbnail() ) {
    ?>
        <div class="post-thumbnail">
            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" title="<?php the_title_attribute(); ?>">
                <?php
                $size = (is_home()) ? 'wpzero_miniatura_larga' :
                'wpzero_miniatura_media';
                the_post_thumbnail($size);
                ?>
            </a>
        </div>
    <?php
    }
    ?>
    <h3 class="post-title"><a href="<?php echo
    esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a></h3>
    <div class="post-meta">
        <?php
        esc_html_e('Scritto da ','wpzero');
        echo get_the_author_posts_link();
        esc_html_e(' il giorno ','wpzero');
        echo get_the_date();
        esc_html_e(' in ','wpzero');
        the_category(' ');
        ?>
    </div>
    <div class="post-content">
        <?php the_excerpt(); ?>
    </div>
</div>