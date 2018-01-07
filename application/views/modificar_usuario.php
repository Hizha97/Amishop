<div class="container-fluid mt-3">
    <?php
        echo form_open("usuarios/actualizar/" . $usuario['id']);

        echo '<fieldset>';
            echo '<div class="form-group row">';
                echo '<label for="staticNombre" class="col-12 col-form-label">Nombre</label>';
                echo '<div class="col-12">';
                     echo '<input type="text"  name="nombre" class="form-control" id="staticNombre" value="'. $usuario['nombre'] .'">';
                echo '</div>';
        echo '</div>';

        echo '<div class="form-group row">';
        echo '<label for="staticApellidos" class="col-12 col-form-label">Apellidos</label>';
        echo '<div class="col-12">';
        echo '<input type="text"  name="apellidos" class="form-control" id="staticApellidos" value="'. $usuario['apellidos'] .'">';
        echo '</div>';
        echo '</div>';

        echo '<div class="form-group row">';
        echo '<label for="staticEmail" class="col-12 col-form-label">Email</label>';
        echo '<div class="col-12">';
        echo '<input type="email" name="email" class="form-control" id="staticEmail" value="'. $usuario['email'] .'">';
        echo '</div>';
        echo '</div>';

        echo '<div class="form-group row">';
        echo '<label for="staticNombreUsuario" class="col-12 col-form-label">Nombre de Usuario</label>';
        echo '<div class="col-12">';
        echo '<input type="text" name="nombreUsuario" class="form-control" id="staticNombreUsuario" value="'. $usuario['nombreUsuario'] .'">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="staticContrasena" class="col-12 col-form-label">Nueva contraseña(solo escribir si se desea una nueva)</label>';
        echo '<div class="col-12">';
        echo '<input type="password" name="contrasena" class="form-control" id="staticContrasena" value="">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-check">';
        echo '<label class="form-check-label">';
        echo "<input class='form-check-input' type='checkbox' value=1 name='esAdministrador'>";
        echo 'Hacer administrador';
        echo '</label>';
        echo '<button class="btn float-right btn-primary col-12" type="submit">MODIFICAR DATOS</button>';
        echo '</fieldset>';
        echo form_close();
    ?>
    </div>
</div>