<div class="container mt-3">
    <div class="col-12 col-sm-12 mb-5">
        <div class="form-group">
            <label for="titulo">Titulo para tu comentario, debe ser breve y conciso</label>
            <?php

            if(validation_errors())
                echo form_open(base_url() . 'articulos/nuevoComentario/' . $id, 'novalidate class="was-validated"');
            else
                echo form_open(base_url() . 'articulos/nuevoComentario/' . $id);


            $class = "form-control col-12";
            if(form_error('titulo', '<div class="invalid-feedback">', '</div>'))
                $class = $class . " is-invalid";
            else
                $class = $class . "is-valid";

            echo form_input(array('type' => 'text','class' => $class, 'name' => 'titulo', 'placeholder' => "Titulo", 'value' => set_value('titulo')));
            echo form_error('titulo', '<div class="invalid-feedback">', '</div>');


            echo '<label for="comentario">Tú opinión nos importa, di que piensas del producto</label>';

            $class = "form-control col-12";
            if(form_error('comentario', '<div class="invalid-feedback">', '</div>'))
                $class = $class . " is-invalid";
            else
                $class = $class . " is-valid";

            echo form_textarea(array('type' => 'text',
                                    'class' => $class,
                                    'name' => 'comentario',
                                    'placeholder' => "Escribe aquí tu comentario",
                                    'aria-describedby'=> "fileHelp",
                                    'value' => set_value('comentario')));

            echo form_error('comentario', '<div class="invalid-feedback">', '</div>');

            echo form_submit(array('id' => 'submit', 'value' => 'Enviar', 'class' => 'btn btn-primary mt-3'));
            echo form_close();
            ?>
        </div>
    </div>
</div>