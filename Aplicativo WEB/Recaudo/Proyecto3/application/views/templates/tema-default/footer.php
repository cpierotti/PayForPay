<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="../html/dashboards/dashboard.html">
							<span class="text-lg text-bold text-primary ">Sistema de Recaudo</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="<?= base_url()?>index.php/WelcomeController" >
								<div class="gui-icon"><i class="md md-ho
									me"></i></div>
								<span class="title">Pagina Principal</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						
						<!-- BEGIN EMAIL -->
						<!-- <li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-email"></i></div>
								<span class="title">Email</span>
							</a>
							<!--start submenu -->
							<!--<ul>
								<li><a href="../../html/mail/compose.html" ><span class="title">Crear Nuevo <br>Mensaje</span></a></li>
								<li><a href="../../html/mail/message.html" ><span class="title">Ver Mensajes Enviados</span></a></li>
							</ul><!--end /submenu -->
						<!--</li>--><!--end /menu-li --> 
						<!-- END EMAIL -->


						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="<?= base_url()?>index.php/GestorArchivos" >
								<div class="gui-icon"><i class="md md-web"></i></div>
								<span class="title">Administración de <br> archivos</span>
							</a>
						</li><!--end /menu-li -->

						<li class="gui-folder">
							<a>
								<div class="gui-icon text-center"><i class="md md-note-add"></i></i></div>
								<span class="title">Reportes</span>
							</a>
							<!--start submenu -->
							<ul>
								<li>
                                                                    <a href="<?= base_url() ?>index.php/ReportDetallePago" ><span class="title">Reporte de <br>Archivos</span></a>
                                                                </li>
                                                                 <li>
                                                                    <a href="<?= base_url() ?>index.php/ReportDetallePago/exportExcelRep" ><span class="title">Descargar Reporte diario de <br>los archivos</span></a>
                                                                </li>
								<li>
                                                                    <a href="<?= base_url() ?>index.php/ReportArchivo" ><span class="title">Reporte de los<br>pagos</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url() ?>index.php/ReportArchivo/FormexportXLSToday" ><span class="title">Reporte diario de los<br>pagos</span></a>
                                                                </li>
							</ul><!--end /submenu -->
						</li>
						<!-- END DASHBOARD -->

						<!-- BEGIN UI -->
						

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->


				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->



		</div><!--end #base-->
		<!-- END BASE -->
<!-- END LOGIN SECTION -->

				<!-- BEGIN JAVASCRIPT -->
				<script src="<?= base_url()?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
				<script src="<?= base_url()?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
				<script src="<?= base_url()?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
				<script src="<?= base_url()?>assets/js/libs/spin.js/spin.min.js"></script>
				<script src="<?= base_url()?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
				<script src="<?= base_url()?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
				<script src="<?= base_url()?>assets/js/core/source/App.js"></script>
				<script src="<?= base_url()?>assets/js/core/source/AppNavigation.js"></script>
				<script src="<?= base_url()?>assets/js/core/source/AppOffcanvas.js"></script>
				<script src="<?= base_url()?>assets/js/core/source/AppCard.js"></script>
				<script src="<?= base_url()?>assets/js/core/source/AppForm.js"></script>
				<script src="<?= base_url()?>assets/js/core/source/AppNavSearch.js"></script>
				<script src="<?= base_url()?>assets/js/core/source/AppVendor.js"></script>
				<script src="<?= base_url()?>assets/js/core/demo/Demo.js"></script>
				<script src="<?= base_url()?>assets/js/MyApp.js"></script>
				<!-- END JAVASCRIPT -->

			</body>
		</html>
