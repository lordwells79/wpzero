<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <?php
                        esc_html_e('Copyright ', 'sheeba');
                        echo esc_html(get_bloginfo('name'));
                        echo esc_html( date_i18n( __( ' Y', 'sheeba' )));
                    ?>
                    <a href="<?php echo
                        esc_url('https://github.com/lordwells79/wpzero'); ?>" target="_blank"><?php
                        printf( esc_html__( ' | Tema sviluppato da %s', 'WPZERO' ),
                        'RCL' ); ?></a>
                </p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer();?>
</body>
</html>