<body>
<div class="container">
    <!-- Tabla Ultimo Dato -->
    <div class="col-md-6 col-xs-12">
        <div>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                La Estación Meteorológica se encuentra en proceso de desarrollo e implementación, no se prometen datos exactos ni en tiempo real
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Información Actual</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Máximas y Mínimas</a></li>
                <li role="presentation"><a href="#acerca" aria-controls="profile" role="tab" data-toggle="tab">Acerca de</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- tab informacion actual -->
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bs-example" data-example-id="bordered-table">
                                        <table class="table table-bordered table-condensed table-responsive">
                                            <tbody>
                                            <tr>
                                                <td><strong>Fecha Ultimo Registro</strong></td>
                                                <td class='text-right' id="fecha">---</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Temperatura</strong></td>
                                                <td class='text-right' id="temperatura">---</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Humedad Relativa</strong></td>
                                                <td class='text-right' id="humedad">---</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Presión</strong></td>
                                                <td class='text-right' id="presion">---</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Altitud</strong></td>
                                                <td class='text-right' id="altitud">---</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab Maximas y minimas -->
                <div role="tabpanel" class="tab-pane" id="profile">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="row">
                                <!-- Selects -->
                                <div class="col-md-4">
                                    <select id="max_min" onchange="max_mix();" class="form-control input-sm">
                                        <option>Maxima</option>
                                        <option>Minima</option>
                                    </select>
                                </div>
                                <div class="col-md-1" style="padding-top: 5px">
                                    de:
                                </div>
                                <div class="col-md-7">
                                    <select id="hoy_ayer" onchange="max_mix();" class="form-control input-sm">
                                        <option>Hoy</option>
                                        <option>Ayer</option>
                                        <option>Anteayer</option>
                                    </select>
                                </div>
                                <!-- Selects FIN-->
                                <div class="col-md-12" style="margin-top: 10px">
                                    <div class="bs-example" data-example-id="bordered-table">
                                        <table class="table table-bordered table-condensed table-responsive">
                                            <tr>
                                                <th id="texto_max_min_fecha"></th>
                                                <th class='text-right'>Hora</th>
                                                <th class='text-right'>Valor</th>
                                            </tr>
                                            <tr>
                                                <td><strong>Temperatura</strong></td>
                                                <td class='text-right' id="m_temperatura_h">---</td>
                                                <td class='text-right' id="m_temperatura">---</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Humedad Relativa</strong></td>
                                                <td class='text-right' id="m_humedad_h">---</td>
                                                <td class='text-right' id="m_humedad">---</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Presión</strong></td>
                                                <td class='text-right' id="m_presion_h">---</td>
                                                <td class='text-right' id="m_presion">---</td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab Maximas y minimas -->
                <div role="tabpanel" class="tab-pane" id="acerca">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 shadow" style="height: 370px; margin: 0 auto" id="about">
                                    <p align="justify">
                                        Hola! Esta estación meteorológica es un proyecto personal creado por aprendizaje y curiosidad.
                                        Esta idea nació a raíz de mi <a href="http://www.meteorologiaupla.cl" target="_blank">tema de tesis</a>, que esta relacionado con el tema de estaciones meteorológicas
                                        y además de la intriga de saber la temperatura del sector, ya que vivo alegado de la urbe y el clima suele variar bastante.
                                    </p>

                                    <p align="justify" style="margin-top: 10px">
                                        La estación meteorológica esta desarrollada a base de una <a href="https://es.wikipedia.org/wiki/Raspberry_Pi" target="_blank">Raspberry Pi</a> (en este caso se utilizo
                                        la version 3).
                                    </p>

                                    <img src="http://cdn2.expertreviews.co.uk/sites/expertreviews/files/styles/article_main_wide_image/public/2016/02/pi_3.jpg?itok=rgJOSeoU"  class="img-responsive" alt="Raspberry Pi 3">

                                    <p align="justify" style="margin-top: 10px">
                                        Los sensores que actualmente se encuentran registrando los distintos datos climatologicos son los siguientes:
                                        <br>
                                    </p>

                                    <table class="table table-bordered table-condensed table-responsive">
                                        <tr>
                                            <th>Sensor</th>
                                            <th>Descripción</th>
                                        </tr>
                                        <tr>
                                            <td><strong><a href="https://www.adafruit.com/product/381" target="_blank">DS18B20</a></strong></td>
                                            <td style="font-size: 11px">
                                                Temperatura principal (Sensor DS18B20, Grafico Temperatura).
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong><a href="https://www.adafruit.com/product/385" target="_blank">DHT22</a></strong></td>
                                            <td style="font-size: 11px">
                                                Humedad (Humedad, Grafico Humedad).<br>
                                                Temperatura (Sensor DHT22, Grafico Temperatura).
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong><a href="https://www.adafruit.com/product/1603" target="_blank">BMP180</a></strong></td>
                                            <td style="font-size: 11px">
                                            Presión (Humedad, Grafico Presión).<br>
                                            Temperatura (Sensor BMP180, Grafico Temperatura).
                                            </td>
                                        </tr>
                                    </table>
                                    <p><strong>Historial</strong></p>
                                    <p align="justify" style="margin-top: 10px">
                                        <strong>9/8/2016: </strong>El sensor DHT11 FUE reemplazado por <strike>Chanta</strike> un Sensor
                                        <a href="https://www.adafruit.com/product/386" target="_blank">DHT22</a> el cual fue adquirido
                                        <a href="http://es.aliexpress.com/item/DHT22-Digital-Temperature-and-Humidity-Sensor-AM2302-Module-PCB-with-Cable-for-Arduino-Free-Shipping-Dropshipping/32243070624.html?spm=2114.13010608.0.68.nJQVcT" target="_blank">AQUI!</a> <br>
                                    </p>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Graficos TABS -->
    <div class="col-md-6 col-xs-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Temperatura" aria-controls="home" role="tab" data-toggle="tab">Temperatura</a></li>
            <li role="presentation"><a href="#Humedad" aria-controls="profile" role="tab" data-toggle="tab">Humedad</a></li>
            <li role="presentation"><a href="#Presion" aria-controls="profile" role="tab" data-toggle="tab">Presión</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- tab temperatura -->
            <div role="tabpanel" class="tab-pane active" id="Temperatura">
                <div id="grafico_temp" style="height: 400px; margin: 0 auto"></div>
            </div>
            <!-- tab humedad -->
            <div role="tabpanel" class="tab-pane" id="Humedad">
                <div id="grafico_hum" style="height: 400px; margin: 0 auto"></div>
            </div>
            <!-- tab presion -->
            <div role="tabpanel" class="tab-pane" id="Presion">
                <div id="grafico_presion" style="height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
    <!-- Propaganda -->
    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1" style="margin-top:  10px">
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

</script>
<script>
    var chart; // global
    var c_humedad; // global
    var c_presion; // global
    
    /**
     * Request data from the server, add it to the graph and set a timeout to request again
     */

    (function($){
        $(window).load(function(){
            $("#about").mCustomScrollbar({
                theme:"dark"
            });
        });
    })(jQuery);
    
    function requestData() {
        $.ajax({
            url: 'http://dumphineandorsen.com/Clima/ultimo_temp',
            success: function(point) {
                var series = chart.series[0],
                    shift = series.data.length > 15; // shift if the series is longer than 20
                // add the point
                chart.series[0].addPoint([point[0], point[1]], true, shift);
                chart.series[1].addPoint([point[0], point[2]], true, shift);
                chart.series[2].addPoint([point[0], point[3]], true, shift);
                chart.xAxis[0].categories.push(point[0]);
                
                // call it again after one second
                setTimeout(requestData, 60000);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
                alert("Problemas obteniendo los ultimos datos de la estacion meteorologica");
            }
        });
    }

    function request() {
        $.ajax({
            url: 'http://dumphineandorsen.com/Clima/ultimo_dato_grafico/humedad',
            success: function(point) {
                var series = c_humedad.series[0],
                    shift = series.data.length > 15; // shift if the series is longer than 20
                // add the point
                c_humedad.series[0].addPoint([point[0], point[1]], true, shift);
                c_humedad.xAxis[0].categories.push(point[0]);

                // call it again after one second
                setTimeout(request, 60000);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
                alert("Problemas obteniendo los ultimos datos de la estacion meteorologica");
            }
        });
    }

    function request_presion() {
        $.ajax({
            url: 'http://dumphineandorsen.com/Clima/ultimo_dato_grafico/presion',
            success: function(point) {
                var series = c_presion.series[0],
                    shift = series.data.length > 15; // shift if the series is longer than 20
                // add the point
                c_presion.series[0].addPoint([point[0], point[1]], true, shift);
                c_presion.xAxis[0].categories.push(point[0]);

                // call it again after one second
                setTimeout(request_presion, 60000);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
                alert("Problemas obteniendo los ultimos datos de la estacion meteorologica");
            }
        });
    }
    
    function max_mix() 
    {
        max_min = document.getElementById("max_min");
        max_min_mayus = max_min.options[max_min.selectedIndex].text;
        max_min = max_min_mayus.toLowerCase().trim();

        hoy_ayer = document.getElementById("hoy_ayer");
        hoy_ayer = hoy_ayer.options[hoy_ayer.selectedIndex].text;
        hoy_ayer = hoy_ayer.toLowerCase().trim();


        $.ajax({
            url: 'http://dumphineandorsen.com/Clima/obtener_maximo/temperatura/'+hoy_ayer+'/'+max_min,
            success: function(json)
            {
                var values = json[0].fecha.split(' ');
                temperatura = json[0].temperatura;

                document.getElementById("texto_max_min_fecha").innerHTML = "<strong><u>"+max_min_mayus+"s del dia: "+ values[0] +"</u></strong>";
                document.getElementById("m_temperatura").innerHTML = temperatura + " °C";
                document.getElementById("m_temperatura_h").innerHTML = values[1];
            },
            cache: false
        });

        $.ajax({
            url: 'http://dumphineandorsen.com/Clima/obtener_maximo/humedad/'+hoy_ayer+'/'+max_min,
            success: function(json)
            {
                var values = json[0].fecha.split(' ');
                humedad = json[0].humedad;
                document.getElementById("m_humedad").innerHTML = humedad + " %";
                document.getElementById("m_humedad_h").innerHTML = values[1];
            },
            cache: false
        });

        $.ajax({
            url: 'http://dumphineandorsen.com/Clima/obtener_maximo/presion/'+hoy_ayer+'/'+max_min,
            success: function(json)
            {
                var values = json[0].fecha.split(' ');
                presion = json[0].presion;
                document.getElementById("m_presion").innerHTML = presion+ " hPa";
                document.getElementById("m_presion_h").innerHTML = values[1];
            },
            cache: false
        });
    }

    $(document).ready(function() {
        actualizar();
        max_mix();

        //grafico temperatura
        var options = {
            chart: {
                renderTo: 'grafico_temp',
                defaultSeriesType: 'line',
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
                        return Highcharts.dateFormat('%H:%M', Date.parse(this.value +' UTC'));
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
        setInterval(function () {
            chart.reflow();
        }, 100);

        /** Grafico Humedad */
        var options_humedad = {
            chart: {
                renderTo: 'grafico_hum',
                defaultSeriesType: 'line',
                events: {
                    load: request
                }
            },
            global: {
                useUTC: false
            },
            title: {
                text: 'Humedad'
            },
            subtitle: {
                text: 'Humedad de los ultimos 15 Minutos'
            },
            xAxis: {
                categories: [],
                labels: {
                    align: 'center',
                    formatter: function() {
                        return Highcharts.dateFormat('%H:%M', Date.parse(this.value +' UTC'));
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Humedad'
                }
            },

            series: []
        };

        $.getJSON('http://dumphineandorsen.com/Clima/graphic_15min/humedad', function(json) {
            options_humedad.xAxis.categories = json[0]['data'];
            options_humedad.series[0] = json[1];
            c_humedad = new Highcharts.Chart(options_humedad);
        });

        setInterval(function () {
            c_humedad.reflow();
        }, 100);

        /** Grafico Presion */
        var options_presion = {
            chart: {
                renderTo: 'grafico_presion',
                defaultSeriesType: 'line',
                events: {
                    load: request_presion
                }
            },
            global: {
                useUTC: false
            },
            title: {
                text: 'Presión'
            },
            subtitle: {
                text: 'Presión de los ultimos 15 Minutos'
            },
            xAxis: {
                categories: [],
                labels: {
                    align: 'center',
                    formatter: function() {
                        return Highcharts.dateFormat('%H:%M', Date.parse(this.value +' UTC'));
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Presión'
                }
            },

            series: []
        };

        $.getJSON('http://dumphineandorsen.com/Clima/graphic_15min/presion', function(json) {
            options_presion.xAxis.categories = json[0]['data'];
            options_presion.series[0] = json[1];
            c_presion = new Highcharts.Chart(options_presion);
        });

        setInterval(function () {
            c_presion.reflow();
        }, 100);
    });
</script>
