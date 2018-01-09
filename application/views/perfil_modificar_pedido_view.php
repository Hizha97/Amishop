<div class="container-fluid">
    <div class = "row">
        <div class="col-12 col-lg-2 mt-5">
            <div class="list-group">
                <a href="<?php echo site_url('perfil') ?>" class="list-group-item list-group-item-action">
                    Mi perfil
                </a>
                <a href="<?php echo site_url('perfil/tarjetas') ?>" class="list-group-item list-group-item-action">
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
                if(isset($_SESSION['esAdministrador']) and $_SESSION['esAdministrador']) {
                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action ">', site_url('perfil/articulos'));
                    echo 'Articulos';
                    echo '</a>';

                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action">', site_url('perfil/usuarios'));
                    echo 'Usuarios';
                    echo '</a>';


                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action active">', site_url('perfil/pedidos'));
                    echo 'Pedidos pendientes';
                    echo '</a>';
                }
                ?>
            </div>
        </div>
        <div class="col-12 col-lg-10 mt-5">
            <h1>Modificar pedido.</h1>
            <?php

            if (isset($_SESSION['error']))
                echo '<span class="badge badge-danger">Error</span>';
            if (isset($_SESSION['success']))
                echo '<span class="badge badge-success">Cambios realizados correctamente.</span>';

            if(validation_errors())
            {
                echo form_open(site_url('perfil/modificarPedido/' . $datos['id']),'novalidate class="was-validated"');
                echo '<fieldset>';

                $class = "form-control col-12";
                if(form_error('estado', '<div class="invalid-feedback">', '</div>'))
                    $class = $class . " is-invalid";
                else
                    $class = $class . "is-valid";


                echo '<div class="form-group row">';
                echo '<label for="staticEstado" class="col-12 col-form-label">Estado (puede ser Sin tramitar, En tramite, Enviado, o Finalizado)</label>';
                echo '<div class="col-12">';
                echo '<input type="text"  name="estado" class="'. $class .'" id="staticEstado" value="' .  set_value('estado') . '">';
                echo form_error('estado', '<div class="invalid-feedback">', '</div>');
                echo '</div>';
                echo '</div>';

                $class = "form-control col-12";
                if(form_error('fechaEntrega', '<div class="invalid-feedback">', '</div>'))
                    $class = $class . " is-invalid";
                else
                    $class = $class . "is-valid";

                echo '<div class="form-group row">';
                echo '<label for="staticFechaEntrega" class="col-12 col-form-label">Fecha de entrega</label>';
                echo '<div class="col-12">';
                echo '<input type="text"  name="fechaEntrega" class="'. $class .'" id="staticFechaEntrega" value="' .  set_value('fechaEntrega') . '">';
                echo form_error('fechaEntrega', '<div class="invalid-feedback">', '</div>');
                echo '</div>';
                echo '</div>';

                echo '<button class="btn float-right btn-primary col-12" type="submit">MODIFICAR DATOS</button>';
                echo '<a class="btn float-right btn-secondary col-12 mt-3" href="' . site_url('perfil/pedidos') . '">CANCELAR MODIFICACIÓN</a>';

                echo '</fieldset>';
                echo form_close();
            }
            else{
            echo form_open(site_url('perfil/modificarPedido/' . $datos['id']));

            echo '<fieldset>';
            echo '<div class="form-group row">';
                echo '<label for="staticEstado" class="col-12 col-form-label">Estado (puede ser Sin tramitar, En tramite, Enviado, o Finalizado)</label>';
            echo '<div class="col-12">';
            echo '<input type="text"  name="estado" class="form-control" id="staticEstado" value="' . $datos['estado'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<div class="form-group row">';
            echo '<label for="staticFechaEntrega" class="col-12 col-form-label">Fecha de entrega</label>';
            echo '<div class="col-12">';
            echo '<input type="text"  name="fechaEntrega" class="form-control" id="staticFechaEntrega" value="' . $datos['fechaEntrega'] . '">';
            echo '</div>';
            echo '</div>';

            echo '<button class="btn float-right btn-primary col-12" type="submit">MODIFICAR DATOS</button>';
            echo '<a class="btn float-right btn-secondary col-12 mt-3" href="' . site_url('perfil/pedidos') . '">CANCELAR MODIFICACIÓN</a>';

            echo '</fieldset>';
            echo form_close();}
            ?>
        </div>
    </div>
