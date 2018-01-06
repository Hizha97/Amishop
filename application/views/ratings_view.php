    <div class="row mt-3">
        <?php
            $media = 0; $cuenta = 0;
            foreach ($valoraciones as $valoracion)
            {
                $media += $valoracion->valoracion;
                $cuenta++;
            }
            $media = intdiv($media,$cuenta);
            echo form_open(base_url() . 'articulos/nuevaValoracion/' . $articulos[0]->id);
            echo form_input(array("type" => "radio", "name" => "valoracion"));
            echo form_input(array("type" => "radio", "name" => "valoracion"));
            echo form_input(array("type" => "radio", "name" => "valoracion"));
            echo form_input(array("type" => "radio", "name" => "valoracion"));
            echo form_input(array("type" => "radio", "name" => "valoracion"));
            echo form_submit(array('id' => 'submit', 'value' => 'Enviar', 'class' => 'btn btn-warning ml-3 mt-3'));
            echo form_close();

        ?>
    </div>
    <hr>
