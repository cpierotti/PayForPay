<body>
	<!-- BEGIN CONTENT-->
	<div id="content">
		<section>
			
			<div class="section-body contain-md">
				<!-- BEGIN INTRO -->
				<div class="row">
					<?php
					
					if($error)
					{
					echo '<div class="col-md-3"></div><div class="alert-warning mensaje col-md-7" role="alert"><h3>Advertencia archivo cargado con errores</h3>';
					echo '<p>para ayudarte hemos agrupado los errores en un archivo que puedes descargar en el siguiente enlace
						<span><a href="'.$linkError.'" target="_blank"><button type="button" class="btn btn-info"><i class="fa fa-file-excel-o"></i></button></a></span> reporta los errores
					, has la correccion y vuelve a subir el archivo</p></div><div class="col-md-2"></div>';
					}else{
					echo '<div class="col-md-3"></div><div class="alert-success mensaje col-md-7" role="alert"><h3>Enhorabuena!, El archivo se cargó exitosamente</h3></div><div class="col-md-2"></div>';
					} ?>
					
					<div class="col-md-3"></div>
					<div class="col-md-7 panel-resultados">
						
						<div class="col-md-12">
							<h2>Detalles archivo</h2>
							<hr>
						</div>
						
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="box-body">
								<table class="table table-bordered">
									<tbody>
										<tr>
											<th style="width: 10px">#</th>
											<th>Detalle</th>
											<th>Valor</th>
										</tr>
										<?php
										$n = 1;
										foreach ($data_encabezado as $key => $value) {
										echo '<tr><td>'.$n.'</td><td>'.$key.'</td><td>'.$value.'</td><tr>';
										$n ++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12 text-center">
							
							
						</div>
					</div>
					
					<div class="col-md-1"></div>
					
					</div> <!-- END col-xs-8 content -->
					<div class="col-md-2"></div>
					</div><!--end .row -->
					<!-- END WELCOME -->
					
					</div><!--end .section-body -->
				</section>
				</div><!--end #content-->
			</body>
		</html>