<body>
<div class="container">
    <div class="col-md-6 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Información Actual</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bs-example" data-example-id="bordered-table">
                            <table class="table table-bordered table-condensed table-responsive">
                                <tbody>
                                <tr>
                                    <td><strong>Fecha Ultimo Registro</strong></td>
                                    <td id="fecha">7.9 °C</td>
                                </tr>
                                <tr>
                                    <td><strong>Temperatura</strong></td>
                                    <td id="temperatura">7.9 °C</td>
                                </tr>
                                <tr>
                                    <td><strong>Humedad Relativa</strong></td>
                                    <td id="humedad">89 %</td>
                                </tr>
                                <tr>
                                    <td><strong>Presión</strong></td>
                                    <td id="presion">89 %</td>
                                </tr>
                                <tr>
                                    <td><strong>Altitud</strong></td>
                                    <td id="altitud">89 %</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div id="container" style="height: 400px; margin: 0 auto"></div>
    </div>
</div>
</body>
<script>
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
                document.getElementById("temperatura").innerHTML = temperatura + " °C";
                document.getElementById("humedad").innerHTML = humedad + " %";
                document.getElementById("altitud").innerHTML = altitud + " mts";
                document.getElementById("presion").innerHTML = presion + " hPa";
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
</script>
<script>
    var chart; // global

    /**
     * Request data from the server, add it to the graph and set a timeout to request again
     */
    function requestData() {
        $.ajax({
            url: 'http://dumphineandorsen.com/Clima/ultimo_temp',
            success: function(point) {
                var series = chart.series[0],
                    shift = series.data.length > 20; // shift if the series is longer than 20

                // add the point
                chart.series[0].addPoint(eval(point), true, shift);

                // call it again after one second
                setTimeout(requestData, 1000);
            },
            cache: false
        });
    }

    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                defaultSeriesType: 'spline',
                events: {
                    load: requestData
                }
            },
            title: {
                text: 'Live random data'
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150,
                maxZoom: 20 * 1000
            },
            yAxis: {
                minPadding: 0.2,
                maxPadding: 0.2,
                title: {
                    text: 'Value',
                    margin: 80
                }
            },
            series: [{
                name: 'Random data',
                data: []
            }]
        });
    });
</script>