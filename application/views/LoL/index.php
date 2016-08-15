<?php header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
?>
<div class="cargando">
    <div class="evento">
        <span id="text_event"></span>
    </div>
</div>
<body onload="summonerLookUp();">
<div class="container">
    <!-- margen para toda la web offset 2 espacio 8 de contenido -->
    <div class="row">
        <div id="userData" class="col-md-8 col-md-offset-2 col-xs-12">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <!-- IMAGEN AVATAR -->
                <div id="sAvatar"><IMG style='float:left; margin:5px 0px 0px 0px' height='100px' width='100px' SRC='<?php echo base_url(); ?>asset/src/img/icono.png'></div>
                <!-- INPUT SEARCH -->
                <div class="input-group" style="margin-left: 15px; margin-top: 5px">
                    <input type="text" id="invocador" class="form-control input-medium" value="Dumphine">
                    <div class="input-group-btn">
                        <button type="button" id="search" class="btn btn-WoT">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <!-- LVL SUMMONER -->
                <h5> <p id="sLevel" style="margin: -5px 0px 0px 5px" class="blanco text-left"></p> </h5>
                <h5> <p id="enPartida" style="margin: -5px 0px 0px 5px" class="blanco text-left"></p>En Partida: <span id="enpartidaicono" style="color: #00CC00" class="glyphicon glyphicon-ok" aria-hidden="true"></span></h5>
            </div>
            <!-- INFO LIGA SUMMONER -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div id="tier"></div>
                <h4> <p id="division" style="padding: 3px" class="text-right text-danger text-capitalize"></p> </h4>
                <h5> <p id="liga" style="margin: -5px" class="blanco text-right"></p> </h5>
                <h5> <p id="lp" style="margin: -5px" class="blanco text-right"></p> </h5>
                <h5> <p id="winLose" style="margin: -5px" class="blanco text-right"></p> </h5>
            </div>
        </div>
        <div id="matchData" class="col-md-8 col-md-offset-2 col-xs-12">
            <!-- NAVTAB -->
            <div class="menu">
                <ul id="tabs" class="nav nav-tabs " data-tabs="tabs">
                    <li class="active"><a href="#last5" data-toggle="tab">Ultimas 5 Partidas</a></li>
                    <li id="esPartidaTab" class="disabled"><a href="#actual" data-toggle="tab">Partida Actual</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <!-- ULTIMAS 5 PARTIDAS -->
                <div role="tabpanel" class="tab-pane active" id="last5">
                    <!-- Partida 0 -->
                    <div class="row match" style="margin: 5px 5px 5px 5px">
                        <!-- INICIO div para una partida -->
                        <!-- LOSS WIN -->
                        <div id="p0colorWinLoss" class="col-md-4 col-sm-4 col-xs-6" style="margin-top: 3.5px;">
                            <div id="p0champIMG"></div>
                            <h5>  <p id="p0ganoPerdio" style="margin-top: -5px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p0fechaLastMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p0tipoMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                        </div>
                        <!-- ITEMS -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div>
                                <div id="p0spell" class="fake_img"  style="margin-top: 3px">
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p0item1" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p0item3" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p0item5" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                            <div>
                                <div id="p0spell2" class="fake_img"  >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p0item2" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p0item4" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p0item6" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p0trinket" class="fake_img hidden-sm hidden-md" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                        </div>
                        <!-- INFO KDA PARTIDA -->
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p0lvl" class="info">Nivel: 00</p>
                                <p id="p0kda" style="margin-top: -8px" class="info">K: 0 / D: 0 / A: 0</p>
                                <p id="p0oroGanado" style="margin-top: -8px" class="info">G. Earned: 00000</p>
                                <p id="p0oroGastado" style="margin-top: -8px" class="info">G. Spent: 00000</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p0tiempo" class="info">Duración: 00</p>
                                <p id="p0cs"  style="margin-top: -8px" class="info">CS: 0</p>
                                <p id="p0wKilled" style="margin-top: -8px" class="info">Ward Killed: 00</p>
                                <p id="p0wPlaced" style="margin-top: -8px" class="info">Ward Placed: 00</p>
                            </div>
                        </div>
                        <!-- FIN div para una partida -->
                    </div>
                    <!-- Partida 1 -->
                    <div class="row match" style="margin: 5px 5px 5px 5px">
                        <!-- INICIO div para una partida -->
                        <!-- LOSS WIN -->
                        <div id="p1colorWinLoss" class="col-md-4 col-sm-4 col-xs-6" style="margin-top: 3.5px;">
                            <div id="p1champIMG"></div>
                            <h5>  <p id="p1ganoPerdio" style="margin-top: -5px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p1fechaLastMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p1tipoMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                        </div>
                        <!-- ITEMS -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div>
                                <div id="p1spell" class="fake_img"  style="margin-top: 3px">
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p1item1" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p1item3" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p1item5" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                            <div>
                                <div id="p1spell2" class="fake_img"  >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p1item2" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p1item4" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p1item6" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p1trinket" class="fake_img hidden-sm hidden-md" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                        </div>
                        <!-- INFO KDA PARTIDA -->
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p1lvl" class="info">Nivel: 00</p>
                                <p id="p1kda" style="margin-top: -8px" class="info">K: 0 / D: 0 / A: 0</p>
                                <p id="p1oroGanado" style="margin-top: -8px" class="info">G. Earned: 00000</p>
                                <p id="p1oroGastado" style="margin-top: -8px" class="info">G. Spent: 00000</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p1tiempo" class="info">Duración: 00</p>
                                <p id="p1cs"  style="margin-top: -8px" class="info">CS: 0</p>
                                <p id="p1wKilled" style="margin-top: -8px" class="info">Ward Killed: 00</p>
                                <p id="p1wPlaced" style="margin-top: -8px" class="info">Ward Placed: 00</p>
                            </div>
                        </div>
                        <!-- FIN div para una partida -->
                    </div>
                    <!-- Partida 2 -->
                    <div class="row match" style="margin: 5px 5px 5px 5px">
                        <!-- INICIO div para una partida -->
                        <!-- LOSS WIN -->
                        <div id="p2colorWinLoss" class="col-md-4 col-sm-4 col-xs-6" style="margin-top: 3.5px;">
                            <div id="p2champIMG"></div>
                            <h5>  <p id="p2ganoPerdio" style="margin-top: -5px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p2fechaLastMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p2tipoMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                        </div>
                        <!-- ITEMS -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div>
                                <div id="p2spell" class="fake_img"  style="margin-top: 3px">
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p2item1" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p2item3" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p2item5" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                            <div>
                                <div id="p2spell2" class="fake_img"  >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p2item2" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p2item4" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p2item6" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p2trinket" class="fake_img hidden-sm hidden-md" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                        </div>
                        <!-- INFO KDA PARTIDA -->
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p2lvl" class="info">Nivel: 00</p>
                                <p id="p2kda" style="margin-top: -8px" class="info">K: 0 / D: 0 / A: 0</p>
                                <p id="p2oroGanado" style="margin-top: -8px" class="info">G. Earned: 00000</p>
                                <p id="p2oroGastado" style="margin-top: -8px" class="info">G. Spent: 00000</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p2tiempo" class="info">Duración: 00</p>
                                <p id="p2cs"  style="margin-top: -8px" class="info">CS: 0</p>
                                <p id="p2wKilled" style="margin-top: -8px" class="info">Ward Killed: 00</p>
                                <p id="p2wPlaced" style="margin-top: -8px" class="info">Ward Placed: 00</p>
                            </div>
                        </div>
                        <!-- FIN div para una partida -->
                    </div>
                    <!-- Partida 3 -->
                    <div class="row match" style="margin: 5px 5px 5px 5px">
                        <!-- INICIO div para una partida -->
                        <!-- LOSS WIN -->
                        <div id="p3colorWinLoss" class="col-md-4 col-sm-4 col-xs-6" style="margin-top: 3.5px;">
                            <div id="p3champIMG"></div>
                            <h5>  <p id="p3ganoPerdio" style="margin-top: -5px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p3fechaLastMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p3tipoMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                        </div>
                        <!-- ITEMS -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div>
                                <div id="p3spell" class="fake_img"  style="margin-top: 3px">
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p3item1" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p3item3" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p3item5" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                            <div>
                                <div id="p3spell2" class="fake_img"  >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p3item2" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p3item4" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p3item6" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p3trinket" class="fake_img hidden-sm hidden-md" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                        </div>
                        <!-- INFO KDA PARTIDA -->
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p3lvl" class="info">Nivel: 00</p>
                                <p id="p3kda" style="margin-top: -8px" class="info">K: 0 / D: 0 / A: 0</p>
                                <p id="p3oroGanado" style="margin-top: -8px" class="info">G. Earned: 00000</p>
                                <p id="p3oroGastado" style="margin-top: -8px" class="info">G. Spent: 00000</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p3tiempo" class="info">Duración: 00</p>
                                <p id="p3cs"  style="margin-top: -8px" class="info">CS: 0</p>
                                <p id="p3wKilled" style="margin-top: -8px" class="info">Ward Killed: 00</p>
                                <p id="p3wPlaced" style="margin-top: -8px" class="info">Ward Placed: 00</p>
                            </div>
                        </div>
                        <!-- FIN div para una partida -->
                    </div>
                    <!-- Partida 4 -->
                    <div class="row match" style="margin: 5px 5px 5px 5px">
                        <!-- INICIO div para una partida -->
                        <!-- LOSS WIN -->
                        <div id="p4colorWinLoss" class="col-md-4 col-sm-4 col-xs-6" style="margin-top: 3.5px;">
                            <div id="p4champIMG"></div>
                            <h5>  <p id="p4ganoPerdio" style="margin-top: -5px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p4fechaLastMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                            <h5> <p id="p4tipoMatch" style="margin-top: -7px" class="text-left text-capitalize blanco"></p> </h5>
                        </div>
                        <!-- ITEMS -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div>
                                <div id="p4spell" class="fake_img"  style="margin-top: 3px">
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p4item1" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p4item3" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p4item5" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                            <div>
                                <div id="p4spell2" class="fake_img"  >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p4item2" class="fake_img" style="margin-top: -7px;margin-left: 7px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p4item4" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p4item6" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                                <div id="p4trinket" class="fake_img hidden-sm hidden-md" >
                                    <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                                </div>
                            </div>
                        </div>
                        <!-- INFO KDA PARTIDA -->
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p4lvl" class="info">Nivel: 00</p>
                                <p id="p4kda" style="margin-top: -8px" class="info">K: 0 / D: 0 / A: 0</p>
                                <p id="p4oroGanado" style="margin-top: -8px" class="info">G. Earned: 00000</p>
                                <p id="p4oroGastado" style="margin-top: -8px" class="info">G. Spent: 00000</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 5px">
                                <p id="p4tiempo" class="info">Duración: 00</p>
                                <p id="p4cs"  style="margin-top: -8px" class="info">CS: 0</p>
                                <p id="p4wKilled" style="margin-top: -8px" class="info">Ward Killed: 00</p>
                                <p id="p4wPlaced" style="margin-top: -8px" class="info">Ward Placed: 00</p>
                            </div>
                        </div>
                        <!-- FIN div para una partida -->
                    </div>
                </div>
                <!-- PARTIDA ACTUAL -->
                <div role="tabpanel" class="tab-pane" id="actual">
                    EN DESARROLLO :D...
                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1" style="margin-top:  10px">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Responsive -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-7347964578998540"
                 data-ad-slot="9501191028"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
</div>
</body>
