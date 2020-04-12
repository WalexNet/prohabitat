                   <div class="page-category">
                       <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
                       <div class="container-fluid">
                           <!-- Tarjeta/Ficha Datos Edificio -->
                           <?php if ($ficha) : ?>
                               <!-- Si se pide ficha muestra ficha -->
                               <div class="row">
                                   <div class="col-md-12">
                                       <!-- Ancho de la Tarjeta -->
                                       <div class="card card-post card-round">
                                           <!-- Creamos la Tarjeta -->
                                           <div class="card-header">
                                               <!-- Header de la Tarjeta -->
                                               <label>DATOS DEL EDIFICIO</label>
                                           </div>
                                           <div class="card-body">
                                               <!-- Body de la Tarjeta -->

                                               <div class="row">
                                                   <div class="col-md-3">
                                                       <!-- Nombre -->
                                                       <label>Nombre</label>
                                                       <p><?= $datos_ficha->nombre ?></p>
                                                   </div>
                                                   <div class="col-md-3">
                                                       <!-- Dirección -->
                                                       <label>Direcci&oacute;n</label>
                                                       <p><?= $datos_ficha->direccion ?></p>
                                                   </div>
                                                   <div class="col-md-3">
                                                       <!-- Código Postal -->
                                                       <label>C&oacute;digo Postal</label>
                                                       <p><?= $datos_ficha->cp ?></p>
                                                   </div>
                                                   <div class="col-md-3">
                                                       <!-- Población -->
                                                       <label>Poblaci&oacute;n</label>
                                                       <p><?= $datos_ficha->poblacion ?></p>
                                                   </div>
                                               </div>

                                               <div class="separator-solid"></div>

                                               <div class="col-md-12">
                                                   <!-- Comentarios -->
                                                   <div class="info-post">
                                                       <label>Comentarios</label>
                                                       <p class="card-text"><?= $datos_ficha->notas ?></p>
                                                   </div>
                                               </div>
                                               <div class="separator-solid"></div>

                                               <div class="row">
                                                   <div class="col-md-6">
                                                       <label>Pisos asociados:</label>
                                                   </div>
                                                   <div class="col-md-6 text-right">

                                                       <button class="btn btn-primary btn-round ml-auto mb-3" data-toggle="modal" data-target="#addPiso">
                                                           <i class="fa fa-plus"></i>
                                                           A&ntilde;ade pisos a este edifcio
                                                       </button>


                                                   </div>
                                               </div>

                                               <div class="separator-solid"></div>

                                               <?php if ($datos_ficha->idpisos) : ?>
                                                   <!-- Si tiene pisos asociados los mostramos -->

                                                   <div class="table-responsive">
                                                       <!-- Mostramos la tabla con pisos si los tuviera -->
                                                       <table class="display table table-hover">
                                                           <thead>
                                                               <tr>
                                                                   <th><label>Escalera</label></th>
                                                                   <th><label>Planta</label></th>
                                                                   <th><label>Puerta</label></th>
                                                                   <th><label>Notas</label></th>
                                                                   <th width="10%"><label>Acci&oacute;nes</label></th>
                                                               </tr>
                                                           </thead>
                                                           <tfoot>
                                                               <tr>
                                                                   <th><label>Escalera</label></th>
                                                                   <th><label>Planta</label></th>
                                                                   <th><label>Puerta</label></th>
                                                                   <th><label>Notas</label></th>
                                                                   <th width="10%"><label>Acci&oacute;nes</label></th>
                                                               </tr>
                                                           </tfoot>
                                                           <tbody>
                                                               <!-- Cuerpo de la tabla -->

                                                               <?php foreach ($ficha_pisos->result() as $registro) : ?>
                                                                   <tr>
                                                                       <td><?= $registro->escalera; ?></td>
                                                                       <td><?= $registro->planta; ?></td>
                                                                       <td><?= $registro->puerta; ?></td>
                                                                       <td><?= $registro->notaspiso; ?></td>
                                                                       <td>
                                                                           <!-- Botones -->
                                                                           <div class="form-button-action">
                                                                               <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Editar">
                                                                                   <a href="<?= base_url() ?>Pisos/editar/<?= $registro->idpisos; ?>"><i class="fa fa-edit"></i></a>
                                                                               </button>
                                                                               <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar">
                                                                                   <a href="<?= base_url() ?>Pisos/baja/<?= $registro->idpisos; ?>/<?= $registro->id; ?>" onclick="return confirmar('Realmente desea ELIMINAR este piso?')"><i class="fa fa-times"></i></a>
                                                                               </button>
                                                                           </div>
                                                                       </td>
                                                                   </tr>
                                                               <?php endforeach; ?>

                                                           </tbody>
                                                       </table>
                                                   </div>
                                               <?php else : ?>
                                                   <!-- Si NO tiene pisos asociados mostramos mensaje de no los tiene -->

                                                   <div class="alert alert-warning" role="alert">
                                                       Este edificio todav&iacute;a no tiene pisos asociados
                                                   </div>

                                               <?php endif; ?>

                                           </div>
                                           <div class="card-footer">
                                               <!-- Footer de la Tarjeta -->
                                               <a href="<?= base_url() ?>Edificios"><button type="button" class="btn btn-danger">Cerrar</button></a>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                               <!-- Modal Formulario-->
                               <div class="modal fade" id="addPiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                               <form role="form" action="<?= base_url() ?>Pisos/alta/TRUE" method="POST">
                                                   <!-- Formulario -->
                                                   <div class="row">
                                                       <input type="hidden" name="idEdificio" value="<?= $datos_ficha->id ?>">
                                                       <div class="col-md-12">
                                                           <!-- Escalera -->
                                                           <div class="form-group form-group-default">
                                                               <label>Escalera:</label>
                                                               <input type="text" name="escalera" class="form-control" placeholder="Nro o Letra de escalera">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-12">
                                                           <!-- Planta -->
                                                           <div class="form-group form-group-default">
                                                               <label>Planta </label>
                                                               <input type="text" name="planta" class="form-control" placeholder="Nro o letra de Planta">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-12">
                                                           <!-- Puerta -->
                                                           <div class="form-group form-group-default">
                                                               <label>Puerta</label>
                                                               <input type="text" name="puerta" class="form-control" placeholder="Nro o letra de puerta">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-12">
                                                           <!-- Notas -->
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

                           <?php endif; ?>

                           <!-- Tabla Principal inicio-->
                           <?php if (!$ficha && !$edita) : ?>
                               <!-- Si se pide ficha o edicion, no entra en Tabla -->
                               <div class="row"><!-- Tabla -->
                                   <div class="col-md-12">
                                       <div class="card">
                                           <div class="card-header"><!-- Título de la Tabla y FORM Buscador -->
                                               <div class="row">
                                                   <!-- Row Formulario-->
                                                   <div class="col-md-6">
                                                       <h3 class="card-title">Listado de Edificios</h3>
                                                   </div>
                                                   <div class="col-md-6"> <!-- Formulario de busqueda -->
                                                       <form role="form" action="<?= base_url() ?>Edificios/buscar" method="POST">
                                                           <!-- Formulario -->
                                                           <div class="input-group input-group-sm hidden-xs">
                                                               <input type="text" name="buscar_edificio" class="form-control" placeholder="Busca Edificios por N&oacute;mbre o calle">

                                                               <div class="input-group-btn">
                                                                   <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                               </div>
                                                           </div>
                                                       </form>
                                                   </div>

                                               </div>
                                           </div>

                                           <div class="card-body"><!-- Aqui va la tabla -->
                                               <div class="table-responsive">
                                                   <table class="display table table-hover" cellspacing="0" width="100%">
                                                       <thead>
                                                           <tr>
                                                               <th><label>Nombre</label></th>
                                                               <th><label>Direcci&oacute;n</label></th>
                                                               <th><label>CP</label></th>
                                                               <th><label>Poblaci&oacute;n</label></th>
                                                               <th width="10%"><label>Acci&oacute;nes</label></th>
                                                           </tr>
                                                       </thead>
                                                       <tfoot>
                                                           <tr>
                                                               <th><label>Nombre</label></th>
                                                               <th><label>Direcci&oacute;n</label></th>
                                                               <th><label>CP</label></th>
                                                               <th><label>Poblaci&oacute;n</label></th>
                                                               <th width="10%"><label>Acci&oacute;nes</label></th>
                                                           </tr>
                                                       </tfoot>
                                                       <tbody> <!-- Cuerpo de la tabla -->

                                                           <?php foreach ($consulta->result() as $registro) : ?>
                                                               <tr>
                                                                   <td><?= $registro->nombre; ?></td>
                                                                   <td><?= $registro->direccion; ?></td>
                                                                   <td><?= $registro->cp; ?></td>
                                                                   <td><?= $registro->poblacion; ?></td>
                                                                   <td>
                                                                       <!-- Botones -->
                                                                       <div class="form-button-action">
                                                                           <!-- Ver Ficha -->
                                                                           <button type="button" title="" class="btn btn-link btn-simple-danger" data-toggle="tooltip" data-original-title="Ver Ficha">
                                                                               <a href="<?= base_url() ?>Edificios/ficha/<?= $registro->id; ?>"><i class="fa fa-book-reader"></i></a>
                                                                           </button>
                                                                           <!-- Editar -->
                                                                           <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Editar">
                                                                               <a href="<?= base_url() ?>Edificios/editar/<?= $registro->id; ?>"><i class="fa fa-edit"></i></a>
                                                                           </button>
                                                                           <!-- Eliminar -->
                                                                           <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar">
                                                                               <a href="<?= base_url() ?>Edificios/baja/<?= $registro->id; ?>"><i class="fa fa-times" onclick="return confirmar('Realmente desea ELIMINAR este edificio?')"></i></a>
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

                                                   <div class="col-md-4"> <!-- Paginacion -->
                                                       <?php if ($paginacion) : ?>
                                                           <?= $this->pagination->create_links() ?>
                                                       <?php endif; ?>
                                                   </div>

                                                   <div class="col-md-4"> <!-- Informcaion -->
                                                       <div class="row justify-content-center">
                                                           <p>1 de 400 pages</p>
                                                       </div>
                                                   </div>

                                                   <DIV class="col-md-4"> <!-- Boton Añade edificio -->
                                                       <div class="row justify-content-end">
                                                           <button class="btn btn-primary btn-round ml-auto mb-3" data-toggle="modal" data-target="#addEdificio">
                                                               <i class="fa fa-plus"></i>
                                                               Edificio
                                                           </button>
                                                       </div>
                                                   </DIV>

                                               </div>
                                           </div>
                                       </div> <!-- Fin Card-->
                                   </div>
                               </div>

                               <!-- Formulario Modal Edificios-->
                               <div class="modal fade" id="addEdificio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header no-bd">
                                               <h5 class="modal-title">
                                                   <span class="fw-mediumbold">
                                                       Nuevo
                                                   </span>
                                                   <span class="fw-light">
                                                       Edificio
                                                   </span>
                                               </h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body"><!-- Formulario -->
                                               <p class="small">Datos Edificio</p>
                                               <form role="form" action="<?= base_url() ?>Edificios/alta" method="POST">
                                                   <div class="row">

                                                       <div class="col-md-12"><!-- Nombre Edificio -->
                                                           <div class="form-group form-group-default">
                                                               <label>Nombre</label>
                                                               <input type="text" name="nombre" class="form-control" placeholder="Nombre Edificio">
                                                           </div>
                                                       </div>

                                                       <div class="col-md-12"><!-- Dirección -->
                                                           <div class="form-group form-group-default">
                                                               <label>Direcci&oacute;n</label>
                                                               <input type="text" name="direccion" placeholder="Direcci&oacute;n del Edificio" class="form-control">
                                                           </div>
                                                       </div>

                                                       <div class="col-md-4"><!-- CP -->
                                                           <div class="form-group form-group-default">
                                                               <label>C&oacute;digo Postal</label>
                                                               <input type="text" name="cp" class="form-control" placeholder="C&oacute;digo Postal">
                                                           </div>
                                                       </div>

                                                       <div class="col-md-8"><!-- Población -->
                                                           <div class="form-group form-group-default">
                                                               <label>Poblaci&oacute;n</label>
                                                               <input type="text" name="poblacion" class="form-control" placeholder="Poblaci&oacute;n">
                                                           </div>
                                                       </div>

                                                       <div class="col-md-12"><!-- Notas sobre el edificio -->
                                                           <div class="form-group form-group-default">
                                                               <label>Notas</label>
                                                               <textarea class="form-control" name="comentario" placeholder="Escriba aqui sus Notas" rows="5"></textarea>
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

                           <?php endif; ?>

                           <!-- Formulario de edicion-->
                           <?php if ($edita) : ?>
                               <div class="card">
                                   <div class="card-header">
                                       <div class="card-title">
                                           Modifique los datos del Edificio:
                                       </div>
                                   </div>

                                   <form role="form" action="<?= base_url() ?>Edificios/modificar" method="POST">
                                       <!-- Formulario -->
                                       <input type="hidden" name="id" value="<?= $datos_ficha->id ?>">
                                       <div class="row">
                                           <div class="card-body">
                                               <div class="row">
                                                   <div class="col-md-12">
                                                       <!-- Nombre Edificio -->
                                                       <div class="form-group form-group-default">
                                                           <label>Nombre</label>
                                                           <input type="text" name="nombre" class="form-control" value="<?= $datos_ficha->nombre ?>" placeholder="Nombre Edificio">
                                                       </div>
                                                   </div>

                                                   <div class="col-md-12">
                                                       <!-- Dirección -->
                                                       <div class="form-group form-group-default">
                                                           <label>Direcci&oacute;n</label>
                                                           <input type="text" name="direccion" value="<?= $datos_ficha->direccion ?>" placeholder="Direcci&oacute;n del Edificio" class="form-control">
                                                       </div>
                                                   </div>

                                                   <div class="col-md-4">
                                                       <!-- CP -->
                                                       <div class="form-group form-group-default">
                                                           <label>C&oacute;digo Postal</label>
                                                           <input type="text" name="cp" value="<?= $datos_ficha->cp ?>" class="form-control" placeholder="C&oacute;digo Postal">
                                                       </div>
                                                   </div>

                                                   <div class="col-md-8">
                                                       <!-- Población -->
                                                       <div class="form-group form-group-default">
                                                           <label>Poblaci&oacute;n</label>
                                                           <input type="text" name="poblacion" value="<?= $datos_ficha->poblacion ?>" class="form-control" placeholder="Poblaci&oacute;n">
                                                       </div>
                                                   </div>

                                                   <div class="col-md-12">
                                                       <!-- Notas sobre el edificio -->
                                                       <div class="form-group form-group-default">
                                                           <label>Notas</label>
                                                           <textarea class="form-control" name="comentario" placeholder="Escriba aqui sus Notas" rows="5"><?= $datos_ficha->notas ?></textarea>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="card-footer">
                                           <button type="submit" id="addRowButton" class="btn btn-primary">Modificar</button>
                                           <a href="<?= base_url() ?>Edificios"><button type="button" class="btn btn-danger">Cerrar</button></a>
                                       </div>
                                   </form> <!-- fin del formulario -->

                               </div>
                           <?php endif; ?>
                       </div> <!-- Fin container fluid -->

                   </div> <!-- Fin del div del cuerpo principal -->

                   </div>
                   </div>