<body style="background: url('<?= base_url()?>assets/img/login.jpg')" onload="iniciar()">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4"> 

                <div class="fade in" style="margin-bottom: 50px">
                    <?= $message ?>
                </div>
                
                <div class=" panel" style="background-color: rgba(0,0,0,0.3)">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="color: white">Plataforma Afiliados</h3>
                    </div> 
                    <div class="panel-body">

                        <?= form_open('/LoginController/capturarDatosSess','role="form" class="form" onsubmit="cambiar()"') ?>
                         <fieldset>
                          <?php
                        $atributosTagUsername = array(
                            'name' => 'username',
                            'placeholder' => 'Cedula',
                            'class' => 'form-control',
                            'id' => 'username'
                        );

                        $atributosTagCheck = array(
                            'name' => 'remeberMe',
                            'type' => 'checkbox',
                            'onchange' => 'cambiar()',
                            'id'=> 'guardar'

                        );
                        ?>

                        <div class="form-group">
                            <?= form_input($atributosTagUsername) ?>
                        </div>    


                        <div class="form-group">                        
                        <?php echo $this->recaptcha->render(); ?>
                        </div>

                        <div class="checkbox">
                            <label style="" tyle ="color: white"><?= form_input($atributosTagCheck) ?>Remember Me</label>
                        </div>
                                        
                        <?php $attributes = array('class' => 'btn btn-lg btn-success btn-block'); ?>
                        <?= form_submit('submit','Login', $attributes) ?>                           
                        </fieldset>
                    <?= form_close() ?>
                
            </div>
        </div>
    </div>
</div>