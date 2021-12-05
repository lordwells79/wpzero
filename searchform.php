<div class="sidebar-widget">
    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
        <label for="search"><?php esc_html_e('Cerca', 'wpzero');?></label>
        <input placeholder="<?php esc_attr_e('Digita qui...', 'wpzero');?>" type="text" name="s" id="search"
            value="<?php the_search_query(); ?>" />
        <input type="submit" class="search-submit" value="<?php esc_attr_e('Cerca', 'wpzero');?>" />
    </form>
</div>