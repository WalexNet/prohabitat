
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
            <?php if ($ficha): ?>
                <div class="card"> <!-- Ficha -->
                    <div class="card-body">
                        <h2 class="card-title"> Detalle de Factura</h2>
                        <div class="separator-solid"></div>
                        <div class="row">
                            <!--      -->
                            <div class="col-md-3"> <!-- Nro - Importe -->
                                <div class="info-post">
                                    <label>N&uacute;mero</label>
                                    <p ><?= $datos_ficha->numero ?></p>
                                    <label>Importe</label>
                                    <p><?= $datos_ficha->importe ?>&euro;</p>
                                </div>
                            </div>
                            <div class="col-md-3"> <!-- Fecha - Servicio -->
                                <div class="info-post">
                                    <label>Fecha Facturaci&oacute;n</label>
                                    <p><?= $datos_ficha->fechaf ?></p>
                                    <label>Servicio</label>
                                    <p><?= $datos_ficha->servicio ?></p>
                                </div>
                            </div>
                            <div class="col-md-3"> <!-- Periodo - LAnt -->
                                <div class="info-post">
                                    <label>Periodo</label>
                                    <p><?= $datos_ficha->periodo ?></p>
                                    <label>Lectura Anterior</label>
                                    <p><?= $datos_ficha->lant ?></p>
                                </div>
                            </div>
                            <div class="col-md-3"> <!-- Desde/Hasta - LAct-->
                                <div class="info-post">
                                    <label>Desde/Hasta</label>
                                    <p><?= $datos_ficha->fdes ?> / <?= $datos_ficha->fhas ?></p>
                                    <label>Lectura Actual</label>
                                    <p><?= $datos_ficha->lact ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="separator-solid"></div> <!-- Piso al que pertenece -->
                        <h2 > Esta factura pertenece al piso:</h2>
                        <div class="separator-solid"></div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Pertenece al edificio:</label>
                                    <p><?= $datos_ficha->edificio ?></p> 
                                </div>
                                <div class="col-md-3">
                                    <label>Con direcci&oacute;n en:</label>
                                    <p><?= $datos_ficha->edi_dir ?></p> 
                                </div>
                                <div class="col-md-3">
                                    <label>Escalera, Planta, Puerta:</label> 
                                    <p><?= $datos_ficha->escalera ?>, <?= $datos_ficha->planta ?>, <?= $datos_ficha->puerta ?></p>
                                </div>
                                <div class="col-md-3"> <!-- Vacio -->
                                </div>
                            </div>
                        <div class="separator-solid"></div>
                        <a href="<?= base_url()?>Pagos"><button type="button" class="btn btn-danger" >Cerrar</button></a>
                    </div>
                </div>
            <?php else: ?>

                <div class="card"> <!-- Tabla Listado --> 
                    <div class="card-header"> <!-- Título de la Tabla y FORM Buscador -->
                        <div class="row">

                            <div class="col-md-6">
                                <h3 class="card-title">Listado de Facturas</h3>
                            </div>

                            <div class="col-md-6"> <!-- Formulario de busqueda -->
                                <form role="form" action="<?= base_url()?>Pagos/buscar" method="POST"> <!-- Formulario --> 
                                    <div class="input-group input-group-sm hidden-xs" >
                                        <input type="text" name="buscar_factura" class="form-control" placeholder="Busca facturas por N&uacute;mero">

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
                            <table class="display table table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><label>N&uacute;mero</label></th>
                                        <th><label>Fecha</label></th>
                                        <th><label>Importe</label></th>
                                        <th><label>Servicio</label></th>
                                        <th><label>Piso</label></th>
                                        <th width="10%"><label>Acci&oacute;nes</label></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><label>N&uacute;mero</label></th>
                                        <th><label>Fecha</label></th>
                                        <th><label>Importe</label></th>
                                        <th><label>Servicio</label></th>
                                        <th><label>Piso</label></th>
                                        <th width="10%"><label>Acci&oacute;nes</label></th>
                                    </tr>
                                </tfoot>
                                <tbody> <!-- Cuerpo de la tabla -->
                                
                                    <?php foreach ($consulta->result() as $registro): ?>
                                        <tr>
                                            <td><?= $registro->numero; ?></td>
                                            <td><?= $registro->fechaf; ?></td>
                                            <td><?= $registro->importe; ?>&euro;</td>
                                            <td><?= $registro->servicio; ?></td>
                                            <td><?= $registro->edificio; ?> / <?= $registro->planta; ?>-<?= $registro->puerta; ?></td>

                                            <td> <!-- Botones -->
                                                <div class="form-button-action">
                                                    <button type="button" title="" class="btn btn-link btn-simple-danger" data-toggle="tooltip" data-original-title="Detalle del estado de pago">
                                                        <a href="<?= base_url()?>Pagos/ficha/<?= $registro->id; ?>"><i class="fa fa-book-reader"></i></a>
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

                            <div class="col-md-6">
                                <?= $this->pagination->create_links()?>
                            </div>
                            <div class="col-md-6">
                                <!-- <p>1 de 400 pages</p> -->
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


