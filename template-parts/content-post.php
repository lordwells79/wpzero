<?php
    global $post;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( has_post_thumbnail() ) {
    ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('wpzero_miniatura_media') ?>
        </div>
    <?php
    }
    ?>

    <h1 class="post-title"><?php the_title(); ?></h1>
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
        <?php the_content();
              the_tags('<div
              class="post-tags"><strong>'.esc_html__('Tags:','wpzero').'</strong>
              ', ', ', '</div>');   
        ?>
    </div>
</div>