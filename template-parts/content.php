<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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