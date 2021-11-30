<?php
get_header();
?>

<div id="content" class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<h1>' . esc_html_e('Errore 404', 'wpzero') . '</h1>';
                echo '<p>' . esc_html_e('Ci spiace, ma la pagina o il contenuto
                richiesto non è stato trovato.', 'wpzero') . '</p>';
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>