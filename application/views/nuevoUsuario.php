<div class ="container mt-5">
        <div class="card ">
            <div class="card-body">
                <h2>Formulario de registro</h2>
                <?php

                $sep = array("class" => "mt-3");
                echo form_open(base_url().'usuarios/registrarse');
                echo form_label('Nombre', 'nombre', $sep);

                $data = array(
                    'class' => 'form-control col-12',
                    'name' => 'nombre',
                    'placeholder' => "Nombre"
                );

                echo form_input($data);

                $data['name'] = 'apellidos';
                $data['placeholder'] = 'Apellidos';
                echo form_label('Apellidos', 'apellidos', $sep);
                echo form_input($data);

                $data['name'] = 'email';
                $data['class'] = 'form-control col-12';
                $data['placeholder'] = 'Correo electrónico';

                echo form_label('Correo electrónico', 'email', $sep);
                echo form_input($data);

                $data['name'] = 'nombreUsuario';
                $data['placeholder'] = 'Nombre de usuario';

                echo form_label('Nombre de usuario', 'nombreUsuario', $sep);
                echo form_input($data);

                $data['name'] = 'contrasena';
                $data['placeholder'] = 'Contraseña';

                echo form_label('Contraseña', 'contrasena', $sep);
                echo form_password($data);echo '<br/>';

                echo '<button class="btn float-right btn-primary col-12" type="submit">REGÍSTRAME YA PLIS <i class="fas fa-smile fa-3x" style="vertical-align: middle;"></i></button>';

                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>