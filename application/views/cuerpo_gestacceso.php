
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> <!-- Titulo -->
                                <h3 class="card-title">Listado de Técnicos</h3>
                            </div>
                            
                            <div class="col-md-6"> <!-- Formulario Busqueda -->
                                <form role="form" action="<?= base_url('Gestaccesos/buscar')?>" method="POST"> <!-- Formulario --> 
                                    <div class="input-group input-group-sm hidden-xs" >
                                        <input tabindex="1" type="text" name="tecnic" class="form-control" placeholder="Buscar parcialmente por nombre, apellido, nick ó DNI">

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
                                            <td><?= $registro->nomcorto; ?></td>
                                            <td><?= $registro->nombres; ?></td>
                                            <td><?= $registro->apellidos; ?></td>
                                            <td><?= $registro->dni; ?></td>
                                            <td><?= $registro->telefono; ?></td>
                                            <td><a href="mailto:<?= $registro->mail; ?>"><?= $registro->mail; ?></a></td>

                                            <td> <!-- Acciones -->
                                                <div class="form-button-action">
                                                    <!-- Boton ver Ficha -->
                                                    <button type="button" title="" class="btn btn-link btn-simple-danger" data-toggle="tooltip" data-original-title="Ver Ficha">
                                                        <a href="<?= base_url('Gestaccesos/verficha/')?><?= $registro->id; ?>"><i class="fa fa-book-reader"></i></a>
                                                    </button>
                                                    <!-- Boton Editar -->
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Editar">
                                                        <a href="<?= base_url('Gestaccesos/editar/')?><?= $registro->id; ?>"><i class="fa fa-edit"></i></a>
                                                    </button>
                                                    <!-- Boton eliminar Ficha -->
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar">
                                                        <a href="<?= base_url('Gestaccesos/baja/')?><?= $registro->id; ?>"onclick="return confirmar('Realmente desea ELIMINAR este Técnico?')"><i class="fa fa-times"></i></a>
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
                                <div class="row justify-content-end">
                                    <button class="btn btn-primary btn-round ml-auto mb-3" data-toggle="modal" data-target="#addRowModal">
                                        <i class="fa fa-plus"></i>
                                        Usuario
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div> <!-- Fin del div del cuerpo principal -->

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
                                    Técnico
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Técnicos</p>

                            <form role="form" action="<?= base_url('Gestaccesos/alta') ?>" method="POST"> <!-- Formulario --> 
                                <div class="row">

                                    <div class="col-md-6"> <!-- Nombres -->
                                        <div class="form-group form-group-default">
                                            <label>Nombres</label>
                                            <input tabindex="2" type="text" name="nombres" class="form-control" placeholder="Nombres" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <!-- Apellidos -->
                                        <div class="form-group form-group-default">
                                            <label>Apellidos</label>
                                            <input tabindex="3" type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6"> <!-- DNI -->
                                        <div class="form-group form-group-default">
                                            <label>DNI</label>
                                            <input tabindex="4" type="text" name="dni" class="form-control" placeholder="Rellene con el DNI o NIE" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6"> <!-- Telefono -->
                                        <div class="form-group form-group-default">
                                            <label>Telefono</label>
                                            <input tabindex="5"  type="text" name="telefono" class="form-control" placeholder="Telefono" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6"> <!-- Nick -->
                                        <div class="form-group form-group-default">
                                            <label>Nombre Corto</label>
                                            <input tabindex="6" type="text" name="nomcorto" class="form-control" placeholder="Nombre Corto" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6"> <!-- mail -->
                                        <div class="form-group form-group-default">
                                            <label>Mail</label>
                                            <input tabindex="7" type="email" class="form-control" name="mail" placeholder="Ingrese el mail" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12"> <!-- Notas -->
                                        <div class="form-group form-group-default">
                                            <label>Notas</label>
                                            <textarea tabindex="8" class="form-control" name="comentario" placeholder="Escriba aqui sus Notas" rows="5"></textarea>
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
    </div>


