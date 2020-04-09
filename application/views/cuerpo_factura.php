



                   
        <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
            <div class="container-fluid">




                <!-- Tarjeta Datos Factura-->
                <?php if ($ficha): ?>
                    <div class="row">
                        <div class="col-md-12"> <!-- Ancho de la Tarjeta -->
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex">
                                            
                                        <div class="col-md-6">
                                            <div class="info-post">
                                                <label>N&uacute;mero</label>
                                                <p ><?= $datos_ficha->numero ?></p>
                                                <label>Periodo</label>
                                                <p><?= $datos_ficha->periodo ?></p>
                                                <label>Importe</label>
                                                <p><?= $datos_ficha->importe ?>&euro;</p>
                                                <label>Lectura Anterior</label>
                                                <p><?= $datos_ficha->lant ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-post">
                                                <label>Fecha Facturaci&oacute;n</label>
                                                <p><?= $datos_ficha->fechaf ?></p>
                                                <label>Desde/Hasta</label>
                                                <p><?= $datos_ficha->fdes ?> / <?= $datos_ficha->fhas ?></p>
                                                <label>Servicio</label>
                                                <p><?= $datos_ficha->servicio ?></p>
                                                <label>Lectura Actual</label>
                                                <p><?= $datos_ficha->lact ?></p>
                                            </div>
                                        </div>

                                    </div>
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
                                            <div class="col-md-3">
                                                <a href="<?= base_url()?>Facturas/editar/<?= $datos_ficha->id; ?>"><button type="button" class="btn btn-secondary" data-toggle="tooltip" data-original-title="Asignar factura a piso Modifica Datos">Asignar / Editar</button></a>
                                            </div>
                                        </div>
                                    <div class="separator-solid"></div>
                                    <a href="<?= base_url()?>Facturas"><button type="button" class="btn btn-danger" >Cerrar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Formulario de edicion-->
                <?php if ($edita):?>
                    <div class="card"> 
                        <div class="card-header">
                            <div class="card-title">
                                Modifique los datos de la Factura:
                                <p><?= $datos_ficha->numero ?></p>
                            </div>
                        </div>

                        <form role="form" action="<?= base_url()?>Facturas/modificar" method="POST"> <!-- Formulario --> 
                            <input type="hidden"  name="id" value="<?= $datos_ficha->id ?>">   
                            <div class="row">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6"> <!-- Nro de factura -->
                                            <div class="form-group form-group-default">
                                                <label>Nº</label>
                                                <input type="text" name="numero" value="<?= $datos_ficha->numero ?>" class="form-control" placeholder="Numero Factura">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Fecha factura -->
                                            <div class="form-group form-group-default">
                                                <label>Fecha Facturaci&oacute;n</label>
                                                <input type="date" name="fechaf" value="<?= $datos_ficha->fechaf ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4"> <!-- Periodo factura -->
                                            <div class="form-group form-group-default">
                                                <label>Periodo</label>
                                                <select name="periodo" class="form-control">
                                                    <option value="Mensual" <?php if ($datos_ficha->periodo == 'Mensual') echo 'selected'?> >Mensual</option>
                                                    <option value="1 Bimestre" <?php if ($datos_ficha->periodo == '1 Bimestre') echo 'selected'?>>1 Bimestre</option>
                                                    <option value="2 Bimestre" <?php if ($datos_ficha->periodo == '2 Bimestre') echo 'selected'?>>2 Bimestre</option>
                                                    <option value="3 Bimestre" <?php if ($datos_ficha->periodo == '3 Bimestre') echo 'selected'?>>3 Bimestre</option>
                                                    <option value="4 Bimestre" <?php if ($datos_ficha->periodo == '4 Bimestre') echo 'selected'?>>4 Bimestre</option>
                                                    <option value="5 Bimestre" <?php if ($datos_ficha->periodo == '5 Bimestre') echo 'selected'?>>5 Bimestre</option>
                                                    <option value="6 Bimestre" <?php if ($datos_ficha->periodo == '6 Bimestre') echo 'selected'?>>6 Bimestre</option>
                                                    <option value="1 Trimestre" <?php if ($datos_ficha->periodo == '1 Trimestre') echo 'selected'?>>1 Trimestre</option>
                                                    <option value="2 Trimestre" <?php if ($datos_ficha->periodo == '2 Trimestre') echo 'selected'?>>2 Trimestre</option>
                                                    <option value="3 Trimestre" <?php if ($datos_ficha->periodo == '3 Trimestre') echo 'selected'?>>3 Trimestre</option>
                                                    <option value="4 Trimestre" <?php if ($datos_ficha->periodo == '4 Trimestre') echo 'selected'?>>4 Trimestre</option>
                                                    <option value="1 Semestre" <?php if ($datos_ficha->periodo == '1 Semestre') echo 'selected'?>>1 Semestre</option>
                                                    <option value="2 Semestre" <?php if ($datos_ficha->periodo == '2 Semestre') echo 'selected'?>>2 Semestre</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4"> <!-- Fdes factura -->
                                            <div class="form-group form-group-default">
                                                <label>Desde</label>
                                                <input  type="date" name="fdes" value="<?= $datos_ficha->fdes ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4"> <!-- Fhas factura -->
                                            <div class="form-group form-group-default">
                                                <label>Hasta</label>
                                                <input type="date" name="fhas" value="<?= $datos_ficha->fhas ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Importe factura -->
                                            <div class="form-group form-group-default">
                                                <label>Importe</label>
                                                <input  type="number" name="importe" value="<?= $datos_ficha->importe ?>" step=".01" class="form-control" placeholder="Importe">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Servicios factura -->
                                            <div class="form-group form-group-default">
                                                <label>Servicio</label>
                                                <select class="form-control" name="idservicio">
                                                <?php foreach ($servicios->result() as $regserv): ?>
                                                    <option value="<?= $regserv->id; ?>" <?php if ($regserv->servicio == $datos_ficha->servicio) echo 'selected'?>><?= $regserv->servicio; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Lant factura -->
                                            <div class="form-group form-group-default">
                                                <label>Lectura Anterior</label>
                                                <input  type="number" name="lant" value="<?= $datos_ficha->lant ?>" class="form-control" placeholder="Lectura Anterior">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Lact factura -->
                                            <div class="form-group form-group-default">
                                                <label>Lectura Actual</label>
                                                <input  type="number" name="lact" value="<?= $datos_ficha->lact ?>" class="form-control" placeholder="Lectura Actual">
                                            </div>
                                        </div>

                                        <div class="col-md-12"> <!-- Asigna Piso a factura -->
                                            <div class="form-group form-group-default">
                                                <label>Edificio / Piso</label>
                                                <select class="form-control" name="idpiso">
                                                    <option value="null">Asigne un piso</option>
                                                <?php foreach ($pisos->result() as $regpisos): ?>
                                                    <option value="<?= $regpisos->id; ?>" <?php if ($regpisos->id == $datos_ficha->idpiso) echo 'selected'?>><?= $regpisos->nom_edificio.' / '.$regpisos->planta.' - '.$regpisos->puerta.' ESC: '.$regpisos->escalera; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer no-bd"> <!-- Botones -->
                                <button type="submit" id="addRowButton" class="btn btn-primary">Guardar</button>
                                <a href="<?= base_url() ?>Facturas"><button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button></a>
                            </div>
                        </form> <!-- fin del formulario -->

                    </div>
                <?php endif; ?>

                <!-- Tabla Principal inicio-->
                <?php if (!$ficha && !$edita): ?> <!-- Si se pide ficha no entra en Tabla -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"> <!-- Título de la Tabla y FORM Buscador -->
                                    <div class="row">
                                    
                                        <div class="col-md-6">
                                            <h3 class="card-title">Listado de Facturas</h3>
                                        </div>
                                        
                                        <div class="col-md-6"> <!-- Formulario de busqueda -->
                                            <form role="form" action="<?= base_url()?>Facturas/buscar" method="POST"> <!-- Formulario --> 
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
                                                    <th><label>Periodo - Des/Has</label></th>
                                                    <th><label>Lectura Ant-Act</label></th>
                                                    <th width="10%"><label>Acci&oacute;nes</label></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><label>N&uacute;mero</label></th>
                                                    <th><label>Fecha</label></th>
                                                    <th><label>Importe</label></th>
                                                    <th><label>Servicio</label></th>
                                                    <th><label>Periodo - Des/Has</label></th>
                                                    <th><label>Lectura Ant-Act</label></th>
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
                                                        <td><?= $registro->periodo; ?> <br> <?= $registro->fdes; ?>/<?= $registro->fhas; ?></td>
                                                        <td><?= $registro->lant; ?>-<?= $registro->lact; ?></td>

                                                        <td> <!-- Botones -->
                                                            <div class="form-button-action">
                                                                <button type="button" title="" class="btn btn-link btn-simple-danger" data-toggle="tooltip" data-original-title="Ver Ficha">
                                                                    <a href="<?= base_url()?>Facturas/ficha/<?= $registro->id; ?>"><i class="fa fa-book-reader"></i></a>
                                                                </button>
                                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Editar">
                                                                    <a href="<?= base_url()?>Facturas/editar/<?= $registro->id; ?>"><i class="fa fa-edit"></i></a>
                                                                </button>
                                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar">
                                                                    <a href="<?= base_url()?>Facturas/baja/<?= $registro->id; ?>"><i class="fa fa-times"></i></a>
                                                                </button>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?> 

                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                                
                                <div class="card-footer"> <!-- Pie de la tabla Paginador y mas datos -->
                                    <div class="row">

                                        <div class="col-md-4">
                                            <?= $this->pagination->create_links()?>
                                        </div>
                                        <div class="col-md-4">
                                            <p>1 de 400 pages</p>
                                        </div>

                                        <div class="col-md-4">  
                                            <div class="row justify-content-end">
                                                <button class="btn btn-primary btn-round ml-auto mb-3" data-toggle="modal" data-target="#addRowModal">
                                                    <i class="fa fa-plus"></i>
                                                    Factura
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Modal Formulario-->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Nueva
                                    </span>
                                    <span class="fw-light">
                                        Factura
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Datos Factura</p>

                                <form role="form" action="<?= base_url()?>Facturas/alta" method="POST"> <!-- Formulario --> 
                                    <div class="row">

                                        <div class="col-md-6"> <!-- Numero Factura -->
                                            <div class="form-group form-group-default">
                                                <label>Nº</label>
                                                <input type="text" name="numero" class="form-control" placeholder="Numero Factura">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Fecha Factura -->
                                            <div class="form-group form-group-default">
                                                <label>Fecha Facturaci&oacute;n</label>
                                                <input type="date" name="fechaf" value="<?= date('Y-m-d');?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4"> <!-- Periodo Factura -->
                                            <div class="form-group form-group-default">
                                                <label>Periodo</label>
                                                <select name="periodo" class="form-control">
                                                    <option value="Mensual">Mensual</option>
                                                    <option value="1 Bimestre">1 Bimestre</option>
                                                    <option value="2 Bimestre">2 Bimestre</option>
                                                    <option value="3 Bimestre">3 Bimestre</option>
                                                    <option value="4 Bimestre">4 Bimestre</option>
                                                    <option value="5 Bimestre">5 Bimestre</option>
                                                    <option value="6 Bimestre">6 Bimestre</option>
                                                    <option value="1 Trimestre">1 Trimestre</option>
                                                    <option value="2 Trimestre">2 Trimestre</option>
                                                    <option value="3 Trimestre">3 Trimestre</option>
                                                    <option value="4 Trimestre">4 Trimestre</option>
                                                    <option value="1 Semestre">1 Semestre</option>
                                                    <option value="2 Semestre">2 Semestre</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4"> <!-- Fdes Factura -->
                                            <div class="form-group form-group-default">
                                                <label>Desde</label>
                                                <input  type="date" name="fdes" value="<?= date('Y-m-d');?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4"> <!-- Fhas Factura -->
                                            <div class="form-group form-group-default">
                                                <label>Hasta</label>
                                                <input type="date" name="fhas" value="<?= date('Y-m-d');?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Importe Factura -->
                                            <div class="form-group form-group-default">
                                                <label>Importe</label>
                                                <input  type="number" name="importe" value="0" step=".01" class="form-control" placeholder="Importe">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Servicio Factura -->
                                            <div class="form-group form-group-default">
                                                <label>Servicio</label>
                                                <select class="form-control" name="idservicio">
                                                    <option value="null">Seleccione Servcio</option>
                                                <?php foreach ($servicios->result() as $regserv): ?>
                                                    <option value="<?= $regserv->id; ?>"><?= $regserv->servicio; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Lant Factura -->
                                            <div class="form-group form-group-default">
                                                <label>Lectura Anterior</label>
                                                <input  type="number" name="lant" value="0" class="form-control" placeholder="Lectura Anterior">
                                            </div>
                                        </div>

                                        <div class="col-md-6"> <!-- Lact Factura -->
                                            <div class="form-group form-group-default">
                                                <label>Lectura Actual</label>
                                                <input  type="number" name="lact" value="0" class="form-control" placeholder="Lectura Actual">
                                            </div>
                                        </div>

                                        <div class="col-md-12"> <!-- Asigna Piso a factura -->
                                            <div class="form-group form-group-default">
                                                <label>Edificio / Piso</label>
                                                <select class="form-control" name="idpiso">
                                                    <option value="null">Asigne un piso</option>
                                                <?php foreach ($pisos->result() as $regpisos): ?>
                                                    <option value="<?= $regpisos->id; ?>"><?= $regpisos->nom_edificio.' / '.$regpisos->planta.' - '.$regpisos->puerta.' ESC: '.$regpisos->escalera; ?></option>
                                                <?php endforeach; ?>
                                                </select>
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

            </div>

        </div> <!-- Fin del div del cuerpo principal -->
        
    </div>
</div>


