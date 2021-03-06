
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
            <?php if($edita): ?> <!-- Edita Póliza -->
                <form action="<?= base_url('Poliza/editaPoliza') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <input type="hidden" name="id" value="<?= $datos->id ?>">
                    <input type="hidden" name="idaseg" value="<?= $datos->idaseg ?>">

                    <div class="card"> <!-- Datos de la Aseguradora -->
                        <div class="card-header">
                            <h2 class="card-title">Va a modificar una Póliza de la Aseguradora</h2>
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
                            <div class="row"> <!-- Datos de la Póliza -->
                                <div class="col-md-4"> 
                                    <div class="form-group form-group-default"> <!-- npoliza -->
                                        <label>Nro Poliza</label>
                                        <input tabindex="1" type="text" name="npoliza" value="<?= $datos->npoliza ?>" class="form-control" placeholder="Nro de Poliza" required>
                                    </div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group form-group-default"> <!-- referencia -->
                                        <label>Referencia</label>
                                        <input tabindex="2" type="text" name="referencia" value="<?= $datos->referencia ?>" class="form-control" placeholder="Referencia">
                                    </div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group form-group-default"> <!-- titular -->
                                        <label>Titular</label>
                                        <input tabindex="3" type="text" name="titular" value="<?= $datos->titular ?>" class="form-control" placeholder="Titular">
                                    </div>
                                </div>
                            </div>

                            <div class="row"> <!-- Fechas -->
                                <div class="col-md-6"> <!-- femision -->
                                    <div class="form-group form-group-default"> 
                                        <label>Fecha de Emision</label>
                                        <input tabindex="4" type="date" name="femision" value="<?= $datos->femision ?>" class="form-control" placeholder="Fecha de Emision" required>
                                    </div>
                                </div>
                                <div class="col-md-6"> <!-- fvencimiento -->
                                    <div class="form-group form-group-default"> 
                                        <label>Fecha de Vencimiento</label>
                                        <input tabindex="5" type="date" name="fvencimiento" value="<?= $datos->fvencimiento ?>" class="form-control" placeholder="Fecha de Vencimiento" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> <!-- Comentario -->
                                <div class="col-md-12">
                                    <div class="input-group"> 
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Notas / Comentario sobre la cobertura</span>
                                        </div>
                                        <textarea tabindex="6" class="form-control" name="cobertura" aria-label="With textarea"><?= $datos->cobertura ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                </div>

                                <div class="col-md-6">
                                    <a href="<?= base_url('Poliza') ?>" class="pull-right"> 
                                        <button type="button" class="btn btn-warning">Cancelar</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    
                    </div>
                </form>
            <?php else: ?> <!-- Añade Póliza -->
                <form action="<?= base_url('Poliza/altaPoliza') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <input type="hidden" name="idaseg" value="<?= $aseguradora->id ?>">

                    <div class="card"> <!-- Datos de la Aseguradora -->
                        <div class="card-header">
                            <h2 class="card-title">Va a añadir una Póliza de la Aseguradora</h2>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"> <!-- Col 1 -->
                                    <div class="form-group form-group-default"> <!-- AsegComp -->
                                        <label class="control-label">Compañía</label>
                                        <p class="form-control-static"><?= $aseguradora->compania ?></p>
                                    </div>
                                </div>

                                <div class="col-md-4"> <!-- Col 2 -->
                                    <div class="form-group form-group-default"> <!-- AsagProp -->
                                        <label class="control-label">Propietario</label>
                                        <p class="form-control-static"><?= $aseguradora->propietario ?></p>
                                    </div>
                                </div>    

                                <div class="col-md-4"> <!-- Col 3 -->
                                    <div class="form-group form-group-default"> <!-- AsegTit -->
                                        <label class="control-label">Titular</label>
                                        <p class="form-control-static"><?= $aseguradora->titular ?></p>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>

                    <div class="card"> <!-- Datos de la Póliza -->

                        <div class="card-header">
                            <h2 class="card-title">Nueva Póliza</h2>
                        </div>

                        <div class="card-body">
                            <div class="row"> <!-- Datos de la poliza -->
                                <div class="col-md-4"> 
                                    <div class="form-group form-group-default"> <!-- npoliza -->
                                        <label>Nro Poliza</label>
                                        <input tabindex="1" type="text" name="npoliza" class="form-control" placeholder="Nro de Poliza" required>
                                    </div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group form-group-default"> <!-- referencia -->
                                        <label>Referencia</label>
                                        <input tabindex="2" type="text" name="referencia" class="form-control" placeholder="Referencia">
                                    </div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group form-group-default"> <!-- titular -->
                                        <label>Titular</label>
                                        <input tabindex="3" type="text" name="titular" class="form-control" placeholder="Titular">
                                    </div>
                                </div>
                            </div>

                            <div class="row"> <!-- Fechas de la poliza -->
                                <div class="col-md-6"> <!-- femision -->
                                    <div class="form-group form-group-default"> 
                                        <label>Fecha de Emision</label>
                                        <input tabindex="4" type="date" name="femision" class="form-control" placeholder="Fecha de Emision" required>
                                    </div>
                                </div>
                                <div class="col-md-6"> <!-- fvencimiento -->
                                    <div class="form-group form-group-default"> 
                                        <label>Fecha de Vencimiento</label>
                                        <input tabindex="5" type="date" name="fvencimiento" class="form-control" placeholder="Fecha de Vencimiento" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> <!-- Comentario -->
                                <div class="col-md-12">
                                    <div class="input-group"> 
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Notas / Comentario sobre la cobertura</span>
                                        </div>
                                        <textarea tabindex="6" class="form-control" name="cobertura" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                </div>

                                <div class="col-md-6">
                                    <a href="<?= base_url('Poliza') ?>" class="pull-right"> 
                                        <button type="button" class="btn btn-warning">Cancelar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </form>
            <?php endif; ?>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


