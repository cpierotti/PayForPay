        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Reporte movimientos afiliado</h1>
                    
                    </div>
                    <?= form_open_multipart('/ReportCedulaController/exportExcel'); ?>
                    
                    <div class="col-lg-12">
                   <h3> Ingrese la cédula de un afiliado</h3>
                   <?php 
                    $cedula = array('id' => 'cedula',
                                                                
                                                                'placeholder' =>'Ingrese cédula',
								'class' => 'form-control',
                                                                'name' => 'cedula',
                                                                'maxlength' => '20'
								);
                   ?>
                   
                   <div class="col-lg-4">
                       <?= 
                    $message;   
                    ?>
                   <?= form_input($cedula) ?>
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