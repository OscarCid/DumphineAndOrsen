<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Script Validador -->
<script src="<?php echo base_url(); ?>asset/src/validator.js" type="text/javascript"></script>
<!-- Script Especificos para funciones de vista -->
<?php
if ((isset($script)))
{
    foreach ($script as $script)
    {
        echo $script;
        echo "\n";
    }
}
?>