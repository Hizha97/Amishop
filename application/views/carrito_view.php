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
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
            <?php
            $total = 0;
            foreach ($carritos as $carrito)
            {
                echo '<tr>';
                echo '<td class="justify-content-center"> <img height="200" width="200" src="'. site_url(sprintf("uploads/%s",$articulos[$carrito['idArticulo']]['imagen'])) . '"></td>';
                echo '<td class="text-center">'. $articulos[$carrito['idArticulo']]['nombre'] . '</td>';
                echo '<td class="text-center">'. $carrito['cantidad'] . '</td>';
                echo '<td class="text-center">'. $articulos[$carrito['idArticulo']]['precio'] . '€</td>';
                echo '<td class="text-center">'. $articulos[$carrito['idArticulo']]['precio'] * $carrito['cantidad'] . '€</td>';
                echo '<td class="text-center"><a class="btn btn-secondary d-inline" href="'. site_url('carrito/eliminar/'.$carrito['id']).'"> Eliminar <i class="fas fa-trash"></a></td>';
                echo '</tr>';
                $total += $articulos[$carrito['idArticulo']]['precio'] * $carrito['cantidad'];
            }
            ?>
                </tbody>
        </table>
    </div>
        <div class="card">
            <div class="card-header">
                Total
            </div>
            <div class="card-body">
                <h5 class="card-title">El total de la compra es de:</h5>
                <p class="card-text"><?php echo $total ?>€</p>
                <hr>
                <p class="card-text"><?php $iva = ($total*0.21) + $total; echo $iva ?>€ I.V.A 21%</p>
                <?php
                if($stockDisponible)
                    echo '<a href="'. site_url("pedidos/tarjetasDirecciones") .'"> <button type="button" class="btn btn-primary">Tramitar pedido</button> </a>';
                else
                    echo  '<button type="button" class="btn btn-disabled disabled">Stock Insuficiente</button>';
                ?>
            </div>
        </div>
</div>
</div>
