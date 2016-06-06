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
            humedad = json[0].humedad;
            presion = json[0].presion;
            altitud = json[0].altitud;

            document.getElementById("fecha").innerHTML = fecha;
            document.getElementById("temperatura").innerHTML = temperatura;
            document.getElementById("humedad").innerHTML = humedad;
            document.getElementById("altitud").innerHTML = altitud;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            alert("Problemas obteniendo los ultimos datos de la estacion meteorologica");
        }
    });
}

window.setInterval(function(){
   actualizar();
}, 60000);

$(window).load(function () {
    // Una vez se cargue al completo la página desaparecerá el div "cargando"
    actualizar();
});