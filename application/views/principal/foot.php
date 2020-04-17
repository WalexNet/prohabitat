<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    
    <!-- aqui empieza el foot de la página	 -->
	</div>

	<!--   Core JS Files   -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
	<script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= base_url() ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?= base_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?= base_url() ?>assets/js/atlantis.min.js"></script>

	<!-- Mis Funciones JS -->
	<script src="<?= base_url() ?>assets/js/misFunciones.js"></script>
	
	<script>
		const SITEURL 		 = '<?= base_url() ?>';

		var doughnutChartFacturas 		= document.getElementById('doughnutChartFacturas').getContext('2d');
		var doughnutChartIncidencias 	= document.getElementById('doughnutChartIncidencias').getContext('2d');

		$(document).ready(function() {
			// Leemos por Ajax los datos de las facturas, y graficmos
			$.ajax({
				url: SITEURL+"Inicio/datosFacturas",
				dataType: 'json',
				contentType: "application/json; charset=utf-8",
        		method: "GET",
				success: function(data) {
					charDataFacturas = {
						labels: ['Impagas', 'Pagadas'],
						datasets: [{
							backgroundColor: ['#f3545d', '#1d7af3'],
							data: data
						}]
					}
					graficoFacturas(charDataFacturas);
				},
				error: function(data){
					console.log(facturas);
				}
			})

			// Leemos por Ajax los datos de las incidencias y graficamos
			// Ahora mismo solo llamamos a la funcion de para mostrarlae
			charDataIncidencias = {
				datasets: [{
					data: [32, 20, 15],
					backgroundColor: ['#f3545d','#fdaf4b','#1d7af3']
				}],

				labels: [
				'Red',
				'Yellow',
				'Blue'
				]
			}
			graficoIncidencias(charDataIncidencias);
		});

		function graficoFacturas(charDataFacturas){
			var myDoughnutChartFacturas = new Chart(doughnutChartFacturas, {
				type: 'doughnut',
				data: charDataFacturas,
				options: {
					responsive: true, 
					maintainAspectRatio: false,
					legend : {
						position: 'bottom'
					},
					layout: {
						padding: {
							left: 20,
							right: 20,
							top: 20,
							bottom: 20
						}
					}
				}
			});
		}

		function graficoIncidencias(charDataIncidencias){
			var myDoughnutChartIncidencias = new Chart(doughnutChartIncidencias, {
				type: 'doughnut',
				data: charDataIncidencias,
				options: {
					responsive: true, 
					maintainAspectRatio: false,
					legend : {
						position: 'bottom'
					},
					layout: {
						padding: {
							left: 20,
							right: 20,
							top: 20,
							bottom: 20
						}
					}
				}
			});
		}
    </script>

</body>
</html>