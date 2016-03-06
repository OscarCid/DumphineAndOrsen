<div class="container">
    <div class="menu">
        <ul id="tabs" class="nav nav-tabs " data-tabs="tabs">
            <li class="active"><a href="#red" data-toggle="tab">RESUMEN</a></li>
            <li><a href="#orange" data-toggle="tab">LOGROS</a></li>
            <li><a href="#yellow" data-toggle="tab">ESTADÍSTICAS</a></li>
            <li><a href="#green" data-toggle="tab">VEHÍCULOS</a></li>
        </ul>
    </div>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="red">
            <h1>Red</h1>
            <p>red red red red red red</p>
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

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#tabs').tab();
        });
    </script>
</div>