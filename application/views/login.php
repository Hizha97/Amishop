<div class ="container mt-5">
    <div class="card ">
        <div class="card-body">
            <h2>Formulario de Inicio de Sesión</h2>
            <?php
            if($error_login)
                echo '<div class="alert alert-dismissible alert-danger">'.$msg.'<br>Vuelve a intentarlo.</div>';
            $sep = array("class" => "mt-3");
            echo form_open(base_url().'usuarios/login');

            $data = array(
                'class' => 'form-control col-12',
                'name' => 'nombre',
                'placeholder' => "Nombre"
            );

            $data['name'] = 'nombreUsuario';
            $data['placeholder'] = 'Nombre de usuario o email';

            echo form_label('Nombre de usuario o email', 'nombreUsuario', $sep);
            echo form_input($data);

            $data['name'] = 'contrasena';
            $data['placeholder'] = 'Contraseña';

            echo form_label('Contraseña', 'contrasena', $sep);
            echo form_password($data);echo '<br/>';

            echo '<button class="btn float-right btn-primary col-12" type="submit">INICIA SESIÓN <i class="fas fa-smile fa-3x" style="vertical-align: middle;"></i></button>';

            echo form_close();
            ?>
        </div>
    </div>
</div>
</div>