<div class="container-fluid">

    <div class = "row">
        <div class="col-12 col-lg-2 mt-5">
            <div class="list-group">
                <a href="<?php echo site_url('perfil') ?>" class="list-group-item list-group-item-action">
                    Mi perfil
                </a>
                <a href="<?php echo site_url('perfil/tarjetas') ?>" class="list-group-item list-group-item-action active">
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
                }
                ?>
            </div>
        </div>
        <div class="col-12 col-lg-10 mt-5">
            <h1>Tus tarjetas</h1>

            <?php

            if(isset($_SESSION['error']))
                echo '<span class="badge badge-danger">Error</span>';
            if(isset($_SESSION['success']))
                echo '<span class="badge badge-success">Cambios realizados correctamente.</span>';

            ?>
            <table class="table table-responsive table-bordered">
                <thead class="">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Numero</th>
                    <th scope="col">CVV</th>
                    <th scope="col">Fecha de Caducidad</th>
                    <th scope="col">Marca</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($tarjetas as $tarjeta) {
                    echo '<tr>';
                    foreach($tarjeta as $lab => $valor)
                        if($lab !== "id")
                            echo "<td class='text-center'>$valor</td>";
                    echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('perfil/modificarTarjeta/'.$tarjeta['id']).'"> Editar <i class="fas fa-edit"></a></td>';
                    echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('tarjetas/eliminar/'.$tarjeta['id']).'"> Eliminar <i class="fas fa-trash"></a></td>';

                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


