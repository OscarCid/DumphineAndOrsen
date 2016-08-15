<!DOCTYPE html>
<?php header("Access-Control-Allow-Origin: *"); ?>
<html lang="es">
<head>
    <title><?php if ((isset($titulo)))
        {
            echo "D&O | ".$titulo;
        }
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/src/estilo_navbar.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>asset/jquery-1.12.0.js" type="text/javascript"></script>
    <!-- Estilos Especificos para funciones de vista -->
    <?php
    if ((isset($style)))
    {
        foreach ($style as $style)
        {
            echo $style;
            echo "\n";
        }
    }
    ?>
</head>
