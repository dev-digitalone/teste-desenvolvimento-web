<?php echo validation_errors(); ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo $title;?></div>
    <?php echo form_open('register/recover', array('class' => 'panel-cadastrar')) ?>
        <div class="input-group">
            <label for="email">Email</label>
            <input required type="email" class="form-control" name="email" id="email"/>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
        </div>
        <br/>
        <input type="submit" class="btn btn-default" value="Enviar código de recuperação"/>
        <br/>
        <br/>
        <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';?>
        <br/>
        <?php echo '<label class="text-success">'.$this->session->flashdata("message").'</label>';?>
        <br/>
    </form>
</div>
