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
            <h1>Pedidos pendientes.</h1>
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th scope="col">Número del Pedido</th>
                    <th scope="col">Realizado por</th>
                    <th scope="col">Fecha de petición</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Transportista</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($pedidos as $pedido)
                {
                    echo "<tr>";
                    echo "<td>" . $pedido['numeroPedido'] . "</td>";
                    echo "<td>" . $pedido['realizadoPor'] . "</td>";
                    echo "<td>" . $pedido['fechaPeticion'] . "</td>";
                    echo "<td>" . $pedido['estado'] . "</td>";
                    echo "<td>" . $pedido['transportista'] . "</td>";
                    echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('pedidos/actualizar/'.$pedido['numeroPedido']).'"> Editar <i class="fas fa-edit"></a></td>';
                    echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('pedidos/eliminar/'.$pedido['numeroPedido']).'"> Eliminar <i class="fas fa-trash"></a></td>';
                    echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('pedidos/ver/'.$pedido['numeroPedido']).'"> Ver detalle <i class="fas fa-eye"></a></td>';

                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>