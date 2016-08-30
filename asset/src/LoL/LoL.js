/**
 * Created by Orsen on 10-02-2016.
 * Los datos rescatados son proporcionados por RIOT Games
 * Link: https://developer.riotgames.com/api/methods
 */

function ddragon()
{
    $.ajax({
        url: 'http://dumphineandorsen.com/LoL/data/ddragon/0',
        type: 'GET',
        dataType: 'json',
        success: function (json)
        {
            version_ddragon = json[0];
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("error getting ddragon Version");
        }
    });
}

function summonerLookUp()
{
    $('.cargando').show();
    $("#text_event").text("Buscando Invocador");
    var ID = document.getElementById("invocador").value;
    var jqxhr = $.ajax
    ({
        url: 'http://dumphineandorsen.com/LoL/data/summoner/' + ID,
        type: 'GET',
        dataType: 'json'
    })
        .done(function(json)
        {
            var userID = ID.replace(/ /g,'');

            userID = userID.toLowerCase().trim();

            summonerLevel = json[userID].summonerLevel;
            summonerID = json[userID].id;
            summonerAvatar = json[userID].profileIconId;

            document.getElementById("sLevel").innerHTML = "  Nivel: "+ summonerLevel;
            // document.getElementById("sID").innerHTML = "<strong>  " + ID + "</strong>";
            document.getElementById("sAvatar").innerHTML = "<IMG style='float:left; margin:5px 5px 0px 0px' height='100px' width='100px' SRC='http://ddragon.leagueoflegends.com/cdn/"+version_ddragon+"/img/profileicon/"+summonerAvatar+".png'>";

            summonerLeague(summonerID);
            lastMatch(summonerID);
            actualMatch(summonerID, userID);
        })
        .fail(function()
        {
            alert("error obteniendo datos del invocador!");
            $('.cargando').hide();
        })
        .always(function() {

        });
}

function lastMatch(summonerID)
{
    var jqxhr = $.ajax
    ({
        url: "http://dumphineandorsen.com/LoL/data/last_match/" + summonerID,
        type: 'GET',
        dataType: 'json'
    })
        .done(function(resp) {
            for (i=0;i<=4;i++)
            {
                campeon = resp.games[i].championId;
                fecha = resp.games[i].createDate;
                winlost = resp.games[i].stats['win'];
                spell1 = resp.games[i].spell1;
                spell2 = resp.games[i].spell2;
                K = resp.games[i].stats['championsKilled']; if (null == K) { K = 0; }
                D = resp.games[i].stats['numDeaths']; if (null == D) { D = 0; }
                A = resp.games[i].stats['assists']; if (null == A) { A = 0; } //comprobacion null = 0
                item1 = resp.games[i].stats['item0'];
                item2 = resp.games[i].stats['item1'];
                item3 = resp.games[i].stats['item2'];
                item4 = resp.games[i].stats['item3'];
                item5 = resp.games[i].stats['item4'];
                item6 = resp.games[i].stats['item5'];
                trinket = resp.games[i].stats['item6'];
                tipoMatch = resp.games[i].subType;
                tipoMatch= tipoMatch.toLowerCase();
                tipoMatch = tipoMatch.replace(/\_/g,' ');
                tipoMatch = capitalizeFirstLetter(tipoMatch)

                lvl = resp.games[i].stats['level'];
                goldEarned = resp.games[i].stats['goldEarned'];
                goldSpent = resp.games[i].stats['goldSpent'];
                minionsKilled = resp.games[i].stats['minionsKilled'];

                timePlayed = resp.games[i].stats['timePlayed'];
                tpMinutos = Math.floor(timePlayed/60);
                tpSegundos = timePlayed%60;

                wardKilled = resp.games[i].stats['wardKilled']; if (null == wardKilled) { wardKilled = 0; }
                wardPlaced = resp.games[i].stats['wardPlaced']; if (null == wardPlaced) { wardPlaced = 0; }

                // saber si se gana una partida o no y cambia el color del div
                if (winlost==true)
                {
                    document.getElementById("p"+i+"colorWinLoss").style.background = 'green';
                    document.getElementById("p"+i+"ganoPerdio").innerHTML = "<strong>Win</strong>";
                }
                else
                {
                    document.getElementById("p"+i+"colorWinLoss").style.background = 'rgba(255, 0, 0, 0.73)';
                    document.getElementById("p"+i+"ganoPerdio").innerHTML = "<strong>Lose</strong>";
                }

                // KDA
                document.getElementById("p"+i+"kda").innerHTML = "K: "+K+" / D: "+D+" / A: "+A;
                // LVL
                document.getElementById("p"+i+"lvl").innerHTML = "Nivel: "+lvl;
                // GOLD
                document.getElementById("p"+i+"oroGanado").innerHTML = "G. Earned: "+goldEarned;
                document.getElementById("p"+i+"oroGastado").innerHTML = "G. Spent: "+goldSpent;
                //Tiempo
                document.getElementById("p"+i+"tiempo").innerHTML = "Duración: "+tpMinutos+":"+tpSegundos;
                //CS
                document.getElementById("p"+i+"cs").innerHTML = "CS: "+minionsKilled;
                // WARDS
                document.getElementById("p"+i+"wKilled").innerHTML = "Ward Killed: "+wardKilled;
                document.getElementById("p"+i+"wPlaced").innerHTML = "Ward Placed: "+wardPlaced;



                document.getElementById("p"+i+"tipoMatch").innerHTML = tipoMatch;

                //obtencion de la fecha de la ultima partida de lol, lol conchetumare, te pasa la fecha en un formato muy culiao eproch
                championName(campeon, i);
                var dateVal ="/Date("+fecha+")/";
                var date = new Date( parseFloat( dateVal.substr(6 )));

                document.getElementById("p"+i+"fechaLastMatch").innerHTML =
                    date.getDate() + "/" +
                    (date.getMonth() + 1) + "/" +
                    date.getFullYear() + " " +
                    date.getHours() + ":" +
                    date.getMinutes();

                //obtencion de la imagen y la descripcion de los summonerSpell utilizando la funcion summoner Spell que esta mas abajo y la id
                //que la obtengo en estra consulta (asi no pregunto denuevo la misma wea)
                summonerSpell(spell1, "p"+i+"spell");
                summonerSpell(spell2, "p"+i+"spell2");
                summonerItems(item1, "p"+i+"item1");
                summonerItems(item2, "p"+i+"item2");
                summonerItems(item3, "p"+i+"item3");
                summonerItems(item4, "p"+i+"item4");
                summonerItems(item5, "p"+i+"item5");
                summonerItems(item6, "p"+i+"item6");
                summonerItems(trinket, "p"+i+"trinket");

            }
        })
        .fail(function() {
            alert("error obteniendo datos de la ultima partida!");
            $('.cargando').hide();
        })
        .always(function() {
        });
}

function championName(id, i)
{
    $.ajax({
        url: "http://dumphineandorsen.com/LoL/data/champ_info/" + id,
        type: 'GET',
        dataType: 'json',
        data: {

        },
        success: function (resp) {
            var nombre = resp.key;
            nombre = nombre.replace(/\s+/, "");
            document.getElementById("p"+i+"champIMG").innerHTML = "<a href='http://gameinfo.las.leagueoflegends.com/es/game-info/champions/"+ nombre.toLowerCase() +"/' data-toggle='tooltip' title='Click en la imagen para mas informacion sobre " + resp.name + "' target='Champion'><IMG style='float:left; margin:5px 5px 5px 0px' height='50px' width='50px' SRC='http://ddragon.leagueoflegends.com/cdn/"+version_ddragon+"/img/champion/"+nombre+".png'></a>";
            if (i==0)
            {
                $("body").css({
                    "background-image": "url(http://ddragon.leagueoflegends.com/cdn/img/champion/splash/"+nombre+"_0.jpg)",
                    "background-attachment": "fixed",
                    "background-size": "100%"
                });
            }
        },

        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("error Champion name!");
            $('.cargando').hide();
        }
    });
}

function summonerLeague(summonerID)
{
    $.ajax({
        url: "http://dumphineandorsen.com/LoL/data/summoner_league/" + summonerID,
        type: 'GET',
        dataType: 'json',
        success: function (resp) {

            liga = resp[summonerID][0].name;
            lp = resp[summonerID][0].entries[0].leaguePoints;
            win = resp[summonerID][0].entries[0].wins;
            loss = resp[summonerID][0].entries[0].losses;
            //tier divison fotitos kawaiiii

            tier = resp[summonerID][0].tier;
            tier = tier.toLowerCase();

            division = resp[summonerID][0].entries[0].division;
            division = division.toLowerCase();

            document.getElementById("liga").innerHTML = liga;
            document.getElementById("lp").innerHTML = lp + " LP";
            document.getElementById("division").innerHTML = "<strong>" + capitalizeFirstLetter(tier) + " " + division.toUpperCase() + "</strong>";
            document.getElementById("winLose").innerHTML = "Wins: " + win + " Losses: " + loss;

            document.getElementById("tier").innerHTML = "<IMG style='float:right; margin:0px 0px 0px 5px' height='110px' width='110px' SRC='asset/src/img/tier/"+tier+"_"+division+".png'>";


        },

        error: function (XMLHttpRequest, textStatus, errorThrown) {
            document.getElementById("tier").innerHTML = "<IMG style='float:right; margin:0px 0px 0px 5px' height='110px' width='110px' SRC='asset/src/img/tier/unranked.png'>";
            document.getElementById("liga").innerHTML = "--";
            document.getElementById("lp").innerHTML = " -- LP";
            document.getElementById("division").innerHTML = "<strong>Unranked</strong>";
            document.getElementById("winLose").innerHTML = "Wins: -- Losses: --"
        }
    });
}

function summonerSpell(spellID, divSpell)
{

    $.ajax({
        url: "http://dumphineandorsen.com/LoL/data/summoner_spell/" + spellID,
        type: 'GET',
        dataType: 'json',
        success: function (resp)
        {
            nombreSpell = resp.key;
            espanolSpell = resp.name;
            descripcion = resp.description;
            document.getElementById(divSpell).innerHTML = "<IMG style='float:left' height='25px' width='25px' SRC='http://ddragon.leagueoflegends.com/cdn/"+version_ddragon+"/img/spell/"+nombreSpell+".png'></a>";
            $('#'+divSpell).tipso({
                speed               : 100,
                titleBackground     : '#000',
                width               : 300,
                maxWidth            : '500',
                animationIn         : 'flipInX',
                animationOut        : 'flipOutX',
                size                : 'default',
                background          : '#000'

            });
            jQuery('#'+divSpell).tipso('update', 'titleContent', "<nombreItem><strong>" + espanolSpell + "</strong></nombreItem>");
            jQuery('#'+divSpell).tipso('update', 'content', descripcion);

            if(divSpell == "p4spell")
            {
                $('.cargando').hide();
            }

        },

        error: function (XMLHttpRequest, textStatus, errorThrown)
        {

        }
    });
}

function summonerItems(itemID, divItem)
{
    if (null == itemID)
    {
        document.getElementById(divItem).innerHTML = "<IMG style='float:left' height='25px' width='25px' SRC='asset/src/img/items/0.png'>";
        $('#'+divItem).tipso({
            titleBackground     : '#000',
            width               : 200,
            maxWidth            : '500',
            size                : 'default',
            html                : 'true',
            background          : '#000'
        });
        jQuery('#'+divItem).tipso('update', 'titleContent', "No Item");
        jQuery('#'+divItem).tipso('update', 'content', 'No Item');
        if(divItem == "p4trinket")
        {
            $('.cargando').hide();
        }
    }
    else
    {
        var jqxhr = $.ajax
            ({
                url: "http://dumphineandorsen.com/LoL/data/summoner_items/" + itemID,
                type: 'GET',
                dataType: 'json'
            })
            .done(function(resp)
            {
                descripcion = resp.description;
                nombre = resp.name;
                $("#text_event").text("Buscando Item "+nombre+"!");
                document.getElementById(divItem).innerHTML = "<IMG style='float:left' height='25px' width='25px' SRC='http://ddragon.leagueoflegends.com/cdn/" + version_ddragon + "/img/item/" + itemID + ".png'>";
                $('#' + divItem).tipso({
                    speed: 100,
                    titleBackground: '#000',
                    width: 300,
                    maxWidth: '500',
                    animationIn: 'flipInX',
                    animationOut: 'flipOutX',
                    size: 'default',
                    background: '#000'

                });
                jQuery('#' + divItem).tipso('update', 'titleContent', "<nombreItem><strong>" + nombre + "</strong></nombreItem>");
                jQuery('#' + divItem).tipso('update', 'content', descripcion);
            })
            .fail(function()
            {
                alert("error obteniendo Item "+itemID+"!");
                $('.cargando').hide();
            });
    }
}

/* despues de aqui se repiten algunas funciones para la parte de partida actual */

function actualMatch(ID, userID)
{

    var jqxhr = $.ajax
        ({
            url: "http://dumphineandorsen.com/LoL/ultima_partida/"+ ID,
            type: 'GET',
            dataType: 'json'
        })
        .done(function(resp)
        {
            // Cambio de icono a que si esta en partida
            $("#enpartidaicono").removeClass();
            $("#enpartidaicono").addClass("glyphicon glyphicon-ok");
            $("#enpartidaicono").css('color', '#00CC00');

            //Habilita pestaña de partida actual
            $('#enPartidaTab').removeClass("disabled");
            $('#enPartidaTab').click(function(event)
            {
                if (!$(this).hasClass('disabled')) {
                    return true;
                }
            });

            $("tr").removeClass("tabla-seleccionado");
            //cambia de pestaña en caso de que este en la contraria
            $('.nav-tabs a[href="#actual"]').tab('show');

            //que empieze el webeo
            gameMode = resp.gameMode;
            mapId= resp.mapId;
            gameQueueConfigId = resp.gameQueueConfigId;

            $("#tipo_partida").text(gameMode);

            /* switch para el el tipo de partida */
            switch(gameQueueConfigId)
            {
                case 0:
                {
                    $("#tipo_partida").text("Custom");
                    break;
                }
                case 8:
                {
                    $("#tipo_partida").text("Normal 3v3");
                    break;
                }
                case 2:
                {
                    $("#tipo_partida").text("Normal 5v5 Blind Pick");
                    break;
                }
                case 14:
                {
                    $("#tipo_partida").text("Normal 5v5 Draft Pick");
                    break;
                }
                case 4:
                {
                    $("#tipo_partida").text("Ranked Solo 5v5");
                    break;
                }
                case 41:
                {
                    $("#tipo_partida").text("Ranked Team 3v3");
                    break;
                }
                case 42:
                {
                    $("#tipo_partida").text("Ranked Team 5v5");
                    break;
                }
                case 16:
                {
                    $("#tipo_partida").text("Dominion 5v5 Blind Pick");
                    break;
                }
                case 17:
                {
                    $("#tipo_partida").text("Dominion 5v5 Draft Pick");
                    break;
                }
                case 25:
                {
                    $("#tipo_partida").text("Dominion Coop VS AI");
                    break;
                }
                case 31:
                {
                    $("#tipo_partida").text("Summoner's Rift Coop vs AI Intro Bot");
                    break;
                }
                case 32:
                {
                    $("#tipo_partida").text("Summoner's Rift Coop vs AI Beginner Bot");
                    break;
                }
                case 33:
                {
                    $("#tipo_partida").text("Historical Summoner's Rift Coop vs AI Intermediate Bot");
                    break;
                }
                case 52:
                {
                    $("#tipo_partida").text("Twisted Treeline Coop vs AI");
                    break;
                }
                case 61:
                {
                    $("#tipo_partida").text("Team Builder");
                    break;
                }
                case 65:
                {
                    $("#tipo_partida").text("ARAM!");
                    break;
                }
                case 70:
                {
                    $("#tipo_partida").text("One for All");
                    break;
                }
                case 75:
                {
                    $("#tipo_partida").text("Hexakill");
                    break;
                }
                case 76:
                {
                    $("#tipo_partida").text("URF! URF! URF!");
                    break;
                }
                case 78:
                {
                    $("#tipo_partida").text("One for All (Mirror mode)");
                    break;
                }
                case 83:
                {
                    $("#tipo_partida").text("URF BOTS");
                    break;
                }
                case 91:
                {
                    $("#tipo_partida").text("Doom Bots Rank 1");
                    break;
                }
                case 92:
                {
                    $("#tipo_partida").text("Doom Bots Rank 2");
                    break;
                }
                case 93:
                {
                    $("#tipo_partida").text("Doom Bots Rank 5");
                    break;
                }
                case 96:
                {
                    $("#tipo_partida").text("Ascension");
                    break;
                }
                case 98:
                {
                    $("#tipo_partida").text("Hexakill");
                    break;
                }
                case 100:
                {
                    $("#tipo_partida").text("Butcher's Bridge");
                    break;
                }
                case 300:
                {
                    $("#tipo_partida").text("King Poro");
                    break;
                }
                case 310:
                {
                    $("#tipo_partida").text("Nemesis");
                    break;
                }
                case 313:
                {
                    $("#tipo_partida").text("Black Market Brawlers");
                    break;
                }
                case 315:
                {
                    $("#tipo_partida").text("Nexus Siege");
                    break;
                }
                case 317:
                {
                    $("#tipo_partida").text("Definitely Not Dominion");
                    break;
                }
                case 400:
                {
                    $("#tipo_partida").text("Normal 5v5 Draft Pick");
                    break;
                }
                case 410:
                {
                    $("#tipo_partida").text("Ranked 5v5 Draft Pick");
                    break;
                }
                default:
                {
                    document.getElementById("mapId").innerHTML = mapId;
                }
            }
            /* switch para el mapa */
            switch(mapId)
            {
                case 8:
                {
                    $("#tipo_partida").append("<small class='MapName' id='mapId'>Cicatriz de Cristal</small>");
                    break;
                }
                case 10:
                {
                    $("#tipo_partida").append("<small class='MapName' id='mapId'>Bosque Retorcido</small>");
                    break;
                }
                case 11:
                {
                    $("#tipo_partida").append("<small class='MapName' id='mapId'>Grieta del Invocador</small>");
                    break;
                }
                case 12:
                {
                    $("#tipo_partida").append("<small class='MapName' id='mapId'>Abismo de los Lamentos</small>");
                    break;
                }
                default:
                {
                    document.getElementById("mapId").innerHTML = mapId;
                }
            }

            for (i=0; i<=9; i++)
            {
                $(".tabla-"+i).removeClass("tabla-seleccionado");
                /* nombre summoner */
                nombre = resp["participants"][i].summonerName;
                summonerId = resp["participants"][i].summonerId;
                nombre_comparacion = nombre.toLowerCase().trim();
                nombre_comparacion = nombre_comparacion.replace(/ /g,'');
                spell0 = resp["participants"][i].spell1Id;
                spell1 = resp["participants"][i].spell2Id;
                championId = resp["participants"][i].championId;
                profileIconId = resp["participants"][i].profileIconId;
                estajugando = 0;

                $(".nombre-"+i).text(nombre);
                if (nombre_comparacion == userID)
                {
                    estajugando = 0;
                    $(".tabla-"+i).addClass("tabla-seleccionado");
                    estajugando = 1;
                }

                /*icono summoner*/
                $("#imgsumm-"+i).attr("src","http://ddragon.leagueoflegends.com/cdn/"+version_ddragon+"/img/profileicon/"+profileIconId+".png");


                /*Spell Summoner */
                summonerSpell_actual(spell0, "spell0-"+i);
                summonerSpell_actual(spell1, "spell1-"+i);
                /*Champion Info*/
                championActual(championId, i, "champ-"+i, estajugando);
            }

            for (let i=0; i<=9; i++) {
                setTimeout( function timer(){
                    summonerId = resp["participants"][i].summonerId;
                    championId = resp["participants"][i].championId;
                    ligaActual(summonerId, i);
                    kda(summonerId, i , championId);
                }, i*3000 );
            }

        })
        .fail(function()
        {
            // Cambio de icono a que NO esta en partida
            $("#enpartidaicono").removeClass();
            $("#enpartidaicono").addClass("glyphicon glyphicon-remove");
            $("#enpartidaicono").css('color', 'red');



            $('#enPartidaTab').attr('class', 'disabled');
            $('#enPartidaTab').click(function(event)
            {
                if ($(this).hasClass('disabled')) {
                    return false;
                }
            });
            //cambia de pestaña en caso de que este en la contraria
            $('.nav-tabs a[href="#last5"]').tab('show');


        })
        .always(function()
        {

        });

}

function summonerSpell_actual(spellID, classSummoner)
{

    $.ajax({
        url: "http://dumphineandorsen.com/LoL/data/summoner_spell/" + spellID,
        type: 'GET',
        dataType: 'json',
        success: function (resp)
        {
            nombreSpell = resp.key;
            espanolSpell = resp.name;
            descripcion = resp.description;
            $("#"+classSummoner).attr("src","http://ddragon.leagueoflegends.com/cdn/"+version_ddragon+"/img/spell/"+nombreSpell+".png");
            $("#"+classSummoner).tipso({
                speed               : 100,
                titleBackground     : '#000',
                width               : 300,
                maxWidth            : '500',
                animationIn         : 'flipInX',
                animationOut        : 'flipOutX',
                size                : 'default',
                background          : '#000'

            });
            jQuery("#"+classSummoner).tipso('update', 'titleContent', "<nombreItem><strong>" + espanolSpell + "</strong></nombreItem>");
            jQuery("#"+classSummoner).tipso('update', 'content', descripcion);
        },

        error: function (XMLHttpRequest, textStatus, errorThrown)
        {

        }
    });
}


function championActual(id, i, imgID, estajugando)
{
    $.ajax({
        url: "http://dumphineandorsen.com/LoL/data/champ_info/" + id,
        type: 'GET',
        dataType: 'json',
        data: {

        },
        success: function (resp) {
            var nombre = resp.key;
            $("#text_champ-"+i).text(nombre);
            nombre = nombre.replace(/\s+/, "");
            $("#"+imgID).attr("src","http://ddragon.leagueoflegends.com/cdn/"+version_ddragon+"/img/champion/"+nombre+".png");

            if (estajugando==1)
            {
                $("body").css({
                    "background-image": "url(http://ddragon.leagueoflegends.com/cdn/img/champion/splash/"+nombre+"_0.jpg)",
                    "background-attachment": "fixed",
                    "background-size": "100%"
                });
            }
        },

        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("error Champion name!");
            $('.cargando').hide();
        }
    });
}

function ligaActual(summonerID, i)
{
    $.ajax({
        url: "http://dumphineandorsen.com/LoL/data/summoner_league/" + summonerID,
        type: 'GET',
        dataType: 'json',
        success: function (resp) {

            liga = resp[summonerID][0].name;
            lp = resp[summonerID][0].entries[0].leaguePoints;
            win = resp[summonerID][0].entries[0].wins;
            loss = resp[summonerID][0].entries[0].losses;
            total = win + loss;
            percent = (win * 100) / total;
            percent = percent.toFixed(2);
            //tier divison fotitos kawaiiii

            tier = resp[summonerID][0].tier;
            tier = tier.toLowerCase();

            division = resp[summonerID][0].entries[0].division;
            division = division.toLowerCase();

            $("#imgranking-"+i).attr("src","asset/src/img/tier/"+tier+"_"+division+".png");
            $("#ranking-"+i).text(capitalizeFirstLetter(tier) + " " + division.toUpperCase() + " (" + lp + " LP)");
            $("#wl-"+i).html("<font color='#41CA12'>" + win + " </font> / <font color='red'> " + loss + "</font>");
            $("#percent-"+i).html(percent + "%");

        },

        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            $("#imgranking-"+i).attr("src","asset/src/img/tier/unranked.png");
            $("#ranking-"+i).text("Unranked!");
            $("#wl-"+i).html("- / -");
            $("#percent-"+i).html("--%");
        }
    });
}

function kda(ID, divID, champID)
{
    var jqxhr = $.ajax
        ({
            url: "http://dumphineandorsen.com/LoL/data/season/"+ ID,
            type: 'GET',
            dataType: 'json'
        })
        .done(function(resp)
        {
            siono = false;

            for (i=0;i<resp["champions"].length;i++)
            {
                if (resp["champions"][i].id == champID)
                {
                    partidas = resp["champions"][i]["stats"].totalSessionsPlayed;
                    k = resp["champions"][i]["stats"].totalChampionKills / partidas; k = k.toFixed(1);
                    d = resp["champions"][i]["stats"].totalDeathsPerSession / partidas; d = d.toFixed(1);
                    a = resp["champions"][i]["stats"].totalAssists / partidas; a = a.toFixed(1);

                    $("#kda-"+divID).html(k + " / " + d + " / " + a);
                    $(".num-games-"+divID).html("("+partidas+")");

                    siono = true;

                    $(".num-games-"+divID).tipso({
                        speed               : 100,
                        titleBackground     : '#000',
                        width               : 300,
                        maxWidth            : '500',
                        animationIn         : 'flipInX',
                        animationOut        : 'flipOutX',
                        size                : 'default',
                        background          : '#000'

                    });
                    jQuery(".num-games-"+divID).tipso('update', 'titleContent', "<nombreItem><strong>Datos totales del campeon</strong></nombreItem>");
                    jQuery(".num-games-"+divID).tipso('update', 'content', "" +
                        "<strong>Partidas: </strong>" + partidas + "<br>" +
                        "<strong>Asesinatos: </strong>"+ formatNumber(resp["champions"][i]["stats"].totalChampionKills)+"<br>" +
                        "<strong>Muertes: </strong>"+ formatNumber(resp["champions"][i]["stats"].totalDeathsPerSession) +"<br>" +
                        "<strong>Asistencias: </strong>"+ formatNumber(resp["champions"][i]["stats"].totalAssists) +"<br>"+
                        "-------------------------------<br> " +
                        "<strong>Asesinato Doble: </strong>"+ formatNumber(resp["champions"][i]["stats"].totalDoubleKills) +"<br>"+
                        "<strong>Asesinato Triple: </strong>"+ formatNumber(resp["champions"][i]["stats"].totalTripleKills) +"<br>"+
                        "<strong>Asesinato Cuadruple: </strong>"+ formatNumber(resp["champions"][i]["stats"].totalQuadraKills) +"<br>"+
                        "<strong>PE-PE-PENTAKILL!!!: </strong>"+ formatNumber(resp["champions"][i]["stats"].totalPentaKills) +"<br>"+
                        "-------------------------------<br> ");
                }
            }

            if (siono == false)
            {
                $("#kda-"+divID).html(" - / - / - ");
                $(".num-games-"+divID).html("(0)");
            }

        })
        .fail(function()
        {
            $("#kda-"+divID).html(" - / - / - ");
            $(".num-games-"+divID).html("(0)");
        })
        .always(function()
        {

        });

}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

$(document).ready(function(){
    ddragon();
    $('#search').click(function()
    {
        $("#text_event").text("Buscando Invocador");
        if ($('#invocador').val() != '')
        {
            $('.cargando').show();
            summonerLookUp();
        }
        else
        {
            $("#text_event").text("no se ingreso una ID");
            alert("Ingrese un Nickname Porfavor");
        }
    });
});

function formatNumber(num)
{
    return ("" + num).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, function($1) { return $1 + "." });
}