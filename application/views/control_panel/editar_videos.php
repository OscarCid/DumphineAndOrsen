<div class="container-radim">
    <div class="col-lg-10 col-lg-offset-1">
        <?php if ($this->session->flashdata('category_success')) { ?>
            <div class="alert alert-<?= $this->session->flashdata('tipo_alerta') ?> col-md-4 col-md-offset-4">
                <span class="glyphicon glyphicon-<?= $this->session->flashdata('icono') ?>" aria-hidden="true"></span>
                <?= $this->session->flashdata('category_success') ?>
            </div>
            <script>
                setTimeout(function() {
                    $('.alert').fadeOut('slow');
                }, 5000);
            </script>
        <?php } ?>
        <table class="table table-bordered table-condensed">
            <tr>
                <th>ID Video</th>
                <th>Nombre</th>
                <th>Editar</th>
            </tr>
            <?php
            foreach ($videos->result() as $videos) {
                echo '
                <tr>
                    <td>'.$videos->id_video.'</td>
                    <td>'.$videos->name.'</td>
                    <td>
                        <!-- Parte boton editar inicio -->
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#'.$videos->id_video.'">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </button>
                        <div class="modal fade container-radim" id="'.$videos->id_video.'" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h5 class="modal-title" id="gridSystemModalLabel">Modificar nombre video</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form data-toggle="validator" role="form" action="'.base_url().'control_panel/change_name" method="post">
                                            <div class="form-group">
                                                <label for="inputName" class="control-label">Nombre Video</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="name"
                                                    id="name"
                                                    value="'.$videos->name.'"
                                                    data-error="Quieres dejar sin nombre el video? really nigga?"
                                                    required
                                                >
                                                <input
                                                    type="hidden"
                                                    name="id_video"
                                                    id="id_video"
                                                    value="'.$videos->id_video.'"
                                                >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success btn-sm">Editar Video!</button>
                                    </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- Parte boton editar FIN -->
                        <!-- Parte boton Borrar Inicio -->
                        <a class="btn btn-danger btn-xs" onclick="return confirm(\'Estas seguro que quieres eliminar esta cancion?\')" href="'.site_url().'control_panel/delete_video/'.$videos->id_video.'" role="button">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        <!-- Parte boton Borrar FIN -->
                    </td>
                </tr>
                ';
            }
            ?>
            </tr>
        </table>
    </div>
</div>