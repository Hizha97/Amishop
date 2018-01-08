<div class="container mt-3">
    <h1>Elige la tarjeta, dirección y transportista con el que quiere hacer el pedido.</h1>
    <div class="col-12 col-sm-12">
        <?php
            echo form_open(site_url("pedidos/tramitarPedido"));
            echo '<label for="tarjetas">Tus tarjetas</label>';
            echo '<select class="form-control mb-3" id="tarjetas" name="idTarjeta">';
            foreach ($tarjetas as $tarjeta)
            {
                echo sprintf('<option value="%s">', $tarjeta['id']);
                echo $tarjeta['numero'] . " | " . $tarjeta['marca'];
                echo '</option>';

            }
            echo '</select>';

            echo '<label for="direcciones">Tus direcciones</label>';
            echo '<select class="form-control mb-3" id="direcciones" name="idDireccion">';
            foreach ($direcciones as $direccion)
            {
                echo sprintf('<option value="%s">', $direccion['id']);
                echo $direccion['calle'] . " | " . $direccion['ciudad'];
                echo '</option>';

            }
            echo '</select>';

            echo '<label for="transportista">Transportistas disponibles</label>';
            echo '<select class="form-control mb-3" id="transportista" name="transportista">';
            echo '<option value="Correos">Correos ordinario (Sin seguimiento) | 7 días</option>';
            echo '<option value="CorreosPrioritario">Correo prioritario ordinario (Con seguimiento) | 3 días</option>';
            echo '<option value="SEUR">SEUR Express | 1 día</option>';
            echo '</select>';

        echo '<button class="btn float-right btn-success col-12" type="submit">Continuar</button>';

            echo  form_close();
        ?>
    </div>
</div>