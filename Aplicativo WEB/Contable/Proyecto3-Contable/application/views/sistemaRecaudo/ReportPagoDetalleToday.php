<body>
	<!-- BEGIN CONTENT-->
	<div id="content">
		<section>
			
			<div class="section-body contain-md">
				<!-- BEGIN INTRO -->
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-10 panel-resultados">
						
						<div class="col-md-11">
							<h2>Ingrese la entidad de la que quiere que se genere el reporte</h2>
						</div>
						
						<div class="col-md-1"></div>
						<div class="col-md-11">
							
							
							<?= form_open_multipart('/ReportArchivo/exportXLSToday'); ?>
							<div class="form-group">
								<?=  form_label('Seleccione la entidad'); ?>								
							</div>
                                                    <div class="message">
	                                         <?= $message ?>
                                                     </div>
							
                                                    <link href="<?= base_url()?>assets/css/myStyleSheet/selects_inputs.css" rel="stylesheet" text="text/css" />
                                                    
							<div class="form-group">
					
							<div class="input-group">
                                                            <select name="sel">
                                                                <option value="-1">Seleccione</option>
                                                                <?php foreach($entidades as $items){ ?>
                                                                <option value="<?= $items->id ?>"><?= $items->Nombre_EntidadPago ?></option>
                                                                <?php }?>
                                                            </select>
                                                    <br />
                                                     
								
							</div>
							</div>
							
						</div>
						<div class="col-md-12 text-center">
							<br />
							<?php
							$datos = array('class' => 'btn btn-success');
							?>
							<div class="form-control">
								<?= form_submit('','Generar reporte diario de Excel',$datos) ?>
                                                            <br />
								<?= form_close() ?>
                                                            <br />
							</div>
							<br />
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