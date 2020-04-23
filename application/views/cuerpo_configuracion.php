
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->

                <h2 class="text-white-50">Tablas de configuración</h2>

                <div class="row">
                    <div class="col-md-6"> <!-- Sectores -->
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Sectores</h2>
                            </div>
                            
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="display table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%"><label>Quitar</label></th>
                                                <th><label>Descripción</label></th>
                                            </tr>
                                        </thead>
                                        <tbody> <!-- Cuerpo de la tabla -->
                                        
                                            <?php foreach ($sector as $linea): ?>
                                                <tr>
                                                    <td width="5%"> <!-- Botones -->
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Elimina Sector">
                                                                <a href="<?= base_url('Configuracion/delSector/')?><?= $linea->id; ?>" onclick="return confirmar('Realmente desea ELIMINAR este Sector?')"><i class="fa fa-times"></i></a>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td><?= $linea->des; ?></td>
                                                </tr>
                                            <?php endforeach; ?> 

                                        </tbody>
                                    </table>
                                </div> 

                            </div>

                            <div class="card-footer">
                                <form role="form" action="<?= base_url('Configuracion/addsector')?>" method="POST"> <!-- Formulario addSector--> 
                                    <div class="input-group input-group-sm hidden-xs" >
                                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese nuevo sector">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6"> <!-- Tipologías -->
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Tipologías</h2>
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%"><label>Quitar</label></th>
                                                <th><label>Descripción</label></th>
                                            </tr>
                                        </thead>
                                        <tbody> <!-- Cuerpo de la tabla -->
                                        
                                            <?php foreach ($tipologia as $linea): ?>
                                                <tr>
                                                    <td width="5%"> <!-- Botones -->
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Elimina Tipologia">
                                                                <a href="<?= base_url('Configuracion/delTipologia/')?><?= $linea->id; ?>" onclick="return confirmar('Realmente desea ELIMINAR esta Tipologia?')"><i class="fa fa-times"></i></a>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td><?= $linea->des; ?></td>
                                                </tr>
                                            <?php endforeach; ?> 

                                        </tbody>
                                    </table>
                                </div> 
                            </div>

                            <div class="card-footer">
                                <form role="form" action="<?= base_url('Configuracion/addTipologia')?>" method="POST"> <!-- Formulario addSector--> 
                                    <div class="input-group input-group-sm hidden-xs" >
                                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese nueva Tipologia">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> <!-- Estados -->
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Estados</h2>
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%"><label>Quitar</label></th>
                                                <th><label>Descripción</label></th>
                                            </tr>
                                        </thead>
                                        <tbody> <!-- Cuerpo de la tabla -->
                                        
                                            <?php foreach ($estados as $linea): ?>
                                                <tr>
                                                    <td width="5%"> <!-- Botones -->
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Elimina Estado">
                                                                <a href="<?= base_url('Configuracion/delEstado/')?><?= $linea->id; ?>" onclick="return confirmar('Realmente desea ELIMINAR este Estado?')"><i class="fa fa-times"></i></a>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td><?= $linea->des; ?></td>
                                                </tr>
                                            <?php endforeach; ?> 

                                        </tbody>
                                    </table>
                                </div> 
                            </div>

                            <div class="card-footer">
                                <form role="form" action="<?= base_url('Configuracion/addEstado')?>" method="POST"> <!-- Formulario addSector--> 
                                    <div class="input-group input-group-sm hidden-xs" >
                                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese nuevo Estado">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6"> <!-- Servicios -->
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Servicios</h2>
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%"><label>Quitar</label></th>
                                                <th><label>Descripción</label></th>
                                            </tr>
                                        </thead>
                                        <tbody> <!-- Cuerpo de la tabla -->
                                        
                                            <?php foreach ($servicios as $linea): ?>
                                                <tr>
                                                    <td width="5%"> <!-- Botones -->
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Elimina Servicio">
                                                                <a href="<?= base_url('Configuracion/delServicio/')?><?= $linea->id; ?>" onclick="return confirmar('Realmente desea ELIMINAR este Servicio?')"><i class="fa fa-times"></i></a>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td><?= $linea->des; ?></td>
                                                </tr>
                                            <?php endforeach; ?> 

                                        </tbody>
                                    </table>
                                </div> 
                            </div>

                            <div class="card-footer">
                                <form role="form" action="<?= base_url('Configuracion/addServicio')?>" method="POST"> <!-- Formulario addSector--> 
                                    <div class="input-group input-group-sm hidden-xs" >
                                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese nuevo Servicio">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


