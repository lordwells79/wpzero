<?php
    global $post;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( has_post_thumbnail() ) {
    ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('wpzero_miniatura_larga') ?>
        </div>
    <?php
    }
    ?>

    <h1 class="post-title"><?php the_title(); ?></h1>

    <div class="post-content">
        <?php the_content(); ?>
    </div>
</div>