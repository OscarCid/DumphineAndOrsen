<div class="cargando">
    <div class="evento">
        <span id="text_event"></span>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="menu">
            <ul id="tabs" class="nav nav-tabs " data-tabs="tabs">
                <li class="active"><a href="#resumen" data-toggle="tab">RESUMEN</a></li>
                <li><a href="#logros" data-toggle="tab">LOGROS</a></li>
                <li><a href="#estadisticas" data-toggle="tab">ESTADÍSTICAS</a></li>
                <li><a href="#green" data-toggle="tab">VEHÍCULOS</a></li>
            </ul>
        </div>
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="resumen">
                <div class="row">
                    <div class="col-sm-2 col-xs-2 col-sm-offset-1">
                        <div class="contenedor">
                            <div class="imagen_texto">
                                <img src="<?php echo base_url(); ?>asset/src/WoT/img/batallas.png">
                            </div>
                            <div class="barrita">
                                <p class="valor" id="batallas">--</p>
                                <p class="name_valor">Batallas</p>
                            </div>
                        </div>
                    </div> <!-- batalla -->
                    <div class="col-sm-2 col-xs-2">
                        <div class="contenedor">
                            <div class="imagen_texto">
                                <img src="<?php echo base_url(); ?>asset/src/WoT/img/victorias.png">
                            </div>
                            <div class="barrita">
                                <p class="valor" id="percent_wins">0</p>
                                <p class="name_valor">Victorias</p>
                            </div>
                        </div>
                    </div> <!-- victorias -->
                    <div class="col-sm-2 col-xs-2">
                        <div class="imagen_centro">
                            <img src="<?php echo base_url(); ?>asset/src/WoT/Logo WoT.jpg">
                        </div>
                    </div> <!-- logo -->
                    <div class="col-sm-2 col-xs-2">
                        <div class="contenedor">
                            <div class="imagen_texto">
                                <img style="padding-right: 5px" src="<?php echo base_url(); ?>asset/src/WoT/img/avg_exp.png">
                            </div>
                            <div class="barrita">
                                <p class="valor" id="battle_exp_avg">--</p>
                                <p class="name_valor">Experiencia media por batalla</p>
                            </div>
                        </div>
                    </div> <!-- avg exp battle -->
                    <div class="col-sm-2 col-xs-2">
                        <div class="contenedor">
                            <div class="imagen_texto">
                                <img src="<?php echo base_url(); ?>asset/src/WoT/img/max_exp.png">
                            </div>
                            <div class="barrita">
                                <p class="valor" id="max_xp">0</p>
                                <p class="name_valor">Maxima experiencia por batalla</p>
                            </div>
                        </div>
                    </div> <!-- max exp -->
                </div>
                <!-- segunda Linea -->
                <div class="row" style="margin-top: 30px">
                    <div class="col-sm-2 col-sm-offset-1">
                        <div class="contenedor">
                            <div class="imagen_texto">
                                <img src="<?php echo base_url(); ?>asset/src/WoT/img/avg_hit.png">
                            </div>
                            <div class="barrita">
                                <p class="valor" id="percent_hits">--</p>
                                <p class="name_valor">Porcentaje de impacto</p>
                            </div>
                        </div>
                    </div> <!-- % impacto -->
                    <div class="col-sm-2">
                        <div class="contenedor">
                            <div class="imagen_texto">
                                <img src="<?php echo base_url(); ?>asset/src/WoT/img/avg_dmg.png">
                            </div>
                            <div class="barrita">
                                <p class="valor" id="battle_avg_dmg">--</p>
                                <p class="name_valor">Daño promedio por batalla</p>
                            </div>
                        </div>
                    </div> <!-- avg dmg  -->
                    <div class="col-sm-2 col-centered">
                        <div class="input-group" style="margin-left: 15px">
                            <input type="text" id="nickname" class="form-control" aria-label="...">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-WoT" id="search">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                        <p id="acc_id" class="text_id"></p>
                    </div> <!-- buscador -->
                    <div class="col-sm-2">
                        <div class="contenedor">
                            <div class="imagen_texto">
                                <img src="<?php echo base_url(); ?>asset/src/WoT/img/max_destroyed.png">
                            </div>
                            <div class="barrita">
                                <p class="valor" id="max_frags">0</p>
                                <p class="name_valor">Maximo destruido en batalla</p>
                            </div>
                        </div>
                    </div> <!-- max destroyed -->
                    <div class="col-sm-2">
                        <div class="contenedor">
                            <div class="imagen_texto">
                                <img src="<?php echo base_url(); ?>asset/src/WoT/img/mastery.png">
                            </div>
                            <div class="barrita">
                                <p class="valor">--</p>
                                <p class="name_valor">Insignias de maestria</p>
                            </div>
                        </div>
                    </div> <!-- mastery -->
                </div>
            </div> <!-- fin tab resumen -->
            <div class="tab-pane" id="logros">
                <div class="row" style="margin-top: 30px">
                    <p style="text-align: center">Logros Valiosos</p>
                    <div class="col-xs-12">
                        <p style="text-align: left">Héroes de Batalla</p>
                    </div>
                    <div id="battle">
                        <!-- aqui se cargan logros Heroe de batalla-->
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col-xs-12">
                        <p style="text-align: left">Medallas Épicas</p>
                    </div>
                    <div id ="epic">
                        <!-- aqui se cargan logros Medalla Epica-->
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col-xs-12">
                        <p style="text-align: left">Grados Honorarios</p>
                    </div>
                    <div id ="special">
                        <!-- aqui se cargan logros Grados Honorarios-->
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col-xs-12">
                        <p style="text-align: left">Recuerdos Conmemorativos</p>
                    </div>
                    <div id ="memorial">
                        <!-- aqui se cargan logros Grados Honorarios-->
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col-xs-12">
                        <p style="text-align: left">Logros por etapas</p>
                    </div>
                    <div id ="class">
                        <!-- aqui se cargan logros Grados Honorarios-->
                    </div>
                </div>
            </div> <!-- fin tab logros -->
            <div class="tab-pane" id="estadisticas">
                <div class="row"  style="margin-top: 30px; margin-bottom: 20px;">
                    <p style="text-align: center">Batallas Estandar y Compañias de Tanques</p>
                </div>
                <div class="row">
                    <div class="col-sm-2 col-xs-2 col-sm-offset-1 hidden-xs" style="margin-top: -50px; margin-right: -30px">
                        <img style="text-align: right" src="<?php echo base_url(); ?>asset/src/WoT/img/logo_batalla.png">
                    </div>
                    <div class="col-sm-8 col-xs-12">
                        <div class="col-sm-3 col-xs-3">
                            <div class="contenedor">
                                <div class="imagen_texto">
                                    <img src="<?php echo base_url(); ?>asset/src/WoT/img/batallas.png">
                                </div>
                                <div class="barrita">
                                    <p class="valor" id="batallas2">--</p>
                                    <p class="name_valor">Batallas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <div class="contenedor">
                                <div class="imagen_texto">
                                    <img src="<?php echo base_url(); ?>asset/src/WoT/img/victorias.png">
                                </div>
                                <div class="barrita">
                                    <p class="valor" id="percent_wins2">0</p>
                                    <p class="name_valor">Victorias</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <div class="contenedor">
                                <div class="imagen_texto">
                                    <img src="<?php echo base_url(); ?>asset/src/WoT/img/avg_dmg.png">
                                </div>
                                <div class="barrita">
                                    <p class="valor" id="battle_avg_dmg2">--</p>
                                    <p class="name_valor">Daño promedio por batalla</p>
                                </div>
                            </div>
                        </div> <!-- avg dmg  -->
                        <div class="col-sm-3 col-xs-3">
                            <div class="contenedor">
                                <div class="imagen_texto">
                                    <img src="<?php echo base_url(); ?>asset/src/WoT/img/mastery.png">
                                </div>
                                <div class="barrita">
                                    <p class="valor">--</p>
                                    <p class="name_valor">Insignias de maestria</p>
                                </div>
                            </div>
                        </div> <!-- mastery -->
                    </div>
                </div>
                <!--
                <div class="row">
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                    </ul>
                    <!-- Tab panes
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">.kkpokp..</div>
                        <div role="tabpanel" class="tab-pane" id="profile">...vnvnnbvn</div>
                    </div>
                </div>
                -->
            </div> <!-- fin tab estadisticas -->
            <div class="tab-pane" id="green">
                <h1>Green</h1>
                <p>green green green green green</p>
            </div>
        </div>
    </div> <!-- end row -->
</div>
