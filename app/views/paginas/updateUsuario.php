<?php require RUTA_APP.'/views/inc/header.php'; ?>
<div class="container-fluid">
    <div class="row row-cols-1">
        <div class="col my-1">
            <a class="btn btn-secondary btn-md " href="<?php echo RUTA_URL;?>" role="button"><i class="fa fa-backward"></i>&nbsp;REGRESAR</a>
        </div>
        <div class="col my-1">
            <div class="card card-body bg-light m-auto">
              <form class="row row-cols-1 needs-validation" novalidate action="<?php echo RUTA_URL;?>/paginas/updateUsuario/<?php echo $data['idUsuario'];?>" method="POST">
                <div class="col my-2">
                  <label for="nombre-usuario" class="form-label">Nombre:</label>
                  <input type="text" class="form-control" name="nombre-usuario" id="nombre-usuario" value="<?php echo $data['nombre'];?>" required>
                  <span class="text-muted" id="ayuda-nombre"></span>
                </div>
                <div class="col my-2">
                  <label for="email-usuario" class="form-label">Email:</label>
                  <input type="email" class="form-control" name="email-usuario" id="email-usuario" value="<?php echo $data['email'];?>"  required>
                  <span class="text-muted" id="ayuda-correo"></span>
                </div>
                <div class="col my-2">
                  <label for="telefono-usuario" class="form-label">Telefono:</label>
                  <input type="tel" class="form-control" name="telefono-usuario" id="telefono-usuario" value="<?php echo $data['telefono'];?>"  required>
                  <span class="text-muted" id="ayuda-telefono"></span>
                </div>
                <div class="col my-2">
                  <button class="btn btn-primary form-control" type="submit">EDITAR</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>


<?php require RUTA_APP.'/views/inc/footer.php'; ?>