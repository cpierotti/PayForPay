<body class="menubar-hoverable header-fixed default-login" style="background: url('<?= base_url() ?>assets/img/nature-puertorico3.jpg');" onload="iniciar()">
    <!-- BEGIN LOGIN SECTION -->
    <section class="section-account">
        <div class="img-backdrop"></div>
        <div class="spacer"></div>
        <div class="card contain-sm style-transparent">
            <div class="card-body">
                <div class="row">
                    <div id="content-group" class="col-sm-6">
                        <br/>
                        <span class="text-lg text-bold text-primary color-default">Sistema Recaudo</span>
                        <br/><br/>
                        <div class="message">
	                <?= $message ?>
                       </div>

                       <?= form_open('/LoginController/capturarDatosSess',' onsubmit="cambiar()"') ?>
                          <?php
                        $atributosTagUsername = array(
                            'name' => 'username',
                            'placeholder' => 'Usuario',
                            'class' => 'form-control color-default',
                            'id' => 'username'
                        );

                        $atributosTagPassword = array(
                            'name' => 'password',
                            'placeholder' => 'Contraseña',
                            'type' => 'password',
                            'class' => 'form-control color-default',
                            'id' => 'password'
                         );
                        ?>

                        <div class="form-group color-default">
                           <!-- <input type="text" class="form-control color-default" id="username" name="username">-->
                            <?= form_input($atributosTagUsername) ?>
                            <label for="username" class="color-default"></label>
                        </div>
                      



                        <div class="form-group">
                            <!-- <input type="password" id="password" name="password"> -->
                            <?= form_input($atributosTagPassword) ?>
                            <label for="password" class="color-default"></label>

                        </div>
                        <br/>
                        <div class="row color-default extension">
                            <div class="col-md-12 form-group">
                                <?php echo $this->recaptcha->render(); ?>
                            </div>
                            <div class="col-xs-6 text-left">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>
                                        <input id="guardar" type="checkbox" onchange="cambiar()" class="color-default"> <span>Recordarme</span>
                                    </label>
                                </div>
                            </div><!--end .col -->
                            <div class="col-xs-6 text-center form-group">
                                <?php $attributes = array('class' => 'btn btn-primary btn-raised'); ?>
                                <?= form_submit('submit','Login', $attributes) ?>
                                <?= form_close() ?>

                             <!--   <button class="btn btn-primary btn-raised" type="submit">Login</button> -->
                            </div><!--end .col -->
                        </div><!--end .row -->
                       
                    </div><!--end .col -->

                </div><!--end .row -->
            </div><!--end .card-body -->
        </div><!--end .card -->
    </section>
