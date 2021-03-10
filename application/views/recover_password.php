<div class="card text-white bg-dark">
    <div class="card-body">
        <h5 class="card-title"><?php echo $title;?></h5>
        <?php echo form_open("register/set_new_pass/$id", array('class' => 'panel-cadastrar')) ?>
            <div class="form-group">
                <label for="email">Senha</label>
                <input required type="password" class="form-control" name="password" id="password"/>
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
             <div class="form-group">
                <label>Confirme a senha</label>
                <input type="password" name="passconf" class="form-control"/>
                <span class="text-danger"><?php echo form_error('passconf'); ?></span>
             </div>
            <br/>
            <input type="submit" class="btn btn-primary" value="Alterar Senha"/>
            <br/>
            <br/>
            <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';?>
            <br/>
            <?php echo '<label class="text-success">'.$this->session->flashdata("message").'</label>';?>
            <br/>
        </form>
    </div>
</div>
