
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
                <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Datos de la Aseguradora</h2>
                </div>

                <div class="card-body">

                    <div class="row"> 
                        <div class="col-md-4"> <!-- Col 1 -->
                            <div class="form-group form-group-default"> <!-- Razón Social -->
                                <label class="control-label">Razón Social</label>
                                <p class="form-control-static"><?= $datos->razonsocial ?></p>
                            </div>
                            <div class="form-group form-group-default"> <!-- Nombres -->
                                <label class="control-label">Persona de Contacto 1</label>
                                <p class="form-control-static"><?= $datos->nombres ?></p>
                            </div>
                            <div class="form-group form-group-default"> <!-- Cargo -->
                                <label class="control-label">Cargo</label>
                                <p class="form-control-static"><?= $datos->cargo ?></p>
                            </div>
                        </div>
                        
                        <div class="col-md-4"> <!-- Col 2 -->
                            <div class="form-group form-group-default"> <!-- CIF -->
                                <label class="control-label">CIF</label>
                                <p class="form-control-static"><?= $datos->cif ?></p>
                            </div>
                            <div class="form-group form-group-default"> <!-- Apellidos -->
                                <label class="control-label">Apellidos</label>
                                <p class="form-control-static"><?= $datos->apellidos ?></p>
                            </div>
                            <div class="form-group form-group-default"> <!-- Sector -->
                                <label class="control-label">Sector</label>
                                <p class="form-control-static"><?= $datos->sector ?></p>
                            </div>
                        </div>

                        <div class="col-md-4"> <!-- Col 3 -->
                            <div class="form-group form-group-default"> <!-- eMail -->
                                <label class="control-label">Correo Electrónico</label>
                                <p class="form-control-static"><?= $datos->mail ?></p>
                            </div>
                            <div class="form-group form-group-default"> <!-- Telefono 1 -->
                                <label class="control-label">Telefono 1</label>
                                <p class="form-control-static"><?= $datos->tel1 ?></p>
                            </div>
                            <div class="form-group form-group-default"> <!-- Telefono 2 -->
                                <label class="control-label">Telefono 2</label>
                                <p class="form-control-static"><?= $datos->tel2 ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-default"> <!-- Direccion -->
                        <label class="control-label">Dirección</label>
                        <p class="form-control-static"><?= $datos->dir ?></p>
                    </div>

                    <div class="row"> <!-- Direccion Completa -->
                        <div class="col-md-5"> <!-- Población -->
                            <div class="form-group form-group-default"> 
                                <label class="control-label">Población</label>
                                <p class="form-control-static"><?= $datos->pob ?></p>
                            </div>
                        </div>
                        
                        <div class="col-md-5"> <!-- Provincia -->
                            <div class="form-group form-group-default"> 
                                <label class="control-label">Provincia</label>
                                <p class="form-control-static"><?= $datos->prov ?></p>
                            </div>
                        </div>

                        <div class="col-md-2"> <!-- CP -->
                            <div class="form-group form-group-default"> 
                                <label class="control-label">CP</label>
                                <p class="form-control-static"><?= $datos->cp ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-default"> <!-- Comentario -->
                        <label class="control-label">Comentario:</label>
                        <p class="form-control-static"><?= $datos->comentario ?></p>
                    </div>

                </div>

                <div class="card-footer"> <!-- Botones -->
                    <div class="row"> 
                        <div class="col-md-6"> <!-- Boton Guardar -->
                            <a href="<?= base_url('Profesional/editar/'.$datos->id) ?>">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </a>
                        </div>

                        <div class="col-md-6"> <!-- Boton Cancelar --> 
                            <a href="<?= base_url('Profesional') ?>" class="pull-right"> 
                                <button type="button" class="btn btn-warning">Cancelar</button>
                            </a>
                        </div>
                    </div>
                </div>
                </div>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


