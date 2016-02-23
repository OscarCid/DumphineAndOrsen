<!-- Contenedor DIV Reproductor -->
    <div class="container-fluid" id="body_youtube">
        <div class="row">
            <?php if ($this->session->flashdata('category_success')) { ?>
                <div class="alert alert-<?= $this->session->flashdata('tipo_alerta') ?> col-md-4 col-md-offset-4">
                    <span class="glyphicon glyphicon-<?= $this->session->flashdata('icono') ?>" aria-hidden="true"></span>
                    <?= $this->session->flashdata('category_success') ?>
                </div>
                <script>
                    setTimeout(function() {
                        $('.alert').fadeOut('slow');
                    }, 3000);
                </script>
            <?php } ?>
            <div id="contenedorPlayer" class="col-md-8">
                <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
                <div id="player" class="shadow"></div>
            </div>
            <div id="lista" class="col-md-4">
                <!-- div necesario para poder generar margenes sino la wea vale picorneta -->
                <div id="contenidoLista" class="shadow">
                    <?php
                        foreach ($videos->result() as $videos)
                        {
                            echo '
                        <div class="playlist shadow" video="'.$videos->id_video.'">
                            <div class="dibujito">
                                <span class="glyphicon glyphicon-play play"></span>
                            </div>
                            <div class="dibujito">
                                <span class="glyphicon glyphicon-pause pause"></span>
                            </div>
                            <div class="dibujito">
                                <span class="glyphicon glyphicon-stop stop"></span>
                            </div>
                            <div id="cancion">
                            '.$videos->name.'
                            </div>
                        </div>';
                        }
                    ?>
                    <!-- CODIGO GUARDADO PARA LA POSTERIDAD
                    <div class="playlist shadow" video="S_RzBeC5ZJY">
                        <div class="dibujito">
                            <span class="glyphicon glyphicon-play play"></span>
                        </div>
                        <div class="dibujito">
                            <span class="glyphicon glyphicon-pause pause"></span>
                        </div>
                        Sia Carpool Karaoke
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>