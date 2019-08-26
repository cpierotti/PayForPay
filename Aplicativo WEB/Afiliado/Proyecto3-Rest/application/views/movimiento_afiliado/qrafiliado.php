        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Consulta tus movimientos</h1>
                    </div>
                    <hr>
                    <div class="col-lg-3">
                       
                    </div>
                    <div class="col-lg-6">
                       <?php 
                            if($cedula_id)
                            {
                                 echo '<img src="'.base_url().'/codigo/'.$cedula_id.'/test.png"; style="margin-left:10%;" width=80% height=50% border=10>';
                            }else
                            {
                                echo '<h3>No se puede acceder a una cédula externa</h3>';
                            }
                        ?>
                    </div>
                     <div class="col-lg-3">
                       
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->