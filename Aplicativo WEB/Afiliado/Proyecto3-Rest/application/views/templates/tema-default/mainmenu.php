<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >Plataforma afiliados</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                 <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= base_url() ?>index.php/LoginController/cerrarSesion"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <div class="btn-group" style="float:left;">
                               
                                <img src="<?= base_url() ?>assets/img/login2.jpg" style="width: 50px;height: 50px; margin-right: 10px; border-radius: 100px" alt="">
                           
                            </div>
                            <div class="form-group">
                                <?php
                                    echo '<div>Nombre: '.$this->session->userdata('nombre_afiliado').'</div>';
                                    echo '<div>Email: '.$this->session->userdata('email_afiliado').'</div>';                                       

                                ?>
                               
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?= base_url() ?>index.php/Usuarios/find_get/<?= $cedula?>"><i class="glyphicon glyphicon-eye-open"></i> Codigo Qr</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>index.php/ReportCedulaController/"><i class="glyphicon glyphicon-list-alt"></i> Consultar mis movimientos</a>
                        </li>           
    
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
