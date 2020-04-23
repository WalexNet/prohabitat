
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
                

                <?php if (!$edita): ?>
                    <div class="card "> <!-- Lista principal de pisos-->
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="card-title">Mantenimiento del archivo Pisos</h2>
                                </div>
                                <div class="col-sm-6">
                                    <form role="form" action="<?= base_url()?>Pisos/buscar" method="POST"> <!-- Formulario Busqueda--> 
                                        <div class="input-group input-group-sm hidden-xs" >
                                            <input type="text" name="buscar_piso" class="form-control" placeholder="Buscar pisos por nombre de Edificio">

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
                                            <th><label>Edificio</label></th>
                                            <th><label>Escalera</label></th>
                                            <th><label>Planta</label></th>
                                            <th><label>Puerta</label></th>
                                            <th width="10%"><label>Acci&oacute;nes</label></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><label>Edificio</label></th>
                                            <th><label>Escalera</label></th>
                                            <th><label>Planta</label></th>
                                            <th><label>Puerta</label></th>
                                            <th width="10%"><label>Acci&oacute;nes</label></th>
                                        </tr>
                                    </tfoot>
                                    <tbody> <!-- Cuerpo de la tabla -->
                                    
                                        <?php foreach ($consulta->result() as $registro): ?>
                                            <tr>
                                                <td><?= $registro->nom_edificio; ?></td>
                                                <td><?= $registro->escalera; ?></td>
                                                <td><?= $registro->planta; ?></td>
                                                <td><?= $registro->puerta; ?></td>
                                                <td width="10%"> <!-- Botones -->
                                                    <div class="form-button-action">
                                                        <button type="button" title="" class="btn btn-link btn-simple-danger" data-toggle="tooltip" data-original-title="Ver Ficha de Edificio que contiene el piso">
                                                            <a href="<?= base_url()?>Edificios/ficha/<?= $registro->idedificio; ?>"><i class="fa fa-book-reader"></i></a>
                                                        </button>
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Editar">
                                                            <a href="<?= base_url()?>Pisos/editar/<?= $registro->id; ?>"><i class="fa fa-edit"></i></a>
                                                        </button>
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar">
                                                            <a href="<?= base_url()?>Pisos/baja/<?= $registro->id; ?>" onclick="return confirmar('Realmente desea ELIMINAR este piso?')"><i class="fa fa-times"></i></a>
                                                        </button>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?> 

                                    </tbody>
                                </table>
                            </div> 
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-8">
                                    <?= $this->pagination->create_links()?>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row justify-content-end">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addRowModal">
                                            <i class="fa fa-plus"></i>
                                            Piso
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Modifique datos del Piso</div>
                        </div>

                        <form role="form" action="<?= base_url()?>Pisos/modificar" method="POST"> <!-- Formulario --> 
                            <input type="hidden"  name="id" value="<?= $datos_ficha->id ?>">  
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12"> <!-- Edificios -->
                                        <div class="form-group form-group-default">
                                            <label>Edificio</label>
                                            <select class="form-control" name="idEdificio">
                                            <?php foreach ($edificios->result() as $regedi): ?>
                                                <option value="<?= $regedi->id; ?>" <?php if ($regedi->id == $datos_ficha->idEdificio) echo 'selected'?>>     <?= $regedi->nombre; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12"> <!-- Escalera -->
                                        <div class="form-group form-group-default">
                                            <label>Escalera:</label>
                                            <input type="text" name="escalera" value="<?=$datos_ficha->escalera ?>" class="form-control" placeholder="Nro o Letra de escalera">
                                        </div>
                                    </div>
                                    <div class="col-md-12"> <!-- Planta -->
                                        <div class="form-group form-group-default">
                                            <label>Planta </label>
                                            <input type="text" name="planta" value="<?=$datos_ficha->planta ?>" class="form-control" placeholder="Nro o letra de Planta">
                                        </div>
                                    </div>
                                    <div class="col-md-12"> <!-- Puerta -->
                                        <div class="form-group form-group-default">
                                            <label>Puerta</label>
                                            <input type="text" name="puerta" value="<?=$datos_ficha->puerta ?>" class="form-control" placeholder="Nro o letra de puerta">
                                        </div>
                                    </div>
                                    <div class="col-md-12"> <!-- Notas -->
                                        <div class="form-group form-group-default">
                                            <label>Notas</label>
                                            <textarea class="form-control" name="notas"  placeholder="Escriba aqui sus Notas" rows="5"><?=$datos_ficha->notas ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Modificar</button>
                                <a href="<?= base_url()?>Pisos"><button type="button" class="btn btn-danger" >Cerrar</button></a>
                            </div>

                        </form> <!-- fin del formulario -->

                    </div>
                <?php endif; ?>

                <!-- Modal Formulario-->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Nuevo
                                    </span>
                                    <span class="fw-light">
                                        Piso
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Datos del nuevo Piso</p>

                                <form role="form" action="<?= base_url()?>Pisos/alta" method="POST"> <!-- Formulario --> 
                                    <div class="row">

                                        <div class="col-md-12"> <!-- Edificios -->
                                            <div class="form-group form-group-default">
                                                <label>Edificio</label>
                                                <select class="form-control" name="idEdificio">
                                                <?php foreach ($edificios->result() as $regedi): ?>
                                                    <option value="<?= $regedi->id; ?>" ><?= $regedi->nombre; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12"> <!-- Escalera -->
                                            <div class="form-group form-group-default">
                                                <label>Escalera:</label>
                                                <input type="text" name="escalera" class="form-control" placeholder="Nro o Letra de escalera">
                                            </div>
                                        </div>
                                        <div class="col-md-12"> <!-- Planta -->
                                            <div class="form-group form-group-default">
                                                <label>Planta </label>
                                                <input type="text" name="planta" class="form-control" placeholder="Nro o letra de Planta">
                                            </div>
                                        </div>
                                        <div class="col-md-12"> <!-- Puerta -->
                                            <div class="form-group form-group-default">
                                                <label>Puerta</label>
                                                <input type="text" name="puerta" class="form-control" placeholder="Nro o letra de puerta">
                                            </div>
                                        </div>
                                        <div class="col-md-12"> <!-- Notas -->
                                            <div class="form-group form-group-default">
                                                <label>Notas</label>
                                                <textarea class="form-control" name="notas" placeholder="Escriba aqui sus Notas" rows="5"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer no-bd">
                                        <button type="submit" id="addRowButton" class="btn btn-primary">A&ntilde;adir</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form> <!-- fin del formulario -->

                            </div>
                        </div>
                    </div>
                </div>
 
            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>
