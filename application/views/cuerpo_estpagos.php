
                   
            <div class="page-inner"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->

                <h2 class="text-white pb-2">Ficha de la Factura a Pagar</h2>
            
                <div class="row"> <!-- Ficha de la factura  -->
                    <div class="col-md-12"> 
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex">
                                            
                                    <div class="col-md-4"> <!-- Nro LecAnt Imp -->
                                        <div class="info-post">
                                            <label>N&uacute;mero</label>
                                            <p ><?= $factura->numero ?></p>
                                            <label>Lectura Anterior</label>
                                            <p><?= $factura->lant ?></p>
                                            <label>Importe</label>
                                            <p><?= $factura->importe ?>&euro;</p>
                                        </div>
                                    </div>

                                    <div class="col-md-4"> <!-- FFact LecAct Serv -->
                                        <div class="info-post">
                                            <label>Fecha Facturaci&oacute;n</label>
                                            <p><?= $factura->fechaf ?></p>
                                            <label>Lectura Actual</label>
                                            <p><?= $factura->lact ?></p>

                                            <label>Servicio</label>
                                            <p><?= $factura->servicio ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4"> <!-- Periodo Fdes/Fhas -->
                                        <div class="info-post">
                                            <label>Periodo</label>
                                            <p><?= $factura->periodo ?></p>

                                            <label>Desde/Hasta</label>
                                            <p><?= $factura->fdes ?> / <?= $factura->fhas ?></p>

                                            <label>Documento</label>
                                            <p><?= $factura->facdoc ?></p>

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
                    <?php $totalpagado = 0; ?>
                    <!-- Pagos Usuarios -->
                    <div class="row row-card-no-pd mt--2">
                        <?php foreach($usuarios as $usr): ?>
                            <?php //extract($usr); ?>
                            <?php $porcentaje = intval(($usr->impusr * 100)/$factura->importe); ?>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between"> <!-- Nick Usr e Importe -->
                                            <div>
                                                <a href="<?= base_url() ?>Inquilinos/ficha/<?= $usr->idinqui ?>"><h5 class="card-title"><b><?= $usr->nick ?></b></h5></a>
                                            </div>
                                            <h3 class="text-info fw-bold">&euro;<?= number_format($usr->impusr,2) ?></h3>
                                        </div>
                                        <div class="d-flex justify-content-between"> <!-- Periodo Usr -->
                                            <p class="text-muted">Periodo: </p>
                                            <p class="text-muted"><?= $usr->fdes.' / '.$usr->fhas ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between"> <!-- Consumo Factura -->
                                            <p class="text-muted">Consumo Factura: <?= $usr->confac ?></p>
                                        </div>

                                        <div class="text-white">Consumo Usuario</div> <!-- Consumo Usr y Barra-->
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?= ($usr->conusr*100)/$usr->confac.'%' ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="<?= $usr->confac ?>"></div>
                                        </div>
                                        <div d-flex justify-content-between>
                                            <p class="text-muted"><?= $usr->conusr ?> de <?= $usr->confac ?></p>
                                        </div>

                                        <div class="d-flex justify-content-between"> <!-- PAX Usr -->
                                            <p class="text-muted">PAX:</p>
                                            <p class="text-muted"><?= $usr->pax ?></p>
                                        </div>
                                        <div>
                                            Descuento aplicado: <?= $usr->descuento ?>€
                                        </div>
                                        <div class="d-flex justify-content-between"> <!-- Porcentaje a pagar del total de la factura -->
                                            <p class="text-muted mb-0">Paga un <b class="text-info"><?= $porcentaje ?>%</b> del total de factura <b>&euro; <?= $factura->importe ?></b></p>
                                        </div>
                                        <?php if ($usr->pagado): ?> <!-- Boton e información de si ha pagado -->
                                            <div class="de-flex justify-content-center"> 
                                                <button class="btn btn-success">Pagado</button>
                                            </div> 
                                            <?php $totalpagado += $usr->impusr; ?>
                                        <?php else: ?>
                                            <div class="de-flex justify-content-center">
                                                <a href="<?= base_url()?>Pagos/pagar/<?= $usr->idinqui.'/'.$factura->id?> " onclick="return confirmar('Una vez realizado el pago no podrá volver atras\nDesea hacer el pago?')"><button class="btn btn-warning">Pagar</button></a>
                                            </div>   
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <h4 class="text-white">Estado Actual de la factura:</h4>
                    <div class="row"> <!-- Información general del estado de la factura -->
                        <div class="col-md-4"><p class="text-left text-info">Total Pagado: <b><?= number_format($totalpagado,2).'€'; ?></b></p></div>
                        <div class="col-md-4"><p class="text-center text-info">Pendiente de Pagar: <b><?=number_format($factura->importe-$totalpagado,2).'€' ?></b></p></div>
                        <div class="col-md-4"><p class="text-right text-info">Importe Total: <b><?= number_format($factura->importe,2).'€'; ?></b></p></div>
                    </div>    
                    <div class="progress" style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width:<?=($totalpagado*100)/$factura->importe.'%';?>" aria-valuenow="<?= $totalpagado; ?>" aria-valuemin="0" aria-valuemax="$factura->importe"><?= number_format(($totalpagado*100)/$factura->importe); ?>%</div>
                    </div>
                    
                <?php endif; ?>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


