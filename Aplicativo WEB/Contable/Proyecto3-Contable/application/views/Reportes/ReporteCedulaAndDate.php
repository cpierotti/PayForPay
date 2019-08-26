        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Reporte movimientos afiliado</h1>
                    
                    </div>
                    <?= form_open_multipart('/ReportCedulaController/exportExcelByDates'); ?>
                    
                    <div class="col-lg-12">
                   <h3> Ingrese los siguientes datos</h3>
                   <?php 
                   $date = new DateTime("now");
                                                        $curr_date = $date->format('Y-m-d');
                    $cedula = array('id' => 'cedula',
                                                                
                                                                'placeholder' =>'Ingrese cédula',
							        'class' => 'form-control',
                                                                'name' => 'cedula',
                                                                'maxlength' => '20'
								);
                        $inicio = array('id' => 'inicio',
                            
								'type' => 'date',
								'class' => 'form-control',
                                                                'name' => 'inicio',
                                                                'max' => $curr_date
								);
								$fin = array('id' => 'fin',
								'type' => 'date',
                                                                 'class' => 'form-control',
								'name' => 'fin',
                                                                'max' => $curr_date
								);
                   ?>
                   
                   <div class="col-lg-4">
                       <?= 
                    $message;   
                    ?>
                       <?=  form_label('Ingrese la cédula'); ?>
                   <?= form_input($cedula) ?>
                       <?=  form_label('Seleccione la fecha de inicio'); ?>
                   <?= form_input($inicio) ?>
                       <?=  form_label('Seleccione la fecha final'); ?>
                   <?= form_input($fin) ?>
                   </div>
                   <?php
							$datos = array('class' => 'btn btn-success');
							?>
                   
                    </div>
                                    
                    <div class="col-md-12 text-center">
		<?= form_submit('','Generar reporte Excel',$datos) ?>
                  
		<?= form_close() ?>
            
		</div>
                    
                    <!-- /.col-lg-12 -->
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>