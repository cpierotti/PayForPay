<body>


	<!-- BEGIN CONTENT-->
	<div id="content">
		<section>

			
			<div class="section-body contain-md">
				<!-- BEGIN INTRO -->
				<div class="row">
						<?php
						if($message)
						{
							echo $message;
						} ?>

					
					<div class="col-md-3"></div>
					<div class="col-md-7 panel-resultados">
						
						<div class="col-md-12">
							<h2>Ingrese los datos correspondientes para cargar el archivo</h2>
						</div>
						
						<div class="col-md-1"></div>
						<div class="col-md-10">
							
							<?php

								foreach ($entidades as $row) {
									$lista_entidades[$row->id] = $row->Nombre_EntidadPago;
								}
								$entidades_drop = array( 'class' => 'form-control',
							);
							?>
							<?= form_open_multipart('/GestorArchivos/cargarArchivo','id="form1" name="form1"'); ?>
							<div class="form-group">
								<?=  form_label('Seleccione la entidad de pago','entidades'); ?>
								<?=  form_dropdown('entidades',$lista_entidades,'', $entidades_drop); ?>
							</div>
							<?php
								$entradaNombre = array('id' => 'filename',
								'type' => 'text',
								'class' => 'form-control',
								'readonly' => 'true'
								);
								$entradaArchivo = array('id' => 'browser',
								'type' => 'file',
								'class' => 'file',
								'name' => 'userfile',
								'onChange' => 'Handlechange()'
								);
							?>
							<div class="form-group">
							<?=  form_label('Seleccione el archivo a cargar  ','userfile'); ?>
							<div class="input-group">
								<?= form_input($entradaNombre) ?>
								<div class="input-group-btn text-left align-text-bottom">
									<label class="fileContainer btn btn-primary" >
										Seleccionar
										<?= form_input($entradaArchivo) ?>
									</label>
								</div>
							</div>
							</div>
							<div id="progress_container">
								<div id="progress_bar">
  		 							<div id="progress_completed"></div>
								</div>
</div>
						</div>
						<div class="col-md-12 text-center">
							<br />
							<?php
							$datos = array('class' => 'btn btn-success');
							?>
							<div class="form-group">
								<?= form_submit('','Cargar archivo',$datos) ?>
								<?= form_close() ?>
							</div>
							
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