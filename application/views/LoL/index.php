<body onload="summonerLookUp();">
<div class="container">
    <!-- margen para toda la web grid 1 espacio 10 de contenido -->
    <div class="row">
        <div id="userData" class="col-md-8 col-md-offset-2 col-xs-12">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div id="sAvatar"><IMG style='float:left; margin:5px 5px 0px 0px' height='100px' width='100px' SRC='<?php echo base_url(); ?>asset/src/img/icono.png'></div>
                <select id="invocador"style="margin: 10px" onchange="summonerLookUp();" class="form-control input-medium">
                    <option selected="selected">Dumphine</option>
                    <option>Chuh</option>
                    <option>Drakarex</option>
                    <option>Órsen</option>
                    <option>Hi Im Drakarex</option>
                </select>
                <h5> <p id="sLevel" style="margin: -5px 0px 0px 5px" class="text-left"></p> </h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div id="tier"></div>
                <h4> <p id="division" style="padding: 3px" class="text-right text-danger text-capitalize"></p> </h4>
                <h5> <p id="liga" style="margin: -5px" class="text-right"></p> </h5>
                <h5> <p id="lp" style="margin: -5px" class="text-right"></p> </h5>
                <h5> <p id="winLose" style="margin: -5px" class="text-right"></p> </h5>
            </div>
        </div>
        <div id="matchData" class="col-md-8 col-md-offset-2 col-xs-12">
            <p style="padding: 3px" class="text-center text-capitalize"><strong>Datos de la ultima partida jugada</strong></p>
            <div id="colorWinLoss" class="col-md-4 col-sm-4 col-xs-12">
                <div id="champIMG"></div>
                <h5>  <p id="ganoPerdio" style="margin-top: -5px" class="text-left text-capitalize"></p> </h5>
                <h5> <p id="fechaLastMatch" style="margin-top: -7px" class="text-left text-capitalize"></p> </h5>
                <h5> <p id="tipoMatch" style="margin-top: -7px" class="text-left text-capitalize"></p> </h5>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div>
                    <div id="spell" class="fake_img"  style="margin-top: 3px">
                        <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                    </div>
                    <div id="item1" class="fake_img" style="margin-top: -7px;margin-left: 15px" >
                        <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                    </div>
                    <div id="item3" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                        <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                    </div>
                    <div id="item5" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                        <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                    </div>
                </div>
                <div>
                    <div id="spell2" class="fake_img"  >
                        <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                    </div>
                    <div id="item2" class="fake_img" style="margin-top: -7px;margin-left: 15px" >
                        <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                    </div>
                    <div id="item4" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                        <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                    </div>
                    <div id="item6" class="fake_img" style="margin-top: -3px;margin-left: -3px" >
                        <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                    </div>
                    <div id="trinket" class="fake_img" >
                        <IMG style='float:left' height='25px' width='25px' SRC='<?php echo base_url(); ?>asset/src/img/items/0.png'>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
            </div>
        </div>
    </div>
</div>
</body>
