<!-- Contenedor DIV Reproductor -->
    <div class="container-fluid" id="body_youtube">
        <div class="row">
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
                            $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$videos->id_video);
                            parse_str($content, $ytarr);
                            echo '
                        <div class="playlist shadow" video="'.$videos->id_video.'">
                            <div class="dibujito">
                                <span class="glyphicon glyphicon-play play"></span>
                            </div>
                            <div class="dibujito">
                                <span class="glyphicon glyphicon-pause pause"></span>
                            </div>
                            '.$ytarr['title'].'
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