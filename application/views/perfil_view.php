<div class="container-fluid">

    <div class = "row">
        <div class="col-12 col-lg-2 mt-5">
            <div class="list-group">
                <a href="<?php echo site_url('perfil') ?>" class="list-group-item list-group-item-action active">
                    Mi perfil
                </a>
                <a href="<?php echo site_url('perfil/tarjetas') ?>" class="list-group-item list-group-item-action">
                    Tarjetas
                </a>
                <a href="<?php echo site_url('perfil/direcciones') ?>" class="list-group-item list-group-item-action">
                    Direcciones
                </a>

                <?php
                if(isset($_SESSION['esAdministrador']) and $_SESSION['esAdministrador']) {
                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action">', site_url('perfil/articulos'));
                    echo 'Articulos';
                    echo '</a>';

                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action">', site_url('perfil/usuarios'));
                    echo 'Usuarios';
                    echo '</a>';

                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action">', site_url('perfil/pedidos'));
                    echo 'Pedidos pendientes';
                    echo '</a>';
                }
                ?>
            </div>
        </div>
        <div class="col-12 col-lg-10 mt-5">
            <h1>Tu información actual.</h1>
            <?php

            if(isset($_SESSION['error']))
                echo '<span class="badge badge-danger">Error</span>';
            if(isset($_SESSION['success']))
                echo '<span class="badge badge-success">Cambios realizados correctamente.</span>';

            echo form_open(site_url('perfil'));

            echo '<fieldset>';
                echo '<div class="form-group row">';
                    echo '<label for="staticNombre" class="col-12 col-form-label">Nombre</label>';
                    echo '<div class="col-12">';
                        echo '<input type="text"  name="nombre" class="form-control" id="staticNombre" value="'. $datos['nombre'] .'">';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';
                    echo '<label for="staticApellidos" class="col-12 col-form-label">Apellidos</label>';
                    echo '<div class="col-12">';
                        echo '<input type="text"  name="apellidos" class="form-control" id="staticApellidos" value="'. $datos['apellidos'] .'">';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';
                    echo '<label for="staticEmail" class="col-12 col-form-label">Email</label>';
                    echo '<div class="col-12">';
                        echo '<input type="email" name="email" class="form-control" id="staticEmail" value="'. $datos['email'] .'">';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';
                    echo '<label for="staticNombreUsuario" class="col-12 col-form-label">Nombre de Usuario</label>';
                    echo '<div class="col-12">';
                        echo '<input type="text" name="nombreUsuario" class="form-control" id="staticNombreUsuario" value="'. $datos['nombreUsuario'] .'">';
                    echo '</div>';
                echo '</div>';
                echo '<div class="form-group row">';
                    echo '<label for="staticContrasena" class="col-12 col-form-label">Nueva contraseña(solo escribir si se desea una nueva)</label>';
                    echo '<div class="col-12">';
                        echo '<input type="password" name="contrasena" class="form-control" id="staticContrasena" value="">';
                    echo '</div>';
                echo '</div>';

                echo '<button class="btn float-right btn-primary col-12" type="submit">MODIFICAR DATOS</button>';
                echo '</fieldset>';
            echo form_close();
            ?>
        </div>
    </div>
</div>