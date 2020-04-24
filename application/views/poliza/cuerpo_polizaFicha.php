
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
                <div class="card"> <!-- Datos de la Aseguradora -->
                    <div class="card-header">
                        <h2 class="card-title">Datos de la Aseguradora</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"> <!-- Col 1 -->
                                <div class="form-group form-group-default"> <!-- AsegComp -->
                                    <label class="control-label">Compañía</label>
                                    <p class="form-control-static"><?= $datos->asegcomp ?></p>
                                </div>
                            </div>

                            <div class="col-md-4"> <!-- Col 2 -->
                                <div class="form-group form-group-default"> <!-- AsagProp -->
                                    <label class="control-label">Propietario</label>
                                    <p class="form-control-static"><?= $datos->asegprop ?></p>
                                </div>
                            </div>    

                            <div class="col-md-4"> <!-- Col 3 -->
                                <div class="form-group form-group-default"> <!-- AsegTit -->
                                    <label class="control-label">Titular</label>
                                    <p class="form-control-static"><?= $datos->asegtit ?></p>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
                
                <div class="card"> <!-- Datos de la Póliza -->
                    <div class="card-header">
                        <h2 class="card-title">Datos de la Póliza</h2>
                    </div>

                    <div class="card-body">
                        <div class="row"> <!-- DAtos de la Póliza -->
                            <div class="col"><h4 class="text-white">Datos de la Póliza</h4></div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"> <!-- Col 1 --><!-- Titular -->
                                <div class="form-group form-group-default"> 
                                    <label class="control-label">Titular</label>
                                    <p class="form-control-static"><?= $datos->titular ?></p>
                                </div>
                            </div>
                            <div class="col-md-3"> <!-- Col 2 --><!-- NroPoliza -->
                                <div class="form-group form-group-default"> 
                                    <label class="control-label">Nro de la Póliza</label>
                                    <p class="form-control-static"><?= $datos->npoliza ?></p>
                                </div>
                            </div>
                            <div class="col-md-3"> <!-- Col 3 --><!-- referencia -->
                                <div class="form-group form-group-default"> 
                                    <label class="control-label">Nro de Referencia</label>
                                    <p class="form-control-static"><?= $datos->referencia ?></p>
                                </div>
                            </div>
                            <div class="col-md-3"> <!-- Col 4 --><!-- femision fvencimiento-->
                                <div class="form-group form-group-default"> 
                                    <label class="control-label">Fecha Emisión / Vencimiento</label>
                                    <p class="form-control-static"><?= $datos->femision.' / '.$datos->fvencimiento ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group-default"> <!-- Comentario -->
                            <label class="control-label">Comentario:</label>
                            <p class="form-control-static"><?= $datos->cobertura ?></p>
                        </div>
                    </div>

                    <div class="card-footer"> <!-- Botones -->
                        <div class="row"> 
                            <div class="col-md-6"> <!-- Boton Guardar -->
                                <a href="<?= base_url('Poliza/editar/'.$datos->id) ?>">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </a>
                            </div>

                            <div class="col-md-6"> <!-- Boton Cancelar --> 
                                <a href="<?= base_url('Poliza') ?>" class="pull-right"> 
                                    <button type="button" class="btn btn-warning">Cancelar</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


