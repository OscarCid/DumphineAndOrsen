<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Script Validador -->
<script src="<?php echo base_url(); ?>asset/src/validator.js" type="text/javascript"></script>
<!-- Script Especificos para funciones de vista -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-81189401-1', 'auto');
    ga('send', 'pageview');

</script>
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