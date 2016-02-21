<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Dumphine & Orsen</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="menu_lol" class=""><a href="<?php echo site_url('/LoL'); ?>">League of Legends<span class="sr-only">(current)</span></a></li>
                <li id="menu_youtube"><a href="<?php echo site_url('/Youtube'); ?>">Youtube</a></li>
            </ul>
            <button type="button" class="btn btn-success navbar-btn pull-right">Sign in</button>
        </div>
    </div>
</nav>