
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
                <form action="<?= base_url('Administrador/actualizaDatosEmp') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <input type="hidden" name="pax" value="1">
                    <div class="card">

                        <div class="card-header">
                            <h2 class="card-title">Datos de la Empresa</h2>
                        </div>
                        
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group form-group-default"> <!-- Nombres -->
                                        <label>Nombre Empresa</label>
                                        <input type="text" name="nombre" value="<?= $emp->nombre ?>" class="form-control" placeholder="Nombre Empresa" required>
                                    </div>

                                    <div class="form-group form-group-default"> <!-- DNI -->
                                        <label>NIF</label>
                                        <input type="text" name="nif" value="<?= $emp->nif ?>" class="form-control" placeholder="NIF" required>
                                    </div>
                                    
                                    <div class="form-group form-group-default"> <!-- Persona contacto 1 -->
                                        <label>Persona de Contacto 1</label>
                                        <input type="text" name="contacto1" value="<?= $emp->contacto1 ?>" class="form-control" placeholder="Persona de contacto" required>
                                    </div>
                                    
                                    <div class="form-group form-group-default"> <!-- Telefono 1 -->
                                        <label>Telefono 1</label>
                                        <input type="text" name="tel1" value="<?= $emp->tel1 ?>" class="form-control" placeholder="Teléfono" required>
                                    </div>

                                    <div class="form-group form-group-default"> <!-- eMail 1 -->
                                        <label>Correo Electrónico 1</label>
                                        <input type="email" name="email1" value="<?= $emp->email1 ?>" class="form-control" placeholder="Correo electronico" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group form-group-default"> <!-- Razon Social -->
                                        <label>Razón Social</label>
                                        <input type="text" name="razonsocial" value="<?= $emp->razonsocial ?>" class="form-control" placeholder="Razón Social" required>
                                    </div>

                                    <div class="form-group form-group-default"> <!-- Nombre corto -->
                                        <label>Nombre Corto</label>
                                        <input type="text" name="nomcorto" value="<?= $emp->nomcorto ?>" class="form-control" placeholder="Nombre Corto" required>
                                    </div>
                                    
                                    <div class="form-group form-group-default"> <!-- Persona contacto 2 -->
                                        <label>Persona de Contacto 2</label>
                                        <input type="text" name="contacto2" value="<?= $emp->contacto2 ?>" class="form-control" placeholder="Persona de contacto">
                                    </div>
                                    
                                    <div class="form-group form-group-default"> <!-- Telefono 2 -->
                                        <label>Telefono 2</label>
                                        <input type="text" name="tel2" value="<?= $emp->tel2 ?>" class="form-control" placeholder="Teléfono">
                                    </div>
                                    
                                    <div class="form-group form-group-default"> <!-- eMail 2 -->
                                        <label>Correo Electrónico 2</label>
                                        <input type="email" name="email2" value="<?= $emp->email2 ?>" class="form-control" placeholder="Correo electronico">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group form-group-default"> <!-- Direccion -->
                                <label>Direccion</label>
                                <input type="text" name="dir" value="<?= $emp->dir ?>" class="form-control" placeholder="Dirección completa, calle, poligono etc...">
                            </div>

                            <div class="row">
                                <div class="col-md-5"> <!-- Población -->
                                    <div class="form-group form-group-default"> 
                                        <label>Población</label>
                                        <input type="text" name="pob" value="<?= $emp->pob ?>" class="form-control" placeholder="Población">
                                    </div>
                                </div>
                                
                                <div class="col-md-5"> <!-- Provincia -->
                                    <div class="form-group form-group-default"> 
                                        <label>Provincia</label>
                                        <input type="text" name="prov" value="<?= $emp->prov ?>" class="form-control" placeholder="Provincia">
                                    </div>
                                </div>

                               <div class="col-md-2"> <!-- CP -->
                                    <div class="form-group form-group-default"> 
                                        <label>CP</label>
                                        <input type="text" name="cp" value="<?= $emp->cp ?>" class="form-control" placeholder="CP">
                                    </div>
                               </div>
                            </div>

                            <div class="input-group"> <!-- Comentario -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Comentario</span>
                                </div>
                                <textarea class="form-control" name="obs" aria-label="With textarea"><?= $emp->obs ?></textarea>
                            </div>

                            <div class="form-group"> <!-- Logo -->
                                <label for="FormControlFile1">Logo de la empresa</label>
                                <input name="archivo" type="file" class="form-control-file">
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


