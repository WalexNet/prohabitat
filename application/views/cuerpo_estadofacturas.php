
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
            <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Facturas pendientes de pago</h3>
                            </div>
                            <div class="col-sm-6"> <!-- Formulario de busqueda -->
                                <form role="form" action="<?= base_url('Estadofacturas')?>" method="POST"> <!-- Formulario --> 
                                    <div class="input-group input-group-sm hidden-xs" >
                                        <input type="text" name="anio" class="form-control" placeholder="Buscar por año Ej: 2020 (YYYY)">

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
                            <table class="display table table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><label>Nº Factura</label></th>
                                        <th><label>Fecha</label></th>
                                        <th><label>Servicio</label></th>
                                        <th><label>Importe Pendiente</label></th>
                                        <th><label>Importe Total</label></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><label>Nº Factura</label></th>
                                        <th><label>Fecha</label></th>
                                        <th><label>Servicio</label></th>
                                        <th><label>Importe Pendiente</label></th>
                                        <th><label>Importe Total</label></th>
                                    </tr>
                                </tfoot>
                                <tbody> <!-- Cuerpo de la tabla -->
                                
                                    <?php foreach ($facturasptes as $registro): ?>
                                        <tr>
                                            <td> <a href="<?= base_url('Pagos/ficha/').$registro->idfactura ?>"><?= $registro->numfac; ?></a> </td>
                                            <td><?= $registro->ffactura; ?></td>
                                            <td><?= $registro->servicio; ?></td>
                                            <td class="text-danger"> 
                                                <?= $registro->imppte; ?>€
                                                <div class="progress">
                                                   <div class="progress-bar bg-danger" role="progressbar" style="width: <?= ($registro->imppte*100)/$registro->impfac; ?>%" aria-valuenow="<?= $registro->imppte; ?>" aria-valuemin="0" aria-valuemax="<?= $registro->impfac; ?>"></div>
                                                </div>
                                            </td>
                                            <td class="text-warning"><?= $registro->impfac; ?>€</td>

                                        </tr>
                                    <?php endforeach; ?> 

                                </tbody>
                            </table>
                        </div> 

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-white">Total facturas impagas: <b><?= $totalptes ?></b></p> 
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


    