<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>/asset/jquery-1.12.0.js" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>/asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Script Validador -->
<script src="<?php echo base_url(); ?>asset/src/validator.js" type="text/javascript"></script>
<?php
foreach ($script as $script)
{
    echo $script;
}
?>
