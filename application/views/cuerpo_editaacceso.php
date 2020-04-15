
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            <?php if($editar): ?> 
            <form role="form" action="<?= base_url('Gestaccesos/modificaficha') ?>" method="POST"> <!-- Formulario --> 
            <input type="hidden" name="id" value="<?= $consulta->id ?>">
            <?php endif;?>
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Técnico:  </h2>
                        <span><?= $consulta->nombres.' '.$consulta->apellidos ?></span>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

    <?php if($editar): ?> <!-- Si editamos mostramos los campos de edicion -->


                                <div class="col-md-12"> <!-- Nombres -->
                                    <div class="form-group form-group-default">
                                        <label>Nombres</label>
                                        <input type="text" name="nombres" value="<?= $consulta->nombres ?>" class="form-control" placeholder="Nombres" required>
                                    </div>
                                </div>
                                    
                                <div class="col-md-12"> <!-- Apellidos -->
                                    <div class="form-group form-group-default">
                                        <label>Apellidos</label>
                                        <input type="text" name="apellidos" value="<?= $consulta->apellidos ?>" class="form-control" placeholder="Apellidos" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-12"> <!-- DNI -->
                                    <div class="form-group form-group-default">
                                        <label>DNI</label>
                                        <input type="text" name="dni" value="<?= $consulta->dni ?>" class="form-control" placeholder="Rellene con el DNI o NIE" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-12"> <!-- Telefono -->
                                    <div class="form-group form-group-default">
                                        <label>Telefono</label>
                                        <input  type="text" name="telefono" value="<?= $consulta->telefono ?>" class="form-control" placeholder="Telefono" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-12"> <!-- Nombre Corto -->
                                    <div class="form-group form-group-default">
                                        <label>Nombre Corto</label>
                                        <input type="text" name="nomcorto" value="<?= $consulta->nomcorto ?>" class="form-control" placeholder="Nombre Corto" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-12"> <!-- mail -->
                                    <div class="form-group form-group-default">
                                        <label>Mail</label>
                                        <input type="email" name="mail" value="<?= $consulta->mail ?>" class="form-control"  placeholder="Ingrese el mail" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12"> <!-- Notas -->
                                    <div class="form-group form-group-default">
                                        <label>Notas</label>
                                        <textarea class="form-control" name="comentario" placeholder="Escriba aqui sus Notas" rows="5"><?= $consulta->comentario ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="<?= base_url('Gestaccesos') ?>"><button type="button" class="btn btn-danger" >Cerrar</button></a>
                                </div>
                            </form> <!-- fin del formulario -->

    <?php else: ?> <!-- Si NO, solo mostramos texto estático -->


                                <div class="col-md-12"> <!-- Nombres -->
                                    <div class="form-group form-group-default">
                                        <label class="control-label">Nombres</label>
                                        <p class="form-control-static"><?= $consulta->nombres ?></p>
                                    </div>
                                </div>

                                <div class="col-md-12"> <!-- Apellidos -->
                                    <div class="form-group form-group-default">
                                        <label class="control-label">Apellidos</label> 
                                        <p class="form-control-static"><?= $consulta->apellidos ?></p> 
                                    </div>
                                </div>
                                
                                <div class="col-md-12"> <!-- DNI -->
                                    <div class="form-group form-group-default">
                                        <label class="control-label">DNI</label>
                                        <p class="form-control-static"><?= $consulta->dni ?></p>
                                    </div>
                                </div>
                                
                                <div class="col-md-12"> <!-- Telefono -->
                                    <div class="form-group form-group-default">
                                        <label class="control-label">Telefono</label>
                                        <p class="form-control-static"><?= $consulta->telefono ?></p>
                                    </div>
                                </div>
                                
                                <div class="col-md-12"> <!-- Nombre Corto -->
                                    <div class="form-group form-group-default">
                                        <label class="control-label">Nombre Corto</label>
                                        <p class="form-control-static"><?= $consulta->nomcorto ?></p>
                                    </div>
                                </div>
                                
                                <div class="col-md-12"> <!-- mail -->
                                    <div class="form-group form-group-default">
                                        <label class="control-label">Mail</label>
                                        <p class="form-control-static"><?= $consulta->mail ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> <!-- Notas y Botones de cerrar y modificar -->
                                <div class="col-md-12"> <!-- Notas -->
                                    <div class="form-group form-group-default">
                                        <label class="control-label">Notas</label>
                                        <p class="form-control-static"><?= $consulta->comentario ?></p>
                                    </div>
                                    <a href="<?= base_url("Gestaccesos/editar/$consulta->id") ?>"><button type="button" class="btn btn-secondary" >Editar</button></a>
                                    <a href="<?= base_url('Gestaccesos') ?>"><button type="button" class="btn btn-danger" >Cerrar</button></a>
                                </div>



    <?php endif; ?>

                                

                                <div class="card"> <!-- Perfiles de Usuario -->
                                    <div class="card-header">
                                        <h4 class="card-title">Perfiles de Usuario y contraseña</h4>
                                        <div class="row">
                                            <div class="col-md-3">USR</div>
                                            <div class="col-md-5">PERFIL</div>
                                            <div class="col-md-4">ACCION</div>
                                        </div>
                                    </div>
                                    <div class="card-body"> <!-- Mostramos los perfiles -->
                                        <?php foreach($perfil as $fila): ?>
                                        <div class="row">
                                            <div class="col-md-3"><p class="text-white"><?= $fila->nomusr ?></p></div>
                                            <div class="col-md-5"><p><?= $fila->descnivel ?></p></div>
                                            <div class="col-md-4">

                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar">
                                                    <a href="<?= base_url("Gestaccesos/bajaperfil/$fila->id/$consulta->id")?>"onclick="return confirmar('Realmente desea ELIMINAR este Perfil?')"><i class="fa fa-times"></i></a>
                                                </button>

                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <!-- Si editamos Usuario o tecnico no editamos perfil solo cuando mostramos ficha-->
                                    <?php if(!$editar): ?>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-round ml-auto mb-3" data-toggle="modal" data-target="#addForm" >
                                        <i class="fa fa-plus"></i>Perfil</button>
                                    </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            
            </div> <!-- Fin del div del cuerpo principal -->


            <!-- Modal Formulario-->
            <div class="modal fade" id="addForm" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                    Nuevo
                                </span>
                                <span class="fw-light">
                                    Perfil
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Perfil</p>

                            <form role="form" action="<?= base_url('Gestaccesos/altaperfil') ?>" method="POST"> <!-- Formulario --> 
                            <input type="hidden" name="id" value="<?= $consulta->id ?>">

                                <div class="row">
                                    <div class="col-md-12"> <!-- Nombre Usuario -->
                                        <div class="form-group form-group-default">
                                            <label>Nombre de Usuario</label>
                                            <input type="text" name="nomusr" class="form-control" placeholder="Nombe Usuario" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12"> <!-- psw1 -->
                                        <div class="form-group form-group-default">
                                            <label>Contraseña</label>
                                            <input type="password" name="psw" id="txtPassword" class="form-control" placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12"> <!-- psw1 -->
                                        <div class="form-group form-group-default">
                                            <label>Repita la contraseña</label>
                                            <input type="password" name="psw2" id="txtConfirmPassword" class="form-control" placeholder="Repita la contraseña" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12"> <!-- Nivel de Acceso -->
                                        <div class="form-group form-group-default">
                                            <label for="formControlSelect">Seleccione nivel de acceso</label>
                                            <select name="nivel" class="form-control" id="formControlSelect">
                                                <option value="0">ADMINISTRADOR</option>
                                                <option value="1">TECNICO</option>
                                                <option value="2" selected>OFICINA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer no-bd">
                                    <button type="submit" class="btn btn-primary" onclick="return ValidarPsw()">A&ntilde;adir</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form> <!-- fin del formulario -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


