
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            <?php if($edita):?> <!-- Formulario de edición -->
                <form action="<?= base_url('Aseguradora/editaAseguradora') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <!-- <input type="hidden" name="pax" value="1"> -->
                        <div class="card">

                            <div class="card-header">
                                <h2 class="card-title">Datos de la Aseguradora</h2>
                            </div>
                            
                            <div class="card-body">

                                <div class="row"> 
                                    <div class="col-md-4"> <!-- Col 1 -->
                                        <div class="form-group form-group-default"> <!-- Propietario -->
                                            <label>Nombre Propietario</label>
                                            <input type="text" name="propietario" value="<?= $datos->propietario ?>" class="form-control" placeholder="Nombre propietario" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Persona contacto 1 -->
                                            <label>Persona de Contacto 1</label>
                                            <input type="text" name="contacto1" value="<?= $datos->contacto1 ?>" class="form-control" placeholder="Persona de contacto Principal" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Persona contacto 2 -->
                                            <label>Persona de Contacto 2</label>
                                            <input type="text" name="contacto2" value="<?= $datos->contacto2 ?>" class="form-control" placeholder="Persona de contacto">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4"> <!-- Col 2 -->
                                        <div class="form-group form-group-default"> <!-- Titular -->
                                            <label>Titular</label>
                                            <input type="text" name="titular" value="<?= $datos->titular ?>" class="form-control" placeholder="Nombre titular" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Telefono 1 -->
                                            <label>Telefono 1</label>
                                            <input type="text" name="tel1" value="<?= $datos->tel1 ?>" class="form-control" placeholder="Teléfono" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Telefono 2 -->
                                            <label>Telefono 2</label>
                                            <input type="text" name="tel2" value="<?= $datos->tel2 ?>" class="form-control" placeholder="Teléfono">
                                        </div>
                                    </div>

                                    <div class="col-md-4"> <!-- Col 3 -->
                                        <div class="form-group form-group-default"> <!-- Compañía -->
                                            <label>Compañía</label>
                                            <input type="text" name="compania" value="<?= $datos->compania ?>" class="form-control" placeholder="Nombre Compañía" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- eMail 1 -->
                                            <label>Correo Electrónico 1</label>
                                            <input type="email" name="email1" value="<?= $datos->email1 ?>" class="form-control" placeholder="Correo electronico" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- eMail 2 -->
                                            <label>Correo Electrónico 2</label>
                                            <input type="email" name="email2" value="<?= $datos->email2 ?>" class="form-control" placeholder="Correo electronico">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-group-default"> <!-- Direccion -->
                                    <label>Direccion</label>
                                    <input type="text" name="dir" value="<?= $datos->dir ?>" class="form-control" placeholder="Dirección completa, calle, poligono etc...">
                                </div>

                                <div class="row"> <!-- Direccion Completa -->
                                    <div class="col-md-5"> <!-- Población -->
                                        <div class="form-group form-group-default"> 
                                            <label>Población</label>
                                            <input type="text" name="pob" value="<?= $datos->pob ?>" class="form-control" placeholder="Población">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-5"> <!-- Provincia -->
                                        <div class="form-group form-group-default"> 
                                            <label>Provincia</label>
                                            <input type="text" name="prov" value="<?= $datos->prov ?>" class="form-control" placeholder="Provincia">
                                        </div>
                                    </div>

                                    <div class="col-md-2"> <!-- CP -->
                                        <div class="form-group form-group-default"> 
                                            <label>CP</label>
                                            <input type="text" name="cp" value="<?= $datos->cp ?>" class="form-control" placeholder="CP">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group"> <!-- Comentario -->
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Comentario</span>
                                    </div>
                                    <textarea class="form-control" name="obs" aria-label="With textarea"><?= $datos->obs ?></textarea>
                                </div>

                            </div>

                            <div class="card-footer"> <!-- Botones -->
                                <div class="row"> 
                                    <div class="col-md-6"> <!-- Boton Guardar -->
                                        <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    </div>

                                    <div class="col-md-6"> <!-- Boton Cancelar --> 
                                        <a href="<?= base_url('Aseguradora') ?>" class="pull-right"> 
                                            <button type="button" class="btn btn-warning">Cancelar</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        
                        </div>
                </form>
            <?php else: ?> <!-- Formulario de Alta --> 
                <form action="<?= base_url('Aseguradora/anadeAseguradora') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <!-- <input type="hidden" name="pax" value="1"> -->
                        <div class="card">

                            <div class="card-header">
                                <h2 class="card-title">Datos de la Aseguradora</h2>
                            </div>
                            
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4"> <!-- Col 1 -->
                                        <div class="form-group form-group-default"> <!-- Propietario -->
                                            <label>Nombre Propietario</label>
                                            <input type="text" name="propietario" class="form-control" placeholder="Nombre propietario" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Persona contacto 1 -->
                                            <label>Persona de Contacto 1</label>
                                            <input type="text" name="contacto1" class="form-control" placeholder="Persona de contacto principal">
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Persona contacto 2 -->
                                            <label>Persona de Contacto 2</label>
                                            <input type="text" name="contacto2" class="form-control" placeholder="Persona de contacto">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4"> <!-- Col 2 -->
                                        <div class="form-group form-group-default"> <!-- Titular -->
                                            <label>Titular</label>
                                            <input type="text" name="titular" class="form-control" placeholder="Nombre titular" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Telefono 1 -->
                                            <label>Telefono 1</label>
                                            <input type="text" name="tel1" class="form-control" placeholder="Teléfono" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Telefono 2 -->
                                            <label>Telefono 2</label>
                                            <input type="text" name="tel2" class="form-control" placeholder="Teléfono">
                                        </div>
                                    </div>

                                    <div class="col-md-4"> <!-- Col 3 -->
                                        <div class="form-group form-group-default"> <!-- Compañía -->
                                            <label>Compañía</label>
                                            <input type="text" name="compania" class="form-control" placeholder="Nombre Compañía" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- eMail 1 -->
                                            <label>Correo Electrónico 1</label>
                                            <input type="email" name="email1" class="form-control" placeholder="Correo electronico" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- eMail 2 -->
                                            <label>Correo Electrónico 2</label>
                                            <input type="email" name="email2" class="form-control" placeholder="Correo electronico">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-group-default"> <!-- Direccion -->
                                    <label>Direccion</label>
                                    <input type="text" name="dir" class="form-control" placeholder="Dirección completa, calle, poligono etc...">
                                </div>

                                <div class="row"> <!-- Direccion completa -->
                                    <div class="col-md-5"> <!-- Población -->
                                        <div class="form-group form-group-default"> 
                                            <label>Población</label>
                                            <input type="text" name="pob" class="form-control" placeholder="Población">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-5"> <!-- Provincia -->
                                        <div class="form-group form-group-default"> 
                                            <label>Provincia</label>
                                            <input type="text" name="prov" class="form-control" placeholder="Provincia">
                                        </div>
                                    </div>

                                    <div class="col-md-2"> <!-- CP -->
                                        <div class="form-group form-group-default"> 
                                            <label>CP</label>
                                            <input type="text" name="cp" class="form-control" placeholder="CP">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group"> <!-- Comentario -->
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Comentario</span>
                                    </div>
                                    <textarea class="form-control" name="obs" aria-label="With textarea"></textarea>
                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    </div>

                                    <div class="col-md-6">
                                        <a href="<?= base_url('Aseguradora') ?>" class="pull-right"> 
                                            <button type="button" class="btn btn-warning">Cancelar</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        
                        </div>
                </form>
            <?php endif ?>
            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


