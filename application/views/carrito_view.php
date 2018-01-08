<div class="container-fluid">
    <h1> Tu carrito de la compra. </h1>
    <div class="row">
            <div class="col-sm-6 col-12">
            <table class="table table-responsive table-bordered ">
                <thead class="">
                <tr>
                    <th scope="col">Nombre Articulo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
            <?php
            foreach ($carritos as $carrito)
            {
                echo '<tr>';
                echo '<td class="text-center">'. $articulos[$carrito['idArticulo']][0]['nombre'] . '</td>';
                echo '<td class="text-center">'. $carrito['cantidad'] . '</td>';
                echo '<td class="text-center">'. $articulos[$carrito['idArticulo']][0]['precio'] . '</td>';
                echo '<td class="text-center">'. $articulos[$carrito['idArticulo']][0]['precio'] * $carrito['cantidad'] . '</td>';
                echo '</tr>';
            }
            ?>
                </tbody>
        </table>
    </div>
</div>