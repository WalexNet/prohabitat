
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
                <div class="container-fluid">

                    <!-- Tarjeta Datos Inquilino-->
                    <?php if ($ficha): ?>
                        <div class="row">
                            <div class="col-md-12"> <!-- Ancho de la Tarjeta -->
                                <div class="card card-post card-round">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="icon-preview float-left mr-2">
                                                <i class="icon-user text-success fa-2x"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-post">
                                                    <label>Nombres y Apellidos</label>
                                                    <p ><?= $datos_ficha->nombres ?>, <?= $datos_ficha->apellidos ?></p>
                                                    <label>Alias</label>
                                                    <p><?= $datos_ficha->nick ?></p>
                                                    <label>DNI/NIE/NIF</label>
                                                    <p><?= $datos_ficha->dni ?></p>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-post">
                                                    <label>Tel&eacute;fono</label>
                                                    <p><?= $datos_ficha->telefono ?></p>
                                                    <label>Correo electr&oacute;nico</label>
                                                    <p><?= $datos_ficha->mail ?></p>
                                                    <label>PAX</label>
                                                    <p><?= $datos_ficha->pax ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator-solid"></div>
                                        <p class="card-category text-info mb-1"><label>Comentarios</label>
                                        
                                        <p class="card-text"><?= $datos_ficha->comentario ?></p>
                                        <div class="separator-solid"></div>

                                        <a href="<?= base_url()?>Inquilinos"> <!-- Boton Cerrar -->
                                            <button class="btn btn-success">
                                                <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                Listado
                                            </button>
                                        </a>


                                        <a href="<?= base_url()?>Inquilinos/editar/<?= $datos_ficha->id?>"> <!-- Boton Editar -->
                                            <button class="btn btn-secondary">
                                                <span class="btn-label">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                                Editar
                                            </button>
                                        </a>


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
                                    Modifique los datos de:
                                    <p><?= $datos_ficha->nombres ?>, <?= $datos_ficha->apellidos ?></p>
                                </div>
                            </div>
                            <form role="form" action="<?= base_url()?>Inquilinos/modificar" method="POST"> <!-- Formulario --> 
                                <input type="hidden"  name="id" value="<?= $datos_ficha->id ?>">   
                                <div class="row">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12"> <!-- Nombres Inquilino -->
                                                <div class="form-group form-group-default">
                                                    <label>Nombres</label>
                                                    <input type="text" name="nombre" class="form-control" value="<?= $datos_ficha->nombres ?>" placeholder="Rellene con sus nombres">
                                                </div>
                                            </div>

                                            <div class="col-md-12"> <!-- Apellidos Inquilino -->
                                                <div class="form-group form-group-default">
                                                    <label>Apellidos</label>
                                                    <input type="text" name="apellido" class="form-control" value="<?= $datos_ficha->apellidos ?>" placeholder="Rellene con sus Apellidos">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> <!-- DNI Inquilino -->
                                                <div class="form-group form-group-default">
                                                    <label>DNI</label>
                                                    <input type="text" name="dni" class="form-control" value="<?= $datos_ficha->dni ?>" placeholder="Rellene con su DNI o NIE">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> <!-- Telefono Inquilino -->
                                                <div class="form-group form-group-default">
                                                    <label>Telefono</label>
                                                    <input  type="text" name="telefono" class="form-control" value="<?= $datos_ficha->telefono ?>" placeholder="Rellene con su telefono">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> <!-- Nick Inquilino -->
                                                <div class="form-group form-group-default">
                                                    <label>Nombre Corto</label>
                                                    <input type="text" name="nick" class="form-control" value="<?= $datos_ficha->nick ?>" placeholder="Rellene con un Nick">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> <!-- PAX Inquilino -->
                                                <div class="form-group form-group-default">
                                                    <label>PAX</label>
                                                    <input  type="number" name="pax" class="form-control" min="0" max="2" value="<?= $datos_ficha->pax ?>" step=".05" placeholder="Ingrese PAX">
                                                </div>
                                            </div>

                                            <div class="col-md-12"> <!-- Mial Inquilino -->
                                                <div class="form-group form-group-default">
                                                    <label>Mail</label>
                                                    <input type="email" class="form-control" name="mail" value="<?= $datos_ficha->mail ?>" placeholder="Rellene con su correo electr&oacute;nico">
                                                </div>
                                            </div>

                                            <div class="col-md-12"> <!-- Notas Inquilino -->
                                                <div class="form-group form-group-default">
                                                    <label>Notas</label>
                                                    <textarea class="form-control" name="comentario" rows="5"><?= $datos_ficha->comentario ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="<?= base_url()?>Inquilinos"><button type="button" class="btn btn-danger" >Cerrar</button></a>
                                    
                                </div>
                            </form> <!-- fin del formulario edicion-->
                        </div>
                    <?php endif; ?>

                    <!-- Tabla Principal inicio-->
                    <?php if (!$ficha && !$edita): ?> <!-- Si no es ficha y no edita no entra en Tabla -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"> <!-- Título de la Tabla y FORM Buscador -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="card-title">Listado de Usuarios</h3>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <form role="form" action="<?= base_url()?>Inquilinos/buscar" method="POST"> <!-- Formulario --> 
                                                    <div class="input-group input-group-sm hidden-xs" >
                                                        <input type="text" name="buscar_inquilino" class="form-control" placeholder="Buscar">

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
                                                        <th><label>Nick</label></th>
                                                        <th><label>Nombres</label></th>
                                                        <th><label>Apellidos</label></th>
                                                        <th><label>DNI</label></th>
                                                        <th><label>Tel&eacute;fono</label></th>
                                                        <th><label>Mail</label></th>
                                                        <th width="10%"><label>Acciones</label></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><label>Nick</label></th>
                                                        <th><label>Nombres</label></th>
                                                        <th><label>Apellidos</label></th>
                                                        <th><label>DNI</label></th>
                                                        <th><label>Tel&eacute;fono</label></th>
                                                        <th><label>Mail</label></th>
                                                        <th width="10%"><label>Acciones</label></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody> <!-- Cuerpo de la tabla -->
                                                
                                                    <?php foreach ($consulta->result() as $registro): ?>
                                                        <tr>
                                                            <td><?= $registro->nick; ?></td>
                                                            <td><?= $registro->nombres; ?></td>
                                                            <td><?= $registro->apellidos; ?></td>
                                                            <td><?= $registro->dni; ?></td>
                                                            <td><?= $registro->telefono; ?></td>
                                                            <td><a href="mailto:<?= $registro->mail; ?>"><?= $registro->mail; ?></a></td>

                                                            <td>
                                                                <div class="form-button-action">
                                                                    <button type="button" title="" class="btn btn-link btn-simple-danger" data-toggle="tooltip" data-original-title="Ver Ficha">
                                                                        <a href="<?= base_url()?>Inquilinos/ficha/<?= $registro->id; ?>"><i class="fa fa-book-reader"></i></a>
                                                                    </button>
                                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Editar">
                                                                        <a href="<?= base_url()?>Inquilinos/editar/<?= $registro->id; ?>"><i class="fa fa-edit"></i></a>
                                                                    </button>
                                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar">
                                                                        <a href="<?= base_url()?>Inquilinos/baja/<?= $registro->id; ?>"onclick="return confirmar('Realmente desea ELIMINAR este usuario?')"><i class="fa fa-times"></i></a>
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
                                            <div class="col-sm-4">
                                                <?php if($paginacion): ?>
                                                <?= $this->pagination->create_links()?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>1 de 400 pages</p>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="row justify-content-end">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addRowModal">
                                                        <i class="fa fa-plus"></i>
                                                        Usuario
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
                                            Nuevo
                                        </span>
                                        <span class="fw-light">
                                            Inquilino
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Datos del nuevo Inquilino</p>

                                    <form role="form" action="<?= base_url()?>Inquilinos/alta" method="POST"> <!-- Formulario --> 
                                        <div class="row">

                                            <div class="col-md-12"> <!-- Nombres -->
                                                <div class="form-group form-group-default">
                                                    <label>Nombres</label>
                                                    <input type="text" name="nombre" class="form-control" placeholder="Rellene con sus nombres">
                                                </div>
                                            </div>
                                            <div class="col-md-12"> <!-- Apellidos -->
                                                <div class="form-group form-group-default">
                                                    <label>Apellidos</label>
                                                    <input type="text" name="apellido" class="form-control" placeholder="Rellene con sus Apellidos">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> <!-- DNI -->
                                                <div class="form-group form-group-default">
                                                    <label>DNI</label>
                                                    <input type="text" name="dni" class="form-control" placeholder="Rellene con su DNI o NIE">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> <!-- Telefono -->
                                                <div class="form-group form-group-default">
                                                    <label>Telefono</label>
                                                    <input  type="text" name="telefono" class="form-control" placeholder="Rellene con su telefono">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> <!-- Nick -->
                                                <div class="form-group form-group-default">
                                                    <label>Nombre Corto</label>
                                                    <input type="text" name="nick" class="form-control" placeholder="Rellene con un Nick">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> <!-- PAX -->
                                                <div class="form-group form-group-default">
                                                    <label>PAX</label>
                                                    <input  type="number" name="pax" class="form-control" min="0" max="10" value="1" step=".5" placeholder="Ingrese PAX">
                                                </div>
                                            </div>

                                            <div class="col-md-12"> <!-- mail -->
                                                <div class="form-group form-group-default">
                                                    <label>Mail</label>
                                                    <input type="email" class="form-control" name="mail" placeholder="Rellene con su correo electr&oacute;nico">
                                                </div>
                                            </div>

                                            <div class="col-md-12"> <!-- Notas -->
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


                </div>

 
            </div> <!--  Fin del div del cuerpo principal -->
            
        </div>
    </div>
