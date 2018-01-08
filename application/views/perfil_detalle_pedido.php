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
            <h1>Detalle Pedido</h1>
            <h2 class="text-center text-success"> Datos Personales </h2>
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th scope="row">Nombre y Apellidos</th>
                    <td><?php  echo $usuario['nombre'] . " " . $usuario['apellidos'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td><?php  echo $usuario['email'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Usuario</th>
                    <td><?php  echo $usuario['nombreUsuario'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Direccion</th>
                    <td><?php echo $direccion['calle'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tarjeta</th>
                    <td><?php  echo $tarjeta['numero'] . " " . $tarjeta['marca'] ?></td>
                </tr>
                </tbody>
            </table>
            <h2 class="text-center text-success"> Datos Pedido </h2>
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th scope="row">Estado</th>
                    <td><?php  echo $datosPedido['estado'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Fecha del pedido</th>
                    <td><?php  echo $datosPedido['fechaPedido'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Fecha prevista entrega</th>
                    <td><?php echo $datosPedido["fechaEntrega"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Transportista</th>
                    <td><?php echo $datosPedido["transportista"] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>