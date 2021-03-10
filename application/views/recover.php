<div class="card text-white bg-dark">
    <div class="card-body">
        <h5 class="card-title"><?php echo $title;?></h5>
        <?php echo form_open('register/recover', array('class' => 'panel-cadastrar')) ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" class="form-control" name="email" id="email"/>
                <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>
            <br/>
            <input type="submit" class="btn btn-primary" value="Enviar código de recuperação"/>
            <br/>
            <br/>
            <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';?>
            <br/>
            <?php echo '<label class="text-success">'.$this->session->flashdata("message").'</label>';?>
            <br/>
        </form>
    </div>
</div>
