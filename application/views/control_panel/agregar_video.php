<div class="container-radim">
    <div id="contenedorPlayer" class="col-md-8 col-md-offset-2">
        <div class="bs-component">
            <form data-toggle="validator" role="form" action='<?php echo base_url(); ?>Youtube/recibirDatos_video' method="post">
                <div class="form-group">
                    <label for="inputName" class="control-label">URL</label>
                    <input
                        type="text"
                        class="form-control"
                        name="id_video"
                        id="id_video"
                        data-error="Really Nigga, quieres enviar nada?"
                        placeholder="Pega la URL del video aqui!"
                        required
                    >
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Agregar Video!</button>
                </div>
            </form>
        </div>
</div>