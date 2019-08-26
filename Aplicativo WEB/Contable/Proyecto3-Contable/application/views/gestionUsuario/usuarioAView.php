  <!-- Main content -->
<div class="page-wrapper">
   
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
            </div>
          <div class="col-lg-9">
                        <h1 class="page-header">Agregar usuario</h1>
                    </div>
            <div class="col-md-3">
            </div>
                <div class="col-md-6">

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3>Información afiliado</h3>
                  </div>
                  <div class="panel-body">

                       <?php echo form_open('/GuController/crearAfiliado');?>                      
              
                            <div class="box-body">
                              
                              <div class=" col-xs-1">
                              </div>
                               <div class=" col-xs-10">
                                 
                                    <?php                                      
                                      
                                              $cedulaAfiliado = array(
                                                'type' => 'text',
                                                'name' => 'cedulaAfiliado',
                                                'placeholder' => 'ingrese la cédula',
                                                'class' => 'form-control'
                                                 );
                                              
                                              $nombreAfiliado = array(
                                                'type' => 'text',
                                                'name' => 'nombreAfiliado',
                                                'placeholder' => 'ingrese el nombre',
                                                'class' => 'form-control');

                                               $telefonoAfiliado = array(
                                                'type' => 'text',
                                                'name' => 'telefonoAfiliado',
                                                'placeholder' => 'ingrese el número del afiliado',
                                                'class' => 'form-control');


                                               $direccionAfiliado = array(
                                                'type' => 'text',
                                                'name' => 'direccionAfiliado',
                                                'placeholder' => 'ingrese la direccion del afiliado',
                                                'class' => 'form-control');

                                               $emailAfiliado = array(
                                                'type' => 'text',
                                                'name' => 'emailAfiliado',
                                                'placeholder' => 'ingrese el email del afiliado',
                                                'class' => 'form-control');

                                               $cupoCreditoAfiliado = array(
                                                'type' => 'text',
                                                'name' => 'cupoAfiliado',
                                                'placeholder' => 'establesca el cupo del afiliado',
                                                'class' => 'form-control');

                                               $urlAfiliado = array(
                                                'type' => 'text',
                                                'name' => 'urlAfiliado',
                                                'placeholder' => 'url afiliado',
                                                'class' => 'form-control');

                                                $actualizar = array(
                                                  'type' => 'submit',
                                                  'class' => 'btn btn-block btn-primary',
                                                  'value' => 'agregar afiliado',
                                                  'name' => 'enviar');                             
                                          

                                               
                                           echo form_error('cedulaAfiliado');
                                           echo form_label('Cedula','cedulaAfiliado');
                                           echo form_input($cedulaAfiliado);
                                           echo form_error('nombreAfiliado');
                                           echo form_label('Nombre','nombreAfiliado');
                                           echo form_input($nombreAfiliado);
                                           echo form_error('telefonoAfiliado');
                                           echo form_label('Telefono','telefonoAfiliado');
                                           echo form_input($telefonoAfiliado);
                                           echo form_error('direccionAfiliado');
                                           echo form_label('Direccion','direccionAfiliado');
                                           echo form_input($direccionAfiliado);
                                           echo form_error('emailAfiliado');
                                           echo form_label('Email','emailAfiliado');
                                           echo form_input($emailAfiliado);
                                           echo form_error('cupoAfiliado]');
                                           echo form_label('Cupo crédito','cupoAfiliado');
                                           echo form_input($cupoCreditoAfiliado);
                                           echo form_error('urlAfiliado');
                                           echo form_label('Url','urlAfiliado');
                                           echo form_input($urlAfiliado); 
                                      

                                    ?>          
                                    </div> 
                                  <div class="col-xs-1">
                              </div>
                            
                          </div>
                      
                   </div>
                   <div class="panel-footer">
                             <? {
                                echo form_input($actualizar);
                               }   
                            ?>
                      </div>
                    </div>
                    </div>
                <div class="col-md-3">
                </div> 
      </div>
</div>     

    <!-- /.content -->
  </div>