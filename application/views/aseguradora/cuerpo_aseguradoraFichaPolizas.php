
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
            <div class="card"> <!-- Encabezado Datos de la aseguradora -->
                <div class="card-header">
                    <h2 class="card-title">Datos de la Aseguradora</h2>
                </div>

                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-4"> <!-- Col 1 -->
                            <div class="form-group form-group-default"> <!-- Propietario -->
                                <label class="control-label">Nombre Propietario</label>
                                <p class="form-control-static"><?= $datos[0]->asegprop ?></p>
                            </div>
                        </div>
                        
                        <div class="col-md-4"> <!-- Col 2 -->
                            <div class="form-group form-group-default"> <!-- Titular -->
                                <label class="control-label">Titular</label>
                                <p class="form-control-static"><?= $datos[0]->asegtit ?></p>
                            </div>
                        </div>

                        <div class="col-md-4"> <!-- Col 3 -->
                            <div class="form-group form-group-default"> <!-- Compañía -->
                                <label class="control-label">Compañía</label>
                                <p class="form-control-static"><?= $datos[0]->asegcomp ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card"> <!-- Listado de Pólizas -->
                <div class="card-header">
                    <h2 class="card-title">Listado de pólizas</h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-hover">
                            <thead>
                                <tr>
                                    <th><label>Nro Poliza</label></th>
                                    <th><label>Referencia</label></th>
                                    <th><label>Titular</label></th>
                                    <th><label>Fecha Alta / Vencimiento</label></th>
                                    <th width="10%"><label>Acciones</label></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><label>Nro Poliza</label></th>
                                    <th><label>Referencia</label></th>
                                    <th><label>Titular</label></th>
                                    <th><label>Fecha Alta / Vencimiento</label></th>
                                    <th width="10%"><label>Acciones</label></th>
                                </tr>
                            </tfoot>
                            <tbody> <!-- Cuerpo de la tabla -->
                                <?php if(isset($datos)):?> <!-- Si no hay datos no hay nada que mostrar --> 
                                    <?php foreach ($datos as $registro): ?>
                                        <tr>
                                            <td><?= $registro->npoliza; ?></td>
                                            <td><?= $registro->referencia; ?></td>
                                            <td><?= $registro->titular; ?></td>
                                            <td><?= $registro->femision.' / '.$registro->fvencimiento; ?></td>
                                            <td> <!-- Acciones Botones -->
                                                <div class="form-button-action">
                                                    <button type="button" title="" class="btn btn-link btn-simple-danger" data-toggle="tooltip" data-original-title="Ver Ficha">
                                                        <a href="<?= base_url('Poliza/verFicha/'.$registro->id)?>"><i class="fa fa-book-reader"></i></a>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Editar">
                                                        <a href="<?= base_url('Poliza/editar/'.$registro->id)?>"><i class="fa fa-edit"></i></a>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar">
                                                        <a href="<?= base_url('Poliza/baja/'.$registro->id)?>"onclick="return confirmar('Realmente desea ELIMINAR esta Póliza?')"><i class="fa fa-times"></i></a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?> 
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div> 
                </div>

                <div class="card-footer"> <!-- Botones -->
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <a href="<?= base_url('Poliza/formAlta/'.$datos[0]->idaseg) ?>">
                                <button type="submit" class="btn btn-secondary">Añade Poliza</button>
                            </a>
                        </div>

                        <div class="col-md-6"> <!-- Boton Cancelar --> 
                            <a href="<?= base_url('Aseguradora') ?>" class="pull-right"> 
                                <button type="button" class="btn btn-warning">Cancelar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


