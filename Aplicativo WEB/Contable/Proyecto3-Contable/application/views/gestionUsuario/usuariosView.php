 <!-- Main content -->
<div class="page-wrapper">
   
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            </div>
          <div class="col-sm-9">
                        <h1 class="page-header">Ver usuarios</h1>
                    </div>
            <div class="col-md-3">
            </div>
                <div class="col-md-8">
                <?= $message ?>
                <div class="panel panel-default">
                    <div class="col-xs-4">
                      <h3>Lista afiliados</h3>
                      </div>
                      <div class="col-xs-4">
                      </div>
                       <div class="col-xs-4" style="margin-top: 20px;"> 
                      <span><a href="<?= base_url()?>index.php/GuController/agregarAfiliado"><button type="button" class="btn btn-info"><i class="fa fa-user"></i></button></a>Agregar afiliado</span>
                      </div>
                    
                       <?php echo form_open('/GuController/');?>                      
              
              
                          
                                    <?php

                                     if($afiliados)
                                     {
                                      echo '<div>
                                                  <h3 class="box-title">Resultado afiliados</h3>
                                            </div>
                                             <div class="box-body">
                                            <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                              <th>Editar</th>
                                              <th>Cedula</th>
                                              <th>Nombre afiliado</th>
                                              <th>Telefono</th>
                                              <th>Direccion</th>
                                              <th>Email</th>
                                              <th>Cupo credito</th>
                                              <th>Url afiliado</th>
                                            </tr>
                                           </thead>
                                           <tbody>

                                           ';
                                            

                                        foreach ($afiliados as $row) {
                                          echo '<tr>';
                                            echo '<td><a href="'.base_url().'index.php/GuController/Editar/'.$row->cedula.'"><button type="button" class="btn btn-info"><i class="fa  fa-wrench"></i></button></a></td>';
                                            foreach ($row as $key => $value) {
                                               echo '<td>'.$value.'</td>';
                                            }

                                          echo '</tr>';
                                        }

                                         echo '</tbody>
                                                </div>
                                              </table> ';

                                          echo $this->pagination->create_links();

                                        
                                        }else if($afiliados == false)
                                        {
                                          echo '<div class="box-header with-border">
                                                  <h3 class="box-title">No se pudieron asociar resultados a esta busqueda</h3>
                                            </div>';
                                        }
                                    ?>          
                                       
                            
                      
                   </div>
                    </div>
                <div class="col-md-1">
                </div> 
      </div>
</div>     
</div>