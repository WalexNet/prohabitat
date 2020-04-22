
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
            <?php if($edita):?> <!-- Formulario de edición -->
                <form action="<?= base_url('Profesional/editaProfesional') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <input type="hidden" name="id" value="<?= $datos->id ?>">
                        <div class="card">

                            <div class="card-header">
                                <h2 class="card-title">Datos de la Profesional</h2>
                            </div>
                            
                            <div class="card-body">

                                <div class="row"> 
                                    <div class="col-md-4"> <!-- Col 1 -->
                                        <div class="form-group form-group-default"> <!-- Razon Social -->
                                            <label>Razón Social</label>
                                            <input type="text" name="razonsocial" value="<?= $datos->razonsocial ?>" class="form-control" placeholder="Razón Social" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Nombres -->
                                            <label>Nombres</label>
                                            <input type="text" name="nombres" value="<?= $datos->nombres ?>" class="form-control" placeholder="Nombre titular" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Cargo-->
                                            <label>Cargo en la Empresa</label>
                                            <input type="text" name="cargo" value="<?= $datos->cargo ?>" class="form-control" placeholder="Cargo que desempeña en la empresa" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4"> <!-- Col 2 -->
                                        <div class="form-group form-group-default"> <!-- CIF -->
                                            <label>CIF</label>
                                            <input type="text" name="cif" value="<?= $datos->cif ?>" class="form-control" placeholder="CIF" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Apellidos -->
                                            <label>Apellidos</label>
                                            <input type="text" name="apellidos" value="<?= $datos->apellidos ?>" class="form-control" placeholder="Apellidos titular" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Sector -->
                                            <label>Sector</label>
                                            <select class="form-control" name="idsector">
                                                <?php foreach($sector as $linea): ?>
                                                    <option value="<?= $linea->id ?>"<?= ($linea->id == $datos->idsector) ? 'selected' : ''  ?>><?= $linea->des ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-4"> <!-- Col 3 -->
                                        <div class="form-group form-group-default"> <!-- eMail -->
                                            <label>Correo Electrónico</label>
                                            <input type="email" name="mail" value="<?= $datos->mail ?>" class="form-control" placeholder="Correo electronico" required>
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
                                </div>

                                <div class="form-group form-group-default"> <!-- Direccion -->
                                    <label>Dirección</label>
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
                                    <textarea class="form-control" name="comentario" aria-label="With textarea"><?= $datos->comentario ?></textarea>
                                </div>

                            </div>

                            <div class="card-footer"> <!-- Botones -->
                                <div class="row"> 
                                    <div class="col-md-6"> <!-- Boton Guardar -->
                                        <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    </div>

                                    <div class="col-md-6"> <!-- Boton Cancelar --> 
                                        <a href="<?= base_url('Profesional') ?>" class="pull-right"> 
                                            <button type="button" class="btn btn-warning">Cancelar</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        
                        </div>
                </form>
            <?php else: ?> <!-- Formulario de Alta --> 
                <form action="<?= base_url('Profesional/altaProfesional') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <!-- <input type="hidden" name="pax" value="1"> -->
                        <div class="card">

                            <div class="card-header">
                                <h2 class="card-title">Datos de la Profesional</h2>
                            </div>
                            
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4"> <!-- Col 1 -->
                                        <div class="form-group form-group-default"> <!-- Razón Social  -->
                                            <label>Razón Social</label>
                                            <input type="text" name="razonsocial" class="form-control" placeholder="Razón Social" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- nombres -->
                                            <label>nombres</label>
                                            <input type="text" name="nombres" class="form-control" placeholder="Nombre titular" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Cargo -->
                                            <label>Cargo</label>
                                            <input type="text" name="cargo" class="form-control" placeholder="Cargo que desempeña en la empresa">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4"> <!-- Col 2 -->
                                        <div class="form-group form-group-default"> <!-- CIF -->
                                            <label>CIF</label>
                                            <input type="text" name="cif" class="form-control" placeholder="CIF">
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Apellidos -->
                                            <label>Apellidos</label>
                                            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos titular" required>
                                        </div>
                                        <div class="form-group form-group-default"> <!-- Sector -->
                                            <label>Sector</label>
                                            <select class="form-control" name="idsector">
                                                <?php foreach($sector as $linea): ?>
                                                    <option value="<?= $linea->id ?>"><?= $linea->des ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4"> <!-- Col 3 -->
                                        <div class="form-group form-group-default"> <!-- eMail -->
                                            <label>Correo Electrónico</label>
                                            <input type="email" name="mail" class="form-control" placeholder="Correo electronico" required>
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
                                </div>

                                <div class="form-group form-group-default"> <!-- Direccion -->
                                    <label>Dirección</label>
                                    <input type="text" name="dir" class="form-control" placeholder="Dirección completa, calle, poligono etc...">
                                </div>

                                <div class="row"> <!-- Direccion completa -->
                                    
                                    <div class="col-md-5"> <!-- Provincia -->
                                        <div class="form-group form-group-default"> 
                                            <label>Provincia</label>
                                            <input type="text" name="prov" class="form-control" placeholder="Provincia">
                                        </div>
                                    </div>
                                    <div class="col-md-5"> <!-- Población -->
                                        <div class="form-group form-group-default"> 
                                            <label>Población</label>
                                            <input type="text" name="pob" class="form-control" placeholder="Población">
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
                                    <textarea class="form-control" name="comentario" aria-label="With textarea"></textarea>
                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    </div>

                                    <div class="col-md-6">
                                        <a href="<?= base_url('Profesional') ?>" class="pull-right"> 
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


