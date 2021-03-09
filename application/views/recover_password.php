<?php echo validation_errors(); ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo $title;?></div>
    <?php echo form_open("register/set_new_pass/$id", array('class' => 'panel-cadastrar')) ?>
        <div class="input-group">
            <label for="email">Senha</label>
            <input required type="password" class="form-control" name="pass" id="pass"/>
            <span class="text-danger"><?php echo form_error('pass'); ?></span>
        </div>
        <br/>
        <input type="submit" class="btn btn-default" value="Alterar Senha"/>
        <br/>
        <br/>
        <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';?>
        <br/>
        <?php echo '<label class="text-success">'.$this->session->flashdata("message").'</label>';?>
        <br/>
    </form>
</div>
