
                   
            <div class="page-category"> <!-- Dentro de este DIV es donde ponemos los componentes o sea, nuestro cuerpo de accion -->
            
                <div class="card">
                <form action="<?= base_url()?>Inicio/login" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="card-header">
                        <h2 class="card-title">Ingrese sus datos para trabajar</h2>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" name="usr" class="form-control" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="fas fa-passport"></i>
                                    </span>
                                <input type="password" name="psw" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
                </div>

            </div> <!-- Fin del div del cuerpo principal -->
            
        </div>
    </div>


