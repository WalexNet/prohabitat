
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
                <form action="<?= base_url('Administrador/actualizaDatos') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <input type="hidden" name="nomcorto" value="<?= $admin->nomcorto ?>">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Datos del Administrador</h2>
                        </div>
                        
                        <div class="card-body">

                            <div class="form-group"> <!-- Nombres -->
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="nombres" value="<?= $admin->nombres ?>" class="form-control" placeholder="Nombres">
                                </div>
                            </div>

                            <div class="form-group"> <!-- Apellidos -->
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="apellidos" value="<?= $admin->apellidos ?>" class="form-control" placeholder="Apellidos">
                                </div>
                            </div>

                            <div class="form-group"> <!-- Nombre corto -->
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="nomcorto" value="<?= $admin->nomcorto ?>" class="form-control text-primary" placeholder="<?= $admin->nomcorto ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group"> <!-- DNI -->
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                    <input type="text" name="dni" value="<?= $admin->dni ?>" class="form-control" placeholder="DNI/NIE/NIF">
                                </div>
                            </div>

                            <div class="form-group"> <!-- Telefono -->
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="fas fa-phone-square"></i>
                                    </span>
                                    <input type="text" name="telefono" value="<?= $admin->telefono ?>" class="form-control" placeholder="Teléfono">
                                </div>
                            </div>

                            <div class="form-group"> <!-- eMail -->
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="fas fa-at"></i>
                                    </span>
                                    <input type="text" name="mail" value="<?= $admin->mail ?>" class="form-control" placeholder="Correo electronico">
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="row">
                                
                                 <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#formPsw">Cambiar Contraseña</button>
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

            <!-- Modal -->
            <div class="modal fade" id="formPsw" tabindex="-1" role="dialog" aria-labelledby="formPsw" aria-hidden="true">
                <form action="<?= base_url('#') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ingrese la nueva Contraseña</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group"> <!-- Contraseña -->
                                    <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="fas fa-passport"></i>
                                            </span>
                                        <input type="password" name="psw" class="form-control" id="txtPassword" placeholder="Password nuevo">
                                    </div>
                                </div>

                                <div class="form-group"> <!-- Contraseña2-->
                                    <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="fas fa-passport"></i>
                                            </span>
                                        <input type="password" name="psw2" class="form-control" id="txtConfirmPassword" placeholder="Repita el Password">
                                    </div>
                            </div>

                            </div>
                            <div class="modal-footer">
                                <button type="Submit" class="btn btn-primary" onclick="return ValidarPsw()">Guardar</button>
                            </div>
                        </div>
                    
                    </div>
                </form>
            </div>            
        </div>
    </div>


