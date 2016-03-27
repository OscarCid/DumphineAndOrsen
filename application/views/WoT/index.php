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
                <!-- primera Linea -->
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
                <!-- logros valiosos -->
                <div class="row" style="margin-top: 30px">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-sm-12" style="text-align: center">Logros Valiosos</div>
                        <div class="col-sm-12 fondo_rojo" style="margin-top: 20px">
                            
                        </div>
                    </div>
                </div>
            </div><!-- fin tab resumen -->

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
                                    <img src="http://static-ptl-us.gcdn.co/static/3.35.6/common/img/classes/class-ace.png">
                                </div>
                                <div class="barrita">
                                    <p class="valor">--</p>
                                    <p class="name_valor">Insignias de maestria</p>
                                </div>
                            </div>
                        </div> <!-- mastery -->
                    </div>
                </div>
                <div class="row">
                    <div class="centrar">
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="btn-izquierdo active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Estadisticas</a></li>
                            <li role="presentation" class="btn-derecho"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Infografias</a></li>
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content" style="margin-top: 20px">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <p style="text-align: left; margin-left: -13px; font-size: smaller">Resultados Generales</p>
                                    </div>
                                    <table class="table table-condensed">
                                        <tbody>
                                        <tr>
                                            <td class="td1 td-top">Batallas</td>
                                            <td class="td2 td-top"></td>
                                            <td class="td3 td-top" id="batallas-table1">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Victorias</td>
                                            <td class="td2" id="victorias-table1">--</td>
                                            <td class="td3" id="victorias-table2">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Derrotas</td>
                                            <td class="td2" id="derrotas-table1">--</td>
                                            <td class="td3" id="derrotas-table2">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Empates</td>
                                            <td class="td2" id="empates-table1">--</td>
                                            <td class="td3" id="empates-table2">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Batallas Sobrevividas</td>
                                            <td class="td2" id="bSobrevividas-table1">--</td>
                                            <td class="td3" id="bSobrevividas-table2">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Experiencia Total</td>
                                            <td class="td2"></td>
                                            <td class="td3" id="xp-table1">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Experiencia Media por Batalla</td>
                                            <td class="td2" id="BAxp-table1">--</td>
                                            <td class="td3" id="BAxp-table2">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Experiencia Máxima Ganada</td>
                                            <td class="td2" id="BMxp-table1">--</td>
                                            <td class="td3" id="BMxp-table2">--</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- fin primera tabla -->
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <p style="text-align: left; margin-left: -13px; font-size: smaller">Rendimiento de Batalla</p>
                                    </div>
                                    <table class="table table-condensed">
                                        <tbody>
                                        <tr>
                                            <td class="td1 td-top">Vehiculos Destruidos</td>
                                            <td class="td2 td-top"></td>
                                            <td class="td3 td-top" id="frags-table1">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Vehiculos Detectados</td>
                                            <td class="td2"></td>
                                            <td class="td3" id="spotted-table1">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Disparos Realizados</td>
                                            <td class="td2"></td>
                                            <td class="td3" id="shots-table1">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Disparos Acertados</td>
                                            <td class="td2" id="hits-table1">--</td>
                                            <td class="td3" id="hits-table2">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Disparos Fallidos (Do'h)</td>
                                            <td class="td2" id="shots_fail-table1">--</td>
                                            <td class="td3" id="shots_fail-table2">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Daño Total Inflingido</td>
                                            <td class="td2"></td>
                                            <td class="td3" id="damage-table1">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Daño Medio por Batalla</td>
                                            <td class="td2" id="BAdmg-table1">--</td>
                                            <td class="td3" id="BAdmg-table2">--</td>
                                        </tr>
                                        <tr>
                                            <td class="td1">Daño Máximo en Batalla</td>
                                            <td class="td2" id="max_damage-table1">--</td>
                                            <td class="td3" id="max_damage-table2">--</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- fin segunda tabla -->
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">...vnvnnbvn</div>
                    </div>
                </div>

            </div> <!-- fin tab estadisticas -->
            <div class="tab-pane" id="green">
                <h1>Green</h1>
                <p>green green green green green</p>
            </div>
        </div>
    </div> <!-- end row -->
</div>
