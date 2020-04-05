                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            

                <?php if ($estado == 'ALTA'): ?>
                    <div class="card"> <!-- Formulario Alta -->
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="card-title">Ingresos</h2>
                                </div>
                                <div class="col-sm-6">
                                    <h3 class="card-title">
                                        <span class="fw-mediumbold">
                                            Usuario:
                                        </span>
                                        <span class="fw-light">
                                            <?= $datos_ficha->nomape; ?>
                                        </span>    
                                    </h3>
                                </div>
                            </div>
                            
                        </div>

                        <form role="form" action="<?= base_url()?>Entsal/alta" method="POST"> <!-- Formulario --> 
                        <input type="hidden"  name="idusuario" value="<?= $datos_ficha->idinqui ?>"> 

                        <div class="card-body"> <!-- Datos Formulario -->
                            <div class="row">
                                <div class="col-md-12"> <!-- Pisos -->
                                    <div class="form-group form-group-default">
                                        <label>Piso</label>
                                        <select class="form-control" name="idpiso">
                                        <?php foreach ($pisos->result() as $regedi): ?>
                                            <option value="<?= $regedi->id; ?>" ><?= $regedi->nom_edificio; ?>, <?= $regedi->planta; ?> - <?= $regedi->puerta; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12"> <!-- Fecha Alta -->
                                    <div class="form-group form-group-default">
                                        <label>Fecha</label>
                                        <input  type="date" name="fechaE" value="<?= date('Y-m-d');?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12"> <!-- LGasE -->
                                    <div class="form-group form-group-default">
                                        <label>Lectura Gas </label>
                                        <input  type="number" name="lgasE" value="0" class="form-control" placeholder="Lectura gas">
                                    </div>
                                </div>
                                <div class="col-md-12"> <!-- LAguaE -->
                                    <div class="form-group form-group-default">
                                        <label>Lectura Agua</label>
                                        <input  type="number" name="laguaE" value="0" class="form-control" placeholder="Lectura agua">
                                    </div>
                                </div>
                                <div class="col-md-12"> <!-- LLuzE -->
                                    <div class="form-group form-group-default">
                                        <label>Lectura Luz</label>
                                        <input  type="number" name="lluzE" value="0" class="form-control" placeholder="Lectura Luz">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                                <button type="submit" id="addRowButton" class="btn btn-primary">A&ntilde;adir</button>
                                <a href="<?= base_url()?>Entsal"><button type="button" class="btn btn-danger" >Cerrar</button></a>
                        </div>

                        </form> <!-- fin del formulario -->
                    </div>
                <?php elseif ($estado == 'BAJA'): ?>
                    <div class="card"> <!-- Formulario Baja -->
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="card-title">Salida</h2>
                                </div>
                                <div class="col-sm-6">
                                    <h3 class="card-title">
                                        <span class="fw-mediumbold">
                                            Usuario:
                                        </span>
                                        <span class="fw-light">
                                            <?= $datos_ficha->nomape; ?>
                                        </span>    
                                    </h3>
                                </div>
                            </div>
                            
                        </div>

                        <form role="form" action="<?= base_url()?>Entsal/baja" method="POST"> <!-- Formulario --> 
                        <input type="hidden"  name="id" value="<?= $datos_ficha->id ?>"> 
                        <input type="hidden"  name="idinqui" value="<?= $datos_ficha->idinqui ?>"> 
                        <input type="hidden"  name="idpiso"    value="<?= $datos_ficha->idpiso ?>"> 

                        <div class="card-body"> <!-- Datos Formulario -->
                            <div class="row">
                                <div class="col-md-12"> <!-- Fecha Baja -->
                                    <div class="form-group form-group-default">
                                        <label>Fecha</label>
                                        <input  type="date" name="fechaS" value="<?= date('Y-m-d');?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12"> <!-- LGasS -->
                                    <div class="form-group form-group-default">
                                        <label>Lectura Gas </label>
                                        <input  type="number" name="lgasS" value="0" class="form-control" placeholder="Lectura gas">
                                    </div>
                                </div>
                                <div class="col-md-12"> <!-- LAguaS -->
                                    <div class="form-group form-group-default">
                                        <label>Lectura Agua</label>
                                        <input  type="number" name="laguaS" value="0" class="form-control" placeholder="Lectura agua">
                                    </div>
                                </div>
                                <div class="col-md-12"> <!-- LLuzS -->
                                    <div class="form-group form-group-default">
                                        <label>Lectura Luz</label>
                                        <input  type="number" name="lluzS" value="0" class="form-control" placeholder="Lectura Luz">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                                <button type="submit" id="addRowButton" class="btn btn-primary">A&ntilde;adir</button>
                                <a href="<?= base_url()?>Entsal"><button type="button" class="btn btn-danger" >Cerrar</button></a>
                        </div>

                        </form> <!-- fin del formulario -->
                    </div>
                <?php else: ?>
                    <div class="card">  <!-- Tarjeta Inicial listado EntSal-->

                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="card-title">Gesti&oacute;n de Entradas y Salidas de Usuarios</h2>
                                </div>
                                <div class="col-sm-6">
                                    <form role="form" action="<?= base_url()?>Entsal/busca_usu" method="POST"> <!-- Formulario Busqueda--> 
                                        <div class="input-group input-group-sm hidden-xs" >
                                            <input type="text" name="buscar_usu" class="form-control" placeholder="Buscar Usuarios">

                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-hover">
                                    <thead>
                                        <tr>
                                            <th><label>Nombre Corto</label></th>
                                            <th><label>Nombre Completo</label></th>
                                            <th><label>Tel&eacute;fono</label></th>
                                            <th><label>Fecha Entrada / Salida</label></th>
                                            <th><label>Piso Asignado</label></th>
                                            <th width="10%"><label>Acci&oacute;nes</label></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><label>Nombre Corto</label></th>
                                            <th><label>Nombre Completo</label></th>
                                            <th><label>Tel&eacute;fono</label></th>
                                            <th><label>Fecha Entrada / Salida</label></th>
                                            <th><label>Piso Asignado</label></th>
                                            <th width="10%"><label>Acci&oacute;nes</label></th>
                                        </tr>
                                    </tfoot>
                                    <tbody> <!-- Cuerpo de la tabla -->
                                    
                                        <?php foreach ($consulta->result() as $registro): ?>
                                            <tr>
                                                <td><?= $registro->nick; ?></td>
                                                <td><?= $registro->nomape; ?></td>
                                                <td><?= $registro->telefono; ?></td>
                                                <td><?= $registro->fechaE; ?> / <?= $registro->fechaS; ?></td>
                                                <?php if ($registro->tienepiso):?>
                                                    <td><?= $registro->edipiso; ?></td>
                                                <?php else: ?>
                                                    <td><h6 class="text-warning">NO TIENE PISO</h6></td>
                                                <?php endif; ?>
                                                <td> <!-- Botones -->
                                                    <div class="form-button-action">
                                                        <?php if ($registro->tienepiso):?>
                                                            <button type="button" title="" class="btn btn-link btn-simple-danger" data-toggle="tooltip" data-original-title="Quita piso a un usuario">
                                                                <a href="<?= base_url()?>Entsal/alta_baja/0/<?= $registro->idinqui; ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
                                                            </button>
                                                        <?php else: ?>
                                                            <button type="button" title="" class="btn btn-link btn-simple-danger" data-toggle="tooltip" data-original-title="Asigna piso a un usuario">
                                                                <a href="<?= base_url()?>Entsal/alta_baja/1/<?= $registro->idinqui; ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
                                                            </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?> 

                                    </tbody>
                                </table>
                            </div> 
                        </div>

                        <div class="card-footer"> <!-- Pie de la targeta Paginador -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php if($paginacion): ?>
                                    <?= $this->pagination->create_links()?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <!-- <p>1 de 400 pages</p> -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                <?php endif; ?>
            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


