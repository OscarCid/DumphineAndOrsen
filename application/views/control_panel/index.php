<div class="container-radim">
    <!-- Large modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodal">Large modal</button>

    <div class="modal fade container-radim" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="gridSystemModalLabel">Modificar nombre video</h5>
                </div>
                <div class="modal-body">
                    <form data-toggle="validator" role="form" action='<?php echo base_url(); ?>Youtube/recibirDatos_video' method="post">
                        <div class="form-group">
                            <label for="inputName" class="control-label">Nombre Video</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                data-error="Quieres dejar sin nombre el video? really nigga?"
                                required
                            >
                            <div class="help-block with-errors"></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar Video!</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>