/**
 * Created by Orsen on 06-03-2016.
 */
var APIKEY = "6be59cbefdddc1454074718eb3434a96";
var all_logros = [];

$(document).ready(function(){
    $('#search').click(function()
    {
        $("#text_event").text("Buscando ID");
        if ($('#nickname').val() != '')
        {
            var nickname = $('#nickname').val();
            $('.cargando').show();
            buscarID(nickname);
        }
        else
        {
            $("#text_event").text("no se ingreso una ID");
            alert("Ingrese un Nickname Porfavor");
        }
    });
});

function buscarID(nickname)
{
    $.ajax({
        url: 'https://api.worldoftanks.com/wot/account/list/?application_id='+ APIKEY +'&language=es&search=' + nickname,
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function (json)
        {

            if (json.status =="error" || json.meta.count == "0")
            {
                alert("El usuario ingresado no existe, porfavor intente nuevamente");
                $('.cargando').hide();

            }
            else
            {
                id = json.data[0].account_id;
                document.getElementById("acc_id").innerHTML = "Account ID: "+ id;
                info_user(id);
                logros_user(id);
                player_vehiculos(id);
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            alert("Problemas al obtener la id del jugador");
        }
    });
}

function info_user(ID)
{
    $.ajax({
        url: 'https://api.worldoftanks.com/wot/account/info/?application_id='+ APIKEY +'&account_id=' + ID,
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function (json)
        {
            $("#text_event").text("Cargando Resumen del Usuario");

            created_at = json.data[ID].created_at;
            last_battle_time = json.data[ID].last_battle_time;
            wins = json.data[ID].statistics["all"].wins;
            losses = json.data[ID].statistics["all"].losses;
            batallas = json.data[ID].statistics["all"].battles;
            battle_exp_avg = json.data[ID].statistics["all"].battle_avg_xp;
            max_xp = json.data[ID].statistics["all"].max_xp;
            hits = json.data[ID].statistics["all"].hits;
            draws = json.data[ID].statistics["all"].draws;
            survived_battles = json.data[ID].statistics["all"].survived_battles;
            shots = json.data[ID].statistics["all"].shots;
            max_frags = json.data[ID].statistics["all"].max_frags;
            damage_dealt = json.data[ID].statistics["all"].damage_dealt;
            xp = json.data[ID].statistics["all"].xp;
            frags = json.data[ID].statistics["all"].frags;
            spotted = json.data[ID].statistics["all"].spotted;
            max_damage = json.data[ID].statistics["all"].max_damage;
            shots_fail = shots - hits;
            battle_avg_dmg = (damage_dealt / batallas).toFixed(0);

            var f_creada = new Date( created_at *1000);
            var f_ultimaBatalla = new Date( last_battle_time *1000);

            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

            fecha_creada = diasSemana[f_creada.getDay()] + ", " + f_creada.getDate() + " de " + meses[f_creada.getMonth()] + " del " + f_creada.getFullYear();
            ultima_batalla = diasSemana[f_ultimaBatalla.getDay()] + ", " + f_ultimaBatalla.getDate() + " de " + meses[f_ultimaBatalla.getMonth()] + " del " + f_ultimaBatalla.getFullYear() + " " + f_ultimaBatalla.getHours() + ":" + f_ultimaBatalla.getMinutes();

            document.getElementById("fechas").innerHTML = "Creada: " + fecha_creada + "         Ultima Batalla: " + ultima_batalla;

            max_xp_format = formatNumber(max_xp);
            batallas_format = formatNumber(batallas);
            victorias_format = formatNumber(wins);
            derrotas_format = formatNumber(losses);
            empates_format = formatNumber(draws);
            bSobrevividas_format = formatNumber(survived_battles);
            xp_format = formatNumber(xp);
            frags_format = formatNumber(frags);
            spotted_format = formatNumber(spotted);
            shots_format = formatNumber(shots);
            hits_format = formatNumber(hits);
            shots_fail_format = formatNumber(shots_fail);
            damage_dealt_format = formatNumber(damage_dealt);
            max_damage_format = formatNumber(max_damage);

            percent_hits = (hits*100)/ shots;
            percent_hits = percent_hits.toFixed(2);
            
            percent_shots_fail = (shots_fail*100)/ shots;
            percent_shots_fail = percent_shots_fail.toFixed(2);

            percent_wins = (wins*100)/ batallas;
            percent_wins = percent_wins.toFixed(2);

            percent_losses = (losses*100)/ batallas;
            percent_losses = percent_losses.toFixed(2);

            percent_draws = (draws*100)/ batallas;
            percent_draws = percent_draws.toFixed(2);

            percent_BAxp = (battle_exp_avg*100)/ xp;
            percent_BAxp = percent_BAxp.toFixed(2);

            percent_BMxp = (max_xp*100)/ xp;
            percent_BMxp = percent_BMxp.toFixed(2);

            percent_BAdmg = (battle_avg_dmg*100)/ damage_dealt;
            percent_BAdmg = percent_BAdmg.toFixed(2);

            percent_max_damage = (max_damage*100)/ damage_dealt;
            percent_max_damage = percent_max_damage.toFixed(2);

            percent_survived_battles = (survived_battles*100)/ batallas;
            percent_survived_battles = percent_survived_battles.toFixed(2);



            // codigo para la tab resumen
            document.getElementById("batallas").innerHTML = batallas_format;
            document.getElementById("percent_wins").innerHTML = percent_wins+"%";
            document.getElementById("battle_exp_avg").innerHTML = battle_exp_avg;
            document.getElementById("max_xp").innerHTML = max_xp_format;
            document.getElementById("percent_hits").innerHTML = percent_hits+"%";
            document.getElementById("max_frags").innerHTML = max_frags;
            document.getElementById("battle_avg_dmg").innerHTML = battle_avg_dmg;

            // codigo para la tab estadisticas
            document.getElementById("batallas2").innerHTML = batallas_format;
            document.getElementById("percent_wins2").innerHTML = percent_wins+"%";
            document.getElementById("battle_avg_dmg2").innerHTML = battle_avg_dmg;

            //tabla Resultados Generales

            document.getElementById("batallas-table1").innerHTML = batallas_format;

            document.getElementById("victorias-table1").innerHTML = percent_wins+"%";
            document.getElementById("victorias-table2").innerHTML = victorias_format;

            document.getElementById("derrotas-table1").innerHTML = percent_losses+"%";
            document.getElementById("derrotas-table2").innerHTML = derrotas_format;

            document.getElementById("empates-table1").innerHTML = percent_draws+"%";
            document.getElementById("empates-table2").innerHTML = empates_format;

            document.getElementById("bSobrevividas-table1").innerHTML = percent_survived_battles+"%";
            document.getElementById("bSobrevividas-table2").innerHTML = bSobrevividas_format;

            document.getElementById("xp-table1").innerHTML = xp_format;

            document.getElementById("BAxp-table1").innerHTML = percent_BAxp+"%";
            document.getElementById("BAxp-table2").innerHTML = battle_exp_avg;

            document.getElementById("BMxp-table1").innerHTML = percent_BMxp+"%";
            document.getElementById("BMxp-table2").innerHTML = max_xp_format;

            //tabla Rendimiento de Batalla

            document.getElementById("frags-table1").innerHTML = frags_format;

            document.getElementById("spotted-table1").innerHTML = spotted_format;

            document.getElementById("shots-table1").innerHTML = shots_format;

            document.getElementById("hits-table1").innerHTML = percent_hits+"%";
            document.getElementById("hits-table2").innerHTML = hits_format;
            
            document.getElementById("shots_fail-table1").innerHTML = percent_shots_fail+"%";
            document.getElementById("shots_fail-table2").innerHTML = shots_fail_format;

            document.getElementById("damage-table1").innerHTML = damage_dealt_format;

            document.getElementById("BAdmg-table1").innerHTML = percent_BAdmg+"%";
            document.getElementById("BAdmg-table2").innerHTML = battle_avg_dmg;

            document.getElementById("max_damage-table1").innerHTML = percent_max_damage+"%";
            document.getElementById("max_damage-table2").innerHTML = max_damage_format;

        },
        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            alert("Problemas al obtener el resumen del jugador!");
        }
    });
}

function logros_user(ID)
{
    $( ".logro").addClass( "opaco" );
    $( ".b-achivements_wrpr" ).remove();
    $( ".logro_resumen" ).remove();
    $("#text_event").text("Cargando Logros del usuario");
    $.ajax({
        url: 'https://api.worldoftanks.com/wot/account/achievements/?application_id='+ APIKEY +'&language=es&account_id=' + ID,
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function (json)
        {
            var contador = 0;
            for (var logros in json.data[ID].achievements)
            {
                if ($("."+logros).hasClass('class') != true)
                {
                    if (json.data[ID].achievements[logros] > 1)
                    {
                        if (contador <= 6)
                        {
                            $( ".fondo_rojo" ).append
                            (
                                "<div class='b-achivements_item logro_resumen opaco "+all_logros.data[logros].name+"'>" +
                                "<img class='centrar' src='"+all_logros.data[logros].image+"'>" +
                                "</div>"
                            );
                            contador++;
                        }

                        $( "."+logros ).removeClass( "opaco" );
                        $( "."+logros ).append
                        (
                            "<div class='b-achivements_wrpr'>" +
                            "<span class='b-achivements_num'>" +
                            "<span>"+json.data[ID].achievements[logros]+"</span>" +
                            "</span>" +
                            "</div>"
                        );
                    }
                    else
                    {
                        $( "."+logros ).removeClass( "opaco" );
                        if (contador <= 6)
                        {
                            $( ".fondo_rojo" ).append
                            (
                                "<div class='b-achivements_item logro_resumen "+all_logros.data[logros].name+"'>" +
                                "<img class='centrar' src='"+all_logros.data[logros].image+"'>" +
                                "</div>"
                            );
                            contador++;
                        }
                    }
                }
                else
                {
                    $( "."+logros ).removeClass( "opaco" );
                    $('#'+logros).attr('src',"http://api.worldoftanks.com/static/2.36.2/wot/encyclopedia/achievement/"+logros+json.data[ID].achievements[logros]+".png");
                }

            } //end for
            ocultar_div();
        },
        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            alert("Problemas al obtener los logros del jugador!");
        }
    });
}

function logros()
{
    $.ajax({
        url: 'https://api.worldoftanks.com/wot/encyclopedia/achievements/?application_id='+ APIKEY +'&language=es',
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function (json)
        {
            all_logros = json;
            $("#text_event").text("Cargando Logros Valiosos del usuario");

            for (var logros in json.data)
            {
                if (json.data[logros].image != null)
                {
                    //linea para colocar la imagen
                    $( "#"+json.data[logros].section )
                        .append(
                        "<div class='col-md-1 col-sm-2 col-xs-3 logro opaco "+json.data[logros].name+"'>" +
                            "<img class='centrar' src='"+json.data[logros].image+"'>" +
                        "</div>");
                    //monton de mierda para el tooltipo

                    $('.'+json.data[logros].name).tipso({
                        speed               : 100,
                        titleBackground     : 'url(http://static-ptl-us.gcdn.co/static/3.35.4/wotp_static/img/core/frontend/scss/common/components/tooltip/img/tooltip_bg.jpg)',
                        color               : '#979899',
                        width               : 300,
                        maxWidth            : '500',
                        size                : 'default',
                        background          : 'url(http://static-ptl-us.gcdn.co/static/3.35.4/wotp_static/img/core/frontend/scss/common/components/tooltip/img/tooltip_bg.jpg)'
                    });
                    jQuery('.'+json.data[logros].name).tipso('update', 'titleContent', json.data[logros].name_i18n);
                    jQuery('.'+json.data[logros].name).tipso('update', 'content', json.data[logros].description);
                }
                else
                {
                    if (json.data[logros].name != "markOfMastery")
                    {
                        if (json.data[logros].name != "marksOnGun")
                        {
                            // AQUI FALTA CONTINUAR CON LOS ULTIMOS LOGROOOOOOOSSS (PONER IMAGENES EN CASO DE QUE NO SE MODIFIQUEN EN TIER IV)!!!!
                            $( "#"+json.data[logros].section ).append("<div class='col-md-1 col-sm-2 col-xs-3 logro opaco "+json.data[logros].name+" "+json.data[logros].section+"'><img id='"+json.data[logros].name+"' src='"+json.data[logros].options["3"].image+"'></div>");
                        }
                    }
                }
            } //end for
        }, //end json success
        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            alert("Problemas al obtener todos los logros");
        }
    });
}

function player_vehiculos(ID)
{
    $.ajax({
        url: 'https://api.worldoftanks.com/wot/account/tanks/?application_id=' + APIKEY + '&account_id=' + ID,
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function (json)
        {

        },
        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            alert("Problemas al obtener Informacion de los vehiculos");
        }
    });
}

function ocultar_div()
{
    $('.cargando').hide();
}

function formatNumber(num)
{
    return ("" + num).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, function($1) { return $1 + "." });
}

//cosas paja ejecutar cuando carga la web
$(window).load(function () {
    // Una vez se cargue al completo la página desaparecerá el div "cargando"
    logros();
    $('.cargando').hide();
});