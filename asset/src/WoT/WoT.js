/**
 * Created by Orsen on 06-03-2016.
 */
var APIKEY = "6be59cbefdddc1454074718eb3434a96";

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
                $("#text_event").text("No existe la ID");
                $('.cargando').hide();

            }
            else
            {
                id = json.data[0].account_id;
                document.getElementById("acc_id").innerHTML = "Account ID: "+ id;
                info_user(id);
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
    $("#text_event").text("Cargando resumen del usuario");
    $.ajax({
        url: 'https://api.worldoftanks.com/wot/account/info/?application_id='+ APIKEY +'&account_id=' + ID,
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function (json)
        {
            wins = json.data[ID].statistics["all"].wins;
            losses = json.data[ID].statistics["all"].losses;
            batallas = json.data[ID].statistics["all"].battles;
            battle_exp_avg = json.data[ID].statistics["all"].battle_avg_xp;
            max_xp = json.data[ID].statistics["all"].max_xp;
            hits = json.data[ID].statistics["all"].hits;
            shots = json.data[ID].statistics["all"].shots;
            max_frags = json.data[ID].statistics["all"].max_frags;
            damage_dealt = json.data[ID].statistics["all"].damage_dealt;


            max_xp = formatNumber(max_xp);
            percent_hits = (hits*100)/ shots;
            percent_hits = percent_hits.toFixed(2);
            percent_wins = (wins*100)/ batallas;
            percent_wins = percent_wins.toFixed(2);
            battle_avg_dmg = (damage_dealt / batallas).toFixed(0);


            document.getElementById("batallas").innerHTML = batallas;
            document.getElementById("percent_wins").innerHTML = percent_wins+"%";
            document.getElementById("battle_exp_avg").innerHTML = battle_exp_avg;
            document.getElementById("max_xp").innerHTML = max_xp;
            document.getElementById("percent_hits").innerHTML = percent_hits+"%";
            document.getElementById("max_frags").innerHTML = max_frags;
            document.getElementById("battle_avg_dmg").innerHTML = battle_avg_dmg;
            $('.cargando').hide();

        },
        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            alert("Problemas al obtener el resumen del jugador!");
        }
    });
}

function formatNumber(num)
{
    return ("" + num).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, function($1) { return $1 + "." });
}

$(window).load(function () {
    // Una vez se cargue al completo la página desaparecerá el div "cargando"
    $('.cargando').hide();
});