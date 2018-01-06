<div class="container">
    <br>
    <div class="row">
        <div class="col-12 col-sm-12 mb-5">
            <div class="card text-white bg-success mb-3" style="max-width: 100rem;">
                <div class="card-header">¿Desea subscribirse a nuestra newsletter?</div>
                <div class="card-body">
                    <h4 class="card-title text-white">¡Genial!</h4>
                    <p class="card-text">¡Estar subscrito significa enterarse antes que nadie de los nuevos productos y ofertas!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 mb-5">
        <div class="form-group">
            <label for="email">Email</label>
            <?php
                echo form_open('newsletter');
                echo form_input(array('type' => 'email','class' => 'form-control col-12', 'name' => 'email', 'placeholder' => "Tu precioso email aquí"));
                echo '<small id="emailHelp" class="form-text text-muted">Tranquilo, no compartimos tu información con terceros</small>';
                echo form_submit(array('id' => 'submit', 'value' => 'Enviar', 'class' => 'btn btn-primary mt-3'));
                echo form_close();
            ?>
        </div>
    </div>
</div>