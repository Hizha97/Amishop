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
                    echo "<td>" . $articulo['nombre'] . "</td>";
                    echo "<td>" . $articulo['descripcion'] . "</td>";
                    echo "<td class='text-center'>" . $articulo['stock'] . "</td>";
                    echo "<td>" . $articulo['precio'] . "</td>";
                    echo "<td>";
                    echo sprintf('<img class="img-thumbnail" src="/Amishop/uploads/%s">', $articulo['imagen']);
                    echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('articulos/actualizar/'.$articulo['id']).'"> Editar <i class="fas fa-edit"></a></td>';
                    echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('articulos/eliminar/'.$articulo['id']).'"> Eliminar <i class="fas fa-trash"></a></td>';
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            <?php
            echo '<a class="btn btn-primary float-left" href="'. site_url('articulos/nuevoArticulo'). '">Añadir articulo</a>';
            ?>
        </div>
    </div>
</div>