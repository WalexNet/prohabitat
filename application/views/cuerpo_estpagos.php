
                   
            <div class="page-inner"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->

                <h2 class="text-white pb-2">Ficha de la Factura a Pagar</h2>
            
                <div class="row"> <!-- Ficha de la factura  -->
                    <div class="col-md-12"> 
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex">
                                        
                                    <div class="col-md-6">
                                        <div class="info-post">
                                            <label>N&uacute;mero</label>
                                            <p ><?= $factura->numero ?></p>
                                            <label>Periodo</label>
                                            <p><?= $factura->periodo ?></p>
                                            <label>Importe</label>
                                            <p><?= $factura->importe ?>&euro;</p>
                                            <label>Lectura Anterior</label>
                                            <p><?= $factura->lant ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-post">
                                            <label>Fecha Facturaci&oacute;n</label>
                                            <p><?= $factura->fechaf ?></p>
                                            <label>Desde/Hasta</label>
                                            <p><?= $factura->fdes ?> / <?= $factura->fhas ?></p>
                                            <label>Servicio</label>
                                            <p><?= $factura->servicio ?></p>
                                            <label>Lectura Actual</label>
                                            <p><?= $factura->lact ?></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="separator-solid"></div>
                                    <div class="row"> <!-- Edificio al que pertenece -->
                                        <div class="col-md-4"> <!-- Edificio -->
                                            <label>Pertenece al edificio:</label>
                                            <p><?= $factura->edificio ?></p> 
                                        </div>
                                        <div class="col-md-4"> <!-- Direccion -->
                                            <label>Con direcci&oacute;n en:</label>
                                            <p><?= $factura->edi_dir ?></p> 
                                        </div>
                                        <div class="col-md-4"> <!-- Piso -->
                                            <label>Escalera, Planta, Puerta:</label> 
                                            <p><?= $factura->escalera ?>, <?= $factura->planta ?>, <?= $factura->puerta ?></p>
                                        </div>
                                    </div>
                                <div class="separator-solid"></div>
                                <a href="<?= base_url()?>Pagos"><button type="button" class="btn btn-danger" >Cerrar</button></a>
                            </div>
                        </div>
                    </div>
                </div>      
                
                <?php if(!$si_usu):?> <!-- Si no hay usuarios mostramos mensaje -->
                    <div class="alert alert-success" >
                        <h2 class="text-success pb-2">En el periodo de la Factura seleccionada, no hubieron usuarios ocupando el piso</h2>
                    </div>

                <?php else: ?> <!-- De lo contrario mostramos usuarios a pagar -->
                    <h2 class="text-white pb-2">Usuarios que deben pagar esta Factura</h2>
                    <!-- Pagos Usuarios -->
                    <div class="row row-card-no-pd mt--2">
                        <?php foreach($usuarios as $usr): ?>
                            <?php extract($usr); ?>
                            <?php $porcentaje = intval(($importe * 100)/$factura->importe); ?>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="<?= base_url() ?>Inquilinos/ficha/<?= $idusr ?>"><h5 class="card-title"><b><?= $user ?></b></h5></a>
                                            </div>
                                            <h3 class="text-info fw-bold">&euro;<?= number_format($importe,2) ?></h3>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">Periodo: </p>
                                            <p class="text-muted"><?= $fini.' / '.$ffin ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">PAX:</p>
                                            <p class="text-muted"><?= $pax ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted mb-0">Paga un <b class="text-info"><?= $porcentaje ?>%</b> del total de factura <b>&euro; <?= $factura->importe ?></b></p>
                                        </div>
                                        <?php if ($pagado): ?>
                                            <div class="de-flex justify-content-center">
                                                <button class="btn btn-success">Pagado</button>
                                            </div> 
                                        <?php else: ?>
                                            <div class="de-flex justify-content-center">
                                                <a href="<?= base_url()?>Pagos/pagar/<?= $idusr.'/'.$factura->id.'/'.$fini.'/'.$ffin.'/'.$importe.'/',$pax ?>"><button class="btn btn-warning">Pagar</button></a>
                                            </div>   
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


