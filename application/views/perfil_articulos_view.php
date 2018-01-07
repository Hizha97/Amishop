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
                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action active">', site_url('perfil/articulos'));
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
            <h1>Articulos existentes.</h1>
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Imagen</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($articulos as $articulo)
                {
                    echo "<tr>";
                    echo "<td>" . $usuario['nombreUsuario'] . "</td>";
                    echo "<td>" . $usuario['email'] . "</td>";
                    echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('usuarios/actualizar/'.$usuario['id']).'"> Editar <i class="fas fa-edit"></a></td>';
                    echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('usuarios/eliminar/'.$usuario['id']).'"> Eliminar <i class="fas fa-trash"></a></td>';
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>