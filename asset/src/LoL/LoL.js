/**
 * Created by Orsen on 10-02-2016.
 * Los datos rescatados son proporcionados por RIOT Games
 * Link: https://developer.riotgames.com/api/methods
 */
var ID = "Dumphine";
var APIKEY = "b8e25ec6-f1e6-402a-862d-7a315196e650";

function summonerLookUp()
{
    if (ID !== "") {

        var selected = document.getElementById("invocador");
        ID = selected.options[selected.selectedIndex].text;

        $.ajax({
            url: 'https://na.api.pvp.net/api/lol/las/v1.4/summoner/by-name/' + ID + '?api_key=' + APIKEY,
            type: 'GET',
            dataType: 'json',
            data: {

            },
            success: function (json) {

                var selected = document.getElementById("invocador");
                ID = selected.options[selected.selectedIndex].text;
                var userID = ID.replace(/ /g,'');

                userID = userID.toLowerCase().trim();

                summonerLevel = json[userID].summonerLevel;
                summonerID = json[userID].id;
                summonerAvatar = json[userID].profileIconId;

                document.getElementById("sLevel").innerHTML = "  Nivel: "+ summonerLevel;
                // document.getElementById("sID").innerHTML = "<strong>  " + ID + "</strong>";
                document.getElementById("sAvatar").innerHTML = "<IMG style='float:left; margin:5px 5px 0px 0px' height='100px' width='100px' SRC='http://ddragon.leagueoflegends.com/cdn/6.3.1/img/profileicon/"+summonerAvatar+".png'>";

                summonerLeague(summonerID);
                lastMatch(summonerID);

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("error getting Summoner data1!");
            }
        });
    } else {}
}

function lastMatch(summonerID)
{
    $.ajax({
        url: "https://las.api.pvp.net/api/lol/las/v1.3/game/by-summoner/" + summonerID + "/recent?api_key=" + APIKEY,
        type: 'GET',
        dataType: 'json',
        data: {

        },
        success: function (resp) {

            campeon = resp.games[0].championId;
            fecha = resp.games[0].createDate;
            winlost = resp.games[0].stats['win'];
            spell1 = resp.games[0].spell1;
            spell2 = resp.games[0].spell2;
            item1 = resp.games[0].stats['item0'];
            item2 = resp.games[0].stats['item1'];
            item3 = resp.games[0].stats['item2'];
            item4 = resp.games[0].stats['item3'];
            item5 = resp.games[0].stats['item4'];
            item6 = resp.games[0].stats['item5'];
            trinket = resp.games[0].stats['item6'];
            tipoMatch = resp.games[0].subType;
            tipoMatch= tipoMatch.toLowerCase();
            tipoMatch = tipoMatch.replace(/\_/g,' ');
            tipoMatch = capitalizeFirstLetter(tipoMatch);

            // saber si se gana una partida o no y cambia el color del div
            if (winlost==true)
            {
                document.getElementById("colorWinLoss").style.background = 'green';
                document.getElementById("ganoPerdio").innerHTML = "<strong>Win</strong>";
            }
            else
            {
                document.getElementById("colorWinLoss").style.background = 'red';
                document.getElementById("ganoPerdio").innerHTML = "<strong>Lose</strong>";
            }

            document.getElementById("tipoMatch").innerHTML = tipoMatch;

            //obtencion de la fecha de la ultima partida de lol, lol conchetumare, te pasa la fecha en un formato muy culiao eproch
            championName(campeon);
            var dateVal ="/Date("+fecha+")/";
            var date = new Date( parseFloat( dateVal.substr(6 )));

            document.getElementById("fechaLastMatch").innerHTML =
                date.getDate() + "/" +
                (date.getMonth() + 1) + "/" +
                date.getFullYear() + " " +
                date.getHours() + ":" +
                date.getMinutes();

            //obtencion de la imagen y la descripcion de los summonerSpell utilizando la funcion summoner Spell que esta mas abajo y la id
            //que la obtengo en estra consulta (asi no pregunto denuevo la misma wea)

            summonerSpell(spell1, "spell");
            summonerSpell(spell2, "spell2");
            summonerItems(item1, "item1");
            summonerItems(item2, "item2");
            summonerItems(item3, "item3");
            summonerItems(item4, "item4");
            summonerItems(item5, "item5");
            summonerItems(item6, "item6");
            summonerItems(trinket, "trinket");

        },

        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("error getting Summoner data2!");
        }
    });
}

function championName(id)
{
    $.ajax({
        url: "https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion/" + id + "?api_key=" + APIKEY,
        type: 'GET',
        dataType: 'json',
        data: {

        },
        success: function (resp) {
            var nombre = resp.name;
            nombre = nombre.replace(/\s+/, "");
           document.getElementById("champIMG").innerHTML = "<a href='http://gameinfo.las.leagueoflegends.com/es/game-info/champions/"+ nombre.toLowerCase() +"/' data-toggle='tooltip' title='Click en la imagen para mas informacion sobre " + resp.name + "' target='Champion'><IMG style='float:left; margin:5px 5px 5px 0px' height='50px' width='50px' SRC='http://ddragon.leagueoflegends.com/cdn/6.3.1/img/champion/"+nombre+".png'></a>";

        },

        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("error getting Summoner data2!");
        }
    });
}

function summonerLeague(summonerID)
{
    $.ajax({
        url: "https://las.api.pvp.net/api/lol/las/v2.5/league/by-summoner/" + summonerID + "/entry?api_key=" + APIKEY,
        type: 'GET',
        dataType: 'json',
        data: {

        },
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
        url: "https://global.api.pvp.net/api/lol/static-data/las/v1.2/summoner-spell/"+ spellID + "?spellData=tooltip&api_key=" + APIKEY,
        type: 'GET',
        dataType: 'json',
        data: {

        },

        success: function (resp)
        {
            nombreSpell = resp.key;
            españolSpell = resp.name;
            descripcion = resp.description;
            document.getElementById(divSpell).innerHTML = "<IMG style='float:left' height='25px' width='25px' SRC='http://ddragon.leagueoflegends.com/cdn/6.3.1/img/spell/"+nombreSpell+".png'></a>";
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
            jQuery('#'+divSpell).tipso('update', 'titleContent', "<nombreItem><strong>" + españolSpell + "</strong></nombreItem>");
            jQuery('#'+divSpell).tipso('update', 'content', descripcion);
        },

        error: function (XMLHttpRequest, textStatus, errorThrown)
        {

        }
    });
}

function summonerItems(itemID, divItem)
{

    $.ajax({
        url: "https://global.api.pvp.net/api/lol/static-data/las/v1.2/item/"+ itemID + "?itemData=sanitizedDescription&api_key=" + APIKEY,
        type: 'GET',
        dataType: 'json',
        data: {

        },

        success: function (resp)
        {
            descripcion = resp.description;
            nombre = resp.name;
            document.getElementById(divItem).innerHTML = "<IMG style='float:left' height='25px' width='25px' SRC='http://ddragon.leagueoflegends.com/cdn/6.3.1/img/item/"+ itemID +".png'>";
            $('#'+divItem).tipso({
                speed               : 100,
                titleBackground     : '#000',
                width               : 300,
                maxWidth            : '500',
                animationIn         : 'flipInX',
                animationOut        : 'flipOutX',
                size                : 'default',
                background          : '#000'

            });
            jQuery('#'+divItem).tipso('update', 'titleContent', "<nombreItem><strong>" + nombre + "</strong></nombreItem>");
            jQuery('#'+divItem).tipso('update', 'content', descripcion);

        },

        error: function (XMLHttpRequest, textStatus, errorThrown)
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

        }
    });
}



function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

