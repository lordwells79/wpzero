<footer>
    <div class="container">
        <?php
            if ( is_active_sidebar('wpzero-footer-sidebar')) {
                echo '<div class="row sidebar-area">';
                dynamic_sidebar('wpzero-footer-sidebar');
                echo '</div>';
            }
        ?>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <?php
                    if (!get_theme_mod('wpzero_testo_footer') ) {
                        esc_html_e('Copyright ', 'wpzero');
                        echo esc_html(get_bloginfo('name'));
                        echo esc_html( date_i18n( __( ' Y', 'wpzero' )));
                    } else {
                        echo esc_html(get_theme_mod('wpzero_testo_footer'));
                    }
                    ?>
                    <a href="<?php echo
                        esc_url('https://github.com/lordwells79/wpzero'); ?>" target="_blank"><?php
                        printf( esc_html__( ' | Tema sviluppato da %s', 'wpzero' ),
                        'RCL' ); ?></a>
                </p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer();?>
</body>

</html>