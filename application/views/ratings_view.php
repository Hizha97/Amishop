    <div class="row mt-3">
        <?php
            $media = 0; $cuenta = 0;
            $articulo = $articulos[0];
            foreach ($valoraciones as $valoracion)
            {
                $media += $valoracion->valoracion;
                $cuenta++;
            }
            if($cuenta != 0)
            {
                $media = intdiv($media, $cuenta);
                for($i = 0; $i < 5; $i++)
                {
                    if($i <= $cuenta)
                        echo '<i class="fas fa-star"></i>';
                    else
                        echo '<i class="far fa-star"></i>';
                }
            }
            else
            {
                for($i = 0; $i < 5; $i++)
                    echo '<i class="far fa-star"></i>';

            }
            echo '<span class="rating mt-2">';
            echo form_open(base_url() . 'articulos/nuevaValoracion/' . $articulo['id']);
            echo form_input(array("type" => "radio",
                                    "name" => "valoracion",
                                    "class" => "rating-input",
                                    "id" => "rating-input-1-5",
                                    "value" => 1));
            echo form_label("<i class=\"fas fa-star\"></i>","rating-input-1-5",array("class" => "rating-star"));

            echo form_input(array("type" => "radio",
                                    "name" => "valoracion",
                                    "class" => "rating-input",
                                    "id" => "rating-input-1-4",
                                    "value" => 2));
            echo form_label("<i class=\"fas fa-star\"></i>","rating-input-1-4",array("class" => "rating-star"));

            echo form_input(array("type" => "radio",
                                    "name" => "valoracion",
                                    "class" => "rating-input",
                                    "id" => "rating-input-1-3",
                                    "value" => 3));
            echo form_label("<i class=\"fas fa-star\"></i>","rating-input-1-3",array("class" => "rating-star"));

            echo form_input(array("type" => "radio",
                                    "name" => "valoracion",
                                    "class" => "rating-input",
                                    "id" => "rating-input-1-2",
                                    "value" => 4));
            echo form_label("<i class=\"fas fa-star\"></i>","rating-input-1-2",array("class" => "rating-star"));

            echo form_input(array("type" => "radio",
                                    "name" => "valoracion",
                                    "class" => "rating-input",
                                    "id" => "rating-input-1-1",
                                    "value" => 5));
            echo form_label("<i class=\"fas fa-star\"></i>","rating-input-1-1",array("class" => "rating-star"));

            if(isset($_SESSION['id']))
                echo form_submit(array( 'id' => 'submit',
                                    'value' => 'Enviar',
                                    'class' => 'btn btn-warning ml-3 mt-3'));
            else
            {
                echo form_submit(array( 'id' => 'submit',
                    'value' => 'Enviar',
                    'class' => 'btn btn-danger ml-3 mt-3',
                    'disabled' => ''));
                echo '<p class="text-danger">Para valorar, inicia sesión</p>';
            }

            echo form_close();
            echo '</span>';

        ?>
    </div>
    <hr>
