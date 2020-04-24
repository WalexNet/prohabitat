
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
            <div class="card">
                    <div class="card-header"> <!-- Título de la Tabla y FORM Buscador -->
                        <div class="row">
                            <div class="col-sm-6"> <!-- Titulo --> 
                                <h3 class="card-title">Listado de Pólizas</h3>
                            </div>
                            
                            <div class="col-sm-6"> <!-- Formulario Busqueda --> 
                                <form role="form" action="<?= base_url('Poliza/buscar')?>" method="POST"> <!-- Formulario --> 
                                    <div class="input-group input-group-sm hidden-xs" >
                                        <input type="text" name="buscar_poliza" class="form-control" placeholder="Buscar por Aseguradora, Propietario, Nro Póliza ó Referencia">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">  <!-- Aqui va la tabla -->
                        <div class="table-responsive">
                            <table class="display table table-hover">
                                <thead>
                                    <tr>
                                        <th><label>Aseguradora / Propietario</label></th>
                                        <th><label>Nro Poliza</label></th>
                                        <th><label>Referencia</label></th>
                                        <th><label>Fecha Alta / Vencimiento</label></th>
                                        <th width="10%"><label>Acciones</label></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><label>Aseguradora / Propietario</label></th>
                                        <th><label>Nro Poliza</label></th>
                                        <th><label>Referencia</label></th>
                                        <th><label>Fecha Alta / Vencimiento</label></th>
                                        <th width="10%"><label>Acciones</label></th>
                                    </tr>
                                </tfoot>
                                <tbody> <!-- Cuerpo de la tabla -->
                                    <?php if(isset($datos)):?> <!-- Si no hay datos no hay nada que mostrar --> 
                                        <?php foreach ($datos as $registro): ?>
                                            <tr>
                                                <td><?= $registro->asegcomp.' - '.$registro->asegprop; ?></td>
                                                <td><?= $registro->npoliza; ?></td>
                                                <td><?= $registro->referencia; ?></td>
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
                    
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-8">
                                <?= $this->pagination->create_links()?>
                            </div>
                            <!-- <div class="col-sm-4"> <!-- Boton Alta 
                                <div class="row justify-content-end">
                                    <a href=<?= base_url("Poliza/formAlta") ?> class="btn btn-primary">
                                        <i class="fa fa-plus"></i>
                                        Póliza
                                    </a>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>
                </div>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


