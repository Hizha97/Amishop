<div class="container mt-3">
    <div class="col-12 col-sm-12 mb-5">
        <div class="form-group">
            <label for="titulo">Titulo para tu comentario, debe ser breve y conciso</label>
            <?php
            echo form_open(base_url() . 'articulos/nuevoComentario/' . $id);
            echo form_input(array('type' => 'text','class' => 'form-control col-12', 'name' => 'titulo', 'placeholder' => "Titulo"));
            echo '<label for="titulo">Tú opinión nos importa, di que piensas del producto</label>';
            echo form_textarea(array('type' => 'text',
                                    'class' => 'form-control col-12',
                                    'name' => 'comentario',
                                    'placeholder' => "Escribe aquí tu comentario",
                                    'aria-describedby'=> "fileHelp"));
            echo form_submit(array('id' => 'submit', 'value' => 'Enviar', 'class' => 'btn btn-primary mt-3'));
            echo form_close();
            ?>
        </div>
    </div>
</div>