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
                            Bienvenido: <?= ($this->session->login) ? $this->session->usr : 'invitado'; ?>
                            <span class="user-level"><?= ($this->session->login) ? $this->session->descnivel : 'No Autorizado'; ?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="login">
                        <ul class="nav">
                            <li>
                                <?php if ($this->session->login): ?>
                                    <a href="<?= base_url()?>Inicio/logout">
                                        <span class="link-collapse">Cerrar Cesi&oacute;n</span>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= base_url()?>Inicio/login">
                                        <span class="link-collapse">Inicie Cesi&oacute;n</span>
                                    </a>
                                <?php endif ?>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <!-- Fin de los datos Login -->
            
            <ul class="nav nav-primary ">
                <!-- estas son todas las opciones del menú -->
                <li class="nav-section"> <!-- Marca las Secciones del Menú -->
                    <h4 class="text-section">Menú Principal</h4>
                </li>

                <?php if ($this->session->login): ?>
                    <?php if ($this->session->nivel == 0): ?> <!-- Seccion Administrador-->
                        <li class="nav-item"> 
                            <a data-toggle="collapse" href="#admin">
                                <i class="fas fa-diagnoses"></i>
                                <p>Administración</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="admin">
                                <ul class="nav nav-collapse">

                                    <li> <!-- Datos Empresa -->
                                        <a href="<?= base_url('Administrador')?>">
                                            <span class="sub-item">Datos Empresa</span>
                                        </a>
                                    </li>

                                    <li> <!-- Gestion de Accesos -->
                                        <a href="<?= base_url('Gestaccesos')?>">
                                            <span class="sub-item">Técnicos / Accessos</span>
                                        </a>
                                    </li>

                                    <li> <!-- Configuracion de Datos, (Sector, Tipologia, Estados y Servicios) -->
                                        <a href="<?= base_url('Configuracion')?>">
                                            <span class="sub-item">Configuración</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    <?php endif ?>

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

                                <!-- Estas tablas son de Insidencias y alquileres -->
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

                                <!-- *********************************************** -->
                                <!-- Estas Tablas son exclusivas de las incidencias  -->
                                <li> <!-- Aseguradoras -->
                                    <a href="<?= base_url('Aseguradora')?>">
                                        <span class="sub-item">Aseguradoras</span>
                                    </a>
                                </li>

                                <li> <!-- Polizas -->
                                    <a href="<?= base_url('Poliza')?>">
                                        <span class="sub-item">Pólizas</span>
                                    </a>
                                </li>

                                <li> <!-- Profesionales -->
                                    <a href="<?= base_url('Profesional')?>">
                                        <span class="sub-item">Profesionales</span>
                                    </a>
                                </li>
                                <!-- *********************************************** -->
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item"> <!-- Informes-->
                        <a data-toggle="collapse" href="#info">
                            <i class="far fa-chart-bar"></i>
                            <p>informes</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="info"> <!-- Estado Facturas e Incidencias -->
                            <ul class="nav nav-collapse">

                                <li> <!-- Estado Facturas -->
                                    <a href="<?= base_url('Estadofacturas')?>">
                                        <span class="sub-item">Estado Facturas</span>
                                    </a>
                                </li>
                                <li> <!-- Estado Incidencas -->
                                    <a href="<?= base_url('#')?>">
                                        <span class="sub-item">Estado Incidencias</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
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
                            <p>Pagos de Facturas Servicios</p>
                        </a>
                    </li> 

                    <!-- Opciones Para sistema de Incidencias -->
                    <li class="nav-item"> <!-- Menú Incidencias -->
                        <a data-toggle="collapse" href="#incidencias">
                            <i class="fas fa-ambulance"></i>
                            <p>Incidencias</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="incidencias">
                            <ul class="nav nav-collapse">
                                
                                <li> <!-- Alta Incidencia -->
                                    <a href="<?= base_url('Incidencias/#')?>">
                                        <span class="sub-item">Alta</span>
                                    </a>
                                </li>

                                <li> <!-- Seguimiento -->
                                    <a href="<?= base_url()?>#">
                                        <span class="sub-item">Seguimiento</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                <?php endif ?>
                
                <li class="nav-item"> <!-- Salir -->
                    <a href="<?= base_url()?>Inicio/logout">
                        <i class="fas fa-door-open"></i>
                        <p>Salir del Sistema</p>
                    </a>
                </li> 
            </ul> <!-- aqui terminan las opciones del menú -->

        </div>
    </div>
</div>
<!-- End Sidebar -->