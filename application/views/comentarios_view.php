<div class="row">
    <div class="col-sm-12 col-12">
        <h2 class="text-center">COMENTARIOS</h2>
        <div class="row justify-content-center mb-3">
            <div class="col-sm-3 col-12">
                <?php
                if(isset($_SESSION['isLoggedIn']))
                    echo sprintf('<a class="btn btn-secondary" href="'. site_url('articulos/nuevoComentario/%s'). '">Dejar un comentario</a>',$articulos[0]->id);
                else
                {
                    echo '<a class="btn btn-danger disabled" href="'. site_url('articulos/nuevoComentario'). '">Dejar un comentario</a>';
                    echo '<p class="text-danger">Para comentar, inicia sesión</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<table class="table table-hover">
    <tbody>
    <?php
        foreach ($comentarios as $comentario)
        {
            echo '<tr class="table-light">';
            echo "<th scope='row'> <p class='text-success'> $comentario->titulo </p>";
            echo "<p class='text-muted'> <h6>$comentario->fecha</h6></p>";
            $id = $comentario->idUsuario;
            $nombre = $usuarios[$id]['nombreUsuario'];
            echo "<p> <h3> $nombre </h3></p>";
            echo "</th>";
            echo "<td>$comentario->comentario</td>";
            echo  '</tr></tbody>';
        }
    ?>
</table>
</div>  <!-- ESTE DIV CIERRA EL CONTENEDOR DE ARTÍCULOS--->