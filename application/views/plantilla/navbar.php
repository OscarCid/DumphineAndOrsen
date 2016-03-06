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
                <li id="menu_lol"><a href="<?php echo site_url('/LoL'); ?>">League of Legends<span class="sr-only">(current)</span></a></li>
                <li id="menu_youtube"><a href="<?php echo site_url('/Youtube'); ?>">Youtube</a></li>
                <li id="menu_wot"><a href="<?php echo site_url('/WoT'); ?>">World of Tank</a></li>
            </ul>
            <!-- Single button -->
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($username))
                {
                    echo ' <a href="'.site_url('/control_panel').'" class="btn btn-primary btn-xs navbar-btn" role="button">Control Panel</a>';
                    echo ' <a href="'.site_url('/verifylogin/logout').'" class="btn btn-danger btn-xs navbar-btn" role="button">Logout</a>';
                    echo ' <p class="navbar-text nick">Hola '.$username.'</p>';
                }
                else
                {
                echo '
                 <li class="dropdown">
                    <button type="button" class="btn btn-success navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ingresa <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu cuadro">
                        <li>
                            '.validation_errors().'
                            <form data-toggle="validator" role="form" action="'.site_url('/verifylogin').'" method="post">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">Usuario</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="username"
                                        id="user"
                                        data-error="Ingresa tu usuario!!"
                                        placeholder="User"
                                        required
                                    >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="control-label">Contraseña</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        id="password"
                                        data-error="Ingresa tu contraseña!!!"
                                        placeholder="Password"
                                        required
                                    >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Ingresa</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>';
                } ?>
            </ul>
        </div>
    </div>
</nav>