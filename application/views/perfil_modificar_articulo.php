<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12 col-lg-2 mt-5">
            <div class="list-group">
                <a href="<?php echo site_url('perfil') ?>" class="list-group-item list-group-item-action">
                    Mi perfil
                </a>
                <a href="<?php echo site_url('perfil/tarjetas') ?>"
                   class="list-group-item list-group-item-action">
                    Tarjetas
                </a>
                <a href="<?php echo site_url('perfil/direcciones') ?>" class="list-group-item list-group-item-action">
                    Direcciones
                </a>

                <?php
                if (isset($_SESSION['esAdministrador']) and $_SESSION['esAdministrador']) {
                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action active">', site_url('perfil/articulos'));
                    echo 'Articulos';
                    echo '</a>';

                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action ">', site_url('perfil/usuarios'));
                    echo 'Usuarios';
                    echo '</a>';
                }
                ?>
            </div>
        </div>
        <div class="col-12 col-lg-10 mt-5">
            <h1>Modificar artículo.</h1>
            <?php
            $articulo = $articulos[0];
            echo form_open("articulos/actualizar/" . $articulo['id']);
            echo '<fieldset>';
                echo '<div class="form-group row">';
                    echo '<label for="nombre" class="col-12 col-form-label">Nombre</label>';
                    echo '<div class="col-12">';
                        echo '<input type="text"  name="nombre" class="form-control" id="staticNombre" value="'. $articulo['nombre'] .'">';
                    echo '</div>';
                echo '</div>';

            echo form_textarea(array('type' => 'text',
                'class' => 'form-control col-12',
                'name' => 'descripcion',
                'value' => $articulo['descripcion'],
                'aria-describedby'=> "fileHelp"));

                echo '<div class="form-group row">';
                echo '<label for="precio" class="col-12 col-form-label">Precio</label>';
                echo '<div class="col-12">';
                echo '<input type="precio" name="precio" class="form-control" id="precio" value="'. $articulo['precio'] .'">';
                echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';
                echo '<label for="stock" class="col-12 col-form-label">Stock</label>';
                echo '<div class="col-12">';
                echo '<input type="text" name="stock" class="form-control" id="stock" value="'. $articulo['stock'] .'">';
                echo '</div>';
                echo '</div>';
            $fotos = scandir("uploads");
            echo '<label for="imagen">Selecciona una imagen o sube una nueva</label>';
            echo '<select class="form-control" id="imagen" name="imagen">';
            var_dump($fotos);
            foreach ($fotos as $foto)
            {
                if($foto == $articulo['imagen'])
                    echo "<option value=$foto selected='selected'>";
                else
                    echo "<option value=$foto>";
                echo $foto;
                echo '</option>';
            }
            echo '</select>';
            echo ' <a href="'. site_url("articulos/foto") .'"><button type="button" class="btn btn-info mt-2">Nueva foto</button></a>';
            echo '<button class="btn float-right btn-primary col-12 mt-2" type="submit">MODIFICAR ARTICULO</button>';
            echo '</fieldset>';
            echo form_close();
            ?>
        </div>
    </div>
</div>