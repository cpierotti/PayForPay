        <!-- Page Content -->
        <div id="page-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="page-header">Reporte movimientos afiliado</h1>

              </div>

              <div class="col-md-2"></div>
              <div class="col-md-8">
              <div class="panel panel-default">
              <?= form_open_multipart('/ReportCedulaController/exportExcelByDates'); ?>

              <div class="panel panel-heading">

               <h3> Ingrese los siguientes datos</h3>

              </div>

               <div class="panel panel-body">

               <?php 
               $date = new DateTime("now");
               $curr_date = $date->format('Y-m-d');

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

              
               <?= 
               $message;   
               ?>
               <?=  form_label('Seleccione la fecha de inicio'); ?>
               <?= form_input($inicio) ?>
               <?=  form_label('Seleccione la fecha final'); ?>
               <?= form_input($fin) ?>
             
             <?php
             $datos = array('class' => 'btn btn-success');
             ?>
            </div>

           

           <div class="panel panel-body text-center ">
            <?= form_submit('','Generar reporte Excel',$datos) ?>

            <?= form_close() ?>
            
          </div>
          </div>
          </div>

            <div class="col-md-2"></div>
          <!-- /.col-lg-12 -->
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>