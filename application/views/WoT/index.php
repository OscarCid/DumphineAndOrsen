<div class="container">
    <div class="row">
        <div class="menu">
            <ul id="tabs" class="nav nav-tabs " data-tabs="tabs">
                <li class="active"><a href="#resumen" data-toggle="tab">RESUMEN</a></li>
                <li><a href="#orange" data-toggle="tab">LOGROS</a></li>
                <li><a href="#yellow" data-toggle="tab">ESTADÍSTICAS</a></li>
                <li><a href="#green" data-toggle="tab">VEHÍCULOS</a></li>
            </ul>
        </div>
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="resumen">
                <div class="row">
                    <div class="col-lg-2 col-lg-offset-1">
                        <div class="barrita">
                            <p class="valor" id="batallas">000</p>
                            <p class="name_valor">Batallas</p>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="barrita">
                            <p class="valor" id="percent_wins">00%</p>
                            <p class="name_valor">Victorias</p>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="imagen_centro">
                            <img src="<?php echo base_url(); ?>asset/src/WoT/Logo WoT.jpg">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="barrita">
                            <p class="valor" id="battle_exp_avg">000</p>
                            <p class="name_valor">Experiencia media por batalla</p>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="barrita">
                            <p class="valor" id="max_xp">000</p>
                            <p class="name_valor">Maxima experiencia por batalla</p>
                        </div>
                    </div>
                </div>
                <!-- segunda Linea -->
                <div class="row" style="margin-top: 30px">
                    <div class="col-lg-2 col-lg-offset-1">
                        <div class="barrita">
                            <p class="valor" id="percent_hits">00%</p>
                            <p class="name_valor">Porcentaje de impacto</p>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="barrita">
                            <p class="valor" id="battle_avg_dmg">0</p>
                            <p class="name_valor">Daño promedio por batalla</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-centered">
                        <div class="input-group" style="margin-left: 15px">
                            <input type="text" id="nickname" class="form-control" aria-label="...">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-WoT" id="search">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="barrita">
                            <p class="valor" id="max_frags">0</p>
                            <p class="name_valor">Maximo destruido en batalla</p>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="barrita">
                            <p class="valor">--</p>
                            <p class="name_valor">Insignias de maestria</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="orange">
                <h1>Orange</h1>
                <p>orange orange orange orange orange</p>
            </div>
            <div class="tab-pane" id="yellow">
                <h1>Yellow</h1>
                <p>yellow yellow yellow yellow yellow</p>
            </div>
            <div class="tab-pane" id="green">
                <h1>Green</h1>
                <p>green green green green green</p>
            </div>
        </div>
    </div>
</div>