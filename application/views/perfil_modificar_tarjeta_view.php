<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-2 mt-5">
            <div class="list-group">
                <a href="<?php echo site_url('perfil') ?>" class="list-group-item list-group-item-action">
                    Mi perfil
                </a>
                <a href="<?php echo site_url('perfil/tarjetas') ?>"
                   class="list-group-item list-group-item-action active">
                    Tarjetas
                </a>
                <a href="<?php echo site_url('perfil/direcciones') ?>" class="list-group-item list-group-item-action">
                    Direcciones
                </a>
                <?php
                if(isset($_SESSION['esAdministrador']))
                {?>
                    <a href="<?php echo site_url('perfil/pedidosUsuario/' . $_SESSION['id']) ?>" class="list-group-item list-group-item-action">
                        Pedidos
                    </a>
                <?php }
                ?>

                <?php
                if (isset($_SESSION['esAdministrador']) and $_SESSION['esAdministrador']) {
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
            <h1>Modificar tarjeta.</h1>
            <?php

            if (isset($_SESSION['error']))
                echo '<span class="badge badge-danger">Error</span>';
            if (isset($_SESSION['success']))
                echo '<span class="badge badge-success">Cambios realizados correctamente.</span>';


            echo form_open(site_url('perfil/modificarTarjeta/' . $datos['id']));

            echo '<fieldset>';
            echo '<div class="form-group row">';
            echo '<label for="staticNombre" class="col-12 col-form-label">Nombre</label>';
            echo '<div class="col-12">';
            echo '<input type="text"  name="nombre" class="form-control" id="staticNombre" value="' . $datos['nombre'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<div class="form-group row">';
            echo '<label for="staticNumero" class="col-12 col-form-label">Numero</label>';
            echo '<div class="col-12">';
            echo '<input type="text"  name="numero" class="form-control" id="staticNumero" value="' . $datos['numero'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<div class="form-group row">';
            echo '<label for="staticCVV" class="col-12 col-form-label">CVV:</label>';
            echo '<div class="col-12">';
            echo '<input type="text" name="cvv" class="form-control" id="staticCVV" value="' . $datos['cvv'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<div class="form-group row">';
            echo '<label for="staticFechaCaducidad" class="col-12 col-form-label">Fecha de caducidad:</label>';
            echo '<div class="col-12">';
            echo '<input type="date" name="fechaCaducidad" class="form-control" id="staticFechaCaducidad" value="' . $datos['fechaCaducidad'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<div class="form-group row">';
            echo '<label for="staticMarca" class="col-12 col-form-label">Marca</label>';
            echo '<div class="col-12">';
            echo '<input type="text" name="marca" class="form-control" id="staticMarca" value="' . $datos['marca'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<button class="btn float-right btn-primary col-12" type="submit">MODIFICAR DATOS</button>';
            echo '<a class="btn float-right btn-secondary col-12 mt-3" href="' . site_url('perfil/tarjetas') . '">CANCELAR MODIFICACIÓN</a>';

            echo '</fieldset>';
            echo form_close();
            ?>
        </div>
    </div>
