
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
                <form action="<?= base_url('Administrador/actualizaDatosEmp') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <input type="hidden" name="pax" value="1">
                    <div class="card">

                        <div class="card-header">
                            <h2 class="card-title">Datos de la Empresa</h2>
                        </div>
                        
                        <div class="card-body">

                            <div class="form-group form-group-default"> <!-- Nombres -->
                                <label>Nombre Empresa</label>
                                <input type="text" name="nombre" value="<?= $emp->nombres ?>" class="form-control" placeholder="Nombre Empresa">
                            </div>

                            <div class="form-group form-group-default"> <!-- Razon Social -->
                                <label>Razon Social</label>
                                <input type="text" name="apellido" value="<?= $emp->apellidos ?>" class="form-control" placeholder="Razón Social">
                            </div>

                            <div class="form-group form-group-default"> <!-- Nombre corto -->
                                <label>Nombre Corto</label>
                                <input type="text" name="nick" value="<?= $emp->nick ?>" class="form-control" placeholder="Nombre Corto">
                            </div>

                            <div class="form-group form-group-default"> <!-- DNI -->
                                <label>NIF</label>
                                <input type="text" name="dni" value="<?= $emp->dni ?>" class="form-control" placeholder="NIF">
                            </div>

                            <div class="form-group form-group-default"> <!-- Telefono -->
                                <label>Telefono</label>
                                <input type="text" name="telefono" value="<?= $emp->telefono ?>" class="form-control" placeholder="Teléfono">
                            </div>

                            <div class="form-group form-group-default"> <!-- eMail -->
                                <label>Correo Electrónico</label>
                                <input type="text" name="mail" value="<?= $emp->mail ?>" class="form-control" placeholder="Correo electronico">
                            </div>

                            <div class="input-group"> <!-- Comentario -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Comentario</span>
                                </div>
                                <textarea class="form-control" name="comentario" aria-label="With textarea"><?= $emp->comentario ?></textarea>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                </div>

                                <div class="col-md-6">
                                    <a href="<?= base_url('Inicio') ?>" class="pull-right"> 
                                        <button type="button" class="btn btn-warning">Cancelar</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    
                    </div>
                </form>
            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


