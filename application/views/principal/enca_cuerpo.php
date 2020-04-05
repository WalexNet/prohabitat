<!-- Panel Principal y Pie de Página -->
<div class="main-panel">

    <div class="content"> <!-- este es el contenedor de todo el cuerpo del programa -->				
        <div class="page-inner">

            <div class="page-header"> <!-- pequeño Encabezado del Dashboard -->
                <h4 class="page-title">ProHabitat (Beta 0.1)</h4>

                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?= base_url()?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url()?><?= $uri ?>"><i> <?= $lugar ?></i></a>
                        
                    </li>
                    <!-- <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Starter Page</a>
                    </li> -->
                </ul>

            </div> <!-- final del encabezado -->