<div class="container-radim">
    <div class="col-lg-10 col-lg-offset-1">
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
                        <a class="btn btn-primary btn-xs" href="#" role="button">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-danger btn-xs" onclick="return confirm(\'Estas seguro que quieres eliminar esta cancion?\')" href="'.site_url().'control_panel/delete_video/'.$videos->id_video.'" role="button">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
                ';
            }
            ?>
            </tr>
        </table>
    </div>
</div>