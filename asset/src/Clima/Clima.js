/**
 * Created by Orsen on 05/06/2016.
 */
function actualizar()
{
    $.ajax({
        url: 'http://dumphineandorsen.com/Clima/ultimo_dato',
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function (json)
        {
            fecha = json[0].fecha;
            temperatura = json[0].temperatura;

            document.getElementById("fecha").style.background = fecha;
            document.getElementById("temperatura").innerHTML = temperatura;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            alert("Problemas obteniendo los ultimos datos de la estacion meteorologica");
        }
    });
}

window.setInterval(function(){
   actualizar();
}, 5000);