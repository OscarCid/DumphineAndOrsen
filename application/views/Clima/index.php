<body>
<div class="container">
    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1" style="margin-bottom: 10px">
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
    <!-- Tabla Ultimo Dato -->
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
                                    <td id="fecha">---</td>
                                </tr>
                                <tr>
                                    <td><strong>Temperatura</strong></td>
                                    <td id="temperatura">---</td>
                                </tr>
                                <tr>
                                    <td><strong>Humedad Relativa</strong></td>
                                    <td id="humedad">---</td>
                                </tr>
                                <tr>
                                    <td><strong>Presión</strong></td>
                                    <td id="presion">---</td>
                                </tr>
                                <tr>
                                    <td><strong>Altitud</strong></td>
                                    <td id="altitud">---</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Grafico Temperatura -->
    <div class="col-md-6 col-xs-12">
        <div id="grafico_temp" style="height: 400px; margin: 0 auto"></div>
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
                chart.series[0].addPoint([point[0], point[1]], true, shift);
                chart.series[1].addPoint([point[0], point[2]], true, shift);
                chart.series[2].addPoint([point[0], point[3]], true, shift);
                chart.xAxis[0].categories.push(point[0]);
                
                // call it again after one second
                setTimeout(requestData, 60000);
            },
            cache: false
        });
    }

    $(document).ready(function() {
        var options = {
            chart: {
                renderTo: 'grafico_temp',
                defaultSeriesType: 'spline',
                events: {
                    load: requestData
                }
            },
            global: {
                useUTC: false
            },
            title: {
                text: 'Temperatura'
            },
            subtitle: {
                text: 'Temperatura de los ultimos 15 Minutos'
            },
            xAxis: {
                categories: [],
                labels: {
                    align: 'center',
                    formatter: function() {
                        return Highcharts.dateFormat('%I:%M %p', Date.parse(this.value +' UTC'));
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Temperatura'
                }
            },

            series: []
        };

        $.getJSON('http://dumphineandorsen.com/Clima/temp_20min', function(json) {
            options.xAxis.categories = json[0]['data'];
            options.series[0] = json[1];
            options.series[1] = json[2];
            options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
    });
</script>
