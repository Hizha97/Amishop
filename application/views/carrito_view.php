<div class="container mt-3">
    <h1> Tu carrito de la compra. </h1>
    <div class="row">
            <div class="col-sm-12 col-12">
            <table class="table table-bordered ">
                <thead class="">
                <tr>
                    <th scope="col">Foto</th>
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
                echo '<td class="justify-content-center"> <img height="200" width="200" src="/Amishop/uploads/'. $articulos[$carrito['idArticulo']]['imagen'] . '"></td>';
                echo '<td class="text-center">'. $articulos[$carrito['idArticulo']]['nombre'] . '</td>';
                echo '<td class="text-center">'. $carrito['cantidad'] . '</td>';
                echo '<td class="text-center">'. $articulos[$carrito['idArticulo']]['precio'] . '€</td>';
                echo '<td class="text-center">'. $articulos[$carrito['idArticulo']]['precio'] * $carrito['cantidad'] . '€</td>';
                echo '</tr>';
            }
            ?>
                </tbody>
        </table>
    </div>
</div>