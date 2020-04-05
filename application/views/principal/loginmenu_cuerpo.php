<!-- Sidebar y Menu lateral-->
<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <!-- Estos son los datos del login, en este caso el Administrador -->
            <div class="user">
                <div class="icon-preview float-left mr-2">
                    <i class="icon-user fa-2x"></i>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#login" aria-expanded="true">
                        <span>
                            Bienvenido: Admin
                            <span class="user-level">Administrador</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="login">
                        <ul class="nav">
                            <li>
                                <a href="#">
                                    <span class="link-collapse">Cerrar Cesi&oacute;n</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <!-- Fin de los datos Login -->
            
            <ul class="nav nav-primary">
                <!-- estas son todas las opciones del menú -->
                <li class="nav-section"> <!-- Marca las Secciones del Menú -->
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menú Principal</h4>
                </li>

                <li class="nav-item"> <!-- Seccion Archivos-->
                    <a data-toggle="collapse" href="#archivos">
                        <i class="fas fa-layer-group"></i>
                        <p>Archivos</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="archivos">
                        <ul class="nav nav-collapse">
                            <li> <!-- Inquilinos -->
                                <a href="<?= base_url()?>Inquilinos">
                                    <span class="sub-item">Usuarios</span>
                                </a>
                            </li>

                            <li> <!-- Faturas -->
                                <a href="<?= base_url()?>Facturas">
                                    <span class="sub-item">Facturas</span>
                                </a>
                            </li>

                            <li> <!-- Edificios -->
                                <a href="<?= base_url()?>Edificios">
                                    <span class="sub-item">Edificios</span>
                                </a>
                            </li>

                            <li> <!-- Pisos -->
                                <a href="<?= base_url()?>Pisos">
                                    <span class="sub-item">Pisos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item"> <!-- Estadísticas-->
                    <a href="<?= base_url()?>Estadisticas">
                        <i class="far fa-chart-bar"></i>
                        <p>Estad&iacute;sticas</p>
                    </a>
                </li>

                <li class="nav-item"> <!-- Entradas/Salidas -->
                    <a href="<?= base_url()?>Entsal">
                        <i class="fas fa-exchange-alt"></i>
                        <p>Entradas/Salidas</p>
                    </a>
                </li> 

                <li class="nav-item"> <!-- Pagos -->
                    <a href="<?= base_url()?>Pagos">
                        <i class="fas fa-donate"></i>
                        <p>Pagos</p>
                    </a>
                </li> 

            </ul> <!-- aqui terminan las opciones del menú -->

        </div>
    </div>
</div>
<!-- End Sidebar -->