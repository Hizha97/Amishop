<div class="container">
    <div class="row">
        <?php
        foreach ($articulos as $articulo)
        {
            echo '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">';
            echo '<div class="card border-secondary mb-3" style="max-width: 20rem;">';
            echo sprintf("<div class='card-header'> <a href='articulos/articulo/%s'> %s</a> </div>", $articulo->nombre, $articulo->nombre );
            echo '<img style="height: 200px; width: 100%; display: block;" src="data:image/jpeg;base64,'.base64_encode($articulo->imagen) .'" />';
            echo '<div class="card-body text-secondary">';
            echo "<h4 class='card-title'> $articulo->precio € </h4>";
            echo "<p class='card-text'> $articulo->descripcion </p>";
            echo '</div>';
            //echo '<img style="height: 200px; width: 100%; display: block;" src= alt="Card image">';
            echo '</div>';
            echo "</div>";
        }
        ?>
    </div>
</div>

