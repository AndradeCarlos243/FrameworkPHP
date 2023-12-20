<?php require RUTA_APP.'/views/inc/header.php'; ?>

<div class="container-fluid p-2">
    <div class="row row-cols-1">
        <div class="col table-responsive">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>TELEFONO</th>
                    <th>OPCIONES</th>
                </thead>
                <tbody>
                    <?php foreach($data['usuarios'] as $usuario) :?>
                    <tr>
                        <td><?php echo $usuario->idUsuario;?></td>
                        <td><?php echo $usuario->nombre;?></td>
                        <td><?php echo $usuario->email;?></td>
                        <td><?php echo $usuario->telefono;?></td>
                        <td>
                            <a class="btn btn-primary btn-sm " href="<?php echo RUTA_URL;?>/paginas/updateUsuario/<?php echo $usuario->idUsuario;?>" role="button">
                                EDITAR
                            </a>
                            <a class="btn btn-primary btn-sm " href="<?php echo RUTA_URL;?>/paginas/deleteUsuario/<?php echo $usuario->idUsuario;?>" role="button">
                                BORRAR
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require RUTA_APP.'/views/inc/footer.php'; ?>