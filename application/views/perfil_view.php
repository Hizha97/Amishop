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
            </div>
        </div>
        <div class="col-12 col-lg-10 mt-5">
            <h1>Tu información actual.</h1>
            <form action="<?php echo site_url('perfil')?>">

            <fieldset>
            <?php
                echo '<div class="form-group row">';
                    echo '<label for="staticNombre" class="col-sm-2 col-form-label">Nombre</label>';
                    echo '<div class="col-sm-12">';
                        echo '<input type="text" readonly="" class="form-control" id="staticNombre" value="'. $datos['nombre'] .'">';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';
                    echo '<label for="staticApellidos" class="col-sm-2 col-form-label">Apellidos</label>';
                    echo '<div class="col-sm-12">';
                        echo '<input type="text" readonly="" class="form-control" id="staticApellidos" value="'. $datos['apellidos'] .'">';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';
                    echo '<label for="staticNombre" class="col-sm-2 col-form-label">Email</label>';
                    echo '<div class="col-sm-12">';
                        echo '<input type="text" readonly="" class="form-control" id="staticEmail" value="'. $datos['email'] .'">';
                    echo '</div>';
                echo '</div>';
            ?>
            <button class="btn float-right btn-primary col-12" type="submit">MODIFICAR DATOS</button>

            </fieldset>
            </form>
        </div>
    </div>
</div>